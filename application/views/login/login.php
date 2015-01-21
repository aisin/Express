<?php $this->load->view('header');?>

<div class="main container">
	<div class="row">
		<div class="col-md-8">

			<form class="form-horizontal" data-toggle="validator" role="form" action="<?php echo site_url('/login/');?>" method="post" accept-charset="utf-8">

				<div class="form-group">
					<label for="input1" class="col-sm-3 control-label">Username or Email:</label>
					<div class="col-sm-9">
						<input class="form-control" id="input1" type="text" name="username" placeholder="Username or Email" required>
					</div>
				</div>

				<div class="form-group">
					<label for="input2" class="col-sm-3 control-label">Password:</label>
					<div class="col-sm-9">
						<input class="form-control" id="input2" type="password" name="password" placeholder="Password" data-minlength="6" required>
					</div>
				</div>

				<div class="form-group">
					<label for="input10" class="col-sm-3 control-label"></label>
					<div class="col-sm-9">
						<input class="btn btn-primary" type="submit" value="Log In" name="submit_login">
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="#">Lost your password ?</a>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-3 control-label"></div>
					<div class="error col-sm-9">
						<p><?php echo $info; ?></p>
						<p><?php echo validation_errors(); ?></p>
					</div>
				</div>

			</form>
		</div>

		<div class="col-md-4">
			<p>总有一天你会发现，朋友们忙到没空听你诉苦，父母头发斑白你已不忍像他们哭诉，爱人也在因为自己的事而焦头烂额。你觉得你从未如此孤独无助，你觉得被世界抛弃。可人总要学会自己长大。我知道你终会擦干眼泪站起来，一个人解决掉问题，经历坎坷。变成一个更坚强的你。</p>
		</div>
	</div>
</div>

<?php $this->load->view('footer');?>