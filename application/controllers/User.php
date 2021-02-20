<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $this->load->helper('string');
        for ($i = 0; $i < 10; $i++) {
            echo alternator('string one', 'string two');
            echo '<br>';
        }
        die;
        //mengambil data dari db sesuai isi session yang tersedia
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['user'] == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Please login !</div>');
            redirect('auth');
        } else {
            var_dump($data);
            echo 'Selamat Datang ' . $data['user']['name'];
        }
    }
}
