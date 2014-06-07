<?php
class RequestParser {
	public static function getMimeInfo( $file ) {
		$fi = finfo_open( FILEINFO_MIME_TYPE );
		$info = finfo_file( $fi, $file, FILEINFO_MIME_TYPE );
		
		if ( 'text/plain' === $info || 'text/x-php' == $info ) {
			$ext = pathinfo( $file, PATHINFO_EXTENSION );
			echo $ext.PHP_EOL;
			switch( $ext ) {
				case 'css':  $info = 'text/css';               break;
				case 'htm':
				case 'html': $info = 'text/html';              break;
				case 'js':   $info = 'application/javascript'; break;
			}
		}
		return $info;
	}
	
	
}
?>
