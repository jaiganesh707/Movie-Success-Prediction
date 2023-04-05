<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
a {
    text-decoration: none;
    display: inline-block;
    padding: 8px 16px;
}

a:hover {
    background-color: #FF00FF;
    color: black;
}

.previous {
    background-color: #FF5555;
    color: black;
}
</style>
<?php include "common/header.php";?>
<?php include "common/dbc.php";?>
<?php ob_start();include "common/session.php";?>
<body>
<div class="content">	
<?php
					$uid=$_SESSION['uid'];
					$qry=mysql_query("select * from user where uid='$uid'");
					$row=mysql_fetch_array($qry);
					?>
				<center>	<h2>welcome <?php echo $row['name'];?></h2><br><br>
					
					<div class="clearfix"> </div>
					<table cellpadding="20" cellspacing="0">
						
						<tr>
							<th> <?php echo $row['name'];?>&nbsp;</th>
							<th><img src="images/<?php echo $row['photo'] ?>" width="120" />&nbsp;</th>
						</tr>
						
						<tr>
							<td>Name:&nbsp; </td>
							<td><?php echo $row['name']; ?></td>
						</tr>
						
						<tr>
							<td>Email:&nbsp;</td>
							<td><?php echo $row['email'];?></td>
						</tr>
						
						<tr>
							<td>Mobile:&nbsp;&nbsp;</td>
							<td><?php echo $row['mobile']; ?></td>
						</tr>
						</table></center>
						<div class="clearfix"> </div>
						<a href="aindex.php" class="previous">&laquo; Previous</a> 
					</div>

</body>
</html>
<?php include "common/footer.php";?>