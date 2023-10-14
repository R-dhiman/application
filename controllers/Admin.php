<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Crud_model");
        $this->load->helper('cookie');
        // $this->load->helper('global');
        error_reporting(0);
    }

    public function login()
    {
        $this->load->view('admin_login');
    }

    public function index()
    {
        $password_plain = $this->input->post('password');
        $user_type = $this->input->post('user_type');
        $email = $this->input->post('email');
        $submit = $this->input->post('submit');

        if (isset($submit)) {

            if ($user_type == 0) {
                $get_data = $this->db->get_where('admin_login');
                if (password_verify($password_plain, $get_data->row('password'))) {
                    if ($get_data->row('email') == $email) {
                        $this->session->set_userdata('login', 1);
                        if ($this->session->userdata('login') == 1) {
                            $this->session->set_flashdata('success', 'Admin Login Successful!!');

                            redirect(base_url() . 'admin/main', 'refersh');
                        }
                    }
                } else {
                    redirect(base_url() . 'login/admin', 'refresh');
                }
            } else {

                $get_data_dispatch = $this->db->get_where('dispatch');
                if (password_verify($password_plain, $get_data_dispatch->row('password'))) {
                    if ($get_data_dispatch->row('email') == $email) {
                        $this->session->set_userdata('login_dispatch', 2);
                        if ($this->session->userdata('login_dispatch') == 2) {
                            $this->session->set_flashdata('success', 'Dispatch Login Successful!!');
                            redirect(base_url() . 'dispatch/dispatch_dashboard', 'refersh');
                        }
                    }
                } else {
                    redirect(base_url() . 'login/admin', 'refresh');
                }
            }
        }

        $this->load->view('admin_login');
    }


    public function main()
    {
        $sid = $this->input->get('sid');
        if (isset($sid)) {
            $this->Crud_model->update_custom('job_form', 'id', 'status', $sid);
            redirect(base_url() . 'admin/main', 'refresh');
        }

        $submit = $this->input->post('submit');
        $update_submit = $this->input->post('update_submit');
        $mobile = $this->input->post('mobile');
        $is_unique = $this->db->get_where('driver', array('mobile' => $mobile));
        if ($is_unique->num_rows() > 0) {

            $this->session->flashdata('success', 'This Mobile No. Already Exist');
        } else {
            if (isset($submit)) {
                $data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'mobile' => $this->input->post('mobile'),
                    'password' => $this->input->post('password')
                );
                $this->db->insert('driver', $data);
                redirect(base_url() . 'admin/main', 'refresh');
            }
        }
        if (isset($update_submit)) {
            $hidden_id = $this->input->post('hidden_id');
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'password' => $this->input->post('password')
            );
            $this->db->where('id', $hidden_id,)->update('driver', $data);
            echo "Data Update Successfully";
        }

        $page_data['delivered'] = $this->Crud_model->fetch('driver')->result();
        $page_data['page_title'] = 'driver';
        $page_data['page_name'] = 'add_driver';
        $this->load->view('template', $page_data);
    }


    public function country()
    {

        $submit = $this->input->post('submit');
        $update_submit = $this->input->post('update_submit');
        $sid = $this->input->get('sid');
        if (isset($sid)) {
            $this->Crud_model->update_custom('job_form', 'id', 'status', $sid);
            redirect(base_url() . 'admin/country', 'refersh');
        }
        if (isset($submit)) {
            $data = array(
                'country_name' => $this->input->post('country_name')
            );
            $this->db->insert('country', $data);
            redirect(base_url() . 'admin/country', 'refersh');
        }
        if (isset($update_submit)) {
            $hidden_id = $this->input->post('hidden_id');
            $country_name = $this->input->post('country_name');
            $this->Crud_model->update('country', 'id', $hidden_id, array('country_name' => $country_name));
            echo $hidden_id;
            echo $country_name;
            redirect(base_url() . 'admin/country', 'state');
        }
        $page_data['country'] = $this->Crud_model->fetch('country')->result();
        $page_data['page_title'] = 'Country';
        $page_data['page_name'] = 'country';
        $this->load->view('template', $page_data);
    }

    public function state()
    {

        $submit = $this->input->post('submit');
        $update_submit = $this->input->post('update_submit');
        $state_name = $this->input->post('state_name');
        $country_name_input = $this->input->post('country_id');

        if (isset($submit)) {
            $this->Crud_model->fetch('state', array('country_id' => $country_name_input, 'state_name' => $state_name));

            $data = array(
                'country_id' => $country_name_input,
                'state_name' => $state_name
            );

            print_r($data);
            $this->Crud_model->insert('state', $data);
            redirect(base_url() . 'admin/state', 'refersh');
        }

        if (isset($update_submit)) {
            $hidden_id = $this->input->post('hidden_id');
            $country_name = $this->input->post('country_name');
            $state_name = $this->input->post('state_name');
            $data =  $this->Crud_model->update('state', 'id', $hidden_id, array('country_id' => $country_name, 'state_name' => $state_name));
            print_r($data);
            redirect(base_url() . 'admin/state', 'refersh');
        }

        $page_data['country'] = $this->Crud_model->fetch('country')->result();
        $page_data['state'] = $this->Crud_model->fetch('state')->result();
        $page_data['page_title'] = 'State';
        $page_data['page_name'] = 'state';
        $this->load->view('template', $page_data);
    }


    public function city()
    {

        $submit = $this->input->post('submit');
        $update_submit = $this->input->post('update_submit');
        $city_name = $this->input->post('city_name');
        $state_id = $this->input->post('state_id');
        $country_name_input = $this->input->post('country_id');

        if (isset($submit)) {
            $this->Crud_model->fetch('city', array('country_id' => $country_name_input, 'state_id' => $state_id, 'city_name' => $city_name));

            $data = array(
                'country_id' => $country_name_input,
                'state_id' => $state_id,
                'city_name' => $city_name
            );

            $this->Crud_model->insert('city', $data);
            redirect(base_url() . 'admin/city', 'refersh');
        }

        if (isset($update_submit)) {
            $hidden_id = $this->input->post('hidden_id');
            $country_name = $this->input->post('country_name');
            $state_name = $this->input->post('state_name');
            $data =  $this->Crud_model->update('city', 'id', $hidden_id, array('country_id' => $country_name, 'state_name' => $state_name));
            print_r($data);
            redirect(base_url() . 'admin/city', 'refersh');
        }

        $page_data['country'] = $this->Crud_model->fetch('country')->result();
        $page_data['state'] = $this->Crud_model->fetch('state')->result();
        $page_data['city'] = $this->Crud_model->fetch('city')->result();
        $page_data['page_title'] = 'city';
        $page_data['page_name'] = 'city';
        $this->load->view('template', $page_data);
    }

    public function demo()
    {
        $submit = $this->input->post('submit');
        if (isset($submit)) {
            $data = array(
                "name" => $this->input->post('name'),
                "email" => $this->input->post('mobile'),
                "mobile" => $this->input->post('email'),
                "password" => $this->input->post('password')
            );
            $this->db->insert('driver', $data);
        }
        $page_data['demo'] = $this->db->order_by('id')->get('driver')->result();
        $page_data['page_title'] = 'Demo';
        $page_data['page_name'] = 'demo';
        $this->load->view('template', $page_data);
    }
}
