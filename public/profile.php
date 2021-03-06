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
    
    include("../includes/layouts/header.php");
?>
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
                    </div><!--profile-img-->

                <div class="col-lg-8 text-left profile-info">
                    <div id="music" class="track-box to-animate">
                        <h2 class="box-title">My Tracks</h2>
                        <hr>
                        <ol class="track-info">
                            <?php 
    
                                while($trackResultRow = mysqli_fetch_assoc($trackResult)){?>

                                    <li>
                                        <a href="<?php echo $trackResultRow['track_path']?>"><?php echo $trackResultRow['username']?> - <?php echo basename($trackResultRow['track_name'],'.mp3')?>
                                        <span class="glyphicon glyphicon-download pull-right" onclick="window.location.href='<?php echo $trackResultRow['track_path']?>'"></span>
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

                <!--Comment box starts-->
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1 comment-box">
                        <form class="panel-body" method='post' action="" onsubmit="return post();">
                            <textarea id="comment" class="form-control comment-color" rows="2" placeholder="Write your comment"></textarea><br>
                            <input type="hidden" id="username" placeholder="Your Name" value="<?php echo $_SESSION["username"]?>"><br>
                                <button class="btn btn-info pull-right" type="submit"><i class="fa fa-pencil"></i> Comment</button>
                        </form>

                    <div class="comment-text" id="all_comments">
                    <?php
                        $comm = mysql_query("select name,comment,post_time from comments where page_flag = '$username' order by post_time desc");
                        while($row=mysql_fetch_array($comm))
                        {
                            $CommentAvatar = mysql_query("SELECT image FROM users WHERE username = '{$row['name']}' ");
                            $avatar=mysql_fetch_array($CommentAvatar);
                            $name=$row['name'];
                            $comment=$row['comment'];
                            $time=$row['post_time'];
                        ?>
                        <div class="comment_div"> 
                            <div class="comment-author-box">
                                <div class="comment-icon"><img src="<?php echo $avatar['image']?>"></div>
                                <div class="comment-info text-center">
                                    
                                </div>
                            </div>

                            <div class="comment-container">
                                <p class="name">Posted By:<?php echo $name;?></p>
                                <p class="comment"><?php echo $comment;?></p> 
                                <p class="time"><?php echo $time;?></p>
                            </div> <!--comment container-->
                        </div>
                        <?php
                        }
                        ?>
                        </div><!--comment-text-->
                    </div> <!--comment-box-->
                </div><!--row-->
            <!--Comment box ends-->

            </div><!--col ends-->
        </div><!--row ends-->
    </div><!--container ends-->
</section>

<?php include("../includes/layouts/footer.php"); ?>