<?
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'db_prod';
 
try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password,
	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	    //echo 'Conexao efetuada com sucesso!';
    }
catch(PDOException $e)
    {
    	echo $e->getMessage();
    }

    $ins = "INSERT INTO produto 
   (
   nome,
   preco
   ) 
   VALUES 
   ( 
   '".$valor1."',
   '".$valor2."',
   )";
   $exec = $pdo->exec($ins);

?>