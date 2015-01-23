<!-- Header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url();?>">Express</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<?php //print_r($menu);
					foreach($menu as $name => $attr){
						echo '<li><a href="' .$attr['url']. '"><i class="glyphicon '.$attr['iconCls'].'"></i> '.$name.'</a></li>';
					}
				?>
				<!--
				<li class="dropdown">
					<a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Admin <span class="caret"></span></a>
					<ul id="g-account-menu" class="dropdown-menu" role="menu">
						<li><a href="#">My Profile</a></li>
					</ul>
				</li>
				<li><a href="#"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
				-->
			</ul>
		</div>
	</div><!-- /container -->
</div>
<!-- /Header -->