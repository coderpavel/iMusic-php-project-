<?php
 require_once("../includes/database.php");

if(isset($_POST['user_comm']) && isset($_POST['user_name']))
{
  $comment=$_POST['user_comm'];
  $name=$_SESSION['username'];
  $url_name=$_POST['url_name'];

  $insert=mysql_query("insert into comments values('','$name','$comment',CURRENT_TIMESTAMP,'$url_name')");
  $select=mysql_query("select name,comment,post_time from comments where page_flag = '$url_name' order by post_time desc");
        
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
      </div>

      <div class="comment-container">
        <p class="name" >By:<?php echo $name;?> </p>
        <p class="comment" style="float: left"><?php echo $comment;?></p><br> 
        <p class="time" style="float:right; margin-bottom: ">Date:<?php echo $time;?></p>
        <div style="clear: both;"></div>
      </div> <!--comment container-->
    </div>
  <?php
  }
exit;
}

?>