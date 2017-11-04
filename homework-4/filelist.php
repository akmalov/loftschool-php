<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Домашнее задание №4</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Домашнее задание №4</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Авторизация</a></li>
            <li><a href="reg.php">Регистрация</a></li>
            <li><a href="list.php">Список пользователей</a></li>
            <li class="active"><a href="filelist.php">Список файлов</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" style="padding-top: 100px;">
        <?php
        if ($_SESSION['access'] !== 'granted') {
            echo "Авторизуйтесь, чтобы получить доступ к этой странице";
            die;
        }
        ?>
      <table class="table table-bordered">
        <tr>
          <th>Название файла</th>
          <th>Фотография</th>
          <th>Действия</th>
        </tr>
            <?php
            require './php/config.php';
            $db = new PDO(DB, DB_USER, DB_PASSWORD);
            $sql = 'SELECT photo FROM users WHERE photo IS NOT NULL';
            $result = $db->query($sql);
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $array) {
                echo '<tr>';
                foreach ($array as $key => $value) {
                    echo "<td>$value</td>";
                    echo "<td><img src=\"./photos/$value\" . height=\"150\"></td>";
                    echo "<td>
                         <a href=\"./php/deleteImage.php?delete=$value\">Удалить аватарку пользователя</a>
                         </td>";
                    continue;
                }
                echo '</tr>';
            }
            ?>
      </table>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
