<?php
class RequestParser {
	public static function getMimeInfo( $file ) {
		$fi = finfo_open( FILEINFO_MIME_TYPE );
		$info = finfo_file( $fi, $file, FILEINFO_MIME_TYPE );
		return $info;
	}
}
?>
