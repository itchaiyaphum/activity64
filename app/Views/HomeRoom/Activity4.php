<?= $this->section('content') ?>
<div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Save Activity Homeroom</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li>กิจกรรมโฮมรูม</li>
            							<li class="active">บันทึกกิจกรรมโฮมรูม</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>

                        <section class="section">
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">

                                        <div class="panel-body">                   
                                        <div class="row">
		<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <!-- <i class="glyphicon glyphicon-folder-open"></i> -->
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                            <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-book"></i>                             
                            </span>
                        </a>
                    </li>
            
                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- <form role="form"  method="post"> -->
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="complete">
                        <h3>Complete</h3>
                        <p>คุณได้บันทึกรายงาน การปฏิบัติงานครูที่ปรึกษา สัปดาห์ที่ ..... เรียบร้อยแล้ว</p>
                        <a href="<?php echo base_url('admin/homeroom/');?>" class="btn btn-primary btn-info-full next-step">Save and Send</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <!-- </form> -->
        </div>
    </section>
   </div>  

                                           
                                        </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
<?= $this->endSection() ?>