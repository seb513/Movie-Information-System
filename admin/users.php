<?php
include "includes/session.php";
include "includes/dbconfig.php"; 


$type = "users";
$tablename = $type;

if(isset($_POST['create'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$status = $_POST['status'];
	
	if(!empty($username)){
		
		$sql = "INSERT INTO $tablename(username, password,status) VALUES('$username', $password, '$status')";
		
		$query = mysql_query($sql);
		if($query){
			$success = "Data successfully inserted.";
		} else {
			$error = "Data not inserted. Mysql Error : ".mysql_error();
		}
		
	} else {
		$error = "username shouldnot be empty.";
	}
}

//update
if(isset($_POST['save'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$status = $_POST['status'];
	$id = $_POST['id'];
	
	if(!empty($username)){
		
		$sql = "UPDATE $tablename SET username = '$username', password = '$password', status = '$status' WHERE id = '$id'";
		
		$query = mysql_query($sql);
		if($query){
			$success = "Data successfully updated.";
		} else {
			$error = "Data not updated. Mysql Error : ".mysql_error();
		}
		
	} else {
		$error = "username shouldn't be empty.";
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
        
        <a href="?new" class="add-button"><span>Create User</span></a>
        <div class="cl">&nbsp;</div>
        <br />
		<div id="main">
			<div class="cl">&nbsp;</div>

			<div id="content">
				
				<?php
				if(isset($_GET['new']) || isset($_GET['edit'])){
					include "manager/user_form.php"; 
				} else {
					include "manager/user_edit.php";
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

