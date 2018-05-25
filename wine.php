<?php
	require_once "includes/db.php";

    // Get the `id` from the URL parameter.
	  $id = isset($_GET['id']) ? $_GET['id'] : null;
	  // If no parameter is provided, redirect to the home page.
	  

	  


	  if (!$id) redirect_to('index.php');
	  else {
	    // Parameter is provided.
	    // Look for a matching ID in the database.
	    $query1 = 'SELECT * ';
	    $query1 .= 'FROM wines ';
	    $query1 .= "WHERE id = '{$id}' ";
	    $result1 = mysqli_query($connection, $query1);
	    if (!$result1) {
	      die('Database query failed.'.$query1);
	    }
	    

	  }

	  require_once "includes/header.php";
	  $details = mysqli_fetch_assoc($result1);

?>


	<div class="blue-space" id="green"></div>

	
	<?php 

	$id2 = $id;
	if ($id2 < 10) {
		$id2 = 0.$id;
	}

	?>



	<div class="main flexbox">
		<div class="featured-2" style="background-image: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.6)), url( images/wine_image-<?php echo $id2 ?>.jpg);">
			<div class="hero">
				
				<h1><?php echo $details['name'] ?></h1>
				<h2><?php echo $details['score'] ?></h2>
			</div>
		</div>
		<div class="blue-space">
		</div>

		<div class="section flexbox">
			
			<div class="desc">
				<p><?php echo $details['description'] ?> </p>
			</div>
			<div class="prices">
				<h3 class="stepname">prices</h3>
					
				<ul>
					<?php 
						while ($row = mysqli_fetch_assoc($result1)) {
					?>
						<li>
							<?php echo $row['price'] ?>
						</li>
					<?php
						}
					?>
				</ul>
				<img src="images/<?php echo $details['prices_img'] ?>.png" alt="prices">
				
			</div>



			<?php 
				$count = 1;
				while ($row = mysqli_fetch_assoc($result1)) {
			?>
				<div class="step">
					<img src="images/<?php echo $row['high_img'] ?>.jpg" alt="<?php echo $row['direction'] ?>">

					<div>
						
						<?php 
							if($count == 1) {
								echo "<h3>Prepare the prices:</h3>";
							}
							if($count == 6) {
								echo "<h3>Finish & serve your dish:</h3>";
							}
							echo $row['direction'];
							$count++;

						?>
						

					</div>
				</div>
			<?php
				}
			?>



			

		</div>

		<div class="white-bar">
			<h3>Related Recipes</h3>
		</div>
		<div class="section flexbox">
			<div class="card">
				<a href="recipe.html" class="card-link"><div>
					<figure><img src="images/0101_2PV1_Broccoli-Bucatini-Fettuccine_97230_SQ_hi_res.jpg" alt=""><figcaption>Broccoli Bucatini Fetuccine</figcaption></figure>
			</div></a></div>
			
			
			<div class="card">
				<a href="recipe.html" class="card-link"><div>
					<figure><img src="images/0108_2PM_Ginger-Steak-Stirfry_98208_201_SQ_hi_res.jpg" alt="">
					<figcaption>Ginger Steak Stir Fry</figcaption></figure>
			</div></a></div>

			
			<div class="card">
				<a href="recipe.html" class="card-link"><div>
					<figure>
					<img src="images/0108_2PV2_Stir-Fry-Egg_0195_SQ_hi_res.jpg" alt="">
					<figcaption>Stir Fry Egg</figcaption></figure>
			</div></a></div>
		</div>
	</div>

<?php
	require_once "includes/footer.php";
        mysqli_close($connection);
?>
