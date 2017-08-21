<?php
class Exbcs_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function get_exbc($where=array())
        {
            
            $this->db->where($where);
            $this->db->order_by('nobc ASC, tglbc ASC');
            $this->db->limit(1000,0);
            $query=$this->db->get('exbcs');
            $data['num']=$query->num_rows();
            $data['data']=$query->result_array();
            return $data;
    
        }
        public function min_exbc($awal)
        {
            
            $this->db->where(array('nobc >'=>$awal));
            $this->db->order_by('nobc ASC, tglbc ASC');
            $this->db->limit(1,0);
            $query=$this->db->get('exbcs');
            return $query->row();
    
        }
         public function all_exbc($bc)
        {
            $this->db->where(array('nobc'=>$bc));
            $this->db->order_by('nobc ASC, tglbc ASC');
            $query=$this->db->get('exbcs');
            $data['num']=$query->num_rows();
            $data['data']=$query->result_array();
            return $data;
    
        }
}