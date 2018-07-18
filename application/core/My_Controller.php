<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/29/2018
 * Time: 1:44 PM
 */

class My_Controller extends CI_Controller
{
    private $function_exclude = array('__construct', 'methodFinder', 'get_instance');
    public function __construct()
    {
        parent::__construct();
        //$CI = & get_instance();
        //$CI->load->library('session');
        //$CI->load->helper('url');
        if ( !$this->session->userdata('loggedin')) {
            //redirect('login');
        }
        if($this->session->userdata('change_pass_status') == 0) {
            //redirect('change_password');
        }
        /*echo $method = $this->router->fetch_class().'<br>';
        $class_methods=get_class_methods($this);
        //echo '<pre>';
        print_r($class_methods);*/
        //$this->load->model('auth_model');
    }

    public function methodFinder($controllerName, $controller_id)
    {
        $this->auth_model->setTable('tbl_system_function');
        $this->auth_model->setPrimaryKey('tbl_system_controller_ser_id');
        $functionList = $this->auth_model->get($controller_id)->result();
        /*echo '<pre>';
        print_r($functionList);die();*/
        //echo $controllerName;
        include_once(APPPATH.'controllers/'.$controllerName.'.php');
        $classList = get_class_methods($controllerName);
        /*echo '<pre>';
        print_r($classList);
        die();*/

        $i = 1;
        $functions = array();

        if ($functionList) {
            foreach ($functionList as $rowFunction) {
                $functions[$i] = $rowFunction->function_name;

                $i++;
            }
        }

        $class = array();

        foreach ($classList as $value) {
            if (!in_array($value, $this->function_exclude)) {
                if (array_search($value, $functions)) {
                    array_push($class, array('function_name' => $value, 'status' => 1));
                }

                else {
                    array_push($class, array('function_name' => $value, 'status' => 0));
                }
            }
        }

        return $class;
    }
}