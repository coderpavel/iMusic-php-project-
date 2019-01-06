<?php
session_start();
require_once("../includes/database.php");

?>
<?php include("../includes/layouts/header.php");?>

    <!-- BEGIN REGISTRATION SECTION -->
   <section class="registration">
        <div class="container">
            <div class="row"><!-- begin row-->
                <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 row text-center">
                        <?php
                            if(isset($_GET['emailcode'])){
                                $Activate = "UPDATE users SET active = 1 WHERE email_activator = '{$_GET['emailcode']}'";
                                $ActivateResult = mysqli_query($connection, $Activate);
                                $message = "Your account successfully activated";
                                ?><h1><?php echo $message ?></h1><?php
                            }
                            else if(isset($_GET['active'])){
                                $message = "We sent you email, please activate link";
                                ?><h1><?php echo $message ?></h1>
                                <p><a href="get_code_again.php?email=<?php echo $_GET['email']?>">Click here</a> to get link one more time</p>
                                <?php
                            }else{
                                $message = "We sent you email, please activate link";
                                ?><h1><?php echo $message ?></h1><?php
                            }
                        ?>             
                </div>
            </div>
        </div> <!--container-->
    </section>

<?php include("../includes/layouts/footer.php");?>
