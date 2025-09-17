<?php

$url = implode('', array_slice($argv, 1));

function parseUrl($url)
{
    $params = [];

    $parsedUrl = parse_url($url);
    $scheme = $parsedUrl['scheme'];
    $host = $parsedUrl['host'];
    $path = $parsedUrl['path'];
    $query = $parsedUrl['query'];

    if (! empty($query)) {
        parse_str($query, $params);
    }

    return [$scheme, $host, $path, $query, $params];
}

function reverseString($string)
{
    return strrev($string);
}

function calculateFactorial($n, $acc = 1)
{
    if ($n === 0) {
        return $acc;
    }

    return calculateFactorial($n - 1, $n * $acc);
}

function getUrlInfo($params)
{

    $firstKey = array_key_first($params);
    $firstValue = $params[$firstKey];

    return $firstValue;
}

function showResponse($scheme, $host, $params, $reversValue, $factorial)
{
    $result = $reversValue . "\n\n" . $factorial . "\n\n" . "host: " . $scheme . "://" . $host . "\n" . "GET:\n";

    foreach ($params as $key => $value) {
        $result .= $key . " = " . $value . "\n";
    }
    echo $result;
}

$url = $argv[1];

list($scheme, $host, $path, $query, $params) = parseUrl($url);

$firstValue = getUrlInfo($params);
$factorial = calculateFactorial(count($params));
$reversValue = reverseString($firstValue);

showResponse($scheme, $host, $params, $reversValue, $factorial);
