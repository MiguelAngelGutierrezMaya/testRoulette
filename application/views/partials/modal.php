<!--begin::Modal-->
<div class="modal fade" id="email" role="dialog" aria-labelledby="user-label" aria-modal="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="user-label"> Enviar email</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">Campos obligatorios (*)</h3>
						</div>
					</div>
					<!--begin::Form-->
					<form class="kt-form" @submit.prevent="sendEmail()">
						<div class="kt-portlet__body">
							<div class="accordion" id="user_store">
								<div class="card">
									<div class="card-header">
										<div class="card-title" data-toggle="collapse" data-target="#user_basic_info" aria-expanded="true" aria-controls="user_basic_info">Información Básica</div>
									</div>
									<div id="user_basic_info" class="collapse show" aria-labelledby="user_basic_info_header" data-parent="#user_store" style>
										<div class="card-body">
											<div class="form-group">
												<label for="input_email">Correo electrónico</label>
												<i class="fa fa-asterisk text-danger"></i>
												<input id="input_email" type="email" class="form-control" placeholder="example@example.com" name="input_email" v-model.trim="input_email">
												<span v-if="view_email" v-text="text_email"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="kt-portlet__foot">
							<div class="kt-form__actions">
								<button type="submit" class="btn btn-primary btn-sm">
									<i class="fa fa-send"></i> Enviar
								</button>
							</div>
						</div>
					</form>
					<!--end::Form-->
				</div>
			</div>
		</div>
	</div>
</div>
<!--end::Modal-->
