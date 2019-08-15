<?php
session_start();
include "SYSTEM/CONNECT.php";
if (empty($_SESSION['ID_SESSION'])) {
    Header('location:login.php');
}
$SRL_HEADLIST_SQL = ibase_query("select  * from SBA_CLIENTS_OSV", $dbl);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--*****************************************************************************************************************-->
    <!--Параметры по умолчанию-->
    <title>SerialBase</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">-->
    <!--Запрет масштабирования-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no"/>
    <!--Возможность добавления на главный экран-->
    <meta name="mobile-web-app-capable" content="yes">
    <!--Подключим иконки-->
    <link rel="stylesheet" href="libs/font-awesome-4.7.0/css/font-awesome.min.css"/>
    <!-- Bootstrap -->
    <!--        <link href="CSS/DEFAULT/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="JS/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="JS/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="JS/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <!--Стиль-->
    <meta name="theme-color" content="#1A7897">
    <script src="JS/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/DEFAULT/preload.css">
    <link rel="stylesheet" href="CSS/index.css">
    <!--*****************************************************************************************************************-->
    <!--Пользовательские параметры-->
    <link rel="stylesheet" type="text/css" href="CSS/CALENDAR.css"/>
    <!--    <link rel="stylesheet" type="text/css" href="CSS/custom_2.css"/>-->

    <link rel="stylesheet" href="CSS/USR/main.css">
    <link rel="stylesheet" href="CSS/USR/left.css">

    <!--    <link rel="stylesheet" href="CSS/NAVLEFT/style.css">-->
    <link rel="stylesheet" href="CSS/NAVLEFT/left-nav-style.css">
    <!--*****************************************************************************************************************-->
    <!--Навигация-->
    <script src="JS/navigation.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                scrollY: $(window).height() - 210 + 'px',
                scrollCollapse: false,
                paging: false
            });
        });
    </script>
    <style>
    </style>

</head>
<body style="background: #ffffff;">
<header class="top_header">
    <div class="header_topline">
        <div class="col-xs-12" align="right">
            <div class="row">
                <div class="col-xs-2" align="left"><label for="nav-toggle" onclick> <i class="fa fa-align-justify"
                                                                                       aria-hidden="true"></i></label>
                </div>
                <div class="col-xs-10" align="right"></div>
            </div>
        </div>
    </div>
</header>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="container-fluid DataModal">
                        <div class="tabs">
                            <input id="tab1" type="radio" name="tabs" checked>
                            <label for="tab1" title="Вкладка 1">Вкладка 1</label>
                            <input id="tab2" type="radio" name="tabs">
                            <label for="tab2" title="Вкладка 2">Вкладка 2</label>
                            <section id="content-tab1">
                                <p>
                                    <a>ID</a> <input hidden id="id" class="modalInput">
                                    <a>Клиент</a> <input id="client" class="modalInput"><br>
                                    <a>Город</a> <input id="city" class="modalInput">
                                    <a>Договор</a> <input id="contract" class="modalInput"><br>
                                    <a>Сумма</a> <input id="sum" class="modalInput">
                                    <a>Услуга</a> <input id="operation" class="modalInput"><br>
                                    <a>Номер</a> <input id="number" class="modalInput">
                                    <a>Контактное лицо</a> <input id="c_person" class="modalInput">
                                </p>
                            </section>
                            <section id="content-tab2">
                                <div class="connectionsTableChange">
                                    <table id="tablemodChange" class="table">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Протокол</th>
                                            <th>IP</th>
                                            <th>Логин</th>
                                            <th>Пароль</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close
                </button>
                <button type="button" class="btn btn-primary SaveClientData">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="ConnModalCenter" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="container-fluid DataModal">
                        <div class="connectionsTable">
                            <table id="tablemod" class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Протокол</th>
                                    <th>IP</th>
                                    <th>Логин</th>
                                    <th>Пароль</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close
                </button>
                <button type="button" class="btn btn-primary SaveClientData">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 navbar-container ">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="navbar" id="navbar">
                    <nav class="navbar" align="left">
                        <!-- Вертикальное меню -->
                        <ul class="navbar-nav">
                            <li><a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i> Клиенты </a>
                            <li><a href="#"><i class="fa fa-archive" aria-hidden="true"></i> Остатки</a>
                            <li><a href="#"><i class="fa fa-exchange" aria-hidden="true"></i>Трансферы</a>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
        <div class="col-lg-10 content-container" style="background-color: #ffffff">
            <hr class="mb-5">
            <section>
                <div class="col-xs-12 table-responsive">
                    <!--ПРАВОЕ МЕНЮ СОДЕРЖАНИЕ ОТЧЕТЫ-->

                    <table id="example" class="table">

                        <thead class="clientTableHead">
                        <tr>
                            <th>ID</th>
                            <th>Клиент</th>
                            <th>Город</th>
                            <th>Договор</th>
                            <th>Сумма</th>
                            <th>Услуга</th>
                            <th>Номер</th>
                            <th>Контактное Лицо</th>
                            <th>действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($HEADLIST = ibase_fetch_assoc($SRL_HEADLIST_SQL)) {
                            $HEADLIST_ID = mb_strtoupper(mb_convert_encoding($HEADLIST['ID'], "UTF-8", "windows-1251"));
                            $HEADLIST_CLIENT = mb_strtoupper(mb_convert_encoding($HEADLIST['CLIENT'], "UTF-8", "windows-1251"));
                            $HEADLIST_OPERATION = mb_strtoupper(mb_convert_encoding($HEADLIST['OPERATION'], "UTF-8", "windows-1251"));
                            $HEADLIST_CITY = mb_strtoupper(mb_convert_encoding($HEADLIST['CITY'], "UTF-8", "windows-1251"));
                            $HEADLIST_CONTRACT = mb_strtoupper(mb_convert_encoding($HEADLIST['CONTRACTS'], "UTF-8", "windows-1251"));
                            $HEADLIST_SUM = mb_strtoupper(mb_convert_encoding($HEADLIST['CONTRACTS_SUM'], "UTF-8", "windows-1251"));
                            $HEADLIST_NUMBER = mb_strtoupper(mb_convert_encoding($HEADLIST['NUMBER'], "UTF-8", "windows-1251"));
                            $HEADLIST_C_PERSON = mb_strtoupper(mb_convert_encoding($HEADLIST['CONTACT_PERSON'], "UTF-8", "windows-1251"));

                            ?>
                            <tr class="DataLine"
                                id="<?php echo $HEADLIST_ID; ?>" data-client="<?php echo $HEADLIST_CLIENT; ?>"
                                data-city="<?php echo $HEADLIST_CITY; ?>"
                                data-contract="<?php echo $HEADLIST_CONTRACT; ?>"
                                data-sum="<?php echo $HEADLIST_SUM; ?>"
                                data-operation="<?php echo $HEADLIST_OPERATION; ?>"
                                data-number="<?php echo $HEADLIST_NUMBER; ?>"
                                data-c_person="<?php echo $HEADLIST_C_PERSON; ?>">

                                <td><?php echo $HEADLIST_ID; ?></td>
                                <td><?php echo $HEADLIST_CLIENT; ?></td>
                                <td><?php echo $HEADLIST_CITY; ?></td>
                                <td><?php echo $HEADLIST_CONTRACT; ?></td>
                                <td><?php echo $HEADLIST_SUM; ?></td>
                                <td><?php echo $HEADLIST_OPERATION; ?></td>
                                <td id="<?php echo $HEADLIST_ID; ?>number"
                                    class="number"><?php echo $HEADLIST_NUMBER; ?></td>
                                <td><?php echo $HEADLIST_C_PERSON; ?></td>
                                <td>
                                    <i data-toggle="modal" data-target="#exampleModalCenter"
                                       class="fa fa-pencil fa-2x changeIcon" aria-hidden="true"></i>
                                    <i data-toggle="modal"
                                       data-target="#ConnModalCenter" class="fa fa-plug fa-2x changeIcon"
                                       aria-hidden="true"></i>
                                    <i id="<?php echo $HEADLIST_ID; ?>del" class="fa fa fa-trash fa-2x changeIcon"
                                       onclick="delClient(<?php echo $HEADLIST_ID; ?>)" aria-hidden="true"></i>

                                </td>

                            </tr>

                            <?php
                        } ?>
                        </tbody>
                    </table>
                    <button type="button" onclick="clearConnTable('tablemodChange')" class="addClientBtn" data-toggle="modal"
                            data-target="#exampleModalCenter">
                        add
                    </button>
                </div>
            </section>
        </div>
    </div>
</div>


<!--Параметры по умолчанию-->
<div id="preloader">
    <div class="dws-progress-bar"></div>
</div>
<script>
    function delClient(id) {
        if (confirm('Вы действительно хотите удалить клиента "' + document.getElementById(id).dataset.client + '"')) {
            $.ajax({
                type: 'POST',
                url: 'operations.php',
                data: 'operation=delClient&id=' + id,
                success: function (data) {
                    console.log(data)
                }
            });
        }
    }

    function clearConnTable(tableid) {
        let table = document.getElementById(tableid);
        while (table.rows.length > 1) {
            table.deleteRow(1);
        }
    }

    function GetConnData(tableID, clientID, isThisChange) {
        $.ajax({
            type: 'POST',
            url: 'operations.php',
            data: 'operation=GetConnections&id=' + clientID,
            success: function (data) {
                console.log(data);
                let result = JSON.parse(data);
                console.log();

                let tbody = document.getElementById(tableID).getElementsByTagName("TBODY")[0];

                result.forEach(function (element) {
                    if (element['ID'] !== undefined) {

                        let row = document.createElement("TR");
                        let div = document.createElement("div");
                        let td1 = document.createElement("TD");
                        let td2 = document.createElement("TD");
                        let td3 = document.createElement("TD");
                        let td4 = document.createElement("TD");
                        let td5 = document.createElement("TD");

                        td1.appendChild(document.createTextNode(element['ID']));
                        td2.appendChild(document.createTextNode(element['PROTOCOL']));
                        td3.appendChild(document.createTextNode(element['IP']));
                        td4.appendChild(document.createTextNode(element['LOGIN']));
                        td5.appendChild(document.createTextNode(element['PASSWORD']));
                        if (isThisChange === true) {
                            td2.contentEditable = true;
                            td3.contentEditable = true;
                            td4.contentEditable = true;
                            td5.contentEditable = true;
                        }
                        row.appendChild(td1);
                        row.appendChild(td2);
                        row.appendChild(td3);
                        row.appendChild(td4);
                        row.appendChild(td5);

                        tbody.appendChild(row);
                    }
                });
            }
        });
    }

    $(document).ready(function () {
        $('.addClientBtn').click(function (event) {
            let el = document.getElementsByClassName('modalInput');
            Array.from(el).forEach(function (element) {
                element.value = '';
            });
        });

        $('.DataLine').click(function (event) {
            let id = this.id;
            clearConnTable('tablemod');
            clearConnTable('tablemodChange');
            GetConnData('tablemod', id, false);
            GetConnData('tablemodChange', id, true);
            let obj = document.getElementById(id);
            document.getElementById('id').value = id;
            document.getElementById('client').value = obj.dataset.client;
            document.getElementById('city').value = obj.dataset.city;
            document.getElementById('contract').value = obj.dataset.contract;
            document.getElementById('sum').value = obj.dataset.sum;
            document.getElementById('operation').value = obj.dataset.operation;
            document.getElementById('number').value = obj.dataset.number;
            document.getElementById('c_person').value = obj.dataset.c_person;
        });

        $('.SaveClientData').click(function (event) {
            let id = document.getElementById('id').value,
                client = document.getElementById('client').value,
                city = document.getElementById('city').value,
                contract = document.getElementById('contract').value,
                sum = document.getElementById('sum').value,
                operation = document.getElementById('operation').value,
                number = document.getElementById('number').value,
                c_person = document.getElementById('c_person').value;

            let ClientJsonData = {
                id: id,
                client: client,
                city: city,
                contract: contract,
                sum: sum,
                operation: operation,
                number: number,
                c_person: c_person
            };

            let ConnJsonData = [];
            let oTable = document.getElementById('tablemodChange');
            let rowLength = oTable.rows.length;
            for (i = 1; i < rowLength; i++) {
                let oCells = oTable.rows.item(i).cells;
                let cellLength = oCells.length;
                ConnJsonData.push({
                    id: oCells.item(0).innerHTML,
                    protocol: oCells.item(1).innerHTML,
                    ip: oCells.item(2).innerHTML,
                    login: oCells.item(3).innerHTML,
                    password: oCells.item(4).innerHTML
                });
            }
            $.ajax({
                type: 'POST',
                url: 'operations.php',
                data: 'operation=ChangeClientInf' + '&ClientJsonData=' + JSON.stringify(ClientJsonData) + '&ConnJsonData=' + JSON.stringify(ConnJsonData),
                // data: 'operation=ChangeClientInf&ID=' + id + '&client=' + client + '&city=' + city + '&contract=' + contract + '&sum=' + sum + '&operations=' + operation + '&number=' + number + '&c_person=' + c_person,

                success: function (data) {
                    console.log(data);
                }
            });
        });

    });


    function setHeiHeight() {
        $('#left_menu_id').css({
            height: $(window).height() - 100 + 'px'
        });
        $('#right_menu_id').css({
            height: $(window).height() - 100 + 'px'
        });

    }

    setHeiHeight();
    $(window).resize(setHeiHeight);
    $("#right_menu_id").fadeIn(300);
</script>
<script src="JS/plugin.js"></script>
<script src="JS/script.js"></script>
<script src="JS/bootstrap.min.js"></script>
<script type="text/javascript" src="libs/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
</body>
</html>