<?php
session_start();
include "SYSTEM/CONNECT.php";
$SRL_HEADLIST_SQL = ibase_query("select first 50 * from SRL_HEADLIST", $dbl);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--*****************************************************************************************************************-->
    <!--Параметры по умолчанию-->
    <title>SerialBase</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <!--Стиль-->
    <meta name="theme-color" content="#1A7897">
    <script src="JS/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/DEFAULT/preload.css">
    <!--*****************************************************************************************************************-->
    <!--Пользовательские параметры-->
    <link rel="stylesheet" type="text/css" href="CSS/CALENDAR.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/custom_2.css"/>

    <link rel="stylesheet" href="CSS/USR/main.css">
    <link rel="stylesheet" href="CSS/USR/left.css">

    <link rel="stylesheet" href="CSS/NAVLEFT/style.css">
    <link rel="stylesheet" href="CSS/NAVLEFT/left-nav-style.css">
    <!--*****************************************************************************************************************-->
    <!--Навигация-->
    <script src="JS/navigation.js"></script>

    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                scrollY: $(window).height() - 194 + 'px',
                scrollCollapse: false,
                paging: false
            });
        });
    </script>

    <style>

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            margin-bottom: 5px;
            font-size: 15px;
            color: #000000;
        }

        th.empty {
            background: #fff;
        }

        tr.empty:hover {
            background: #fff;
        }

        th {
            background-color: #aaaaaa;
            font-weight: normal;
            /*font-size: 15px;*/
            padding: 0 10px;
            color: #fff;
            text-shadow: #414141 0 1px 0px;
            line-height: 40px;
        }

        tbody tr {
            font-weight: normal;
            background-color: #ffffff;
            margin: 5px;
        }

        tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        tbody tr:hover {
            background-color: #eaeaea;
        }

        td {
            padding: 9px 10px;
            border-left: #d7d7d7 1px solid;
            border-top: #d7d7d7 1px solid;
            border-bottom: #d7d7d7 1px solid;
            line-height: 20px;
        }

        tr td:first-child {
            border-left: 0;
        }
    </style>

</head>
<body style="background: #F1F2FC;">
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
                        <a>№</a> <input id="id" class="modalInput">
                        <a>Категория</a> <input id="category" class="modalInput"><br>
                        <a>Инвентарный</a> <input id="inventory" class="modalInput">
                        <a>Серийный</a> <input id="serial" class="modalInput"><br>
                        <a>Наименование</a> <input id="name" class="modalInput">
                        <a>Дата передачи</a> <input id="date_in" class="modalInput"><br>
                        <a>Дата списания</a> <input id="data_out" class="modalInput">
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
        <div class="col-lg-10 content-container" style="background-color: #ffe0b2">
            <hr class="mb-5">
            <section>

                <div class="col-xs-12">
                    <!--ПРАВОЕ МЕНЮ СОДЕРЖАНИЕ ОТЧЕТЫ-->
                    <table id="example" class="table">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Категория</th>
                            <th>Инвентарный</th>
                            <th>Серийный</th>
                            <th>Наименование</th>
                            <th>Дата передачи</th>
                            <th>Дата списания</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;
                        while ($HEADLIST = ibase_fetch_assoc($SRL_HEADLIST_SQL)) {
                            $HEADLIST_CATEGORY = mb_strtoupper(mb_convert_encoding($HEADLIST['CATEGORY'], "UTF-8", "windows-1251"));
                            $HEADLIST_INVENTORY = mb_strtoupper(mb_convert_encoding($HEADLIST['INVENTORY'], "UTF-8", "windows-1251"));
                            $HEADLIST_SERIAL = mb_strtoupper(mb_convert_encoding($HEADLIST['SERIAL'], "UTF-8", "windows-1251"));
                            $HEADLIST_NAME = mb_strtoupper(mb_convert_encoding($HEADLIST['NAME'], "UTF-8", "windows-1251"));
                            if ($HEADLIST['DATE_IN']) {
                                $HEADLIST_DATE_IN = date('d.m.Y', strtotime($HEADLIST['DATE_IN']));
                            } else {
                                $HEADLIST_DATE_IN = '';
                            }
                            if ($HEADLIST['DATE_OUT']) {
                                $HEADLIST_DATE_OUT = date('d.m.Y', strtotime($HEADLIST['DATE_OUT']));
                            } else {
                                $HEADLIST_DATE_OUT = '';
                            }
                            ?>
                            <tr class="DataLine" data-toggle="modal" data-target="#exampleModalCenter"
                                id="<?php echo $i; ?>" data-category="<?php echo $HEADLIST_CATEGORY; ?>"
                                data-inventory="<?php echo $HEADLIST_INVENTORY; ?>"
                                data-serial="<?php echo $HEADLIST_SERIAL; ?>"
                                data-name="<?php echo $HEADLIST_NAME; ?>"
                                data-date_in="<?php echo $HEADLIST_DATE_IN; ?>"
                                data-date_out="<?php echo $HEADLIST_DATE_OUT; ?>">

                                <td><?php echo $i; ?></td>
                                <td><?php echo $HEADLIST_CATEGORY; ?></td>
                                <td><?php echo $HEADLIST_INVENTORY; ?></td>
                                <td><?php echo $HEADLIST_SERIAL; ?></td>
                                <td><?php echo $HEADLIST_NAME; ?></td>
                                <td><?php echo $HEADLIST_DATE_IN; ?></td>
                                <td><?php echo $HEADLIST_DATE_OUT; ?></td>
                            </tr>
                            <?php $i++;
                        } ?>
                        </tbody>
                    </table>
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

    $(document).ready(function () {
        //$('#exampleModalCenter').modal('show');

        $('.DataLine').click(function (event) {

            let obj = document.getElementById(this.id);
            document.getElementById('id').value = this.id;
            document.getElementById('category').value = obj.dataset.category;
            document.getElementById('inventory').value = obj.dataset.inventory;
            document.getElementById('serial').value = obj.dataset.serial;
            document.getElementById('name').value = obj.dataset.name;
            document.getElementById('date_in').value = obj.dataset.date_in;
            document.getElementById('data_out').value = obj.dataset.date_out;

        });
        $('.SaveClientData').click(function (event) {
            let id = document.getElementById('id').value,
                category = document.getElementById('category').value,
                inv = document.getElementById('inventory').value,
                serial = document.getElementById('serial').value,
                name = document.getElementById('name').value,
                date_in = "'" + document.getElementById('date_in').value + "'",
                date_out = "'" + document.getElementById('data_out').value + "'";
            console.log('operation=ChangeClientInf&ID=' + id + '&CATEGORY=' + category + '&INVENTORY=' + inv + '&SERIAL=' + serial + '&NAME=' + name + '"&date_in="' + date_in + '"&date_out="' + date_out + '"');
            $.ajax({
                type: 'POST',
                url: 'operations.php',
                data: 'operation=ChangeClientInf&ID=' + id + '&CATEGORY=' + category + '&INVENTORY=' + inv + '&SERIAL=' + serial + '&NAME=' + name + '&date_in=' + date_in + '&date_out=' + date_out ,
                success: function (data) {
                    //console.log(data);
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