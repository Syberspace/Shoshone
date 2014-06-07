<?php
class Request {
	var $fields;
	
	public function __construct( $request ) {
		$this->parseRequestHeaders( $request );
	}
	
	private function parseRequestHeaders( $headers ) {
		foreach ( preg_split( "/((\r?\n)|(\r\n?))/", $headers ) as $line ) {
			if ( $line ) {
				$http_methods = implode( '|', ShoshoneUtil::$HTTP_METHODS );
				if ( preg_match('/^(' . $http_methods . ')\s+(\S+)\s+HTTP\/(\d+\.\d+)$/', $line, $matches ) ) {
					$this->fields['Method'] = $matches[1];
					$this->fields['File'] = $matches[2];
					$this->fields['Protocol'] = $matches[3];
				} else {
					list( $field, $value ) = explode( ':', $line );
					$this->fields[$field] = $value;
				}
			}
		}
		
		var_dump($this->fields);
	}
}
?>
