<?php session_start(); ?>
<?php require_once('connection.php');?>
<?php
  //check for submission
  if(isset($_POST['login_submit'])){
    $errors= array();
    //check if the username and password has been enterd
    if(!isset($_POST['user_name']) || strlen(trim($_POST['user_name'])) < 1){
      $errors[] = 'username is missing / or invalid';

    }
    if(!isset($_POST['user_password']) || strlen(trim($_POST['user_password'])) < 1){
      $errors[] = 'password is missing / or invalid';

    }
    if(empty($errors)){
      //save username and password in to veriables
      $username = mysqli_real_escape_string($connection, $_POST['user_name']);
      $pass = mysqli_real_escape_string($connection, $_POST['user_password']);
      $hashed_password=sha1($pass);
      //prepair database quary
      $query= "SELECT * FROM `str_table` WHERE `usrnme` = '$username' AND `password` = '$hashed_password'LIMIT 1";
      $result_set = mysqli_query($connection, $query);
      if($result_set){
        //query successfull
        if(mysqli_num_rows($result_set) == 1){

          //valid user found
          $user=mysqli_fetch_assoc($result_set);
          $_SESSION['user_id'] = $user['ID'];
          $id= $user['ID'];
          $_SESSION['first_name'] = $user['Firstnme'];
          $_SESSION['user_mode']= $user['Mode'];
          //updating last login
          $query="UPDATE `str_table` SET `lastlogin` = NOW()";
          $query .= "WHERE `ID`='$id' LIMIT 1";
          $result_set = mysqli_query($connection, $query);
          if(!$result_set){
            die("database query failed.");

          } 
          header("location: users.php?ID={$user['ID']}");

        } else {
          //username and password invalid
          $errors[]='invalid username / password';
        }
      } else{
        $errors[]='Database query failed';
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign In</title>


  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

      <link rel="stylesheet" href=".././css/mycss.css">


</head>

<body>
    <div id="dvi1">
        <br>
        <br>
        <br>
        <legend><h1 align="center">USER LOGIN FORM</h1></legend>
        <br>
        <br>
        <div class="login-html">
            <form action="sign_in.php" method="post">
            <?php 
            if(isset($errors) AND !empty($errors)){
              echo '<p id="pmsg">Invalid Username / Password</p>';
            }

            ?>

             <?php 
             if(isset($_GET['logout'])){
              echo '<p id="pmsg1">You Have successfully loged out from the system</p>';
            }
            ?>

                <div id="div2">
                    <label id="lbl">User Name</label><br>
                    <input type="text" name="user_name" id="txt" placeholder="Enter User Name">
                </div>
                <br>
                <div id="div2">
                    <label id="lbl">Password</label><br>
                    <input type="password" name="user_password" id="txt" placeholder="Enter User Name">
                </div>
                <br>
				<br>
				<br>
                <div id="div2">
                        <input type="submit" value="Next>>" name="login_submit" id="btn1">
                    </div>
					<br>


                <br>
                <br>
                <hr>
            </form>
             <a href="../html/sign_up_main.html"><p id="lbl" align="center" >Haven't eccount ?</p></a>
            <br>
            <br>
            <br>
        </div>
    </div>
</body>
</html>
<?php mysqli_close($connection);?>
