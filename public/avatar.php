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
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">

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

                    <div class="col-lg-8 text-left profile-info">
                        <div id="music" class="track-box">
                            <h2 class="box-title">Change Your Avatar</h2>
                            <hr>
                            <form method="post" action="avatar_upload.php" enctype="multipart/form-data">
                                <input type="file" value="ava" name="ava" style="width: 300px; margin: 0 auto; margin-top: 3%;"><br>
                                <button class="btn btn-default" type="submit" value="Upload File">Upload</button>
                            </form>
                        </div><!--track-box-->
                    </div><!--profile-info-->
                </div> <!--end of cols-->
            </div><!--end row-->
        </div> <!--container-box-->
    </section>

<?php include("../includes/layouts/footer.php"); ?>