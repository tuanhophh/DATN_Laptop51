<script type="text/javascript" src="{{ asset('client') }}/script/jquery-ui.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/superfish.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/jquery.easing.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/jquery.blockUI.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/jquery.qtip.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/jquery.fancybox.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/isotope.pkgd.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/jquery.actual.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/jquery.flexnav.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/jquery.waypoints.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/sticky.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/jquery.scrollTo.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/jquery.fancybox-media.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/jquery.fancybox-buttons.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/jquery.carouFredSel.packed.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/jquery.responsiveElement.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/jquery.touchSwipe.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/DateTimePicker.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>

	<!-- Revolution Slider files -->
	<script type="text/javascript" src="{{ asset('client') }}/script/revolution/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/revolution/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/revolution/extensions/revolution.extension.actions.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/revolution/extensions/revolution.extension.carousel.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/revolution/extensions/revolution.extension.kenburn.min.js"></script>
	<script type="text/javascript"
		src="{{ asset('client') }}/script/revolution/extensions/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/revolution/extensions/revolution.extension.migration.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/revolution/extensions/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/revolution/extensions/revolution.extension.parallax.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/revolution/extensions/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/revolution/extensions/revolution.extension.video.min.js"></script>

	<!-- Plugins files -->
	<script type="text/javascript" src="{{ asset('client') }}/plugin/booking/jquery.booking.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/plugin/contact-form/jquery.contactForm.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/plugin/newsletter-form/jquery.newsletterForm.js"></script>

	<!-- Components files -->
	<script type="text/javascript" src="{{ asset('client') }}/script/template/jquery.template.tab.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/template/jquery.template.image.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/template/jquery.template.helper.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/template/jquery.template.header.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/template/jquery.template.counter.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/template/jquery.template.gallery.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/template/jquery.template.goToTop.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/template/jquery.template.fancybox.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/template/jquery.template.moreLess.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/template/jquery.template.googleMap.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/template/jquery.template.accordion.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/template/jquery.template.searchForm.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/template/jquery.template.testimonial.js"></script>
	<script type="text/javascript" src="{{ asset('client') }}/script/public.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/jquery.jqZoom.css" />

	<script type="text/javascript">
 
 function ChangeToSlug()
	 {
		 var slug;
		 //Lấy text từ thẻ input title 
		 slug = document.getElementById("slug").value;
		 slug = slug.toLowerCase();
		 //Đổi ký tự có dấu thành không dấu
			 slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
			 slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
			 slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
			 slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
			 slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
			 slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
			 slug = slug.replace(/đ/gi, 'd');
			 //Xóa các ký tự đặt biệt
			 slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
			 //Đổi khoảng trắng thành ký tự gạch ngang
			 slug = slug.replace(/ /gi, "-");
			 //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
			 //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
			 slug = slug.replace(/\-\-\-\-\-/gi, '-');
			 slug = slug.replace(/\-\-\-\-/gi, '-');
			 slug = slug.replace(/\-\-\-/gi, '-');
			 slug = slug.replace(/\-\-/gi, '-');
			 //Xóa các ký tự gạch ngang ở đầu và cuối
			 slug = '@' + slug + '@';
			 slug = slug.replace(/\@\-|\-\@|\@/gi, '');
			 //In slug ra textbox có id “slug”
		 document.getElementById('convert_slug').value = slug;
	 }
</script>

