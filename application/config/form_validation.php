<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array (
    'save_evaluation_form' => array (
        array(
            'field' => 'qc_form_name',
            'label' => 'Form Name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'tbl_grade_grade_id',
            'label' => 'Grade',
            'rules' => 'required'
        )
    ),
    'save_clinic_form' => array (

        array(
            'field' => 'clinic_name',
            'label' => 'Clinic Name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'office_phone_number',
            'label' => 'Office Phone Number',
            'rules' => 'trim|required|numeric|min_length[11]|max_length[11]'
        ),
        array(
            'field' => 'street_address',
            'label' => 'Street Address',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'division',
            'label' => 'Division',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'district',
            'label' => 'district',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'upazilla_id',
            'label' => 'upazilla',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'organization_id',
            'label' => 'organization name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'status',
            'label' => 'status',
            'rules' => 'trim|required'
        )

    ),
    'update_clinic_form' => array (

        array(
            'field' => 'clinic_name',
            'label' => 'Clinic Name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'office_phone_number',
            'label' => 'Office Phone Number',
            'rules' => 'trim|required|numeric|min_length[11]|max_length[11]'
        ),
        array(
            'field' => 'street_address',
            'label' => 'Street Address',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'status',
            'label' => 'status',
            'rules' => 'trim|required'
        )

    ),
    'save_user' => array (

        array(
            'field' => 'user_pin',
            'label' => 'Staff Pin',
            'rules' => 'trim|required|is_unique[tbl_user.user_id]|is_unique[tbl_login.tbl_user_user_id]'
        ),
        array(
            'field' => 'user_name',
            'label' => 'Staff Name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'phone_number',
            'label' => 'Phone Number',
            'rules' => 'trim|required|min_length[11]|max_length[11]'
        ),
        array(
            'field' => 'division',
            'label' => 'Division',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'district',
            'label' => 'District',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'upazilla_id',
            'label' => 'Upazilla',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'organization_id',
            'label' => 'organization name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'status',
            'label' => 'status',
            'rules' => 'trim|required'
        )

    ),
    'update_user' => array (

        array(
            'field' => 'user_id',
            'label' => 'Staff Pin',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'user_name',
            'label' => 'Staff Name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'phone_number',
            'label' => 'Phone Number',
            'rules' => 'trim|required|min_length[11]|max_length[11]'
        ),
        array(
            'field' => 'division',
            'label' => 'Division',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'district',
            'label' => 'District',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'upazilla_id',
            'label' => 'Upazilla',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'organization_id',
            'label' => 'organization name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'status',
            'label' => 'status',
            'rules' => 'trim|required'
        )

    ),
    'save_grading_policy' => array (
        array(
            'field' => 'name',
            'label' => 'Policy Name',
            'rules' => 'trim|required'
        )
    ),
    'save_grade_range' => array (
        array(
            'field' => 'max_range',
            'label' => 'Max Range',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'min_range',
            'label' => 'Minium Range',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'range_grade',
            'label' => 'Range Grade',
            'rules' => 'trim|required'
        )
    ),

);
