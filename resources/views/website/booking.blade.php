<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Bệnh Viện Laptop 51</title>
	@include('layout_client.style')
	@include('layout_client.header')
</head>

<body>
	<div class="template-content">

		<!-- Section -->
		<div class="template-component-booking template-section template-main" id="template-booking">

			<!-- Booking form -->
			<form>

				<ul>

					<!-- Vehcile list -->

					{{-- <li>

						<!-- Step -->
						<div class="template-component-booking-item-header template-clear-fix">
							<span>
								<span>1</span>
								<span>/</span>
								<span>5</span>
							</span>
							<h3>Mục</h3>
							<h5>Chọn mục sửa chữa mà bạn cần</h5>
						</div>

						<!-- Content -->
						<div class="template-component-booking-item-content">

							<!-- Vehicle list -->
							<ul class="template-component-booking-vehicle-list">

								<!-- Vehicle -->
								<li data-id="regular-size-car">

									<div>

										<!-- Icon -->
										<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
											fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
											<path
												d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z" />
										</svg>
										<!-- Name -->
										<div>Sửa Chữa</div>

									</div>

								</li>

								<!-- Vehicle -->
								<li data-id="regular-size-car">
									<div>
										<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
											fill="currentColor" class="bi bi-bookmark-check" viewBox="0 0 16 16">
											<path fill-rule="evenodd"
												d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
											<path
												d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
										</svg>
										<div>Bảo Hành</div>
									</div>
								</li>

							</ul>

						</div>

					</li> --}}

					{{-- <li>

						<!-- Step -->
						<div class="template-component-booking-item-header template-clear-fix">
							<span>
								<span>2</span>
								<span>/</span>
								<span>5</span>
							</span>
							<h3>Loại Máy</h3>
							<h5>Chọn loại máy bạn cần sửa</h5>
						</div>

						<!-- Content -->
						<div class="template-component-booking-item-content">

							<!-- Vehicle list -->
							<ul class="template-component-booking-vehicle-list">

								<!-- Vehicle -->
								<li data-id="regular-size-car">

									<div>

										<!-- Icon -->
										<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
											fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
											<path
												d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z" />
										</svg>

										<!-- Name -->
										<div>Laptop</div>

									</div>

								</li>

								<!-- Vehicle -->
								<li data-id="medium-size-car">
									<div>
										<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
											fill="currentColor" class="bi bi-display" viewBox="0 0 16 16">
											<path
												d="M0 4s0-2 2-2h12s2 0 2 2v6s0 2-2 2h-4c0 .667.083 1.167.25 1.5H11a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1h.75c.167-.333.25-.833.25-1.5H2s-2 0-2-2V4zm1.398-.855a.758.758 0 0 0-.254.302A1.46 1.46 0 0 0 1 4.01V10c0 .325.078.502.145.602.07.105.17.188.302.254a1.464 1.464 0 0 0 .538.143L2.01 11H14c.325 0 .502-.078.602-.145a.758.758 0 0 0 .254-.302 1.464 1.464 0 0 0 .143-.538L15 9.99V4c0-.325-.078-.502-.145-.602a.757.757 0 0 0-.302-.254A1.46 1.46 0 0 0 13.99 3H2c-.325 0-.502.078-.602.145z" />
										</svg>
										<div>Máy Để Bàn (PC)</div>
									</div>
								</li>

								<!-- Vehicle -->
								<li data-id="compact-suv">
									<div>
										<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
											fill="currentColor" class="bi bi-apple" viewBox="0 0 16 16">
											<path
												d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282z" />
											<path
												d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282z" />
										</svg>
										<div>MacBook</div>
									</div>
								</li>

							</ul>

						</div>

					</li> --}}
					<!-- Package list -->

					{{--
					<li>

						<!-- Step -->
						<div class="template-component-booking-item-header template-clear-fix">
							<span>
								<span>3</span>
								<span>/</span>
								<span>5</span>
							</span>
							<h3>Hình Thức</h3>
							<h5>Hãy chọn hình thức sửa chữa phù hợp nhất với bạn!</h5>
						</div>

						<!-- Content -->
						<div class="template-component-booking-item-content">

							<!-- Package list -->
							<ul class="template-component-booking-package-list">

								<!-- Package -->
								<li data-id="basic-hand-wash-1"
									data-id-vehicle-rel="regular-size-car,compact-suv,minivan,pickup-truck,cargo-truck">

									<!-- Header -->
									<h4 class="template-component-booking-package-name">Mang Đến Cửa Hàng</h4>

									<!-- Price -->
									<div class="template-component-booking-package-price">
										<span class="template-component-booking-package-price-currency"></span>
										<span class="template-component-booking-package-price-total">0</span>
										<span class="template-component-booking-package-price-decimal">vnđ</span>
									</div>

									<!-- Duration -->
									<div class="template-component-booking-package-duration" hidden>
										<span class="template-icon-booking-meta-duration"></span>
										<span class="template-component-booking-package-duration-value">0</span>
										<span class="template-component-booking-package-duration-unit">min</span>
									</div>

									<!-- Services -->
									<ul class="template-component-booking-package-service-list">
										<li data-id="exterior-hand-wash">Exterior Hand Wash</li>
										<li data-id="towel-hand-dry">Towel Hand Dry</li>
										<li data-id="wheel-shine">Wheel Shine</li>
									</ul>

									<!-- Button -->
									<div class="template-component-button-box">
										<a href="#" class="template-component-button">Đặt</a>
									</div>

								</li>

								<!-- Package -->
								<li data-id="deluxe-wash-1"
									data-id-vehicle-rel="regular-size-car,compact-suv,minivan,pickup-truck,cargo-truck">
									<h4 class="template-component-booking-package-name">Sửa Chữa Tại Nhà</h4>
									<div class="template-component-booking-package-price">
										<span class="template-component-booking-package-price-currency"></span>
										<span class="template-component-booking-package-price-total">59000</span>
										<span class="template-component-booking-package-price-decimal">vnđ</span>
									</div>
									<div class="template-component-booking-package-duration" hidden>
										<span class="template-icon-booking-meta-duration"></span>
										<span class="template-component-booking-package-duration-value">0</span>
										<span class="template-component-booking-package-duration-unit">min</span>
									</div>
									<ul class="template-component-booking-package-service-list">
										<li data-id="exterior-hand-wash">Exterior Hand Wash</li>
										<li data-id="towel-hand-dry">Towel Hand Dry</li>
										<li data-id="wheel-shine">Wheel Shine</li>
										<li data-id="tire-dressing">Tire Dressing</li>
										<li data-id="windows-in-and-out">Windows In &amp; Out</li>
										<li data-id="sealer-hand-wax">Sealer Hand Wax</li>
									</ul>
									<div class="template-component-button-box">
										<a href="#" class="template-component-button">Đặt</a>
									</div>
								</li>

								<!-- Package -->
								<!-- <li data-id="ultimate-shine-1"
									data-id-vehicle-rel="regular-size-car,compact-suv,minivan">
									<h4 class="template-component-booking-package-name">Lấy Ngay (1 - 2 giờ)</h4>
									<div class="template-component-booking-package-price">
										<span class="template-component-booking-package-price-currency"></span>
										<span class="template-component-booking-package-price-total">89000</span>
										<span class="template-component-booking-package-price-decimal">vnđ</span>
									</div>
									<div class="template-component-booking-package-duration" hidden>
										<span class="template-icon-booking-meta-duration"></span>
										<span class="template-component-booking-package-duration-value">0</span>
									</div>
									<ul class="template-component-booking-package-service-list">
										<li data-id="exterior-hand-wash">Exterior Hand Wash</li>
										<li data-id="towel-hand-dry">Towel Hand Dry</li>
										<li data-id="wheel-shine">Wheel Shine</li>
										<li data-id="tire-dressing">Tire Dressing</li>
										<li data-id="windows-in-and-out">Windows In &amp; Out</li>
										<li data-id="sealer-hand-wax">Sealer Hand Wax</li>
										<li data-id="interior-vacuum">Interior Vacuum</li>
										<li data-id="trunk-vacuum">Trunk Vacuum</li>
										<li data-id="door-shuts-and-plastics">Door Shuts &amp; Plastics</li>
										<li data-id="dashboard-clean">Dashboard Clean</li>
									</ul>
									<div class="template-component-button-box">
										<a href="#" class="template-component-button">Đặt</a>
									</div>
								</li> -->

							</ul>

						</div>

					</li> --}}
					<!-- Service list -->


					{{-- <li>

						<!-- Step -->
						<div class="template-component-booking-item-header template-clear-fix">
							<span>
								<span>4</span>
								<span>/</span>
								<span>5</span>
							</span>
							<h3>Danh Sách Dịch Vụ</h3>
							<h5>Một số dịch vụ bạn sẽ cần.</h5>
						</div>

						<!-- Content -->
						<div class="template-component-booking-item-content">

							<!-- Service list -->
							<ul class="template-component-booking-service-list">

								<!-- Service -->
								<!-- <li data-id="exterior-hand-wash" class="template-clear-fix"> -->

								<!-- Name -->
								<!-- <div class="template-component-booking-service-name">
										<span>Exterior Hand Wash</span>
										<a href="#" class="template-component-more-link">
											<span>More...</span>
											<span>Less...</span>
										</a>
										<div class="template-component-more-content">
											We hand wash your paint with a pH neutral shampoo, we remove dirt without
											damaging paint or trims. Your car&#309;s
											exterior is chamois-dried to prevent water marks forming on the paint and
											high pressure air is used to remove
											water from panel joins and trim.
										</div>
									</div> -->

								<!-- Duration -->
								<!-- <div class="template-component-booking-service-duration">
										<span class="template-icon-booking-meta-duration"></span>
										<span class="template-component-booking-service-duration-value">10</span>
										<span class="template-component-booking-service-duration-unit">min</span>
									</div> -->

								<!-- Price -->
								<!-- <div class="template-component-booking-service-price">
										<span class="template-icon-booking-meta-price"></span>
										<span class="template-component-booking-service-price-currency">$</span>
										<span class="template-component-booking-service-price-value"></span>
										<span class="template-component-booking-service-price-unit">7</span>
										<span class="template-component-booking-service-price-decimal">.95</span>
									</div> -->

								<!-- Button -->
								<!-- <div class="template-component-button-box">
										<a href="#" class="template-component-button">Select</a>
									</div> -->

								<!-- </li> -->

								<!-- Service -->
								<!-- <li data-id="towel-hand-dry" class="template-clear-fix">
									<div class="template-component-booking-service-name">
										<span>Towel Hand Dry</span>
										<a href="#" class="template-component-more-link">
											<span>More...</span>
											<span>Less...</span>
										</a>
										<div class="template-component-more-content">
											Your car’s exterior is chamois-dried to prevent water marks forming on the
											paint and high pressure air is used
											to remove water from panel joins and trim.
										</div>
									</div>
									<div class="template-component-booking-service-duration">
										<span class="template-icon-booking-meta-duration"></span>
										<span class="template-component-booking-service-duration-value">10</span>
										<span class="template-component-booking-service-duration-unit">min</span>
									</div>
									<div class="template-component-booking-service-price">
										<span class="template-icon-booking-meta-price"></span>
										<span class="template-component-booking-service-price-currency">$</span>
										<span class="template-component-booking-service-price-value">5.50</span>
									</div>
									<div class="template-component-button-box">
										<a href="#" class="template-component-button">Select</a>
									</div>
								</li>

								Service -->
								<!-- <li data-id="wheel-shine" class="template-clear-fix">
									<div class="template-component-booking-service-name">
										<span>Wheel Shine</span>
									</div>
									<div class="template-component-booking-service-duration">
										<span class="template-icon-booking-meta-duration"></span>
										<span class="template-component-booking-service-duration-value">5</span>
										<span class="template-component-booking-service-duration-unit">min</span>
									</div>
									<div class="template-component-booking-service-price">
										<span class="template-icon-booking-meta-price"></span>
										<span class="template-component-booking-service-price-currency">$</span>
										<span class="template-component-booking-service-price-value">5.00</span>
									</div>
									<div class="template-component-button-box">
										<a href="#" class="template-component-button">Select</a>
									</div>
								</li> -->

								<!-- Service -->
								<li data-id="tire-dressing" class="template-clear-fix">
									<div class="template-component-booking-service-name">
										<span>Sửa lấy ngay 1h</span>
									</div>
									<div class="template-component-booking-service-price">
										<span class="template-icon-booking-meta-price"></span>
										<span class="template-component-booking-service-price-value">69000</span>
										<span class="template-component-booking-service-price-currency">vnđ</span>

									</div>
									<div class="template-component-button-box">
										<a href="#" class="template-component-button">Thêm</a>
									</div>
								</li>
								<li data-id="tire-dressing" class="template-clear-fix">
									<div class="template-component-booking-service-name">
										<span>Bảo Dưỡng Laptop</span>
									</div>
									<div class="template-component-booking-service-price">
										<span class="template-icon-booking-meta-price"></span>
										<span class="template-component-booking-service-price-value">99000</span>
										<span class="template-component-booking-service-price-currency">vnđ</span>

									</div>
									<div class="template-component-button-box">
										<a href="#" class="template-component-button">Thêm</a>
									</div>
								</li>

								<!-- Service -->
								<li data-id="windows-in-and-out" class="template-clear-fix">
									<div class="template-component-booking-service-name">
										<span>Cài Một Số Phần Mềm Bản Quyền</span>
										<a href="#" class="template-component-more-link">
											<span>Thêm...</span>
											<span>Bớt...</span>
										</a>
										<div class="template-component-more-content">
											- Cài đặt Microsoft Office bản cập nhật mới nhất cho Win: Word, Excel,
											Powerpoint,...
											<br>
											- Cài đặt một số phần mềm khác nếu khách có nhu cầu.
										</div>
									</div>
									<div class="template-component-booking-service-price">
										<span class="template-icon-booking-meta-price"></span>
										<span class="template-component-booking-service-price-value">149000</span>
										<span class="template-component-booking-service-price-currency">vnđ</span>
									</div>
									<div class="template-component-button-box">
										<a href="#" class="template-component-button">Thêm</a>
									</div>
								</li>

								<!-- Service -->
								<li data-id="sealer-hand-wax" class="template-clear-fix">
									<div class="template-component-booking-service-name">
										<span>Cài Lại Windown</span>
									</div>
									<div class="template-component-booking-service-price">
										<span class="template-icon-booking-meta-price"></span>
										<span class="template-component-booking-service-price-value">49000</span>
										<span class="template-component-booking-service-price-currency">vnđ</span>
									</div>
									<div class="template-component-button-box">
										<a href="#" class="template-component-button">Thêm</a>
									</div>
								</li>
								<!-- Service -->
								<li data-id="sealer-hand-wax" class="template-clear-fix">
									<div class="template-component-booking-service-name">
										<span>Phá Password</span>
									</div>
									<div class="template-component-booking-service-price">
										<span class="template-icon-booking-meta-price"></span>
										<span class="template-component-booking-service-price-value">99000</span>
										<span class="template-component-booking-service-price-currency">vnđ</span>

									</div>
									<div class="template-component-button-box">
										<a href="#" class="template-component-button">Thêm</a>
									</div>
								</li>
								<li data-id="windows-in-and-out" class="template-clear-fix">
									<div class="template-component-booking-service-name">
										<span>Sửa Phần Mềm</span>
										<a href="#" class="template-component-more-link">
											<span>Thêm...</span>
											<span>Bớt...</span>
										</a>
										<div class="template-component-more-content">
											<input type="checkbox" name="1" id="1"> Microsoft
											<br>
											<input type="checkbox" name="1" id="1"> Oracle
											<br>
											<input type="checkbox" name="1" id="1"> SAP
											<br>
											<input type="checkbox" name="1" id="1"> VMware
											<br>
											<input type="checkbox" name="1" id="1"> Symantec
											<br>
											<input type="checkbox" name="1" id="1"> HCL Technologies
											<br>
											<input type="checkbox" name="1" id="1"> Fiserv
											<br>
											<input type="checkbox" name="1" id="1"> Intuit
											<br>
											<input type="checkbox" name="1" id="1"> Amadeus IT Group
											<br>
											<input type="checkbox" name="1" id="1"> CA Technologies
										</div>
									</div>
									<div class="template-component-booking-service-price">
										<span class="template-icon-booking-meta-price"></span>
										<span class="template-component-booking-service-price-currency">Khuyến khích
											khách hàng mang đến cửa hàng để được tư vấn hoặc có thể ghi chi tiết vào
											mô tả bên dưới</span>
									</div>
								</li>
								<li data-id="windows-in-and-out" class="template-clear-fix">
									<div class="template-component-booking-service-name">
										<span>Sửa Phần Cứng</span>
										<a href="#" class="template-component-more-link">
											<span>Thêm...</span>
											<span>Bớt...</span>
										</a>
										<div class="template-component-more-content">
											<input type="checkbox" name="1" id="1"> Bàn Phím
											<br>
											<input type="checkbox" name="1" id="1"> Ổ Cứng
											<br>
											<input type="checkbox" name="1" id="1"> Sạc Laptop
											<br>
											<input type="checkbox" name="1" id="1"> Loa
											<br>
											<input type="checkbox" name="1" id="1"> Pin Laptop
											<br>
											<input type="checkbox" name="1" id="1"> RAM Laptop
											<br>
											<input type="checkbox" name="1" id="1"> Màn Hình Laptop
											<br>
											<input type="checkbox" name="1" id="1"> Card Wifi
											<br>
											<input type="checkbox" name="1" id="1"> Mainboard
											<br>
											<input type="checkbox" name="1" id="1"> Ổ Đĩa Quang
											<br>
											<input type="checkbox" name="1" id="1"> Chip CPU
											<br>
											<input type="checkbox" name="1" id="1"> Quạt Tản Nhiệt CPU
											<br>
											<input type="checkbox" name="1" id="1"> Linh Kiện Thay Thế Macbook
											<br>
										</div>
									</div>
									<div class="template-component-booking-service-price">
										<span class="template-icon-booking-meta-price"></span>
										<span class="template-component-booking-service-price-currency">Khuyến khích
											khách hàng mang đến cửa hàng để được tư vấn hoặc có thể ghi chi tiết vào
											mô tả bên dưới</span>
									</div>
								</li>
								<br>
							</ul>

						</div>

					</li> --}}
					<!-- Summary -->


					<li>

						<!-- Step -->
						<div class="template-component-booking-item-header template-clear-fix">
							<span>
								<span>5</span>
								<span>/</span>
								<span>5</span>
							</span>
							<h3>Tóm Tắt Thông Tin Đặt Lịch</h3>
							<h5>Vui lòng điền chính sác thông tin liên lạc của bạn</h5>
						</div>


						<!-- Content -->
						{{-- <div class="template-component-booking-item-content">

							<ul class="template-component-booking-summary template-clear-fix">

								<!-- Price -->
								<li class="template-component-booking-summary-price ">
									<div class="template-icon-booking-meta-total-price"></div>
									<h5>
										<span class="template-component-booking-summary-price-value">0</span>
										<span class="template-component-booking-summary-price-symbol">vnđ</span>
									</h5>
									<span>Tổng giá</span>
								</li>

							</ul>

						</div> --}}

						<!-- Content -->
						<div class="template-component-booking-item-content template-margin-top-reset">

							<!-- Layout -->
							<ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix">

								<!-- First name -->
								<li class="template-layout-column-left template-margin-bottom-reset">
									<div class="template-component-form-field">
										<label for="booking-form-first-name">Họ Và Tên *</label>
										<input type="text" name="booking-form-first-name"
											id="booking-form-first-name" />
									</div>
								</li>

								<!-- Second name -->
								<li class="template-layout-column-right template-margin-bottom-reset">
									<div class="template-component-form-field">
										<label for="booking-form-email">Địa chỉ E-mail *</label>
										<input type="text" name="booking-form-email" id="booking-form-email" />
									</div>
								</li>

							</ul>


							<!-- Layout -->
							<ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix">

								<!-- E-mail address -->
								<li class="template-layout-column-left template-margin-bottom-reset">
									<div class="template-component-form-field">
										<label for="booking-form-phone">Số Điện Thoại *</label>
										<input type="number" name="booking-form-phone" id="booking-form-phone" />
									</div>
								</li>

								<!-- Phone number -->
								<li class="template-layout-column-right template-margin-bottom-reset">
									<div class="template-component-form-field">
										<label for="booking-form-vehicle-make">Hãng Máy </label>
										<input type="text" name="booking-form-vehicle-make"
											id="booking-form-vehicle-make" />
									</div>
								</li>

							</ul>
							<ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix">

								<!-- First name -->
								<li class="template-layout-column-left template-margin-bottom-reset">
									<div class="template-component-form-field">
										<label for="booking-form-first-name">Hình thức sửa</label>
										{{-- <input type="text" name="booking-form-first-name"
											id="booking-form-first-name" /> --}}
										<select id="booking-form-first-name" name="">
											<option value="">Tại cửa hàng</option>
											<option value="">Tại nha</option>
										</select>
									</div>
								</li>

								<!-- Second name -->
								<li style="border: none"
									class="template-layout-column-right template-margin-bottom-reset">
									<div class="template-component-form-field">
										<label for="booking-form-email">Tên máy</label>
										<input type="text" name="booking-form-email" />
									</div>
								</li>

							</ul>
							<!-- Layout -->
							{{-- <ul class="template-layout-100 template-layout-margin-reset template-clear-fix">

								<!-- Message -->
								<li>
									<div class="template-component-form-field">
										<label for="booking-form-select">Khung Giờ *
											<select>
												<option value="1">8:00 - 10:00</option>
												<option value="2">10:00 - 12:00</option>
												<option value="3">12:00 - 14:00</option>
												<option value="4">14:00 - 16:00</option>
											</select>
										</label>
									</div>
								</li>
							</ul> --}}
							<ul class="template-layout-100 template-layout-margin-reset template-clear-fix">

								<!-- Message -->
								<li>
									<div class="template-component-form-field">
										<label for="booking-form-message"><b>Mô Tả Thêm... *</b></label>
										<textarea rows="3" cols="3" name="booking-form-message"
											id="description"></textarea>
									</div>
								</li>

							</ul>

							<!-- Text + submit button -->
							<div class="template-align-center template-clear-fix template-margin-top-2">
								<p class="template-padding-reset template-margin-bottom-2">Chúng tôi sẽ xác nhận cuộc
									hẹn với bạn qua điện thoại hoặc e-mail trong vòng 24 giờ kể từ khi nhận được yêu cầu
									của bạn.
								</p>
								<input type="submit" value="Đặt Lịch" class="template-component-button"
									name="booking-form-submit" id="booking-form-submit" />
								<input type="hidden" value="" name="booking-form-data" id="booking-form-data" />
							</div>

						</div>

					</li>
				</ul>

			</form>

		</div>

	</div>
	@include('layout_client.footer')
	@include('layout_client.script')
	<script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace('description');	
	</script>
</body>

</html>