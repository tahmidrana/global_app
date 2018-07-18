<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Riyad
 * Date: 4/5/2018
 * Time: 12:38 PM
 */
//include_once(APPPATH.'core/My_Controller.php');
class settings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('main_menu', 'Settings');
        $this->load->model('Settings_model');
        if ( !$this->session->userdata('loggedin'))
        {
            //redirect('login');
        }
    }

    public function change_password(){
        $this->session->set_userdata('sub_menu','change_password');
        $data['alert_msg'] = 'inc/message.php';
        $data['left_menu']=$this->aauth->get_menu();
        $data['main_content'] = 'vw_settings/vw_change_password';
        $this->load->view('vw_master',$data);
    }
    public function check_pass()
    {
        $id=$this->input->post('id');
        $pass=$this->input->post('pass');
        $result=$this->Settings_model->get(array('password' => hash("sha256", $pass),'login_id'=>$id,))->result_array();
        if($result)
        {
            echo $result['0']['login_id'];
        }
        else
        {
            echo '';
        }
    }

    public function password_change()
    {
        $repeat_p=$this->input->post('repeat_p');
        $login_id=$this->input->post('login_id2');
        $result = $this->Settings_model->update($login_id,array('password'=>hash("sha256", $repeat_p),'change_pass_status'=>1));
        if($this->session->userdata('change_pass_status')=='0') {
            $this->session->set_userdata('change_pass_status', '1');
            $this->session->set_flashdata('success', 'Password Successfully Changed');
            redirect(base_url() . 'home','refresh');
        } else {
            $this->session->set_userdata('change_pass_status', '1');
            $this->session->set_flashdata('success', 'Password Successfully Changed');
            redirect(base_url() . 'change_password','refresh');
        }

    }

}