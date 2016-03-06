<div class="box"> 
  <div class="box-head">
    <h2>Create/Edit Content</h2>
  </div>
  
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

    <div class="form">
      <p class="inline-field">
        <label>Category</label>
        <select name="cid" class="field size4" id="cat_id">
          <?php
		$sql = "SELECT * FROM category";
		$query = mysql_query($sql);
		while($row = mysql_fetch_array($query)){
			$selected = '';
			if(isset($editdata)) {
				$selected = $editdata['cat_id'] == $row['id']?'selected="selected"':'';
			}
		?>
          <option value="<?php echo $row['id']; ?>" <?php echo $selected?> ><?php echo $row['title']; ?></option>
          <?php
		}
			?>
        </select>
      </p>
      
        <label>Title</label>
        <input name="title" type="text" class="field size1" id="title" value="<?php echo isset($editData)?$editData['title']:""; ?>" />
        <label>URL</label>
        <input name="url" type="text" class="field size1" id="url" value="<?php echo isset($editData)?$editData['url']:""; ?>" />
 
       <p> <span class="req">choose an image</span>
        <label>Image</label>
        <input type="file" name="image" id="image" class="field size1"  />
        <?php
		if(isset($editData)){
		?>
			 <?php
            if(file_exists($path.$editData['image']) && !empty($editData['image'])){
            ?>
            <img src="<?php echo $path.$editData['image'];?>" width="100" />
            <?php 
            } else 
                echo "Image not found.";
            ?>
            <input type="hidden" name="oldImage" value="<?php echo $editData['image']; ?>" />
        <?php
		}
		?>
      </p>

        <label>Detail</label>
        <textarea name="detail" cols="30" rows="10" class="field size1" id="detail"><?php echo isset($editData)?$editData['detail']:""; ?></textarea>

      <p class="inline-field">
        <label>Status</label>
        <select name="status" class="field size3" id="status">
          <?php
		$active = 'selected="selected"';
		$inactive = '';
		if(isset($editData)){
			if($editData['status'] == '0'){
				$active = '';
				$inactive = 'selected="selected"';
			}
		}
		?>
          <option value="1" <?php echo $active; ?>>Active</option>
          <option value="0" <?php echo $inactive; ?>>In-active</option>
        </select>
      </p>
    </div>

    <div class="buttons">
      <?php
	if(isset($editData)){
	?>
      <input name="save" type="submit" class="button" id="save" value="Save " />
      <input name="id" type="hidden" value="<?php echo $id; ?>" />
      <?php
	} else {
	?>
      <input name="create" type="submit" class="button" id="create" value="Create" />
      <?php
	}
	  ?>
    </div>

  </form>
</div>
