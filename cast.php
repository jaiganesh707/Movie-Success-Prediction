
<?php include "common/header.php";?>
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

	      <div class="content">
	   	   <h2 class="m_3">Cast Information</h1>
      	       <div class="movie_top">
			   <?php 
                    $type=$_REQUEST['type'];
                     $sql=mysql_query("select * from cast where type='$type'");
                          while( $row=mysql_fetch_array($sql))
                     {
	                         ?>
      	         <div class="col-md-9 movie_box">
                        <!-- Movie variant with time -->
                            <div class="movie movie-test movie-test-dark movie-test-left">
                                <div class="movie__images">
                                  <img src="admin/cast/<?php echo $row['photo']?>" width="300" height="300" class="img-responsive"  />
                                </div>
								<div class="movie__info">
                                  <h2>  <p style="color:red;"><i><?php echo $row['name']?></p></i> </h2> 
                                    
									
                                  <ul class="list_6">
									     <li>No of flims:<?php echo $row['no_of_flims']?></li>
						    			 <li>Success:<?php echo $row['success']?></li>
										  <li>Average:<?php echo $row['average']?></li>
										  <li>Flop:<?php echo $row['flop']?></li>
										  
						    			<li>Rating : &nbsp;&nbsp;<p><?php echo $row['success_rate']?></p></li>
						    			<div class="clearfix"> </div>
						    		</ul>
                                 </div>
                                <div class="clearfix"> </div>
                            </div>
                         <!-- Movie variant with time -->
						
  
                            
                            
                            
                              
                              <div class="clearfix"> </div>                         
                         <!-- Movie variant with time -->
                      </div>
 <?php } ?>
                      <div class="col-md-3">
                      	<ul>
						<li> <a href="cast.php?type=Hero"><p style="color:#5500FF;"><h3><i>Hero</h3></i></p></a></li>
						<li> <a href="cast.php?type=Heroine" ><p style="color:#5500FF;"><h3><i>Heroine</h3></i></p></a></li>
						 <li> <a href="cast.php?type=Comedian" ><p style="color:#5500FF;"><h3><i>Comedian</h3></i></p></a></li>
						  <li><a href="cast.php?type=Supporting Actor" ><p style="color:#5500FF;"><h3><i>Supporting Actor</h3></i></p></a></li>
						  <li><a href="cast.php?type=Director" ><p style="color:#5500FF;"><h3><i>Director</h3></i></p></a></li>
						  <li><a href="cast.php?type=Producer" ><p style="color:#5500FF;"><h3><i>Producer</h3></i></p></a></li>
						  <li><a href="cast.php?type=Music Director" ><p style="color:#5500FF;"><h3><i>Music Director</h3></i></p></a></li>
						  <li><a href="cast.php?type=Editor" ><p style="color:#5500FF;"><h3><i>Editor</h3></i></p></a></li>
						  <li><a href="cast.php?type=Cinematographer" ><p style="color:#5500FF;"><h3><i>Cinematographer</h3></i></p></a></li>
						  <li><a href="cast.php?type=Choreagrapher" ><p style="color:#5500FF;"><h3><i>Choreagrapher</h3></i></p></a></li>
						  
						</ul>
                      	  
						    
		               </div> 
                      <div class="clearfix"> </div>
                  </div>
                 <a href="aindex.php" class="previous">&laquo; Previous</a> 
		  </div>
</div>
</div>   
<div class="container"> 
</html>
 <?php include "common/footer.php";?>