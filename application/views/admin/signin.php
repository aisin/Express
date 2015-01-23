<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title;?></title>
<!-- Bootstrap -->
<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/formValidation/formValidation.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/formValidation/bootstrap.min.js');?>"></script>
<!-- Bootstrap -->
<style type="text/css">
body {background: url("<?php echo base_url('assets/admin/images/admin_login_bg.jpg');?>") no-repeat center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;}
.panel-default {opacity: 0.9;margin-top:100px;}
.form-group.last {margin-bottom:0px;}
@media screen and (max-width:640px) {
    .panel-default{margin-top:10px;}
}
</style>
<script type="text/javascript">
jQuery(document).ready(function() {

    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#cap').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));
    $('#loginForm').formValidation({
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: '用户名不能为空'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: '密码不能为空'
                    },
                    stringLength: {
                        min: 6,
                        message: '密码不能少于6位'
                    },
                }
            },
            captcha: {
                validators: {
                    callback: {
                        message: '验证码输入错误',
                        callback: function(value, validator, $field) {
                            var items = $('#cap').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            }
        }
    });
});
</script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-7">
            <div class="panel panel-default">
                <div class="panel-heading">
					<strong class="">Administrator sign in</strong>
                </div>
                <div class="panel-body">
					<form id="loginForm" class="form-horizontal" action="<?php echo site_url(ADMIN_SIGNIN);?>" method="post" accept-charset="utf-8">
                        <div class="form-group">
                            <label for="input1" class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-8">
								<input class="form-control" id="input1" type="text" name="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input2" class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-8">
								<input class="form-control" id="input2" type="password" name="password" placeholder="Password" data-minlength="6">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" id="cap" for="captcha"></label>
                            <div class="col-sm-8">
                                <input id="captcha" type="text" class="form-control" name="captcha">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <div class="checkbox">
                                    <label><input type="checkbox">Remember me</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-4 col-sm-8">
								<input class="btn btn-primary btn-sm" type="submit" value="Sign in" name="submit_login">
								<input class="btn btn-default btn-sm" type="reset" value="Reset">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
					<div class="row">
						<div class="col-md-6">
							<a href="<?php echo site_url('signup');?>">Sign up here</a>
						</div>
						<div class="col-md-6 text-right">
							<a href="#">Lost your password?</a>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>