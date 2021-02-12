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
    <input type="email" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $row['email']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">User Name</label>
    <input type="email" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $row['username']; ?>">
  </div>
  <select name="account_detail" class="form-control form-control-lg">
      <?php 
        $account_details = $row['activate'];
      if($account_details == 'activate')
      {
          echo "<option value='activate'>activate</option>
                <option value='deactivate'>deactivate</option>
          ";
      }
      else{
        echo "<option value='deactivate'>deactivate</option>
              <option value='activate'>activate</option>
  ";
      }
      ?>
</select>
<?php }}?>
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
        $account_detail = $_POST['account_detail'];
      $update = "UPDATE users set activate='$account_detail' where id='$id'";
      $check_update = $con->query($update);
      if($result->num_rows > 0)
      {
        header("Location: index.php");
      }
      else{
        echo "<script>Alert('failed edit');</script>";
      }
  }
  ?>
</form>
</div>  