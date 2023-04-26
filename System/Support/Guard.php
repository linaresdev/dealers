<?php 
namespace Delta\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


class Guard {

	protected $app;

	public function __construct() {
	}

	public function getPlatform($agent=NULL)
	{
		if(empty($agent)) return NULL;

		if( !empty( ($platforms = config("admin.platforms")) ) ) {
			foreach ($platforms as $key => $value) {
				if ( preg_match('|'.preg_quote($key).'|i', $agent) ) {
					return $value;
				}
			}
		}

		return 'Unknown Platform';
	}

	public function getBrowser($agent) {
		if(empty($agent)) return NULL;

		if( !empty( ($browsers = config("admin.browsers")) ) && is_array($browsers) ) {
			foreach ($browsers as $key => $value) {
				if (preg_match('|'.$key.'.*?([0-9\.]+)|i', $agent, $match)) {
					return $value.' | V-'.$match[1]; 
				}
			}
		}

		return 'Unknown Browser'; 
	}

	public function getRobot($agent) {
		if(empty($agent)) return NULL;

		if( !empty( ($robots = config("admin.robots")) ) && is_array($robots) ) {
			foreach ($robots as $key => $value) {
				if (preg_match('|'.preg_quote($key).'|i', $agent, $match))
				{
					return $value; 
				}
			}
		} 
	}

	public function getMobil($agent=NULL) {
		if(empty($agent)) return NULL;

		if( !empty( ($mobiles = config("admin.mobiles")) ) && is_array($mobiles) ) {
			foreach ($mobiles as $key => $value) {
				if( preg_match('|'.preg_quote($key).'|i', $agent, $match) ) {
					return $value; 
				}
			}
		}

		return "It is not a Mobile";
	}

	public function device( $agent=null ) {
		if( !empty( $agent) ) {

			if( !empty( ($mobiles = config("admin.mobiles")) ) && is_array($mobiles) ) {
				foreach ($mobiles as $key => $value) {
					if( preg_match('|'.preg_quote($key).'|i', $agent, $match) ) {
						return "Smartphone"; 
					}
				}
			}

			return "Computer";
		}

		return 'Unknown Device';
	}

}

/* End of Controller Guard.php */