<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layout_client.style')
</head>
<body>
    @include('layout_client.header')
    <div class="template-content">

		<!-- Section -->
		<div class="template-section template-section-padding-1 template-main template-clear-fix">

			<!-- Features list -->
			<div
				class="template-component-feature-list template-component-feature-list-position-left template-clear-fix">

				<!-- Layout 33x33x33% -->
				<ul class="template-layout-33x33x33 template-clear-fix">

					<!-- Left column -->
					<li class="template-layout-column-left">
						<span class="template-icon-feature-phone-circle"></span>
						<h5>Số Điện Thoại</h5>
						<p>
							(+84) 967758023<br />
							(+84) 967758023<br />
						</p>
					</li>

					<!-- Center column -->
					<li class="template-layout-column-center">
						<span class="template-icon-feature-location-map"></span>
						<h5>Địa Chỉ</h5>
						<p>
							Trịnh Văn Bô<br />
							Mỹ Đình - Hà Nội
						</p>
					</li>

					<!-- Right column -->
					<li class="template-layout-column-right">
						<span class="template-icon-feature-clock"></span>
						<h5>Thời Gian Làm Việc</h5>
						<p>
							Thứ 2 - Thứ 7: 8 Giờ Sáng - 18 Giờ Tối<br />
							Chủ Nhật: 8 Giờ Sáng - 15 Giờ Chiều
						</p>
					</li>

				</ul>

			</div>
		</div>

		<!-- Layout Flex -->
		<div class="template-layout-flex template-clear-fix">

			<!-- Left column -->
			<div class="template-padding-reset">

				<!-- Google Map -->
				<div class="template-component-google-map">

					<!-- Content -->
					<div class="template-component-google-map-box">
						<div class="template-component-google-map-box-content"></div>
					</div>

				</div>

				<iframe
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14896.509254825538!2d105.76031427879195!3d21.027591275982495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454bab9b67e93%3A0xbbe16aced529963f!2zTeG7uSDEkMOsbmgsIE5hbSBU4burIExpw6ptLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1645439957408!5m2!1svi!2s"
					width="100%" height="85%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>

			<!-- Right column -->
			<div>

				<!-- Header -->
				<div class="template-component-header-subheader template-align-left">
					<h4>ĐỂ LẠI LỜI NHẮN</h4>
					<div></div>
				</div>

				<!-- Text -->
				<p class="template-padding-reset">
					Xin hãy để lại thông tin liên lạc cho chúng tôi, chúng tôi sẽ gửi cho bạn những voucher khuyến mãi
					hấp dẫn mỗi khi có chương trình
				</p>

				<!-- Space -->
				<div class="template-component-space template-component-space-2"></div>

				<!-- Contact form -->
				<form name="contact-form" id="contact-form" method="POST" action="#"
					class="template-component-contact-form">

					<!-- Layout 50x50% -->
					<ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix">

						<!-- Left column -->
						<li class="template-layout-column-left template-margin-bottom-reset">
							<div class="template-component-form-field template-state-block">
								<label for="contact-form-name">Tên của Bạn *</label>
								<input type="text" name="contact-form-name" id="contact-form-name" />
							</div>
							<div class="template-component-form-field template-state-block">
								<label for="contact-form-email">E-mail Của Bạn *</label>
								<input type="text" name="contact-form-email" id="contact-form-email" />
							</div>
							<div class="template-component-form-field template-state-block">
								<label for="contact-form-phone">Số Điện Thoại Liện Lạc</label>
								<input type="text" name="contact-form-phone" id="contact-form-phone" />
							</div>
						</li>

						<!-- Right column -->
						<li class="template-layout-column-right template-margin-bottom-reset">
							<div class="template-component-form-field template-state-block">
								<label for="contact-form-message">Nội Dung *</label>
								<textarea rows="1" cols="1" name="contact-form-message"
									id="contact-form-message"></textarea>
							</div>
						</li>

					</ul>

					<!-- Button -->
					<div class="template-align-center template-clear-fix template-margin-top-1">
						<span class="template-state-block">
							<input type="submit" value="Gửi Liên Hệ" class="template-component-button"
								name="contact-form-submit" id="contact-form-submit" />
						</span>
					</div>

				</form>

			</div>

		</div>

	</div>
    @include('layout_client.footer')
    @include('layout_client.script')
    
</body>
</html>