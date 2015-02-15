<?php $this->load->view('admin/com/header'); ?>

<style type="text/css">
#avatar_container{width:110px;height:110px; background:url(<?php echo base_url(ASSETS_PATH.'admin/images/user.png');?>) no-repeat center;margin-bottom:0;}
#avatar_container img{width: 100px;}
</style>

<!-- Main column -->
<div class="col-sm-9">

	<a href="<?php echo site_url(ADMINPATH . 'profile/');?>">
        <strong><i class="glyphicon glyphicon-user"></i> My Profile</strong>
    </a>
    
    <hr>

    <div class="row">
    	<div class="col-md-8">

			<form action="" method="post" accept-charset="utf-8" class="form-horizontal" id="avatar_form" enctype="multipart/form-data">

				<div class="form-group">
					<label for="input-1" class="col-sm-3 control-label"></label>
					<div class="col-sm-9">
						<a id="avatar_container" href="javascript:;" class="thumbnail">
							<?php if($user['avatar']) echo '<img width="100" height="100" src="'. base_url(AVATAR_PATH).'/'.$user['avatar'] .'"/>';?>
						</a>
						
					</div>
				</div>

				<div class="form-group hide">
					<label for="input0" class="col-sm-3 control-label"></label>
					<div class="col-sm-9">
						<input type="file" id="avatar" name="avatar" size="20">
					</div>
				</div>
			</form>
			
			<?php 
				$attributes = array('class' => 'form-horizontal');

				echo form_open(site_url(ADMINPATH . 'profile/'), $attributes);
			?>

				<div class="form-group">
					<label for="input1" class="col-sm-3 control-label">Your Name:</label>
					<div class="col-sm-9">

						<input type="hidden" name="avatar_url" value="<?php echo $user['avatar']; ?>">

						<input class="form-control" id="input1" type="text" name="name" placeholder="Your Name" value="<?php echo $user['name']; ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input2" class="col-sm-3 control-label">Your Username:</label>
					<div class="col-sm-9">
						<input class="form-control" id="input2" type="text" name="username" placeholder="Your Username" value="<?php echo $user['username']?>" readonly>
					</div>
				</div>

				<div class="form-group">
					<label for="input5" class="col-sm-3 control-label">Your Email:</label>
					<div class="col-sm-9">
						<input class="form-control" id="input5" type="text" name="email" placeholder="Your Email" value="<?php echo $user['email']?>" readonly>
					</div>
				</div>		

				<div class="form-group">
					<label for="input6" class="col-sm-3 control-label">Your Country:</label>
					<div class="col-sm-9">
						<select class="form-control" id="input6" name="country">
							<?php
								$coutryList = array('China', 'America', 'German', 'England', 'Japan', 'Others');

								foreach ($coutryList as $ctry) {
									echo '<option value="'.$ctry.'" '.set_select('country',$ctry, ($user['country'] == $ctry)).'>'.$ctry.'</option>';
								}
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="input7" class="col-sm-3 control-label">Your Address:</label>
					<div class="col-sm-9">
						<textarea class="form-control" id="input7" name="address" placeholder="Your Address"><?php echo $user['address'] ?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="input8" class="col-sm-3 control-label">Your Gender:</label>
					<div class="col-sm-9">
						<label class="radio-inline">
							<input type="radio" name="gender" value="Male" <?php echo set_radio('gender', 'Male', $user['gender'] == 'Male')?>> Male &nbsp;&nbsp;
						</label>
						<label class="radio-inline">
							<input type="radio" name="gender" value="Female" <?php echo set_radio('gender', 'Female', $user['gender'] == 'Female')?>> Female
						</label>
					</div>
				</div>

				<!--
				<div class="form-group">
					<label for="input9" class="col-sm-3 control-label">Current Password:</label>
					<div class="col-sm-9">
						<input class="form-control" id="input9" type="password" name="oldpassword" placeholder="Current Password" value="<?php echo set_value('oldpassword') ?>">
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
				-->

				<div class="form-group">
					<label for="input10" class="col-sm-3 control-label"></label>
					<div class="col-sm-9">
						<input class="btn btn-primary btn-sm" type="submit" value="Submit" name="submit">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-3 control-label"></div>
					<div class="error col-sm-9">
						<p><?php echo $info;?></p>
						<p><?php echo validation_errors();?></p>
					</div>
				</div>
			
			<?php echo form_close(); ?>

		</div>
	</div><!--/.row-->
</div>
<!--/Main column-->
<!--
<form id="sb_img" action="<?php echo site_url(ADMINPATH.'profile/crop');?>" method="post">
<input type="text" id="file_name" name="file_name" value=""/>
<input type="text" id="x" name="x" value=""/>
<input type="text" id="y" name="y" value=""/>
<input type="text" id="w" name="w" value=""/>
<input type="text" id="h" name="h" value=""/>
<input type="submit" id="submit" name="submit" value="Crop Imagex!" />
</form>
-->

<!--
<div id="preview">
    <img src="" alt="thumb" />
</div>

<style type="text/css">
#preview
        {
            width: 100px;
            height: 100px;
            overflow:hidden;
        }
</style>
-->
<!--model-->
<div id="avatar_select_model" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">

			</div>

			<form id="crop_form" action="<?php echo site_url(ADMINPATH.'profile/crop');?>" method="post">
				<input type="hidden" id="copy_file" name="copy_file">
				<input type="hidden" id="copy_x" name="copy_x">
				<input type="hidden" id="copy_y" name="copy_y">
				<input type="hidden" id="copy_w" name="copy_w">
				<input type="hidden" id="copy_h" name="copy_h">
			</form>	
			

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<!--
				<button type="submit" name="submit_crop" class="btn btn-primary">Save changes</button>-->
				<button type="button" id="submit_crop" class="btn btn-primary">OK</button>
			</div>
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--model-->

<?php $this->load->view('admin/com/footer'); ?>