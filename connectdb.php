<?php 
define("server","mysql:host=localhost;dbname=duedb");
define("user","root");
define("pass","");

TRY{
	//for store Arabic character 
	$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 
	$db=new PDO(server,user,pass,$options );//with pdo
    // $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	 $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
}
CATCH(PDOException $e){
	$db_error_msg[0]="ms_db";
$db_error_msg[1]=" : خطاء في الإتصال بقاعدة البيانات ".$e->getMessage();
	echo json_encode($db_error_msg);
	//die($db_error_msg[1]);

}
	
	?>
