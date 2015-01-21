<?php $this->load->view('header'); ?>

<div id="wrapper">

    <?php $this->load->view('sidebar.php'); ?>

    <!-- Page Content -->
    <div id="page-content-wrapper" class="dashboard_main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Simple Sidebar  <button type="button" id="menu-toggle" class="btn btn-primary btn-xs">Toggle Menu</button></h1>
                    <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                    <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                    
                </div>
            </div>
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