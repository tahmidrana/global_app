<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/10/2018
 * Time: 1:04 PM
 */

class Home_model extends CRUD_model
{
    protected $_table='tbl_qc_form';
    protected $_primary_key='qc_form_id';

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
}