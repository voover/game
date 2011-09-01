<?php

$appId = '193092110746101';
$clientSecret = '839d9192d9d01933f498f87d28597562';

$accessToken = "";

function call($path, $args, $method = null) {
  global $GRAPH_URL, $accessToken;
  $url = $GRAPH_URL . $path . $accessToken;
  foreach ($args as $key=>$value) {
    $url .= '&'.$key.'='.$value;
  }
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  if($method) {
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
  }
  $response = curl_exec($ch);
  curl_close($ch);  
  return $response;
}

$accessToken =
  call('oauth/access_token',
    array('client_id' => $appId,
          'client_secret' => $clientSecret,
           'redirect_uri' => 'http://tenar.megiteam.pl/game/',
           'grant_type' => 'client_credentials'));

$accessToken = '?'.$accessToken;

$what = $_REQUEST['what'];
$userId = $_REQUEST['uid'];
switch ($what) {
  case 'grant_cheevo':
    $cheevo = urlencode('http://apps.facebook.com/mwawro_game/?action=achievement&id='.$_REQUEST['cheevo']);
    $response =
      call($userId.'/achievements',
           array('achievement' => $cheevo),
           "POST"
          );
     break;
  case 'remove_cheevo':
    $cheevo = urlencode('http://apps.facebook.com/mwawro_game/?action=achievement&id='.$_REQUEST['cheevo']);
    $response =
      call($userId.'/achievements',
           array('achievement' => $cheevo),
           "DELETE"
          );
}

echo $response;
