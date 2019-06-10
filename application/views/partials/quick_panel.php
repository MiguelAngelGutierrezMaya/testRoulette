<!-- begin::Quick Panel -->
<div id="kt_quick_panel" class="kt-quick-panel">
	<a href="#" class="kt-quick-panel__close" id="kt_quick_panel_close_btn"><i class="fa fa-times"></i></a>
	<div class="kt-quick-panel__nav">
		<ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
			<li class="nav-item active">
				<a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_tab_notifications" role="tab">Cuenta</a>
			</li>
		</ul>
	</div>
	<div class="kt-quick-panel__content">
		<div class="tab-content">
			<div class="tab-pane fade show kt-scroll active" id="kt_quick_panel_tab_notifications" role="tabpanel">
				<div class="kt-notification">
					<form id="logout-form" action="#" method="POST" style="display: none;">
						<input type="hidden" name="_csrfToken" value="#" />
					</form>
					<a href="#" class="kt-notification__item" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
						<div class="kt-notification__item-icon">
							<i class="fas fa-sign-out-alt fa-2x"></i>
						</div>
						<div class="kt-notification__item-details">
							<div class="kt-notification__item-title">
								Salir
							</div>
							<div class="kt-notification__item-time">
								Cierra la sesión de tu cuenta
							</div>
						</div>
					</a>
					<a href="#" @click.prevent="" class="kt-notification__item">
						<div class="kt-notification__item-icon">
							<i class="fa fa-lock fa-2x"></i>
						</div>
						<div class="kt-notification__item-details">
							<div class="kt-notification__item-title">
								Cambiar contraseña
							</div>
							<div class="kt-notification__item-time">
								Cambia la contraseña de tu cuenta
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end::Quick Panel -->
