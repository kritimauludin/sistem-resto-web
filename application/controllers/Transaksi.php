<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['transaksi'] = $this->db->get('transaksi')->result_array();

        $this->form_validation->set_rules('namamakanan', 'NamaMakanan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'stok', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_makanan' => $this->input->post('namamakanan'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok')
            ];
            $this->db->insert('daftar_makanan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New food added!</div>');
            redirect('makanan');
        }
    }
    public function updateTransaksi($id)
    {
        $data['title'] = 'Update Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['transaksi'] = $this->db->get_where('transaksi', ['id' => $id])->row_array();

        $this->form_validation->set_rules('status_bayar', 'status_bayar', 'required');
        $this->form_validation->set_rules('uang_bayar', 'uang_bayar', 'required');
        $this->form_validation->set_rules('kembalian', 'kembalian', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/update', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id = $this->input->post('id');
            $data = [
                'status_bayar' => $this->input->post('status_bayar'),
                'uang_bayar' => $this->input->post('uang_bayar'),
                'kembalian' => $this->input->post('kembalian')
            ];

            $this->db->where('id', $id);
            $this->db->update('transaksi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi berhasil diubah!</div>');
            redirect('transaksi');
        }
    }
    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('transaksi');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Transaksi telah dihapus!</div>');
        redirect('transaksi');
    }
}
