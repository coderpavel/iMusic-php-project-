<?php
require_once("../includes/database.php");

if(!empty($_POST)){
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $findUser = mysql_query("SELECT * FROM users WHERE email='".$email."' AND password = '".$password."'");
    $findUserRow = mysql_fetch_assoc($findUser);
    $username = $findUserRow['username'];
    $count  = mysql_num_rows($findUser);

    if($count==0) {
        ?>
            <script>
                var message = "Incorrect Username or Password!";
                alert(message);
            </script>
        <?php
    }
    else {

        if($findUserRow['active'] == 0){
            $message = "You should activate your account!";
            header("Location: ../public/activation_page.php?active=0&email=".$findUserRow['email']."");
        } else{

	        if($findUserRow['username'] == "admin"){
	            $_SESSION['username'] = $username;
	            $message = "You are successfully logged in! ".$_SESSION["username"]."";
	            header("Location: ../public/admin.php");
	        }else{
	                    $_SESSION['username'] = $username;
	                    header("Location: ../public/profile.php");}
        }
    }
    $_POST = array();
}
    $NewUserQuery = "SELECT * FROM users WHERE active = 1 ORDER BY date_reg DESC LIMIT 10";
    $NewUserResult = mysqli_query($connection, $NewUserQuery);

    $NewTrackQuery = "SELECT * FROM tracks WHERE approved = 1 ORDER BY date_upload DESC LIMIT 10";
    $NewTrackResult = mysqli_query($connection, $NewTrackQuery);

    $TopTrackQuery = "SELECT * FROM  tracks WHERE approved = 1 ORDER BY view DESC LIMIT 10";
    $TopTrackResult = mysqli_query($connection, $TopTrackQuery);

    include("../includes/layouts/header-index.php");
?>

    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="container">
            <audio controls autoplay id="aud">
                    <source src="" type="audio/mpeg">
            </audio>
        </div>
    </nav>

<!-- BEGIN INTRO SECTION -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                    <div class="head-title-block">
                        <h1>Connect with fans and share your sound!</h1>
                        <i>What are you waiting for?</i><br>
                        <a class="btn btn-primary header-button page-scroll" href="#contact">iMusic</a>
                    </div> <!--head-title-block ends-->
                </div><!--col ends-->
            </div><!--row ends-->
        </div><!--container ends-->
    </header>

    <!-- BEGIN ABOUT SECTION -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 about-content">
                    <div class="theme-section-heading">
                        <h1>Top <span>and New</span></h1>
                        <h4>Last and top tracks of the website. Find any music according to your preferences.</h4>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="track-box to-animate">
                                    <h2 class="box-title">New Users</h2>
                                    <hr>
                                    <ol class="track-info-names text-center">
                                        <?php 
                                        while($NewUserRow = mysqli_fetch_assoc($NewUserResult)){?>
                                            <li>
                                                <a href="#">
                                                    <?php echo $NewUserRow['username']?> 
                                                </a>
                                            </li>
                                        <hr>
                                        <?php
                                        }
                                        ?>
                                    </ol>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div  id="music" class="track-box to-animate">
                                    <h2 class="box-title">New Tracks</h2>
                                    <hr>
                                    <ol class="track-info">
                                         <?php 
    
                                            while($NewTrackRow = mysqli_fetch_assoc($NewTrackResult)){?>
                                                <li>
                                                    <a href="<?php echo $NewTrackRow['track_path']?>"><?php echo $NewTrackRow['username']?> - <?php echo basename($NewTrackRow['track_name'],'.mp3')?>

                                                    <span class="glyphicon glyphicon-download pull-right" onclick="window.location.href='<?php echo $NewTrackRow['track_path']?>'"></span>
                                                    </a>
                                                    <span class="glyphicon glyphicon-play pull-right" onclick="document.getElementById('aud').play()"></span>
                                                    <span class="glyphicon glyphicon-pause pull-right" onclick="document.getElementById('aud').pause()"></span>
                                                </li>
                                            <hr>
                                            <?php
                                            }
                                            ?>
                                    </ol>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div  id="music" class="track-box to-animate">
                                    <h2 class="box-title">Top Tracks</h2>
                                    <hr>
                                    <ol class="track-info">
                                           <?php 
                                            while($TopTrackRow = mysqli_fetch_assoc($TopTrackResult)){?>
                             

                                             <li>
                                                    <a href="<?php echo $TopTrackRow['track_path']?>"><?php echo $TopTrackRow['username']?> - <?php echo basename($TopTrackRow['track_name'],'.mp3')?>

                                                    <span class="glyphicon glyphicon-download pull-right" onclick="window.location.href='<?php echo $TopTrackRow['track_path']?>'"></span>
                                                    </a>
                                                    <span class="glyphicon glyphicon-play pull-right" onclick="document.getElementById('aud').play()"></span>
                                                    <span class="glyphicon glyphicon-pause pull-right" onclick="document.getElementById('aud').pause()"></span>
                                                </li>
                                            <hr>
                                            <?php
                                            }
                                            ?>
                                    </ol>
                                </div> <!--track-box-->
                            </div> <!-- col-lg-12 -->
                    </div> <!--end row-->
                    </div><!-- first right col about us description ends -->

                   
                </div> <!--about-content ends -->
            </div><!-- row ends -->
        </div><!-- container ends -->
    </section>

    <!-- BEGIN SERVICE SECTION -->
    <section id="services" class="services-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 transparent-bg"></div>
                <div class="col-lg-6 col-md-6 col-sm-6 pull-right design">
                    <h1>For <span>compositors</span></h1>
                    <p>
                    A composer is a person who creates or writes music, which can be vocal music (for a singer or choir), instrumental music (e.g., for solo piano, string quartet, wind quintet or orchestra) or music which combines both instruments and voices (e.g., opera or art song, which is a singer accompanied by a pianist). The core meaning of the term refers to individuals who have contributed to the tradition of Western classical music through creation of works expressed in written musical notation (e.g., sheet music scores).
                    </p>
                </div>
            </div><!-- row ends -->
        </div><!-- container-fluid ends -->
    </section>
    <section class="services-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 pull-left developer">
                    <h1>For <span>Singers</span></h1>
                    <p>
                    Singing is the act of producing musical sounds with the voice, and augments regular speech by the use of sustained tonality, rhythm, and a variety of vocal techniques. A person who sings is called a singer or vocalist. Singers perform music (arias, recitatives, songs, etc.) that can be sung with or without accompaniment by musical instruments. Singing is often done in an ensemble of musicians, such as a choir of singers or a band of instrumentalists.

                    </p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 transparent-bg"></div>
            </div><!-- row ends -->
        </div><!-- container-fluid ends -->
    </section>
    <!-- END SERVICE SECTION -->

    <!-- BEGIN CLIENTS SECTION -->
    <section id="clients" class="clients-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="theme-section-heading">
                        <h1>Our <span>Users</span></h1>
                        <h4>What our clients are saying about the product</h4>
                    </div>

                    <div class="carousel slide quote-carousel" data-ride="carousel" id="quote-carousel">
                     <!-- Bottom Carousel Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#quote-carousel" data-slide-to="0"><img class="img-responsive " src="img/clients-section/client-3.jpg" alt="">
                            </li>
                            <li data-target="#quote-carousel" data-slide-to="1" class="active"><img class="img-responsive" src="img/clients-section/client-1.jpg" alt="">
                            </li>
                            <li data-target="#quote-carousel" data-slide-to="2"><img class="img-responsive" src="img/clients-section/client-2.jpg" alt="">
                            </li>
                        </ol>

                        <!--  Quotes -->
                        <div class="carousel-inner text-center">
                            <!-- Quote 1 -->
                            <div class="item active">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. !</p>
                                            <small>Someone famous</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 2 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                            <small>Someone famous</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 3 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. .</p>
                                            <small>Someone famous</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div><!-- carousel-inner ends -->

                        <!-- Carousel Buttons Next/Prev -->
                        <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                        <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                    </div>
                </div><!-- col(main) ends -->
            </div><!-- row ends -->
        </div><!-- container ends -->
    </section>

<?php include("../includes/layouts/footer.php"); ?>
