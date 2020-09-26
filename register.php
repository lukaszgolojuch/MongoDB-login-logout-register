<?php
use MongoDB\BSON\ObjectID;
$db = get_db();

$query =[
    'login' => $_POST['login'],
];
if($db->users->findOne($query))
{
  //  2 - Uzytkownik o podanym loginie juz istnieje 
  $_SESSION['blad']=2;
}else
{
    if($_POST['haslo']==$_POST['powtorz'])
    {
        $h=hash('sha256',$_POST['haslo']);
$konto = [
       'email' => $_POST['email'],
       'login' => $_POST['login'],
       'haslo' => $h,
   ];
   $db->users->insertOne($konto);
   $_SESSION['log']=1;
   $_SESSION['user']=$_POST['login'];
}
else
{
  // 3-Podano dwa rózne hasła
  $_SESSION['blad']=3;
}
}
exit;
?>
