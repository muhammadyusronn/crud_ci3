<?php
class Mahasiswa extends CI_Controller
{
    public function index()
    {
        $data['mahasiswa'] = $this->model_mahasiswa->index();
        $data['jurusan'] = $this->model_jurusan->index();
        $this->load->view('template/header');
        $this->load->view('data_mahasiswa', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {

        $this->form_validation->set_rules('nim', 'nim', 'required|is_unique[mahasiswa.nim]');
        $this->form_validation->set_rules('nama', 'nama mahasiswa', 'required');
        $this->form_validation->set_rules('email', 'email mahasiswa', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('err_message', validation_errors());
            redirect('Mahasiswa', 'refresh');
        } else {
            $this->model_mahasiswa->input();
            $this->session->set_flashdata('succ_message', 'Data Mahasiswa Berhasil Ditambahkan');
            redirect('Mahasiswa', 'refresh');
        }
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->model_mahasiswa->delete($where, 'mahasiswa');
        $this->session->set_flashdata('succ_message', 'Data Mahasiswa Berhasil Dihapus');
        redirect('mahasiswa', 'refresh');
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data['mahasiswa'] = $this->model_mahasiswa->edit_data($where, 'mahasiswa')->result();
        $data['jurusan'] = $this->model_jurusan->index();
        $this->load->view('template/header');
        $this->load->view('form-mahasiswa', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $jurusan = $this->input->post('jurusan');
        $email = $this->input->post('email');
        $this->form_validation->set_rules('nim', 'nim', 'required');
        $this->form_validation->set_rules('nama', 'nama mahasiswa', 'required');
        $this->form_validation->set_rules('email', 'email mahasiswa', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('err_message', validation_errors());
            redirect('Mahasiswa/edit/' . $id, 'refresh');
        } else {
            $data = array(
                'nim' => $nim,
                'nama' => $nama,
                'jurusan' => $jurusan,
                'email' => $email,
            );
            $where = array(
                'id' => $id,
            );
            $this->model_mahasiswa->update_data($where, $data, 'mahasiswa');
            $this->session->set_flashdata('succ_message', 'Data Mahasiswa Berhasil Diubah');
            redirect('mahasiswa', 'refresh');
        }
    }
}
