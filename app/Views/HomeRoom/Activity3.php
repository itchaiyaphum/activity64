<?= $this->extend('Layouts/Admin/Layout') ?>

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
                    
                    <div class="tab-pane active" role="tabpanel" id="step3">
                        <h3>Step 3</h3>
                        <p>แจ้งรายชื่อนักเรียน นักศึกษา ที่มีปัญหาให้ผู้ปกครงได้รับทราบ (เรื่องที่แจ้ง เช่น กิจกรรมเข้าแถว/กิจกรรมโฮมรูม/การไม่เข้าร่วมกิจกรร/การขาดเรียน/ความประพฤติ
                        หรือ เรื่องอื่น ๆ ที่ต้องการแจ้งให้ผู้ปกครองได้รับทราบ )</p>
                            <form id="step3_form" method="post">
                            
<table id="example3" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>รหัส </th>                                                                                                                     
                                                            <th>ชื่อ - นามสกุล</th>
                                                            <th>รายละเอียด</th>  
                                                            <th>หมายเหตุ</th>
                                                            <th>สถานะ</th>
                                                         
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                        <th>ลำดับ</th>
                                                            <th>รหัส </th>
                                                            <th>ชื่อ - นามสกุล</th>
                                                            <th>รายละเอียด</th>  
                                                            <th>หมายเหตุ</th>
                                                            <th>สถานะ</th>
                                                        </tr>
                                                    </tfoot>
 <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////          -->                       
                                          
                                        <tbody>
<?php for($i=0; $i<10; $i++){?>
                                                          <tr>
                                                            <td><?php echo $i;?></td>
                                                            <td><?php echo $row['student_id'];?></td>
                                                            <td> <?php echo $row['prefix'].$row['std_name']."&nbsp;&nbsp;".$row['std_lastname'];?></td>  
                                                            <td><input type="text" name="detail[]" value=""></td>        
                                                            <td><input type="text" name="comment[]" value=""></td>                             
                                                            <td>
                                                            <div class="radio icheck-emerland">
                                                                <input type="checkbox" id="emerland<?php echo $id ?>" name="check_[]" value="<?php echo $id ?>"  />
                                                                <label for="emerland<?php echo $id ?>">เสี่ยง</label>  
                                                                <input type="hidden"  name="check_n[]" value="<?php echo $no ?>"  />
                                                                                                                            
                                                            </div>
                                                           
                                                <input type="hidden" name="student_id[]" value="<?php echo $student_id ?>">
                                                
                                                
                        
                                              
                                                            </div>
                                                            </td>
                                                            </tr>   
                                                            <?php } ?>                                            
                                
                                    
                                                    </tbody>
                                                  </table>
                                <ul class="list-inline pull-right">
                                    <li><a href="<?php echo base_url('admin/homeroom/activity2');?>" class="btn btn-default prev-step">Previous</a></li>
                                    <li><a href="<?php echo base_url('admin/homeroom');?>" class="btn btn-default next-step">Skip</a></li>
                                    <li><a href="<?php echo base_url('admin/homeroom/activity4');?>" class="btn btn-primary btn-info-full next-step">Save and continue</a></li>
                                </ul>
                            </form>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Complete</h3>
                        <p>คุณได้บันทึกรายงาน การปฏิบัติงานครูที่ปรึกษา สัปดาห์ที่ ..... เรียบร้อยแล้ว</p>
                        <button type="button" class="btn btn-primary btn-info-full next-step">Save and Send</button>
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