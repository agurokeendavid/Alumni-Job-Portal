            <div class="form-group">
              <label class="control-label col-sm-2" for="course">Course:</label>
              <div class="col-sm-10">

                <?php 
  $sql = mysqli_query($con,"SELECT * FROM `capsu_course`");
        
        ?>
                <select class="form-control" name="course">
                  <?php 
            while ($o = mysqli_fetch_array($sql)){
              ?>

                  <option value="<?php echo $o[0]?>"><?php echo $o[2] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>


            <!-- EDIT COMBO BOX -->
            <div class="form-group">
    <label class="control-label col-sm-2" for="course">Course:</label>
    <div class="col-sm-10">

      <?php 
 $sql = mysqli_query($con,"SELECT * FROM `capsu_course`");
      
      ?>
      <select class="form-control" name="course">
        <?php 
          while ($o = mysqli_fetch_array($sql)){
            $selected = "";
            if($o[0] == $d[9]) {
              $selected = "selected";
            }
            ?>
            
        <option value="<?php echo $o[0];?>" <?php echo $selected; ?>><?php echo $o[2] ?></option>
        <?php
          }
          ?>
      </select>
    </div>
  </div>