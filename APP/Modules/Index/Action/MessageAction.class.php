<?php


class MessageAction extends Action{
	public function index(){
	$this ->message = M('message') ->order('time DESC')-> select();
	$this->display();

	}

	public function addMessage(){

		if(M('message')->add($_POST)){
			$this->success('添加成功',U(GROUP_NAME . '/Message/index'));
		}else{
			$this->error('添加失败');
		}
	}
}

?>