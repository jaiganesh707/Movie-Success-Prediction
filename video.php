<?php include "common/header.php"; ?>
<?php include "common/dbc.php";?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	   <div class="content">
	   
      	   <div class="movie_top">
		   <?php
				$uid=$_SESSION['uid'];
                                $mid=$_REQUEST['mid'];
                             
							 $qry=mysql_query("select * from movies where mid='$mid'");
	
	                          $row=mysql_fetch_array($qry);
							  
							  $result4 = mysql_query("SELECT * FROM cmts where mid='$mid'");
						  
						  
							   while($row_mov = mysql_fetch_array($result4))
                             {
								
								$all_rate[]=$row_mov['rating'];
				
							 }
							
							  $total=ceil(array_sum($all_rate)/count($all_rate));
						  
	                     ?>
      	         <div class="col-md-20 movie_box">
                        <div class="grid images_3_of_2">
                        	<div class="movie_image">
                                <span id="total" class="movie_rating"><?php echo $total; ?></span>
                                <iframe width="400" height="400" src="https://www.youtube.com/embed/<?php echo $row['video']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> 
                            </div>
                            <div class="movie_rate">
                            	<div class="rating_desc"><p>Your Vote :</p></div>
                            <form name="form3" method="post" action="" class="sky-form">	
							     <fieldset>					
								   <section>
								     <div class="rating">
										<input type="radio" name="rating" value="5" id="stars-rating-5">
										<label for="stars-rating-5"><i class="icon-star"></i></label>
										<input type="radio" name="rating" value="4" id="stars-rating-4">
										<label for="stars-rating-4"><i class="icon-star"></i></label>
										<input type="radio" name="rating" value="3" id="stars-rating-3">
										<label for="stars-rating-3"><i class="icon-star"></i></label>
										<input type="radio" name="rating" value="2" id="stars-rating-2">
										<label for="stars-rating-2"><i class="icon-star"></i></label>
										<input type="radio" name="rating" value="1" id="stars-rating-1">
										<label for="stars-rating-1"><i class="icon-star"></i></label>
									 </div>
								  </section>
							    </fieldset>
						  	   
						  	   <div class="clearfix"> </div>
                            </div>
                        </div>
						
						
                        <div class="desc1 span_3_of_2">
                        	<p class="movie_option"><strong>Movie Name: </strong><?php echo $row['movie_name'];?></p>
							
                        	
                        	
                        	<p class="movie_option"><strong>Release date: </strong><?php echo $row['release_date'];?></p>
                        	<p class="movie_option"><strong>Director: </strong><?php echo $row['diector'];?></p>
                        	<p class="movie_option"><strong>Actors: </strong><?php echo $row['actors'];?>  </p>
                            <p class="movie_option"><strong>Certification: </strong><?php echo $row['certification'];?></p> 
                            <?php
					for($i=1;$i<=$total;$i++)
					{
							if($i<=$total)
							{
								echo '<img src="posters/red.png" />';
							}
							else
							{
							echo '<img src="posters/black.png" />';
							}
					}?>
                         </div>
                        <div class="clearfix"> </div>
                        <p class="m_4"><strong>Description:</strong><?php echo $row['description'];?></p>
							  
		              
						<div class="text">
						<textarea rows="4" cols="50" name="message" placeholder="Your Comments" required></textarea><br>
						 </div>
						 <div class="form-submit1">
						 <input name="s1" type="submit" id="submit" value="Submit Your Message"><br>
						 </div>
					   </form>
					   <?php
							if(isset($_POST['s1']))
	                       {
		                    extract($_POST);
							
							$rating=$_POST['rating'];
		                   
						   $insert=mysql_query("insert into cmts(mid,uid,rating,message) 
						   values('$mid','$uid','$rating','$message')")or die(mysql_error());
                           if($insert)
		                     {
			
			                   echo "success";
		                      }
		                       else
                              {
			                     echo "failure";
		                      }
		
	                        }
							
		                  ?>
						  
						  <?php
		
		 $result = mysql_query("SELECT * FROM cmts where mid='$mid'");
						$n=mysql_num_rows($qry);
		?>
		                <div class="single">
		                <h1><?php echo $n;?> Comments</h1>
						  <ul class="single_list">
		                <?php
					
					        
					
					          while($row = mysql_fetch_array($result))
                             {
								 $id=$row['uid'];
								 $result2 = mysql_query("SELECT * FROM user where uid='$uid'");
								$row2 = mysql_fetch_array($result2);
								$n=$row['rating'];
								$all_rate[]=$row['rating'];
					?>
					<li style="background:white;margin-top:10px;padding:10px;width:600px;">
					        <div class="preview"><a href="#"><img src="images/<?php echo $row2['photo']; ?>" width="30" height="40"> </a></div>
					            <div class="data">
					                <div class="title"><?php echo $row2['name']; ?>  &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 									
									<?php
					for($i=1;$i<=5;$i++)
					{
							if($i<=$n)
							{
								echo '<img src="posters/red.png" />';
							}
							else
							{
							echo '<img src="posters/black.png" />';
							}
					}?>
					
					</div>
					                <p><?php echo $row['message']; ?></p>
					            </div>
					            <div class="clearfix"></div>
					        </li>
							 <?php 
							 } 
							 
							 						 
							 ?> 
									
					
					
					
					
							 
					 
					 
		
                  </div>
           </div>
<?php include "common/footer.php"; ?>