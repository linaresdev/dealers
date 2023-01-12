<?php
namespace Delta\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

   protected $table = "users_groups";

   protected $fillable = [
      "id",
      "user_id",
      "parent",
      "slug",
      "group"
   ];

   public $timestamps = false;

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

   public function dealer() {
      return $this->where("parent", $this->id)->first() ?? null;
   }
}
