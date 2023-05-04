<?php
	$connectionString = ("postgresql://uprqn1rwydlw9kvfdult:ilAzQNpViBzElprlNi12m98qYXBnSh@bichfrlbt6aeeyglyhng-postgresql.services.clever-cloud.com:5432/bichfrlbt6aeeyglyhng");
	$conn = pg_connect($connectionString) or die("Could not connect to database");

	if(!$conn)
	{
		die("Could not connect to database");
	}
?>