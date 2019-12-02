<?php
class M_mypc extends CI_Model
{
    public function tampil_mypc()
    {
        return $this->db->get_where('rakit', ['user' => $this->session->userdata('username')]);
    }

    public function ubah_mypc($where)
    {
        return $this->db->get_where('rakit', $where);
    }

    public function detail($where)
    {
        return $this->db->get_where('rakit', $where);
    }

    public function tampil($user)
    {
        return $this->db->get_where('rakit', array('user' => $user))->result();
    }
}
