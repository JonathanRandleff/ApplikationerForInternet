<?php
class Member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Member_model', 'user');
    }

    public function index()
    {
        if ($this->session->userdata('is_authenticated') == FALSE) {
            redirect('member/login'); // the user is not logged in, redirect them!
        } else {
            $this->user->setUserID($this->session->userdata('id'));
            $data['userInfo'] = $this->user->getUserInfo();
            $this->load->view('member/member', $data);
        }
    }

    public function view($page = 'login')
    {
        if ( ! file_exists(APPPATH.'views/login/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('login/'.$page, $data);
    }
    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');

        if ($this->form_validation->run() === FALSE)
        {
            $this->view('register');
        }
        else
        {
            // post values
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            // set post values
            $this->user->setUserName($username);
            $this->user->setPassword($password);
            // insert values in database
            $this->user->createUser();
            redirect(base_url()."member");

        }
    }
    public function login()
    {
        $this->load->view('member/login');
    }
    // Login Action
    function doLogin() {
        // Check form  validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('member/login');
        } else {
            $sessArray = array();
            //Field validation succeeded.  Validate against database
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->user->setUserName($username);
            $this->user->setPassword($password);

            //query the database
            $result = $this->user->login();

            if($result) {
                foreach($result as $row) {
                    $sessArray = array(
                        'id' => $row->id,
                        'username' => $row->username,
                        'is_authenticated' => TRUE,
                    );
                    $this->session->set_userdata($sessArray);
                    $this->session->set_userdata('username',$username);
                }
                redirect('member/view/member');
            } else {
                redirect('member?msg=1');
            }
        }
    }
    // Logout
    public function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('is_authenticated');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('member');
    }
}
