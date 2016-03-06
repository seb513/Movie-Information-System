<?php
include "includes/session.php";
include "includes/dbconfig.php"; 


$type = "contact";
$tablename = $type;

if(isset($_POST['create'])){
	
	$name = $_POST['name'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$status = $_POST['status'];
	
	if(!empty($name) && !empty($address)){
		
		$sql = "INSERT INTO $tablename(name, address, email, message, status) VALUES('$name', '$address', $email, '$message' ,'$status')";
		
		$query = mysql_query($sql);
		if($query){
			$success = "Data successfully inserted.";
		} else {
			$error = "Data not inserted. Mysql Error : ".mysql_error();
		}
		
	} else {
		$error = "name and address shouldnot  be empty.";
	}
}

//update
if(isset($_POST['save'])){
	
	$name = $_POST['name'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$status = $_POST['status'];
	$id = $_POST['id'];
	
	if(!empty($fullname) && !empty($username)){
		
		$sql = "UPDATE $tablename SET name = '$name', address = '$address', email = '$email', message = '$message', status = '$status' WHERE id = '$id'";
		
		$query = mysql_query($sql);
		if($query){
			$success = "Data successfully updated.";
		} else {
			$error = "Data not updated. Mysql Error : ".mysql_error();
		}
		
	} else {
		
		$error = "name and address shouldnot be empty"; 
	}
}

//delete
if(isset($_GET['del'])){
	$id = $_GET['del'];
	$sql = "DELETE FROM $tablename WHERE id = '$id'";
	$query = mysql_query($sql);
	if($query)
		$success = "Data deleted successfully.";
	else
		$error = "Data not deleted.";	
}

//edit
if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$sql = "SELECT * FROM $tablename WHERE id = '$id'";
	$query = mysql_query($sql);
	$editData = mysql_fetch_array($query);
}
//to filter records
if(isset($_POST['search'])){
	
	$searchby = $_POST['searchby'];
	$searchkey = $_POST['searchkey'];
	
	$sql = "SELECT * FROM $tablename WHERE $searchby LIKE '%$searchkey%'";
	
} else {
	$sql = "SELECT * FROM $tablename";
}


//query for select records
$query = mysql_query($sql);
$count = mysql_num_rows($query);

include "includes/header.php";
?>


<div id="container">
	<div class="shell">
		

		<div class="small-nav">
			<a href="#">Dashboard</a>
			<span>&gt;</span>
			Current <?php echo ucfirst($type); ?>
		</div>
		
		<?php include "includes/message.php"; ?>
  
        <div class="cl">&nbsp;</div>
        <br />
		<div id="main">
			<div class="cl">&nbsp;</div>
			

			<div id="content">
				
				<?php
				if(isset($_GET['new']) || isset($_GET['edit'])){
					include "manager/contact_form.php"; 
				} else {
					include "manager/contact_edit.php";
				}
				?>

			</div>
			
			
			<div class="cl">&nbsp;</div>			
		</div>

	</div>
</div>

<?php
include "includes/footer.php";
?>

