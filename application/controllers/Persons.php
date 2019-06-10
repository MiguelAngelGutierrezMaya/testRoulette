<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persons extends CI_Controller
{
	/*
		construct_method
	*/
	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('create_rules'));

		$this->load->model('Person');
		$this->load->model('User');
		$this->load->model('Email');

		$this->form_validation->set_error_delimiters('', '');
	}

	/**
	 * Index function
	 * @Return JSON
	 */
	public function index()
	{
		$limit = 5;

		$offset = (int)$this->uri->segment(3) - 1;
		$column = $this->uri->segment(4);
		$find = $this->uri->segment(5);
		$obj_total = $this->Person->count($find, $column, 0);

		if (trim($find) == '') {
			$total = $obj_total->num_rows;
		} else {
			$total = $obj_total[0]->num_rows;
		}

		$total_pages = ceil($total / $limit);
		$persons = $this->Person->persons_paginate($limit, ($offset * $limit), $find, $column, 0);
		$last = ($offset + 1) * $limit;

		if ($last > $total) {
			$last = $total;
		}

		return $this->json_response([
			'pagination' => [
				'total_data' => (integer)$total,
				'total' => $total_pages,
				'current_page' => $offset + 1,
				'first' => ((($offset + 1) * $limit) - $limit) + 1,
				'last' => (int)$last
			],
			'persons' => $persons
		], 200);
	}

	/**
	 * Find users active function
	 * @Return JSON
	 */
	public function findUsersActive()
	{
		$limit = 3;

		$offset = (int)$this->uri->segment(3) - 1;
		$column = $this->uri->segment(4);
		$find = $this->uri->segment(5);
		$obj_total = $this->Person->count($find, $column, 1);

		if (trim($find) == '') {
			$total = $obj_total->num_rows;
		} else {
			$total = $obj_total[0]->num_rows;
		}

		$total_pages = ceil($total / $limit);
		$persons = $this->Person->persons_paginate($limit, ($offset * $limit), $find, $column, 1);
		$last = ($offset + 1) * $limit;

		if ($last > $total) {
			$last = $total;
		}

		return $this->json_response([
			'pagination' => [
				'total_data' => (integer)$total,
				'total' => $total_pages,
				'current_page' => $offset + 1,
				'first' => ((($offset + 1) * $limit) - $limit) + 1,
				'last' => (int)$last
			],
			'persons' => $persons
		], 200);
	}

	/**
	 * Get person by id function
	 * @Return JSON
	 */
	public function find()
	{
		$id = (int)$this->uri->segment(3);
		$person = $this->Person->find($id);

		return $this->json_response([
			'person' => $person
		], 200);
	}

	/**
	 * Store function
	 * @Return JSON
	 */
	public function store()
	{
		$data = $this->input->post();

		$this->form_validation->set_rules(create_rules(1));
		$this->form_validation->set_rules(create_rules(2));

		if ($this->form_validation->run() == FALSE) {
			return $this->json_response(array(
				'type' => 1,
				'names' => form_error('names'),
				'surnames' => form_error('surnames'),
				'email' => form_error('email'),
				'total_amount' => form_error('total_amount')
			), 409);
		}

		if ($this->Person->create($data)) {
			return $this->json_response([
				'success' => true,
				'title' => 'Registro satisfactorio',
				'msj' => 'El usuario ha sido creado satisfactoriamente'
			], 200);
		}
	}

	/**
	 * Store function
	 * @Return JSON
	 */
	public function update()
	{
		$data = $this->input->post();

		$this->form_validation->set_rules(create_rules(1));

		if ($this->form_validation->run() == FALSE) {
			return $this->json_response(array(
				'type' => 1,
				'names' => form_error('names'),
				'surnames' => form_error('surnames'),
				'email' => form_error('email'),
				'total_amount' => form_error('total_amount')
			), 409);
		}

		if ($this->Person->update($data, $data["id"])) {
			return $this->json_response([
				'success' => true,
				'title' => 'Actualizacion satisfactoria',
				'msj' => 'El usuario ha sido actualizado satisfactoriamente'
			], 200);
		}
	}

	/**
	 * Disable function
	 * @Return JSON
	 */
	public function disable()
	{
		$data = $this->input->post();

		if ($this->Person->disable((int)$data["id"])) {
			return $this->json_response([
				'success' => true,
				'title' => 'Usuario inactivado',
				'msj' => 'El usuario ha sido inactivado con exito'
			], 200);
		}
	}

	/**
	 * Enable function
	 * @Return JSON
	 */
	public function enable()
	{
		$data = $this->input->post();

		if ($this->Person->enable((int)$data["id"])) {
			return $this->json_response([
				'success' => true,
				'title' => 'Usuario activado',
				'msj' => 'El usuario ha sido activado con exito'
			], 200);
		}
	}

	/**
	 * Delete function
	 * @Return JSON
	 */
	public function delete()
	{
		$data = $this->input->post();

		if ($this->Person->delete((int)$data["id"])) {
			return $this->json_response([
				'success' => true,
				'title' => 'Usuario eliminado',
				'msj' => 'El usuario ha sido eliminado con exito'
			], 200);
		}
	}

	/**
	 * Bet function
	 * @Return JSON
	 */
	public function bet()
	{
		$data = $this->input->post();

		if ($this->Person->bet($data)) {
			return $this->json_response([
				'success' => true,
				'title' => 'Apuesta registrada',
				'msj' => 'el valor ingresado se incluyo en juego'
			], 200);
		}
	}

	/**
	 * Bet result function
	 * @Return JSON
	 */
	public function betResult()
	{
		$data = $this->input->post();
		$array = array();
		$result = 0;

		foreach ($data as $index => $row) {
			$arr = explode('-', $index);

			if ($arr[1] != 'result') {
				$array[$arr[0]][$arr[1]] = $row;
			} else {
				$result = $row;
			}
		}

		foreach ($array as $row) {
			$this->Person->betResult($row, $result);
		}

		return $this->json_response([
			'success' => true,
			'title' => 'Apuestas actualizadas en la BD',
			'msj' => 'result ok'
		], 200);
	}

	/**
	 * Send email function
	 * @Return JSON
	 */
	public function sendEmail()
	{
		$data = $this->input->post();

		if ($this->Email->sendBasicEmail('miguel.gutierrez@correounivalle.edu.co', 'Miguel Gutierrez', $data["input_email"], 'Invitacion a la ruleta')) {
			return $this->json_response([
				'success' => true,
				'title' => 'Email enviado',
				'msj' => 'El email ha sido enviado con exito'
			], 200);
		} else {
			return $this->json_response([
				'success' => false,
				'title' => 'Error al enviar email',
				'msj' => 'Ha ocurrido un error, no se pudo mandar el email'
			], 422);
		}
	}

	public function json_response($array, $http_header)
	{
		echo json_encode($array);
		$this->output->set_status_header($http_header);
	}
}
