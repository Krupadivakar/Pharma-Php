<?php

    include_once('dbinfo.inc.php');

    set_time_limit(600);

    function getResult($sql){
        global $host; global $username; global $password; global $database;
        set_time_limit(600);
        $connection = mysqli_connect($host,$username,$password,$database);
        mysqli_set_charset($connection,'utf8');
        $result=mysqli_query($connection,$sql);
        mysqli_close($connection);
        return $result;
    }


    function executeQuery($sql){
        $result=getResult($sql);
        return true;
    }



    function getColumnValue($table,$primary_key_column_name,$primary_key_value,$columnName){
        $sql = "select $columnName from $table where $primary_key_column_name='$primary_key_value'";
        $result=getResult($sql);
        $result_name = "";
        if($result){
            $i=0;

            while($row=mysqli_fetch_assoc($result)){
                $result_name = $row["$columnName"];
                $i++;
            }
            $result_name = rtrim(ltrim($result_name));
        }else{
            //echo $sql ;
        }
        return $result_name;
    }

    function generateRandomURLByLength($length){
        $random_chars='';
        $characters = array(
        "A","B","C","D","E","F","G","H","J","K","L","M",
        "N","P","Q","R","S","T","U","V","W","X","Y","Z",
        "1","2","3","4","5","6","7","8","9",
        "_","a","b","c","d","e","f","g","h","j","k","l","m",
        "n","p","q","r","s","t","u","v","w","x","y","z");

        //make an "empty container" or array for our keys
        $keys = array();

        //first count of $keys is empty so "1", remaining count is 1-6 = total 7 times
        while(count($keys) < $length) {
            //"0" because we use this to FIND ARRAY KEYS which has a 0 value
            //"-1" because were only concerned of number of keys which is 32 not 33
            //count($characters) = 33
            $x = mt_rand(0, count($characters)-1);
            if(!in_array($x, $keys)) {
                $keys[] = $x;
            }
        }

        foreach($keys as $key){
            $random_chars .= $characters[$key];
        }
        //echo $random_chars;
        return $random_chars;
    }

    function generateRandomControlledFolderName(){
        $characters = array(
        "a","b","c","d","e","f","g","h","j","k","l","m",
        "n","p","q","r","s","t","u","v","w","x","y","z");

        //make an "empty container" or array for our keys
        $keys = array();

        //first count of $keys is empty so "1", remaining count is 1-6 = total 7 times
        while(count($keys) < 8) {
            //"0" because we use this to FIND ARRAY KEYS which has a 0 value
            //"-1" because were only concerned of number of keys which is 32 not 33
            //count($characters) = 33
            $x = mt_rand(0, count($characters)-1);
            if(!in_array($x, $keys)) {
                $keys[] = $x;
            }
        }

        foreach($keys as $key){
            $random_chars .= $characters[$key];
        }
        //echo $random_chars;
        return $random_chars;
    }

    function grurl(){
        return generateRandomURLByLength(30);
    }

    function stu($string){
        return strtoupper($string);
    }

    function getRH(){
        return "<input type='hidden' name='rurl' value='".grurl()."'>";
    }



    

    function getTextBox($name,$value,$size){
        return "<input type='text' name='".$name."' size='".$size."' value='".$value."'>";
    }

    function getButton($form_action,$button_action_message){
        return "<button id='btn1' formaction='".$form_action."'>".$button_action_message."</button>";
    }

    function getHidden($hidden_name,$hidden_value){
        return "<input type='hidden' name='".$hidden_name."' value='".$hidden_value."'>";
    }

    function getSimpleBorderedTable(){
        $table="<div align='center'><table border='1' width='70%' cellspacing='1px' cellpadding='1px'>";
        return $table;
    }

    function getTableHeader($table_header_array){
        $table_header="<thead><tr>";
        for($i=0;$i<count($table_header_array);$i++){
            $table_header.="<th>".$table_header_array[$i]."</th>";
        }
        $table_header.="</tr></thead>";
        return $table_header;
    }

    function getTableBody(){
        return "<tbody>";
    }

    function getTableBodyClose(){
        return "</tbody></table></div>";
    }

    function getTR(){
        return "<tr>";
    }

    function getCTR(){
        return "</tr>";
    }

    function getTD(){
        return "<td>";
    }

    function getCTD(){
        return "</td>";
    }

    function getYesNoValue($value){
        $yesNo="";
        if($value=="0"){$yesNo="No";}else{$yesNo="Yes";}
        return $yesNo;
    }
    function getStatus($value){
        $status="";
        if($value=="0"){$status="De-Activate";}else{$status="Active";}
        return $status;
    }

    function getFormIconText($label_name,$element_id,$placeHolder,$value){
        $output="<div class='form-group'>
                                        <label>".$label_name."</label>
                                        <div class='input-group mb-3'>
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text' id='".$element_id."'><i class='ti-user'></i></span>
                                            </div>
                                            <input type='text' class='form-control' placeholder='".$placeHolder."' aria-label='".$label_name."'
                                                aria-describedby='".$element_id."' value='".$value."'>
                                        </div>
                                    </div>";

        return $output;

    }

    function getFormIconPassword($label_name,$element_id,$placeHolder,$value){
        $output="<div class='form-group'>
                                        <label>".$label_name."</label>
                                        <div class='input-group mb-3'>
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text' id='".$element_id."'><i class='ti-user'></i></span>
                                            </div>
                                            <input type='password' class='form-control' placeholder='".$placeHolder."' aria-label='".$label_name."'
                                                aria-describedby='".$element_id."' value='".$value."'>
                                        </div>
                                    </div>";

        return $output;

    }

    function getSubmitCancelButton(){
        $output="<button type='submit' class='btn btn-success mr-2'>Submit</button>
                                    <button type='submit' class='btn btn-dark'>Cancel</button>";
        return $output;
    }


    function getSubmitResetButton($form_action){
        $output="<button type='submit' class='btn btn-success mr-2' formaction='".$form_action."'>Submit</button>
                                    <button type='reset' class='btn btn-dark'>Cancel</button>";
        return $output;
    }



?>