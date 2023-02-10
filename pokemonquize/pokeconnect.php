<?php
try{
$db = new PDO('mysql:dbname=pokemon;host=127.0.0.1;charset=utf8','root','');
    session_start();
}catch(PDOException $e){
echo 'DB接続エラー:'.$e->getMessage();
}

if(empty($_SESSION['num'])) {
  $_SESSION['num'] = range(1,11);
   shuffle($_SESSION['num']);
}
if(empty($_SESSION['q'])){
    $_SESSION['q']=0;
}
echo $_SESSION['num'][$_SESSION['q']];
$pokemons = $db->prepare('SELECT * FROM questions WHERE id=?');
$pokemons->execute(array($_SESSION['num'][$_SESSION['q']]));
$pokemon = $pokemons->fetch();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ポケモンタイプクイズ</title>
</head>

<body>
   
    


</body>

</html>