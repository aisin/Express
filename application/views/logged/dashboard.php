<?php $this->load->view('header'); ?>

<div id="wrapper">

    <?php $this->load->view('sidebar.php'); ?>

    <!-- Page Content -->
    <div id="page-content-wrapper" class="dashboard_main">
        <div class="container-fluid">
			<div class="row">
				<div class="col-lg-8">

					<h1>Dashboard  <button type="button" id="menu-toggle" class="btn btn-primary btn-xs">Toggle Menu</button></h1>

					
				</div>

				<div class="col-lg-4">
					<p>总有一天你会发现，朋友们忙到没空听你诉苦，父母头发斑白你已不忍像他们哭诉，爱人也在因为自己的事而焦头烂额。你觉得你从未如此孤独无助，你觉得被世界抛弃。可人总要学会自己长大。我知道你终会擦干眼泪站起来，一个人解决掉问题，经历坎坷。变成一个更坚强的你。</p>
				</div>
			</div><!--/.row-->
		</div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
</script>

</body>
</html>