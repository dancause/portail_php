<?php 
require ("callrest.php");

		//validate($formResponce['session_id']);

		if($_POST['type']==='Accounts'){
		accounts_put($_POST);

		} else if($_POST['type']==='Opportunities'){

		Opportunities_put($_POST);

		} else if($_POST['type']==='Opportunity_add'){
			Opportunity_add($_POST);
		}

header("Location: detailaccount.php?id=".$_POST['session_id']."&account=".$_POST['account_id']."&name=".$_POST['name']."&langue=".$_POST['langue']);


function accounts_put($formResponce){

		$url = "api_link";
		$favorite_url = $url .$rest . "/Accounts/".$formResponce['account_id'];
		$updated_value = array(
					"id" => $formResponce['account_id'],
					"statut_compte_c" => $formResponce['statut_compte_c'],
					"account_type" => $formResponce['account_type'],
					"industry" => $formResponce['industry'],
					"division_c" => $formResponce['division_c'],
					"secteur_c" => $formResponce['secteur_c'],
					"language_preference_c" => $formResponce['language_preference_c'],
					"shipping_address_street" => $formResponce['shipping_address_street'],
					"shipping_address_city" => $formResponce['shipping_address_city'],
					"shipping_address_state" => $formResponce['shipping_address_state'],
					"shipping_address_postalcode" => $formResponce['shipping_address_postalcode'],
					"shipping_address_country" => $formResponce['shipping_address_country'],
					"billing_address_street" => $formResponce['billing_address_street'],
					"billing_address_city" => $formResponce['billing_address_city'],
					"billing_address_state" => $formResponce['billing_address_state'],
					"billing_address_postalcode" => $formResponce['billing_address_postalcode'],
					"billing_address_country" => $formResponce['billing_address_country'],
					"phone_office" => $formResponce['phone_office'],
					"phone_alternate" => $formResponce['phone_alternate'],
					"website" => $formResponce['website'],
					"description" => $formResponce['description'],
					"contact_favori_1_c" => $formResponce['contact_favori_1_c'],
					"contact_favori_tel_1_c" => $formResponce['contact_favori_tel_1_c'],
					"contact_favori_mail_1_c" => $formResponce['contact_favori_mail_1_c'],
					"email" => array( 0 => array('email_address' =>$formResponce['email'], )),
				);
		$res = call_put($favorite_url,$formResponce['session_id'],$updated_value);

}

function Opportunities_put($formResponce){

		$url2 = "api_link";
		$loop = sizeof($formResponce['id']);

		for($i = 0 ; $i < $loop; $i++){
			$id = $formResponce['id'][$i];
			
			$divi = array();
			foreach ($formResponce['division'][$id] as $temp => $value) {
				$divi[]= $value;
			}

			$struc = array();
			foreach ($formResponce['Structure'][$id] as $temp => $value) {
				$struc[]= $value;
			}

			$qualif = array();
			foreach ($formResponce['Qualification'][$id] as $temp => $value) {
				$qualif[]= $value;
			}

			$grprod_c = array();
			foreach ($formResponce['grprod_c'][$id] as $temp => $value) {
				$grprod_c[]= $value;
			}


		$updated_value = array(
			"id" => $id, 
			"secteur_c" => $formResponce['secteur_c'][$id],
			"project_c" => $formResponce['project_c'][$id],
			"numero_projet_c" => $formResponce['numero_projet_c'][$id],
			"quantity_project_c" => $formResponce['quantity_project_c'][$id],
			"hauteur_c" => $formResponce['hauteur_c'][$id],
			"largeur_c" => $formResponce['largeur_c'][$id],
			"longueur_c" => $formResponce['longueur_c'][$id],
			"superficie_c" => $formResponce['superficie_c'][$id],
			"unite_c" => $formResponce['unite_c'][$id],
			"etape_projet_c" => $formResponce['etape_projet_c'][$id],
			"budget_projet_c" => $formResponce['budget_projet_c'][$id],
			"description" => $formResponce['description'][$id],
			"date_estimee_projet_c" => date(DATE_ATOM,strtotime($formResponce['date_estimee_projet_c'][$id])),
			"qualification_client_c" => $qualif,
			"structure_c" => $struc,
			"division_c" => $divi,
			"grprod_c" => $grprod_c,
		);

		$favorite_url2 = $url2 . "/Opportunities/".$formResponce['id'][$i];
		$url2 = "api_link";
		$res = call_put($favorite_url2,$formResponce['session_id'],$updated_value);

		}
}

function opportunity_add($formResponce){
	echo"<pre>";
			$url2 = "api_link";
			$updated_value = array(
				"name" => $formResponce['name_opp'],
				"secteur_c" => $formResponce['secteur_c'],
				"project_c" => $formResponce['project_c'],
				"numero_projet_c" => $formResponce['numero_projet_c'],
				"quantity_project_c" => $formResponce['quantity_project_c'],
				"hauteur_c" => $formResponce['hauteur_c'],
				"largeur_c" => $formResponce['largeur_c'],
				"longueur_c" => $formResponce['longueur_c'],
				"superficie_c" => $formResponce['superficie_c'],
				"unite_c" => $formResponce['unite_c'],
				"etape_projet_c" => $formResponce['etape_projet_c'],
				"budget_projet_c" => $formResponce['budget_projet_c'],
				"description" => $formResponce['description'],
				"qualification_client_c" => $formResponce['Qualification'],
				"date_estimee_projet_c" => date(DATE_ATOM,strtotime($formResponce['date_estimee_projet_c'])),
				"structure_c" => $formResponce['Structure'],
				"division_c" => $formResponce['division'],
				"account_id" => $formResponce['account_id'],
				"grprod_c" => $formResponce['grprod_c'],

				"Accounts"=>array( 
					array(
						"add"=>$formResponce['account_id'],
							)
				),
			);
			print_r($updated_value);
			$favorite_url2 = $url2 . "/Opportunities";
			$res = call_post($favorite_url2,$formResponce['session_id'],$updated_value);
			print_r($res);
}
?>