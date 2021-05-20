<?php
    include_once('../lib/lib_drug_manufacturer.php');
    $title="List of All Drug Manufacturers";
    $action="";
    if(isset($_GET['action'])){$action=$_GET['action'];}
    if($action==""){$action="list";}
    $output="";
    if($action=="list"){$output=getListOfAllDrugManufacturers();}
    if($action=="add"){$output=addNewDrugManufacturer();}
    if($action=="save"){
        saveDrugManufacturer();
        $output=getListOfAllDrugManufacturers();
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
</head>
<body>
    <div align='center'><h1>List of All Manufacturers</h1></div>
    <?php echo $output; ?>
</body>
</html>