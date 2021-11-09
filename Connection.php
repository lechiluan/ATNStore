<?php
	$conn = pg_connect("postgres://fsttwdojipdhgw:0b468fb310acc2bfbe392e6dcc7068fc2c90dddc2c755b42a780d9241cd34a3c@ec2-54-167-201-170.compute-1.amazonaws.com:5432/d47ede5l9i24s8");
	if(!$conn)
	{
		die("Could not connect to database");
	}
?>