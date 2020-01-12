<?php
class M_user extends CI_Model
{
    public function tampil_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('username', 'ASC');
        return $this->db->get();
    }

    public function ubah_user($where)
    {
        return $this->db->get_where('user', $where);
    }

    public function get_keyword_user($keyword)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->like('username', $keyword);
        $this->db->or_like('role', $keyword);
        $this->db->or_like('is_active', $keyword);
        $this->db->or_like('id', $keyword);
        return $this->db->get()->result();
    }
}
