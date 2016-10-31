<html>
<head><title>Create database table "blog"</title></head>
<body>
<?php
 $link = @mysqli_connect('localhost',
 'johra346', 'torvboll45', 'test');
 if (! $link) {
 die('Could not connect: ' . mysql_error());
 }
 echo 'Connected successfully.';
 
 $result = @mysqli_query( $link, "CREATE TABLE blog (
 entry_date TIMESTAMP,
 entry_author VARCHAR(100),
 entry_heading VARCHAR(100),
 entry_text TEXT)" );
 if(! $result) {
 die('Could not create table: ' . mysql_error());
 }
 echo 'Table created.';
 mysql_close($link);
?>
</body>
</html> 