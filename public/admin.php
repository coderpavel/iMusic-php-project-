<?php 
    require_once("../includes/database.php");
    //postvit !isset na session
    if(!isset($_SESSION['username'])){
        header("Location: ../public/index.php");
    }
    else
    {
        $username = $_SESSION["username"];
        $trackQuerySelect = "SELECT * FROM tracks WHERE approved = 0";
        $trackResultSelect = mysqli_query($connection, $trackQuerySelect);
    }
?>

<?php include("../includes/layouts/header.php");?>

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
                    <img src="profile/admin/admin.jpg">
                    <ul class="text-center" style="width: 100%;">
                        <li>
                            <a href="#">Last uploads</a>
                        </li>

                        <li>
                            <a href="#">Log out</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-7 col-lg-offset-1 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                    <div id="music" class="track-box to-animate">
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
                    </div>
                </div>
            </div>
        </div> <!--container-->
    </section>


<?php include("../includes/layouts/footer.php"); ?>
