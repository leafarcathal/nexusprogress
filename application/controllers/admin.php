<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('User');
        $this->load->model('Admin_Model');
    }

    public function index() {
        $header['title'] = 'Dashboard - Nexus Progress';

        if (($this->session->userdata('username'))) {
            redirect('admin/dashboard');
        }

        $this->load->view('admin/index', $header);
    }

    public function login() {

        $header['title'] = 'Dashboard - Nexus Progress';

        if ($this->input->post('username')) {

            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $password = do_hash($password, 'md5');

            if ($this->User->login($username, $password)) {
                $data['dados'] = $this->User->login($username, $password);
                $this->session->set_userdata('id_user', $data['dados'][0]['id_user']);
                $this->session->set_userdata('username', $data['dados'][0]['username']);
                $this->session->set_userdata('email', $data['dados'][0]['email']);
                redirect('admin/dashboard');
            } else {
                $header['danger'] = 'Invalid username or password.';
            }
            $this->load->view('admin/index', $header);
        }
    }

    public function logout() {

        $this->session->sess_destroy();
        redirect('admin');
    }

    public function dashboard() {

        if (!($this->session->userdata('username'))) {
            redirect('admin');
        }

        $header['title'] = 'Dashboard - Nexus Progress';

        $header['select_contents'] = $this->Admin_Model->loadContents(null, 'id_content');
        $header['contents'] = $this->Admin_Model->loadContents(null, 'id_content');
        $header['lights'] = $this->Admin_Model->loadLights(null, 'id_light');

        if ($this->input->post('content_number')) {

            $content = $this->input->post('content');
            $light = $this->input->post('light');
            $id_user = $this->session->userdata('id_user');

            for ($i = 1; $i <= $this->input->post('content_number'); $i++) {
                if ($this->Admin_Model->addUserPoints($id_user, $content, $light)) {
                    $header['success'] = 'Your progress was sucessfully saved!';
                } else {
                    $header['danger'] = 'Oops, we had a problem! Please try to add your progress later';
                }
            }
        }

        $header['user_points'] = $this->Admin_Model->loadUserPoints($this->session->userdata('id_user'));
        $header['last_points'] = $this->Admin_Model->loadLastPoints($this->session->userdata('id_user'));

        $this->load->view('admin/progress', $header);
    }

    public function about() {
        $header['title'] = 'About - Nexus Progress';

        $this->load->view('admin/about', $header);
    }

    public function contactUs() {
        
       if (!($this->session->userdata('username'))) {
            redirect('admin');
        }

        $header['title'] = 'Contact Us - Nexus Progress';

        if ($this->input->post('email')) {

            $email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');

            $this->load->library('email');

            $this->email->from('/usr/sbin/sendmail');
            $this->email->to('ewan@nexusprogress.com');

            $this->email->subject('Contact Form - Nexus Progress');
            $this->email->message('From: ' . $email . '<br><br>'
                    . 'Subject: ' . $subject . '<br><br>'
                    . 'Message: ' . $message);

            if ($this->email->send()) {
                $header['success'] = "Your e-mail was sent. You'll receive an answer as soon as possible";
            } else {
                $header['danger'] = "Oops, something went wrong! Please try to send your e-mail later.";
            }
        }

        $this->load->view('admin/contact-us', $header);
    }

    public function registerUser() {
        

        $header['title'] = 'Register - Nexus Progress';
        $header['success'] = false;
        $header['danger'] = false;

        if ($this->input->post('username')) {

            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');

            $password = do_hash($password, 'md5');

            if ($this->User->checkUser($username)) {
                $header['danger'] = 'Username already in use. Please choose another one.';
            } elseif ($this->User->checkEmail($email)) {
                $header['danger'] = 'E-mail already in use. Please choose another one.';
            } else {
                $this->User->addUser($username, $password, $email);
                $header['success'] = 'Your registration was successful. Please login to access your progress.';
            }
        }
        $this->load->view('admin/index', $header);
    }

    public function editProfile() {
        
       if (!($this->session->userdata('username'))) {
            redirect('admin');
        }
        
        $header['title'] = 'Profile - Nexus Progress';

        if ($this->input->post('username')) {

            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $id_user = $this->session->userdata('id_user');

            if ($username <> $this->session->userdata('username')) {
                if ($this->User->checkUser($username)) {
                    $header['danger'] = 'Username already in use. Please choose another one.';
                } else {
                    $this->User->updateUser($id_user, $username, $email);
                    $header['success'] = 'Profile updated!';
                    $this->session->set_userdata('id_user', $id_user);
                    $this->session->set_userdata('username', $username);
                    $this->session->set_userdata('email', $email);
                }
            } elseif ($email <> $this->session->userdata('email')) {
                if ($this->User->checkEmail($email)) {
                    $header['danger'] = 'E-mail already in use. Please choose another one.';
                } else {
                    $this->User->updateUser($id_user, $username, $email);
                    $header['success'] = 'Profile updated!';
                    $this->session->set_userdata('id_user', $id_user);
                    $this->session->set_userdata('username', $username);
                    $this->session->set_userdata('email', $email);
                }
            } else {
                $header['success'] = 'Profile updated!';
            }
        }
        $this->load->view('admin/profile', $header);
    }

    public function editPassword() {
        
        if (!($this->session->userdata('username'))) {
            redirect('admin');
        }

        $header['title'] = 'Profile - Nexus Progress';

        $password = $this->input->post('new_password');
        $confirm = $this->input->post('match_password');

        if ($password <> $confirm) {
            $header['danger'] = 'Passwords does not match.';
        } else {
            $password = do_hash($password, 'md5');
            $this->User->updatePassword($this->session->userdata('id_user'), $password);
            $header['success'] = 'Password updated!';
        }
        
        $this->load->view('admin/profile', $header);
    }

    public function passwordRecovery() {

        $header['title'] = 'Password Recovery - Nexus Progress';

        if ($this->input->post('email')) {

            $desired_length = 10; //or whatever length you want
            $unique = uniqid();
            $your_random_word = substr($unique, 0, $desired_length);
            $email = $this->input->post('email');
            
            if ($this->User->checkEmail($email)) {
                
                $user = $this->User->loadUserByEmail($email);
                $this->Admin_Model->passwordRecoveryAdd($user[0]['id_user'], $your_random_word);
                $this->session->set_userdata('password_recovery_id', $user[0]['id_user']);

                $email = $this->input->post('email');
                $subject = $this->input->post('subject');
                $message = $this->input->post('message');
                $username = $user[0]['username'];
                
                $this->load->library('email');

                $this->email->from('/usr/sbin/sendmail');
                $this->email->to($email);
                 $this->email->set_mailtype("html");

                $this->email->subject('Password Recovery - Nexus Progress');
                $this->email->message('Hello! This is the password recovery system from Nexus Progress<br><br>'
                        . "We would never make you create a new account and fill up everything again.<br><br>"
                        . "Here's your username: $username<br><br>"
                        . "And here you are a confirmation code. Please put it in our recovery password page: <br><br>"
                        . "<b>$your_random_word</b><br><br>"
                        . "After putting this code, you'll be able to change your password.<br><br>"
                        . "Best regards,<br>"
                        . "Nexus Progress Team");

                if ($this->email->send()) {
                    $header['success'] = "A confirmation code has been sent to your e-mail address. Please verify. ";
                     $this->load->view('admin/password-recovery', $header);
                } else {
                    $header['danger'] = "Oops, something went wrong! Please try to send your e-mail later.";
                    $this->load->view('admin/index', $header);
                }
            } else {
                $header['danger'] = "E-mail not found in our database";
                $this->load->view('admin/index', $header);
            }
        }
        
    }
    
    public function confirmPasswordChange(){
        
        $header['title'] = 'Password Recovery - Nexus Progress';
        
        if($this->input->post('confirmation')){
            
            $code = $this->input->post('confirmation');
            $id_user = $this->session->userdata('password_recovery_id');
            
            if($this->Admin_Model->passwordRecoveryCheck($id_user, $code)){
                $this->load->view('admin/new-password',$header);
            }
            
        }
        
    }
    
    public function passwordChangeFromRecovery(){
        
        $header['title'] = 'Profile - Nexus Progress';

        $password = $this->input->post('new_password');
        $confirm = $this->input->post('match_password');
        $id_user = $this->input->post('id_user');

        if ($password <> $confirm) {
            $header['danger'] = 'Passwords does not match.';
             $this->load->view('admin/confirmPasswordChange', $header);
        } else {
            $password = do_hash($password, 'md5');
            $this->User->updatePassword($id_user, $password);
            $header['success'] = 'Password updated! Please login.';
             $this->load->view('admin/index', $header);
        }
        
    }
    
    public function removeContent($id_light){
        
        if (!($this->session->userdata('username'))) {
            redirect('admin');
        }
        
        $header['title'] = 'Dashboard - Nexus Progress';
        
        if($this->Admin_Model->removePoint($this->session->userdata('id_user'), $id_light)){
            $header['success'] = 'Content successfully removed.';
            redirect('admin/dashboard');
        } else {
            $header['danger'] = 'Content was not removed - Please try again later';
            redirect('admin/dashboard');
        }
        
        
        
}
}
