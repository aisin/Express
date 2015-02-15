<html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<title>Upload Form</title>
</head>
<body>
<?php echo $error;?> <!-- Error Message will show up here -->
<?php echo form_open_multipart('avatar_upload/do_upload');?>
<?php echo "<input type='file' name='userfile' size='20' />"; ?>
<?php echo "<input type='submit' name='submit' value='upload' /> ";?>
<?php echo "</form>"?>
</body>
</html>