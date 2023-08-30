<?php
session_start();
include('config.php');

if(isset($_POST['login'])){
  $email=$_POST['email'];
  $password=$_POST['password'];

  $sql = "SELECT * FROM user WHERE Email = '$email'";
  $result = mysqli_query($connection, $sql);

  if($result){
      $sql = "SELECT * FROM user WHERE Email = '$email'";
      $results = mysqli_query($connection, $sql);

      $dbpassword = '';
      foreach($results as $result){
          $dbpassword = $result['Password'];
      }

      $dehashed = password_verify($password, $dbpassword);

      if($dehashed){
          $_SESSION['email'] = $email;
          header('Location: dashboard.php');
      }else{
          $errormsg = '<p style="color: red;">Invalid Email or Password</p>';
      }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style type="text/css">
    body {
  font-family: Arial, sans-serif;
  background-color: #0056b3;
  background-size: cover;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-image: linear-gradient(rgba(0,0,10,0.8), rgba(0,0,50,0.8)),url(images/2.png);
}

.login-container {
  background-color:olive;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  width: 320px;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 10px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  width: 94%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 20px;
}

input[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;

}
#login-container{
  background-image: linear-gradient(rgba(0,0,10,0.8),rgba(0,0,50,0.8)),url(images/2.png); 
  padding: 40px; 
  color: white;
  }

input[type="submit"]:hover {
  background-color: #0056b3;
}
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div id="login-container" style="">
    <h2>Login</h2>
    <?php echo $errormsg ?? null ?>
    <form action="" method="POST">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <input type="submit" value="Submit" name="login">

      <p>Don't have account?. <a href="sign-up.php">Sign up</a></p>
    </form>
  </div>
</body>
</html>








