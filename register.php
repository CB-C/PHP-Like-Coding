<?php 


	#连接数据库 封装成函数
	function verify($field,$value){
		$link = @mysql_connect('localhost','root','root') or die(mysql_error());

		#设置和数据库服务器通信的编码
		mysql_query('set names utf8');
		mysql_query('use test');
		#选出表的所有数据
		$sql = " select * from register where $field='$value' ";

		$record = mysql_query($sql);

		if( mysql_num_rows($record) == 1 ){
			return true;
		}else{
			return false;
		}		
	}
	function store($name,$tel,$pwd){
		$link = @mysql_connect('localhost','root','root') or die(mysql_error());
		mysql_query('set names utf8');
		mysql_query('use test');
		$sql = 	"insert into register values (default,'$name','$tel','$pwd')";
		$save = mysql_query($sql);	
		if( $save ){
			return true;
		}else{
			return false;
		}
	}
	#通过$_POST 获取注册过程中传过来的各项值
	if( !empty($_POST)){
		#先判断post传来了哪些值 根据不同的值做相对应的验证
		$f1 = array_key_exists('username', $_POST);
		$f2 = array_key_exists('tel', $_POST);
		$f3 = array_key_exists('pwd', $_POST);
		#先将数据库中的字段名取出来	
		$umfield = 'username';
		$telfield = 'tel';
		#只验证用户名
		if( $f1 && !$f2 && !$f3){
			$username = $_POST['username'];
			echo verify($umfield,$username);			
		}
		#只验证密码
		else if( $f2 && !$f1 && !$f3){
			$tel = $_POST['tel'];	
			echo verify($telfield,$tel);			
		}
		#注册表填完后符合要求后 执行存储步骤
		else if( $f1 && $f2 && $f3){
			$username = $_POST['username'];
			$tel = $_POST['tel'];
			$pwd = $_POST['pwd'];
			echo store($username,$tel,$pwd);
		}	
	}

 ?>