<!-- begin:: Aside Menu -->
<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
	<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
		<ul class="kt-menu__nav ">
			<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
				<a href="#" @click.prevent="menu=0" class="kt-menu__link ">
					<span class="kt-menu__link-icon">
						<i class="fas fa-cube text-info"></i>
					</span>
					<span class="kt-menu__link-text">Menú principal</span>
				</a>
			</li>
			<li class="kt-menu__section ">
				<h4 class="kt-menu__section-text">Opciones</h4>
				<i class="kt-menu__section-icon flaticon-more-v2"></i>
			</li>
			<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
				<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon">
						<i class="fas fa-cog text-info"></i>
					</span>
					<span class="kt-menu__link-text">Configuración</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
					<ul class="kt-menu__subnav">
						<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
							<span class="kt-menu__link">
								<span class="kt-menu__link-text">Configuración de contenido</span>
							</span>
						</li>
						<li class="kt-menu__item " aria-haspopup="true">
							<a href="#" @click.prevent="menu=1" class="kt-menu__link ">
								<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="kt-menu__link-text">Personas</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
				<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon">
						<i class="fas fa-clipboard-list text-info"></i>
					</span>
					<span class="kt-menu__link-text">Operación</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
					<ul class="kt-menu__subnav">
						<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
							<span class="kt-menu__link">
								<span class="kt-menu__link-text">Operaciones</span>
							</span>
						</li>
						<li class="kt-menu__item " aria-haspopup="true">
							<a href="#" @click.prevent="menu=0" class="kt-menu__link ">
								<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="kt-menu__link-text">Administrar atracción</span>
							</a>
						</li>
						<li class="kt-menu__item " aria-haspopup="true">
							<a href="#" @click.prevent="" class="kt-menu__link " data-toggle="modal" data-target="#email">
								<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="kt-menu__link-text">Enviar email</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
		</ul>
	</div>
</div>
<!-- end:: Aside Menu -->
