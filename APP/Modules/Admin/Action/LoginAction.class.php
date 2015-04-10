<?php
 
Class LoginAction extends Action{
  public function index(){ 
  	$this->display();
 }
  


    //登录表单操作
  Public function login(){
  	if(!IS_POST) halt('页面不存在');

  	if($_SESSION['verify'] != md5($_POST['code'])) {
  		$this->error('验证码错误！');
  	}
  	  
  	$db = M('user');
  	$user = $db->where(array('username' => I('username')))->find();

  	if(!$user||$user['password'] != md5($_POST['password'])){
  		$this -> error('账号或密码错误');
  	}

  	//更新最后一次登录时间的IP
  	$data = array(
  		'id'=>$user['id'],
  		'logintime' => time(),
  		'loginip' =>get_client_ip()
  		);
  	$db->save($data);

  	session('uid',$user['id']);
  	session('username',$user['username']);
  	session('longintime',date('Y-m-d H:i:s',$user['logintime']));
  	session('loginip',$user['loginip']);

  	redirect(__GROUP__);
  	
 }



  public function verify(){
  	import('ORG.Util.Image');
  	Image::buildImageVerify();
  }



}
?>