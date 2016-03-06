<?php
include "includes/session.php";
include "includes/dbconfig.php"; 


$type = "movies";
$tablename = $type;

//path of content image
$path = "images/contents/";

if(isset($_POST['create'])){
	$cid = $_POST['cid'];
	$title = $_POST['title'];
	$url = $_POST['url'];
	$detail = $_POST['detail'];
	$status = $_POST['status'];
	
	$imageName = '';
	$image = $_FILES['image']; //name, type, size, error, tmp_name
	//print_r($image);
	if(!empty($image['name'])){
		
		$copy = move_uploaded_file($image['tmp_name'],$path.$image['name']);
		if($copy){
			$imageName = $image['name'];
		}
	}
	
	if(!empty($title) && !empty($url)){
		
		$sql = "INSERT INTO $tablename(cid,title, url, image, detail, status) VALUES('$cid','$title', '$url', '$imageName', '$detail', '$status')";
		
		$query = mysql_query($sql);
		//$query = false;
		if($query){
			$success = "Data successfully inserted.";
		} else {
			$error = "Data not inserted. Mysql Error : ".mysql_error();
		}
		
	} else {
		$error = "Title and url can't be blank.";
	}
}

//to update the record
if(isset($_POST['save'])){
	
	$cid = $_POST['cid'];
	$title = $_POST['title'];
	$url = $_POST['url'];
	$detail = $_POST['detail'];
	$status = $_POST['status'];
	$id = $_POST['id'];
	
	//for image
	$imageName = $_POST['oldImage'];
	$image = $_FILES['image']; //name, type, size, error, tmp_name
	//print_r($image);
	if(!empty($image['name'])){
		
		$copy = move_uploaded_file($image['tmp_name'],$path.$image['name']);
		if($copy){
			$imageName = $image['name'];
		}
	}
	if(!empty($title) && !empty($url)){
		
		$sql = "UPDATE $tablename SET cid = '$cid', title = '$title', url = '$url', image = '$imageName', detail = '$detail',  status = '$status' WHERE id = '$id'";
		$query = mysql_query($sql);
		if($query){
			$success = "Data successfully updated.";
		} else {
			$error = "Data not updated. Mysql Error : ".mysql_error();
		}
		
	} else {
		$error = "Title and url can't be blank.";
	}
}

//to delete record
if(isset($_GET['del'])){
	$id = $_GET['del'];
	$sql = "DELETE FROM $tablename WHERE id = '$id'";
	$query = mysql_query($sql);
	if($query)
		$success = "Data deleted successfully.";
	else
		$error = "Data not deleted.";	
}

//to get editable record
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

//function to get page titles
function getCatTitle($id){
	$sql = "select title from category where id = '$id'";
	 $query = mysql_query($sql);
	$data = mysql_fetch_array($query);
	if($data)
		return $data['title'];
	else
		return "Not Found.";
}

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
        
        <a href="?new" class="add-button"><span>Add Movies</span></a>
        <div class="cl">&nbsp;</div>
        <br />
		<div id="main">
			<div class="cl">&nbsp;</div>
			<div id="content">
				
				<?php
				if(isset($_GET['new']) || isset($_GET['edit'])){
					include "manager/movie_form.php"; 
				} else {
					include "manager/movie_edit.php";

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

