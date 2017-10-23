<html>
	<head>
	<meta name="viewport" content="width=device-width" />
	<title>Robot Control</title>
	</head>
	<body>
	<CENTER><H2>Live Video</H2></CENTER>
	<?php
	echo "<CENTER><img src= \"http://";
	echo $_SERVER['SERVER_ADDR'];
	echo ":8081/?action=stream\"/>";
	//This is what I was trying to implement
	//<CENTER><img src= "http://192.168.0.107:8081/?action=stream"/></CENTER>
	?>

        <CENTER><H2>Robot Control</H2></CENTER>
        <form method="get" action="gpio.php">
		<CENTER>
		<HR>
		<input type="submit" value="Forward" name="fwd" style="height:50px; width:100px">
		<BR><BR>
                <input type="submit" value="Left" name="left" style="height:50px; width:100px">
		&nbsp;
                <input type="submit" value="Stop" name="stop" style="height:50px; width:100px">
		&nbsp;
                <input type="submit" value="Right" name="right" style="height:50px; width:100px">
		<BR><BR>
                <input type="submit" value="Backward" name="bwd" style="height:50px; width:100px">
		</CENTER>
		<HR>
	</form>
	<?php
	shell_exec("gpio mode 0 out");
	shell_exec("gpio mode 1 out");
	shell_exec("gpio mode 2 out");
	shell_exec("gpio mode 3 out");
	if(isset($_GET['fwd'])){
		shell_exec("gpio write 0 1");
		shell_exec("gpio write 1 0");
		shell_exec("gpio write 2 1");
		shell_exec("gpio write 3 0");
        }
        else if(isset($_GET['left'])){
		shell_exec("gpio write 0 0");
		shell_exec("gpio write 1 1");
		shell_exec("gpio write 2 1");
		shell_exec("gpio write 3 0");
        }
        else if(isset($_GET['right'])){
		shell_exec("gpio write 0 1");
		shell_exec("gpio write 1 0");
		shell_exec("gpio write 2 0");
		shell_exec("gpio write 3 1");
        }
        else if(isset($_GET['stop'])){
		shell_exec("gpio write 0 0");
		shell_exec("gpio write 1 0");
		shell_exec("gpio write 2 0");
		shell_exec("gpio write 3 0");
        }
        else if(isset($_GET['bwd'])){
		shell_exec("gpio write 0 0");
		shell_exec("gpio write 1 1");
		shell_exec("gpio write 2 0");
		shell_exec("gpio write 3 1");
        }
       	?>
        </body>
</html>