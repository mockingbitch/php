<div id="fh5co-blog-popular">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-12 col-md-offset-0 text-center fh5co-heading">
				<h2><span>Popular Post</span></h2>
			</div>
		</div>
		<div class="row">
			<?php
			$productfeatured = $product->getproduct_featured();
			if ($productfeatured) {
				while ($result = $productfeatured->fetch_assoc()) {
			?>
					<div class="col-md-3">
						<div class="fh5co-blog animate-box">
							<a href="details.php?proid=<?php echo $result['productid'] ?>"><img class="img-responsive" src="admin/uploads/<?php echo $result['img']; ?>" alt=""></a>
							<div class="blog-text">
								<h3><a href=""><?php echo $result['productName']; ?></a></h3>
							</div>
						</div>
					</div>
			<?php }
			} ?>

		</div>
	</div>
</div>

<div id="fh5co-content">
	<div class="container">
		<div class="row">