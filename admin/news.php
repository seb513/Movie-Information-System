<?php
include "includes/session.php";
include "includes/dbconfig.php"; 


$type = "news";
$tablename = $type;

if(isset($_POST['create'])){
	
	$title = $_POST['title'];
	$description = $_POST['description'];
	$status = $_POST['status'];
	
	if(!empty($title) && !empty($description)){
		
		$sql = "INSERT INTO $tablename(title, description, status) VALUES('$title', 'description', '$status')";
		$query = mysql_query($sql);
		if($query){
			$success = "Data successfully inserted.";
		} else {
			$error = "Data not inserted. Mysql Error : ".mysql_error();
		}
		
	} else {
		$error = "title and description can't be blank.";
	}
}

//update
if(isset($_POST['save'])){
	
	$title = $_POST['title'];
	$description = $_POST['description'];
	$status = $_POST['status'];
	$id = $_POST['id']; 
	if(!empty($title) && !empty($description)){
		
		$sql = "UPDATE $tablename SET title = '$title', description = '$description', status = '$status' WHERE id = '$id'";
		
		$query = mysql_query($sql);
		if($query){
			$success = "Data successfully updated.";
		} else {
			$error = "Data not updated. Mysql Error : ".mysql_error();
		}
		
	} else {
		$error = "title and description can't be blank.";
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


//select records
$query = mysql_query($sql);
$count = mysql_num_rows($query);//

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
        
        <a href="?new" class="add-button"><span>Add News</span></a>
        <div class="cl">&nbsp;</div>
        <br />
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content">
				
				<?php
				if(isset($_GET['new']) || isset($_GET['edit'])){
					include "manager/news_form.php"; 
				} else {
					include "manager/news_edit.php";
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

