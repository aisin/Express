<style>
#upload{
	margin:30px 200px; padding:15px;
	font-weight:bold; font-size:1.3em;
	font-family:Arial, Helvetica, sans-serif;
	text-align:center;
	background:#f2f2f2;
	color:#3366cc;
	border:1px solid #ccc;
	width:150px;
	cursor:pointer !important;
	-moz-border-radius:5px; -webkit-border-radius:5px;
}

</style>

<!-- Upload Button-->
<div id="upload" >Upload File</div><span id="status" ></span>
<!--List Files-->
<ul id="files" ></ul>


<script type="text/javascript">
$(function(){
	var btnUpload=$('#upload');
	var status=$('#status');
	new AjaxUpload(btnUpload, {
		action: 'http://localhost/ztblog/index.php/test/media/upload',
		//Name of the file input box
		name: 'Filedata',
		onSubmit: function(file, ext){
			if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
                  // check for valid file extension
				status.text('Only JPG, PNG or GIF files are allowed');
				return false;
			}
			status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			//Add uploaded file to list
			if(response==="success"){
				$('<li></li>').appendTo('#files').html('<img src="<?= base_url() ?>files/'+file+'" alt="" /><br />'+file).addClass('success');
				console.log('<?= base_url() ?>files/'+file);
			} else{
				$('<li></li>').appendTo('#files').text(file).addClass('error');
			}
		}
	});
});

</script>