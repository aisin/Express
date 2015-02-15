<html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<title>Upload File Specification</title>
</head>
<body>
<h3>Your file was successfully uploaded!</h3>
<!-- Uploaded file specification will show up here -->
<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>
<p><?php echo anchor('avatar_upload/file_view', 'Upload Another File!'); ?></p>
</body>
</html>