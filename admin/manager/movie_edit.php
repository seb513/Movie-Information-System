<div class="box"> 
  <div class="box-head">
    <h2 class="left">Current <?php echo ucfirst($type); ?></h2>
  </div>
  
  <div class="table">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <?php
    if($count > 0){
	?>
      <tr>
        <th width="13">S.N.</th>
        <th>Cid</th>
        <th>Title</th>
        <th>URL</th>
        <th>Image</th>
        <th>Detail</th>
        <th>Status</th>
        <th width="110" class="ac">Content Control</th>
      </tr>
      <?php
	  $sn = 1;
	  while($row = mysql_fetch_array($query)){
	  ?>
      <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo getCatTitle($row['cid']);?></td>
        <td><?php echo $row['title'];?></td>
        <td><?php echo $row['url'];?></td>
        <td>
		<?php 
		if(file_exists($path.$row['image']) && !empty($row['image'])){
			?>
			<img src="<?php echo $path.$row['image']; ?>" width="90" />
            <?php
		} else {
			echo "No image found";
		}
		?>
        
        
        </td>
        <td><?php echo $row['detail'];?></td>
        <td><?php echo $row['status'];?></td>
        <td>
            <a href="?del=<?php echo $row['id']; ?>" class="ico del" onclick="return confirm('Are you sure to delete this item?')">Delete</a>
            <a href="?edit=<?php echo $row['id']; ?>" class="ico edit">Edit</a>
        </td>
      </tr>
      <?php
	  } //end of while loop
	} else {
	  ?>
      <tr>
        <td colspan="10">No Record.</td>
      </tr>
      <?php
	}
	  ?>
    </table>
    
  </div>

  
</div>

