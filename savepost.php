<?php

	
	if($_POST['password'] != 'hemlis') {
		print("<script type='text/javascript'>alert('Wrong password, try again!'); window.location.href= 'createpost.html';</script>");
	}
	else {
		
		$link = @mysqli_connect('localhost', 'studentweb', 'turtlelove', 'test');
		
		$author = mysqli_real_escape_string($link, $_POST['author']);
		$heading = mysqli_real_escape_string($link, $_POST['heading']);
		$entry = mysqli_real_escape_string($link, $_POST['entry']);
		
		$query = "INSERT INTO blog VALUES (NULL, '$author', '$heading', '$entry')";
		
		
		$result = @mysqli_query($link, $query);
		if(! $result)
		{
			$errorstring = 'could not save post!' . mysqli_error($result);
			print("<script type='text/javascript'>alert('$errorstring');</script>");
			die();
		}
		
		
		print("<script type='text/javascript'>alert('Post saved!'); window.location.href= 'blog.php';</script>");
		
	}	
?>