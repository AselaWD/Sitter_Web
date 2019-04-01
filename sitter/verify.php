
<?php
if (isset($_GET['submit'])) {
if (empty($_GET['name']) || empty($_GET['email'])) {
echo '<span id="one">***Fill All Fields***</span>';
} else {
$name2 = $_GET['name'];
$email2 = $_GET['email'];
$connection = mysql_connect("localhost", "root", "","ha07"); // Establishing Connection with Server
$db = mysql_select_db("company", $connection); // Selecting Database
$query = mysql_query("select * from member where EMail='email2'", $connection); // My-SQL Query to fetch particular matching row.
$rows = mysql_num_rows($query);
if ($rows == 1) {
echo '<span id="two">***Email Verification Success***</span>';
} else {
echo '<span id="three">***Email Verification Failed***</span>';
}
mysql_close($connection); // Closing Connection with Server
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>PHP Email Verification Script</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div id="mainform">
<div id="innerdiv">
<!-- Required Div Starts Here -->
<h2>PHP Email Verification</h2>
<form action="" id="form" method="get" name="form">
<h3>Email Verification Form</h3>
<label>Name :</label>
<input id="name" name="name" placeholder="Name" type="text">
<label>Email :</label>
<input id="email" name="email" placeholder="Email" type="text">
<input id="submit" name="submit" type="submit" value="Verify">
<div id="alert">

</div>
</form>
</div>
</div>
</body>
</html>

