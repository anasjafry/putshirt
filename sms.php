<?php
function sender($mobile, $content)
{
# Plivo AUTH ID
$AUTH_ID = 'MANZY3OWIWYTKZNJG4MT';
# Plivo AUTH TOKEN
$AUTH_TOKEN = 'MjFmZmE2MjNiZjk1M2VmNTMyMGNhNTI4ZmIxNjg4';
# SMS sender ID.
$src = '+917299939974';
# SMS destination number
$dst = '+91'.$mobile;
# SMS text
$text = $content;
$url = 'https://api.plivo.com/v1/Account/'.$AUTH_ID.'/Message/';
$data = array("src" => "$src", "dst" => "$dst", "text" => "$text");
$data_string = json_encode($data);
$ch=curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
curl_setopt($ch, CURLOPT_USERPWD, $AUTH_ID . ":" . $AUTH_TOKEN);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$response = curl_exec( $ch );
curl_close($ch);
}
?>
