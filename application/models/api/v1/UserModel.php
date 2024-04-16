<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model
{
    // Get All Todo List by Search, Status and Userwise
    public function get_todos($table, $user_id, $search, $status)
    {
        if (!empty($status) && $status != "All" && !empty($search)) {
            $query = "SELECT * FROM $table WHERE user_id = $user_id AND (title LIKE '%$search%' OR description LIKE '%$search%') AND status = '$status' ORDER BY id DESC";
        } else if (!empty($status) && $status != "All") {
            $query = "SELECT * FROM $table WHERE user_id = $user_id AND status = '$status' ORDER BY id DESC";
        } else if (!empty($search)) {
            $query = "SELECT * FROM $table WHERE user_id = $user_id AND (title LIKE '%$search%' OR description LIKE '%$search%') ORDER BY id DESC";
        } else {
            $query = "SELECT * FROM $table WHERE user_id = $user_id ORDER BY id DESC";
        }
        return $this->db->query($query)->result_array();
    }
}
