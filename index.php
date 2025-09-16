<?php

function parseUrl($url) {
    $params = [];
    
    $parsedUrl = parse_url($url);
    $scheme = $parsedUrl['scheme'];
    $host = $parsedUrl['host'];
    $path = $parsedUrl['path'];
    $query = $parsedUrl['query'];
    
    return [$scheme, $host, $path, $query, $params];
}

function reverseString($string) {
    return strrev($string);
}

function calculateFactorial($n) {
    if ($n <= 1) {
        return 1;
    }
    return $n * calculateFactorial($n - 1);
}

function getUrlInfo($params) {
    if (empty($params)) {
        return null;
    }
    $firstKey = array_key_first($params);
    $firstValue = $params[$firstKey];
    return $firstValue;
}

function showResponse($scheme, $host, $params, $reversValue, $factorial) {
        
        echo $reversValue . "\n\n";

        echo $factorial . "\n\n";

        echo "host: " . $scheme . "://" . $host . "\n";

        echo "GET:\n";
        
        foreach ($params as $key => $value) {
            echo $key . " = " . $value . "\n";
        }
}

$url = $argv[1];

list($scheme, $host, $path, $query, $params) = parseUrl($url);

$firstValue = getUrlInfo($params);
// $paramCount = count($params);
$factorial = calculateFactorial(+$params);
$reversValue = reverseString($firstValue ?? '');

showResponse($scheme, $host, $params, $reversValue, $factorial);
?>