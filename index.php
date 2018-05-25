<?php
	require_once "includes/db.php";

    $table = "wines";
    $query = "SELECT * FROM {$table} ORDER BY `price`;";
    $result = mysqli_query($connection, $query);
    
    if (!result) {
        die("Database query failed.");
    }

    require_once "includes/header.php"

?>


	<div class="blue-space"></div>
	<div class="main flexbox">
		<a href="recipe.html" class="link">
			<div class="featured" style="background-image: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.6)), url( images/wine_image-11.jpg);">

				<!--<div class="hero">
					<h4>Featured Recipe</h4>
					<h1>Shrimp Fra Diavolo</h1>
					<h2>With Lumaca Rigata Pasta</h2>
				</div>-->
			</div>
		</a>
		<div class="blue-space">
		</div>
		<div class="white-bar">
			<h3>Top Wines</h3>
		</div>
		<div class="section flexbox">
			

			<?php 
				while ($row = mysqli_fetch_assoc($result)) {
			?>
				<div class="card">
					<a href="wine.php?id=<?php echo $row['id'] ?>">
						<div>
							<figure>
								<img src="images/wine.jpg" alt="<?php echo $row['name'] ?>">
								<figcaption>
									<?php echo $row['name'] ?>
									<p>
										<?php echo $row['year'] ?>
									</p>
									<p>
										<?php echo $row['score'] ?>
									</p>
									<p>
										<?php echo $row['price'] ?>
									</p>
								</figcaption>
							</figure>
						</div>
					</a>
				</div>
			<?php
				}
			?>

			

		</div>
	</div>		



	




<?php
	require_once "includes/footer.php";
        mysqli_close($connection);
?>
