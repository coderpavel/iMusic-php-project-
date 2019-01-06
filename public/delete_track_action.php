<?php 
    require_once("../includes/database.php");

    if(!isset($_SESSION['username'])){
        header("Location: ../public/index.php");
    }
    if(empty($_GET)){
        header("Location: ../public/delete_track.php");
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
                </div><!--profile-img-->

                <div class="col-lg-7 col-lg-offset-1 col-md-8 col-md-offset-2 col-sm-12 col-xs-12" style="margin-top: 100px">
                    <?php echo 'Do you want to delete ' . $_GET['track'] . ' ?' ?>
                    <button class="btn btn-default" onclick="window.location.href='../public/delete_track_proc.php?track=<?php echo $_GET['track']?>'">YES</button>
                    <button class="btn btn-default" onclick="window.location.href='../public/delete_track.php'">NO</button>
                </div>
            </div>
        </div> <!--container-->
    </section>


    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
                        <br><p>Made with love by Pavel 2017. All Rights Reserved.</p>
                    </div>
                </div> <!-- col lg-12 ends -->
            </div><!-- row ends -->
        </div> <!-- container ends -->
    </section>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Custome JavaScript -->
    <script src="js/custom.js"></script>


    <script>
        aud.onloadedmetadata = function(){
         audioRange.max = aud.duration;
         console.log('Current audio duration: ',aud.duration);
        }
        aud.ontimeupdate = function(){
            audioRange.value = aud.currentTime
        }
        audioRange.onclick = function(e){
            aud.currentTime = audioRange.value
        }

        function deleteTrack(){
            var value = $(this).attr('href');

        }

        $(document).ready(function(){
            $('#music a').click(function(){
                event.preventDefault();
                var value = $(this).attr('href');
                $('source').attr("src", value);
                $("#aud").load(); 

            oAudio.addEventListener("timeupdate", progressBar, true);
            });
        });
    </script>



</body>

</html>
