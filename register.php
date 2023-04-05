<?php include "common/head.php"; ?>
<?php include "common/dbc.php"; ?>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
	      <div class="content">
      	     <div class="register">
		  	  <form name="register" method="post" action="#" enctype="multipart/form-data"> 
				 <div class="register-top-grid">
					<h3>Personal Information</h3>
					 <div>
						<span>Name<label>*</label></span>
						<input type="text" name="name" required > 
					 </div>
					 <div>
						<span>Email Address<label>*</label></span>
						<input type="text" name="email" required > 
					 </div>
					 <div>
						 <span>Mobile No<label>*</label></span>
						 <input type="text" name="mobile" required > 
					 </div>
					<div>
						 <span>Upload Photo<label>*</label></span>
						 <input type="file" name="photo" required > 
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"></label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>Login Information</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input type="text" name="password" required>
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="text" name="cpassword" required>
							 </div>
							 <div class="clearfix"> </div>
					 </div>
				
				<div class="clearfix"> </div>
				<div class="register-but">
				
					   <input type="submit" name="s1" value="submit">
					   <div class="clearfix"> </div>
				   </form>
				   <?php
	
	if(isset($_POST['s1']))
	{
		extract($_POST);
		                $photo=$_FILES['photo']['name'];     
		
						$source=$_FILES['photo']['tmp_name'];
						
						$destination="images/".$photo;
		
		$insert=mysql_query("insert into user(name,email,mobile,photo,password) values('$name','$email','$mobile','$photo','$password')")	or die(mysql_error());
		
		if($insert)
		{
			$move=move_uploaded_file($source,$destination);
			echo "success";
		}
		else
		{
			echo "failure";
		}
		
	}

	?>
				</div>
		   </div>
           </div>
    </div>
</div><?php include "common/footer.php"; ?>