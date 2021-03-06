<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Base_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');

        // Load form validation library
        $this->load->library('form_validation');

        // Cargar model de login
        $this->load->model('Login_model');
        $this->load->model('Cita');

    }


    public function index()
    {
        $data['title'] = 'Login';
        echo $this->templates->render('login', $data);

    }
    // Proceso de login
    public function user_login()
    {
        //Reglas de validación
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            if (isset($this->session->userdata['logged_in'])) {
                redirect('dashboard', 'refresh');
            } else {
                redirect('login', 'refresh');
            }
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $result = $this->Login_model->login($data);
            if ($result == TRUE) {

                $username = $this->input->post('username');
                $result = $this->Login_model->read_user_information($username);
                if ($result != false) {
                    $session_data = array(
                        'id' => $result[0]->id,
                        'username' => $result[0]->username,
                        'email' => $result[0]->email,
                        'nombre' => $result[0]->nombre,
                        'rol' => $result[0]->rol,
                    );
                    // Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    redirect(base_url().'dashboard');
                }
            } else {
                $data ['error'] ='Clave o usuario incorrecto';
                $data['title'] = 'Login';
                echo $this->templates->render('login', $data);
            }
        }
    }
    // Validate and store registration data in database
    public function register() {

    // Check validation for user input in SignUp form
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('cargo', 'Cargo', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            $fecha = new DateTime();
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'nombre' => $this->input->post('nombre'),
                'cargo' => $this->input->post('cargo'),
                'create_time' =>$fecha->format('Y-m-d H:i:s')
            );
            $result = $this->Login_model->registration_insert($data);
            if ($result == TRUE) {
                $data['message_display'] = 'Registration Successfully !';
                $this->load->view('login', $data);
            } else {
                $data['message_display'] = 'Username already exist!';
                $this->load->view('register', $data);
            }
        }
    }
// Logout from admin page
    public function logout()
    {

        // Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        redirect('login', 'refresh');
    }

}
