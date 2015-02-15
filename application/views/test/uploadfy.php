<script type="text/javascript">
$(document).ready(function() {
	$("#uploadify").uploadify({
		'uploader'       : '/ztblog/js/jquery/uploadfy/uploadify.swf',
		'script'         : '<?= site_url() ?>/test/media/upload',
		'cancelImg'      : '/ztblog/js/jquery/uploadfy/cancel.png',
		'folder'         : 'uploads',
		'queueID'        : 'fileQueue',
		'auto'           : false,
		'multi'          : true
	});
});
</script>

<div id="fileQueue"></div>
<input type="file" name="uploadify" id="uploadify" />
<p><a href="javascript:jQuery('#uploadify').uploadifyClearQueue()">Cancel All Uploads</a></p>