<!DOCTYPE HTML>

<html>
    <head>
        <title><?php echo $lang['title_detail_comptes']; ?></title>
        
          <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" type="text/css"/>
<link rel="stylesheet" href="http://www.irsst.qc.ca/Resources/IrsstModules/multiselect_widget/jquery.multiselect.filter.css" type="text/css"/>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" type="text/css"/>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" type="text/css"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<link rel="stylesheet" href="http://www.irsst.qc.ca/Resources/IrsstModules/multiselect_widget/jquery.multiselect.css">
<body>
<div class="container-fluid">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
        <script src="bootstrap/jquery.multiselect.filter.js"></script>

  <script>$( function() {$( "#tabs" ).tabs();} );</script>

        <div class="row">
            <div class="col-sm-8"><img src="link_logo.jpg" alt="name_logo" class="img-fluid"></div>
            <div class="col-sm-4">
            <div class="row">
                <div class="col-6 text-uppercase"><p><?php echo $lang['USER_CONNECTED']; ?><?php echo $name ?></p></div>
                <div class="col-6"><a href="logout.php?session_id=<?php echo $session_id ?>" style="text-decoration: none"><p style="text-align: right;"><?php echo $lang['Logout'] ?>></a></p></div>
            </div>
          </div>
        </div>
<br>
<div class="row">
  
  <div class="col-6">
      <h4><?php echo $arrResult->name; ?><a href="accountlist.php?user=<?php echo $user ?>&session_id=<?php echo $session_id ?>&&name=<?php echo $name ?>&langue=<?php echo $langue?>" style="text-decoration: none"> <img src="reply.svg" atl="return" face" width="30" height="30"></a></h4>


  </div>
  <div class="col-6">
   <h4 style="text-align: right;"><a href="/login" style="text-decoration: none">EZ Quote</a></h4>
  </div>
</div>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1"><?php echo $lang['Detail'] ?></a></li>
    <li><a href="#tabs-2"><?php echo $lang['Opportunities'] ?>(<?php echo $opp_nb ?>)</a></li>
    <li><a href="#tabs-3"><?php echo $lang['added'] ?></a></li>
  </ul>
  <div id="tabs-1">

  <form method="POST" action="savedata.php">

    <input type="submit" class="btn btn-primary" value="<?php echo $lang['submit'] ?>"/ >
    <input type="reset" class="btn btn-primary" value="<?php echo $lang['reset'] ?>"/>
    <hr>
    <h3><?php echo $lang['General_info'] ?></h3>
<div class="row">
   <div class="col-md-4 form-group">
    <label for=""><?php echo $lang['Status'] ?></label>
   <select name="statut_compte_c" class="form-control" value="<?php echo $arrResult->statut_compte_c ?>">

            <?php
            foreach($app_list_strings['statut_compte_c'] as $key=>$value) {
                 $selected="";
              if($key === $arrResult->statut_compte_c ){
                $selected='selected="selected"';
              }
                echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
            }       
                ?>
      </select>

  </div>
    <div class="col-md-4 form-group"> <label for=""><?php echo $lang['Type'] ?></label>
   <select name="account_type" class="form-control" value="<?php echo $arrResult->account_type ?>">
     <?php
            foreach($app_list_strings['account_type'] as $key=>$value) {
              $selected="";
              if($key === $arrResult->account_type ){
                $selected='selected="selected"';
              }
                echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
            }       
      ?>
      </select>

    </div>

    <div class="col-md-4 form-group"> <label for=""><?php echo $lang['Industry'] ?></label>
    <select name="industry" class="form-control" value="<?php echo $arrResult->industry ?>">
             <?php
            foreach($app_list_strings['industry'] as $key=>$value) {
                $selected="";
              if($key === $arrResult->industry  ){
                $selected='selected="selected"';
              }
                echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
            }       
                ?>

      </select>

    </div>
  </div>

<div class=row>
   <div class="col-md-4 form-group">  <label for=""><?php echo $lang['Division'] ?></label>
     <select name="division_c" class="form-control" value="<?php echo $arrResult->division_c ?>" required>
    
     <?php
            foreach($app_list_strings['division_c'] as $key=>$value) {
                   $selected="";
              if($key === $arrResult->division_c  ){
                $selected='selected="selected"';
              }
                echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
            }       
                ?>

      </select>

   </div>

    <div class="col-md-4 form-group"> <label for=""><?php echo $lang['Secteur'] ?></label>
    <select name="secteur_c" class="form-control" value="<?php echo $arrResult->secteur_c ?>">
     <?php
            foreach($app_list_strings['secteur_c'] as $key=>$value) {
                     $selected="";
              if($key === $arrResult->secteur_c  ){
                $selected='selected="selected"';
              }
                echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';} 
      ?>
     </select>
    </div>
    <div class="col-md-4 form-group"> <label for=""><?php echo $lang['Langue'] ?></label>
      <select name="language_preference_c" class="form-control" value="<?php echo $arrResult->language_preference_c ?>"required>
      <?php foreach($app_list_strings['language_preference_c'] as $key=>$value) {
                     $selected="";
              if($key === $arrResult->secteur_c  ){
                $selected='selected="selected"';
              }
                echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';} 
      ?>
      </select>

</div>
</div>
    <hr>
    <h3><?php echo $lang['Shipping'] ?></h3>
<div class=row>
    <div class="col-md-4 form-group"> <label><?php echo $lang['Street'] ?></label><input class="form-control"  type="text" name="shipping_address_street" value="<?php echo $arrResult->shipping_address_street;?>"required></div>
    <div class="col-md-4  form-group"> <label><?php echo $lang['City'] ?></label><input class="form-control"  type="text" name="shipping_address_city" value="<?php echo $arrResult->shipping_address_city;?>"required></div>
    <div class="col-md-4 form-group"> <label><?php echo $lang['State'] ?></label><input class="form-control"  type="text" name="shipping_address_state" value="<?php echo $arrResult->shipping_address_state;?>"required></div>
  </div>
 <div class=row>   
   <div class="col-6 form-group">  <label><?php echo $lang['PostalCode'] ?> code</label><input class="form-control"  type="text" name="shipping_address_postalcode" value="<?php echo $arrResult->shipping_address_postalcode;?>"required></div>
    <div class="col-6 form-group"> <label><?php echo $lang['Country'] ?></label><input class="form-control"  type="text" name="shipping_address_country" value="<?php echo $arrResult->shipping_address_country;?>"required></div>
</div>
 <hr>
 <h3><?php echo $lang['Billing'] ?></h3>
 <div class=row>  
    <div class="col-md-4 form-group"> <label><?php echo $lang['Street'] ?></label><input class="form-control"  type="text" name="billing_address_street" value="<?php echo $arrResult->billing_address_street;?>"required></div>
   <div class="col-md-4 form-group"><label><?php echo $lang['City'] ?></label><input class="form-control"  type="text" name="billing_address_city" value="<?php echo $arrResult->billing_address_city;?>"required></div>
   <div class="col-md-4 form-group"> <label><?php echo $lang['State'] ?></label><input class="form-control"  type="text" name="billing_address_state" value="<?php echo $arrResult->billing_address_state;?>"required></div>
</div>
  <div class=row>     
    <div class="col-6 form-group"> <label><?php echo $lang['PostalCode'] ?></label><input class="form-control"  type="text" name="billing_address_postalcode" value="<?php echo $arrResult->billing_address_postalcode;?>"required></div>
    <div class="col-6 form-group"> <label><?php echo $lang['Country'] ?></label><input class="form-control"  type="text" name="billing_address_country" value="<?php echo $arrResult->billing_address_country;?>"required></div>
</div>
 <hr>
 <h3><?php echo $lang['Communication'] ?></h3>
  <div class=row> 
  
    <div class="col-md-4 form-group"> <label><?php echo $lang['Office_Phone'] ?></label><input class="form-control"  type="text" name="phone_office" value="<?php echo $arrResult->phone_office;?>"required></div>
   <div class="col-md-4 form-group">  <label><?php echo $lang['Phone_Alternate'] ?></label><input class="form-control"  type="text" name="phone_alternate" value="<?php echo $arrResult->phone_alternate;?>"></div>
   <div class="col-md-4 form-group">  <label><?php echo $lang['Email'] ?></label><input class="form-control"  type="text" name="email" value="<?php echo $arrResult->email[0]->email_address;?>"required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"></div>
    </div>
  <div class=row> 
   <div class="col-6 form-group">  <label><?php echo $lang['WEBSITE'] ?></label><input class="form-control"  type="text" name="website" value="<?php echo $arrResult->website;?>"></div>
    <div class="col-6 form-group"> <label><?php echo $lang['Description'] ?></label><input  class="form-control" type="text" name="description" value="<?php echo $arrResult->description;?>"required></div>
    </div>
     <hr>
     <h3><?php echo $lang['FAVCONTACT'] ?></h3>
  <div class=row> 
   
   <div class="col-md-4 form-group">  <label><?php echo $lang['contact_favori_1_c'] ?></label><input  class="form-control" type="text" name="contact_favori_1_c" value="<?php echo $arrResult->contact_favori_1_c;?>"required></div>
  <div class="col-md-4 form-group">   <label><?php echo $lang['contact_favori_tel_1_c'] ?></label><input  class="form-control" type="text" name="contact_favori_tel_1_c" value="<?php echo $arrResult->contact_favori_tel_1_c;?>"></div>
  <div class="col-md-4 form-group">   <label><?php echo $lang['contact_favori_mail_1_c'] ?></label><input  class="form-control" type="text" name="contact_favori_mail_1_c" value="<?php echo $arrResult->contact_favori_mail_1_c;?>"></div>
</div>

<input  class="form-control" type="text" name="idx" value="<?php echo $arrResult->id;?>" style="display:  none;">
<input  class="form-control" type="text" name="type" value="Accounts" style="display:  none;">
<input  class="form-control" type="text" name="session_id" value="<?php echo $session_id;?>" style="display:  none;">
<input  class="form-control" type="text" name="langue" value="<?php echo $langue;?>" style="display:  none;">
<input  class="form-control" type="text" name="name" value="<?php echo $name;?>" style="display:  none;">
<input  class="form-control" type="text" name="account_id" value="<?php echo $account_id;?>" style="display:  none;">

  </form>
  </div>



<div id="tabs-2">





<form method="POST" action="savedata.php">
<?php foreach($opp_results->records as $record){ ?>
<div class="accordion"><?php echo $record->name ?></div>
<div class="panel">



      <div class=row> 
      <div class="col-md-4 form-group">
      <label><?php echo $lang['Division'] ?></label>
          <select class="form-control select " name="division[<?php echo $record->id; ?>][]" multiple="true"required>
              <?php
            foreach($app_list_strings['division_c'] as $key=>$value) {
                $selected = (in_array($key, $record->division_c)) ? 'selected="selected"' : '';
                echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
            }       
                ?>
          </select>
      </div>

      <div class="col-md-4 form-group"><label><?php echo $lang['Secteur'] ?></label>
      <select name="secteur_c[<?php echo $record->id; ?>]" class="form-control" value="<?php echo $record->secteur_c ?>"required>
          <?php
            foreach($app_list_strings['secteur_c'] as $key=>$value) {
                $selected="";
              if($key === $record->secteur_c  ){ $selected='selected="selected"';}
                echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
            }       ?>
      </select>
    </div>

      <div class="col-md-4 form-group"><label><?php echo $lang['Project'] ?></label>
  <select name="project_c[<?php echo $record->id; ?>]" class="form-control " id="yesno-<?php echo $record->id ?>" value="<?php echo $record->project_c ?>" onchange ="yesnonchange('<?php echo $record->id ?>')" required>
                 <?php
            foreach($app_list_strings['project_c'] as $key=>$value) {
                $selected="";
              if($key === $record->project_c  ){ $selected='selected="selected"';}
                echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
            }       ?>

      </select>

      </div>
      </div>


<div class="row product-<?php echo $record->id ?>" <?php if ($record->project_c == 'Yes' or $record->project_c == '') echo 'style="display: none;"'; ?>> 

    <div class="col-md-4 form-group"><label><?php echo $lang['grprod_c'] ?></label>
<select class="form-control select requis_prod<?php echo $record->id; ?>" name="grprod_c[<?php echo $record->id; ?>][]" multiple="true">
              <?php
            foreach($app_list_strings['grprod_c'] as $key=>$value) {
                $selected = (in_array($key, $record->grprod_c)) ? 'selected="selected"' : '';
                echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
            }       
                ?>
          </select>

      </div>
      <div class="col-md-4 form-group">
      </div>
      <div class="col-md-4 form-group">
      </div>
      </div>


  <div class="row hidden_projet-<?php echo $record->id ?>" <?php if ($record->project_c == 'No' or $record->project_c == '') echo 'style="display: none;"'; ?>> 

          <div class="col-md-3 form-group"><label><?php echo $lang['Projet_num'] ?></label><input class="form-control"  type="text" name="numero_projet_c[<?php echo $record->id; ?>]" value="<?php echo $record->numero_projet_c ?>" ></div>

          <div class="col-md-3 form-group"><label><?php echo $lang['date_estimee_projet_c'] ?></label><input  class="form-control datepicker" id="datepicker" type="text" name="date_estimee_projet_c[<?php echo $record->id; ?>]" value="<?php echo $record->date_estimee_projet_c ?>"   title="" placeholder="YYYY-MM-DD">
          </div>


                <div class="col-md-3 form-group"><label><?php echo $lang['Structure'] ?></label>
                      <select class="form-control select" name="Structure[<?php echo $record->id ?>][]" multiple="true">
                      <?php  foreach($app_list_strings['structure_c'] as $key=>$value) {
                            $selected = (in_array($key, $record->structure_c)) ? 'selected="selected"' : '';
                            echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';}
                        ?>
                      </select>
                </div>

          <div class="col-md-3 form-group"><label><?php echo $lang['Quantity'] ?></label><input  class="form-control" type="text" name="quantity_project_c[<?php echo $record->id; ?>]" value="<?php echo $record->quantity_project_c ?>"  pattern= "[-+]?[0-9]*[.,]?[0-9]+"title="<?php echo $lang['FORMATNUMERIC'] ?>" >
          </div>
  </div>

      <div class="row hidden_projet-<?php echo $record->id ?>"  <?php if ($record->project_c == 'No' or $record->project_c == '') echo 'style="display: none;"'; ?> >


      <div class="col-md-3 form-group"><label><?php echo $lang['Hauteur'] ?></label><input class="form-control"  type="text" name="hauteur_c[<?php echo $record->id; ?>]" value="<?php echo $record->hauteur_c ?>" pattern= "[-+]?[0-9]*[.,]?[0-9]+" title="<?php echo $lang['FORMATNUMERIC'] ?>"></div>

       <div class="col-md-3 form-group"><label><?php echo $lang['longueur'] ?></label><input class="form-control"  type="text" name="longueur_c[<?php echo $record->id; ?>]" value="<?php echo $record->longueur_c ?>" pattern= "[-+]?[0-9]*[.,]?[0-9]+" title="<?php echo $lang['FORMATNUMERIC'] ?>"></div>

      <div class="col-md-3 form-group"><label><?php echo $lang['Largeur'] ?></label><input  class="form-control" type="text" name="largeur_c[<?php echo $record->id; ?>]" value="<?php echo $record->largeur_c ?>" pattern= "[-+]?[0-9]*[.,]?[0-9]+" title="<?php echo $lang['FORMATNUMERIC'] ?>"></div>

      <div class="col-md-3 form-group"><label><?php echo$lang['Superficie'] ?></label><input  class="form-control" type="text" name="superficie_c[<?php echo $record->id; ?>]" value="<?php echo $record->superficie_c ?>" pattern= "[-+]?[0-9]*[.,]?[0-9]+" title="<?php echo $lang['FORMATNUMERIC'] ?>" ></div>


      </div>



      <div class="row hidden_projet-<?php echo $record->id ?>" <?php if ($record->project_c == 'No' or $record->project_c == '') echo 'style="display: none;"'; ?>> 
      <div class="col-md-4 form-group"><label><?php echo $lang['Unity'] ?></label>
        <select name="unite_c[<?php echo $record->id; ?>]" class="form-control" value="<?php echo $record->unite_c ?>">
            <?php foreach($app_list_strings['unite_c'] as $key=>$value) {
                      $selected="";
                    if($key === $record->etape_projet_c  ){ $selected='selected="selected"';}
                      echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>'; }
            ?>
        </select>

      </div>
      <div class="col-md-4 form-group"><label><?php echo $lang['Step'] ?></label>

          <select class="form-control " name="etape_projet_c[<?php echo $record->id; ?>]" value="<?php echo $record->etape_projet_c ?>">
            <?php foreach($app_list_strings['etape_projet_c'] as $key=>$value) {
                $selected="";
              if($key === $record->etape_projet_c  ){ $selected='selected="selected"';}
                echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';}
            ?>
          </select>
      </div>

      <div class="col-md-4 form-group"><label><?php echo $lang['Budget'] ?>($)</label>
        <input  class="form-control" type="text" name="budget_projet_c[<?php echo $record->id; ?>]" value="<?php echo number_format((float)$record->budget_projet_c,2,'.','') ?>"pattern= "[-+]?[0-9]*[.,]?[0-9]+" title="<?php echo $lang['FORMATNUMERIC'] ?>">
      </div>
      </div>

      <div class=row> 
      <div class="col-md-4 form-group"><label><?php echo $lang['Qualification'] ?></label>
          <select class="form-control select" name="Qualification[<?php echo $record->id; ?>][]" multiple="true">
            <?php  foreach($app_list_strings['qualification_client_c'] as $key=>$value) {
                $selected = (in_array($key, $record->qualification_client_c)) ? 'selected="selected"' : '';
                echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';} 
            ?>
          </select>
      </div>
      <div class="col-md-8 form-group"><label><?php echo $lang['LBL_DESCRIPTION']; ?></label><input  class="form-control" type="textarea" name="description[<?php echo $record->id; ?>]" value="<?php echo $record->description ?>" ></div>
  </div>

<input  class="form-control" type="text" name="id[]" value="<?php echo $record->id; ?>" style="display:  none;">
<input  class="form-control" type="text" name="type" value="Opportunities" style="display:  none;">
<input  class="form-control" type="text" name="session_id" value="<?php echo $session_id;?>" style="display:  none;">

<input  class="form-control" type="text" name="langue" value="<?php echo $langue;?>" style="display:  none;">
<input  class="form-control" type="text" name="name" value="<?php echo $name;?>" style="display:  none;">
<input  class="form-control" type="text" name="account_id" value="<?php echo $account_id;?>" style="display:  none;">


</div>
<?php } ?>
<input type="submit" class="btn btn-primary" value="<?php echo $lang['submit'] ?>" />
<input type="reset" class="btn btn-primary" value="<?php echo $lang['reset'] ?>"/>
</form>

</div>


<div id="tabs-3">


























<form method="POST" action="savedata.php">

<div class="row">
  <div class="col-md-12"><h2><input type="text" class="form-control" name="name_opp"></h2></div>
</div>
    <div class=row> 
      <div class="col-md-4 form-group"><label><?php echo $lang['Division'] ?></label>
          <select class="form-control select" name="division[]" multiple="true"required>
              <?php foreach($app_list_strings['division_c'] as $key=>$value) {
                echo '<option value="'.$key.'">'.$value.'</option>';
            }       
                ?>
          </select></div>

          <div class="col-md-4 form-group"><label><?php echo $lang['Secteur'] ?></label>
          <select name="secteur_c" class="form-control" value=""required>
              <?php foreach($app_list_strings['secteur_c'] as $key=>$value) {
                    echo '<option value="'.$key.'">'.$value.'</option>';
                }       
                    ?>
          </select>
        </div>

        <div class="col-md-4 form-group"><label><?php echo $lang['Project'] ?></label>
                <select name="project_c" class="form-control " id="yesno" value="" onchange ="yesnonchange_2()" required>
                    <?php foreach($app_list_strings['project_c'] as $key=>$value) {
                          echo '<option value="'.$key.'" >'.$value.'</option>';}           
                      ?>
                </select>
        </div>
    </div>


<div class="row product" style="display: none;" > 

    <div class="col-md-4 form-group"><label><?php echo $lang['grprod_c'] ?></label>
<select class="form-control requis_prod" name="grprod_c[]" multiple="true">
              <?php
            foreach($app_list_strings['grprod_c'] as $key=>$value) {
                echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
            }       
                ?>
          </select>

      </div>
      <div class="col-md-4 form-group">
      </div>
      <div class="col-md-4 form-group">
      </div>
      </div>

      <div class="row hidden_projet" <?php if ($record->project_c == 'No' or $record->project_c == '') echo 'style="display: none;"'; ?>> 
      <div class="col-md-3 form-group"><label><?php echo $lang['Projet_num'] ?></label><input class="form-control"  type="text" name="numero_projet_c" value="" ></div>

          <div class="col-md-3 form-group"><label><?php echo $lang['date_estimee_projet_c'] ?></label><input  class="form-control" id="datepicker2" type="text" name="date_estimee_projet_c" value=""  title="" placeholder="YYYY-MM-DD">
          </div>


      <div class="col-md-3 form-group"><label><?php echo $lang['Structure'] ?></label>
          <select class="form-control select" name="Structure[]" multiple="true">
          <?php foreach($app_list_strings['structure_c'] as $key=>$value) {
                echo '<option value="'.$key.'" >'.$value.'</option>';}           
            ?>
          </select>
        </div>

      <div class="col-md-3 form-group"><label><?php echo $lang['Quantity'] ?></label><input  class="form-control" type="text" name="quantity_project_c" value="" pattern= "[-+]?[0-9]*[.,]?[0-9]+"title="<?php echo $lang['FORMATNUMERIC'] ?>"></div>
      </div>

      <div class="row hidden_projet">
                <div class="col-md-3 form-group"><label><?php echo $lang['Hauteur'] ?></label><input class="form-control"  type="text" name="hauteur_c" value="" pattern= "[-+]?[0-9]*[.,]?[0-9]+"title="<?php echo $lang['FORMATNUMERIC'] ?>"></div>
               <div class="col-md-3 form-group"><label><?php echo $lang['longueur'] ?></label><input class="form-control"  type="text" name="longueur_c" value="" pattern= "[-+]?[0-9]*[.,]?[0-9]+" title="<?php echo $lang['FORMATNUMERIC'] ?>"></div>

                <div class="col-md-3 form-group"><label><?php echo $lang['Largeur'] ?></label><input  class="form-control" type="text" name="largeur_c" value=""pattern= "[-+]?[0-9]*[.,]?[0-9]+"title="<?php echo $lang['FORMATNUMERIC'] ?>" ></div>
                <div class="col-md-3 form-group"><label>Superficie</label><input  class="form-control" type="text" name="superficie_c" value=""pattern= "[-+]?[0-9]*[.,]?[0-9]+"title="<?php echo $lang['FORMATNUMERIC'] ?>" ></div>
      </div>

      <div class="row hidden_projet" > 
            <div class="col-md-4 form-group"><label><?php echo $lang['Unity'] ?></label>
                <select name="unite_c" class="form-control" value="">
                    <?php foreach($app_list_strings['unite_c'] as $key=>$value) {
                          echo '<option value="'.$key.'" >'.$value.'</option>';}  ?>
                </select>
            </div>
            <div class="col-md-4 form-group"><label><?php echo $lang['Step'] ?></label>
                    <select class="form-control " name="etape_projet_c" value="">
                    <?php  foreach($app_list_strings['etape_projet_c'] as $key=>$value) {  
                        echo '<option value="'.$key.'" >'.$value.'</option>'; } ?>
                    </select>
            </div>
            <div class="col-md-4 form-group"><label><?php echo $lang['Budget'] ?>($)</label><input  class="form-control" type="text" name="budget_projet_c[<?php echo $record->id; ?>]" value="" pattern= "[-+]?[0-9]*[.,]?[0-9]+" title="<?php echo $lang['FORMATNUMERIC'] ?>">
            </div>
    </div>
    <div class=row> 
          <div class="col-md-4 form-group"><label><?php echo $lang['Qualification'] ?></label>
            <select class="form-control select" name="Qualification[]" multiple="true">
              <?php foreach($app_list_strings['qualification_client_c'] as $key=>$value) { echo '<option value="'.$key.'" >'.$value.'</option>';} ?>
            </select>
          </div>
          <div class="col-md-8 form-group"><label><?php echo $lang['LBL_DESCRIPTION']; ?></label><input  class="form-control" type="textarea" name="description" value="" >
          </div>
    </div>

<input  class="form-control" type="text" name="id" value="<?php echo $record->id; ?>" style="display:  none;">
<input  class="form-control" type="text" name="type" value="Opportunity_add" style="display:  none;">
<input  class="form-control" type="text" name="session_id" value="<?php echo $session_id;?>" style="display:  none;">
<input  class="form-control" type="text" name="langue" value="<?php echo $langue;?>" style="display:  none;">
<input  class="form-control" type="text" name="name" value="<?php echo $name;?>" style="display:  none;">
<input  class="form-control" type="text" name="account_id" value="<?php echo $account_id;?>" style="display:  none;">


<input type="submit" class="btn btn-primary" value="<?php echo $lang['submit'] ?>" />
<input type="reset" class="btn btn-primary" value="<?php echo $lang['reset'] ?>"/>

</form>


</div>
</div>
</div>
<br>
<br>


                <script>
                var acc = document.getElementsByClassName("accordion");
                var i;

                for (i = 0; i < acc.length; i++) {
                    acc[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var panel = this.nextElementSibling;
                        if (panel.style.display === "block") {
                            panel.style.display = "none";
                        } else {
                            panel.style.display = "block";
                        }
                    });
                }
                </script>

                <script>
                function yesnonchange(id) {
                    var x = document.getElementById("yesno-"+id).value;
                    if(x === 'Yes'){
                 $(".hidden_projet-"+id).show();
                 $(".product-"+id).hide();
                 $('.requis_prod'+id).removeAttr('required');
                 
                    }else{
                 $(".hidden_projet-"+id).hide();
                 $(".product-"+id).show();
                  $('.requis_prod'+id).attr('required', 'required');
                  }
                 
                }
                </script>

                  <script>
                  $( function() {
    $(".datepicker").datepicker({ changeMonth: true,changeYear: true, dateFormat: "yy-mm-dd"});} );
                  </script>

                  <script>
                  $( function() {
    $("#datepicker2").datepicker({ changeMonth: true,changeYear: true, dateFormat: "yy-mm-dd"});} );
                  </script>

                <script>
                function yesnonchange_2() {
                    var x = document.getElementById("yesno").value;

                    if(x === 'Yes'){
                 $(".hidden_projet").show();
                 $(".product").hide();
                $('.requis_prod').removeAttr('required');
                    }else{
                 $(".hidden_projet").hide();
                 $(".product").show();
                $('.requis_prod').attr('required', 'required');

                  }
                }
                </script>

                <script>
                  $('.selectpicker').selectpicker({
                  style: 'btn-info',
                  size: 4
                });

                </script>

                <style>
              .accordion {
                  background-color: #eee;
                  color: #444;
                  cursor: pointer;
                  padding: 18px;
                  width: 100%;
                  border: none;
                  text-align: left;
                  outline: none;
                  font-size: 15px;
                  transition: 0.4s;
              }

              .active, .accordion:hover {
                  background-color: #ccc; 
              }

              .panel {
                  padding: 0 18px;
                  display: none;
                  background-color: white;
                  overflow: hidden;
              }
              </style>



</body>
</html>
