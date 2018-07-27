<?php
require ("callrest.php");

	$url = "link_api";

    $account_id = $_GET['account'];
    $session_id = $_GET['id'];
    $name = $_GET['name'];
    $langue = $_GET['langue'];
    $user = $_GET['user'];
validate($session_id);

$lang_file = 'lang.en_us.php';

if($_REQUEST['langue'] == 'fr_FR') {
    $lang_file = 'lang.fr_FR.php';
} else if($_REQUEST['lang'] == 'es_ES') {
    $lang_file = 'lang.es_ES.php';
}

require_once($lang_file);
require_once("dropdown.php");


$favorite_url = $url . "/Accounts/".$account_id;
$result = call_get($favorite_url,$session_id);
$arrResult = json_decode($result);

$filter_url = $url . "/Opportunities/filter";
$filter_arguments = array(
    "filter" => array(   
                array(
                    "account_id" => array(
                        '$starts'=>$account_id,
                    )
                )      
        ),
    "offset" => 0,
    "order_by" => "date_entered",
    "favorites" => false,
    "my_items" => false,
);


$opp_results= call_filter($filter_url,$session_id,$filter_arguments);
$compteur = 0;
$opp_nb = sizeof($opp_results->records);

validate($session_id);
require_once('detail_list.php');

?>


