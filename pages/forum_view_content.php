<!-- Content Header (Page header) -->

<section class="content-header">
  <h1>
    Forum
    <?php 
    if($_SESSION['page'] == 'General Forum')
{
  echo '<small>General Forum</small>';
}
else if ($_SESSION['page'] == 'Your Posts')
{
  echo '<small>Profile Post</small>';
}
?>
    
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Forum</li>
    <li class="active"><?php echo $post_title; ?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $post_title ?></h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
              <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
            <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <h1><?php echo $post_title ?></h1>
          <!-- Author -->
          <p class="lead">
            by <a href="#"><?php  
                                  if($query_postowner = mysqli_query($con,"SELECT student_fName,student_mName,student_lName FROM `user_student_detail` WHERE `student_userID` = '$post_owner'")) {
                                    if(mysqli_num_rows($query_postowner) != 0)
                                    {
                                      $res_postowner = mysqli_fetch_assoc($query_postowner);
                                     echo $res_postowner['student_fName'].
                                     " ".$res_postowner['student_mName'].
                                     " ".$res_postowner['student_lName'];
                                    }
                                     
                                  }
                                  if($query_postowner = mysqli_query($con,"SELECT teacher_fName,teacher_mName,teacher_lName FROM `user_teacher_detail` WHERE `teacher_userID` = '$post_owner'")) {
                                    if(mysqli_num_rows($query_postowner) != 0)
                                    {
                                      $res_postowner = mysqli_fetch_assoc($query_postowner);
                                      echo $res_postowner['teacher_fName'].
                                      " ".$res_postowner['teacher_mName'].
                                      " ".$res_postowner['teacher_lName'];
                                    }
                                     
                                  }
                                  if($query_postowner = mysqli_query($con,"SELECT admin_fName,admin_mName,admin_lName FROM `user_admin_detail` WHERE `admin_userID` = '$post_owner'")) {
                                    if(mysqli_num_rows($query_postowner) != 0)
                                    {
                                      $res_postowner = mysqli_fetch_assoc($query_postowner);
                                     echo $res_postowner['admin_fName'].
                                     " ".$res_postowner['admin_mName'].
                                     " ".$res_postowner['admin_lName'];
                                    }
                                     
                                  }?></a></p>
          <hr>

          <!-- Date/Time -->
          <p><strong> Posted on</strong>
            <?php echo date( "M jS, Y", strtotime( "$post_date")). "<strong> at </strong>".date( 'h:i A', strtotime( "$post_date")); ?>
            <strong>View<?php if ($result_viewcount['view_count'] != 0 ){ echo "s";}else {}?>: </strong>
            <?php echo $result_viewcount[ 'view_count'] ?></p>
          <br>
          <?php 
if ($post_owner == $login_id ) {
  ?>
          <div class="btn-group pull-right" style="margin-top: -50px;">
            <?php 
    if ($login_level == "2" || $login_level == "3") {
     
      if ($post_status == "UNPIN") {
        $pin_stat = "PIN";
        ?>
            <a class="btn btn-info" data-toggle="modal" data-target="#<?php echo $pin_stat?>">PIN</a>
            <?php
      }
      else
      {
         $pin_stat = "UNPIN";
        ?>
            <a class="btn btn-info" data-toggle="modal" data-target="#<?php echo $pin_stat?>">UNPIN</a>
            <?php
      }
     
    }
    ?>
            <a class="btn btn-primary" data-toggle="modal" data-target="#Edit">EDIT</a>
            <a class="btn btn-metis-1" data-toggle="modal" data-target="#Delete">DELETE</a>
          </div>
          <!-- Modal for edit-->
          <div id="<?php echo $pin_stat?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><?php echo $pin_stat?> Post</h4>
                </div>
                <div class="modal-body">
                  <center>
                    <h1>Are you sure ?</h1>
                    <div class="btn-group">
                      <a class="btn btn-success"
                        href="../action/post_status.php?stat=<?php echo $pin_stat;?>&pID=<?php echo $verified_id; ?>"><?php echo $pin_stat?></a>
                      <a class="btn btn-danger" data-dismiss="modal">CANCEL</a>
                    </div>

                  </center>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
          <!-- Modal for edit-->
          <div id="Edit" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                  <center>

                    <h1>Are you sure ?</h1>
                    <div class="btn-group">
                      <a class="btn btn-success"
                        href="forum_topic_update.php?req_encypted_postID=<?php echo $req_encypted_postID ;?>">Edit</a>
                      <a class="btn btn-danger" data-dismiss="modal">CANCEL</a>
                    </div>
                  </center>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
          <!-- Modal for delete-->
          <div id="Delete" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Delete Post</h4>
                </div>
                <div class="modal-body">
                  <center>
                    <h1>Are you sure ?</h1>
                    <div class="btn-group">
                      <a class="btn btn-success"
                        href="../action/delete_post.php?req_encypted_postID=<?php echo $req_encypted_postID ?>">DELETE</a>
                      <a class="btn btn-danger" data-dismiss="modal">CANCEL</a>
                    </div>
                  </center>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>



          <?php
                              }
                              ?>


          <hr>
          <hr>

          <!-- Post Content -->
          <?php echo  $body = htmlspecialchars_decode($post_content)?>

          <hr>
          <!-- Comments Form -->
          <div class="panel panel-default">
            <div class="panel-heading">Write your comment</div>
            <div class="panel-body">
              <form
                action="../action/comment_add_action.php?userID_comment=<?php echo $login_id;?>&comment_topicID=<?php echo $req_encypted_postID;?>"
                method="POST">
                <textarea id="wysihtml5" class="form-control" rows="6" name="comment" autofocus required></textarea>
                <br>
                <input type="submit" name="submit-comment" value="Comment" class="btn btn-primary">
              </form>
            </div>
          </div>
          <hr>

          <div class="container" style="margin-right: 0px;padding-left: 0px;width: 995px;margin-left: 0px;">
            <div class="row">
              <!-- Comments list -->
              <div class="comments-container">
                <h1>Comment</h1>

                <ul id="comments-list" class="comments-list">
                  <li>
                    <?php 
                                      $req_encypted_postID;
                                      $query_verify_id = mysqli_query($con,"SELECT * FROM `forum_comment`");
                                        //while fetching all data
                                        while ($res_ver_id = mysqli_fetch_array($query_verify_id)) 
                                        {
                                          //each topic id mush be save in temp variable of check_id
                                          $check_id = $res_ver_id['comment_topicID'];
                                            //the requested hash checked original value if match then stored the verified value in verified_id
                                            if (password_verify($check_id, $req_encypted_postID)) 
                                              {
                                               $verified_id = $check_id;//temporary value save to verified_id
                                              }  
                                              
                                        }
                                        $comment_q = mysqli_query($con,"SELECT * FROM forum_comment WHERE comment_topicID = '$verified_id' ");
                                        while ($comment_data = mysqli_fetch_array($comment_q)) {
                                          
                                          ?>
                    <div class="comment-main-level">
                      <!-- Avatar -->
                      <?php 
                                        $cuID = $comment_data['comment_userID'];
                                                
                                                $q_udata = mysqli_query($con,"SELECT * FROM user_account WHERE user_ID = '$cuID'");
                                                $r_udata = mysqli_fetch_array($q_udata);
                                                if ($r_udata['user_level'] == '1') {
                                                  $u_type = "student";
                                                }
                                                if ($r_udata['user_level'] == '2') {
                                                  # code...teacher
                                                  $u_type = "teacher";
                                                }
                                                 if ($r_udata['user_level'] == '3') {
                                                  # code...admin
                                                  $u_type = "admin";
                                                }
                                                $uID = $r_udata['user_ID'];
                                                $q_data = mysqli_query($con,"SELECT * FROM user_".$u_type."_detail WHERE ".$u_type."_userID = '$uID'");
                                                $r_data = mysqli_fetch_array($q_data);
                                                
                                        ?>
                      <div class="comment-avatar"><img
                          src="../assets/img/profile_img/<?php echo $r_data[$u_type.'_img'];?>" alt=""
                          style="width: 64px; height: 64px;"></div>
                      <!-- Contenedor del Comentario -->
                      <div class="comment-box">
                        <div class="comment-head">
                          <h6 class="comment-name <?php if ($login_id == $comment_data['comment_userID']){
                                              echo "by-author";} ?>"><a href="">

                              <?php 

                                                echo $r_data[$u_type.'_fName']." ".$r_data[$u_type.'_mName']." ".$r_data[$u_type.'_lName'];
                                                ?></a></h6>
                          <span><?php echo date( "M jS, Y", strtotime( $comment_data['comment_date'])). "<strong> at </strong>".date( 'h:i A', strtotime($comment_data['comment_date'])); ?>

                          </span>
                          <?php 
                                            if ($login_id == $comment_data['comment_userID']){
                                              ?>
                          <i class="fa fa-bars" data-toggle="modal" data-target="#view-modal"
                            data-id="<?php echo $comment_data['comment_ID']; ?>" id="getUser"></i>
                          <?php
                                            }
                                            if ($login_id == $comment_data['comment_userID']){
                                              ?>
                          <!-- <i class="fa fa-reply"> Reply</i> -->
                          <?php
                                            }
                                            else
                                            {
                                              ?>
                          <!-- <i class="fa fa-reply"> Reply</i> -->
                          <!--  <i class="fa fa-heart"></i> -->
                          <?php
                                            }
                                            ?>




                        </div>
                        <div class="comment-content">
                          <?php echo $comment_data['comment_content']; 
                                            ?>
                        </div>
                      </div>
                    </div>
                    <br>
                    <?php
                                          }
                                      ?>
                  </li>

                  <li>

                  </li>
                </ul>
              </div>
            </div>
          </div>
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
<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
  style="display: none; color: black;">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">
          <i class="fa fa-info"></i> Action
        </h4>
      </div>
      <div class="modal-body">

        <div id="modal-loader" style="display: none; text-align: center;">
          <img src="../assets/img/ajax-loader.gif">
        </div>

        <!-- content will be load here -->
        <div id="dynamic-content"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div><!-- /.modal -->