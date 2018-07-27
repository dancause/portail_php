<?php
require ("callrest.php");

	$url = "Link/api";

	$session_id = $_GET['session_id'];
    $name = $_GET['name'];
    $user = $_GET['user'];
    $langue = $_GET['langue'];

validate($session_id);

$lang_file = 'lang.en_us.php';

if($_REQUEST['langue'] == 'fr_FR') {
    $lang_file = 'lang.fr_FR.php';
} else if($_REQUEST['lang'] == 'es_ES') {
    $lang_file = 'lang.es_ES.php';
}

require_once($lang_file);

$filter_url = $url . $rest."/Accounts/filter";

$filter_arguments = array(
    "filter" => array(
       
                array(

                    "assigned_user_id" => array(
                        '$starts'=>$user,
                    )
                )
        ),

    "offset" => 0,
    "fields" => array("id","name","statut_compte_c","email","shipping_address_city","date_modified","assigned_user_id","phone_office"),
    "order_by" => "date_entered",
    "favorites" => false,
    "my_items" => false,
);

$results= call_filter($filter_url,$session_id,$filter_arguments);


if($results->error==="invalid_grant"){

header('Location: login.html');

}else{

    require_once('list.php');
}

?>
