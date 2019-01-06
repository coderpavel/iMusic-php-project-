<?php 
    require_once("../includes/database.php");
    require_once("../includes/select_classes.php");
    
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    $per_page = 10;
    $total_count = SelectClasses::count_all();

    $UserName = $_SESSION["username"];
    $UserNameQuery = "SELECT * FROM users";

    $pagination = new Pagination($page, $per_page, $total_count);
    $sql = "SELECT * FROM users LIMIT {$per_page} OFFSET {$pagination->offset()}"; 
    $photos = SelectClasses::find_by_sql($sql);

    $UserNameResult = mysqli_query($connection, $sql);
    $UserNameRow = mysqli_fetch_array($UserNameResult);

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
            <div class="row"><!-- begin row-->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" ">
                    <div class="track-box">
                        <ul class="track-info">
                            <?php 

                            while ($UserNameRow = mysqli_fetch_assoc($UserNameResult)) {?>
                                    <li><a href="user_profile.php?user=<?php echo $UserNameRow['username']?>"><?php echo $UserNameRow['username'] ?></a></li><hr>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>

                    <div id="pagination" style="clear: both;">
                        <?php
                            if($pagination->total_pages() > 1) {
                                
                                if($pagination->has_previous_page()) { 
                                echo "<a href=\"user_list.php?page=";
                                echo $pagination->previous_page();
                                echo "\">&laquo; Previous</a> "; 
                            }

                                for($i=1; $i <= $pagination->total_pages(); $i++) {
                                    if($i == $page) {
                                        echo " <span class=\"selected\">{$i}</span> ";
                                    } else {
                                        echo " <a href=\"user_list.php?page={$i}\">{$i}</a> "; 
                                    }
                                }

                                if($pagination->has_next_page()) { 
                                    echo " <a href=\"user_list.php?page=";
                                    echo $pagination->next_page();
                                    echo "\">Next &raquo;</a> "; 
                                }
                            }
                        ?>
                    </div>

                </div> <!--end col-->
            </div> <!--end row-->
        </div> <!--container-->
    </section>

   

<?php include("../includes/layouts/footer.php"); ?>
