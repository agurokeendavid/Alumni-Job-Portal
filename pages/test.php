<?php 
include('../session.php');
include('../db.php');


include('inc/header.php');
include('inc/sidebar-admin.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Forum
      <small>General Forum</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Forum</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">Pinned Topics</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include('inc/footer.php'); ?>


<!-- Modal -->
<div id="view" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Job Description</h4>
      </div>
      <div class="modal-body">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            AdminLTE, Inc.
            <small class="pull-right">Date Posted: 2/10/2014</small>
            <br>
            <small>Location</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-12">
        Description
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!-- Left col -->
<div class="col-lg-6">
          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Quick Feedback</h3>
              <!-- tools box -->
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <form action="../action/submitfeedback.php" method="post">
            <div class="box-body">
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" placeholder="Subject">
                </div>
                <div>
                  <textarea name="message" class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
            </div>
            <div class="box-footer clearfix">
              <button type="submit" name="submitfeedback" class="pull-right btn btn-default" id="sendEmail">Send
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
              </form>
          </div>

        </div>
        <!-- /.Left col -->






                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <?php if ($login_level == 3) { ?>
        <div class="col-lg-6">

        <!-- JOBS LIST -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Jobs</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
              <?php 
                $jobs = mysqli_query($con,"SELECT sj.job_ID, sj.job_Title, sj.job_company, sj.job_description, sj.job_location, sj.job_posted_date FROM `suggested_job` sj WHERE sj.job_status = 'Active' ORDER by sj.job_posted_date DESC LIMIT 4"); 
 while ($job = mysqli_fetch_array($jobs)) {
?>
                <li class="item">
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title" data-toggle="modal" data-target="#view" data-id="<?php echo $job['job_ID'];?>" id="viewjob"><?php echo $job['job_Title']; ?>
                        <span class="product-description">
                        <?php echo $job['job_company']; ?>
                        </span>
                  </div>
                </li>
 <?php } ?>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="suggestedjob.php" class="uppercase">View All Jobs</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
          </div>
          <!-- right col -->
 <?php  } ?>