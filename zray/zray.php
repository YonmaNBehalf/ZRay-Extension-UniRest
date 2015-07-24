<?php

$zre = new ZRayExtension('unirest');

$zre->setEnabledAfter('Unirest::request');

$zre->traceFunction('Unirest::request', function($context, &$storage){}, function($context, &$storage){
	/* @var \Unirest\HttpResponse */
	$result = $context['returnValue']; /* @var $result \Unirest\HttpResponse */

    $resultHeaders = array();
    $resultBody = '';
    $resultRawBody = '';
    $resultCode = 0;

	if ($result instanceof \Unirest\HttpResponse) {
        $resultHeaders = $result->headers;
		$resultBody = $result->body;
		$resultRawBody = $result->raw_body;
		$resultCode = $result->code;
	}

    $storage['BackendApi'][] = array(
		'method' => $context['functionArgs'][0],
		'url' => $context['functionArgs'][1],
		'requestHeaders' => $context['functionArgs'][3],
		'requestPayload' => $context['functionArgs'][2],
        'responseRawBody' => $resultRawBody,
		'responseHeaders' => $resultHeaders,
		'responsePayload' => $resultBody,
		'responseCode' => $resultCode,
    );

});