<?php
class ResponseStatus {

	//2xx
	const OK                         = '200 OK';
	const ACCEPTED                   = '202 Accepted';
	const NO_CONTENT                 = '204 No Content';
	
	//3xx
	const MULTIPLE_CHOICES           = '300 Multiple Choices';
	const NOT_MODIFIED               = '304 Not Modified';
	
	
	//4xx
	const BAD_REQUEST                = '400 Bad Request';
	const FORBIDDEN                  = '403 Forbidden';
	const NOT_FOUND                  = '404 Not Found';
	const METHOD_NOT_ALLOWED         = '405 Method Not Allowed';
	const NOT_ACCEPTABLE             = '406 Not acceptable';
	const REQUEST_TIMEDOUT           = '408 Request Time-out';
	const GONE                       = '410 Gone';
	const TEAPOT                     = "418 I'm a teapot";
	const LOCKED                     = '423 Locked';
	const TOO_MANY_REQUESTS          = '429 Too Many Requests';
	
	//5xx
	const INTERNAL_SERVER_ERROR      = '500 Internal Server Error';
	const NOT_IMPLEMENTED            = '501 Not Implemented';
	const SERVICE_UNAVAILABLE        = '503 Service Unavailable';
	const HTTP_VERSION_NOT_SUPPORTED = '505 HTTP Version not supported';
}
?>
