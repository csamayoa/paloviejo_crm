<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	    $data['name'] = "Carlos";
        $this->load->helper('url');
		$this->load->view('index', $data);



	}
	public function greet_person($name){
        $data['name'] = "Carlos";
	    $this->load->view('greet_person', $data);
    }
	public function other(){
	    $this->load->view('welcome_message');
    }
    public function dashboard(){
	    $this->load->view('dashboard');
    }

}