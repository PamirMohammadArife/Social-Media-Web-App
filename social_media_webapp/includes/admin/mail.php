<?php 
include_once("ad_header.php");
    $id = $_GET['id'];
      $sql = "select * from users where id='$id'";
    $result = $con->query($sql);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {   
?>
<div class="container">
<form action="#" method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" name="email" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $row['email']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">User Name</label>
    <input type="email" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $row['username']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Subject</label>
    <input type="email" readonly class="form-control-plaintext" id="staticEmail" name="subject" value="Enter Your Subject">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Text Message</label>
    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
<div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" name="update" class="btn btn-primary">Update Now</button>
  <?php 
  
  if(isset($_POST['update']))
  {
        $to = $_POST[$row['email']];
        $subject = $_POST['subject'];
        $txt = $_POST['message'];
        $headers = "From: webmaster@example.com" . "\r\n" .
        "CC: $to";
        @mail($to,$subject,$txt,$headers);
        
  }}}
 
  ?>
</form>
</div>  