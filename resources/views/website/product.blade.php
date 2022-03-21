<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bệnh Viện Laptop 51</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome 5 CSS -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
    <!-- Products List CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Demo CSS (No need to include it into your project) -->
    <link rel="stylesheet" href="css/demo.css">
    @include('layout_client.style')
</head>
<body>
    @include('layout_client.header')
    <div class="container bg-white">
		<nav class="navbar navbar-expand-md navbar-light bg-white">
			<div class="container-fluid p-0"> <a class="navbar-brand text-uppercase fw-800" href="#"><span class="border-red pe-2">New</span>Product</a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNav" aria-controls="myNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="fas fa-bars"></span> </button>
				<div class="collapse navbar-collapse" id="myNav">
					<div class="navbar-nav ms-auto"> <a class="nav-link active" aria-current="page" href="#">All</a> <a class="nav-link" href="#">Women's</a> <a class="nav-link" href="#">Men's</a> <a class="nav-link" href="#">Kid's</a> <a class="nav-link" href="#">Accessories</a> <a class="nav-link" href="#">Cosmetics</a> </div>
				</div>
			</div>
		</nav>
		<div class="row">
			<div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
				<div class="product"> <img src="https://images.pexels.com/photos/54203/pexels-photo-54203.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
					<ul class="d-flex align-items-center justify-content-center list-unstyled icons">
						<li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
						<li class="icon mx-3"><span class="far fa-heart"></span></li>
						<li class="icon"><span class="fas fa-shopping-bag"></span></li>
					</ul>
				</div>
				<div class="tag bg-red">sale</div>
				<div class="title pt-4 pb-1">Winter Sweater</div>
				<div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
				<div class="price">$ 60.0</div>
			</div>
			<div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
				<div class="product"> <img src="https://images.pexels.com/photos/6764040/pexels-photo-6764040.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
					<ul class="d-flex align-items-center justify-content-center list-unstyled icons">
						<li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
						<li class="icon mx-3"><span class="far fa-heart"></span></li>
						<li class="icon"><span class="fas fa-shopping-bag"></span></li>
					</ul>
				</div>
				<div class="tag bg-black">out of stock</div>
				<div class="title pt-4 pb-1">Denim Dresses</div>
				<div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
				<div class="price">$ 55.0</div>
			</div>
			<div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
				<div class="product"> <img src="https://images.pexels.com/photos/914668/pexels-photo-914668.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
					<ul class="d-flex align-items-center justify-content-center list-unstyled icons">
						<li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
						<li class="icon mx-3"><span class="far fa-heart"></span></li>
						<li class="icon"><span class="fas fa-shopping-bag"></span></li>
					</ul>
				</div>
				<div class="tag bg-green">new</div>
				<div class="title pt-4 pb-1"> Empire Waist Dresses</div>
				<div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
				<div class="price">$ 70.0</div>
			</div>
			<div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
				<div class="product"> <img src="https://images.pexels.com/photos/6311392/pexels-photo-6311392.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
					<ul class="d-flex align-items-center justify-content-center list-unstyled icons">
						<li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
						<li class="icon mx-3"><span class="far fa-heart"></span></li>
						<li class="icon"><span class="fas fa-shopping-bag"></span></li>
					</ul>
				</div>
				<div class="title pt-4 pb-1">Pinafore Dresses</div>
				<div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
				<div class="price">$ 60.0</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
				<div class="product"> <img src="https://images.pexels.com/photos/54203/pexels-photo-54203.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
					<ul class="d-flex align-items-center justify-content-center list-unstyled icons">
						<li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
						<li class="icon mx-3"><span class="far fa-heart"></span></li>
						<li class="icon"><span class="fas fa-shopping-bag"></span></li>
					</ul>
				</div>
				<div class="tag bg-red">sale</div>
				<div class="title pt-4 pb-1">Winter Sweater</div>
				<div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
				<div class="price">$ 60.0</div>
			</div>
			<div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
				<div class="product"> <img src="https://images.pexels.com/photos/6764040/pexels-photo-6764040.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
					<ul class="d-flex align-items-center justify-content-center list-unstyled icons">
						<li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
						<li class="icon mx-3"><span class="far fa-heart"></span></li>
						<li class="icon"><span class="fas fa-shopping-bag"></span></li>
					</ul>
				</div>
				<div class="tag bg-black">out of stock</div>
				<div class="title pt-4 pb-1">Denim Dresses</div>
				<div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
				<div class="price">$ 55.0</div>
			</div>
			<div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
				<div class="product"> <img src="https://images.pexels.com/photos/914668/pexels-photo-914668.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
					<ul class="d-flex align-items-center justify-content-center list-unstyled icons">
						<li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
						<li class="icon mx-3"><span class="far fa-heart"></span></li>
						<li class="icon"><span class="fas fa-shopping-bag"></span></li>
					</ul>
				</div>
				<div class="title pt-4 pb-1"> Empire Waist Dresses</div>
				<div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
				<div class="price">$ 70.0</div>
			</div>
			<div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
				<div class="product"> <img src="https://images.pexels.com/photos/6311392/pexels-photo-6311392.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
					<ul class="d-flex align-items-center justify-content-center list-unstyled icons">
						<li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
						<li class="icon mx-3"><span class="far fa-heart"></span></li>
						<li class="icon"><span class="fas fa-shopping-bag"></span></li>
					</ul>
				</div>
				<div class="tag bg-green">new</div>
				<div class="title pt-4 pb-1">Pinafore Dresses</div>
				<div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
				<div class="price">$ 60.0</div>
			</div>
		</div>
	</div>
    @include('layout_client.footer')
    @include('layout_client.script')


    
</body>
</html>