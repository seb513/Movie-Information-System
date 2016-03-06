<div class="box"> 
  <div class="box-head">
    <h2>Create/Edit User</h2>
  </div>
  
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
     <div class="form">

        <label>Username</label>
        <input name="username" type="text" class="field size1" id="username" value="<?php echo isset($editData)?$editData['username']:""; ?>" /><br/>

        <label>Password</label>
        <input name="password" type="password" class="field size1" id="password" value="<?php echo isset($editData)?$editData['password']:""; ?>" /><br/>

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
    <input name="save" type="submit" class="button" id="save" value="Save !" />
    <input name="id" type="hidden" value="<?php echo $id; ?>" />
    <?php
	} else {
	?>
      <input name="create" type="submit" class="button" id="create" value="Create !" />
      <?php
	}
	  ?>
    </div>
  </form>
</div>
