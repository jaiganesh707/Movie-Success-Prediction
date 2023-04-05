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
							  $history=$row['movie_rate'];
							  $result4 = mysql_query("SELECT * FROM cmts where mid='$mid'");
						  
						 
							   while($row_mov = mysql_fetch_array($result4))
                             {
								
								$all_rate[]=$row_mov['rating'];
				
							 }
							
						$total=ceil(array_sum($all_rate)/count($all_rate));
						$final=$total+$history;
						$result=$final/2;
						  $update=mysql_query("update movies set rating='$total',result='$result' where mid='$mid'");
	                     ?>
      	         <div class="col-md-9 movie_box">
                        <div class="grid images_3_of_2">
                        	<div class="movie_image">
                                <span id="total" class="movie_rating"><?php echo $total; ?></span>
								<a href="graph.php?mid=<?php echo $row['mid'] ?>">
                                <img src="posters/<?php echo $row['poster'];?>" width="300" height="300" class="img-responsive" alt=""/>
								</a>
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
						
						
                    <center>    <div class="desc1 span_3_of_2">
                        	<p class="movie_option"><h1><b><i><?php echo $row['movie_name'];?></b></i></h1></p>
							
                        	
                        	
                        	<p class="movie_option"><strong>Release date: </strong><?php echo $row['release_date'];?></p>
							<p class="movie_option"><strong>Hero: </strong><?php echo $row['hero'];?></p>
							<p class="movie_option"><strong>Heroine: </strong><?php echo $row['heroine'];?></p>
							<p class="movie_option"><strong>Comedian: </strong><?php echo $row['comedian'];?></p>
                        	<p class="movie_option"><strong>Director: </strong><?php echo $row['director'];?></p>
							<p class="movie_option"><strong>Producer: </strong><?php echo $row['producer'];?></p>
                        	<p class="movie_option"><strong>Supporting Actor: </strong><?php echo $row['supporting_actor'];?>  </p>
							<p class="movie_option"><strong>Music Director: </strong><?php echo $row['music_director'];?>  </p>
							<p class="movie_option"><strong>Editor: </strong><?php echo $row['editor'];?>  </p>
							<p class="movie_option"><strong>Cinematographer: </strong><?php echo $row['cinematographer'];?>  </p>
							<p class="movie_option"><strong>Choreagrapher: </strong><?php echo $row['choreagrapher'];?>  </p>
                            <p class="movie_option"><strong>Certification: </strong><?php echo $row['certification'];?></p> 
							 <p class="movie_option"><strong>Description:</strong><?php echo $row['description'];?></p>
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
					
                         </div></center>
					
					
						 
						 
						
                        <div class="clearfix"> </div>
						 <br><br><br><br>
					<h3> <b><i>CAST RATE - <?php echo $history; ?></i></b></h3>
						 <h3><b><i>REVIEW RATE- <?php echo $total; ?></i></b></h3>
						<h3> <b><i>SUCCESS RATE - <?php echo $result; ?></i></b></h3>
						<div class="down_btn"><a class="btn1" href="video.php?mid=<?php echo $row['mid'] ?>">
							  <span> </span>View Trailer</a></div>
                        &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 									
							  <div class="clearfix"> </div>
		               
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
							
						$result6 = mysql_query("SELECT * FROM cmts where mid='$mid' AND uid='$uid'");
						$c1=mysql_num_rows($result6);
						
						if($c1==0)
						{	
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
						
						else
						{
							echo "<script>alert('You Already Comment for this Movie !');</script>";
						}
	                        }
							
		                  ?>
						  
						  
		                <div class="single">
						<?php
		
		 $result = mysql_query("SELECT * FROM cmts where mid='$mid'");
						$m=mysql_num_rows($result);
		?>
		                <h1><?php echo $m;?> Comments</h1>
						  <ul class="single_list">
		                <?php
					
					        
					
					          while($row = mysql_fetch_array($result))
                             {
								 $id=$row['uid'];
								 $result2 = mysql_query("SELECT * FROM user where uid='$id'");
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