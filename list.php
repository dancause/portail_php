<!DOCTYPE HTML>

<html>
    <head>
        <title><?php echo $lang['TITLELIST']; ?></title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="SHORTCUT ICON" href="../themes/default/images/sugar_icon.ico">
        <!-- CSS -->

        <!-- Optional theme -->

         
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css"/>
<link rel="stylesheet" href="bootstrap/DataTables/DT/css/dataTables.bootstrap.min.css" type="text/css"/>
<link rel="stylesheet" href="bootstrap/DataTables/datatables.min.css" type="text/css"/>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" type="text/css"/>


    </head>
    <body>
   

    
 <script src=" https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="bootstrap/DataTables/DT/js/jquery.dataTables.min.js"></script>
        <!-- App Scripts -->

     
<script>$(document).ready( function () {$('#example').DataTable();} );</script>

<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8"><img src="LOGO_JPG" alt="Name_logo" class="img-fluid"></div>
            <div class="col-sm-4">
            <div class="row">
                <div class="col-6 text-uppercase"><p><?php echo $lang['USER_CONNECTED']; ?><?php echo $name ?></p></div>
                <div class="col-6"><a href="logout.php?session_id=<?php echo $session_id ?>" style="text-decoration: none"><p style="text-align: right;"><?php echo $lang['Logout'] ?></a></p></div>
            </div>
          </div>
        </div>


<br><br>
      <h4> <?php echo $lang['ACCOUNTS']; ?></h4>
        <table id="example" class="table table-striped table-bordered"  style="width:100%">
             <thead>
            <tr><th><?php echo $lang['NOMACCOUNT']; ?></th><th><?php echo $lang['StatusAccount']; ?></th><th><?php echo $lang['City']; ?></th><th><?php echo $lang['Phone']; ?></th><th><?php echo $lang['Email']; ?></th><th><?php echo $lang['Modified_date']; ?></th></tr> </thead>
                <tbody>
            <?php foreach($results->records as $record){ ?>
        
            <tr>
                <td><a href="detailaccount.php?user=<?php echo $user ?>&id=<?php echo $session_id ?>&account=<?php echo $record->id; ?>&name=<?php echo $name ?>&langue=<?php echo $langue ?>">
                    <?php echo $record->name;?></a></td>
                <td><?php echo $record->statut_compte_c;?></td>
                <td><?php echo $record->shipping_address_city;?></td>
                <td><?php echo $record->phone_office;?></td>
                <td><?php echo $record->email[0]->email_address;?></td>
                <td><?php echo substr($record->date_modified, 0,10);?></td>
            </tr>
             
            <?php } ?>
 </tbody>
        </table>

</div>
<br>
<br>
    </body>
</html>

