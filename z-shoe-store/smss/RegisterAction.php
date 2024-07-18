<?php
	
	require 'Connection.php';
	
	$ActionType = $_GET['ActionType'];
	$Location = $_GET["Loc"];
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$Firstname = $_POST['Firstname'];
	$Lastname = $_POST['Lastname'];
	$Address = $_POST['Address'];
	$EmailAddress = $_POST['EmailAddress'];
	$City = isset($_POST['City'])? $_POST['City'] :
	$State =$_POST['State'];
	
	if(empty($Username) || empty($Password) || empty($Firstname) || empty($Lastname) || empty($Address) || empty($EmailAddress || empty($City) || empty($State))) {
		echo '<script>window.alert("Cannot leave the page blank"); window.open("register.php","_self",null,true);</script>';
	}
	else
	{
		if($ActionType == "Register")
		{
			$sql = "INSERT INTO `tbl_customers`(`Username`,`Password`,`Role`,`Firstname`, `Lastname`, `Address`, `EmailAddress`,'City','State')" .
					" VALUES ('$Username','$Password','User','$Firstname','$Lastname','$Address','$EmailAddress','$State')";
			$res = mysqli_query($Conn,$sql);
			if(!$res)
			{
				echo "Failed " . mysqli_connect_error();
			}else
			{
				echo '<script>window.alert("Registration Completed! Please Login"); window.open("Login.php?Role=User","_self",null,true);</script>'; 
			}
		}
		else
		{
			$ID = $_GET['ID'];
			$sqlI = "UPDATE `tbl_customers` SET `Username`='$Username',`Password`='$Password',`Firstname`='$Firstname'," .
			"`Lastname`='$Lastname',`Address`='$Address',`EmailAddress`='$EmailAddress',`City`='$City',`State`='$State' WHERE CustomerID = $ID";
			$res = mysqli_query($Conn,$sqlI);
			if(!$res)
			{
				echo "Failed " . mysqli_connect_error();
			}else
			{	
				if($Location == "MA"){
				echo '<script>window.open("ManageAccount.php","_self",null,true);</script>';}
				else if($Location == "MC"){
				echo '<script>window.open("Management_Customers.php","_self",null,true);</script>';}
			}
		}
		
	}

?>
