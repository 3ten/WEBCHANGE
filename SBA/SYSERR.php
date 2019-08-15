<?php
        /*Проверяем авторизован ли пользователь */
	  session_start();
	 @include "SYSTEM/connect.php";

	   $TYPE = $_GET['code'];


if($TYPE==1){
        $MESSAGE="Ошибка Авторизации";
         $IMAGE ='IMAGES/ERR/err_key.png';
        unset($_SESSION['ID_USER']);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--*****************************************************************************************************************-->
    <!--Параметры по умолчанию-->
    <title>SPortal</title>
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
    <link href="CSS/DEFAULT/bootstrap.min.css" rel="stylesheet">
    <!--Стиль-->
    <meta name="theme-color" content="#1A7897">
    <script src="JS/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/USR/main.css">
    <link rel="stylesheet" href="/css/USR/left.css">
    <link rel="stylesheet" href="/css/USR/table.css">
    <link rel="stylesheet" href="/css/USR/right.css">
    <link rel="stylesheet" href="CSS/SYSERR.css">
    <!--*****************************************************************************************************************-->
    <script>
        function exit(obj) {
            location.href = 'index.html';
        }
    </script>
</head>
<body style="background: #F1F2FC;">
<header class="top_header">
    <div class="header_topline">
        <div class="col-xs-12" align="right">
            <div class="row">
                <div class="user_name" style="line-height: 52px; font-size: 20px;">
                </div>
            </div>
        </div>
    </div>
</header>

<div class="col-md-12 " align="center">
    <div class="phones ">
        <div id="login-form" style = " margin: 240px 20px 20px 20px;">
            <h1>Ошибка</h1>

            <fieldset >
                <form action="index.php">
                    <p class = 'errmess' style = "font-size: 20px; color:red; margin: 40px 20px 20px 20px;">
                        <?php echo  $MESSAGE; ?>
                    </p>

                   <input type="submit" value="OK">
                </form>
            </fieldset>
        </div>
    </div>
</div>

</body>
</html>	 