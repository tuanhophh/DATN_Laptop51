<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
					<li>

						<!-- Step -->
						<div class="template-component-booking-item-header template-clear-fix">
							<h3>Thông Tin Đặt Lịch</h3>
							<h5>Vui lòng điền chính sác thông tin liên lạc của bạn</h5>
						</div>


						<!-- Content -->
						

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
							<!-- Layout -->
							<ul class="template-layout-100 template-layout-margin-reset template-clear-fix">

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
							</ul>
							<ul class="template-layout-100 template-layout-margin-reset template-clear-fix">

								<!-- Message -->
								<li>
									<div class="template-component-form-field">
										<label for="booking-form-select">Loại Máy *
											<select>
												<option value="1">Laptop</option>
												<option value="2">Pc</option>
											</select>
										</label>
									</div>
								</li>
							</ul>
							<ul class="template-layout-100 template-layout-margin-reset template-clear-fix">

								<!-- Message -->
								<li>
									<div class="template-component-form-field">
										<label for="booking-form-select">Hình Thức Sửa Chữa
											<select>
												<option value="1">Sửa Chữa Tại Nhà</option>
												<option value="2">Sửa Chữa Tại Cửa Hàng</option>
											</select>
										</label>
									</div>
								</li>
							</ul>
							<ul class="template-layout-100 template-layout-margin-reset template-clear-fix">

								<!-- Message -->
								<li>
									<div class="template-component-form-field">
										<label for="booking-form-select">Dịch Vụ
											<select>
												<option value="1">Bảo Hành</option>
												<option value="2">Cài các phần mềm</option>
												<option value="2">Cài WIn</option>
												<option value="2">Khác</option>
											</select>
										</label>
									</div>
								</li>
							</ul>
							<ul class="template-layout-100 template-layout-margin-reset template-clear-fix">

								<!-- Message -->
								<li>
									<div class="template-component-form-field">
										<label for="booking-form-message">Mô Tả Thêm... *</label>
										<textarea rows="3" cols="3" name="booking-form-message"
											id="booking-form-message"></textarea>
									</div>
								</li>

							</ul>
							<div class="template-component-booking-item-content">

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
	
							</div>

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
</body>
</html>