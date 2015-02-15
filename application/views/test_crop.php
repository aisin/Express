<?php $this->load->view('admin/com/header'); ?>

	<!-- Page Content -->
    <div class="col-sm-9">
		<h1>Simple Sidebar  <button type="button" id="menu-toggle" class="btn btn-primary btn-xs">Toggle Menu</button></h1>
		<p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
		<p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
		
		<?php echo $cropresult;?><br>
		
		
		
		
		<button type="button" data-toggle="modal" data-target="#myModal">Launch modal</button>
		
		<button type="button" id="open">打开</button>
		
                    
    </div>
    <!-- /#page-content-wrapper -->

	
<!--==================================以下是 footer.php================================-->
	
	</div>
</div>
<!-- /Main - container-fluid -->

<footer class="text-center">
	This Bootstrap 3 dashboard layout is compliments of <a href="http://www.bootply.com/85850"><strong>Bootply.com</strong></a>
</footer>

<!--model-->
<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--model-->

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script type="text/javascript">
$(function(){
	//$('#myModal').show();
	$('#open').on('click', function(){
		$('#myModal').modal();
	});
});
</script>
</body>
</html>