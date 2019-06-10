let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

// mix.setPublicPath('./'); // Uncomment this if you use windows environment, don't forget to set your npm global binary location into your Environment System Path.
mix.styles([
	'src/assets/app/custom/login/login-v6.default.css',
	'src/assets/app/custom/error/error-v1.default.css',
	'src/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css',
	'src/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css',
	'src/assets/vendors/general/tether/dist/css/tether.css',
	'src/assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css',
	'src/assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css',
	'src/assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css',
	'src/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css',
	'src/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css',
	'src/assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css',
	'src/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css',
	'src/assets/vendors/general/select2/dist/css/select2.css',
	'src/assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css',
	'src/assets/vendors/general/nouislider/distribute/nouislider.css',
	'src/assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css',
	'src/assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css',
	'src/assets/vendors/general/dropzone/dist/dropzone.css',
	'src/assets/vendors/general/summernote/dist/summernote.css',
	'src/assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css',
	'src/assets/vendors/general/animate.css/animate.css',
	'src/assets/vendors/general/toastr/build/toastr.css',
	'src/assets/vendors/general/morris.js/morris.css',
	'src/assets/vendors/general/sweetalert2/dist/sweetalert2.css',
	'src/assets/vendors/general/socicon/css/socicon.css',
	'src/assets/vendors/custom/vendors/line-awesome/css/line-awesome.css',
	'src/assets/vendors/custom/vendors/flaticon/flaticon.css',
	'src/assets/vendors/custom/vendors/flaticon2/flaticon.css',
	'src/assets/vendors/custom/vendors/fontawesome5/css/all.min.css',
	'src/assets/vendors/base/vendors.bundle.css',
	'src/assets/demo/default/base/style.bundle.css',
	'src/assets/demo/default/skins/header/base/light.css',
	'src/assets/demo/default/skins/header/menu/light.css',
	'src/assets/demo/default/skins/brand/dark.css',
	'src/assets/demo/default/skins/aside/dark.css',
	'src/assets/datatables/datatables.min.css'
], 'assets/css/app.css')
	.scripts([
		'src/assets/vendors/general/jquery/dist/jquery.js',
		'src/assets/vendors/general/popper.js/dist/umd/popper.js',
		'src/assets/vendors/general/bootstrap/dist/js/bootstrap.min.js',
		'src/assets/vendors/general/js-cookie/src/js.cookie.js',
		'src/assets/vendors/general/moment/min/moment.min.js',
		'src/assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js',
		'src/assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js',
		'src/assets/vendors/general/sticky-js/dist/sticky.min.js',
		'src/assets/vendors/general/wnumb/wNumb.js',
		'src/assets/vendors/general/jquery-form/dist/jquery.form.min.js',
		'src/assets/vendors/general/block-ui/jquery.blockUI.js',
		'src/assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
		'src/assets/vendors/custom/components/vendors/bootstrap-datepicker/init.js',
		'src/assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js',
		'src/assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js',
		'src/assets/vendors/custom/components/vendors/bootstrap-timepicker/init.js',
		'src/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js',
		'src/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js',
		'src/assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js',
		'src/assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js',
		'src/assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js',
		'src/assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js',
		'src/assets/vendors/custom/components/vendors/bootstrap-switch/init.js',
		'src/assets/vendors/general/select2/dist/js/select2.full.js',
		'src/assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js',
		'src/assets/vendors/general/typeahead.js/dist/typeahead.bundle.js',
		'src/assets/vendors/general/handlebars/dist/handlebars.js',
		'src/assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js',
		'src/assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js',
		'src/assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js',
		'src/assets/vendors/general/nouislider/distribute/nouislider.js',
		'src/assets/vendors/general/owl.carousel/dist/owl.carousel.js',
		'src/assets/vendors/general/autosize/dist/autosize.js',
		'src/assets/vendors/general/clipboard/dist/clipboard.min.js',
		'src/assets/vendors/general/dropzone/dist/dropzone.js',
		'src/assets/vendors/general/summernote/dist/summernote.js',
		'src/assets/vendors/general/markdown/lib/markdown.js',
		'src/assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js',
		'src/assets/vendors/custom/components/vendors/bootstrap-markdown/init.js',
		'src/assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js',
		'src/assets/vendors/custom/components/vendors/bootstrap-notify/init.js',
		'src/assets/vendors/general/jquery-validation/dist/jquery.validate.js',
		'src/assets/vendors/general/jquery-validation/dist/additional-methods.js',
		'src/assets/vendors/custom/components/vendors/jquery-validation/init.js',
		'src/assets/vendors/general/toastr/build/toastr.min.js',
		'src/assets/vendors/general/raphael/raphael.js',
		'src/assets/vendors/general/morris.js/morris.js',
		'src/assets/vendors/general/chart.js/dist/Chart.bundle.js',
		'src/assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js',
		'src/assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js',
		'src/assets/vendors/general/waypoints/lib/jquery.waypoints.js',
		'src/assets/vendors/general/counterup/jquery.counterup.js',
		'src/assets/vendors/general/es6-promise-polyfill/promise.min.js',
		'src/assets/vendors/general/sweetalert2/dist/sweetalert2.min.js',
		'src/assets/vendors/custom/components/vendors/sweetalert2/init.js',
		'src/assets/vendors/general/jquery.repeater/src/lib.js',
		'src/assets/vendors/general/jquery.repeater/src/jquery.input.js',
		'src/assets/vendors/general/jquery.repeater/src/repeater.js',
		'src/assets/vendors/general/dompurify/dist/purify.js',
		'src/assets/demo/default/base/scripts.bundle.js',
		'src/assets/app/custom/login/login-general.js',
		'src/assets/vendors/base/vendors.bundle.js',
		'src/assets/app/bundle/app.bundle.js',
		'src/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js',
		'src/assets/vendors/custom/gmaps/gmaps.js',
		'src/assets/app/custom/general/dashboard.js',
		'src/assets/datatables/datatables.min.js'
	], 'assets/js/plantilla.js')
	.js('src/js/app.js', 'assets/js/app.js')
	.sass('src/css/app.scss', 'assets/css')
	.copyDirectory('src/img', 'assets/img')
	.options({
		fileLoaderDirs: { // To load fonts into assets folder
			fonts: 'assets/fonts'
		}
	});
