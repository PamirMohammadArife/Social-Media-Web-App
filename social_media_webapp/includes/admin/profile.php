<?php 
 include("ad_header.php");
?>

<?php 
if(isset($_GET['profile_username'])) {
	$username = $_GET['profile_username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
	$user_array = mysqli_fetch_array($user_details_query);

	$num_friends = (substr_count($user_array['friend_array'], ",")) - 1;
}
 ?>
 	<style type="text/css">
	 	.wrapper {
	 		margin-left: 0px;
			padding-left: 0px;
	 	}
 	</style>
 	<div class="profile_left">
 		<img src="../../<?php echo $user_array['profile_pic']; ?>">
 		<div class="profile_info">
 			<p><?php echo "Posts: " . $user_array['num_posts']; ?></p>
 			<p><?php echo "Likes: " . $user_array['num_likes']; ?></p>
 			<p><?php echo "Friends: " . $num_friends ?></p>
 		</div>
  </div>
	<div class="profile_main_column column">

    <ul class="nav nav-tabs" role="tablist" id="profileTabs">
      <li role="presentation" class="active"><a href="#newsfeed_div" aria-controls="newsfeed_div" role="tab" data-toggle="tab">Newsfeed</a></li>
    </ul>
    <?php
         $sql = "SELECT * from posts where added_by='$username'";
         $result = $con->query($sql);
             if($result->num_rows > 0)
             {
                 while($profile_row = $result->fetch_assoc())
                 {
                 
    ?>
    <div class="status_post" onclick="javascript:toggle37()">
								<div class="post_profile_pic">
									<img src="../../<?php echo $user_array['profile_pic']; ?>" width="50">
								</div>

								<div class="posted_by" style="color:#ACACAC;">
									<a href="#"><?php echo $profile_row["added_by"]; ?> </a>
									
								</div>
								<div id="post_body">
                <?php echo $profile_row["body"]; ?>
									<br>
									<br>
									<br>
                </div>
                <div class="postedImage">
                  <?php
                  $image = $profile_row['image'];
                  if($image < 1) 
                  {
                    echo "";
                  }
                  else{echo "<img src='../../$profile_row[image]'>";}
                  ?>
									
                  </div>
                  <hr>
              </div>
              <?php }} ?>
     <!--End pofile-main-columm-->         
  </div>
  
  
<script>
    $(window).scroll(function() {
      var height = $('.posts_area').height();
      var scroll_top = $(this).scrollTop();
      var page = $('.posts_area').find('.nextPage').val();
      var noMorePosts = $('.posts_area').find('.noMorePosts').val();

      if ((document.body.scrollHeight == document.body.scrollTop + window.innerHeight) && noMorePosts == 'false') {
        $('#loading').show();

        var ajaxReq = $.ajax({
          url: "includes/handlers/ajax_load_profile_posts.php",
          type: "POST",
          data: "page=" + page + "&userLoggedIn=" + userLoggedIn + "&profileUsername=" + profileUsername,
          cache:false,
          success: function(response) {
            $('.posts_area').find('.nextPage').remove();
            $('.posts_area').find('.noMorePosts').remove();
            $('.posts_area').find('.noMorePostsText').remove();

            $('#loading').hide();
            $('.posts_area').append(response);
              
          }
        });

      } //End if 

      return false;

    }); //End (window).scroll(function())
  </script>
	</div>
</body>
</html>