<?php
	session_start();
	
	if(isset($_SESSION['MovieinfoAdmin'])){
		header("location:index.php");
		}
		
	include 'includes/dbconfig.php';
	
	if(isset($_POST['login'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$sql="select * from users where username='$username' and password ='$password' and status='1'";
		$query=mysql_query($sql);
		$data=mysql_fetch_array($query);
		
		if($data){
			if(isset($_POST['check'])){
				$time= time()+60*60;
				setcookie("MovieinfoCookie",$username,$time);
				}
				
			$_SESSION['MovieinfoAdmin']= $username;	
			header("location:index.php");
			}else{
				$error="Invalid username or password";
				}
		}
		
include 'includes/header.php';			
?>

<div id="container">
  <div class="shell"> 
    <div class="small-nav"> <a href="#">Dashboard</a> <span>&gt;</span> 
    Login </div>
    <?php include "includes/message.php"; ?>
    <div id="main">
      <div class="cl">&nbsp;</div>
      
      <div id="content"> 
        <div class="box"> 
          <div class="box-head">
            <h2>Admin Login</h2>
          </div>
          
          <form action="" method="post">
            
            <div class="form">
              <label>Username</label>
              <input name="username" type="text" class="field size1" id="username" />
           
              <label>Password</label>
              <input name="password" type="password" class="field size1" id="password" />
            
              <p>
                <label>
                <input name="chk" type="checkbox" id="chk"/>
                Remember Me.
                <label/>
              </p>
              
            </div>
           
            <div class="buttons">
              <input name="login" type="submit" class="button" id="login" value="Get login!" />
            </div>
          </form>
        </div>
  
        
      </div>
      
      
      
      <div class="cl">&nbsp;</div>
    </div>
  </div>
</div>

<?php
include "includes/footer.php";
?>