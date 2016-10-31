<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Labb 3</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
		<?php
		include('header.php');
		?>
		
		<?php
			$link = @mysqli_connect('localhost', 'studentweb', 'turtlelove', 'test');
			if(!link)
			{
				die('Could not connect to MySQL!');
			}
			
			if(empty($_GET['order']))
			{
				$order = 'DESC';
			}
			else
			{
				$order = strtoupper(mysqli_real_escape_string($link, $_GET['order']));
			}
			if(empty($_GET['limit']))
			{
				$limit = 10;
			}
			else
			{
				$limit = mysqli_real_escape_string($link, $_GET['limit']);
			}
			if(empty($_GET['author']))
			{
				$query = "SELECT * FROM blog ORDER BY entry_date $order LIMIT $limit";
			}
			else
			{
				$author = mysqli_real_escape_string($link, $_GET['author']);
				$author = str_replace("_", " ","$author");
				
				$query = "SELECT * FROM blog WHERE entry_author LIKE '%$author%' ORDER BY entry_date $order LIMIT $limit";
			}
			
			$result = @mysqli_query($link, $query);
			if(!$result)
			{
				//$errorstring = 'could not load posts!' . mysqli_error($result);
				print("<script type='text/javascript'>alert('could not load posts');</script>");
				die();
			}
			
			while ($row = mysqli_fetch_row($result)) { // $row blir FALSE när raderna är slut
				
				$printstring = '<div class="content"><h3 class="heading">' . $row[2] . '</h3><div class="metadata"><i class="author">' . $row[1] . '</i><i class="timestamp">' . $row[0] . '</i></div><p class="entry">' . $row[3] . '</p></div>';
				print($printstring);
				/*print($row[2]);
				print('</h3><div class="metadata"><i class="author">');
				print($row[1]);
				print('</i><i class="timestamp">');
				print($row[0]);
				print('</i></div><p class="entry">');
				print($row[3]);
				print('</p></div>');*/	
			}
			
			
			
			
		?>
	</body>
</html>