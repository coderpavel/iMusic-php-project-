<?php
 require_once("../includes/database.php");

if(isset($_POST['user_comm']) && isset($_POST['user_name']))
{
  $comment=$_POST['user_comm'];
  $name=$_SESSION['username'];

  $insert=mysql_query("insert into comments values('','$name','$comment',CURRENT_TIMESTAMP,'$name')");
  $select=mysql_query("select name,comment,post_time from comments where page_flag = '$name' order by post_time desc");

  if($row=mysql_fetch_array($select))
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
        <div class="comment-info text-center"></div>
      </div>

      <div class="comment-container">
        <p class="name">Posted By:<?php echo $name;?></p>
        <p class="comment"><?php echo $comment;?></p> 
        <p class="time"><?php echo $time;?></p>
      </div> <!--comment container-->
      
    </div>
  <?php
  }
exit;
}

?>