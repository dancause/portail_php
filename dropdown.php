<?php 

$url =  "link_api";
$rest = '/Opportunities/enum/';

$temp_url = $url.$rest.'division_c';
$app_list_strings['division_c'] = json_decode(call_get($temp_url,$session_id));

$temp_url = $url.$rest.'secteur_c';
$app_list_strings['secteur_c'] =  json_decode(call_get($temp_url,$session_id));

$temp_url = $url.$rest.'structure_c';
$app_list_strings['structure_c'] = json_decode(call_get($temp_url,$session_id));

$temp_url = $url.$rest.'qualification_client_c';
$app_list_strings['qualification_client_c'] =  json_decode(call_get($temp_url,$session_id));

$temp_url = $url.$rest.'unite_c';
$app_list_strings['unite_c'] =  json_decode(call_get($temp_url,$session_id));

$temp_url = $url.$rest.'project_c';
$app_list_strings['project_c'] = json_decode(call_get($temp_url,$session_id));

$temp_url = $url.$rest.'etape_projet_c';
$app_list_strings['etape_projet_c'] = json_decode(call_get($temp_url,$session_id));

$temp_url = $url.$rest.'grprod_c';
$app_list_strings['grprod_c'] = json_decode(call_get($temp_url,$session_id));

$rest = '/Accounts/enum/';
$temp_url = $url.$rest.'language_preference_c';
$app_list_strings['language_preference_c'] = json_decode(call_get($temp_url,$session_id));

$temp_url = $url.$rest.'statut_compte_c';
$app_list_strings['statut_compte_c'] =  json_decode(call_get($temp_url,$session_id));

$temp_url = $url.$rest.'industry';
$app_list_strings['industry'] =  json_decode(call_get($temp_url,$session_id));

$temp_url = $url.$rest.'account_type';
$app_list_strings['account_type'] =  json_decode(call_get($temp_url,$session_id));

?>