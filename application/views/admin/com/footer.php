	</div>
</div>
<!-- /Main - container-fluid -->

<footer class="text-center">
	This Bootstrap 3 dashboard layout is compliments of <a href="http://www.bootply.com/85850"><strong>Bootply.com</strong></a>
</footer>
<link rel="stylesheet" href="http://code.ciaoca.com/jquery/jcrop/demo/css/jquery.Jcrop.css">

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/ajaxfileupload.js');?>"></script>

<script src="http://code.ciaoca.com/jquery/jcrop/demo/js/jquery.Jcrop.min.js"></script>

<script type="text/javascript">
$(document).ready( function() {

    $('#avatar_container').on('click', function(){ $('#avatar').trigger('click') })

    $('#submit_crop').on('click', function(e){

        e.preventDefault();
        $.ajax({
            cache: false,
            url: "<?php echo site_url(ADMINPATH.'profile/crop');?>",
            type: 'POST',
            data: $('#crop_form').serialize(),
            dataType: 'json',
            success: function(data)
            {
                if(data.msg) alert(data.msg);

                if(data.url){
                    var imgUrl = "<?php echo base_url(AVATAR_PATH);?>"+"/"+data.url;
                    var img = '<img src="'+imgUrl+'"/>';
                    $('#avatar_container').html(img);
                    $('input[name="avatar_url"]').val(data.url);
                }

                $('#avatar_select_model').modal('hide');
            }
        });
    });

    $('#avatar_select_model').on('hide.bs.modal', function () {
        //清空所有的
        $('#avatar').val('');

        $('#avatar_select_model .modal-body').html('');

    });

    

});

function readImage(input) {
    if ( input.files && input.files[0] ) {
        var FR= new FileReader();
        FR.onload = function(e) {
             //$('#img').attr( "src", e.target.result );
             var img = '<img id="avatar_select_img" src="'+ e.target.result +'"/>';
             $('#avatar_select_model .modal-body').html( img );
             //$('#preview img').attr('src', e.target.result);

             //剪裁器
             $('#avatar_select_img').Jcrop({
				aspectRatio: 1,
                setSelect: [0,0,100,100],
                onSelect: updateCoords,
                onChange: updateCoords
			});
        };       
        FR.readAsDataURL( input.files[0] );
    }
}

//剪裁器-方法
function updateCoords(c)
{
    //showPreview(c);
    $("#copy_x").val(c.x);
    $("#copy_y").val(c.y);
    $("#copy_w").val(c.w);
    $("#copy_h").val(c.h);
}

//上传 Avatar
$(function(){

    $(document).on('change', '#avatar', function(){

        $('#avatar_form').submit();
    });



	$('#avatar_form').submit(function(e) {

		e.preventDefault();
		$.ajaxFileUpload({
			url 			: "<?php echo site_url(ADMINPATH . 'profile/upload_avatar');?>",
			secureuri		: false,
			fileElementId	: 'avatar',
			dataType		: 'json',
			
			success	: function (data, status)
			{
				if(data.status != 'error')
				{

                    var img = '<img id="avatar_select_img" src="'+ data.msg +'"/>';
        
                    $('#avatar_select_model .modal-body').html( img );

                    $('#copy_file').val(data.fname);

                    $('#avatar_select_model').modal('show');

                    //剪裁器
                    $('#avatar_select_img').Jcrop({
                        aspectRatio: 1,
                        setSelect: [0,0,100,100],
                        onSelect: updateCoords,
                        onChange: updateCoords
                    });
				}
				else
				{
					alert(data.msg);
				}
				
			}
		});
		return false;
	});
});
</script>
</body>
</html>