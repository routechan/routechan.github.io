<?php session_start();
session_unset();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ポケモンタイプクイズ</title>
    <link rel="stylesheet"href="https://unpkg.com/ress/dist/ress.min.css">
    <link href="https:fonts.googleapis.com/css?family=Philosopher"rel="stylesheet">
    <link href="css/style.css"rel="stylesheet">
</head>
<header>
    </header>
<body>
    <div id="home"class="big-bg">
    <div class="content">
        <h1 id="title">ポケモンSV<br>タイプクイズ</h1>
                <ul id="mode">
                    <li><a href="question2.php">
                        <span class="hide">&#9654;</span>
                        <span class="show">10問モード</span></a></li>
                    <li><a href="question3.php"><span class="hide">&#9654;</span>
                        <span class="show">30問モード</span></a></li>
                    <li><a href="question4.php"><span class="hide">&#9654;</span>
                        <span class="show">全問モード</span></a></li>
        </ul>
    </div>
    

    
    </div>
    </body>
</html>