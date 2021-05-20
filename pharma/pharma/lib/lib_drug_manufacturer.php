<?php

    include_once('../lib/lib_master.php');

    set_time_limit(600);

    function getDrugManufacturerAnchorTags(){
        $link1="<a href='index.php?action=list'>List All</a>";
        $link2="<a href='index.php?action=add'>Add Drug Manufacturer</a>";
        $output=$link1." | ".$link2;
        return $output;
    }

    function getListOfAllDrugManufacturers(){
        $output=getDrugManufacturerAnchorTags()."<hr/><table border='1' cellspacing='5px' cellpadding='5px' width='80%' align='center'>
        <thead>
            <tr>
                <th>Sl No.</th>
                <th>Drug Manufacturer Name</th>
                <th>Drug Manufacturer Address</th>
                <th>Drug Manufacturer State</th>
                <th>View/Edit</th>
            </tr>
        </thead>
        <tbody>";
        $sql="select * from drug_manufacturer where status='1' order by drug_manufacturer_name";
        $result=getResult($sql);
        $i=1;

        while($row=mysqli_fetch_assoc($result)){
            $output.="<tr><td>".$i++."</td>".
            "<td>".$row['drug_manufacturer_name']."</td>".
            "<td>".$row['drug_manufacturer_address']."</td>".
            "<td>".$row['drug_manufacturer_state']."</td>".
            "<td><a href='index.php?action=edit&rurl=".$row['rurl']."'>View/Edit</a></td></tr>";
        }
        $output.="</tbody></table>";
        return $output;
    }

    function addNewDrugManufacturer(){
        $output=getDrugManufacturerAnchorTags()."<hr/><form method='post' action='index.php?action=save'>
        <table border='1' cellspacing='5px' cellpadding='5px' width='80%' align='center'>
            <thead>
                <tr>
                    <th>Label</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Drug Manufacturer Name</td><td>".getTextBox('drug_manufacturer_name','','50')."</td></tr>
                <tr><td>Drug Manufacturer Address</td><td>".getTextBox('drug_manufacturer_address','','50')."</td></tr>
                <tr><td>Drug Manufacturer State</td><td>".getTextBox('drug_manufacturer_state','','50')."</td></tr>
                <tr><td></td><td><button type='submit' formaction='index.php?action=save'>Add Drug Manufacturer</button></td></tr>
            </tbody>
        </table>".getRH()."</form>";
        return $output;
    }

    function saveDrugManufacturer(){
        $drug_manufacturer_name=$_POST['drug_manufacturer_name'];
        $drug_manufacturer_address=$_POST['drug_manufacturer_address'];
        $drug_manufacturer_state=$_POST['drug_manufacturer_state'];
        $rurl=$_POST['rurl'];
        $sql="insert into drug_manufacturer values ('','".$drug_manufacturer_name."','".
        $drug_manufacturer_address."','".$drug_manufacturer_state."','1','".$rurl."')";
        executeQuery($sql);
        return true;
    }




?>