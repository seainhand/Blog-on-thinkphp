<?php
class BlogAction extends CommonAction{



	//博文列表
	public function index(){
		$this->blog = D('BlogRelation')->getBlogs(); 
		$this->display();
	}


	public function trach(){
		$this ->blog = D('BlogRelation')->getBlogs(1);
		$this->display('index');
	}

	public function delete(){
			$id = (int)$_GET['id'];
			if(M('blog') -> delete($id)){
				M('blog_attr') -> where(array('bid'=>$id))->delete();
				$this->success('删除成功' ,U(GROUP_NAME . '/Blog/trach'));
			}else{
				$this->error('删除失败');
			} 

	}


	//回收站
	public function toTrach(){
		$type = (int)$_GET['type'];
		$msg=$type ? '删除' : '还原';
		$update = array(
			'id' => (int)$_GET['id'],
			'del' => $type
		);
		if(M('blog')->save($update)){
			$this->success($msg . '成功',U(GROUP_NAME . '/Blog/index'));
		}else{
			$this -> error($msg . '失败');
		}
	}


	//添加博文
	public function blog(){
		//所属分类
		import('Class.Category' , APP_PATH);
		$cate =M('cate') ->order('sort') -> select();
		$this->cate=Category::unlimitedForlevel($cate);

		//博文属性
		$this->attr = M('attr') ->select();

		$this->display();
	}

	//添加博文表单处理
	public function addBlog(){
		$data = array(
			'title' => $_POST['title'],
			'content' =>$_POST['content'],
			'summary' =>$_POST['summary'],
			'time' => time(),
			'click' => (int)$_POST['click'],
			'cid' => (int)$_POST['cid'],
			);

  		if($bid = M('blog')->add($data)){

  			if(isset($_POST['aid'])){
  				$sql = 'INSERT INTO `' . C('DB_PREFIX') . 'blog_attr`(bid,aid)
  				VALUES';
  				foreach ($_POST['aid'] as $v) {
  					$sql .= '(' . $bid . ',' . $v . '),' ;
  				}
  				$sql = rtrim($sql,',');
  				M('blog_attr')->query($sql);
  			} 
  			$this->success('添加成功' , U(GROUP_NAME . '/Blog/index'));
  		}else{
  			$this->error('添加失败');
  		}
	}

	public function updateBlog(){
		$id = $_GET['id']; 
		$field = array('id','title','time','click','summary','content','cid');
		$where = array('id'=>$id);
		$this->blog = M('blog')->where($where)->field($field)->select();
 		import('Class.Category' , APP_PATH);
		$cate =M('cate') ->order('sort') -> select();  
		$this->cate=Category::unlimitedForlevel($cate); 
		$this->display();
	}

    public function runUpdateBlog(){
    	dump($_POST);
		if(M('blog')->save($_POST)){
			$this->success('修改成功',U(GROUP_NAME . '/Blog/index'));
		}else{
			$this->error('添加失败');
		}

	}
}




?>