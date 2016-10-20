<?php
   $sql_connection = mysql_connect("localhost", "root", "") or die(mysql_error());
   mysql_select_db("newsdb", $sql_connection);   
   $Newstable=mysql_query("SELECT * from  Newstable Order by NewsId DESC LIMIT 0,1");   
   $Newstable1=mysql_query("SELECT * from  Newstable Order by NewsId DESC LIMIT 1,8");
?>
<html>
	<head>
		<title>News</title>
         <meta charset="utf-8">
         <link rel="stylesheet" href="css/style.css" type="text/css">
		 <link rel="icon shortcut" href="image/logo.png">
         <script src="js/myscript.js" type="text/javascript">
         </script> 
	</head>
	<body>
		<div id="main">
			<header>
				<?php include('header.php');?>
			</header>
			<section>
				<div id="left">					
					<div id="lefttop">	
						<?php while($News=mysql_fetch_array($Newstable)) { ?>					
						<div class="newsdiv">				
							<img style="margin-left:20px; margin-top: 8px;" src="newsimage/<?php echo $News['image']; ?>" width="360" height="180">
						</div>
						<div class="newsdiv">
							<div style="width:370px;height:160px;margin: 10px;">
								<p>
									<b>
                              <?php echo $News['NewsHeading']; ?>
                           </b>
                        </p>
                        <p class="pmargin">
                           <?php
                              $a=$News['NewsDetails'];
                              echo substr($a,0,120);
                           ?>
                           <span>
                              <a href="details.php?id=<?php echo $News['NewsId']; ?>&name=Newstable&folder=newsimage"  style="text-decoration:none; color:#616D7E;" >...Details</a>
                           </span>
                        </p>
							</div>
						</div>
						<?php } ?>
					</div>
					<div id="leftbottom">
                  <?php $i=0; 
                  while($News1=mysql_fetch_array($Newstable1)){
                  ?>
                  <div class="newsdiv">
                     <div class="newshead">
                        <div class="newsimage">
                           <img class="imagemargin" src="newsimage/<?php echo $News1['image'];;?>" width="150" height="80"></img>
                        </div>
                        <div class="newsheading">
                           <p>
                              <b>
                                 <?php echo $News1['NewsHeading']; ?>
                              </b>
                           </p>
                        </div>
                     </div>
                     <div class="newsshort">
                        <p class="pmargin">
                           <?php
                              $a=$News1['NewsDetails'];
                              echo substr($a,0,120);
                           ?>
                           <span>
                              <a href="details.php?id=<?php echo $News1['NewsId']; ?>&name=Newstable&folder=newsimage"  style="text-decoration:none; color:#616D7E;" >...Details</a>
                           </span>
                        </p>
                     </div>
                  </div>
                  <?php $i++; } ?>
               </div>     					
				</div>
				<div id="right">
					<?php include('sider.php');?>
				</div>
			</section>
			<footer>
				<?php include('footer.php');?>
			</footer>
			<div style="clear:both;"></div>
		</div>
	</body>
</html>