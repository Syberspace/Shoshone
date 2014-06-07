<?php

require_once 'server-util.class.php';

$sock = socket_create( AF_INET, SOCK_STREAM, SOL_TCP );
$port = 80;
echo PHP_EOL;
echo 'Starting server on port ' . $port . PHP_EOL;
echo 'PHP version: ' . phpversion() . PHP_EOL;
echo PHP_EOL;
socket_bind( $sock, 'localhost', $port);

date_default_timezone_set('Europe/Vienna');

socket_listen( $sock );



while ( $res = socket_accept( $sock ) ) {

	$request = '';
	while ( $chr = socket_read( $res, 1 ) ) {
		$request .= $chr;
	}
	echo $request . PHP_EOL;
	$response = Shoshone::parse_request( $request, $res );
	
	
			
	socket_write( $res, (string)$response );
	
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
		if ( '/' === $file || '' === $file ) $file = 'index.php';
		
		$file = ShoshoneUtil::path2webroot( $file );
		$mime = RequestParser::getMimeInfo( $file );
		
		$response = new Response();
		$response->contentType = $mime;
		$content = '';
		
		switch( $mime ) {
			case 'image/png': 
				$f = fopen( $file, 'r' );
				$content = fread( $f, filesize( $file ) );
				$content = (file_get_contents( $file ));
				fclose( $f );
			break;
			default:

				ob_start();
	
				include $file;
				$content = ob_get_contents();
	
				ob_end_clean();
				$response->contentType = 'text/html';
			break;
		}
		
		$response->content = $content;

	
		return $response;
	}
}


?>
