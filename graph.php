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

function getCheevosURLs() {
  global $appId;
  $data =
    call($appId.'/achievements',
         array('achievement' => $cheevo)
        );
  $cheevos = json_decode($data)->data;
  $urls = array();
  foreach ($cheevos as $cheevo) {
    $cheevo = (array)$cheevo;
    $urls[] = $cheevo['og:url'];
  }
  return $urls;
}

function getCheevoURLById($id) {
  $urls = getCheevosURLs();
  foreach ($urls as $url) {
    if (substr($url,-1) == $id) {
      return $url;
    }
  }
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
    $cheevo = urlencode(getCheevoURLById($_REQUEST['cheevo']));
    $response =
      call($userId.'/achievements',
           array('achievement' => $cheevo),
           "POST"
          );
     break;
  case 'remove_cheevo':
    $cheevo = urlencode(getCheevoURLById($_REQUEST['cheevo']));
    $response =
      call($userId.'/achievements',
           array('achievement' => $cheevo),
           "DELETE"
          );
    break;
  case 'reregister':
    $response = '';

    $urls = getCheevosURLs();
    foreach ($urls as $url) {
      $response .= 'Removing '.$url.' -> ';
      $response .= call($appId.'/achievements',
                        array('achievement' => urlencode($url)),
                        "DELETE"); 
      $response .= '<br>';
    }
    
    for ($i = 0; $i<7; $i++) {
      $url = 'http://apps.'.$_REQUEST['sub'].'facebook.com/mwawro_game/?action=achievement&id='.$i;
      $response .= 'Registering '.$url.' -> ';
      $response .= call($appId.'/achievements',
                        array('achievement' => urlencode($url)),
                        "POST");
      $response .= '<br>';
    }
}

echo $response;
