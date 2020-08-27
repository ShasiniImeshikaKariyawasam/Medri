<?php require_once('include/connection.php'); 
 require_once('include/session.php'); ?><!-- include Session file-->
<?php 

  if (isset($_POST['submit'])) {
    
    $name = $_POST['name'];
    $password = $_POST['password'];
    $passwordHash = md5($password);
    //Select user name and password 
    $sql = "SELECT * FROM employee WHERE user_name='$name' AND password='$passwordHash'";
    //Performs a query on database
    $res = mysqli_query($db, $sql);
    $check_user = mysqli_num_rows($res);
    //Return number of result row in result set
    if ($check_user == 1) 
    {
      //Fetch results row as an associative array
      $row = mysqli_fetch_array($res);

      //creating session
      checkSession();
      $_SESSION["user_name"] = $row['user_name'];
      $_SESSION["e_id"] = $row['e_id'];
      $_SESSION["type"] = $row['type'];

      $type = $row['type'];

      $update_msg = mysqli_query($db,"UPDATE employee SET log_in ='online' WHERE user_name ='$name'");
      
      if($type == '1'){
        header("Location: pharmacistDashboard.html");
      }
      elseif($type == '2'){
        header("Location: storekeeperDashboard.html");
      }
      
    }
    else{
      //Generate error msg
      $message = base64_encode(urlencode("Invalid User Name or Password"));
          header('Location:login.php?msg=' . $message);
          exit();
    }

  }
  mysqli_close($db);
?>