<form enctype="multipart/form-data" action="<?=site_url('test/media/upload')?>" method="post">

	<div id="boxtop"></div><div id="boxmid">

		<div class="section">
			<span>File:</span>
			<input type="file" name="file" />
		</div>

	</div><div id="boxbot"></div>

	<div class="text" style="float: left;"><p>Before uploading, check out</p><p>the <a href=#>Terms of Service</a>.</p></div>
   	<div class="text" style="float: right;">

	<input type="submit" value="Upload" name="upload" class="submit" />
</div>
<br style="clear:both; height: 0px;" />

</form>	
