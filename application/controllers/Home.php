<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('home/index', $this->getHomeTemplate());
	}

	/*
		private function template Auth
	*/
	private function getHomeTemplate()
	{
		return array(
			'meta' => $this->load->view('partials/meta', '', true),
			'favicon' => $this->load->view('partials/favicon', '', true),
			'footer' => $this->load->view('partials/footer', '', true),
			'content' => $this->load->view('partials/content', '', true),
			'aside' => $this->load->view('partials/aside', [
				'aside_button' => $this->load->view('partials/aside_button', '', true),
				'aside_menu' => $this->load->view('partials/aside_menu', '', true)
			], true),
			'header' => $this->load->view('partials/header', [
				'quick_panel_toggler' => $this->load->view('partials/quick_panel_toggler', '', true),
			], true),
			'header_mobile' => $this->load->view('partials/header_mobile', '', true),
			'quick_panel' => $this->load->view('partials/quick_panel', '', true),
			'scroll_top' => $this->load->view('partials/scroll_top', '', true),
			'modal' => $this->load->view('partials/modal', '', true)
		);
	}
}
