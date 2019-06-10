<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<?= $meta ?>
	<title>Casino | Home</title>
	<?= $favicon ?>

	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-v4.min.css?v=<?= rand() ?>" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css?v=<?= rand() ?>" />
	<script src="<?php echo base_url(); ?>assets/javascript-winwheel/js/TweenMax.min.js?v=<?= rand() ?>"></script>
	<script src="<?php echo base_url(); ?>assets/javascript-winwheel/js/Winwheel.min.js?v=<?= rand() ?>"></script>
</head>

<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

	<div id="app">

		<?= $header_mobile ?>

		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<?= $aside ?>

				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<?= $header ?>

					<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
						<?= $content ?>
					</div>

					<?= $footer ?>

				</div>
			</div>
		</div>

		<?= $quick_panel ?>

		<?= $scroll_top ?>

		<?= $modal ?>
	</div>

	<script>
		var KTAppOptions = {
			"colors": {
				"state": {
					"brand": "#5d78ff",
					"dark": "#282a3c",
					"light": "#ffffff",
					"primary": "#5867dd",
					"success": "#34bfa3",
					"info": "#36a3f7",
					"warning": "#ffb822",
					"danger": "#fd3995"
				},
				"base": {
					"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
					"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
				}
			}
		};
	</script>
	<script src="<?php echo base_url(); ?>assets/js/app.js?v=<?= rand() ?>"></script>
	<script src="<?php echo base_url(); ?>assets/js/plantilla.js?v=<?= rand() ?>"></script>
	<script>
		var roulette = new Winwheel({
			'numSegments': 100,
			'outerRadius': 155,
			'drawText': true,
			'textOrientation': 'curved',
			'segments': [{
					'fillStyle': '#00FF00',
					'text': 'V',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#00FF00',
					'text': 'V',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#FF0000',
					'text': 'R',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
				{
					'fillStyle': '#000000',
					'text': 'N',
					'strokeStyle': '#FFFFFF',
					'textFontSize': 3
				},
			],
			'animation': {
				'type': 'spinToStop',
				'duration': 10,
				'callbackFinished': 'message()',
				'callbackAfter': 'drawSelector()'
			}
		});

		function message() {
			var selected = roulette.getIndicatedSegment();
			$("#roulette_result").val(selected.text);
			$("#button_roulette_result").click();
			roulette.stopAnimation(false);
			roulette.rotationAngle = 0;
			drawSelector();
		}

		drawSelector();

		function drawSelector() {
			var ctx = roulette.ctx;
			ctx.strokeStyle = 'navy';
			ctx.fillStyle = 'black';
			ctx.lineWidth = 6;
			ctx.beginPath();
			ctx.moveTo(170, 0);
			ctx.lineTo(230, 0);
			ctx.lineTo(200, 40);
			ctx.lineTo(171, 0);
			ctx.stroke();
			ctx.fill();
		}
	</script>
</body>

</html>
