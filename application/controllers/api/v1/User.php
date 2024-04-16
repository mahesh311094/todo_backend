<?php defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class User extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api/v1/UserModel');
        $this->load->model('Common_model');
    }

    /*================================
    Onboarding
    ================================*/
    // API for User Registration
    public function registration_post()
    {
        $full_name = $this->post('full_name');
        $email_id = $this->post('email_id');
        $password = $this->post('password');

        $status = "error";
        $data = null;

        if (!empty($full_name) && !empty($email_id) && !empty($password)) {
            $checkEmail = $this->Common_model->get_data_by_id(USERS_TABLE, 'email_id', $email_id);

            if (!empty($checkEmail)) {
                $msg = "Sorry, this email id already registered";
            } else {
                $userData = array(
                    'full_name' => $full_name,
                    'email_id' => $email_id,
                    'password' => $password
                );

                $result = $this->Common_model->insert_data($userData, USERS_TABLE);

                if (!empty($result)) {
                    $status = "success";
                    $msg = "Congratulations, your account created successfully!!";

                    $data = array(
                        'id' => "$result",
                        'full_name' => $full_name,
                        'email_id' => $email_id,
                    );
                } else {
                    $msg = "Data is not inserted, try again later !!";
                }
            }
        } else {
            $msg = 'Full Name, Email and Password are required';
        }

        $message = array(
            'status' => $status,
            'message' => $msg,
            'data' => $data
        );
        $this->set_response($message, REST_Controller::HTTP_OK);
    }

    // API for User Sign In
    public function signin_post()
    {
        $email_id = $this->post('email_id');
        $password = $this->post('password');

        if (!empty($email_id) && !empty($password)) {
            $checkData = array(
                'email_id' => $email_id,
                'password' => $password
            );
            $result = $this->Common_model->get_data_by_id(USERS_TABLE, $checkData);

            if (!empty($result)) {
                $data = array(
                    "id" => $result['id'],
                    "full_name" => $result['full_name'],
                    "email_id" => $result['email_id'],
                );

                $message = array(
                    'status' => 'success',
                    'message' => 'Login Successfully',
                    'data' => $data
                );
            } else {
                $check = $this->Common_model->get_data_by_id(USERS_TABLE, 'email_id', $email_id);

                if (!empty($check)) {
                    $msg = "Password is wrong";
                } else {
                    $msg = "Email ID is not registered";
                }

                $message = array(
                    'status' => 'error',
                    'message' => $msg,
                    'data' => null
                );
            }
        } else {
            $message = array(
                'status' => 'error',
                'message' => 'Email ID & Password are required'
            );
        }
        $this->set_response($message, REST_Controller::HTTP_OK);
    }

    /*================================
    Manage To Do
    ================================*/

    // API for add to do
    public function add_todo_post()
    {
        $user_id = $this->post('user_id');
        $title = $this->post('title');
        $description = $this->post('description');
        $status = $this->post('status');

        if (!empty($user_id) && !empty($title) && !empty($description) && !empty($status)) {
            $data = array(
                'user_id' => $user_id,
                'title' => $title,
                'description' => $description,
                'status' => $status
            );

            $result = $this->Common_model->insert_data($data, TODO_TABLE);

            if (!empty($result)) {
                $message = array(
                    'status' => 'success',
                    'message' => 'To Do Added'
                );
            } else {
                $message = array(
                    'status' => 'error',
                    'message' => 'Something Went Wrong !!',
                );
            }
        } else {
            $message = array(
                'status' => 'error',
                'message' => 'user_id, title, description and status are required',
            );
        }
        $this->set_response($message, REST_Controller::HTTP_OK);
    }

    // API for update to do details
    public function update_todo_post()
    {
        $id = $this->post('id');
        $title = $this->post('title');
        $description = $this->post('description');
        $status = $this->post('status');

        if (!empty($id) && !empty($title) && !empty($description) && !empty($status)) {
            $updateData = array(
                'title' => $title,
                'description' => $description,
                'status' => $status
            );

            $result = $this->Common_model->update(TODO_TABLE, $updateData, 'id', $id);

            if (!empty($result)) {
                $message = array(
                    'status' => 'success',
                    'message' => 'To Do Updated'
                );
            } else {
                $message = array(
                    'status' => 'error',
                    'message' => 'Something Went Wrong !!'
                );
            }
        } else {
            $message = array(
                'status' => 'error',
                'message' => 'id, title, description and status are required'
            );
        }
        $this->set_response($message, REST_Controller::HTTP_OK);
    }

    // API for get all to do list, search in to do list and get statuswise to do list
    public function get_todo_post()
    {
        $user_id = $this->post('user_id');
        $search = $this->post('search');
        $status = $this->post('status');

        if (!empty($user_id)) {
            $get_to_do = $this->UserModel->get_todos(TODO_TABLE, $user_id, $search, $status);

            if (!empty($get_to_do)) {
                $message = array(
                    'status' => 'success',
                    'message' => 'To Do list found',
                    'data' => $get_to_do
                );
            } else {
                $message = array(
                    'status' => 'error',
                    'message' => 'To Do list not found',
                    'data' => []
                );
            }
        } else {
            $message = array(
                'status' => 'error',
                'message' => 'User ID required'
            );
        }
        $this->set_response($message, REST_Controller::HTTP_OK);
    }

    // Remove to do
    public function remove_todo_post()
    {
        $id = $this->post('id');

        if (!empty($id)) {
            $result = $this->Common_model->delete(TODO_TABLE, 'id', $id);

            if (!empty($result)) {
                $message = array(
                    'status' => 'success',
                    'message' => 'To Do Removed'
                );
            } else {
                $message = array(
                    'status' => 'error',
                    'message' => 'Something Went Wrong!!'
                );
            }
        } else {
            $message = array(
                'status' => 'error',
                'message' => 'id required'
            );
        }
        $this->set_response($message, REST_Controller::HTTP_OK);
    }
}
