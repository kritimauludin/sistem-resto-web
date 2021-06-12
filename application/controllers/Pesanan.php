<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->db->order_by('id', 'desc');
        $data['pesanan'] = $this->db->get_where('transaksi', ['email' =>
        $this->session->userdata('email')])->result_array();
        $data['makanan'] = $this->db->get_where('daftar_makanan', ['status' => 'Tersedia'])->result_array();


        $this->form_validation->set_rules('nama_makanan', 'nama_makanan', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pesanan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'email' => $this->input->post('email'),
                'nama_makanan' => $this->input->post('nama_makanan'),
                'tanggal' => $this->input->post('tgl'),
                'harga_satuan' => $this->input->post('harga_satuan'),
                'jumlah' => $this->input->post('jumlah'),
                'total' => $this->input->post('total_bayar'),
                'status_bayar' => 0,
                'uang_bayar' => 0,
                'kembalian' => 0
            ];
            $this->db->insert('transaksi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan berhasil dibuat!</div>');
            redirect('Pesanan');
        }
    }
}
