<?php
   include("conn.php");
   mysql_query('set names utf8');
   
   
   //$oi=$_POST['oi'];
   //$oi=2;
/*   $sqy="select count(`id`) from `information`;";
   $query=mysql_query($sqy);
   $rsy=mysql_fetch_array($query);
   $d=$rsy[0]-$oi;
   $sql="select * from `information`  where `id` ='$d';";*/
   for($oi=0;$oi<30;$oi++){
   $sql="select `name`,`content` from `sign_message` order by `id` desc limit $oi,1;";
   $a=mysql_query($sql);
   $b=mysql_fetch_assoc($a);
   $array=null;
   $array[]=$b['content'];
   $c=$b['name'];
   $sql="SELECT *  FROM `member` WHERE  `username`='$c';";
   $a=mysql_query($sql);
   $b=mysql_fetch_assoc($a);
   $name=$b['firstname'].$b['lastname'];
   $array[]=$name;
   $sql="select `time` from `sign_message` order by `id` desc limit $oi,1;";
   $a=mysql_query($sql);
   $b=mysql_fetch_assoc($a);
  // echo $b['time'];
	   $m=date("m",strtotime($b['time']));
	   $array[]=$m;
	   $d=date("d",strtotime($b['time']));
	   $array[]=$d;
	   $h=date("H",strtotime($b['time']));
	   $array[]=$h;
	   $i=date("i",strtotime($b['time']));
	   $array[]=$i;
   //print_r($array);
  if($array[1]==NULL){
    }
	else{$qarray[]=$array;
	}
	}
	echo json_encode($qarray);
?>