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
                    
                    <div class="tab-pane active" role="tabpanel" id="step2">
                        <h3>Step 2</h3>     

                            <ul class="list-inline pull-right">
                                <li><a href="<?php echo base_url('admin/homeroom/activity1');?>" class="btn btn-default prev-step">Previous</a></li>
                                <li><a href="<?php echo base_url('admin/homeroom/activity3');?>" class="btn btn-primary next-step">Save and continue</a></li>
                            </ul>
                            
                            <table class="table">
                                  <tr>
                                    <td>
                                      <h3>แบบบันทึกรายงาน การปฏิบัติงานของครูที่ปรึกษา</h3>
                                      <p><?php echo "สัปดาห์ที่  ".$_SESSION['week_number']."  วันที่  ".$date."  เดือน  ".$month."  พ.ศ.  ".$year ?></p>
                                      <!-- <h5>** กรุณาบันทึกข้อมูลให้ครบ ทั้งหมด 3 Step **</h5> -->
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <form name="add_obedience" id="add_obedience" method="POST" onsubmit="JavaScript:return fncSubmit" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <!-- <label for="detail">Step 2</label> -->
                                          <p><h4>เรื่องที่ให้คำแนะนำ นักเรียน นักศึกษา</h4></p>
                                            <br>
                                          <textarea class="form-control" name='obe_detail' id='obe_detail' rows='3' required="required"></textarea>
                                        </div>
                                            <br>
                                          <b>เรื่องแบบประเมินตนเอง สำหรับนักเรียน นักศึกษา โดยผ่านการสแกน QR-Code เพื่อเป็นการเฝ้าระวังและป้องกันการแพร่เชื่อระบาดของโรคโควิด-19
                                          <p>(2 สัปดาห์ ทำ 1 ครั้ง)</p><br>
                                        <div class="form-group">
                                          <label for="question_num">จำนวนผู้ตอบแบบสอบถามคัดกรอง</label>
                                          <input type="text" class="form-control" name="question_count" id="question_count" placeholder="ระบุจำนวน">
                                        </div>
                                          <p>จำนวนนักเรียน นักศึกษาทั้งหมด <?php echo " ".$num_result['student']." " ?> คน ขาดกิจกรรมโฮมรูม <?php echo $absent_result['student'] ?> คน</p>
                                            <br>
                                            <p>เลือกภาพขณะให้คำแนะนำ นักเรียน นักศึกษา เพื่อประกอบการจัดทำรายงาน</p>
                                        <div class="form-group">
                                          <label for="img_file">เลือกภาพที่ท่านต้องการ :  </label>
                                            <input class="btn btn-info btn-sm" type="file" name="img_name[]" accept="image/png, image/jpeg" id="img_name" multiple="multiple" required="required">
                                        </div>
                                        <a href="<?php echo base_url('admin/homeroom/activity3');?>" name="submit_step2" class="btn btn-primary">บันทึกข้อมูล</button>
                                      </form>
                                    </td>
                                  </tr>
                                </table>
                        

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