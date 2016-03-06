<?php
include "includes/header.php";


?>

<div class="content_left"> 
  <div class="movie_detail">
  <h2> Movie Detail  </h2>
        <p>
          <?php
    if(isset($_GET['url'])){
	$url = $_GET['url'];
	$sql = "SELECT * FROM movies WHERE url = '$url'";
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
	if ($data){
		?></p>
        <table width="100%" border="" cellpadding="15" cellspacing="0" >
          
          <tr>
            <td width="352" height="30" >Movie Name:</td>
            <td width="299"><?php echo $data['title']; ?></td>
          </tr>
          <tr>
            <td colspan="2">
            <img src="admin/images/contents/<?php echo $data['image']; ?>" height="250" border='0'>
            </td>
          </tr>
          <tr>
            <td colspan="2">Description:</td>
          </tr>
          <tr>
            <td colspan="2"><?php echo $data['detail']; ?></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <?php
		
	
	}
	else
	{
		echo 'movie not found';
		}
		
}
  	?>
  </div>
  </div>
 
<div class="content_right">
 <?php include ("includes/side.php"); ?>
</div>
  
<?php
include "includes/footer.php"; 
?>
