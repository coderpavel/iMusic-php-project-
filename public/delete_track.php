<?php 
    require_once("../includes/database.php");

    if(!isset($_SESSION['username'])){
        header("Location: ../public/index.php");
    }
    else
    {
        $username = $_SESSION["username"];
        $trackQuery = "SELECT * FROM tracks WHERE username='{$username}'";
        $trackResult = mysqli_query($connection, $trackQuery);
    }

    $UserInfo = "SELECT * FROM users WHERE username = '{$username}'";
    $UserInfoResult = mysqli_query($connection, $UserInfo);
    $UserResultRow = mysqli_fetch_assoc($UserInfoResult);
?>

<?php 
    include("../includes/layouts/header.php");?>
    
    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="container">
            <audio controls autoplay id="aud">
                    <source src="" type="audio/mpeg">
            </audio>
        </div>
    </nav>

    <!-- Profile Section -->
    <section class="profile-section">
        <div class="container">
            <div class="row"><!-- begin row-->
                <div class="col-lg-2 profile-img text-center">
                    <img src="<? echo $UserResultRow['image']?>">
                    <ul class="text-center" style="width: 100%;">
                        <li>
                            <a href="avatar.php">Change avatar</a>
                        </li>

                        <li>
                            <a href="upload_track.php">Upload Track</a>
                        </li>

                        <li>
                            <a href="delete_track.php">Delete Track</a>
                        </li>

                        <li>
                            <a href="../includes/log_out.php">Log out</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-7 col-lg-offset-1 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                    <div id="music" class="track-box">
                        <h2 class="box-title">My Tracks</h2>
                        <hr>
                        <ol class="track-info">
                            <?php 
                                while($trackResultRow = mysqli_fetch_assoc($trackResult)){?>

                                    <li>
                                    <a onclick="window.location.href='delete_track_action.php?track=<?php echo $trackResultRow['track_name']?>'""><span class="glyphicon glyphicon-remove pull-right"></span></a>
                                        <a href="<?php echo $trackResultRow['track_path']?>"><?php echo $trackResultRow['username']?> - <?php echo $trackResultRow['track_name']?>
                                        <span class="glyphicon glyphicon-download pull-right" onclick="window.location.href='<?php echo $trackResultRow['track_path']?>'"></span>
                                        </a>
                                            <span class="glyphicon glyphicon-pause pull-right" onclick="document.getElementById('aud').pause()"></span>
                                            <span class="glyphicon glyphicon-play pull-right" onclick="document.getElementById('aud').play()"></span>
                                    </li>
                                    <hr>
                            <?php
                                }
                            ?>
                        </ol>
                    </div><!--track-box-->
                </div><!--end of cols-->
            </div><!--row-->
        </div> <!--container-->
    </section>

<?php include("../includes/layouts/footer.php"); ?>
