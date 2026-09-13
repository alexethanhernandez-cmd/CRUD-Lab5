<?php 
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); 

/**
 * Controller: AuthController
 */
class AuthController extends Controller 
{ 
    private $session; 

    // Hardcoded login credentials
    private $login_username = 'admin';
    private $login_password = 'admin123';

    public function __construct() 
    { 
        parent::__construct(); 

        $this->session = load_class('Session', 'libraries'); 
    } 

    /**
     * GET /login
     * POST /login
     */
    public function login() 
    { 
        // If already logged in, go to products
        if ($this->session->has_userdata('user_id')) { 
            redirect('products'); 
            return; 
        } 

        // Process login form
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = trim($this->io->post('username'));
            $password = $this->io->post('password');

            // Check hardcoded credentials
            if (
                $username === $this->login_username &&
                $password === $this->login_password
            ) {

                // Store login information in session
                $this->session->set_userdata('user_id', 1);
                $this->session->set_userdata(
                    'username',
                    $this->login_username
                );

                // Regenerate session ID
                $this->session->after_successful_login();

                // Go to products
                redirect('products');
                return;

            } else {

                $data['error'] = 'Invalid username or password.';
                $this->call->view('auth/login', $data);
                return;
            }
        }

        // Display login page
        $data['error'] = $this->session->flashdata('login_error');

        $this->call->view('auth/login', $data); 
    } 

    /**
     * GET /logout
     */
    public function logout() 
    { 
        $this->session->sess_destroy(); 
        redirect('login'); 
    } 
}