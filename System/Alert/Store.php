<?php 
namespace Delta\Alert;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


class Store {

	protected $alia 		= "default";

	protected $animate 		= false;

	protected $fallbacks	= [];

	protected $skin 		= "alert::index";

	protected $icon 		= "shield";

	protected $fstub;

	private static $session;

	public function __construct( $app ) {
		self::$session = $app['session.store'];		
	}

	public function load() {
		return $this;
	}


	public function set($key, $value) {
		if( isset($this->{$key}) ) {
			$this->{$key} = $value;
		}
	}

	public function tag($slug) {
		if( self::$session->has($slug) ) {
			if( is_array( ($stors = self::$session->get($slug) ) ) ) {

				$html = null;

				foreach( $stors as $store ) {
					if( view()->exists($this->skin) ) {
						$html .= view( $this->skin, $store );
					}
				}

				return $html;
			}
		}	
	}

	public function prefix( $alia ) {
		$this->alia = $alia; return $this;
	}

	public function fire( $type, $message ) {

		$zip = \Str::random(9);

		$style  = "alert";
		$style .= " alert-$type";
		if( $this->animate ) $style .= " alert-slow";

		$data["type"] 			= $type;
		$data["style"] 			= $style;
		$data["icon"]			= __mdi($this->icon);
		$data["title"]			= ucwords($type);
		$data["messages"] 		= $message;
		$data["created_at"] 	= now();

		self::$session->flash($this->alia.".".$zip, $data);	
	}

	public function __call( $method, $args ) {

		if( $method == "info" ) {
			return $this->fire("info", $args[0]);
		}

		if( $method == "warning" ) {
			return $this->fire("warning", $args[0]);
		}

		if( $method == "danger" ) {
			return $this->fire("danger", $args[0]);
		}

		if( $method == "success" ) {
			return $this->fire("success", $args[0]);
		}

		if( $method == "primary" ) {
			return $this->fire("primary", $args[0]);
		}
	}
}

/* End of Controller Store.php */