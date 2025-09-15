<?php

$url = $argv[1];

$parsedUrl = parse_url($url);

$scheme = $parsedUrl['scheme'];
$host = $parsedUrl['host'];
$path = $parsedUrl['path'];
$query = $parsedUrl['query'];

$params = array();
parse_str($query, $params);

$firstKey = array_key_first($params);
$firstValue = $params[$firstKey];
$reversValue = strrev($firstValue);
echo $reversValue . "\n\n";

$paramCount = count($params);
$factorial = calculateFactorial($paramCount);
echo $factorial . "\n\n";

echo "host: " . $scheme . "://" . $host . "\n";

echo "GET:\n";
    
foreach ($params as $key => $value) {
    echo $key . " = " . $value . "\n";
}
    
function calculateFactorial($n) {
    if ($n <= 1) {
        return 1;
    }
    return $n * calculateFactorial($n - 1);
}
?>