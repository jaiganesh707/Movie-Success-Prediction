<?php include "common/header.php";?>
<?php include "common/dbc.php";?>
<link href="js/jquery.lineProgressbar.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/jquery.lineProgressbar.js"></script>
<?php
			
			 $mid=$_REQUEST['mid'];
			 $select_query = mysql_query("SELECT *FROM movies where mid='$mid'");
			 $row = mysql_fetch_array($select_query);
			 
		
				
				$x=$row['rating']*20;
				$y=$row['movie_rate']*20;
				$z=$row['result']*20;
			 
?>
     <div class="content">
	   	  
      	       <div class="movie_top">
			   
      	         <div class="col-md-20 movie_box">
				  
                        <!-- Movie variant with time -->
                            <div style="width:400px;background:white;float:left;padding:20px;">
							
                               
                                  <img src="posters/<?php echo $row['poster']?>" width="300" height="300">
                                </div>
								<div  style="width:600px;background:white;float:left;padding:20px;">
                                    		 <h2>History Rating</h2>
<div id="jq"></div>

<h2>Review Rating</h2>
<div id="html"></div>

<h2>Success Rating</h2>
<div id="css"></div>
		 <script>
 var x='<?php echo $x; ?>';
 var y='<?php echo $y; ?>';
 var z='<?php echo $z; ?>';

$('#jq').LineProgressbar({
percentage:x,
radius: '3px',
height: '20px',
fillBackgroundColor: 'green'
});
$('#html').LineProgressbar({
percentage:y,
radius: '3px',
height: '20px',
fillBackgroundColor: 'blue'
});
$('#css').LineProgressbar({
percentage:z,
radius: '3px',
height: '20px',
fillBackgroundColor: 'orange'
});
</script>
                                 </div>
                                <div class="clearfix"> </div>
                            </div>
                         <!-- Movie variant with time -->
						
  
                            
                            
                            
                              
                              <div class="clearfix"> </div>                         
                         <!-- Movie variant with time -->
                      </div>

                      <div class="col-md-3">
                      	
                      	  
						    
		               </div> 
                      <div class="clearfix"> </div>
                  </div>
                
	
	
		


