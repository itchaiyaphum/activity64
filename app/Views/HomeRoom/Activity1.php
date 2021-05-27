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
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <h3>Step 1</h3>
                        <p>เช็คชื่อเข้าร่วม กิจกรรมโฮมรูม สัปดาห์ที่.1.. สาขาวิชา...เทคโนโลยีสารสนเทศ อาจารย์ที่ปรึกษา กฤษณา</p>                      
                            
                            
                                <ul class="list-inline pull-right">
                                    <li><a href="<?php echo base_url('admin/homeroom/activity2');?>" class="btn btn-primary next-step">Save and continue</a></li>
                                </ul>
                                
                                
                                
                                <form action="" method="POST" >
                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>รหัส </th>                                                                                                                     
                                                            <th>ชื่อ - นามสกุล</th>
                                                            <th>สาขาวิชา</th>  
                                                            <th>กลุ่มการเรียน</th>
                                                            <th>สถานะการเข้าร่วม</th>
                                                         
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                        <th>ลำดับ</th>
                                                            <th>รหัส </th>
                                                            <th>ชื่อ - นามสกุล</th>
                                                            <th>สาขาวิชา</th>  
                                                            <th>กลุ่มการเรียน</th>
                                                            <th>สถานะการเข้าร่วม</th>
                                                        </tr>
                                                    </tfoot>
                                          
                                        <tbody>
            <?php for($i=0; $i<10; $i++){?>
            <tr>
                <td><?php echo $i+1;?></td>
                <td>623901000<?php echo $i+1;?></td>
                <td>นายวรรณพงษ์ คำจุมพล</td>  
                <td>เทคโนโลยีสารสนเทศ</td>        
                <td>ทส. E</td>                             
                <td>
                <div class="radio icheck-emerland">
                    <input type="radio" id="emerland<?php echo $id ?>" name="check_[<?php echo $i ?>]" value="1"  checked/>
                   
                    <label for="emerland<?php echo $id ?>">มา</label>  
                                                                        
                </div>
                <div class="radio icheck-pomegranate">
                    <input type="radio"  id="pomegranate<?php echo $id ?>" name="check_[<?php echo $i ?>]" value="2" />
                   
                    <label for="pomegranate<?php echo $id ?>">ขาด</label>
                    
                </div>
                <div class="radio icheck-amethyst">
                    <input type="radio"  id="pomegranate<?php echo $id ?>" name="check_[<?php echo $i ?>]" value="3" />
                   
                    <label for="pomegranate<?php echo $id ?>">สาย</label>       
                </div>
                <div class="radio icheck-sunflower">
                    <input type="radio"  id="pomegranate<?php echo $id ?>" name="check_[<?php echo $i ?>]" value="4" />
                    <label for="pomegranate<?php echo $id ?>">ลา</label> 
                    <input type="hidden" name="student_id[<?php echo $i ?>]" value="<?php echo $student_id ?>">
                    <input type="hidden" name="student_n[<?php echo $i ?>]" value="<?php echo $student_id ?>">
                    <input type="hidden"  name="check_n[<?php echo $i ?>]" value="<?php echo $i ?>"  />
                    <input type="hidden" name="prefix[]" value="<?php echo $prefix ?>">
                    <input type="hidden" name="std_name[]" value="<?php echo $std_name ?>">
                    <input type="hidden" name="std_lastname[]" value="<?php echo $std_lastname ?>">
                    <input type="hidden" name="group_id[]" value="<?php echo $group_id ?>">
    
                </div>
                </td>
            </tr>
            <?php } ?>
        
                        </tbody>
                        </table>
                        <a href="<?php echo base_url('admin/homeroom/activity2');?>" class="btn btn-sm btn-info">บันทึก</a>
                    </form> 
                            
                            
                            

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