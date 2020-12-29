<?php
class Model_admin extends CI_Model
{
    public function index()
    {
        return $this->db->get('admin')->result_array();
    }

    public function input()
    {
        $email = $this->input->post('email');
        $nip = $this->input->post('nip');
        $password = md5($this->input->post('nip'));
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $nomorhp = $this->input->post('nomorhp');
        $level = $this->input->post('level');
        $data = array(
            'nip' => $nip,
            'password' => $password,
            'email' => $email,
            'nama' => $nama,
            'alamat' => $alamat,
            'nomorhp' => $nomorhp,
            'level' => $level,
        );
        $this->db->insert('admin', $data);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where)->result();
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
