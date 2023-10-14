<?php

defined('BASEPATH') or exit('No direct script access allowed');
require(APPPATH . '/libraries/REST_Controller.php');

use Restserver\Libraries\REST_Controller;

class Webservices extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api_model');
        header('Access-Control-Allow-Origin: *');
    }

    public function employee_login_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->employee_login();
        header('Content-type: application/json');
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }

    public function login_driver_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->login_driver();
        header('Content-type: application/json');
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }

    public function country_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->country();
        header('Content-type: application/json');
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }

    public function department_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->department();
        header('Content-type: application/json');
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }

    public function add_driver_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->add_driver();
        header('Content-type: application/json');
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }

    public function update_driver_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->update_driver();
        header('Content-type: application/json');
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }

}