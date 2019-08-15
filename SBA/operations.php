<?php
if ($_POST['operation'] == 'ChangeClientInf') {
    include('SYSTEM/CONNECT.php');
    $clientDataJson = json_decode($_POST['ClientJsonData'], true);
    $id = mb_convert_encoding($clientDataJson['id'], "windows-1251", "UTF-8");
    $client = mb_convert_encoding($clientDataJson['client'], "windows-1251", "UTF-8");
    $city = mb_convert_encoding($clientDataJson['city'], "windows-1251", "UTF-8");
    $contract = mb_convert_encoding($clientDataJson['contract'], "windows-1251", "UTF-8");
    $sum = mb_convert_encoding($clientDataJson['sum'], "windows-1251", "UTF-8");
    $operation = mb_convert_encoding($clientDataJson['operation'], "windows-1251", "UTF-8");
    $number = mb_convert_encoding($clientDataJson['number'], "windows-1251", "UTF-8");
    $c_person = mb_convert_encoding($clientDataJson['c_person'], "windows-1251", "UTF-8");

    if ($id == '') {
        $id = 'gen_id(SBA_CLIENTS_ID_GEN,1)';
    }

    $saveRes = ibase_query("update or insert into SBA_CLIENTS_OSV(ID,CLIENT,CITY,CONTRACTS,CONTRACTS_SUM,OPERATION,NUMBER,CONTACT_PERSON) VALUES($id,'$client','$city','$contract',$sum,'$operation','$number','$c_person')", $database);
    $connDataJson = json_decode($_POST['ConnJsonData'], true);
    echo $connDataJson[0]['id'];
    for ($i = 0; $i < count($connDataJson); $i++) {
        $idconn = $connDataJson[$i]['id'];
        $ip = mb_convert_encoding($connDataJson[$i]['ip'], "windows-1251", "UTF-8");
        $login = mb_convert_encoding($connDataJson[$i]['login'], "windows-1251", "UTF-8");
        $password = mb_convert_encoding($connDataJson[$i]['password'], "windows-1251", "UTF-8");
        $protocol = mb_convert_encoding($connDataJson[$i]['protocol'], "windows-1251", "UTF-8");
        $saveResConn = ibase_query("update SBA_CLIENT_CONNECTIONS set login='$login',password ='$password',ip ='$ip',protocol ='$protocol' where id = $idconn", $database);
        echo $saveResConn;
    }


    echo $saveRes;
}
/************************************************************************************************************************************************************************************************************/

if ($_POST['operation'] == 'GetConnections') {
    include('SYSTEM/CONNECT.php');
    echo '[';
    $id = $_POST['id'];
    $GET_CONNECTIONS_JSON = array();
    $GET_CONNECTIONS_SQL = ibase_query("select  * from SBA_CLIENT_CONNECTIONS where CLIENT_ID ='$id'", $dbl);
    while ($GET_CONNECTIONS = ibase_fetch_assoc($GET_CONNECTIONS_SQL)) {
        $GET_CONNECTIONS_JSON['ID'] = $GET_CONNECTIONS['ID'];
        $GET_CONNECTIONS_JSON['PROTOCOL'] = $GET_CONNECTIONS['PROTOCOL'];
        $GET_CONNECTIONS_JSON['CLIENT_ID'] = $GET_CONNECTIONS['CLIENT_ID'];
        $GET_CONNECTIONS_JSON['LOGIN'] = $GET_CONNECTIONS['LOGIN'];
        $GET_CONNECTIONS_JSON['PASSWORD'] = $GET_CONNECTIONS['PASSWORD'];
        $GET_CONNECTIONS_JSON['IP'] = $GET_CONNECTIONS['IP'];
        print json_encode($GET_CONNECTIONS_JSON) . ',';
    }
    echo '[]]';
    // print json_encode($GET_CONNECTIONS_JSON);
}
/************************************************************************************************************************************************************************************************************/

if ($_POST['operation'] == 'delClient') {
    include('SYSTEM/CONNECT.php');
    $id = $_POST['id'];
    $delRes = ibase_query("delete from SBA_CLIENTS_OSV WHERE ID = $id", $dbl);
    echo $delRes;
}
?>

