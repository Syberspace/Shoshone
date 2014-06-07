<?php

class ShoshoneUtil {

	public static $HTTP_METHODS = array(
		'GET',
		'POST',
		'HEAD',
		'PUT',
		'DELETE',
		'TRACE',
		'OPTIONS',
		'CONNECT',
	);

	public static function str_firstword( $haystack ) {
		return substr( $haystack, 0, strpos( $haystack, ' ' ) );
	}

	public static function str_startswith( $haystack, $needle ) {
		return $needle === "" || strpos( $haystack, $needle ) === 0;
	}

	public static function str_endswith( $haystack, $needle ) {
		return $needle === "" || substr( $haystack, -strlen( $needle )) === $needle;
	}
	
	public static function camel2Dashed( $camel ) {
		return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1-', $camel));
	}
	
	public static function path2Webroot( $path ) {
		return Shoshone::WEBROOT . $path;
	}
}

function __autoload( $class_name ) {
	require_once ShoshoneUtil::camel2Dashed( $class_name ) . '.class.php';
}

?>
