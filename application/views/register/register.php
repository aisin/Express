<?php $this->load->view('header');?>

<div class="main container">
	<div class="row">
		<div class="col-md-8">

			<form class="form-horizontal" action="<?php echo site_url('/register/');?>" method="post" accept-charset="utf-8">

				<div class="form-group">
					<label for="input1" class="col-sm-3 control-label">Your Name:</label>
					<div class="col-sm-9">
						<input class="form-control" id="input1" type="text" name="name" placeholder="Your Name" value="<?php echo set_value('name') ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input2" class="col-sm-3 control-label">Your Username:</label>
					<div class="col-sm-9">
						<input class="form-control" id="input2" type="text" name="username" placeholder="Your Username" value="<?php echo set_value('username') ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input3" class="col-sm-3 control-label">Password:</label>
					<div class="col-sm-9">
						<input class="form-control" id="input3" type="password" name="password" placeholder="Password" value="<?php echo set_value('password') ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input4" class="col-sm-3 control-label">Confirm Password:</label>
					<div class="col-sm-9">
						<input class="form-control" id="input4" type="password" name="passconf" placeholder="Confirm Password" value="<?php echo set_value('passconf') ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input5" class="col-sm-3 control-label">Your Email:</label>
					<div class="col-sm-9">
						<input class="form-control" id="input5" type="text" name="email" placeholder="Your Email" value="<?php echo set_value('email') ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input6" class="col-sm-3 control-label">Your Country:</label>
					<div class="col-sm-9">
						<select class="form-control" id="input6" name="country">
							<option value="Bangladesh" <?php echo set_select('country', 'Bangladesh'); ?> >Bangladesh</option>
							<option value="Bangladesh" <?php echo set_select('country', 'India'); ?> >India</option>
							<option value="Bangladesh" <?php echo set_select('country', 'Pakistan'); ?> >Pakistan</option>
							<option value="Bangladesh" <?php echo set_select('country', 'Nepal'); ?> >Nepal</option>
							<option value="Bangladesh" <?php echo set_select('country', 'Bhutan'); ?> >Bhutan</option>
							<option value="Bangladesh" <?php echo set_select('country', 'Srilanka'); ?> >Srilanka</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="input7" class="col-sm-3 control-label">Your Address:</label>
					<div class="col-sm-9">
						<textarea class="form-control" id="input7" name="address" placeholder="Your Address"><?php echo set_value('address') ?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="input8" class="col-sm-3 control-label">Your Gender:</label>
					<div class="col-sm-9">
						<label class="radio-inline">
							<input type="radio" name="gender" value="Male" <?php echo set_radio('gender', 'Male'); ?>> Male &nbsp;&nbsp;
						</label>
						<label class="radio-inline">
							<input type="radio" name="gender" value="Female"  <?php echo set_radio('gender', 'Female'); ?>> Female
						</label>
					</div>
				</div>

				<div class="form-group">
					<label for="input9" class="col-sm-3 control-label"></label>
					<div class="col-sm-9">
						<input type="checkbox" name="terms" value="1" <?php echo set_checkbox('terms', '1'); ?>> I agree to the w3programmers Terms of Service and Privacy Policy
					</div>
				</div>

				<div class="form-group">
					<label for="input10" class="col-sm-3 control-label"></label>
					<div class="col-sm-9">
						<input class="btn btn-success" type="submit" value="注册" name="submit">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-3 control-label"></div>
					<div class="error col-sm-9">
						<p><?php echo $info;?></p>
						<p><?php echo validation_errors();?></p>
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