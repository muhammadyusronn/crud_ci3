<?php
class Admin extends CI_Controller
{
    public function index()
    {
        $data['admin'] = $this->model_admin->index();
        $this->load->view('template/header');
        $this->load->view('data_admin', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[admin.email]');
        $this->form_validation->set_rules('nip', 'nip admin', 'required|is_unique[admin.nip]');
        $this->form_validation->set_rules('nama', 'nama admin', 'required');
        $this->form_validation->set_rules('alamat', 'alamat admin', 'required');
        $this->form_validation->set_rules('nomorhp', 'kontak admin', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('err_message', validation_errors());
            redirect('Admin', 'refresh');
        } else {
            $this->model_admin->input();
            $this->session->set_flashdata('succ_message', 'Data admin berhasil ditambahkan');
            redirect('Admin', 'refresh');
        }
    }

    public function edit($nip)
    {
        $where = array('nip' => $nip);
        $data['admin'] = $this->model_admin->edit_data($where, 'admin');
        $this->load->view('template/header');
        $this->load->view('form-admin', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $nip = $this->input->post('nip');
        $email = $this->input->post('email');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $nomorhp = $this->input->post('nomorhp');
        $level = $this->input->post('level');

        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('nip', 'nip admin', 'required');
        $this->form_validation->set_rules('nama', 'nama admin', 'required');
        $this->form_validation->set_rules('alamat', 'alamat admin', 'required');
        $this->form_validation->set_rules('nomorhp', 'kontak admin', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('err_message', validation_errors());
            redirect('Admin/edit/' . $id, 'refresh');
        } else {
            $data = array(
                'nip' => $nip,
                'email' => $email,
                'nama' => $nama,
                'alamat' => $alamat,
                'nomorhp' => $nomorhp,
                'level' => $level,
            );
            $where = array(
                'nip' => $id,
            );
            $this->model_admin->update_data($where, $data, 'admin');
            $this->session->set_flashdata('succ_message', 'Data admin berhasil diedit');
            redirect('Admin', 'refresh');
        }
    }

    public function delete($nip)
    {
        $where = array('nip' => $nip);
        $this->model_admin->delete($where, 'admin');
        $this->session->set_flashdata('succ_message', 'Data Admin Berhasil Dihapus');
        redirect('Admin', 'refresh');
    }
}
