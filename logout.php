<?php

require_once ("callrest.php");
		$url = "https://harnois.sugarondemand.com/rest/v11";
		$ouath = "/oauth2/logout";
		$session_id = $_GET['session_id'];
		validate($session_id);
		$logou_url = $url.$ouath;
		logout_app($logou_url,$session_id);
		header('Location: login.html');

?>