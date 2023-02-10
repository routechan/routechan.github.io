<?php session_start();?>
<?php
try{
$db = new PDO('mysql:dbname=pokemon;host=127.0.0.1;charset=utf8','root','');
}catch(PDOException $e){
echo 'DB接続エラー:'.$e->getMessage();
}

$pokemons = $db->prepare('SELECT * FROM questions WHERE id=?');
$pokemons->execute(array($_SESSION['num'][$_SESSION['q']]));
$pokemon = $pokemons->fetch();
$selections = $db->prepare('SELECT * FROM choice WHERE choice.question_id=?');
$selections->execute(array($_SESSION['num'][$_SESSION['q']]));

$kotaes = $db->query("SELECT * FROM choice WHERE choice.question_id='".$_SESSION['num'][$_SESSION['q']]."' AND choice.is_answer='true'");
$kotae = $kotaes->fetch();


$_SESSION['next']='あ';
?>
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
            <h2 class="quize"><span class="mondai">Q. <?php echo $pokemon['name'];?>のタイプは？</span><span class="mondaisuu"><?php echo $_SESSION['mondaisuu'].'問目';?></span></h2>
            <div class="gazou"><?php echo '<img src="'.$pokemon['images'].'"class="icon"alt="top">';?></div>
            <?php
    echo '<br>';
    ?>

            <br>
            <div class="yesorno">
                <?php 
    if(empty($_SESSION['seikai'])){
        $_SESSION['seikai']=0;
    }
   if($_POST['answer']==$_SESSION['answ']['content']){
    echo '<span class="seikaidesu">正解です!</span>';
        $_SESSION['seikai']++;
}else{
    echo '<span class="seikaidesu">不正解です</span><br>';
    echo '正解は'.$kotae['content'].'です';
        
}

   
        ?>
            </div>
            <form action="question4.php" method="post">
                <div id="next">
                    <input type="hidden"name="next"value="<?php echo $_SESSION['next'];?>">
                    <input type="submit" value="次の問題へ" ></div>
            </form>
        </div>
    </div>



</body>

</html>
