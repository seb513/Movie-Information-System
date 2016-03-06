<?php
include "includes/header.php";

if(isset($_POST['send'])){
	
	$name = $_POST['name'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	
	if(!empty($name) && !empty($address)){
		
		$sql = "INSERT INTO contact(name, address, email, message) VALUES('$name', '$address', '$email', '$message')";
		$query = mysql_query($sql);
		if($query){
			$msg = "Successfully ordered!.";
		} else {
			$msg = "Error Ordering, please try again!. Mysql Error : ".mysql_error();
		}
		
	} else {
		$msg = "name and address can't be blank.";
	}
}
?>

<div class="content_left"> 
  <div class="message">
  	<h2> Feedback </h2>
  <?php
  echo isset($msg)?$msg: '';
  
	  
  ?>
  	<form id="form1" name="form1" method="post" action="">
          <table width="658" height="585" border="0">
            <tr>
              <td colspan="2">Fill up the form .</td>
            </tr>
            <tr>
              <td width="112">Name:</td>
              <td width="664"><label for="name"></label>
                <input type="text" name="name" id="name" /></td>
            </tr>
            <tr>
              <td>Address:</td>
              <td><label for="address"></label>
                <input type="text" name="address" id="address" /></td>
            </tr>
         
            <tr>
              <td>Email:</td>
              <td><label for="email"></label>
                <input type="text" name="email" id="email" /></td>
            </tr>
            <tr>
              <td>Message:</td>
              <td><label for="message"></label>
                <textarea name="message" id="message" cols="45" rows="5"></textarea></td>
            </tr>
            <tr>
              <td colspan="2"><input type="submit" name="send" id="send" value="Submit" /></td>
            </tr>
          </table>
        </form>
  </div>
  </div>
 
 <div class="content_right">
 <?php include ("includes/side.php"); ?>
</div>
 
  
<?php
include "includes/footer.php"; 
?>
