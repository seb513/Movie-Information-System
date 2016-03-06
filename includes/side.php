<?php
	$query= "select * from news";
	$run = mysql_query($query);
?>

<aside class="top-sidebar">
	<article>
    	<h2>Latest News</h2>
        	<?php
            	while($row=mysql_fetch_array($run) or die(mysql_error())){
					?>
                    <h3><?php echo $row['title']?></h3>
                    <p><?php echo $row['description']; ?>
                 	
                    <?php   
					}
			?></p>
        
    </article>
</aside>