<!DOCTYPE html>
<html>
    <head>
    	<title><?php echo $title; ?></title>
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css');?>">
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font/fontawesome/css/all.css');?>">
    </head>
    <body>
        <?php echo $this->renderSection('nav'); ?>
        <div class="container">
    		<?php echo $this->renderSection('content'); ?>
    	</div>
    	<?php echo $this->renderSection('footer'); ?>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	</body>
</html>