<?php
session_start();
include('../config.php');

if(!isset($_SESSION['username'])){
    header('Location: index.php');
}else{

    $username = $_SESSION['username'];

    if(isset($_POST['submit'])){
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        $sql = "SELECT * FROM admin WHERE Username = '$username'";
        $results = mysqli_query($connection, $sql);

        foreach($results as $result){
            $password = $result['Password'];
        }

        $equalPassword = password_verify($oldPassword, $password);
        
        if($equalPassword){
            if($newPassword == $confirmPassword){
                $newHash = password_hash($newPassword, PASSWORD_DEFAULT);

                $sql = "UPDATE admin SET Password = '$newHash' WHERE Username = '$username'";
                $result = mysqli_query($connection, $sql);

                if($result){
                    $errormsg = '<p style="color: green;">Password changed successsfully!</p>';
                }else{
                    $errormsg = '<p style="color: red;">Error occured, try again later!</p>';
                }
            }else{
                $errormsg = '<p style="color: red;">Passwords does not match!</p>';
            }
        }else{
            $errormsg = '<p style="color: red;">Incorrect old password!</p>';
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Password</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f0f0f0;
  }
  .container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    width: 300px;
  }
  .input-group {
    margin-bottom: 15px;
  }
  label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }
  input[type="password"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }
  input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }
</style>
</head>
<body>
    
  <div class="container">
  <a href="dashboard.php"><button>Home</button></a>
    <h2>Change Password</h2>
    <?php echo $errormsg ?? null ?>
    <form action="" method="POST">
      <div class="input-group">
        <label for="old-password">Old Password</label>
        <input type="password" id="old-password" name="oldPassword" required>
      </div>
      <div class="input-group">
        <label for="new-password">New Password</label>
        <input type="password" id="new-password" name="newPassword" required>
      </div>
      <div class="input-group">
        <label for="confirm-password">Confirm New Password</label>
        <input type="password" id="confirm-password" name="confirmPassword" required>
      </div>
      <input type="submit" value="Submit" name="submit">
      
    </form>
  </div>
</body>
</html>

<?php
}
?>