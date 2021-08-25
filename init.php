<?php 

require_once('params.inc.php');

// connexion server

$connex = 'mysql:host='.HOST.';dbname='.DBHOST.'';
$user = USER;
$password = PASS;

// $connexion = new PDO($connex,$user,$password);
//   confirm_db_connect($connexion);

//   function confirm_db_connect($connexion) {
//     if($connexion->connect_errno){
//       $msg = "Database connection failed :";
//       $msg .= $connexion->connect_error;
//       $msg .= "(" .$connexion->connect_errno. ")";
//       exit($msg);
//     }
//   }

try {
    $connexion = new PDO($connex,$user,$password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e)
{
  echo $e->getMessage();                         
}
