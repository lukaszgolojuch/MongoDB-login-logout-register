<?php
use MongoDB\BSON\ObjectID;
$db = get_db();

session_start();
    $h=hash('sha256',$_POST['haslo']);
    $query =[
        'login' => $_POST['login'],
        'haslo' => $h,
    ];
    if($db->users->findOne($query))
    {
        $_SESSION['log']=1;
        $_SESSION['user']=$_POST['login'];
    exit;
    }
    else
    {
      //1-NIEPOPRAWNE HASŁO
      $_SESSION['blad']=1;
      exit;
    }
?>
