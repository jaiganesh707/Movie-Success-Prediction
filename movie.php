
<!DOCTYPE HTML>
<html>
<style>
a {
    text-decoration: none;
    display: inline-block;
    padding: 8px 16px;
}

a:hover {
    background-color: #FFFFD4;
    color: black;
}

.previous {
    background-color: #FF5555;
    color: black;
}
</style>
<?php include "common/header.php"; ?>
<?php include "common/dbc.php";?>
	      <div class="content">
	   	   <h2 class="m_3">Now in the Movie</h1>
		   
      	       <div class="movie_top">
			   
      	         <div class="col-md-12 movie_box">
							<?php
					
					$result = mysql_query("SELECT * FROM movies");
					 
						 while($row = mysql_fetch_array($result))
                             {
								 
					?>
                        <!-- Movie variant with time -->
                            <div class="movie movie-test movie-test-dark movie-test-left">
                                <div class="movie__images">
                                    <a href="single.php?mid=<?php echo $row['mid'] ?>" class="movie-beta__link">
                                        <img alt="" style="width:200px!important;height:200px!important;" src="posters/<?php echo $row['poster'];?>" class="img-responsive" alt=""/>
                                    </a>
                                </div>
								<div class="movie__info">
                                    <a href="" class="movie__title"><h3><i><?php echo $row['movie_name'];?> </h3></i> </a>
                                   
									
                                    <ul class="list_6">
									<li>Release Date : &nbsp;&nbsp;<p><?php echo $row['release_date'];?></p></li>
						    			<li>Hero : &nbsp;&nbsp;<p><?php echo $row['hero'];?></p></li>
						    			<li>Heroine : &nbsp;&nbsp;<p><?php echo $row['heroine'];?></p></li>
										<li>Comedian : &nbsp;&nbsp;<p><?php echo $row['comedian'];?></p></li>
										
										<li>Director : &nbsp;&nbsp;<p><?php echo $row['director'];?></p></li>
										
										<?php
										 $cid=$_REQUEST['cid'];
										$qry=mysql_query("select * from cmts where mid=mid");
					                   
									   $row1=mysql_fetch_array($qry);
									   
									   ?>
						    			
						    			<div class="clearfix"> </div>
						    		</ul>
                                 </div>
                                <div class="clearfix"> </div>
                            </div>
                         <!-- Movie variant with time -->
							 <?php } ?>
								
                       
						
                            
                            
                            
                             
                              
                      </div>
                       
                      <div class="clearfix"> </div>
                  </div>
               <a href="aindex.php" class="previous">&laquo; Previous</a>   
		  </div>
</div>
</div>
</html>
<?php include "common/footer.php"; ?>