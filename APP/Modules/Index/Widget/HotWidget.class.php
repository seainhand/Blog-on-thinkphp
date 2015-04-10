<?php

class HotWidget extends Widget{
	public function render ($data) {
		//热门博文	
		$limit = $data['limit'];
		$field = array('id','title','click');
		$data['blog'] = M('blog')->field($field)->order('click DESC')->limit($limit)->select();
		return $this->renderFile('',$data);
	}
}

?>