<?php
class M_mypc extends CI_Model
{
    public function tampil_mypc($where)
    {
        $this->db->select('*');
        $this->db->from('rakit');
        $this->db->where($where);
        $this->db->join('m_processor', 'rakit.processor_id=m_processor.processor_id', 'inner');
        $this->db->join('m_brand_processor', 'm_processor.brand_processor_id=m_brand_processor.brand_processor_id', 'inner');
        $this->db->join('m_ram', 'rakit.ram_id=m_ram.ram_id', 'inner');
        $this->db->join('m_brand_ram', 'm_ram.brand_ram_id=m_brand_ram.brand_ram_id', 'inner');
        $this->db->join('m_ddr_ram', 'm_ram.ddr_id=m_ddr_ram.ddr_id', 'inner');
        $this->db->join('m_kapasitas_ram', 'm_ram.kapasitas_id=m_kapasitas_ram.kapasitas_id', 'inner');
        $this->db->join('m_storage', 'rakit.storage_id=m_storage.storage_id', 'inner');
        $this->db->join('m_brand_storage', 'm_storage.brand_storage_id=m_brand_storage.brand_storage_id', 'inner');
        $this->db->join('m_kapasitas_storage', 'm_storage.kapasitas_id=m_kapasitas_storage.kapasitas_id', 'inner');
        $this->db->join('m_motherboard', 'rakit.motherboard_id=m_motherboard.motherboard_id', 'inner');
        $this->db->join('m_brand_motherboard', 'm_motherboard.brand_motherboard_id=m_brand_motherboard.brand_motherboard_id', 'inner');
        return $this->db->get();
    }

    public function ubah_mypc($where)
    {
        return $this->db->get_where('rakit', $where);
    }

    public function detail($where)
    {
        $this->db->select('*');
        $this->db->from('rakit');
        $this->db->where($where);
        $this->db->join('m_processor', 'rakit.processor_id=m_processor.processor_id', 'inner');
        $this->db->join('m_brand_processor', 'm_processor.brand_processor_id=m_brand_processor.brand_processor_id', 'inner');
        $this->db->join('m_ram', 'rakit.ram_id=m_ram.ram_id', 'inner');
        $this->db->join('m_brand_ram', 'm_ram.brand_ram_id=m_brand_ram.brand_ram_id', 'inner');
        $this->db->join('m_ddr_ram', 'm_ram.ddr_id=m_ddr_ram.ddr_id', 'inner');
        $this->db->join('m_kapasitas_ram', 'm_ram.kapasitas_id=m_kapasitas_ram.kapasitas_id', 'inner');
        $this->db->join('m_storage', 'rakit.storage_id=m_storage.storage_id', 'inner');
        $this->db->join('m_brand_storage', 'm_storage.brand_storage_id=m_brand_storage.brand_storage_id', 'inner');
        $this->db->join('m_kapasitas_storage', 'm_storage.kapasitas_id=m_kapasitas_storage.kapasitas_id', 'inner');
        $this->db->join('m_motherboard', 'rakit.motherboard_id=m_motherboard.motherboard_id', 'inner');
        $this->db->join('m_brand_motherboard', 'm_motherboard.brand_motherboard_id=m_brand_motherboard.brand_motherboard_id', 'inner');
        $this->db->join('m_casing', 'rakit.casing_id=m_casing.casing_id', 'inner');
        $this->db->join('m_vga', 'rakit.vga_id=m_vga.vga_id', 'inner');
        $this->db->join('m_psu', 'rakit.psu_id=m_psu.psu_id', 'inner');
        $this->db->join('m_keyboard', 'rakit.keyboard_id=m_keyboard.keyboard_id', 'inner');
        $this->db->join('m_mouse', 'rakit.mouse_id=m_mouse.mouse_id', 'inner');
        $this->db->join('m_monitor', 'rakit.monitor_id=m_monitor.monitor_id', 'inner');
        return $this->db->get();
    }

    public function tampil_export($where)
    {
        $this->db->select('*');
        $this->db->from('rakit');
        $this->db->where($where);
        $this->db->join('m_processor', 'rakit.processor_id=m_processor.processor_id', 'inner');
        $this->db->join('m_brand_processor', 'm_processor.brand_processor_id=m_brand_processor.brand_processor_id', 'inner');
        $this->db->join('m_ram', 'rakit.ram_id=m_ram.ram_id', 'inner');
        $this->db->join('m_brand_ram', 'm_ram.brand_ram_id=m_brand_ram.brand_ram_id', 'inner');
        $this->db->join('m_ddr_ram', 'm_ram.ddr_id=m_ddr_ram.ddr_id', 'inner');
        $this->db->join('m_kapasitas_ram', 'm_ram.kapasitas_id=m_kapasitas_ram.kapasitas_id', 'inner');
        $this->db->join('m_storage', 'rakit.storage_id=m_storage.storage_id', 'inner');
        $this->db->join('m_brand_storage', 'm_storage.brand_storage_id=m_brand_storage.brand_storage_id', 'inner');
        $this->db->join('m_kapasitas_storage', 'm_storage.kapasitas_id=m_kapasitas_storage.kapasitas_id', 'inner');
        $this->db->join('m_motherboard', 'rakit.motherboard_id=m_motherboard.motherboard_id', 'inner');
        $this->db->join('m_brand_motherboard', 'm_motherboard.brand_motherboard_id=m_brand_motherboard.brand_motherboard_id', 'inner');
        $this->db->join('m_casing', 'rakit.casing_id=m_casing.casing_id', 'inner');
        $this->db->join('m_vga', 'rakit.vga_id=m_vga.vga_id', 'inner');
        $this->db->join('m_psu', 'rakit.psu_id=m_psu.psu_id', 'inner');
        $this->db->join('m_keyboard', 'rakit.keyboard_id=m_keyboard.keyboard_id', 'inner');
        $this->db->join('m_mouse', 'rakit.mouse_id=m_mouse.mouse_id', 'inner');
        $this->db->join('m_monitor', 'rakit.monitor_id=m_monitor.monitor_id', 'inner');
        return $this->db->get();
    }

    public function tampil_processor()
    {
        $this->db->select('*');
        $this->db->from('m_processor');
        $this->db->join('m_brand_processor', 'm_processor.brand_processor_id=m_brand_processor.brand_processor_id', 'inner');
        $this->db->order_by('brand_processor', 'ASC');
        return $this->db->get();
    }

    public function tampil_motherboard()
    {
        $this->db->select("*");
        $this->db->from('m_motherboard');
        $this->db->join('m_brand_motherboard', 'm_motherboard.brand_motherboard_id=m_brand_motherboard.brand_motherboard_id', 'inner');
        $this->db->order_by('brand_motherboard', 'ASC');
        return $this->db->get();
    }

    public function tampil_ram()
    {
        $this->db->select('*');
        $this->db->from('m_ram');
        $this->db->join('m_brand_ram', 'm_ram.brand_ram_id=m_brand_ram.brand_ram_id', 'inner');
        $this->db->join('m_ddr_ram', 'm_ram.ddr_id=m_ddr_ram.ddr_id', 'inner');
        $this->db->join('m_kapasitas_ram', 'm_ram.kapasitas_id=m_kapasitas_ram.kapasitas_id', 'inner');
        $this->db->order_by('brand_ram', 'ASC');
        return $this->db->get();
    }

    public function tampil_storage()
    {
        $this->db->select('*');
        $this->db->from('m_storage');
        $this->db->join('m_brand_storage', 'm_storage.brand_storage_id=m_brand_storage.brand_storage_id', 'inner');
        $this->db->join('m_kapasitas_storage', 'm_storage.kapasitas_id=m_kapasitas_storage.kapasitas_id', 'inner');
        $this->db->order_by('brand_storage', 'ASC');
        return $this->db->get();
    }

    public function tampil_casing()
    {
        $this->db->select('*');
        $this->db->from('m_casing');
        $this->db->order_by('nama_casing', 'ASC');
        return $this->db->get();
    }

    public function tampil_vga()
    {
        $this->db->select('*');
        $this->db->from('m_vga');
        $this->db->order_by('type_vga', 'ASC');
        return $this->db->get();
    }

    public function tampil_psu()
    {
        $this->db->select('*');
        $this->db->from('m_psu');
        $this->db->order_by('nama_psu', 'ASC');
        return $this->db->get();
    }

    public function tampil_keyboard()
    {
        $this->db->select('*');
        $this->db->from('m_keyboard');
        $this->db->order_by('nama_keyboard', 'ASC');
        return $this->db->get();
    }

    public function tampil_mouse()
    {
        $this->db->select('*');
        $this->db->from('m_mouse');
        $this->db->order_by('nama_mouse', 'ASC');
        return $this->db->get();
    }

    public function tampil_monitor()
    {
        $this->db->select('*');
        $this->db->from('m_monitor');
        $this->db->order_by('nama_monitor', 'ASC');
        return $this->db->get();
    }
}
