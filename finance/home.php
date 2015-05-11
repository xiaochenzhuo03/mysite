<?php	
	session_start();
	$host = $_SERVER["HTTP_HOST"];
  $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
	if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] != true){
    header("Location: http://$host$path/index.php");
    exit;
	}
	$title = "Home";
	include("include/header.php");
?>
	
	
	
	
  </head>
	<body>
	
	<div align="center">
  		<h1>Xiaochen's Stock Exchange</h1>
  </div>
  <font size=4>
  <div align="right">
  	<?php 
  		echo "welcome, ".htmlspecialchars($_SESSION["user"])."&nbsp&nbsp&nbsp&nbsp<br>";
  		echo "<a href =\"trade/portfolio.php\"><u>my account</u></a>&nbsp|&nbsp";
  		echo "<a href=\"logout.php\"><u>log out</u></a> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
  	?>
  </div>
  </font>
  <br><br><br>
  <div class="col-sm-4">
  	<div align="center">
  	<h2>Search</h2>
  	</div>
  	<br>
  <div align="center">
  	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="price" method="POST">
			<br>
			<input type="text" name="stockID" size="30" placeholder=" Enter Symbol ">  
			<input class="btn btn-default" type="submit" value="Look up">
		</form>
	</div>
	 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	 You may search for the symbol
  		<a href="http://finance.yahoo.com" target="_blank"><u>here</u></a>.
	<div>
	<br>
	</div>
	<div align = "center">
<?
	require ("trade/price.php");
	if (isset($_POST["stockID"])){
	if ($stock["last_trade"] == 'N/A'){
			echo "No such stock!!";
	} else {
			echo "<table border=\"1\" style=\"width:100%\" align=\"center\">";
			echo "<tr><td>Symbol</td><td>Price</td><td>Name</td></tr>";
			echo "<tr><td>".$stock["symbol"]."</td>";
			echo "<td>".$stock["last_trade"]."</td>";
			echo "<td>".$stock["name"]."</td></tr>";
			echo "</table>";
			$n1 = 0;
			$n2 = 0;
			echo "<br>";
			echo "you own ".$n1." shares of this company.<br><br>";
			echo "you can buy ".$n2." shares of this company.<br>";
	}}
	?>
	</div>
	</div>
	<div class="col-sm-4" align="center">
		<h2>Trade Center</h2>
		<br>
		<div align="center">
			<p>We will charge <font color="green">0.099%</font> on all transaction.</p>
		<br>
		<a href="trade/buy.php" role="button" class="btn btn-primary" target="_blank" ><h4>Buy Stock</h4></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<a href= "trade/sell.php" role="button" class="btn btn-primary" target="_blank"><h4>Sell Stock</h4></a>
		</div>
	</div>
	
	<div class="col-sm-4" align="center">
		<h2>Rank</h2>
		<br><br>
		<?
			require ('trade/rank.php');
		?>
	</div>

<?
	include("include/footer.php");
?>
