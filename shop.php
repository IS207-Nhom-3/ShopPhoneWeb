<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Shop</title>

	<!-- Site Icon -->
	<link rel="shortcut Icon" type="image/png" href="img/favicon.png">

	<!-- Font Awesome Icons -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="font/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="style/general.css">
	<link rel="stylesheet" href="style/shop.css">

	<script src="https://kit.fontawesome.com/c79c075354.js" crossorigin="anonymous"></script>

</head>
<body id="page-top">

	<?php include"./includes/header.php" ?>

	<section class="page-section">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 blog-form">
					<!-- <h2 class="blog-sidebar-title"><b>Cart</b></h2>
					<hr />
					<p class="blog-sidebar-text">No products in the cart...</p> -->
					<div>&nbsp;</div>
					<div>&nbsp;</div>

					<h2 class="blog-sidebar-title"><b>Categories</b></h2>
					<hr />

					<p class="blog-sidebar-list"><b><span class="list-icon"> &gt; </span> Mobile Accessory</b></p>
					<p class="blog-sidebar-list"><b><span class="list-icon"> &gt; </span> Electronic</b></p>
					<p class="blog-sidebar-list"><b><span class="list-icon"> &gt; </span> Smartphone</b></p>
					<p class="blog-sidebar-list"><b><span class="list-icon"> &gt; </span> Modern tech</b></p>
					<p class="frowmore">See all</p>
				

					<div>&nbsp;</div>
					<div>&nbsp;</div>

					<h2 class="blog-sidebar-title"><b>Brand</b></h2>
					<hr />
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="">
						<label class="form-check-label" for="defaultCheck1">
						  Apple
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="">
						<label class="form-check-label" for="defaultCheck1">
						  Samsung
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="">
						<label class="form-check-label" for="defaultCheck1">
						  Lenovo
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="">
						<label class="form-check-label" for="defaultCheck1">
						  Huawei
						</label>
					</div>
					  <p class="frowmore">See all</p>
					<!-- <button type="button" class="btn btn-dark btn-lg">Filter</button> -->

					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<h2 class="blog-sidebar-title"><b>Features</b></h2>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="">
						<label class="form-check-label" for="defaultCheck1">
						  Metallic
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="">
						<label class="form-check-label" for="defaultCheck1">
						  Plastic cover
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="">
						<label class="form-check-label" for="defaultCheck1">
						  Super power
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="">
						<label class="form-check-label" for="defaultCheck1">
						  Large memory
						</label>
					</div>
					<p class="frowmore">See all</p>
				</div>
				<!--END  <div class="col-lg-3 blog-form">-->

				<div class="col-lg-9" style="padding-left: 30px;">
					<div class="row">
						<div class="col">
							Showing all 9 results
						</div>

						<div class="col">
							<select class="form-control">
								<option value="">Default Sorting</option>
								<option value="popularity">Sorting by popularity</option>
								<option value="average">Sorting by average</option>
								<option value="latest">Sorting by latest</option>
								<option value="low">Sorting by low</option>
								<option value="high">Sorting by high</option>
							</select>
						</div>

					</div>
					<!-- Sorting by <div class="row"> -->
					<div>&nbsp;</div>
					<div>&nbsp;</div>

					<section id="product1" class="section-p1">
						<div class="pro-container">

<?php
$per_page = 9;
if(isset($_GET['page'])){ 
 $page = $_GET['page']; // Nhận giá trí cụ thể biến sẽ nhận giá trị 1,2,3
} else {
    $page = "";
}

if($page == "" || $page == 1){
    $page_1 = 0; 
} else{
    $page_1 = ($page * $per_page) - $per_page;
}

$product_query_count = "SELECT * FROM product ";
   
// Đếm số lượng sản phẩm

$find_count = mysqli_query($connection, $product_query_count);
$count = mysqli_num_rows($find_count);
$count = ceil($count/$per_page);
$query = "SELECT * FROM product LIMIT $page_1, $per_page";
$select_all_products_query = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_all_products_query)){
			$Id = $row['Id'];
			$Product_Name = $row['ProductName'];
			$Regular_Price = $row['RegularPrice'];
			$Sale_Price = $row['SalePrice'];
			$Image = $row['ImageLink'];
			$Product_Link = $row['ProductLink'];
		
?>
<!--Product-->
							<div class="pro">
								<a href="./single-product.php">
									<img src="<?php echo $Image ?>" alt="">
									<div class="des">
										<h5><?php echo $Product_Name ?></h5>
										<h4><?php echo $Sale_Price ?></h4>
										<div class="star">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										</div>
									</div>
								</a>
								<a href="#"><i class="fal fa-shopping-cart cart"></i></a>
							</div>
							<?php }?>
						</div>
					</section>

					<!-- Tạo một phân trang -->
    <ul class="pager">
           <?php    
           for($i = 1; $i <= $count; $i++){          
                echo "<li><a class='active_link' href='shop	.php?page={$i}'>{$i}</a></li>";
            }
            ?>
        </ul>

				</div>
				<!--END  <div class="col-lg-9">-->

			</div>
		</div>

	</section>
                
<?php include"./includes/footer.php"; ?>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

	<!-- Bootstrap JavaScript -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
