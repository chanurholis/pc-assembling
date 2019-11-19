<?php
class M_rakit extends CI_Model
{
    public function tampil_processor_intel()
    {
        return $this->db->get_where('m_processor', ['brand_processor' => 'Intel']);
    }

    public function tampil_processor_amd()
    {
        return $this->db->get_where('m_processor', ['brand_processor' => 'AMD']);
    }

    public function tampil_motherboard_asrock()
    {
        return $this->db->get_where('m_motherboard', ['brand_motherboard' => 'AsRock']);
    }

    public function tampil_motherboard_msi()
    {
        return  $this->db->get_where('m_motherboard', ['brand_motherboard' => 'MSI']);
    }

    public function tampil_ram_corsair()
    {
        return $this->db->get_where('m_ram', ['brand_ram' => 'Corsair']);
    }

    public function tampil_ram_gskill()
    {
        return $this->db->get_where('m_ram', ['brand_ram' => 'G.Skill']);
    }

    public function tampil_storage_hdd()
    {
        return $this->db->get_where('m_storage', ['type' => 'HDD']);
    }

    public function tampil_storage_ssd()
    {
        return $this->db->get_where('m_storage', ['type' => 'SSD']);
    }

    public function tampil_casing()
    {
        return $this->db->get('m_casing');
    }

    public function tampil_vga_addon()
    {
        return $this->db->get_where('m_vga', ['type' => 'ADD-ON']);
    }

    public function tampil_vga_onboard()
    {
        return $this->db->get_where('m_vga', ['type' => 'ON-BOARD']);
    }

    public function tampil_psu()
    {
        return $this->db->get('m_psu');
    }

    public function tampil_keyboard()
    {
        return $this->db->get('m_keyboard');
    }

    public function tampil_mouse()
    {
        return $this->db->get('m_mouse');
    }

    public function tampil_monitor()
    {
        return $this->db->get('m_monitor');
    }
}
