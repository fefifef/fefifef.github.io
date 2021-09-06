<html>
	<head>
		<title>Hallo PHP!</title>
	</head>

	<body>
		<h1>Hallo Welt!</h1>
		
		<?php
			echo "Hallo <strong>Welt</strong>, es ist nun ";
			echo date("d.m.Y H:i:s");
			echo "Uhr!";


			$farbe="rot";
			echo "<p> Das Auto ist $farbe und schnell!</p>";

			echo '<p> Das Auto ist $farbe und schnell!</p>';

			echo "Ich habe ein " . $farbe . "es Auto <br/>";

			echo "Ich habe ein {$farbe}es Auto <br/>";
		?>
		
		<p> 
			Das War's!
		</p>
		
	</body>
</html>