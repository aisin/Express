<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<title>Using the JQuery JCrop Plugin, and PHP for Image Uploads</title>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<script type="text/javascript" src="<?php echo base_url() . 'js/jquery/jquery.js'  ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'js/jquery/jcrop/jquery.Jcrop.pack.js' ?>"></script>
	<link rel="stylesheet" href="<?php echo base_url() . 'js/jquery/jcrop/jquery.Jcrop.css' ?>" type="text/css" />
	<script type="text/javascript">
		$(function(){
			$('#cropbox').Jcrop({
				aspectRatio: 1,
				setSelect: [0,0,<?php echo $targ_w.','.$targ_w;?>],
				onSelect: updateCoords,
				onChange: updateCoords
			});
		});
		
		function updateCoords(c)
		{
			showPreview(c);
			$("#x").val(c.x);
			$("#y").val(c.y);
			$("#w").val(c.w);
			$("#h").val(c.h);
		}
		
		function showPreview(coords)
		{
			var rx = <?php echo $targ_w;?> / coords.w;
			var ry = <?php echo $targ_h;?> / coords.h;
			
			$("#preview img").css({
				width: Math.round(rx*<?php echo $orig_w;?>)+'px',
				height: Math.round(ry*<?php echo $orig_h;?>)+'px',
				marginLeft:'-'+  Math.round(rx*coords.x)+'px',
				marginTop: '-'+ Math.round(ry*coords.y)+'px'
			});
		}
	</script>
	<style type="text/css">
		#preview
		{
			width: <?php echo $targ_w?>px;
			height: <?php echo $targ_h?>px;
			overflow:hidden;
		}
	</style>
	</head>

	<body>
    
		<h1>Jcrop Plugin Behavior</h1>
		<table>
			<tr>
				<td>
					<img src="<?php echo base_url() . 'files/' . $path ?>" id="cropbox" alt="cropbox" />
					
				</td>
				<td>
					Thumb Preview:
					<div id="preview">
						<img src="<?php echo base_url() . 'files/' . $path ?>" alt="thumb" />
					</div>
				</td>
			</tr>
		</table>
		
		<form action="<?php echo site_url() . '/test/gallery/crop' ?>" method="post">
			<p>
				<input type="text" id="file_name" name="file_name" value="<?php echo $path?>" />
				<input type="text" id="x" name="x" />
				<input type="text" id="y" name="y" />
				<input type="text" id="w" name="w" />
				<input type="text" id="h" name="h" />
				<input type="submit" id="submit" name="submit" value="Crop Imagex!" />
			</p>
		</form>
	</body>
</html>