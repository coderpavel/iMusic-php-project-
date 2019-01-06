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
                        <div id="music" class="track-box to-animate">
                            <h2 class="box-title">Upload New Track</h2>
                            <hr>
                            <form id="upload_form" enctype="multipart/form-data" method="post" class="text-center">
                                <input type="file" name="file1" id="file1" style="width: 300px; margin: 0 auto; margin-top: 3%;"><br>
                                <button class="btn btn-default" type="button" value="Upload File" onclick="uploadFile()">Upload</button>
                                <progress id="progressBar" value="0" max="100" style=" width: 300px;"></progress>
                                <p id="status"></p>
                                <p id="loaded_and_total"></p>
                           </form>
                        </div>
                    </div> <!--cols-->
                </div><!--main cols-->
            </div> <!--row-->
        </div><!--container-->
    </section>


<!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="theme-section-heading">
                        <h1>Get <span>in touch</span></h1>
                        <h4>If you have any question, contact us any time.</h4>
                    </div>


                    <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1  col-xs-12">
                        <form name="contactForm" data-toggle="validator" onsubmit="return email();" action="">  
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="fname" name="fname" placeholder="First Name" class="form-control"  type="text" required>
                            </div>  

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
                                <input type='email' id="mail" class='form-control' name='mail' placeholder='Email Here' required>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <textarea id="comment" class="form-control" name="comment" placeholder="Your Comments" rows="3" cols="30" required></textarea>
                            </div>

                            <div class="input-group">
                                <button type='submit' class='btn btn-default header-button'>Send Message</button>
                            </div>
                        </form>
                    </div>


                    <div class="col-lg-5 col-lg-offset-1 col-md-6 col-sm-6 col-xs-12">
                        
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 icons"> <!--bebin first col contact section-->
                            <ul>
                                <li><i class="fa fa-map-marker"></i> Inha</li>
                                <li><i class="fa fa-phone"></i> (90) 924-30-31 </li>
                                <li><i class="fa fa-envelope"></i> 9243031@gmail.com</li>
                            </ul>
                        </div><!--end first col contact section-->

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 icons"> <!--bebin second col contact section-->
                            <ul>
                                <li><a href="#"><i class="fa fa-instagram"></i>Instagram </a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i>Facebook </a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i>Twetter </a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i> On Google+ </a></li>
                            </ul>
                        </div><!--end second col contact section-->

                    </div>

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
    <script src="js/jquery-upload.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
