<?php
session_start();
//require_once("../includes/functions.php");
require_once("../includes/database.php");
//require_once("../includes/user.php");

if(!empty($_POST)){

    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $repeatPass = $_POST['repeat-password'];
    $email      = $_POST['email'];
    $email_code = md5($_POST['username'] + microtime());

    $emailIsPresent = "SELECT * FROM users WHERE email='".$_POST["email"]."'";
    $emailIsPresentResult = mysql_query($emailIsPresent);
    $countEmail = mysql_num_rows($emailIsPresentResult);
    if($countEmail>0){
        $emailIsPresentMessage = "This email is registered alredy ";
    }


    $userIsPresent = "SELECT * FROM users WHERE username='".$_POST['username']."'";
    $userIsPresentResult = mysql_query($userIsPresent);
    $countUser = mysql_num_rows($userIsPresentResult);
    if($countUser>0){
        $userIsPresentMessage = "This name is registered alredy ";
    }

    if ($repeatPass != $password) {
        $passwordMessage = "Password and Control-password should be the same";
    }

    if($countEmail==0 & $countUser==0 & $repeatPass==$password){
    $registration = "INSERT INTO users (username,password,email,email_activator,active,image) VALUES('{$_POST['username']}','{$_POST['password']}', '{$_POST['email']}','{$email_code}',0,'../public/profile/default.jpg')";
    $registrationResult = mysqli_query($connection, $registration);

    mail($email, "Activate an account","Hello ".$username.", activate your account using following link:\n\n http://theme.uz/public/activation_page.php?email=".$email."&emailcode=".$email_code."");

    $structure = '../public/profile/'.$username.'/';
  if (!mkdir($structure, 0777, true)) {
    die('Failed to create folders...');
}

    header("Location: ../public/activation_page.php");
    }

}
?>
<?php include("../includes/layouts/header-index.php");?>



    <!-- BEGIN REGISTRATION SECTION -->
   <section class="registration">
        <div class="container">
            <div class="row"><!-- begin row-->
                <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 registration-form row">
                            <h3 class="text-center">Registration</h3>
                            <form name="contactForm" class="reg-form" method="post" action="registration.php">  
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input  name="username" placeholder="User Name" class="form-control"  type="text" required>
                                    <?php echo $userIsPresentMessage ?>
                                </div>  

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
                                    <input type='email' class='form-control' name='email' placeholder='Email Here' required>
                                    <?php echo $emailIsPresentMessage ?>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input  type="password" name="password" placeholder="Password" class="form-control" required>
                                </div>  

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type='password' name='repeat-password' placeholder='Repeat Password' class='form-control' required>
                                    <?php echo $passwordMessage ?>
                                </div>

                                
                                <div class="input-group">
                                    <button type='submit' class='btn btn-default header-button'>Registration</button>
                                </div>
                            </form>
                        </div>

            </div>
        </div> <!--container-->
    </section>

            
<?php include("../includes/layouts/footer.php");?>
