<?php
if ($_POST["operation"] == "ChangeClientInf") {
    include('SYSTEM/CONNECT.php');
    $id = mb_convert_encoding($_POST['ID'], "windows-1251", "UTF-8");
    $category = mb_convert_encoding($_POST['CATEGORY'], "windows-1251", "UTF-8");
    $inventory = mb_convert_encoding($_POST['INVENTORY'], "windows-1251", "UTF-8");
    $serial = mb_convert_encoding($_POST['SERIAL'], "windows-1251", "UTF-8");
    $name = mb_convert_encoding($_POST['NAME'], "windows-1251", "UTF-8");
    $date_in = mb_convert_encoding($_POST['date_in'], "windows-1251", "UTF-8");
    $date_out = mb_convert_encoding($_POST['date_out'], "windows-1251", "UTF-8");
    if ($date_out == "''") $date_out = 'null';
    if ($date_in == "''") $date_in = 'null';

    $saveRes = ibase_query("update or insert into SRL_HEADLIST(ID,CATEGORY,INVENTORY,SERIAL,NAME,DATE_IN,DATE_OUT) VALUES($id,'$category','$inventory','$serial','$name',$date_in,$date_out)", $database);
    echo "update or insert into SRL_HEADLIST(ID,CATEGORY,INVENTORY,SERIAL,NAME,DATE_IN,DATE_OUT) VALUES($id,'$category','$inventory','$serial','$name',$date_in,$date_out)";
}


?>