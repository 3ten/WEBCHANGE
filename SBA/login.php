<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SerialPlace</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
<div id="login-button">
    <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
    </img>
</div>
<div id="container">
    <h1>SerialPlace</h1>
    <span class="close-btn">
    <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
  </span>

    <form method="POST" action="AUTHORIZATIONS.php">
        <input type="text" name="name" placeholder="Логин" value="SMobile">
        <input type="password" name="pass" placeholder="Пароль"  value="3">
        <input type="submit" value="Войти">
    </form>
</div>


<script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="JS/login.js"></script>

</body>
</html>
