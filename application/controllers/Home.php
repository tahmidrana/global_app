<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Riyad
 * Date: 4/5/2018
 * Time: 12:38 PM
 */

//include_once(APPPATH.'core/My_Controller.php');
class Home extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('main_menu', 'home');
        $this->load->model('config_model');
        $this->load->model('home_model');
        //echo $method = $this->router->fetch_class();
        //echo $method = $this->router->fetch_method();
        
    }

    public function index() {
        $this->session->set_userdata('sub_menu', '');
        $data['main_content'] = 'vw_home/vw_home';
        $this->load->view('vw_master', $data);
    }

    public function abc()
    {
        $this->session->set_userdata('sub_menu', '');
        $data['main_content'] = 'vw_home/vw_home';
        $this->load->view('vw_master', $data);
    }

}