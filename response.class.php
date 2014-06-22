<?php
class Response {
	var $contentType;
	var $content;
	var $encoding;
	var $date;
	var $status;
	
	public function __construct() {
		$this->encoding = 'utf-8';
	}
	
	
	public function __set( $name, $value) {
		$this->$name = $value;
	}
	
	public function __get( $name ) {
		return $this->$name;
	}
	
	
	public function __toString() {
		$cookie = new Cookie( 'c1', 'v1' );
		var_dump( (string)$cookie );
		return  'HTTP/1.1 '        . $this->status            . PHP_EOL .
				'Date: '           . date(' Y-m-d H:i:s')     . PHP_EOL .
				'Server: '         . Shoshone::IDENTIFIER   . PHP_EOL .
				'Content-Length: ' . strlen( $this->content ) . PHP_EOL .
				'Content-Type: '   . $this->contentType . '; charset=' . $this->encoding       . PHP_EOL .
				'ETag: "' . uniqid('etag-', true) . '"' . PHP_EOL . 
				'Set-Cookie: ' . (string)$cookie .
				PHP_EOL.
				$this->content;
	}
}
?>
