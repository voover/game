<?php

$ch = curl_init('https://graph.facebook.com/maciek.wawro');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo "<html><head></head><body>"
echo $response;
echo "</body></html>";
