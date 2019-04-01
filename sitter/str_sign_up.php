<?php session_start(); ?>
<?php require_once('connection.php'); ?>
<?php
$errors=array();
if(isset($_POST['strsubmit'])){

    //checking required fields
    $req_fields = array('sitter_username','sitter_password','sitter_verify_password','service_type','sitter_first_name','sitter_last_name','Gender','sitter_birthday','sitter_address','sitter_email','sitter_contact');
    foreach ($req_fields as $field) {
        if(empty($_POST[$field])){
            $errors[] = $field . ' is required';
        } 
    }
    //checking max lenght
    $max_len_fields = array('sitter_username' => 20,
        'sitter_password' => 50, 
        'sitter_verify_password' =>50,
        'sitter_first_name' =>30,
        'sitter_last_name' =>30,
        'sitter_contact' =>10);
    foreach ($max_len_fields as $field => $max_len) {
        if(strlen(trim($_POST[$field])) > $max_len){
            $errors[] = $field . ' must be less than ' . $max_len . ' Characters';
        } 
    }
if(empty($errors)){

    $sitter_username=mysqli_real_escape_string($connection, $_POST['sitter_username']);
    $sitter_password=mysqli_real_escape_string($connection, $_POST['sitter_password']);
    $sitter_verify_password=mysqli_real_escape_string($connection, $_POST['sitter_verify_password']);
    $sitter_service_type=mysqli_real_escape_string($connection, $_POST['service_type']);
    $sitter_first_name=mysqli_real_escape_string($connection, $_POST['sitter_first_name']);
    $sitter_last_name=mysqli_real_escape_string($connection, $_POST['sitter_last_name']);
    $sitter_gender=mysqli_real_escape_string($connection, $_POST['Gender']);
    $sitter_birthday=mysqli_real_escape_string($connection, $_POST['sitter_birthday']);
    $sitter_address=mysqli_real_escape_string($connection, $_POST['sitter_address']);
    $sitter_email=mysqli_real_escape_string($connection, $_POST['sitter_email']);
    $sitter_contact=mysqli_real_escape_string($connection, $_POST['sitter_contact']);

    $hashed_password= sha1($sitter_password);
    $query = "INSERT INTO str_table (usrnme,password,SrviceType,Firstnme,LastNme,Gender,Birthday,Address,EMail,Contact,Mode)
    VALUES ('$sitter_username','$hashed_password','$sitter_service_type','$sitter_first_name','$sitter_last_name','$sitter_gender','$sitter_birthday','$sitter_address','$sitter_email','$sitter_contact','SITTER')";

    $result=mysqli_query($connection, $query);
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
            <h1 align="center">SITTER REGISTATION FORM</h1>
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

                <form action="str_sign_up.php" method="post">
                    <div id="div2">
                        <label id="lbl">User Name</label><br>
                        <input type="text" name="sitter_username" id="txt" placeholder="Enter User Name">
                    </div>
                    <br>
                    <div id="div2">
                        <label id="lbl">Password</label><br>
                        <input type="password" name="sitter_password" id="txt" placeholder="Enter User Password">
                    </div>
                    <br>
                    <div id="div2">
                        <label id="lbl">Re-Type Password</label><br>
                        <input type="password" name="sitter_verify_password" id="txt" placeholder="type Password again">
                    </div>
                    <br>
                    <div id="div2">
					   <label id="lbl">What Service Do you Offer</label><br>
					   <select name="service_type" id="txt">
						  <option value="Service" id="txtselect"> select your service</option>
						  <option value="baby_Sitter" id="txtselect">Baby Sitter</option>
						  <option value="pet_Sitter" id="txtselect">pet Sitter</option>
						  <option value="house_Sitter" id="txtselect">house Sitter</option>
						  <option value="plant_Sitter" id="txtselect">plant Sitter</option>
					   </select>
				    </div>
                    <br>
                    <div id="div2">
					   <label id="lbl">First Name</label><br>
					   <input type="text" name="sitter_first_name" id="txt" placeholder="Enter your first name">
				    </div>
                    <br>
				    <div id="div2">
					   <label id="lbl">Last Name</label><br>
					   <input type="text" name="sitter_last_name" id="txt" placeholder="Enter your Last name">
				    </div>
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
				        <input type="date" name="sitter_birthday" id="txt" placeholder="Enter your Birthday">
				    </div>
                    <br>
				    <div id="div2">
					   <label id="lbl">Address</label><br>
					   <input type="text" name="sitter_address" id="txt" placeholder="Enter your Address">
				    </div>
                    <br>
			         <div id="div2">
					   <label id="lbl">Email Address</label><br>
					   <input type="email" name="sitter_email" id="txt" placeholder="Enter your E-mail Address">
				    </div>
                    <br>
				    <div id="div2">
					   <label id="lbl">Contact</label><br>
					   <input type="text" name="sitter_contact" id="txt" placeholder="Enter your first Contact">
				    </div>
                    <br>
                    <div id="div2">
                        <input type="submit" value="Next>>" name="strsubmit" id="btn1">
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
<?php mysqli_close($connection) ?>
