<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CRUD_model
{
    protected $_table = 'tbl_user';
    protected $_primary_key = 'ser_id';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param string $table
     */
    public function setTable($table)
    {
        $this->_table = $table;
    }

    /**
     * @param string $primary_key
     */
    public function setPrimaryKey($primary_key)
    {
        $this->_primary_key = $primary_key;
    }

    public function get_user_by_id($userid)
    {
        $this->db->select('a.*, b.group_name as user_type');
        $this->db->from('tbl_user a');
        $this->db->join('tbl_group b', 'a.group_id=b.ser_id');
        $this->db->where('a.user_id', $userid);
        $data = $this->db->get();
        return $data->row();
    }

    public function get_group_list()
    {
        $this->db->select('*');
        $this->db->from('tbl_group');
        $this->db->where('ser_id !=', 1);
        $data = $this->db->get();
        return $data->result();
    }

    public function save_user()
    {
        $data = array(
            'user_id' => $this->input->post('user_id'),
            'user_name' => $this->input->post('user_name'),
            'emp_id' => $this->input->post('user_id'),
            'designation' => $this->input->post('designation'),
            'group_id' => $this->input->post('group_id'),
            'status' => $this->input->post('status')
        );

        $this->db->trans_start();

        $this->db->insert('tbl_user', $data);

        $login_data = array(
            'password'=> hash("sha256", 'welcome'),
            'status'=> $this->input->post('status'),
            'change_pass_status' => 0,
            'tbl_user_user_id' => $this->input->post('user_id')
        );
        $this->db->insert('tbl_login', $login_data);

        if($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function get_user_list()
    {
        $this->db->select('a.*, b.name as user_type');
        $this->db->from('tbl_user a');
        $this->db->join('aauth_groups b', 'a.group_id=b.id');
        $this->db->where('a.group_id !=', 1);
        $data = $this->db->get();
        return $data->result();
    }

    public function update_user($userid)
    {
        $data = array(
            'user_id' => $this->input->post('user_id'),
            'user_name' => $this->input->post('user_name'),
            'emp_id' => $this->input->post('user_id'),
            'designation' => $this->input->post('designation'),
            'group_id' => $this->input->post('group_id')
        );

        $this->db->trans_start();

        $this->db->where('user_id', $userid);
        $this->db->update('tbl_user', $data);

        $login_data = array(
            'tbl_user_user_id' => $this->input->post('user_id')
        );
        $this->db->where('tbl_user_user_id', $userid);
        $this->db->update('tbl_login', $login_data);

        if($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function deactivate_user($userid)
    {
        $this->db->trans_start();

        $this->db->where('user_id', $userid);
        $this->db->update('tbl_user', array('status'=>0));

        $this->db->where('tbl_user_user_id', $userid);
        $this->db->update('tbl_login', array('status'=>0));

        if($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function activate_user($userid)
    {
        $this->db->trans_start();

        $this->db->where('user_id', $userid);
        $this->db->update('tbl_user', array('status'=>1));

        $this->db->where('tbl_user_user_id', $userid);
        $this->db->update('tbl_login', array('status'=>1));

        if($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function get_user_log($userid)
    {
        $this->db->where('created_by', $userid);
        $this->db->order_by('created_on', 'desc');
        $data = $this->db->get('tbl_app_log');
        return $data->result();
    }
}
