<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
	<div class="kt-header-mobile__logo">
		<a href="#" @click.prevent="menu=0">
			<img alt="Logo" src="<?php echo base_url(); ?>assets/img/casino.png" />
		</a>
	</div>
	<div class="kt-header-mobile__toolbar">
		<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><span class="text-light">{{ user_name }}</span>&nbsp;&nbsp;<i class="fas fa-angle-down"></i></button>
		<button class="kt-header-mobile__toggler" id="kt_aside_mobile_toggler"><span></span></button>
	</div>
</div>
<!-- end:: Header Mobile -->
