/*
	--登录界面验证--
*/

window.onload = function(){
	$(function(){
	//alert( $('#form1').serialize() );
		$('#btn').click(function(){
			//alert( $('#form1').serialize() );	
			if( $('#name').val()=='' ){
				$('.tishiUm').css('display','block');
			}else if( $('#name').val()!='' && $('#password').val()== ''){
				$('.tishiUm').css('display','none');
				$('.tishiPwd').css('display','block');
			}else{
				$('.tishiUm').css('display','none');
				$('.tishiPwd').css('display','none');
				//alert($('#name').val());
				//alert($('#password').val());		
				$.post('login.php',$('#form1').serialize(),function(data){
					if( data == '1'){
						location.href = 'success.html';
					}else{
						$('#errorMsg').html('<p style="color:red;">您输入的用户名或密码错误,<a href="#" style="width:60px;height:18px;">忘记密码?</a></p>');
					}
				})
			}

		});
	});

}
