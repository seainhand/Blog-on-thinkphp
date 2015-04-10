<?php if (!defined('THINK_PATH')) exit();?>

			<dl>
				<dt>最发布发</dt>
					<?php if(is_array($blog)): foreach($blog as $key=>$v): ?><dd>
							<a href="<?php echo U('/' . $v['id']);?>" target='_blank'><?php echo ($v["title"]); ?></a>
							<span><?php echo (date('y-m-d H:i',$v["time"])); ?></span>
						</dd><?php endforeach; endif; ?>	
	 
 
			</dl>