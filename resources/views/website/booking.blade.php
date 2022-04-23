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
	@if (Session::has('msg'))
	{!! Session::get('msg') !!}.


	@endif
	<div class="template-content">

		<!-- Section -->
		<div class="template-component-booking template-section template-main" id="template-booking">

			<!-- Booking form -->
			<form method="POST">
				@csrf
				<ul>
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
						<div class="template-component-booking-item-content template-margin-top-reset">

							<!-- Layout -->
							<ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix">

								<!-- First name -->
								<li class="template-layout-column-left template-margin-bottom-reset">
									<div class="template-component-form-field">
										<label for="booking-form-first-name">Họ Và Tên *</label>
										<input type="text" value="{{ old('full_name') }}" name="full_name"
											id="booking-form-first-name" />
										<small style="color: red; padding-left: 15px"> @error('full_name')
											{{ $message }}
											@enderror
										</small>
									</div>

								</li>

								<!-- Second name -->
								<li class="template-layout-column-right template-margin-bottom-reset">
									<div class="template-component-form-field">
										<label for="booking-form-email">Địa chỉ E-mail *</label>
										<input type="text" value="{{ old('email') }}" name="email"
											id="booking-form-email" /><small style="color: red; padding-left: 15px">
											@error('email')
											{{ $message }}
											@enderror
										</small>
									</div>
								</li>

							</ul>


							<!-- Layout -->
							<ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix">

								<!-- E-mail address -->
								<li class="template-layout-column-left template-margin-bottom-reset">
									<div class="template-component-form-field">
										<label for="booking-form-phone">Số Điện Thoại *</label>
										<input value="{{ old('phone') }}" type="text" name="phone"
											id="booking-form-phone" />
										<small style="color: red; padding-left: 15px">@error('phone')
											{{ $message }}
											@enderror
										</small>
									</div>
								</li>

								<!-- Phone number -->

								<li style="border: none"
									class="template-layout-column-right template-margin-bottom-reset">
									<div class="template-component-form-field">
										<label for="booking-form-email">Tên máy</label>
										<input value="{{ old('name_computer') }}" type="text" name="name_computer" />
										<small style="color: red; padding-left: 15px"> @error('name_computer')
											{{ $message }}
											@enderror
										</small>
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
										<select name="repair_type">
											<option value="CH">Tại cửa hàng</option>
											<option value="TN">Tại nha</option>
										</select>
									</div>
								</li>

								<!-- Second name -->
								<li class="template-layout-column-right template-margin-bottom-reset">
									<div class="template-component-form-field">
										<label for="booking-form-vehicle-make">Hãng Máy </label>
										{{-- <input type="conpany_computer" name="booking-form-vehicle-make"
											id="booking-form-vehicle-make" /> --}}
										<select name="repair_type">
											@foreach ($company_computer as $item)
											<option value="{{ $item->id }}">{{ $item->company_name }}</option>
											@endforeach
										</select>

									</div>
								</li>

							</ul>
							<ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix">

								<!-- First name -->
								<li class="template-layout-column-left template-margin-bottom-reset">
									<div class="">
										<label for="booking-form-first-name">Khung giờ</label>
										{{-- <input type="text" name="booking-form-first-name"
											id="booking-form-first-name" /> --}}
										<select class="form-control" name="interval" id="">
											<option value="1">8h-10h</option>
											<option value="2">10h-12h</option>
											<option value="3">12h-14h</option>
											<option value="4">14h-16h</option>
											<option value="5">16h-18h</option>
											<option value="6">18h-20h</option>


										</select>
									</div>
								</li>

								<!-- Second name -->


							</ul>
							<!-- Layout -->
							
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
								<input type="submit" name="btn" value="Đặt Lịch" class="template-component-button"
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
	{{-- <strong>Thông báo: </strong>{{ Session::get('msg') }}. --}}
	@if (Session::has('msg'))

	{{ Session::get('msg') }}.


	@endif
	{{-- <script>
		alert('Đặt lịch thành công');

		

	</script> --}}
</body>

</html>