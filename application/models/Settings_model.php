<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings_model extends CRUD_model
{
    protected $_table='tbl_login';
    protected $_primary_key='ser_id';

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



