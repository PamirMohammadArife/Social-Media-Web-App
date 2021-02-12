<?php include_once("ad_header.php"); ?>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Number of Post</th>
      <th scope="col">Send Mail</th>
      <th scope="col">check Account</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $sql = "select * from users ORDER BY id DESC";
    $result = $con->query($sql);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {     
  ?>
    <tr>
      <td><a href="profile.php?profile_username=<?php echo $row['username']; ?>"><?php echo $row["username"]; ?></td>
      <td><?php echo $row["email"]; ?></td>
      <td><?php echo $row["num_posts"]; ?></td>
      <td><a href="mail.php?id=<?php echo $row['id']; ?>">Send Mail</a></td>
      <td><a href="edit.php?id=<?php echo $row['id']; ?>">edit</a></td>
    </tr>
    <?php }} ?>
  </tbody>
</table>
</div>
</body>