<?php
class User extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	/*
		get user by username or email and password
	*/
	public function login($username, $password)
	{
		$request = $this->db->get_where('users', array('username' => $username), 1);

		if (!$request->result()) {
			$request = $this->db->get_where('persons', array('email' => $username), 1);

			if (!$request->result()) {
				return false;
			}
		}
		if (!password_verify($password, $request->row()->password)) {
			return false;
		}
		return $request->row();
	}
}
