<?php
class NewWidget extends Widget {

	public function render ($data) {
		//热门博文	
		$limit = $data['limit'];
		$field = array('id','title','click','time');
		$data['blog'] = M('blog')->field($field)->order('time DESC')->limit($limit)->select();
 
		return $this->renderFile('',$data);
	}
}
 



?>