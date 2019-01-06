<?php 
require_once("../includes/database.php");

if(isset($_POST['user_track']) && isset($_POST['user_name']))
{
    $track = $_POST['user_track'];
    $usernametrack = $_POST['user_name'];
    $trackQuery = "DELETE FROM tracks WHERE username = '{$usernametrack}' AND track_name='{$track}'";
    $trackResult = mysqli_query($connection, $trackQuery);

    $trackQuerySelect = "SELECT * FROM tracks WHERE approved = 0";
    $trackResultSelect = mysqli_query($connection, $trackQuerySelect);       

  ?>
    <h2 class="box-title">All last tracks</h2>
    <hr>
    <ol class="track-info">
      <?php 
          while($trackResultRow = mysqli_fetch_assoc($trackResultSelect)){?>
            <li>
              <a href="" class="remove" 
                data-userid="<?php echo $trackResultRow['username']?>" 
                data-track="<?php echo $trackResultRow['track_name']?>">
                <span class="glyphicon glyphicon-thumbs-down pull-right"></span>
              </a>

              <a href="" class="approve" 
                data-userid="<?php echo $trackResultRow['username']?>" 
                data-track="<?php echo $trackResultRow['track_name']?>">
                <span class="glyphicon glyphicon-thumbs-up pull-right"></span>
              </a>

              <a href="<?php echo $trackResultRow['track_path']?>">
                <span><?php echo $trackResultRow['username']?></span> -
                <span><?php echo basename ("{$trackResultRow['track_name']}" , ".mp3")?></span>
                <span class="glyphicon glyphicon-download pull-right" onclick="window.location.href='<?php echo $trackResultRow['track_path']?>'"></span>
              </a>

              <div class="pull-right">
                  <span class="glyphicon glyphicon-pause pull-right" onclick="document.getElementById('aud').pause()"></span>
              </div>
            </li>
         
          <hr>
          <?php
          }
          ?>
    </ol>
  <?php

  exit;
  }
     
  ?>
