<?php
namespace Delta\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Group extends Model {

   protected $table = "users_groups";

   protected $fillable = [
      "id",
      "user_id",
      "parent",
      "type",
      "slug",
      "group",
      "access",
      "icon",
      "activated"
   ];

   public $timestamps = false;

   public function parent() {
      return $this->where("parent", $this->id)->get();
   }

   public function org( $slug ) {
      return $this->where("type", "organization")->where("slug", $slug)->first();
   }

   public function getOrgUsers($slug) {
      $data = $this->where("type", "organization")
                  ->where("slug", $slug)
                  ->first() ?? null;

      if( $data != null ) {
         return $data->users->take(8);
      }
   }

   public function ID($slug) {

      if( ($query = ($this->where("slug", $slug)->first() ?? null)) != null ) {
        return $query->id;
      }

      return 0;
   }

   public function setParentAttribute($value) {
      if(is_string($value)) {
         $value = $this->ID($value);
      }

      return $this->attributes['parent'] = $value;
   }

   public function users() {
      return $this->belongsToMany(User::class, "users_groups_pivots", "group_id", "user_id")->withPivot(
          "view", "insert", "update", "delete"
      );
   }

   public function syncUser($ID) {
      $this->users()->attach($ID);
   }

   /*
   * RELATIONS */
   public function meta() {
      return $this->hasMany(UserGroupMeta::class, "group_id");
   }

   public function addMeta($type, $data ) {
      foreach($data as $key => $value ) {
         $this->meta()->create([
            "type" => $type, "slug" => $key, "value" => $value
         ]);
      }

      return $this;
   }

   public function getMeta($slug) {
      if( ($data = ($this->meta()->where("slug", $slug)->first() ?? null)) ) {
         return $data->value;
      }
   }

   public function updateMeta($type, $data) {
      foreach($data as $slug => $value) {
         $this->meta()->where("type", $type)->where("slug", $slug)->update([
            "value" => $value
         ]);
      }
   }

   public function datasheet() {
      $data=null;

      foreach($this->meta as $meta ) {
         $data[$meta->slug] =  $meta->value;
      }

      return (object) $data;
   }

   public function customer() {
      return $this->hasMany(Customer::class, "group_id");
   }

   public function addCustomer($data) {
      return $this->customer()->create($data);
   }

   public function load( $slug ) {
      return $this->where("slug", $slug)->first() ?? null;
   }

   public function dealers() {
      return $this->where("parent", $this->id)->where("type", "dealer")->get();
   }

   /*
   * Warranty */

   /*
   * ROLS */
   public function rols() {
      return $this->where("parent", $this->id)->get();
   }

   public function rol($slug=null) {

      $data = $this->where("parent", $this->id);

      $data->where("type", "rol");
      $data->where("slug", $slug);

      return $data->first();
   }

   /*
   * ORGANIZATIONS */
}
