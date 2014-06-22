<?php
class Cookie {
	var $name;
	var $value;
	var $expires;
	var $maxAge;
	var $path;
	var $secure;
	private $version = 1;
	
	public function __construct( $name, $value, $expires = null, $maxAge = 0, $path = null, $secure = false ) {
		$this->name = $name;
		$this->value = $value;
		if( null != $expires ) {
			$this->expires = DateTime::createFromFormat( 'U', strtotime( $expires ) );
		} else {
			$this->expires = new DateTime(); #now();
		}
		
		$this->expires = $this->expires->format( 'd-M-Y H:i:s T' );
	}
	
	public function __toString() {
		$str = $this->name . '=' . $this->value . ';';
		foreach ( get_object_vars( $this ) as $name => $value ) {
			if ( null != $value && 'name' != $name && 'value' != $name ) {
				$str .= $name . '=' . $value . ';';
			}
		}
		return $str . PHP_EOL;
	}
	
}
?>
