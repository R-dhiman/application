<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{

    public function employee_login()
    {
        $mobile = $this->input->post('mobile');
        $password = $this->input->post('password');
        // $department_id = $this->input->post('department_id');

        if (empty($mobile && $password)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $users_data = $this->db->get_where('employee', array('mobile' => $mobile, 'password' => $password));
        // $users_data_department = $this->db->get_where('create_department', array('id' => $department_id));

        $data_arr = array(
            "id" => $users_data->row('id'),
            "name" => $users_data->row('name'),
            "mobile" => $users_data->row('mobile'),
            "email" => $users_data->row('email'),
            "department_id" => $users_data->row('department_id'),
            // "department_name" => $users_data_department->row('department_name'),
            "status" => $users_data->row('status'),
            "datetime" => $users_data->row('datetime')
        );
        if ($users_data->num_rows() > 0) {
            $result = array('status' => 1, 'msg' => 'Employee login successful', 'data' => $data_arr);
            return $result;
        }

        $result = array('status' => 0, 'msg' => 'please enter valid mobile no. & password  & department_id');
        return $result;
    }

    public function login_driver()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if (empty($email && $password)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $data = $this->db->get_where('driver', array('email' => $email, 'password' => $password));

        $data_arr = array(
            "id" => $data->row('id'),
            "name" => $data->row('name'),
            "mobile" => $data->row('mobile'),
            "email" => $data->row('email'),
            "password" => $data->row('password')
        );

        if ($data->num_rows() > 0) {
            $result = array('status' => 1, 'msg' => 'Driver login successful', 'data' => $data_arr);
            return $result;
        } else {
            $result = array('status' => 0, 'msg' => 'please enter valid email no. & password');
            return $result;
        }
    }

    public function department()
    {
        $user_data = $this->db->get_where('create_department', array('status' => 0));
        if ($user_data->num_rows() > 0) {
            $result = array('status' => 1, 'msg' => 'Data Show Successful...!!!!', 'data' => $user_data->result());
            return $result;
        } else {
            $result = array('status' => 0, 'msg' => 'Data Not Found...!!!!');
            return $result;
        }
    }

    public function country()
    {
        $user_data = $this->db->get_where('country');
        if ($user_data->num_rows() > 0) {
            $result = array('status' => 1, 'msg' => 'Data Show Successful...!!!!', 'data' => $user_data->result());
            return $result;
        } else {
            $result = array('status' => 0, 'msg' => 'Data Not Found...!!!!');
            return $result;
        }
    }

    public function add_driver()
    {
        $name = $this->input->post('name');
        $mobile = $this->input->post('mobile');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        if (empty($name)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }
        if (empty($mobile)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }
        if (empty($email)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }
        if (empty($password)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }
        $get_data = $this->db->get_where('driver', array('mobile' => $mobile));
        if ($get_data->num_rows() > 0) {
            $result = array('status' => '0', 'msg' => 'Driver Mobile no. Already exist', 'data' => $get_data->result());
            return $result;
        }
        $data = array(
            "name" => $name,
            "mobile" => $mobile,
            "email" => $email,
            "password" => $password
        );
        
        $this->db->insert('driver', $data);
        if ($this->db->affected_rows() > 0) {
            $result = array('status' => '1', 'msg' => 'Successful!! Driver has been created', 'data' => $data);
            return $result;
        } else {
            $result = array('status' => '0', 'msg' => 'Sorry!! there was a problem');
            return $result;
        }
    }

    public function update_driver()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $mobile = $this->input->post('mobile');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        if (empty($id)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }
        if (empty($name)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }
        if (empty($mobile)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }
        if (empty($email)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }
        if (empty($password)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }
        $get_data = $this->db->get_where('driver', array('mobile' => $mobile));
        if ($get_data->num_rows() > 0) {
            $result = array('status' => '0', 'msg' => 'Driver Mobile no. Already exist', 'data' => $get_data->result());
            return $result;
        }
        $data = array(
            "id" => $id,
            "name" => $name,
            "mobile" => $mobile,
            "email" => $email,
            "password" => $password
        );
        
        $this->db->where('id', $id)->update('driver', $data);
        if ($this->db->affected_rows() > 0) {
            $result = array('status' => '1', 'msg' => 'Successful!! Driver has been created', 'data' => $data);
            return $result;
        } else {
            $result = array('status' => '0', 'msg' => 'Sorry!! there was a problem');
            return $result;
        }
    }

    public function job_type()
    {
        $user_data = $this->db->get_where('jobs');
        if ($user_data->num_rows() > 0) {
            $result = array('status' => 1, 'msg' => 'Data Show Successful...!!!!', 'data' => $user_data->result());
            return $result;
        } else {
            $result = array('status' => 0, 'msg' => 'Data Not Found...!!!!');
            return $result;
        }
    }

    public function new()
    {
        $employee_id = $this->input->post('employee_id');
        $working_status = $this->input->post('working_status');

        if (empty($employee_id)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $users_data = $this->db->get_where('job_form', array('employee_id' => $employee_id, 'working_status' => $working_status));

        foreach ($users_data->result() as $row) {

            $users_job_type = $this->db->get_where('jobs', array('id' => $row->job_id));

            $arr_data[] = array(
                "id" => $row->id,
                "dr_name" => $row->dr_name,
                "patient_name" => $row->patient_name,
                "job_id" => $row->job_id,
                "job_type" => $users_job_type->row('job_type'),
                "received_date" => $row->received_date,
                "due_date" => $row->due_date,
                "department_id" => $row->department_id,
                "employee_id" => $row->employee_id,
                "status" => $row->status,
                "description" => $row->description,
                "working_status" => $row->working_status
            );
        }
        if ($users_data->num_rows() > 0) {
            $result = array('status' => 1, 'msg' => 'Employee Data Show Successful', 'data' => $arr_data);
            return $result;
        }

        $result = array('status' => 0, 'msg' => 'please enter valid employee_id');
        return $result;
    }

    public function working()
    {
        $employee_id = $this->input->post('employee_id');
        $working_status = $this->input->post('working_status');

        if (empty($employee_id && $working_status)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $users_data = $this->db->get_where('job_form', array('employee_id' => $employee_id, 'working_status' => $working_status));

        foreach ($users_data->result() as $row) {

            $users_job_type = $this->db->get_where('jobs', array('id' => $row->job_id));

            $arr_data[] = array(
                "id" => $row->id,
                "dr_name" => $row->dr_name,
                "patient_name" => $row->patient_name,
                "job_id" => $row->job_id,
                "job_type" => $users_job_type->row('job_type'),
                "received_date" => $row->received_date,
                "due_date" => $row->due_date,
                "department_id" => $row->department_id,
                "employee_id" => $row->employee_id,
                "status" => $row->status,
                "description" => $row->description,
                "working_status" => $row->working_status
            );
        }
        if ($users_data->num_rows() > 0) {
            $result = array('status' => 1, 'msg' => 'Employee Data Show Successful', 'data' => $arr_data);
            return $result;
        }

        $result = array('status' => 0, 'msg' => 'please enter valid employee_id');
        return $result;
    }

    public function complete()
    {
        $employee_id = $this->input->post('employee_id');
        $working_status = $this->input->post('working_status');

        if (empty($employee_id && $working_status)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $users_data = $this->db->get_where('job_form', array('employee_id' => $employee_id, 'working_status' => $working_status));

        foreach ($users_data->result() as $row) {

            $users_job_type = $this->db->get_where('jobs', array('id' => $row->job_id));

            $arr_data[] = array(
                "id" => $row->id,
                "dr_name" => $row->dr_name,
                "patient_name" => $row->patient_name,
                "job_id" => $row->job_id,
                "job_type" => $users_job_type->row('job_type'),
                "received_date" => $row->received_date,
                "due_date" => $row->due_date,
                "department_id" => $row->department_id,
                "employee_id" => $row->employee_id,
                "status" => $row->status,
                "description" => $row->description,
                "working_status" => $row->working_status
            );
        }
        if ($users_data->num_rows() > 0) {
            $result = array('status' => 1, 'msg' => 'Employee Data Show Successful', 'data' => $arr_data);
            return $result;
        }

        $result = array('status' => 0, 'msg' => 'please enter valid employee_id');
        return $result;
    }

    public function accept()
    {
        $employee_id = $this->input->post('employee_id');
        $working_status = $this->input->post('working_status');

        if (empty($employee_id && $working_status)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $users_data = $this->db->get_where('job_form', array('employee_id' => $employee_id, 'working_status' => $working_status));

        foreach ($users_data->result() as $row) {

            $users_job_type = $this->db->get_where('jobs', array('id' => $row->job_id));

            $arr_data[] = array(
                "id" => $row->id,
                "dr_name" => $row->dr_name,
                "patient_name" => $row->patient_name,
                "job_id" => $row->job_id,
                "job_type" => $users_job_type->row('job_type'),
                "received_date" => $row->received_date,
                "due_date" => $row->due_date,
                "department_id" => $row->department_id,
                "employee_id" => $row->employee_id,
                "status" => $row->status,
                "description" => $row->description,
                "working_status" => $row->working_status
            );
        }
        if ($users_data->num_rows() > 0) {
            $result = array('status' => 1, 'msg' => 'Employee Data Show Successful', 'data' => $arr_data);
            return $result;
        }

        $result = array('status' => 0, 'msg' => 'please enter valid employee_id');
        return $result;
    }

    public function pause()
    {
        $employee_id = $this->input->post('employee_id');
        $working_status = $this->input->post('working_status');
        if (empty($employee_id && $working_status)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }
        $users_data = $this->db->get_where('job_form', array('employee_id' => $employee_id, 'working_status' => $working_status));
        foreach ($users_data->result() as $row) {
            $users_job_type = $this->db->get_where('jobs', array('id' => $row->job_id));
            $arr_data[] = array(
                "id" => $row->id,
                "dr_name" => $row->dr_name,
                "patient_name" => $row->patient_name,
                "job_id" => $row->job_id,
                "job_type" => $users_job_type->row('job_type'),
                "received_date" => $row->received_date,
                "due_date" => $row->due_date,
                "department_id" => $row->department_id,
                "employee_id" => $row->employee_id,
                "status" => $row->status,
                "description" => $row->description,
                "working_status" => $row->working_status
            );
        }
        if ($users_data->num_rows() > 0) {
            $result = array('status' => 1, 'msg' => 'Employee Data Show Successful', 'data' => $arr_data);
            return $result;
        }

        $result = array('status' => 0, 'msg' => 'please enter valid employee_id');
        return $result;
    }

    public function resume()
    {
        $id = $this->input->post('id');
        if (empty($id)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $get_job_form = $this->db->get_where('job_form', array('id' => $id));

        if ($get_job_form->num_rows() > 0) {
            $this->db->insert('pause_history', array('job_id' => $id, 'emp_id' => $get_job_form->row('employee_id'), 'status' => 1));
            $this->db->where('id', $id)->update('job_form', array('working_status' => 1));
            $result = array('status' => 1, 'msg' => 'Successful!');
            return $result;
        }
        $result = array('status' => 0, 'msg' => 'please enter valid id');
        return $result;
    }

    public function assign_department() // assigned to other department
    {
        $user_id = $this->input->post('user_id');
        $emp_id = $this->input->post('emp_id');
        $job_id = $this->input->post('job_id');
        $department_id = $this->input->post('department_id');

        $employee_verify = $this->db->get_where('employee', array('id' => $emp_id));
        $department_verify = $this->db->get_where('create_department', array('id' => $department_id));

        if (!$department_verify->num_rows() > 0) {
            $result = array('status' => 0, 'msg' => 'please enter valid department id');
            return $result;
        }

        if (!$employee_verify->num_rows() > 0) {
            $result = array('status' => 0, 'msg' => 'please enter employee id');
            return $result;
        }

        $verify = $this->db->get_where('job_form', array('id' => $job_id, 'employee_id' => $user_id));

        if (!$verify->num_rows() > 0) {
            $result = array('status' => 0, 'msg' => 'please enter valid details');
            return $result;
        }

        $data_insert = array(
            'dr_name' => $verify->row('dr_name'),
            'patient_name' => $verify->row('patient_name'),
            'job_id' => $verify->row('job_id'),
            'received_date' => date("Y-m-d"),
            'due_date' => $verify->row('due_date'),
            'department_id' => $department_id,
            'employee_id' => $emp_id,
            'status' => $verify->row('status'),
            'description' => $verify->row('description'),
            'assign_driver_id' => $verify->row('assign_driver_id'),
            'working_status' => 0,
            'assign_job_to' => $user_id,
        );

        if ($verify->row('employee_id') !== $emp_id) {
            $this->db->where(array('id' => $job_id, 'employee_id' => $user_id))->update('job_form', array('working_status' => 2, 'assign_other' => $user_id));
            $this->db->insert('job_form', $data_insert);
            $result = array('status' => 1, 'msg' => 'Successful!');
            return $result;
        } else {
            $result = array('status' => 1, 'msg' => 'sorry! please assigned to another employee');
            return $result;
        }
    }

    public function assign_other()
    {
        $user_id = $this->input->post('id');
        $job_id = $this->input->post('job_id');

        if (empty($user_id && $job_id)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $users_data = $this->db->get_where('job_form', array('id' => $user_id, 'job_id' => $job_id));

        if ($users_data->num_rows() > 0) {
            $result = array('status' => 1, 'msg' => 'Employee Data Show Successful', 'data' => $users_data->result());
            return $result;
        }

        $result = array('status' => 0, 'msg' => 'please enter valid employee_id');
        return $result;
    }

    // public function assign_other()
    // {
    //     $user_id = $this->input->post('id');
    //     $job_id = $this->input->post('job_id');

    //     if (empty($user_id && $job_id)) {
    //         $result = array('status' => 0, 'msg' => 'Please enter required field');
    //         return $result;
    //     }

    //     $users_data = $this->db->get_where('job_form', array('id' => $user_id, 'job_id' => $job_id));

    //     if ($users_data->num_rows() > 0) {
    //         $result = array('status' => 1, 'msg' => 'Employee Data Show Successful', 'data' => $users_data->result());
    //         return $result;
    //     }

    //     $result = array('status' => 0, 'msg' => 'please enter valid employee_id');
    //     return $result;
    // }


    public function get_employee()
    {
        $emp_id = $this->input->post('emp_id');
        $department_id = $this->input->post('department_id');

        if (empty($emp_id)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        if (empty($department_id)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $users_data = $this->db->select('name, email, mobile, department_id, status, datetime')->get_where('employee', array('id' => $emp_id, 'department_id' => $department_id));

        if ($users_data->num_rows() > 0) {
            $result = array('status' => 1, 'msg' => 'User assign Successful..!!', 'data' => $users_data->row());
            return $result;
        }
        $result = array('status' => 0, 'msg' => 'please enter valid data');
        return $result;
    }

    public function update_status()
    {
        $id = $this->input->post('id');
        $working_status = $this->input->post('working_status');
        $employee_id = $this->input->post('employee_id');
        $description = $this->input->post('description');

        if (empty($working_status) && empty($id)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $users_data = $this->db->get_where('job_form', array('id' => $id));

        if ($users_data->num_rows() > 0) {
            if ($working_status == 4) {
                if (empty($description)) {
                    $result = array('status' => 0, 'msg' => 'Please enter description');
                    return $result;
                }
                $this->db->insert('pause_history', array('job_id' => $id, 'emp_id' => $employee_id, 'description' => $description));
            }
            $this->db->where('id', $id)->update('job_form', array('working_status' => $working_status));
            $result = array('status' => 1, 'msg' => 'User assign Successful..!!');
            return $result;
        }
        $result = array('status' => 0, 'msg' => 'please enter valid data');
        return $result;
    }

    public function department_assign()
    {
        $department_id = $this->input->post('department_id');

        if (empty($department_id)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $users_data = $this->db->select('id, name')->get_where('employee', array('department_id' => $department_id));

        if ($users_data->num_rows() > 0) {
            $result = array('status' => 1, 'msg' => 'User assign Successful..!!', 'data' => $users_data->result());
            return $result;
        }
        $result = array('status' => 0, 'msg' => 'please enter valid data');
        return $result;
    }

    public function change_password()
    {
        $id = $this->input->post('id');
        $password = $this->input->post('password');

        if (empty($password) && empty($password)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $users_data = $this->db->get_where('employee', array('id' => $id));

        if ($users_data->num_rows() > 0) {
            $this->db->where('id', $users_data->row('id'))->update('employee', array('password' => $password));
            $users_data = $this->db->select('id, name, mobile, email, department_id, status, datetime')->get_where('employee', array('id' => $id));

            $result = array('status' => 1, 'msg' => 'Password Change Successful..!!', 'data' => $users_data->row());
            return $result;
        }
        $result = array('status' => 0, 'msg' => 'please enter valid data');
        return $result;
    }

    public function dashboard()
    {
        $employee_id = $this->input->post('employee_id');

        if (empty($employee_id)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $new = $this->db->get_where('job_form', array('employee_id' => $employee_id, 'working_status' => 0));
        $working = $this->db->get_where('job_form', array('employee_id' => $employee_id, 'working_status' => 1));
        $complete = $this->db->get_where('job_form', array('employee_id' => $employee_id, 'working_status' => 2));
        $accept = $this->db->get_where('job_form', array('employee_id' => $employee_id, 'working_status' => 3));

        if ($new->num_rows() > 0) {
            $new = $new->num_rows();
        } else {
            $new = 0;
        }
        if ($accept->num_rows() > 0) {
            $accept = $accept->num_rows();
        } else {
            $accept = 0;
        }
        if ($working->num_rows() > 0) {
            $working = $working->num_rows();
        } else {
            $working = 0;
        }
        if ($complete->num_rows() > 0) {
            $complete = $complete->num_rows();
        } else {
            $complete = 0;
        }

        $data_arr = array(
            'new' => $new,
            'accept' => $accept,
            'working' => $working,
            'complete' => $complete
        );

        $result = array('status' => 1, 'msg' => 'Data Show Successful...!!!!', 'data' => $data_arr);
        return $result;
    }




    public function driver_login()
    {
        $mobile = $this->input->post('mobile');
        $password = $this->input->post('password');

        if (empty($mobile && $password)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $users_data = $this->db->select('id, name, mobile, email, status')->get_where('driver', array('mobile' => $mobile, 'password' => $password));

        if ($users_data->num_rows() > 0) {
            $result = array('status' => 1, 'msg' => 'Driver login successful', 'data' => $users_data->row());
            return $result;
        }

        $result = array('status' => 0, 'msg' => 'please enter valid mobile no. & password  & department_id');
        return $result;
    }

    public function change_driver_password()
    {

        $id = $this->input->post('id');
        $password = $this->input->post('password');

        if (empty($id)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $users_data = $this->db->get_where('driver', array('id' => $id));

        if ($users_data->num_rows() > 0) {

            $this->db->where('id', $users_data->row('id'))->update('driver', array('password' => $password));
            $users_data = $this->db->select('id, name, mobile, email, status')->get_where('driver', array('id' => $id));

            $result = array('status' => 1, 'msg' => 'Change Driver Password Successful', 'data' => $users_data->row());
            return $result;
        }


        $result = array('status' => 0, 'msg' => 'please enter valid mobile no. & password  & department_id');
        return $result;
    }

    public function driver_dashboard()
    {
        $driver_id = $this->input->post('id');

        if (empty($driver_id)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $new = $this->db->get_where('driver_jobs', array('driver_id' => $driver_id, 'working_status' => 0));
        $complete = $this->db->get_where('driver_jobs', array('driver_id' => $driver_id, 'working_status' => 1));
        $accept = $this->db->get_where('driver_jobs', array('driver_id' => $driver_id, 'working_status' => 2));

        if ($new->num_rows() > 0) {
            $new = $new->num_rows();
        } else {
            $new = 0;
        }
        if ($accept->num_rows() > 0) {
            $accept = $accept->num_rows();
        } else {
            $accept = 0;
        }
        if ($complete->num_rows() > 0) {
            $complete = $complete->num_rows();
        } else {
            $complete = 0;
        }

        $data_arr = array(
            'new' => $new,
            'accept' => $accept,
            'complete' => $complete
        );

        $result = array('status' => 1, 'msg' => 'Data Show Successful...!!!!', 'data' => $data_arr);
        return $result;
    }

    public function driver_status()
    {

        $driver_id = $this->input->post('driver_id');
        $working_status = $this->input->post('working_status');

        if (empty($driver_id) && empty($working_status)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $users_data = $this->db->get_where('driver_jobs', array('driver_id' => $driver_id, 'working_status' => $working_status));

        foreach ($users_data->result() as $row) {

            $users_job_type = $this->db->get_where('job_form', array('id' => $row->job_form_id, 'assign_driver_id' => $driver_id));
            $users_jobs_type = $this->db->get_where('jobs', array('id' => $row->job_type_id));
            $arr_data[] = array(
                "id" => $row->id,
                "address" => $row->address,
                "dr_name" => $users_job_type->row('dr_name'),
                "patient_name" => $users_job_type->row('patient_name'),
                "job_id" => $users_job_type->row('job_id'),
                "job_type" => $users_jobs_type->row('job_type'),
                "employee_id" => $users_job_type->row('employee_id'),
                "working_status" => $row->working_status
            );
        }
        if ($users_data->num_rows() > 0) {
            $result = array('status' => 1, 'msg' => 'Employee Data Show Successful', 'data' => $arr_data);
            return $result;
        }

        $result = array('status' => 0, 'msg' => 'please enter valid employee_id');
        return $result;
    }

    public function update_driver_status()
    {
        $id = $this->input->post('id');
        $working_status = $this->input->post('working_status');

        if (empty($id) && empty($working_status)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $users_data = $this->db->get_where('driver_jobs', array('id' => $id));

        if ($users_data->num_rows() > 0) {
            $this->db->where('id', $id)->update('driver_jobs', array('working_status' => $working_status));
            $result = array('status' => 1, 'msg' => 'User assign Successful..!!');
            return $result;
        }
        $result = array('status' => 0, 'msg' => 'please enter valid data');
        return $result;
    }

    public function test()
    {
        echo 'hiooiiwiwi';
    }
}
