<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iMusic</title>

    <!-- bootstrap core css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- font-awesome css -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato|Roboto" rel="stylesheet">

    <!-- custom css -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">

    function post()
    {
      var comment = document.getElementById("comment").value;
      var name = document.getElementById("username").value;

      if(comment)
      {
        $.ajax
        ({
          type: 'post',
          url: 'post_comment.php',
          data: 
          {
             user_comm:comment,
             user_name:name
          },
          success: function (response) 
          {
            document.getElementById("all_comments").innerHTML=response+document.getElementById("all_comments").innerHTML;
            document.getElementById("comment").value="";
            document.getElementById("username").value="";
      
          }
        });
      }
      
      return false;
    }

  function post_user()
    {
      var comment = document.getElementById("comment").value;
      var name = document.getElementById("username").value;
      var url_name = document.getElementById("url_name").value;

      if(comment)
      {
        $.ajax
        ({
          type: 'post',
          url: 'post_user_comment.php',
          data: 
          {
             user_comm:comment,
             user_name:name,
             url_name:url_name
          },
          success: function (response) 
          {
            document.getElementById("all_comments").innerHTML=response+document.getElementById("all_comments").innerHTML;
            document.getElementById("comment").value="";
            document.getElementById("username").value="";
      
          }
        });
      }
      
      return false;
    }


    </script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="../../public/index.php">iMusic</a>
            </div>

            <!-- begin navigation links -->
            <div class="collapse navbar-collapse navbar-responsive-collapse right">
                <ul class="nav navbar-nav">
                    <li>
                      <form class="navbar-form" action="search.php" method="post">
                        <input type="text" class="form-control form-parameters" name="search" placeholder="Search this site..." id="searchInput">
                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search btn-danger-span"></span></button>
                      </form><!-- end navbar-form --></li>

                      <li class="hidden">
                          <a class="page-scroll" href="#page-top"></a>
                      </li>
                      
                      <li>
                          <a class="page-scroll" href="/public/user_list.php">Users</a>
                      </li>
                  
                </ul>
                <?php
                    if(isset($_SESSION['username'])){
                    ?>
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> My <strong class="caret"></strong></a>
                                
                                <ul class="dropdown-menu">
                                   <?php if($_SESSION['username'] != "admin"){
                                    ?>
                                    <li>
                                        <a href="../../public/profile.php" class="text-center"><span class="text-center"></span><?php echo  $_SESSION['username']?></a>
                                    <li class="divider"></li>
                                    </li>
                                    
                                    <li>
                                        <a href="../../public/upload_track.php"><span class="glyphicon glyphicon-cloud-upload"></span> Upload Track</a>
                                    </li>
                                    
                                    <li>
                                        <a href="../../public/delete_track.php"><span class="glyphicon glyphicon-remove"></span>Delete Track</a>
                                    </li>
                                    
                                    <li class="divider"></li>
                                      <?php  
                                    }?>
                                    
                                    <li>
                                        <a href="../includes/log_out.php"><span class="glyphicon glyphicon-off"></span> Sign out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul><!-- end nav pull-right -->

                    <?php 
                    }else{?>
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Log In <strong class="caret"></strong></a>
                                
                                <ul class="dropdown-menu">
                                    <form method="post" action="index.php" style="min-width: 205px; padding: 15px;">
                                        <legend class="text-center" style="color: red;">LogIn</legend>
                                        <label for="email">Email
                                            <input type="email" class="form-control" name="email" required/>
                                        </label>

                                        <label for="email">Password
                                            <input type="password" class="form-control" name="password" required/>
                                        </label>
                                            <div style="clear: both;"></div>
                                        
                                        <input type="submit" class="btn btn-default" value="Login">
                                        <div style="clear: both;"></div>
                                        
                                          <a style="color: red;" href="../../public/registration.php">registration</a>
                                        
                                    </form>
                                </ul>
                            </li>
                        </ul><!-- end nav pull-right -->
                     <?php }?>
            </div><!-- navbar-collapse ends -->
        </div><!-- container ends -->
    </nav>
