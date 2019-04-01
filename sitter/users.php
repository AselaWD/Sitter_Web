<?php session_start(); ?>
<?php require_once('connection.php'); ?>
<?php 
  if(!isset($_SESSION['user_id'])){
    header('location: ../html/sign_main.html');
  }
?>
<?php
$usrid= $_SESSION['user_id'];
$query="SELECT * FROM `str_table` WHERE `ID` = '$usrid'";

$result_set = mysqli_query($connection, $query);
if($result_set){
  if(mysqli_num_rows($result_set) == 1){
    $user=mysqli_fetch_assoc($result_set);

    $nme = $user['usrnme'];
    $fnme= $user['Firstnme'];
    $lnme= $user['LastNme'];
    $Gender= $user['Gender'];
    $birthday=$user['Birthday'];
    $address=$user['Address'];
    $email=$user['EMail'];
    $contact= $user['Contact'];
    $discribtion=$user['Discribtion'];
    $img= $user['image'];
    $llog=$user['lastlogin'];
  }
}
?>
<?php
if(isset($_POST['submit'])){
  $change_first_name=$_POST['first_name'];
  $change_last_name=$_POST['last_name'];
  $change_dateofbirth=$_POST['date'];
  $change_address=$_POST['address'];
  $change_emmail=$_POST['email'];
  $change_contact=$_POST['contact'];
  $change_discribtion=$_POST['describtion'];
  
  $query1="UPDATE `str_table` SET `Firstnme` = '{$change_first_name}', `LastNme` = '{$change_last_name}', `Birthday` = '{$change_dateofbirth}', `Address` = '$change_address',`EMail` = '$change_emmail',`Contact` = '$change_contact',`Discribtion` = '$change_discribtion' WHERE `str_table`.`ID` = '$usrid' LIMIT 1";
  $result=mysqli_query($connection, $query1);
  if($result){
    header('location: users.php?user_modify=true');
  } else{
    echo 'error';
  }

}

?>
<?php
if(isset($_POST["insert"])){
$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
$query1="UPDATE `str_table` SET `image` = '$file' WHERE `str_table`.`ID` = '$usrid' LIMIT 1";
$result=mysqli_query($connection, $query1);
  if($result){
    header('location: users.php?user_modify=true');
  } else{
    echo 'error';
  }
}
?>

<?php
if(isset($_POST['chpassword'])){
$pass = mysqli_real_escape_string($connection, $_POST['current_password']);
$hashed_password=sha1($pass);
$query= "SELECT `password` FROM `str_table` WHERE `ID` = '$usrid' AND `password` = '$hashed_password' LIMIT 1 ";
$result = mysqli_query($connection, $query);
if($result){
  $newpass=$_POST['new_password'];
  $veryfy_pass=$_POST['veryfy_password'];

  if($newpass == $veryfy_pass){
    $hashed_password= sha1($newpass);
    $query="UPDATE `str_table` SET `password` = '{$hashed_password}' WHERE `str_table`.`ID` = '$usrid' LIMIT 1";
    $result1=mysqli_query($connection, $query);
    if($result1){
      header('location: users.php?user_modify=true');
    }else{
    echo 'error';
  }
  }else{
    echo 'plese entr same password';
  }

  }
}
?>


<!DOCTYPE html>
<html lang="UTF-8">
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Include the above in your HEAD tag ---------->

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="../css/mycss.css">
<!-- Include the above in your HEAD tag -->
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<hr>
	<header id="header1">
		<div id="usrpro">PROFILE MODE <?php echo $_SESSION['user_mode']; ?></div>
		<div id="login">Welcome <?php echo $_SESSION['first_name']; ?> <a href="logout.php">Log out</a></div>
	</header>
<div class="container bootstrap snippet">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
<?php 
$query = "SELECT `image` FROM `str_table` WHERE `ID` = '$usrid' LIMIT 1 ";
$result = mysqli_query($connection, $query);
if($result){

  if(mysqli_num_rows($result) == 1){
    $user=mysqli_fetch_assoc($result);
    $img= $user['image'];
  }
  }
?>

      <div class="text-center">
        <img src="<?php echo'data:image/jpeg;base64,'.base64_encode($img).''?>" class="avatar img-circle img-thumbnail" alt="avatar">
       <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-thumnail" />
      </div></hr><br>







        </div><!--/col-3-->
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                <li><a data-toggle="tab" href="#messages">Status</a></li>
                <li><a data-toggle="tab" href="#settings">Settings</a></li>
              </ul>


          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                 <div>
                   <h3>Current user summery</h3>
                   <?php  
                   echo "Last Login   : ". $llog.'<br>';
                   echo "First Name   : ". $fnme.'<br>';
                   echo "Last Name    : ". $lnme.'<br>';
                   echo "Gender       : ". $Gender.'<br>';
                   echo "Birth day    : ". $birthday.'<br>';
                   echo "Address      : ". $address.'<br>';
                   echo "E-mail       : ". $email.'<br>';
                   echo "Contact No   : ". $contact.'<br>';
                   echo "Discribtion  : ". $discribtion.'<br>';
                   ?>
                 </div>

              <hr>

             </div><!--/tab-pane-->
             <div class="tab-pane" id="messages">

               <h2></h2>

               <hr>
                  <h1>request field</h1>

             </div><!--/tab-pane-->
             <div class="tab-pane" id="settings">


                  <hr>
                   
                  <form class="form" action="##" method="post" id="registrationForm" enctype="multipart/form-data">
                      <div class="form-group">
                        <div>
                          <h6>Upload a different photo...</h6>
                          <input type="file" name="image" id="imagr">
                          <button type="submit" name="insert" id="insert" value="upload">UPLOAD</button>
                        </div>

                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $fnme;?> " title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $lnme; ?>" title="enter your last name if any.">
                          </div>
                      </div>

                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="phone"><h4>Gender</h4></label>
                              <input type="text" class="form-control" name="gender" id="gender" placeholder="<?php echo $Gender; ?>" read only>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Birthday</h4></label>
                              <input type="date" class="form-control" name="date" id="date" value="<?php echo $birthday; ?>" title="enter your Birthday.">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="email"><h4>Address</h4></label>
                              <input type="text" class="form-control" name="address" id="location" value="<?php echo $address; ?>" title="enter your address.">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="email"><h4>E-mail</h4></label>
                              <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" title="enter your email">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="password"><h4>contact</h4></label>
                              <input type="text" class="form-control" name="contact" id="contact" value="<?php echo $contact; ?>" title="enter your Mobile no.">
                          </div>
                      </div>
                      <br>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="password2"><h4>Discribtion</h4></label>
                              <input type="text" class="form-control" name="describtion" id="diascribtion" value="<?php echo $discribtion; ?>" title="enter small summury about you." maxlenght="225">
                          </div>
                      </div>
                      <hr>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="password2"><h4>current password</h4></label>
                              <input type="password" class="form-control" name="current_password" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="password2"><h4>new password</h4></label>
                              <input type="password" class="form-control" name="new_password" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="password2"><h4>verify pasword</h4></label>
                              <input type="password" class="form-control" name="veryfy_password" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success pull-right" type="submit" name="chpassword"><i class="glyphicon glyphicon-ok-sign"></i>Change Password</button>
                                <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button name="submit" class="btn btn-lg btn-success pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                      </div>
              	</form>
              </div>

              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
</body>
<script type="text/javascript">
$(document).ready(function() {


    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".file-upload").on('change', function(){
        readURL(this);
    });
});
</script>
<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  
</html>
<?php mysqli_close($connection);?>