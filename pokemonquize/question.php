<?php
try{
$db = new PDO('mysql:dbname=pokemon;host=127.0.0.1;charset=utf8','root','');
    session_start();
}catch(PDOException $e){
echo 'DB接続エラー:'.$e->getMessage();
    
}



if(empty($_SESSION['num'])) {
    unset($_SESSION['seikai']);
    unset($_SESSION['mondaisuu']);
  $num = range(1,11);  
    shuffle($num);
    $_SESSION['num'] = array();
    $_SESSION['num']=$num;
}
if(empty($_SESSION['q'])){
    $_SESSION['q']=0;
}
   if(empty($_SESSION['mondaisuu'])){
        $_SESSION['mondaisuu']=1;
    }
   

$pokemons = $db->prepare('SELECT * FROM questions WHERE id=?');
$pokemons->execute(array($_SESSION['num'][$_SESSION['q']]));
$pokemon = $pokemons->fetch();

$selections = $db->prepare('SELECT * FROM choice WHERE choice.question_id=?');
$selections->execute(array($_SESSION['num'][$_SESSION['q']]));
            $sentakusi = array();
            while($selection = $selections->fetch()){
                $sentakusi[] = $selection['content'];
            }
shuffle($sentakusi);

 $_SESSION['ans'] = $db->prepare('SELECT * FROM choice WHERE choice.question_id=? AND choice.is_answer = ?');
                $_SESSION['ans']->execute(array($_SESSION['num'][$_SESSION['q']],"true"));
$_SESSION['answ']=$_SESSION['ans']->fetch();
echo $_SESSION['answ']['content'];
           
$kotaes = $db->query("SELECT * FROM choice WHERE choice.question_id='".$_SESSION['num'][$_SESSION['q']]."' AND choice.is_answer='true'");
$kotae = $kotaes->fetch();
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
            <form action="answer.php" method="post">
                <?php foreach($sentakusi as $sentaku):?>


                <input type="radio" name="answer" value="<?php echo $sentaku;?>"><?php echo $sentaku;?>
                <?php endforeach;?>

                <br>

                <input type="submit" value="回答する" name="an">
            </form>


        </div>
    </div>
</body>

</html>