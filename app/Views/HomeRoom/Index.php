<?= $this->extend('Layouts/Admin/Layout') ?>

<?= $this->section('content') ?>
	<div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Manage Students Homeroom Activity</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li>กิจกรรมโฮมรูม</li>
            							<li class="active">เช็คชื่อเข้าร่วมกิจกรรมโฮมรูม </li>
            						</ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                 <h5>เช็คชื่อเข้าร่วม  กิจกรรมโฮมรูม เลือกสัปดาห์ที่ต้องการ</h5>
                                                </div>
                                            </div>  
                                            <div class="panel-body p-20">
												<form>
                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ลำดับ</th>
                                                            <th>ภาคเรียน </th>                                                                                                                     
                                                            <th>สัปดาห์</th>
                                                            <th>วันที่ร่วมกิจกรรม</th>  
                                                            <th>สถานะ</th>
                                                         
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>ลำดับ</th>
                                                            <th>ภาคเรียน </th>                                                                                                                     
                                                            <th>สัปดาห์</th>
                                                            <th>วันที่ร่วมกิจกรรม</th>  
                                                            <th>สถานะ</th>
                                                        </tr>
                                                    </tfoot>
                                    
                                                   	 <form action="" >
                                                     <tbody>
                                                             <tr>
                                                                <td>1</td>
                                                                <td>1/2564</td>
                                                                <td>1</td>  
                                                                <td>2021-05-09 11:48:00</td>
                                                            	<td >ยังไม่ได้เปิดใช้งาน</td>  
                                                        	</tr>
                                                             <tr>
                                                                <td>2</td>
                                                                <td>1/2564</td>
                                                                <td>2</td>  
                                                                <td>2021-05-09 11:48:00</td>
                                                            	<td >ยังไม่ได้เปิดใช้งาน</td>  
                                                        	</tr>
                                                             <tr>
                                                                <td>3</td>
                                                                <td>1/2564</td>
                                                                <td>3</td>  
                                                                <td>2021-05-09 11:48:00</td>
                                                            	<td >ยังไม่ได้เปิดใช้งาน</td>  
                                                        	</tr>
                                                             <tr>
                                                                <td>4</td>
                                                                <td>1/2564</td>
                                                                <td>4</td>  
                                                                <td>2021-05-09 11:48:00</td>
                                                            	<td >ยังไม่ได้เปิดใช้งาน</td>  
                                                        	</tr>
                                                     </tbody>
                                                 </table>
                                                	<a href="<?php echo base_url('admin/homeroom/activity1');?>" class="btn btn-sm btn-info">บันทึก</a>
                                                    </form>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
<?= $this->endSection() ?>
