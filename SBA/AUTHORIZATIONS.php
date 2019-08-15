<?php
session_start();
include "SYSTEM/CONNECT.php";
/*********************************************************************************************************************/
$name = $_POST['name'];
$pass = $_POST['pass'];
if (!$name) {
    Header("Location:SYSERR.php?code=1");
    exit;
}
if (!$pass) {
    Header("Location:SYSERR.php?code=1");
    exit;
}

$user_sql = ibase_query("select us.id_user, us.name_user  from users us where us.name_user = 'SMobile'", $dbl);
$user = ibase_fetch_row($user_sql);
$user_id = $user[0];
$user_name = "SM" . $user_id . "";
@$connect_dbwork = ibase_connect($database, $user_name, $pass);
if (!$connect_dbwork) {
    //Если коннект не прошел значит пароль не верен
    Header("Location:SYSERR.php?code=1");
    exit;
} else {
    $ID_SESSION = rand(0, 999999);
    $_SESSION['ID_SESSION'] = $ID_SESSION;
    $_SESSION['ID_USER'] = $user_id;

    Header("Location:index.php");
    exit;
}
/*

$user_name="SM".$ID_USER."";
//Проверяем подключением
@$connect_dbwork = ibase_connect($database, $user_name, $PASSWORD);
if(!$connect_dbwork){
    //Если коннект не прошел значит пароль не верен
    Header("Location:error.php");	exit;
}
else {

*/
?>
