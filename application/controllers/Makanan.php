<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Makanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Daftar Makanan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['makanan'] = $this->db->get('daftar_makanan')->result_array();

        $this->form_validation->set_rules('namamakanan', 'NamaMakanan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('makanan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_makanan' => $this->input->post('namamakanan'),
                'harga' => $this->input->post('harga'),
                'status' => $this->input->post('status')
            ];
            $this->db->insert('daftar_makanan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New food added!</div>');
            redirect('makanan');
        }
    }
    public function updateMakanan()
    {
        $this->form_validation->set_rules('updatenama', 'updateNama', 'required');
        $this->form_validation->set_rules('updateharga', 'updateHarga', 'required');
        $this->form_validation->set_rules('updatestatus', 'updateStatus', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('makanan/index');
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'nama_makanan' => $this->input->post('updatenama'),
                'harga' => $this->input->post('updateharga'),
                'status' => $this->input->post('updatestatus')
            ];

            $this->db->where('id', $id);
            $this->db->update('daftar_makanan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">food has been edited!</div>');
            redirect('makanan');
        }
    }
    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('daftar_makanan');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">makanan telah dihapus!</div>');
        redirect('makanan');
    }
}
