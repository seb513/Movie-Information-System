<?php
	include 'includes/header.php';
	
	$movid = 0;
if(isset($_GET['cid'])){
	$movid = $_GET['cid'];
	$sql = "SELECT * FROM movies WHERE id = '$movid'";
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
}
?>

<div class="content_left">
	<div class="coming">

<table width="580" border="1" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="590" height="10"></td>
    </tr>
    <tr>
      <td><table width="450" border="1" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="133" height="40"><strong class="title"><?php echo (isset($data) && $data)?$data['title']:'All Movies ';?></strong></td>
            <td width="379">(click cover images to read deails)</td>
            <td width="138" align="right">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="center"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <?php 
			$sql = "SELECT * FROM movies WHERE status = '1'  ORDER BY id DESC";
			$query = mysql_query($sql);
			$count = mysql_num_rows($query);
			$counter = 0;
			
			if($count>=1){
				$sn=1;
				while($row=mysql_fetch_array($query)) {  
				$counter++;
				?>
                  <td width="402" align="center"><a href="movie_detail.php?url=<?php echo $row['url']; ?>"> <img src="admin/images/contents/<?php echo $row['image']; ?>" height="150" border='0'></a><br />
             <?php 
				echo $row['title'];
						
				$sn++; 
				
				if($counter==3){
				$counter=0;
				echo "</tr><tr> ";
				
				} 
				}
			}
			else{
				echo "No record found";
			}
			?>
            
           </td>
                </tr>
                <tr>
                  <td colspan="7">&nbsp;</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td colspan="3"></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>


	</div>
</div>


<div class="content_right">
<?php include 'includes/side.php'; ?>
</div>

<?php
	include 'includes/footer.php';
?>