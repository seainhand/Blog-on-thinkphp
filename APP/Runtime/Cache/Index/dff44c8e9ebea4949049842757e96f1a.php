<?php if (!defined('THINK_PATH')) exit();?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/common.css" /> 
	<link href="__PUBLIC__/Css/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="__PUBLIC__/Css/flat-ui.min.css" rel="stylesheet"> 
 
</head> 

<body >
		
<!--头部-->
 
<?php
 $cate = M('cate')->order('sort')->select(); import('Class.Category',APP_PATH); $cate = Category::unlimitedForLayer($cate); ?>
 

	<div class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
	        <div class="navbar-header">
		          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            <span class="sr-only">Toggle navigation</span>
		          </button>
		          <a class="navbar-brand" href="__GROUP__">你好哇</a>
	        </div>
			<div class="navbar-collapse collapse"> 
				<ul class="nav navbar-nav">
			 		<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><li class='nav-lv1-li dropdown' >
							<a href="<?php echo U('/c_' . $v['id']);?>" class='top-cate dropdown-toggle'><?php echo ($v["name"]); ?></a>
							<?php if($v["child"]): ?><ul  class="dropdown-menu dropdown-menu-inverse" role="menu">
			 						<?php if(is_array($v["child"])): foreach($v["child"] as $key=>$value): ?><li><a href="<?php echo U('/c_' . $v['id']);?>"><?php echo ($value["name"]); ?></a></li><?php endforeach; endif; ?>
								</ul><?php endif; ?>	
						</li><?php endforeach; endif; ?> 
					<li class="navbar-right "><a href="__ROOT__/admin">Admin</a></li>
					<li class="navbar-right "><a href="__ROOT__/Message/index">留言板</a></li>
				</ul>
			</div>	
	    </div>	
    </div>
<!--主体-->
	<div  class="row">
		<div class='col-md-2'></div>
		<div class='main-left col-md-6'>
		<div class='main-left'>
			<?php if(is_array($blog)): foreach($blog as $key=>$v): ?><dl>

					<dt class='channel'><?php echo ($v["title"]); ?></dd>
					<dd><?php echo ($v["name"]); ?></dt>
					<dd class='info'>
						<span class='time'>发布于：<?php echo (date('y年m月d日 H:i:s',$v["time"])); ?></span>
						<span class='click'>点击：<?php echo ($v["click"]); ?></span>
					</dd>
					<dd class='summary'><?php echo ($v["summary"]); ?></dd>
					<dd class='content' id="<?php echo ($v["id"]); ?>"   onclick="changec(this)" ><?php echo ($v["content"]); ?></dd>

					<dd class='read'>
						<a href="<?php echo U('/' . $v['id']);?>" target='_blank'>阅读全文>></a>
					</dd>
  
				</dl><?php endforeach; endif; ?> 
		</div>
	</div>
		 
		<div class='col-md-1'></div>
	<!--主体右侧-->

			<!--主体右侧-->
				<div class='col-md-1'></div>
		<div class='main-right col-md-3'>
			<?php echo W('Hot',array('limit'=>5));?>

			<?php echo W('New',array('limit'=>5));?>

		</div>
	</div>

<!--底部-->

		<!--底部-->
<div class="footer"> 

   
   

</div>


	<script src="__PUBLIC__/Js/jquery.min.js"></script> 
    <script src="__PUBLIC__/Js/flat-ui.min.js"></script> 

	<script type="text/JavaScript" src='__PUBLIC__/Js/common.js'></script>
</body>
</html>