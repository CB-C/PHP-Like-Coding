<?php 
	namespace app\admin\controller;
	use think\Controller;
	use think\Request;
	use think\Db;
	class Login extends Controller{
		public function login($name='蔡标',$age='20'){
			// return '您好,登录成功';
			// print_r($this->request->param());
			// $data = Db::name('main')->find(1,2,3);
			// print_r($data);die;
			// echo $name,$age;die;
			$name = '小王';
			$age = 20;
			$this->assign('name',$name);
			$this->assign('age',$age);
			return $this->fetch();
		}
		public function register(){
			return $this->fetch();
		}
	}