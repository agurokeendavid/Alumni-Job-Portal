<?php 
$query_sidebar = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE `student_userID` = $login_id");
$res_sidebar = mysqli_fetch_assoc($query_sidebar);
$query_count_post = mysqli_query($con,"SELECT `post_owner_id` FROM `forum_topic` WHERE `post_owner_id` = $login_id");
$res_count_post = mysqli_num_rows($query_count_post);
$userType = "student";
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
       <img src="../assets/img/profile_img/<?php echo $data_img?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
      <a href="profile.php"><p>
          <?php echo $res_sidebar['student_lName'] . ', ' . $res_sidebar['student_fName'] . ' ' . substr($res_sidebar['student_mName'], 0, 1) . '.'; ?><br>
        </p></a>

        <a href="#"><i class="fa fa-circle text-success"></i>Posts: <?php echo $res_count_post?></a></a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <?php 
                                  if ($page == 'dashboard')
                                  {
                                    ?>
      <li class="active">
        <?php
                                  }
                                  else
                                  {
                                    ?>
      <li>
        <?php
                                  }
                                   ?>
        <a href="dashboard.php">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <?php 
                                  if ($page == 'My Batchmates')
                                  {
                                    ?>
      <li class="active">
        <?php
                                  }
                                  else
                                  {
                                    ?>
      <li>
        <?php
                                  }
                                   ?>
        <a href="batchmates.php">
          <i class="fa fa-book"></i> <span>My Batchmates</span>
        </a>
      </li>
      <?php 
                                  if ($page == 'General Forum' || $page == 'Your Posts')
                                  {
                                    ?>
      <li class="treeview active">
        <?php
                                  }
                                  else
                                  {
                                    ?>
      <li class="treeview">
        <?php
                                  }
                                   ?>
        <a href="#">
          <i class="fa fa-comments"></i> <span>Forum</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <?php 
    if($_SESSION['page'] == 'General Forum')
{
  echo '<li class="active">';
}
else
{
  echo '<li>';
}
?>
            <a href="forum.php"><i class="fa fa-circle-o"></i> General Forum</a>
          </li>
          <?php 
    if($_SESSION['page'] == 'Your Posts')
{
  echo '<li class="active">';
}
else
{
  echo '<li>';
}
?>
            <a href="profile_post.php"><i class="fa fa-circle-o"></i> Your Posts</a>
          </li>
        </ul>
      </li>
      <?php 
                                  if ($page == 'Suggested Job')
                                  {
                                    ?>
      <li class="active">
        <?php
                                  }
                                  else
                                  {
                                    ?>
      <li>
        <?php
                                  }
                                   ?>
        <a href="suggestedjob_available.php">
          <i class="fa fa-book"></i> <span>Available Jobs</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>