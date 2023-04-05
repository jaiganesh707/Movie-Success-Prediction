<?php include "common/login.php";?>
<?php include "common/dbc.php"; ?>
	      <div class="content">
      	     <div class="register">
			   <div class="col-md-6 login-left">
			  	 <h3>New Customers</h3>
				 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
				 <a class="acount-btn" href="register.php">Create an Account</a>
			   </div>
			   <div class="col-md-6 login-right">
			  	<h3>Registered Customers</h3>
				<p>If you have an account with us, please log in.</p>
				<form name="form1" action="" method="post">
				  <div>
					<span>Email Address<label>*</label></span>
					<input type="text" name="email"> 
				  </div>
				  <div>
					<span>Password<label>*</label></span>
					<input type="text" name="password"> 
				  </div>
				  
				  <input type="submit" name="s1" value="Login">
			    </form>
				<?php
					if(isset($_POST['s1']))
					{
						extract($_POST);
						
						$qry=mysql_query("select * from user where email='$email' && password='$password'");
						
						$n=mysql_num_rows($qry);
						
						if($n==1)
						{
							$row=mysql_fetch_array($qry);
							
							session_start();
							$_SESSION['uid']=$row['uid'];
							
							header("location:profile.php");
						}
						else
						{
							echo "invalid login details";
						}
						
					}
					?>
			   </div>	
			   <div class="clearfix"> </div>
		     </div>
           </div>
    </div>
</div><?php include "common/footer.php"; ?>