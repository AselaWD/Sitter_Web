<?php session_start(); ?>
<?php require_once('connection2.php'); ?>
<?php
$errors=array();
if(isset($_POST['usrsubmit'])){

    //checking required fields
    $req_fields = array('user_username','user_password','user_verify_password','user_first_name','user_last_name','Gender','user_birthday','user_address','user_email','user_contact');
    foreach ($req_fields as $field) {
        if(empty($_POST[$field])){
            $errors[] = $field . ' is required';
        } 
    }
    //checking max lenght
    $max_len_fields = array('user_username' => 20,
        'user_password' => 50, 
        'user_verify_password' =>50,
        'user_first_name' =>30,
        'user_last_name' =>30,
        'user_contact' =>10);
    foreach ($max_len_fields as $field => $max_len) {
        if(strlen(trim($_POST[$field])) > $max_len){
            $errors[] = $field . ' must be less than ' . $max_len . ' Characters';
        } 
    }
if(empty($errors)){

    $user_username=mysqli_real_escape_string($connection2, $_POST['user_username']);
    $user_password=mysqli_real_escape_string($connection2, $_POST['user_password']);
    $user_verify_password=mysqli_real_escape_string($connection2, $_POST['user_verify_password']);
    $user_first_name=mysqli_real_escape_string($connection2, $_POST['user_first_name']);
    $user_last_name=mysqli_real_escape_string($connection2, $_POST['user_last_name']);
    $user_gender=mysqli_real_escape_string($connection2, $_POST['Gender']);
    $user_birthday=mysqli_real_escape_string($connection2, $_POST['user_birthday']);
    $user_address=mysqli_real_escape_string($connection2, $_POST['user_address']);
    $user_email=mysqli_real_escape_string($connection2, $_POST['user_email']);
    $user_contact=mysqli_real_escape_string($connection2, $_POST['user_contact']);

    $hashed_password= sha1($user_password);
    $query = "INSERT INTO usr_table (usrnme,password,Firstnme,LastNme,Gender,Birthday,Address,EMail,Contact,Mode)
    VALUES ('$user_username','$hashed_password','$user_first_name','$user_last_name','$user_gender','$user_birthday','$user_address','$user_email','$user_contact','USER')";

    $result=mysqli_query($connection2, $query);
    if($result){
      echo"records added successfully";
      header('location: sign_in.php?user_added=true');
    } else{
      $errors[]='faild to add new record';
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Sitter Registation Form</title>
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
        <link rel="stylesheet" href="../css/mycss.css">
    </head>
    <body>
        <div id="dvi1">
            <br>
            <br>
            <br>
            <h1 align="center">USER REGISTATION FORM</h1>
            <br>
            <br>
            <?php 
                if(!empty($errors)){
                    echo"<div id='pmsg'>";
                    echo"<p>there were error(s) on your form</p>";
                    foreach ($errors as $error) {
                        echo $error . "<br>";
                    }
                    echo"</div>";   
                }
            ?>
            <div class="login-html">

                <form action="usr_sign_up.php" method="post">
                    <div id="div2">
                        <label id="lbl">User Name</label><br>
                        <input type="text" name="user_username" id="txt" placeholder="Enter User Name">
                    </div>
                    <br>
                    <div id="div2">
                        <label id="lbl">Password</label><br>
                        <input type="password" name="user_password" id="txt" placeholder="Enter User Password">
                    </div>
                    <br>
                    <div id="div2">
                        <label id="lbl">Re-Type Password</label><br>
                        <input type="password" name="user_verify_password" id="txt" placeholder="type Password again">
                    </div>
                    <br>
                    <div id="div2">
					   <label id="lbl">First Name</label><br>
					   <input type="text" name="user_first_name" id="txt" placeholder="Enter your first name">
				    </div>
                    <br>
				    //<div id="div2">
					   <label id="lbl">Last Name</label><br>
					   <input type="text" name="user_last_name" id="txt" placeholder="Enter your Last name">
				    </div>//
                    <br>
				    <div id="div2">
					   <label id="lbl">Gender</label><br>
					   <select name="Gender" id="txt">
						  <option value="gender" class="label">select your Gender</option>
						  <option value="Male" id="txtselect">Male</option>
						  <option value="Female" id="txtselect">Female</option>
					   </select>
				    </div>
                    <br>
                    <div id="div2">
					   <label id="lbl">Birth Day</label><br>
				        <input type="date" name="user_birthday" id="txt" placeholder="Enter your Birthday">
				    </div>
                    <br>
				    <div id="div2">
					   <label id="lbl">Address</label><br>
					   <input type="text" name="user_address" id="txt" placeholder="Enter your Address">
				    </div>
                    <br>
			         <div id="div2">
					   <label id="lbl">Email Address</label><br>
					   <input type="email" name="user_email" id="txt" placeholder="Enter your E-mail Address">
				    </div>
                    <br>
				    <div id="div2">
					   <label id="lbl">Contact</label><br>
					   <input type="text" name="user_contact" id="txt" placeholder="Enter your first Contact">
				    </div>
                    <br>
                    <div id="div2">
                        <input type="submit" value="Next>>" name="usrsubmit" id="btn1">
                    </div>
                </form>
            </div>
            <br>
        <br>
        <br>
        <br>
        <br>
        </div>

    </body>
</html>
<?php mysqli_close($connection2) ?>
