<?php
session_start();
include "CONFIG/CONNECT.php";
/*********************************************************************************************************************/
$USER_FIRST_NAME = 'Юрий';
$USER_LAST_NAME = 'Острецов';
$id_place = $_GET['id_place'];

$PLACE_SQL = ibase_query("select cl.id_clients as ID, cl.name_clients as NAME from clients cl where cl.client_type = 1", $dbl);

if (!$id_place) {
    Header("Location:SYSERR.php?code=1");
    exit;
}
if ($id_place == '-1') {
    $SRB_REMAINS_SQL = ibase_query("select * from SRB_REMAINS", $dbl);
} else {
    $SRB_REMAINS_SQL = ibase_query("select * from SRB_REMAINS srb where srb.ID_PALCE = $id_place", $dbl);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--*****************************************************************************************************************-->
    <!--Параметры по умолчанию-->
    <title>SerialBase</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="IMG/favicon.ico" type="image/x-icon">
    <!--Запрет масштабирования-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no"/>
    <!--Возможность добавления на главный экран-->
    <meta name="mobile-web-app-capable" content="yes">
    <!--Подключим иконки-->
    <link rel="stylesheet" href="libs/font-awesome-4.7.0/css/font-awesome.min.css"/>
    <!-- Bootstrap -->
        <link href="css/DEFAULT/bootstrap.min.css" rel="stylesheet">

    <!--Стиль-->
    <meta name="theme-color" content="#1A7897">
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/USR/main.css">
    <link rel="stylesheet" href="css/USR/left.css">
    <link rel="stylesheet" href="css/USR/table.css">
    <link rel="stylesheet" href="css/USR/right.css">
    <link rel="stylesheet" href="css/USR/place.css">
    <!--*****************************************************************************************************************-->
    <script>
        function exit(obj) {
            location.href = 'index.php';
        }
    </script>
    <script>
        function update_place(obj) {
            var id_place = $('#id_place').val();
            location.href = 'serial.php?id_place=' + id_place;
        }
    </script>
</head>
<body style="background: #F1F2FC;">
<header class="top_header">
    <div class="header_topline">
        <div class="col-xs-12" align="right">
            <div class="row">
                <div class="user_name" style="line-height: 52px; font-size: 20px;">
                    <?php echo $USER_FIRST_NAME . " " . $USER_LAST_NAME; ?>
                    <i onclick="exit(this)" style="font-size: 21px; padding: 0px 3px 0px 3px;" class="fa fa-sign-out"
                       aria-hidden="true"></i>

                </div>
            </div>
        </div>
    </div>
</header>
<div class="view_desctop">
    <div class="row">
        <div class="col-xs-12">
            <!--Левое меню сайта-->
            <!--*************************************************************************************************************-->
            <div class="col-xs-2">
                <div class="left_menu" id="left_menu_id" align="left">
                    <div class="left_menu_navigation" align="left">
                        <!--Левое навишационное меню-->
                        <div class="device_menu">
                            <div class="menu_nav_admin">
                                <div class="row" onClick="show_admin(this)">
                                    <div class="col-xs-2" align="center"><i class="fa fa-address-book-o"
                                                                            aria-hidden="true"></i>
                                    </div>
                                    <div class="col-xs-10">Остатки</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--*************************************************************************************************************-->
            <!--Правое меню сайта-->
            <div class="col-xs-10">
                <div id="right_menu_id" class="right_menu" align="left">
                    <div class="row" style="padding: 5px 0px 5px 0px">
                        <div class="board_place_table">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="board_place_table_line_head">
                                        <div class="row">
                                            <div class="board_place_table_banner">
                                                <div class="col-xs-6">
                                                    <div class="group_name">Остатки</div>
                                                </div>
                                                <div class="col-xs-6" align="right">
                                                    <div class="place_name">
                                                        <form id="place">

                                                            <select id='id_place' required id=""
                                                                    onchange="update_place(this)">
                                                                <option id="-1" value='-1'>Склад</option>
                                                                <?
                                                                while (@$PLACE = ibase_fetch_assoc($PLACE_SQL)) {
                                                                    $PLACE_ID = $PLACE['ID'];
                                                                    $PLACE_NAME = mb_convert_encoding($PLACE['NAME'], "UTF-8", "windows-1251");
                                                                    echo "<option   value='" . $PLACE_ID . "'>" . $PLACE_NAME . "</option>";
                                                                }
                                                                ?>
                                                                <option id="-1" value='-1'>Все</option>
                                                            </select>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12" align="center">



                                    <div class="board_place_table_content">
                                        <table class="bordered">
                                            <thead>
                                            <tr>
                                                <th>№</th>
                                                <th>Наименование</th>
                                                <th>Артикул</th>
                                                <th>Инвентарный №</th>
                                                <th>Серийный №</th>
                                            </tr>
                                            </thead>
                                            <?php while (@$SRB_REMAINS = ibase_fetch_assoc($SRB_REMAINS_SQL)) {
                                                $ID_PALCE = $SRB_REMAINS['ID_PALCE'];
                                                $NAME = 'Not Found';
                                                $ARTICUL = $SRB_REMAINS['ARTICUL'];
                                                $SERIAL = $SRB_REMAINS['SERIAL'];
                                                $INVENTAR = $SRB_REMAINS['INVENTAR'];
                                                ?>
                                                <tr>
                                                    <td>1</td>
                                                    <td><?php echo $NAME; ?></td>
                                                    <td><?php echo $ARTICUL; ?></td>
                                                    <td><?php echo $SERIAL; ?></td>
                                                    <td><?php echo $INVENTAR; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--*****************************************************************************************************************-->
    </div>
</div>
<!--Параметры по умолчанию-->
<script>


    function setHeiHeight() {
        $('#left_menu_id').css({
            height: $(window).height() - 50 + 'px'
        });
    }

    setHeiHeight();
    $(window).resize(setHeiHeight);
    $("#right_menu_id").fadeIn(400);
</script>
<script src="js/bootstrap.min.js"></script>
<!--*****************************************************************************************************************-->
</body>
</html>