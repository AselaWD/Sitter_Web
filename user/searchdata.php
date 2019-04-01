<?php
echo"<body bgcolor='1f1f1f'>";

echo "<link rel='stylesheet' type='text/css' href='style.css' title='style'/>";



$con=mysqli_connect("localhost","root","","mydbgw1");

$myid=$_POST['txtstudid'];
//echo "<h2> $myid  </h2>";


	if(!$_POST['txtstudid'])
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('You did not complete all the Required Fields')
		window.location.href='search.html' </SCRIPT>");
		exit();
		
	}

if(mysqli_connect_error()){

echo "Failed to connect to MySqL:".mysqli_connect_error();

}


$result=mysqli_query($con,"SELECT * FROM greenwitchstud WHERE studid='$myid'");

if($row=mysqli_fetch_array($result))
{
$sid=$row['studid'];	
$sname=$row['studna'];
$sdob=$row['dob'];
$sgender=$row['gender'];
$smod=$row['submod'];
$sphone=$row['phone'];
$semail=$row['email'];
    
	

echo"<center>  <br> <br> <br>  ";


echo"<center>  <br> <br> <br>  ";
echo"<center>  <br> <br> <br>  ";



echo "<font face='Arial' size='6' color='1f1f1f'> Your Search Result </font> <br> <br>";

echo "<table border='1' bgcolor='gray' width='600' height='150' border='0px'>
		
		<tr>
		<td width='300' height='10'> Stud Id </td>
		
		<td> $sid</td>
		</tr>
		
		<tr>
		<td width='300' height='10'> Name </td>
		
		<td> $sname</td>
		</tr>
		
		<tr>
		<td height='10'> DOB </td>
		
		<td> $sdob</td>
		</tr>
		
		<tr>
		<td height='10'>Gender </td>
		
		<td>$sgender</td> 
		</tr>
		
		<tr>
		<td height='10'> Sub Module</td>
		
		<td>$smod</td> 
		</tr>
		
		<tr>
		<td>Phone </td>
		
		<td>$sphone</td> 
		</tr>
		
		<tr>
		<td>Email </td>
		
		<td>$semail</td> 
		</tr>
		

</table>  ";

echo"<center>";

}

else
		{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Your Student Id Does NOT Exists ')
		window.location.href='search.html' </SCRIPT>");
		exit();
		}

?>