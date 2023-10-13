<?php
defined('BASEPATH') or exit('No direct script access allowed');

class koki extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Menunggu Proses';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // $data['transaksi'] = $this->db->get()->order_by()
        $this->db->from('transaksi');
        $this->db->order_by('status_bayar', 'DESC');
        $data['transaksi']  = $this->db->get()->result_array();;

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('koki/index', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('koki/index');
        }
    }
    public function sendorder()
    {
        $id = $this->input->post('id');
        $status = 0;
        $this->db->where('id', $id);
        $this->db->update('transaksi', ['status_bayar' => $status]);
        $this->session->set_flashdata('message', 'Order has been send!');
    }
}
