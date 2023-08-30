<?php
session_start();
include('config.php');

if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $confirm_password=$_POST['confirm_password'];
  $email=$_POST['email'];

  
  if($password == $confirm_password){
      $sql = "SELECT * FROM user WHERE Email = '$email'";
      $result = mysqli_query($connection, $sql);

      if(mysqli_num_rows($result)){
          $errormsg = '<p style="color: red;">Account already exists!</p>';
      }else{
          $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
          $query="INSERT INTO user(Username, Email, Password) VALUES('$username', '$email', '$password')";
      
          $result = mysqli_query($connection,$query);
      
          if($result){
              $_SESSION['email'] = $email;
              header('Location: sign-in.php');
          }
          else{
              $errormsg = '<p style="color: red;">Server error, try again later!</p>';
              mysqli_error($connection);
          }
          mysqli_close($connection);
      }
      
  }else{
      $errormsg = '<p style="color: red;">Passwords dont match</p>';
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
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-image: linear-gradient(rgba(0,0,10,0.8),rgba(0,0,50,0.8)),url(images/2.png);
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
  <title>Register Now</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div id="login-container" >
    <h2>Sign Up</h2>
    <?php echo $errormsg ?? null ?>
    <form action="" method="POST">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <label for="password">Confirm Password:</label>
      <input type="password" id="confirm_password" name="confirm_password" required>
      
      <input type="submit" value="Submit" name="submit">

      <p>Already have an account? <a href="sign-in.php">Login here</a></p>
    </form>
  </div>
</body>
</html>
