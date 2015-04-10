<?php
class ShowAction extends Action{

	//首页
	public function index(){
		$id=(int)$_GET['id']; 
		$field = array('title','time','click','content','cid');
		$this->blog=M('blog')->field($field)->find($id); 

		$cid = $this->blog['cid'];
		import('Class.Category' , APP_PATH);
		$cate = M('cate')->order('sort')->select();
		$this->parent = Category::getParents($cate,$cid);


		M('blog')->where(array('id' =>$id))->setInc('click');

		$this->display();
	}
}


?>