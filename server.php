<?php

require_once 'shoshone-util.class.php';

$sock = socket_create( AF_INET, SOCK_STREAM, SOL_TCP );
$port = 80;

echo 'opening socket on port ' . $port . PHP_EOL;
echo 'this could take a while if port ' . $port . ' is currently being used' . PHP_EOL;
do {
	$connect = @socket_bind( $sock, 'localhost', $port );
} while( !$connect );

echo PHP_EOL;
echo 'Starting server on port ' . $port . PHP_EOL;
echo 'PHP version: ' . phpversion() . PHP_EOL;
echo PHP_EOL;

date_default_timezone_set('Europe/Vienna');

socket_listen( $sock );



while ( $res = socket_accept( $sock ) ) {

	$str_request = '';
	$chr = true;
	while ( socket_recv( $res, $chr, 1, MSG_WAITALL ) ) {#= socket_read( $res, 1 ) ) {
		$str_request .= $chr;
		echo ($chr);
		if ( ShoshoneUtil::str_endswith( $str_request, chr(13).chr(10).chr(13).chr(10) ) ) break;
	}
	echo $str_request . PHP_EOL;
	
	$reqeust = new Request( $str_request );
	
	$response = Shoshone::parse_request( $str_request, $res );
	
	
	$r = (string)$response;
	socket_write( $res, $r );

	
	socket_close( $res );
	
	echo PHP_EOL.'-------'.PHP_EOL;
}


class Shoshone {
	
	const IDENTIFIER = 'Shoshone/0.0.1';
	const WEBROOT    = 'webroot/';
	
	public static function parse_request( $request = '', $socket ) {
		if ( strlen( $request ) ) {
			$fields = explode( PHP_EOL, $request );
		
			$method = ShoshoneUtil::str_firstword( $fields[0] );
		
			$protocol = strlen($fields[0]) - strpos( $fields[0], 'HTTP' )+1;
			$file = substr( $fields[0], strlen( $method ) + 2 ,  -$protocol );
		
			$content = '';
		
			switch( $method ) {
				case 'GET':
					#echo 'get: ' . $protocol . $file.'|'.PHP_EOL;
					$content = Shoshone::server_get( $file );
					
				break;
				case 'POST':
				break;
				case 'HEAD':
				break;
				default:
			}	
		
			return $content;
		}
	
		return null;
	}

	public static function server_get ( $file ) {
		if ( '/' === $file || '' === $file ) $file = 'index.html';
		
		$file = ShoshoneUtil::path2webroot( $file );
		$mime = RequestParser::getMimeInfo( $file );
		
		$response = new Response();
		$response->contentType = $mime;

		$response->content = file_get_contents( $file ); 

	
		return $response;
	}
}


?>
