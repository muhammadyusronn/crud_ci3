<?php
class Model_mahasiswa extends CI_Model
{
    public function index()
    {
        $this->db->select('mahasiswa.*,jurusan.namajurusan as jurusannya');
        $this->db->from('mahasiswa');
        $this->db->join('jurusan', 'jurusan.kodejurusan = mahasiswa.jurusan');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function input()
    {
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $jurusan = $this->input->post('jurusan');
        $email = $this->input->post('email');
        $data = array(
            'nim' => $nim,
            'nama' => $nama,
            'jurusan' => $jurusan,
            'email' => $email,
        );

        $this->db->insert('mahasiswa', $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
