<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title;?></title>
<!-- Bootstrap -->
<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/dashboard.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<!-- Bootstrap -->
<style type="text/css">
body{background:#fff;}
.main{background:#fff;padding-top:15px;padding-bottom:15px;font:12px/2 "Microsoft Yahei",arial;margin-top:50px;}
.error p{color:#f00;}
footer{margin:20px auto;}
footer .container{background:#fff;padding-top:10px;}
</style>
</head>
<body>
	
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url();?>">CodeIgniter</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<!--<li class="active"><a href="#">Link</a></li>-->
				<!--功能菜单-->
				<?php //print_r($menu);
					foreach($menu as $link_text => $link_url){
						echo '<li><a href="' .$link_url. '">' .$link_text. '</a></li>';
					}
				?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						
						<li><a href="#">Link</a></li>
						<li><a href="#">Mod</a></li>
						
						<li class="divider"></li>
						<li class="dropdown-header">Nav header</li>
						<li><a href="#">Separated link</a></li>
						<li><a href="#">One more separated link</a></li>
					</ul>
				</li>
				<li class="active"><a href="./">Default</a></li>
				<li><a href="../navbar-static-top/">Static top</a></li>
				<li><a href="../navbar-fixed-top/">Fixed top</a></li>
			</ul>
		</div><!--/.navbar-collapseollapse -->
	</div><!--/.container-fluid -->
</div>