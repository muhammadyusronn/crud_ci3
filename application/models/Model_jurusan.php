<?php
class Model_jurusan extends CI_Model
{
    public function index()
    {
        return $this->db->get('jurusan')->result_array();
    }

    public function input()
    {
        $kodejurusan = $this->input->post('kodejurusan');
        $namajurusan = $this->input->post('namajurusan');
        $data = array(
            'kodejurusan' => $kodejurusan,
            'namajurusan' => $namajurusan,
        );

        $this->db->insert('jurusan', $data);
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

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
