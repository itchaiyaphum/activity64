<div style="background: url('<?php echo base_url('assets/imgs/bg.jpg')?>'); background-repeat:repeat-y;">
	<div id="wrapper" class="uk-container uk-container-center">
		<div class="uk-text-left uk-margin-top">
			<?php $this->load->view('home/header');?>
			<hr/>
			<div class="uk-grid uk-grid-small">
				<div class="uk-width-2-10">
					<?php $this->load->view('home/menu');?>
				</div>
				<div class="uk-width-6-10" style="border-left: 1px solid #fff; padding: 10px;">
					<img src="/assets/imgs/home_into_bg.png">
				</div>
				<div class="uk-width-2-10" style="border-left: 1px solid #fff; padding: 10px;">
					<?php $this->load->view('home/rightmenu');?>
				</div>
			</div>
			<hr/>
			<?php $this->load->view('home/footer_txt.php');?>
		</div>
		
	</div>
</div>
<style>
#wrapper {
    color: #fff;
}
.website-header {
    margin-top: 20px;
    color: #fff;
    font-size: 60px;
    line-height: 80px;
}
.uk-nav>li>a {
    color: #fff;
}
</style>
