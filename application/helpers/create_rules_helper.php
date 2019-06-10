<?php
if (!function_exists('create_rules')) {
	function create_rules($id)
	{
		if ($id == 1) {
			return array(
				array(
					'field' => 'names',
					'label' => 'Nombres',
					'rules' => 'required|is_unique[users.username]|min_length[5]|max_length[80]|trim',
					'errors' => array(
						'required' => 'El campo %s es obligatorio',
						'is_unique' => 'El %s de usuario se encuentra repetido',
						'min_length' => 'Texto demasiado corto para el campo %s',
						'max_length' => 'Texto demasiado largo para el campo %s',
					),
				),
				array(
					'field' => 'surnames',
					'label' => 'Apellidos',
					'rules' => 'required|min_length[5]|max_length[80]|trim',
					'errors' => array(
						'required' => 'El campo %s es obligatorio',
						'is_unique' => 'El %s de usuario se encuentra repetido',
						'min_length' => 'Texto demasiado corto para el campo %s',
						'max_length' => 'Texto demasiado largo para el campo %s',
					),
				),
				array(
					'field' => 'total_amount',
					'label' => 'Monto del jugador',
					'rules' => 'required|integer',
					'errors' => array(
						'required' => 'El campo %s es obligatorio',
						'integer' => 'El %s debe ser un numero entero'
					),
				)
			);
		}
		if ($id == 2) {
			return array(
				array(
					'field' => 'email',
					'label' => 'Correo Electronico',
					'rules' => 'required|is_unique[persons.email]|valid_email|trim',
					'errors' => array(
						'required' => 'Debes ingresar un %s',
						'is_unique' => 'El %s se encuentra repetido',
						'valid_email' => 'Debe ingresar un %s valido',
					),
				)
			);
		}
	}
}
