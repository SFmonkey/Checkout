<?php

 include("conn.php");
 mysql_query('set names utf8');
 $id=$_POST['use'];
//$id="РюзгК­";
//echo $id;
$password=$_POST['pas'];
//$password="7926834806f539c5c11c41d383f43ee0";
$sql = "SELECT * FROM `member` WHERE `username` = '$id';";
$query=mysql_query($sql);
if($rs=mysql_fetch_array($query)){
         $hmdpassword=md5($rs['password']);
		 //echo $hmdpassword;
		 if($hmdpassword==$password){
		     $data=1;
			 session_start();
   			 $_SESSION['loginuser']=$rs['username'];
		  }else{
		 
		   $data=2;
		  }
	}else{
		 $data=3;
		
}
echo json_encode($data);


?>