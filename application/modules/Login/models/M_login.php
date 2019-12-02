<?php
class M_login extends CI_Model
{
    function cek($where)
    {
        $result = NULL;
        $query = $this->db->get_where("user", $where);

        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }

    public function forgot($where)
    {
        $result = NULL;
        $query = $this->db->get_where('user', $where);

        if ($query->num_rows() > 0) {
            $result = $query->row();
        }
        return $result;
    }
}
