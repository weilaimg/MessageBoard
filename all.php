<strong><strong><!doctype html>  
<html lang="en">  
 <head>  
  <meta charset="utf-8">  
  <title>Document</title>  
  <style type="text/css">  
        	* {margin:0;padding:0}
		body {font-family:arial,sans-serif;font-size:100%;
			margin:3em 10em;background-color:#666;color: #fff;}
		ul li {display: inline-block;*display:inline;zoom:1;
			margin:1em 1em 3em;font-size:16px;}
	</style>  
 </head>  
 <body>  
 <h1>留言板</h1>
                    <ul>  
                    	<?php
						
						$con = mysql_connect ("localhost","root","123321123");
						if(!$con)
						{
							die('Could not connect :'.mysql_error);
						}
						mysql_select_db("liuyan",$con);
						
						$result = mysql_query ("SELECT * FROM Liuyan ORDER BY time1 DESC");
						for ($i = 1; $i <= 9;$i++ )
						{
							
							echo "<li>";
							echo '<div class = "box">';
							while($row = mysql_fetch_array($result))
							{
								 echo '<div class="send">'.$row['name'].'</div>';  
                                echo '<div class="text">'.$row['test'].'</div>';  
                                echo '<div class="from">'.$row['time1'].'</div>' ;
								echo '&nbsp';
							}
							echo "</div>";
							echo "</li>";
						}
						?>
                    </ul>
               <a href="index.php"><input  class="box_bottom" type="button" value="返回留言界面"></input></a> 
   
 </body>  
</html>  
</strong></strong>  