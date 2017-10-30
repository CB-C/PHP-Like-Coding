<?php 
	namespace app\news\controller;
	use think\Controller;
	use think\Db;
	use think\Request;
	use think\captcha\Captcha;
	class News extends Controller {
		public function login(){
			#获取表单的值
			$arr = $this->request->param();			
			$name = isset($arr['uname'])?$arr['uname']:'';
			$pwd = isset($arr['upass'])?$arr['upass']:'';
			$verifyx = isset($arr['verify'])?$arr['verify']:'';
			#验证码验证
			$captcha = new Captcha();
			$captcha->entry();	
			if( $name=='' || $pwd=='' || $verifyx==''){
				return $this->fetch();
			}else{
				var_dump($_SESSION);die;
				$res = $captcha->check($verifyx);
				var_dump($res);die;
				if(!captcha_check($verifyx)){
					$this->error('验证码错误');die;
				}
				$this->redirect('listnews');
			}			
						
		}

		public function addnews(){
			return $this->fetch();
		}

		public function listnews(){
			$news = DB::table('news')->field(['n_id,n_title','c_id','n_sort'])->select();
			// $sql = 'select n_title,c_id,n_sort from news';
			// $res = $user->query($sql);
			// echo "<pre/>";
			// print_r($res);die;
			// var_dump($user);die;
			
			// $this->assign('name',$name);
			$this->assign('news',$news);			
			return $this->fetch();
		}

		public function updatenews(){
			return $this->fetch();
		}
		public function recycle(){
			return $this->fetch();
		}
		#单独设置验证码方法
		public function check_verify($code){
			
		}
	}
