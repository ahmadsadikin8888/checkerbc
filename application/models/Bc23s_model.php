<?php
class Bc23s_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function get_bc23s()
        {
            
            $this->db->order_by('nobc23 ASC, tglbc23 ASC');
            $this->db->limit(1000,0);
            $query=$this->db->get('bc23s');
            return $query->result_array();
    
        }
        
         public function min_bc23s($awal)
        {
            $this->db->where(array('nobc23 >'=>$awal));
            $this->db->order_by('nobc23 ASC, tglbc23 ASC');
            $this->db->limit(1,0);
            $query=$this->db->get('bc23s');
            return $query->row();
    
        }
         public function all_bc23s($bc)
        {
            $this->db->where(array('nobc23'=>$bc));
            $this->db->order_by('nobc23 ASC, tglbc23 ASC');
            $query=$this->db->get('bc23s');
            $data['num']=$query->num_rows();
            $data['data']=$query->result_array();
            return $data;
    
        }
}