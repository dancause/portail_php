<?php
require ("callrest.php");
$instance_url = "https://harnois.sugarondemand.com/rest/v11/oauth2/token";
$username = $_POST['username'];
$password = $_POST['password'];


$oauth2_token_arguments = array(
    "grant_type" => "password",
    "client_id" => "sugar", 
    "client_secret" => "",
    "username" => $username,
    "password" => $password,
    "platform" => "custom_api" 
);


$auth_request = curl_init($instance_url);
curl_setopt($auth_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
curl_setopt($auth_request, CURLOPT_HEADER, false);
curl_setopt($auth_request, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($auth_request, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($auth_request, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($auth_request, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json"
));


$json_arguments = json_encode($oauth2_token_arguments);
curl_setopt($auth_request, CURLOPT_POSTFIELDS, $json_arguments);



$oauth2_token_response = curl_exec($auth_request);
$oauth2_token_response_obj = json_decode($oauth2_token_response);


      $session_id = $oauth2_token_response_obj->access_token;


      $instance_url = "https://harnois.sugarondemand.com/rest/v11/me";

$oauth2_token_response_obj = get_user($session_id, $instance_url);

      $user = $oauth2_token_response_obj->current_user->id;
      $name = $oauth2_token_response_obj->current_user->user_name;
      $langue = $oauth2_token_response_obj->current_user->preferences->language;

      header("Location: accountlist.php?user=".$user."&session_id=".$session_id."&name=".$name."&langue=".$langue);

?>