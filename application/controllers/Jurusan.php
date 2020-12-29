<?php
class Jurusan extends CI_Controller
{
    public function index()
    {
        $data['jurusan'] = $this->model_jurusan->index();
        $this->load->view('template/header');
        $this->load->view('data_jurusan', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('kodejurusan', 'kode jurusan', 'required|is_unique[jurusan.kodejurusan]');
        $this->form_validation->set_rules('namajurusan', 'nama jurusan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('err_message', validation_errors());
            redirect('Jurusan', 'refresh');
        } else {
            $this->model_jurusan->input();
            $this->session->set_flashdata('succ_message', 'Data Jurusan Berhasil Ditambahkan');
            redirect('Jurusan', 'refresh');
        }
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data['jurusan'] = $this->model_jurusan->edit_data($where, 'jurusan')->result();
        $this->load->view('template/header');
        $this->load->view('form-jurusan', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $kodejurusan = $this->input->post('kodejurusan');
        $namajurusan = $this->input->post('namajurusan');
        $this->form_validation->set_rules('kodejurusan', 'Kode Jurusan', 'required');
        $this->form_validation->set_rules('namajurusan', 'Nama Jurusan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('err_message', validation_errors());
            redirect('Jurusan/edit/' . $id, 'refresh');
        } else {
            $data = array(
                'kodejurusan' => $kodejurusan,
                'namajurusan' => $namajurusan,
            );
            $where = array(
                'id' => $id,
            );
            $this->model_jurusan->update_data($where, $data, 'jurusan');
            $this->session->set_flashdata('succ_message', 'Data Jurusan Berhasil Diubah');
            redirect('Jurusan', 'refresh');
        }
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->model_jurusan->delete($where, 'jurusan');
        $this->session->set_flashdata('succ_message', 'Data Jurusan Berhasil Dihapus');
        redirect('Jurusan', 'refresh');
    }
}
