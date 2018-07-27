<?php

     function call($oauth2_token_arguments, $auth_url)
    {

        $auth_request = curl_init($auth_url);
        curl_setopt($auth_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($auth_request, CURLOPT_HEADER, false);
        curl_setopt($auth_request, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($auth_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($auth_request, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($auth_request, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"
        ));

        //convert arguments to json
        $json_arguments = json_encode($oauth2_token_arguments);
        curl_setopt($auth_request, CURLOPT_POSTFIELDS, $json_arguments);

        //execute request
        $oauth2_token_response = curl_exec($auth_request);

        //decode oauth2 response to get token
        $oauth2_token_response_obj = json_decode($oauth2_token_response);
        $oauth_token = $oauth2_token_response_obj->access_token;

        return $oauth_token;
    }
//$resultat = call_filter($filter_url,$session_id,$filter_arguments);

function call_get($favorite_url,$session_id){

$favorite_request = curl_init($favorite_url);

curl_setopt($favorite_request, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($favorite_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
curl_setopt($favorite_request, CURLOPT_HEADER, false);
curl_setopt($favorite_request, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($favorite_request, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($favorite_request, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($favorite_request, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "oauth-token: {$session_id}"
));

$favorite_response = curl_exec($favorite_request);
//print_r($favorite_response);
return $favorite_response;
}

function call_filter($filter_url,$session_id,$filter_arguments){

            $filter_request = curl_init($filter_url);
            curl_setopt($filter_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
            curl_setopt($filter_request, CURLOPT_HEADER, false);
            curl_setopt($filter_request, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($filter_request, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($filter_request, CURLOPT_FOLLOWLOCATION, 0);
            curl_setopt($filter_request, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/json",
                "oauth-token: {$session_id}"
            ));


            //convert arguments to json
            $json_arguments = json_encode($filter_arguments);

            curl_setopt($filter_request, CURLOPT_POSTFIELDS, $json_arguments);

            //execute request
            $filter_response = curl_exec($filter_request);

            //decode json
            $filter_response_obj = json_decode($filter_response);

            return $filter_response_obj;
}


function call_put($url,$session_id,$record){

$curl_request = curl_init($url);
curl_setopt($curl_request, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
curl_setopt($curl_request, CURLOPT_HEADER, false);
curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($curl_request, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "oauth-token: {$session_id}"
));

//convert arguments to json
$json_arguments = json_encode($record);

curl_setopt($curl_request, CURLOPT_POSTFIELDS, $json_arguments);
//execute request
$curl_response = curl_exec($curl_request);

//decode json
$updatedRecord = json_decode($curl_response);

//print_r($updatedRecord);

//display the created record
curl_close($curl_request);
return $updatedRecord;
}

function call_post($url,$session_id,$record){

$curl_request = curl_init($url);
curl_setopt($curl_request, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
curl_setopt($curl_request, CURLOPT_HEADER, false);
curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($curl_request, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "oauth-token: {$session_id}"
));

//convert arguments to json
$json_arguments = json_encode($record);

curl_setopt($curl_request, CURLOPT_POSTFIELDS, $json_arguments);
//execute request
$curl_response = curl_exec($curl_request);

//decode json
$updatedRecord = json_decode($curl_response);

//print_r($updatedRecord);

//display the created record
curl_close($curl_request);
return $updatedRecord;
}


function logout_app($logout_url,$oauth_token){

//print_r($logout_url);
$logout_request = curl_init($logout_url);
curl_setopt($logout_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
curl_setopt($logout_request, CURLOPT_HEADER, false);
curl_setopt($logout_request, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($logout_request, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($logout_request, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($logout_request, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "oauth-token: {$oauth_token}"
));

//set empty post fields
curl_setopt($logout_request, CURLOPT_POSTFIELDS, array());

//execute request
$oauth2_logout_response = curl_exec($logout_request);
return $oauth2_logout_response;
}

function validate($session_id){
$instance_url = "https://harnois.sugarondemand.com/rest/v11/me";

      $auth_request = curl_init($instance_url);
      curl_setopt($auth_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
      curl_setopt($auth_request, CURLOPT_HEADER, false);
      curl_setopt($auth_request, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($auth_request, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($auth_request, CURLOPT_FOLLOWLOCATION, 0);
      curl_setopt($auth_request, CURLOPT_HTTPHEADER, array(
          "Content-Type: application/json",
           "oauth-token: {$session_id}"
           ));

      $oauth2_token_response = curl_exec($auth_request);
      $oauth2_token_response_obj = json_decode($oauth2_token_response);
            if ($oauth2_token_response_obj->error === 'invalid_request' or $oauth2_token_response_obj->error === 'need_login' or $oauth2_token_response_obj->error === 'invalid_grant' ){
                header("Location: login.html");
            }
}

function get_user($session_id, $instance_url){

      $auth_request = curl_init($instance_url);
      curl_setopt($auth_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
      curl_setopt($auth_request, CURLOPT_HEADER, false);
      curl_setopt($auth_request, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($auth_request, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($auth_request, CURLOPT_FOLLOWLOCATION, 0);
      curl_setopt($auth_request, CURLOPT_HTTPHEADER, array(
          "Content-Type: application/json",
           "oauth-token: {$session_id}"
           ));

      $oauth2_token_response = curl_exec($auth_request);
      $oauth2_token_response_obj = json_decode($oauth2_token_response);
return $oauth2_token_response_obj;

}
?>