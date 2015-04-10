<?php
Class CategoryAction extends CommonAction{

	//分类列表视图
	public function index(){
		import('Class.Category',APP_PATH);
		$cate = M('cate') ->order('sort ASC')->select();
		$cate = Category::unlimitedForLevel($cate); 
		$this->cate = $cate;
	 	$this->display();
	}

	//添加分类视图
	Public function addCate(){
		$this->pid = I('pid',0,'intval');
		$this->display();
	}

	//添加分类表单处理
	public function runAddCate(){
		if(M('cate')->add($_POST)){
			$this->success('添加成功',U(GROUP_NAME . '/Category/index'));
		}else{
			$this->error('添加失败');
		}
	}

	//排序
	public function sortCate(){
		$db = M('cate');
		foreach ($_POST as $id => $sort) {
		$db -> where(array('id' => $id))->setField('sort',$sort);
		}
		$this->redirect(GROUP_NAME . '/Category/index');
	}

	public function updateCate(){
		$id = $_GET['id'];
		$field = array('id','name','pid','sort');
		$where = array('id'=>$id);
		$this->cate = M('cate')->where($where)->field($field)->select();
 
		$this->display();
	}


	public function runUpdateCate(){ 
		if(M('cate')->save($_POST)){
			$this->success('修改成功',U(GROUP_NAME . '/Category/index'));
		}else{
			$this->error('添加失败');
		}
 
	}
}



?>