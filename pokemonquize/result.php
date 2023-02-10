<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ポケモンタイプクイズ</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link href="https:fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div id="home" class="big-bg">
        <div class="content">
            <div id="result">
<?php echo $_SESSION['seikai'].'問正解';?>
            </div>
            <div id="comment">
            <?php if($_SESSION['seikai']<=3){
    echo 'もっと頑張ってください。';
}elseif(3<$_SESSION['seikai'] && $_SESSION['seikai']<7){
    echo 'ぼちぼちですね…。';
}elseif(6<$_SESSION['seikai'] && $_SESSION['seikai']<10){
    echo 'すごいですね、満点まであと一歩。';
}elseif($_SESSION['seikai']==10){
    echo '満点！おめでとう！！君はポケモンマスターだ。';
}
            ?>
            </div>
            <div id="return"> <a href="index.php">タイトルに戻る</a></div>
        </div>
      
    </div>

</body>

</html>
