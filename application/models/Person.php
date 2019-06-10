<?php
class Person extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function persons_paginate($limit, $offset, $find, $column, $type)
	{
		$this->db->select('*');
		$this->db->from('persons');

		if (trim($find) != '') {
			$this->db->like($column, $find);
		}

		if ($type == 1) {
			$this->db->where('state', 1);
		}

		$this->db->order_by("id", "desc");
		$this->db->limit($limit, $offset);
		$request = $this->db->get();

		return $request->result();
	}

	public function find($id)
	{
		$this->db->select('*')->where('id', $id);
		$request = $this->db->get('persons');
		return $request->row();
	}

	public function create($request)
	{
		if ($this->db->insert('persons', $request)) {
			return true;
		} else {
			return false;
		}
	}

	public function update($request, $id)
	{
		$this->db->set($request);
		$this->db->where('id', $id);

		if ($this->db->update('persons')) {
			return true;
		} else {
			return false;
		}
	}

	public function count($find, $column, $type)
	{
		if (trim($find) == '') {
			if ($type == 1) {
				return $this->db->query("SELECT count(id) as num_rows FROM persons WHERE state=1")->row();
			} else {
				return $this->db->query("SELECT count(id) as num_rows FROM persons")->row();
			}
		} else {
			$this->db->select('count(id) as num_rows')->from('persons');

			if ($type == 1) {
				$this->db->where('state', 1);
			}

			$this->db->like($column, $find);
			$this->db->order_by("id", "desc");

			$request = $this->db->get();
			return $request->result();
		}
	}

	public function disable($id)
	{
		$this->db->set(array('state' => 0));
		$this->db->where('id', $id);

		if ($this->db->update('persons')) {
			return true;
		} else {
			return false;
		}
	}

	public function enable($id)
	{
		$this->db->set(array('state' => 1));
		$this->db->where('id', $id);

		if ($this->db->update('persons')) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		if ($this->db->delete('persons', array('id' => $id))) {
			return true;
		} else {
			return false;
		}
	}

	public function bet($data)
	{
		$user = $this->find($data["id"]);
		$value = $user->total_amount - $data["amount"];

		$this->db->set(['total_amount' => $value]);
		$this->db->where('id', $data["id"]);

		if ($this->db->update('persons')) {
			return true;
		} else {
			return false;
		}
	}

	public function betResult($data, $result)
	{
		$user = $this->find($data["id"]);
		$value = $user->total_amount;

		if ($result == $data["color"]) {
			switch ($result) {
				case 1:
					$value += $data["amount"] * 2;
					break;
				case 2:
					$value += $data["amount"] * 2;
					break;
				case 3:
					$value += $data["amount"] * 15;
					break;
			}
		}

		$this->db->set(['total_amount' => $value]);
		$this->db->where('id', $data["id"]);

		if ($this->db->update('persons')) {
			return true;
		} else {
			return false;
		}
	}
}
