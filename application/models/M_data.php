<?php
class M_data extends CI_model
{
    public function tampil($user)
    {
        return $this->db->get_where('rakit', array('user' => $user));
    }

    public function detail($where)
    {
        return $this->db->get_where('rakit', $where);
    }

    public function tampil_processor()
    {
        return $this->db->get_where('m_processor', array('nama_processor'));
    }

    public function tampil_brand_processor()
    {
        return $this->db->get('m_brand_processor');
    }

    public function tampil_motherboard()
    {
        return $this->db->get_where('m_motherboard', array('nama_motherboard'));
    }

    public function tampil_ram()
    {
        return $this->db->get_where('m_ram', array('nama_ram'));
    }

    public function tampil_hardisk()
    {
        return $this->db->get_where('m_hardisk', array('nama_hardisk'));
    }

    public function tampil_ssd()
    {
        return $this->db->get_where('m_ssd', array('nama_ssd'));
    }

    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
