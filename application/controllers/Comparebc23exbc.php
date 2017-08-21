<?php
class Comparebc23exbc extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Bc23s_model');
                $this->load->model('Exbcs_model');
                $this->load->helper('url_helper');
        }
        public function index(){
                $awal=0;
                $bc23=$this->Bc23s_model->min_bc23s($awal);
                $exbc=$this->Exbcs_model->min_exbc($awal);
                if(isset($bc23) == true && isset($exbc) == true){
                        if($bc23->nobc23 <= $exbc->nobc){
                                $awal=$bc23->nobc23;
                                $all_bc23=$this->Bc23s_model->all_bc23s($bc23->nobc23);
                                if($all_bc23['num'] > 0){
                                        foreach($all_bc23['data'] as $rbc23){
                                                echo $rbc23['nobc23'].':'.$rbc23['tglbc23']."<br>";
                                        }
                                }
                                $all_exbc=$this->Exbcs_model->all_exbc($bc23->nobc23);
                                if($all_exbc['num'] > 0){
                                        foreach($all_exbc['data'] as $rexbc){
                                                echo '------------------------'.$rexbc['nobc'].':'.$rexbc['tglbc']."<br>";
                                        }
                                }
                        }else{
                                $awal=$exbc->nobc;
                                $all_bc23=$this->Bc23s_model->all_bc23s($exbc->nobc);
                                if($all_bc23['num'] > 0){
                                        foreach($all_bc23['data'] as $rbc23){
                                                echo $rbc23['nobc23'].':'.$rbc23['tglbc23']."<br>";
                                        }
                                }
                                $all_exbc=$this->Exbcs_model->all_exbc($exbc->nobc);
                                if($all_exbc['num'] > 0){
                                        foreach($all_exbc['data'] as $rexbc){
                                                echo '------------------------'.$rexbc['nobc'].':'.$rexbc['tglbc']."<br>";
                                        }
                                } 
                        }
                         $this->loop_index($awal);
                }else{
                        echo "kosong";
                }

        }
         public function loop_index($awal){
                $bc23=$this->Bc23s_model->min_bc23s($awal);
                $exbc=$this->Exbcs_model->min_exbc($awal);
                if(isset($bc23) == true && isset($exbc) == true){
                        if($bc23->nobc23 <= $exbc->nobc){
                                $awal=$bc23->nobc23;
                                $all_bc23=$this->Bc23s_model->all_bc23s($bc23->nobc23);
                                if($all_bc23['num'] > 0){
                                        foreach($all_bc23['data'] as $rbc23){
                                                echo $rbc23['nobc23'].':'.$rbc23['tglbc23']."<br>";
                                        }
                                }
                                $all_exbc=$this->Exbcs_model->all_exbc($bc23->nobc23);
                                if($all_exbc['num'] > 0){
                                        foreach($all_exbc['data'] as $rexbc){
                                                echo '------------------------'.$rexbc['nobc'].':'.$rexbc['tglbc']."<br>";
                                        }
                                }
                        }else{
                                $awal=$exbc->nobc;
                                $all_bc23=$this->Bc23s_model->all_bc23s($exbc->nobc);
                                if($all_bc23['num'] > 0){
                                        foreach($all_bc23['data'] as $rbc23){
                                                echo $rbc23['nobc23'].':'.$rbc23['tglbc23']."<br>";
                                        }
                                }
                                $all_exbc=$this->Exbcs_model->all_exbc($exbc->nobc);
                                if($all_exbc['num'] > 0){
                                        foreach($all_exbc['data'] as $rexbc){
                                                echo '------------------------'.$rexbc['nobc'].':'.$rexbc['tglbc']."<br>";
                                        }
                                } 
                        }
                         $this->loop_index($awal);
                }else{
                        echo "kosong";
                }

        }
        public function index2()
        {
            $query = $this->Bc23s_model->get_bc23s();
            $i=1;
            $i_last=1;
            $bc_last="-";
             $u=1;
                
            foreach($query as $r){
               if($r['nobc23'] == $bc_last){
                        $u++;
                        echo $i.':'.$u.':'.$r['nobc23'].':'.$r['tglbc23']."<br>";
                        $data[$i][$u]['data']=$r;
                }else{
                        $u=1;
                        $i++;
                        $data[$i][$u]['data']=$r;
                        // $exbc=$this->Exbcs_model->get_exbc(array('nobc'=>$r['nobc23'],'tglbc'=>$r['tglbc23']));
                        $exbc=$this->Exbcs_model->get_exbc(array('nobc'=>$r['nobc23']));
                        $u2=1;
                        echo $i.':'.$u.':'.$r['nobc23'].':'.$r['tglbc23']."<br>";
                        if($exbc['num'] > 0){
                                
                                foreach($exbc['data'] as $rw){
                                        $ex[$u2]=$rw;
                                        $data[$i][$u]['exbc']=$ex;
                                        echo '------------------------'.$rw['nobc'].':'.$rw['tglbc']."<br>";
                                        $u2++;
                                }
                        }
                        
                         
                        
                }
                
                $bc_last=$r['nobc23'];
                
                
            }
            
        }
}