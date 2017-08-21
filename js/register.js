	/*利用jquery和js*/
//实现用户注册后当前页面登录
	
	$(function(){
		$('#formBtn').click(function(){
			$('#login').css('display','block');
			$('#login_form').css('display','block');
		});
		$('#back').click(function(){
			$('#login').css('display','none');
			$('#login_form').css('display','none');
		});
	});

	$('#login_btn').click(function(){
		$.post('login.php',$('#form2').serialize(),function(data){
			if( data=='1'){
				location.href = 'success.html';
			}else{
				alert('请您再次输入');
			}
		});
	});
/*
	--用户名表单域添加onfocus onblur事件 判断用户名是否符合要求--
*/
	$('#um').focus(function(){
		$('#checkUm').css('display','block');
	});

	var f1;
	$('#um').blur(function(){
		 f1 = ckUm();
	});

	function ckUm(){
		//alert(checkedUm($('#um').val()));
		var len = $('#um').val().length;
		if(len == 0){
			$('#checkUm').css('display','none');
			return false;
		}else if( Number($('#um').val()) ){	
			$('#checkUm').html('<p class="zhushu"><img src="images/false.png" class="img">&ensp;&ensp;不能全是数字组合</p>');
			return false;
		}else if( len>14 ){
			$('#checkUm').html('<p class="zhushu"><img src="images/false.png" class="img">&ensp;&ensp;字符长度不能超过14个</p>');
			return false;
		}else if( ckSpecial($('#um').val()) ){
			$('#checkUm').html('<p class="zhushu"><img src="images/false.png" class="img">&ensp;&ensp;用户名不能含特殊符号</p>');
		}else if( checkedUm($('#um').val()) == 1 ){
			$('#checkUm').html('<p class="zhushu"><img src="images/false.png" class="img">&ensp;&ensp;该用户已经被注册</p>');
			return false;
		}else{
			$('#checkUm').html('<p class="zhushu"><img src="images/true.png" class="img"></p>');
			return true;
		}
	}
/*
	--判断是否有特殊符号--
*/
	function ckSpecial(values){
		var arr = ['!','@','#','$','%','^','&','*','(',')'];
		var len = arr.length;
		for( var i=0; i<len; ++i){
			for( var j=0; j<values.length; ++j){
				if( values.charAt(j) == arr[i] ){
					return true;
				}
			}
		}
	}
	

/*
	--通过ajax同步请求验证用户名是否被注册了--
*/
	function checkedUm(username){
		var flag;
		$.ajax({
			type:'POST',
			url:'register.php',
			data:"username="+username,
			async : false,
			success:function(data){
				flag = data;
			}
		});
		return flag;
	}

/*
	--手机号码表单域增加onfocus onblur两个事件验证手机号码是否符合要求--
*/	
	$('#tel').focus(function(){
		$('#checkTel').css('display','block');
	});
	var f2;
	$('#tel').blur(function(){
		f2 = ckTel();
	});
	function ckTel(){
		//alert(checkedTel($('#tel').val()));
		var len = $('#tel').val().length;
		var flag = (/^1[3|4|5|7|8][0-9]\d{4,8}$/.test($('#tel').val()));
		if( len == 0){
			$('#checkTel').css('display','none');
			return false;
		}else if( len>0 && (!flag) ){
			$('#checkTel').html('<p class="zhushu"><img src="images/false.png" class="img">&ensp;&ensp;手机格式不对</p>');
			return false;
		}else if( checkedTel($('#tel').val()) ==1 ){
			$('#checkTel').html('<p class="zhushu"><img src="images/false.png" class="img">&ensp;&ensp;手机号已被注册</p>');
			return false;
		}else{
			$('#checkTel').html('<p class="zhushu"><img src="images/true.png" class="img"></p>');
			return true;
		}
	}
/*
	--同步验证手机号是否被注册过--	
*/	
	function checkedTel(tel){
		var flag;
		$.ajax({
			type:'POST',
			url:'register.php',
			data:"tel="+tel,
			async : false,
			success:function(data){
				flag = data;
			}
		});
		return flag;
	}
/*
	--密码表单域增加两个事件 验证密码是否符合要求--
*/	
	$('#pwd').focus(function(){		
		$('#checkPwd').css('display','block');
	});
	var f3 ;
	$('#pwd').blur(function(){
		f3 = ckPwd();
	});
	function ckPwd(){
			var lenpwd = $('#pwd').val().length;
			var flag = /\s/.test($('#pwd').val());
			if( lenpwd ==0 ){
				$('#checkPwd').css('display','none');
				return false;
			}else if( lenpwd<6 || lenpwd>14 ){
				$('#checkPwd').html('<p class="zhushu"><img src="images/false.png" class="img">&ensp;&ensp;密码长度不符合要求</p>');
				return false;				
			}else if(flag){
				$('#checkPwd').html('<p class="zhushu"><img src="images/false.png" class="img">&ensp;&ensp;不允许有空格</p>');
				return false;
			}else{
				$('#checkPwd').html('<p class="zhushu"><img src="images/true.png" class="img"></p>');
				return true;			
			}
		}
	

/*
	--给提交按钮绑定事件--
*/
	$('#btn').click(function(){
		//alert(f1);
		//console.log(f2);
		//alert(f3);
		if( f1 & f2 & f3 ){
			$.post('register.php',$('#form1').serialize(),function(data){
				if( data==1 ){
					$('.success').css('display','block');
					$('.fail').css('display','none');
					$('#checkUm').css('display','none');
					$('#checkTel').css('display','none');
					$('#checkPwd').css('display','none');
					refrush();
				}
			});
		}else{
			$('.fail').css('display','block');
		}
	});
	function refrush(){
		setTimeout("location.reload()",4000);
	}



