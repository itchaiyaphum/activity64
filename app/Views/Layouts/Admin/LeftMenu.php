<?= $this->section('leftmenu') ?>
	<div class="left-sidebar bg-black-300 box-shadow ">
                        <div class="sidebar-content">              
                            <div class="sidebar-nav">
                                <ul class="side-nav color-gray">
                                    <li class="nav-header">
                                        <span class="">Main Category</span>
                                    </li>
                                    <li>
                                        <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>
                                     
                                    </li>

                                    <li class="nav-header">
                                        <span class="">Appearance</span>
                                    </li>
                                    <li><a href="user_index.php"><i class="fa fa fa-users"></i> <span> User</span></a></li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>กิจกรรมโฮมรูม</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="<?php echo base_url('admin/homeroom');?>"><i class="fa fa-bars"></i> <span>เช็คชื่อกิจกรรมโฮมรูม</span></a></li>
                                            <li><a href="<?php echo base_url('admin/homeroom/activity');?>"><i class="fa fa fa-server"></i> <span>บันทึกกิจกรรมโฮมรูม</span></a></li>
                                            <li><a href="#"><i class="fa fa fa-server"></i> <span>จัดการกิจกรรมโฮมรูม</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>รายงานการส่งข้อมูล</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="manage-homeroom.php"><i class="fa fa-bars"></i> <span>กิจกรรมโฮมรูม</span></a></li>
                                            <li><a href="#"><i class="fa fa fa-server"></i> <span>กิจกรรมหน้าเสาธง</span></a></li>
                                            <li><a href="#"><i class="fa fa fa-server"></i> <span>กิจกรรมเยี่ยมบ้านผู้เรียน</span></a></li>
                                        </ul>
                                    </li>
  <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>Subjects</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="create-subject.php"><i class="fa fa-bars"></i> <span>Create Subject</span></a></li>
                                            <li><a href="manage-subjects.php"><i class="fa fa fa-server"></i> <span>Manage Subjects</span></a></li>
                                           <li><a href="add-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Add Subject Combination </span></a></li>
                                           <a href="manage-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Manage Subject Combination </span></a></li>
                                        </ul>
                                    </li>
   <li class="has-children">
                                        <a href="#"><i class="fa fa-users"></i> <span>Students</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="add-students.php"><i class="fa fa-bars"></i> <span>Add Students</span></a></li>
                                            <li><a href="manage-students.php"><i class="fa fa fa-server"></i> <span>Manage Students</span></a></li>
                                           
                                        </ul>
                                    </li>
<li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>Timeline</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="add-time.php"><i class="fa fa-bars"></i> <span>Add Time</span></a></li>
                                            <li><a href="manage-time.php"><i class="fa fa fa-server"></i> <span>Manage Time</span></a></li>
                                           
                                        </ul>
                                        <li><a href="<?php echo base_url('admin/user/changeprofile');?>"><i class="fa fa fa-users"></i> <span> Admin Change Profile</span></a></li>
                                        <li><a href="<?php echo base_url('admin/user/changepassword');?>"><i class="fa fa fa-server"></i> <span> Admin Change Password</span></a></li>  
                                    </li>
                            </div>
                            <!-- /.sidebar-nav -->
                        </div>
                        <!-- /.sidebar-content -->
	</div>
<?= $this->endSection() ?>