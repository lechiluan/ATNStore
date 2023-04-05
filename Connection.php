<?php
	$connectionString = ("host=localhost port=5432 user=postgres password=19012001 dbname=atnstore");
	$conn = pg_connect($connectionString) or die("Could not connect to database");

	if(!$conn)
	{
		die("Could not connect to database");
	}
?>