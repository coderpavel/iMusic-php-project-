<?php 
    require_once("../includes/database.php");
    require_once("../includes/user.php");
    require_once("../includes/select_classes.php");
    
$output = ' ';
if(isset($_POST['search'])){
    $searchq = $_POST['search'];
    $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
    if($searchq){
    $query = mysql_query("SELECT * FROM tracks WHERE track_name LIKE '%$searchq%'") or die("could not search");
    $count = mysql_num_rows($query);

    if($count == 0){
        $output = 'There was no search results!';
    }else{
        while($row = mysql_fetch_array($query)){
            $name = $row['track_name'];
            $username = $row['username'];
            $output .='<li><a href="user_profile.php?user='.$username.'">'.$username. ' - ' . basename($name,'.mp3').'</a></li><hr>';
        }
    }
    }else{
        die("nu tut kapets");
    }
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
                <div class="row"><!-- begin row-->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" ">

                        <div class="track-box">
                            <ul class="track-info">
                                <?php print("$output");?>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div> <!--container-->
    </section>
    
<?php include("../includes/layouts/footer.php"); ?>

