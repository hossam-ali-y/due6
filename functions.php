<?php
header('Access-Control-Allow-Origin: *' );
      header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
      header('Access-Control-Max-Age: 1000');
	@session_start();
 require_once"connectdb.php";//connect to db newsdb
 $msg1='';
 $stat=0;
$upload_msg=0;
	/*  $sf="INSERT INTO `customers` (`custom_id`, `custom_name`, `custom_due`, `custom_credit`, `max_due`, `account_status`, `create_date`, `custom_notes`) VALUES (NULL, 'محمد محمد اليعري اليعري', '0', '0', '0', '1', '2020', 'لا شيييييييييييييييييي')";
               $stat=$db->prepare($sf);	
		 		 $exec=$stat->execute();
				 */
	$imgages_number=0;
	if(isset($_POST['img_number'])){
		$imgages_number=$_POST['img_number'];
		$im=array();
		$im[0]=$imgages_number;
		 	echo json_encode($im);
		}

/////////////// refresh /////////////////////////////////////////////////
	  if(isset($_POST['refresh'])&&$_POST['refresh']=='refresh'){
	
		   get_all_invoices();
		   
	   }
 /////get_all_invoices/////////
 function get_all_invoices(){ 
    global $db;
	global $msg1;
   // global $stat;
    $projects=array();
    $sql="select * from invoices order by invo_id desc ";
    $result=$db->query($sql);
	
   foreach($result as $info){			       
			   $projects[]=$info;
    }
	$res[0]=$projects;
	$res[1]=$msg1;
	//$res[2]=$stat;
 	echo json_encode($res);
 }
 
////////////////////////////////////////////////////////////////////
	  if(isset($_POST['get_cutom_invoices'])&&isset($_POST['custom_id'])){
		   get_cutom_invoices($_POST['custom_id']);
	   }
//////////////get_cutom_invo/////
  function get_cutom_invoices($custom_id){ 
    global $db;
    $sql="select * from invoices where custom_id=?";
	 $st=$db->prepare($sql);	
		 $st->bindValue(1,$custom_id);
		 $st->execute();
	  //  $result=$st->setFetchMode(PDO::FETCH_ASSOC);
	$cutom_invoices=array();
   foreach($st->fetchAll() as $i){
	  $cutom_invoices[]=$i;
    }
 	echo json_encode($cutom_invoices);
 }
 
///////////////////////////////////////////////////////////////
 	  if(isset($_POST['refresh'])&&$_POST['refresh']=='get_all_customers'){
		   get_all_customers();
	   }
 /////get_all_customers/////////
 function get_all_customers(){ 
    global $db;
    $customers=array();
    $sql="select * from customers order by custom_id desc ";
    $result=$db->query($sql);
   foreach($result as $info){			       
			   $customers[]=$info;
    }
	$res[0]=$customers;
 	echo json_encode($res);
 }
 
 ////////////////////////////////////////////////////////////////////////////////////
 	  if(isset($_POST['get_customer'])&&isset($_POST['custom_id'])){
		   get_customer($_POST['custom_id']);
	   }
 /////////////get_customer////////////////
  function get_customer($custom_id){ 
    global $db;
	  $sql="select * from customers where custom_id=?";
	 $st=$db->prepare($sql);	
		 $st->bindValue(1,$custom_id);
		 $st->execute();
   foreach($st as $info){			       
			   $custom=$info;
    }
 	echo json_encode($custom);
 }
 //////////////////////////////////////////////////////////////////////
 
 ///////////////search////////////////
 if(isset($_POST['search'])){

    $projects=array();
	$pro=array();
	 $images=array();
	 $res=array();
			 $search=$_POST['text'];
    $sql="select * from invoices  where invo_id like '%".$search."%' 
	or custom_id like '%".$search."%' or amount like '%".$search."%' or notes like '%".$search."%' 
	or date like '%".$search."%'  order by invo_id desc ";
    $result=$db->query($sql);
	$locations=array();
	$count=0;
 
   foreach($result as $info){	  
	 

		       
			   $pro[0]=$info;
			  $projects[]= $info;
			    $count+=1;
    }


$res[0]=$projects;	
$res[1]=$count;
 	echo json_encode($res);

	 
 }
////////////////////////////

 if(isset($_POST['fun'])){
/////////////////add project/////////////////
 if($_POST['fun']=='insert'){

 $name=$_POST['name'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];
$info=$_POST['info'];
$category=$_POST['category'];
//$start_date=date('y-m-d h:m');

$start_date=$_POST['start_date'];


$user_id=$_POST['user_id'];


try{
	$msg1=""; 
      $sql="INSERT INTO `invoices` (`custom_id`, `amount`, `notes`, `date`, `type`, `status`, `user_id`) values(?,?,?,SYSDATE(),?,?,?)";
  
         $state=$db->prepare($sql);	
		 $state->bindValue(1,$name);
		 $state->bindValue(2,$start_date);
		 $state->bindValue(3,$lng);
	//	 $state->bindValue(4,$info);
		 $state->bindValue(4,$category);
		 $state->bindValue(5,$lat);
		 $state->bindValue(6,$user_id);
		// $state->bindValue(8,$status);
		 $exe=$state->execute();
     //         $db->close();
	 if(!$exe){
	 $msg1=$exe;	
		}
	  else{
		   $msg1=$exe;
	  }	
}
CATCH(PDOException $e){
die($e->getMessage());
			 }
	   	  get_all_invoices(); 
 }
 
 //////////////////edit project/////////////////
if($_POST['fun']=='update'){
$pid=$_POST['pid'];
$name=$_POST['name'];
$info=$_POST['info'];
$category=$_POST['category'];
//$start_date=date('y-m-d h:m');
$start_date=$_POST['start_date'];
$finish_date=$_POST['finish_date'];

$lat=$_POST['lat'];
$lng=$_POST['lng'];

if(isset($_POST['confirmed'])&&$_POST['confirmed']==1)
$status=1;
else
	$status=0;

	      $sql="update projects set name=?,info=?,category=?,start_date=?,finish_date=?,lat=?,lng=?,status=? where id=?";

         $state=$db->prepare($sql);	
		 $state->bindValue(1,$name);
		 $state->bindValue(2,$info);
		 $state->bindValue(3,$category);
		 $state->bindValue(4,$start_date);
		 $state->bindValue(5,$finish_date);
		 $state->bindValue(6,$lat);
		 $state->bindValue(7,$lng);
		 $state->bindValue(8,$status);
		 $state->bindValue(9,$pid);
		 $exe=$state->execute();

	 if(!$exe){
	   $msg1="لم يتم التعديل".$status;	
		}
	  else{
		  $msg1=" تم التعديل بنجاح ".$status;
	  }		
get_all_invoices();
}
 }
 ///////////delete project///////
  if(isset($_POST['fun'])&&$_POST['fun']=='del'){
	   $pid=$_POST['pid'];
	  
	      $query="delete from invoices where invo_id=".$pid;
         $stat=$db->prepare($query);	
		 		 $exec=$stat->execute();

	 if($exec>0){
	   $msg1=$pid;	
	   get_all_invoices();
		}
	  else{
		  $msg1=0;
	  }		

  }

 /////////////////////////////////////
 function getdate_now(){
	return date('D d-m-yy');
}
/////////////////////////////////

if(isset($_POST['upload'])){

	if(!empty($_FILES['file'])){
		$success=0;
$fn= $_FILES['file']['name'];
$ft= $_FILES['file']['type'];
$fs= $_FILES['file']['size'];
$ftmp= $_FILES['file']['tmp_name'];	

$v_type=['jpg','png','gif','pdf','mp4'];
//pathinfo()

$e=explode(".", $fn);
$path=strtolower(end($e));
 //echo $path;
$size=400000000;
$new_name="images/".uniqid().".$path";

	if(move_uploaded_file($ftmp,$new_name)){
	$photo=$new_name;
		$ms="upload successfullt";
		$success=1;
	}
else
	$ms="file not uploaded"; 

}
else
	$ms="no photo";

	$res=array();
	//$res['data']=$fn;
	$res['msg']=$ms;
$res['success']=$success;
echo JSON_encode($res);
}
?>