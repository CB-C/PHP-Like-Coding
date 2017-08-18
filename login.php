<?php 

	if ( !empty($_POST) ) {

		$username = $_POST['admin_name'];
		$password = $_POST['admin_password'];
		//var_dump($username,$password);
		$link = @mysql_connect('localhost','root','root') or die(mysql_error());
		mysql_query('set names utf8');
		mysql_query('use test');

		//$sql = "select * from register where username='$username' and pwd='$password' ";
		$sql = "select * from register where (username,pwd)=('$username','$password') ";
		$res = mysql_query($sql);
		
		//通过这个方法可以遍历数据表中的每条记录的值
		# while( $arr =mysql_fetch_assoc($res) ){
		#	 echo $arr['username'],$arr['pwd'];
		# }
		if( mysql_num_rows($res)==1 ){
			echo "1";
		}else{
			echo "0";
		}
	}

 ?>