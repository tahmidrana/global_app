<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 5/16/2018
 * Time: 1:49 PM
 */

class Login_model extends CRUD_model
{
    protected $_table='tbl_login';
    protected $_primary_key='login_id';

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

    public function login_check($userid, $passwd)
    {
        $this->db->where('user_id', $userid);
        $this->db->where('password', hash("sha256", $passwd));
        $data = $this->db->get('tbl_login');
        return $data;
    }

    public function update_login_status($user_id)
    {
        $data = array(
            'last_login'=> date('Y-m-d H:i:s')
        );
        $this->db->where('user_id', $user_id);
        if($this->db->update('tbl_login', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}



