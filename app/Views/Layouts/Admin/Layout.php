<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font/fontawesome/css/all.css');?> " media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/ui/amcharts/plugins/export/export.css');?>" media="screen">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ui/font-awesome.min.css');?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ui/animate-css/animate.min.css');?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ui/lobipanel/lobipanel.min.css');?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ui/toastr/toastr.min.css');?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ui/icheck/skins/line/blue.css');?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ui/icheck/skins/line/red.css');?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ui/icheck/skins/line/green.css');?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/ui/main.css');?>" media="screen">
        
</head>
<body class="top-navbar-fixed">
	<div class="main-wrapper">
		<?= $this->renderSection('nav') ?>
		<div class="content-wrapper" style="margin-top: 0px;">
			<div class="content-container">
				<?= $this->renderSection('leftmenu') ?>
				<?= $this->renderSection('content') ?>
			</div>
            <!-- /.content-container -->
		</div>
	   <!-- /.content-wrapper -->

	</div>
        <!-- /.main-wrapper -->
        
        <?= $this->renderSection('footer') ?>
	
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    	
    	<script type="text/javascript" src="<?php echo base_url('assets/js/sweetalert2.all.min.js'); ?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/jquery-ui/jquery-ui.min.js'); ?>"></script>
    	
    	<!-- ========== COMMON JS FILES ========== -->
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/pace/pace.min.js'); ?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/lobipanel/lobipanel.min.js'); ?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/iscroll/iscroll.js'); ?>"></script>
    	
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/prism/prism.js'); ?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/waypoint/waypoints.min.js'); ?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/counterUp/jquery.counterup.min.js'); ?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/amcharts/amcharts.js'); ?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/amcharts/serial.js'); ?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/amcharts/plugins/export/export.min.js'); ?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/amcharts/themes/light.js'); ?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/amcharts/themes/light.js'); ?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/toastr/toastr.min.js'); ?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/icheck/icheck.min.js'); ?>"></script>
    	
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/main.js'); ?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/production-chart.js'); ?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/traffic-chart.js'); ?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/task-list.js'); ?>"></script>
    	
    	<script type="text/javascript" src="<?php echo base_url('assets/js/ui/modernizr/modernizr.min.js'); ?>"></script>
    	
        <script>
            $(function(){
    
                // Counter for dashboard stats
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });
    
                // Welcome notification
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                toastr["success"]( "Welcome to Activity Students Result Management System!");
    
            });
        </script>
        
	</body>
</html>