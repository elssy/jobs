
			<?php
			/*
			*
			*
			* Set the Database Parameters Here
			* I decided to use a simple (Non OOP Approach)
			*
			*
			*/

			$host        = "localhost";
			$user        = "dotskeny_jobs";
			$password    = "dotskenya123#*";

			$database    = "dotskeny_jobs";

			/*
			*
			* Connect to Server
			* 
			*/

			$conn        = @mysql_connect($host,$user,$password);


			if(!$conn)
			{
				mysql_error();
			}

			/*
			*
			* Select Database
			* 
			*/

			$selectDb    = mysql_select_db($database);

			if(!$selectDb)
			{
				mysql_error();
			}


			?>
			