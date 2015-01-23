	</div>
</div>
<!-- /Main - container-fluid -->

<footer class="text-center">
	This Bootstrap 3 dashboard layout is compliments of <a href="http://www.bootply.com/85850"><strong>Bootply.com</strong></a>
</footer>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script type='text/javascript'>
$(document).ready(function() {
	$(".alert").addClass("in").fadeOut(4500);
	/* swap open/close side menu icons */
	$('[data-toggle=collapse]').click(function(){
		// toggle icon
		$(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
	});
});
</script>

</body>
</html>