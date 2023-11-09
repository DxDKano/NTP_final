<?php
class Model_download extends CI_Model {
    private $rowtp=27;
    private $rowtrk=38;
    private $rowikt=64;
    private $rowtpr=37;

	public function __construct()
	{
		$this->load->database();
	}

    public function data_tp($tahun)
    {
        $SQL1="
		SELECT *
                FROM sub_tp 
                WHERE tahun=? 
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = $item;
        }
        return $rs;

    }

	public function data_tp_blok3($tahun)
	{
		$SQL1="
		SELECT a.*, 
                `b3_k1`, `b3_k2A`, `b3_k2`, `b3_k3`, `b3_k4`, `b3_k5`, `b3_k6`, `b3_k7`, `b3_k8`, `b3_k9`, `b3_k10`, `b3_k11`, `b3_k12`
                FROM sub_tp a 
                LEFT JOIN sub_tp_blok3 b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=? 
                ORDER BY b3_k1
		";
		$hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowtp);
        }
        return $rs;

	}

    public function data_tp_blok4($tahun)
    {
        $SQL1="
		SELECT a.*, 
                `b4_k1`, `b4_k2`, `b4_k3`, `b4_k4`, `b4_k5`, `b4_k6`
                FROM sub_tp a 
                LEFT JOIN sub_tp_blok4 b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b4_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowtp);
        }
        return $rs;

    }

    public function data_tp_blok4f($tahun)
    {
        $SQL1="
		SELECT a.*, 
                `b4f_k1`, `b4f_k2`, `b4f_k3`, `b4f_k4`, `b4f_k5`, `b4f_k6`, `b4f_k7`
                FROM sub_tp a 
                LEFT JOIN sub_tp_blok4f b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b4f_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowtp);
        }
        return $rs;

    }

    public function data_tp_blok5($tahun)
    {
        $SQL1="
		SELECT a.*, 
                `b5_k1`, `b5_k2`, `b5_k3`, `b5_k4`, `b5_k5`, `b5_k6`, `b5_k7`
                FROM sub_tp a 
                LEFT JOIN sub_tp_blok5 b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b5_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowtp);
        }
        return $rs;

    }

    public function data_tp_blok6($tahun)
    {
        $SQL1="
		SELECT a.*, 
                `b6_k1`, `b6_k2`, `b6_k3`, `b6_k4`, `b6_k5`, `b6_k6`
                FROM sub_tp a 
                LEFT JOIN sub_tp_blok6 b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b6_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowtp);
        }
        return $rs;

    }

    public function data_trk($tahun)
    {
        $SQL1="
		SELECT *
                FROM sub_trk 
                WHERE tahun=? 
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = $item;
        }
        return $rs;

    }

    public function data_trk_blok3a($tahun)
    {
        $SQL1="
		SELECT a.*, 
                `b3a_k1`, `b3a_k2`, `b3a_k3`, `b3a_k4`, `b3a_k5`, `b3a_k6`, `b3a_r1_k3`, `b3a_r1_k4`, `b3a_r2_k3`, `b3a_r2_k4`, `b3a_r3_k3`, `b3a_r3_k4`, `b3a_r4_k3`, `b3a_r4_k4`, `b3a_r5_k3`, `b3a_r5_k4`, `b3a_r6_k3`, `b3a_r6_k4`, `b3a_r7_k3`, `b3a_r7_k4`, `b3a_r8_k3`, `b3a_r9_k3`, `b3a_r9_k4`, `b3a_r10_k3`, `b3a_r10_k4`, `b3a_r11_k4`, `b3a_r12_k4`
                FROM sub_trk a 
                LEFT JOIN sub_trk_blok3a b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b3a_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowtrk);
        }
        return $rs;

    }

    public function data_trk_blok3b($tahun)
    {
        $SQL1="
		SELECT a.*, 
                `b3b_k1`, `b3b_k2A`, `b3b_k2`, `b3b_k3`, `b3_k4`, `b3_k5`, `b3_k6`, `b3_k7`, `b3_k8`, `b3_k9`, `b3_k10`
                FROM sub_trk a 
                LEFT JOIN sub_trk_blok3b b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b3b_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowtrk);
        }
        return $rs;

    }

    public function data_trk_blok4($tahun)
    {
        $SQL1="
		SELECT a.*, 
                `b4_k1`, `b4_k2`, `b4_k3`, `b4_k4`, `b4_k5`, `b4_k6`
                FROM sub_trk a 
                LEFT JOIN sub_trk_blok4 b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b4_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowtrk);
        }
        return $rs;

    }

    public function data_trk_blok5($tahun)
    {
        $SQL1="
		SELECT a.*, 
                `b5_k1`, `b5_k2`, `b5_k3`, `b5_k4`, `b5_k5`, `b5_k6`, `b5_k7`
                FROM sub_trk a 
                LEFT JOIN sub_trk_blok5 b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b5_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowtrk);
        }
        return $rs;

    }

    public function data_trk_blok6($tahun)
    {
        $SQL1="
		SELECT a.*, 
                `b6_k1`, `b6_k2`, `b6_k3`, `b6_k4`, `b6_k5`, `b6_k6`
                FROM sub_trk a 
                LEFT JOIN sub_trk_blok6 b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b6_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowtrk);
        }
        return $rs;

    }

    public function data_ikt($tahun)
    {
        $SQL1="
		SELECT *
                FROM sub_ikt 
                WHERE tahun=? 
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = $item;
        }
        return $rs;

    }

    public function data_ikt_blok4($tahun)
    {
        $SQL1="
		SELECT a.*, 
                `b4_k1`, `b4_k2`, `b4_k3`, `b4_k4`, `b4_k5`, `b4_k6`, `b4_k7`, `b4_k8`
                FROM sub_ikt a 
                LEFT JOIN sub_ikt_blok4 b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b4_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowikt);
        }
        return $rs;

    }

    public function data_ikt_blok5($tahun)
    {
        $SQL1="
		SELECT a.*, 
                `b5_k1`, `b5_k2`, `b5_k3`, `b5_k4`, `b5_k5`, `b5_k6`
                FROM sub_ikt a 
                LEFT JOIN sub_ikt_blok5 b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b5_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowikt);
        }
        return $rs;

    }

    public function data_ikt_blok5d($tahun)
    {
        $SQL1="
		SELECT a.*, 
                `b5_k1`, `b5_k2`, `b5_k3`, `b5_k4`, `b5_k5`, `b5_k6`, `b5_k7`
                FROM sub_ikt a 
                LEFT JOIN sub_ikt_blok5d b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b5_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowikt);
        }
        return $rs;

    }

    public function data_ikt_blok6($tahun)
    {
        $SQL1="
		SELECT a.*, 
                `b6_k1`, `b6_k2`, `b6_k3`, `b6_k4`, `b6_k5`, `b6_k6`, `b6_k7`
                FROM sub_ikt a 
                LEFT JOIN sub_ikt_blok6 b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b6_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowikt);
        }
        return $rs;

    }

    public function data_ikt_blok7($tahun)
    {
        $SQL1="
		SELECT a.*, 
                `b7_k1`, `b7_k2`, `b7_k3`, `b7_k4`, `b7_k5`, `b7_k6`
                FROM sub_ikt a 
                LEFT JOIN sub_ikt_blok7 b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b7_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowikt);
        }
        return $rs;

    }

    public function data_tpr($tahun)
    {
        $SQL1="
		SELECT *
                FROM sub_tpr
                WHERE tahun=? 
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = $item;
        }
        return $rs;

    }

    public function data_tpr_blok3($tahun)
    {
        $SQL1="
		SELECT a.*, 
                `b3_k1`, `b3_k2A`, `b3_k2`, `b3_k3`, `b3_k4`, `b3_k5`, `b3_k6`, `b3_k7`, `b3_k8`, `b3_k9`, `b3_k10`,
		       `b3_k11`, `b3_k12`, `b3_k13`, `b3_k14`
                FROM sub_tpr a 
                LEFT JOIN sub_tpr_blok3 b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b3_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowtpr);
        }
        return $rs;

    }

    public function data_tpr_blok4($tahun)
    {
        $SQL1="
		SELECT a.*, 
               `b4_k1`, `b4_k2`, `b4_k3`, `b4_k4`, `b4_k5`, `b4_k6`
                FROM sub_tpr a 
                LEFT JOIN sub_tpr_blok4 b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b4_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowtpr);
        }
        return $rs;

    }

    public function data_tpr_blok4f($tahun)
    {
        $SQL1="
		SELECT a.*, 
               `b4f_k1`, `b4f_k2`, `b4f_k3`, `b4f_k4`, `b4f_k5`, `b4f_k6`, `b4f_k7`
                FROM sub_tpr a 
                LEFT JOIN sub_tpr_blok4f b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b4f_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowtpr);
        }
        return $rs;

    }

    public function data_tpr_blok5($tahun)
    {
        $SQL1="
		SELECT a.*, 
               `b5_k1`, `b5_k2`, `b5_k3`, `b5_k4`, `b5_k5`, `b5_k6`, `b5_k7`
                FROM sub_tpr a 
                LEFT JOIN sub_tpr_blok5 b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b5_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowtpr);
        }
        return $rs;

    }

    public function data_tpr_blok6($tahun)
    {
        $SQL1="
		SELECT a.*, 
               `b6_k1`, `b6_k2`, `b6_k3`, `b6_k4`, `b6_k5`, `b6_k6`
                FROM sub_tpr a 
                LEFT JOIN sub_tpr_blok6 b ON a.tahun=b.tahun 
                                        AND a.id_prov=b.id_prov 
                                        AND a.id_kab=b.id_kab 
                                        AND a.id_kec=b.id_kec 
                                        AND a.id_desa=b.id_desa 
                                        AND a.no_ruta=b.no_ruta
                WHERE a.tahun=?
                ORDER BY b6_k1
		";
        $hasil = $this->db->query($SQL1,array(intval($tahun)));
        $rs = array();
        foreach ($hasil->result_array() as $item){
            if(!isset($rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']])){
                $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']] = array();
            }
            $rs[$item['tahun'].$item['id_prov'].$item['id_kab'].$item['id_kec'].$item['id_desa'].$item['no_ruta']][] = array_splice($item,$this->rowtpr);
        }
        return $rs;

    }

	public function daftar_anomali_2($tahun)
	{
		$SQL1="
		SELECT a.id_prov, a.id_kab, a.id_kec, a.id_desa, a.no_ruta, a.nama_ruta, a.b3_k2A, a.b3_k2, a.b3_k3, a.b3_k4, a.b3_k5, a.b3_k6, a.b3_k7, a.b3_k8, a.b3_k9, a.b3_k10, a.b3_k11, a.b3_k12, b.luas, a.b3_k7/a.b3_k6 AS nilai_perkilo, b.batas_bawah, b.batas_atas
		FROM
			(SELECT *
			FROM sub_tp_blok3
			WHERE tahun=".$tahun.") a
			LEFT JOIN
			(SELECT *
			 FROM rh_tp) b
			 ON a.kode_komoditas=b.id_komoditas
		WHERE a.b3_k7/a.b3_k6 < b.batas_bawah OR a.b3_k7/a.b3_k6 > b.batas_atas
		";
		$hasil = $this->db->query($SQL1);
		return $hasil->result_array();
	}

	public function daftar_anomali_3($tahun)
	{
		$SQL1="
		SELECT a.id_prov, a.id_kab, a.id_kec, a.id_desa, a.no_ruta, a.nama_ruta, a.kode_komoditas, b.kode_komoditas
		FROM
			(SELECT *
			FROM sub_tp
			WHERE tahun=".$tahun.") a
			LEFT JOIN
			(SELECT *
			 FROM sub_tp_blok3) b
			 ON a.no_ruta=b.no_ruta
             WHERE b.komoditas IS NULL
		";
		$hasil = $this->db->query($SQL1);
		return $hasil->result_array();
	}

	// public function daftar_tabulasi_tabel_1_pub($filter_tahun)
	// {
	// 	$SQL1="
	// 	SELECT g.nama_prov as nama_prov, IFNULL(g.pma,0) as pma, IFNULL(g.pmdn,0) as pmdn, IFNULL(g.lainnya,0) as lainnya, IFNULL(h.jumlah,0) as jumlah
	// 	FROM
	// 			(SELECT e.id_prov, e.nama_prov, e.pma, e.pmdn, f.lainnya
	// 			 FROM
	// 					 (SELECT c.id_prov, c.nama_prov, c.pma, d.pmdn
	// 						FROM
	// 								(SELECT a.id_prov, a.nama_prov, b.pma
	// 								FROM (SELECT * FROM propinsi) a
	// 								LEFT JOIN (
	// 										SELECT kode_prov, COUNT(*) as pma
	// 										FROM ltp_halaman1_tab
	// 										WHERE status_permodalan = '1' AND tahun = '".$filter_tahun."'
	// 										GROUP BY kode_prov) b
	// 								ON a.id_prov = b.kode_prov) c
	// 										LEFT JOIN (
	// 												SELECT kode_prov, COUNT(*) as pmdn
	// 												FROM ltp_halaman1_tab
	// 												WHERE status_permodalan = '2' AND tahun = '".$filter_tahun."'
	// 												GROUP BY kode_prov) d
	// 										ON c.id_prov = d.kode_prov) e
	// 												LEFT JOIN (
	// 														SELECT kode_prov, COUNT(*) as lainnya
	// 														FROM ltp_halaman1_tab
	// 														WHERE status_permodalan = '3' AND tahun = '".$filter_tahun."'
	// 														GROUP BY kode_prov) f
	// 												ON e.id_prov = f.kode_prov) g
	// 														LEFT JOIN (
	// 																SELECT kode_prov, COUNT(*) as jumlah
	// 																FROM ltp_halaman1_tab
	// 																WHERE status_permodalan != '' AND tahun = '".$filter_tahun."'
	// 																GROUP BY kode_prov) h
	// 														ON g.id_prov = h.kode_prov
	// 														ORDER BY id_prov
	// 	";
	// 	$hasil = $this->db->query($SQL1);
	// 	return $hasil->result_array();
	// }

	public function tabulasi_pma_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(count(*),0) as pma_nas');
		$this->db->from($ltp);
		$this->db->where('status_permodalan','1');
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_pmdn_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(count(*),0) as pmdn_nas');
		$this->db->from($ltp);
		$this->db->where('status_permodalan','2');
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_lainnya_modal_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(count(*),0) as lainnya_nas');
		$this->db->from($ltp);
		$this->db->where('status_permodalan','3');
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_jumlah_modal_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(count(*),0) as jumlah_nas');
		$this->db->from($ltp);
		$this->db->where('status_permodalan !=','');
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function daftar_tabulasi_tabel_3($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT m.nama_prov as nama_prov, IFNULL(m.persero,0) as persero, IFNULL(m.pt,0) as pt, IFNULL(m.cv,0) as cv, IFNULL(m.firma,0) as firma, IFNULL(m.koperasi,0) as koperasi, IFNULL(m.lainnya,0) as lainnya, IFNULL(n.jumlah,0) as jumlah
		FROM
		    (SELECT k.id_prov, k.nama_prov, k.persero, k.pt, k.cv, k.firma, k.koperasi, l.lainnya
		    FROM
		        (SELECT i.id_prov, i.nama_prov, i.persero, i.pt, i.cv, i.firma, j.koperasi
		        FROM
		            (SELECT g.id_prov, g.nama_prov, g.persero, g.pt, g.cv, h.firma
		            FROM
		                (SELECT e.id_prov, e.nama_prov, e.persero, e.pt, f.cv
		                FROM
		                    (SELECT c.id_prov, c.nama_prov, c.persero, d.pt
		                    FROM
		                        (SELECT a.id_prov, a.nama_prov, b.persero
		                        FROM (SELECT * FROM propinsi) a
		                        LEFT JOIN (
		                            SELECT kode_prov, COUNT(*) as persero
		                            FROM ".$ltp."
		                            WHERE bentuk_badan_usaha = '1' AND tahun = '".$filter_tahun."'
		                            GROUP BY kode_prov) b
		                        ON a.id_prov = b.kode_prov) c
		                            LEFT JOIN (
		                                SELECT kode_prov, COUNT(*) as pt
		                                FROM ".$ltp."
		                                WHERE bentuk_badan_usaha = '2' AND tahun = '".$filter_tahun."'
		                                GROUP BY kode_prov) d
		                            ON c.id_prov = d.kode_prov) e
		                                LEFT JOIN (
		                                    SELECT kode_prov, COUNT(*) as cv
		                                    FROM ".$ltp."
		                                    WHERE bentuk_badan_usaha = '3' AND tahun = '".$filter_tahun."'
		                                    GROUP BY kode_prov) f
		                                ON e.id_prov = f.kode_prov) g
		                                    LEFT JOIN (
		                                        SELECT kode_prov, COUNT(*) as firma
		                                        FROM ".$ltp."
		                                        WHERE bentuk_badan_usaha = '4' AND tahun = '".$filter_tahun."'
		                                        GROUP BY kode_prov) h
		                                    ON g.id_prov = h.kode_prov) i
		                                        LEFT JOIN (
		                                            SELECT kode_prov, COUNT(*) as koperasi
		                                            FROM ".$ltp."
		                                            WHERE bentuk_badan_usaha = '5' AND tahun = '".$filter_tahun."'
		                                            GROUP BY kode_prov) j
		                                        ON i.id_prov = j.kode_prov) k
		                                            LEFT JOIN (
		                                                SELECT kode_prov, COUNT(*) as lainnya
		                                                FROM ".$ltp."
		                                                WHERE bentuk_badan_usaha = '6' AND tahun = '".$filter_tahun."'
		                                                GROUP BY kode_prov) l
		                                            ON k.id_prov = l.kode_prov) m
		                                                LEFT JOIN (
		                                                    SELECT kode_prov, COUNT(*) as jumlah
		                                                    FROM ".$ltp."
		                                                    WHERE bentuk_badan_usaha != '' AND tahun = '".$filter_tahun."'
		                                                    GROUP BY kode_prov) n
		                                                ON m.id_prov = n.kode_prov
		                                                ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function daftar_tabulasi_tabel_4($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT g.nama_prov as nama_prov, IFNULL(g.tnp_cabang,0) as tnp_cabang, IFNULL(g.pusat,0) as pusat, IFNULL(g.cabang,0) as cabang, IFNULL(h.jumlah,0) as jumlah
		FROM
		    (SELECT e.id_prov, e.nama_prov, e.tnp_cabang, e.pusat, f.cabang
		     FROM
		         (SELECT c.id_prov, c.nama_prov, c.tnp_cabang, d.pusat
		          FROM
		             	(SELECT a.id_prov, a.nama_prov, b.tnp_cabang
		              FROM (SELECT * FROM propinsi) a
		              LEFT JOIN (
		                  SELECT kode_prov, COUNT(*) as tnp_cabang
		                  FROM ".$ltp."
		                  WHERE status_perusahaan = '1' AND tahun = '".$filter_tahun."'
		                  GROUP BY kode_prov) b
		              ON a.id_prov = b.kode_prov) c
		              		LEFT JOIN (
		                  		SELECT kode_prov, COUNT(*) as pusat
		                      FROM ".$ltp."
		                      WHERE status_perusahaan = '2' AND tahun = '".$filter_tahun."'
		                      GROUP BY kode_prov) d
		                  ON c.id_prov = d.kode_prov) e
		                  		LEFT JOIN (
		                      		SELECT kode_prov, COUNT(*) as cabang
		                          FROM ".$ltp."
		                          WHERE status_perusahaan = '3' AND tahun = '".$filter_tahun."'
		                          GROUP BY kode_prov) f
		                      ON e.id_prov = f.kode_prov) g
		                          LEFT JOIN (
		                          		SELECT kode_prov, COUNT(*) as jumlah
		                              FROM ".$ltp."
		                              WHERE status_perusahaan != '' AND tahun = '".$filter_tahun."'
		                              GROUP BY kode_prov) h
		                          ON g.id_prov = h.kode_prov
                              ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function daftar_tabulasi_tabel_5($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT e.nama_prov as nama_prov, IFNULL(e.penangkapan,0) as penangkapan, IFNULL(e.penangkapan_pengolahan,0) as penangkapan_pengolahan, IFNULL(f.jumlah,0) as jumlah
		 FROM
				 (SELECT c.id_prov, c.nama_prov, c.penangkapan, d.penangkapan_pengolahan
					FROM
							(SELECT a.id_prov, a.nama_prov, b.penangkapan
							FROM (SELECT * FROM propinsi) a
							LEFT JOIN (
									SELECT kode_prov, COUNT(*) as penangkapan
									FROM ".$ltp."
									WHERE jenis_kegiatan_utama = '1' AND tahun = '".$filter_tahun."'
									GROUP BY kode_prov) b
							ON a.id_prov = b.kode_prov) c
									LEFT JOIN (
											SELECT kode_prov, COUNT(*) as penangkapan_pengolahan
											FROM ".$ltp."
											WHERE jenis_kegiatan_utama = '2' AND tahun = '".$filter_tahun."'
											GROUP BY kode_prov) d
									ON c.id_prov = d.kode_prov) e
											LEFT JOIN (
													SELECT kode_prov, COUNT(*) as jumlah
													FROM ".$ltp."
													WHERE jenis_kegiatan_utama != '' AND tahun = '".$filter_tahun."'
													GROUP BY kode_prov) f
											ON e.id_prov = f.kode_prov
                      ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function daftar_tabulasi_tabel_6($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT i.nama_prov, IFNULL(i.produksi_lk,0) as produksi_lk, IFNULL(i.produksi_pr,0) as produksi_pr, IFNULL(i.non_lk,0) as non_lk, IFNULL(i.non_pr,0) as non_pr, IFNULL(j.jumlah,0) as jumlah
		        FROM
		            (SELECT g.id_prov, g.nama_prov, g.produksi_lk, g.produksi_pr, g.non_lk, h.non_pr
		            FROM
		                (SELECT e.id_prov, e.nama_prov, e.produksi_lk, e.produksi_pr, f.non_lk
		                FROM
		                    (SELECT c.id_prov, c.nama_prov, c.produksi_lk, d.produksi_pr
		                    FROM
		                        (SELECT a.id_prov, a.nama_prov, b.produksi_lk
		                        FROM (SELECT * FROM propinsi) a
		                        LEFT JOIN (
		                            SELECT kode_prov, SUM(IFNULL(b3_jumlah_k2,0) + IFNULL(b3_jumlah_k4,0)) as produksi_lk
		                            FROM ".$ltp."
		                            WHERE tahun = '".$filter_tahun."'
		                            GROUP BY kode_prov) b
		                        ON a.id_prov = b.kode_prov) c
		                            LEFT JOIN (
		                                SELECT kode_prov, SUM(IFNULL(b3_jumlah_k3,0) + IFNULL(b3_jumlah_k5,0)) as produksi_pr
				                            FROM ".$ltp."
				                            WHERE tahun = '".$filter_tahun."'
				                            GROUP BY kode_prov) d
		                            ON c.id_prov = d.kode_prov) e
		                                LEFT JOIN (
		                                    SELECT kode_prov, SUM(IFNULL(b3_jumlah_k6,0) + IFNULL(b3_jumlah_k8,0)) as non_lk
						                            FROM ".$ltp."
						                            WHERE tahun = '".$filter_tahun."'
						                            GROUP BY kode_prov) f
		                                ON e.id_prov = f.kode_prov) g
		                                    LEFT JOIN (
		                                        SELECT kode_prov, SUM(IFNULL(b3_jumlah_k7,0) + IFNULL(b3_jumlah_k9,0)) as non_pr
								                            FROM ".$ltp."
								                            WHERE tahun = '".$filter_tahun."'
								                            GROUP BY kode_prov) h
		                                    ON g.id_prov = h.kode_prov) i
		                                        LEFT JOIN (
		                                            SELECT kode_prov, SUM(IFNULL(b3_jumlah_k2,0) + IFNULL(b3_jumlah_k3,0) + IFNULL(b3_jumlah_k4,0) + IFNULL(b3_jumlah_k5,0) + IFNULL(b3_jumlah_k6,0) + IFNULL(b3_jumlah_k7,0) + IFNULL(b3_jumlah_k8,0) + IFNULL(b3_jumlah_k9,0)) as jumlah
										                            FROM ".$ltp."
										                            WHERE tahun = '".$filter_tahun."'
										                            GROUP BY kode_prov) j
		                                        ON i.id_prov = j.kode_prov
                                    				ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function daftar_tabulasi_tabel_7($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT i.nama_prov, IFNULL(i.produksi_ttp,0) as produksi_ttp, IFNULL(i.produksi_tdk_ttp,0) as produksi_tdk_ttp, IFNULL(i.non_ttp,0) as non_ttp, IFNULL(i.non_tdk_ttp,0) as non_tdk_ttp, IFNULL(j.jumlah,0) as jumlah
		        FROM
		            (SELECT g.id_prov, g.nama_prov, g.produksi_ttp, g.produksi_tdk_ttp, g.non_ttp, h.non_tdk_ttp
		            FROM
		                (SELECT e.id_prov, e.nama_prov, e.produksi_ttp, e.produksi_tdk_ttp, f.non_ttp
		                FROM
		                    (SELECT c.id_prov, c.nama_prov, c.produksi_ttp, d.produksi_tdk_ttp
		                    FROM
		                        (SELECT a.id_prov, a.nama_prov, b.produksi_ttp
		                        FROM (SELECT * FROM propinsi) a
		                        LEFT JOIN (
		                            SELECT kode_prov, SUM(IFNULL(b3_jumlah_k2,0) + IFNULL(b3_jumlah_k3,0)) as produksi_ttp
		                            FROM ".$ltp."
		                            WHERE tahun = '".$filter_tahun."'
		                            GROUP BY kode_prov) b
		                        ON a.id_prov = b.kode_prov) c
		                            LEFT JOIN (
		                                SELECT kode_prov, SUM(IFNULL(b3_jumlah_k4,0) + IFNULL(b3_jumlah_k5,0)) as produksi_tdk_ttp
				                            FROM ".$ltp."
				                            WHERE tahun = '".$filter_tahun."'
				                            GROUP BY kode_prov) d
		                            ON c.id_prov = d.kode_prov) e
		                                LEFT JOIN (
		                                    SELECT kode_prov, SUM(IFNULL(b3_jumlah_k6,0) + IFNULL(b3_jumlah_k7,0)) as non_ttp
						                            FROM ".$ltp."
						                            WHERE tahun = '".$filter_tahun."'
						                            GROUP BY kode_prov) f
		                                ON e.id_prov = f.kode_prov) g
		                                    LEFT JOIN (
		                                        SELECT kode_prov, SUM(IFNULL(b3_jumlah_k8,0) + IFNULL(b3_jumlah_k9,0)) as non_tdk_ttp
								                            FROM ".$ltp."
								                            WHERE tahun = '".$filter_tahun."'
								                            GROUP BY kode_prov) h
		                                    ON g.id_prov = h.kode_prov) i
		                                        LEFT JOIN (
		                                            SELECT kode_prov, SUM(IFNULL(b3_jumlah_k2,0) + IFNULL(b3_jumlah_k3,0) + IFNULL(b3_jumlah_k4,0) + IFNULL(b3_jumlah_k5,0) + IFNULL(b3_jumlah_k6,0) + IFNULL(b3_jumlah_k7,0) + IFNULL(b3_jumlah_k8,0) + IFNULL(b3_jumlah_k9,0)) as jumlah
										                            FROM ".$ltp."
										                            WHERE tahun = '".$filter_tahun."'
										                            GROUP BY kode_prov) j
		                                        ON i.id_prov = j.kode_prov
                                    				ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function daftar_tabulasi_tabel_8($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT q.nama_prov, IFNULL(q.tdk_sklh,0) as tdk_sklh, IFNULL(q.tdk_sd,0) as tdk_sd, IFNULL(q.sd,0) as sd, IFNULL(q.smp,0) as smp, IFNULL(q.sma,0) as sma, IFNULL(q.smk,0) as smk, IFNULL(q.akademi,0) as akademi, IFNULL(q.d4,0) as d4, IFNULL(r.jumlah,0) as jumlah
		FROM
		    (SELECT o.id_prov, o.nama_prov, o.tdk_sklh, o.tdk_sd, o.sd, o.smp, o.sma, o.smk, o.akademi, p.d4
		    FROM
		    	(SELECT m.id_prov, m.nama_prov, m.tdk_sklh, m.tdk_sd, m.sd, m.smp, m.sma, m.smk, n.akademi
				FROM
				    (SELECT k.id_prov, k.nama_prov, k.tdk_sklh, k.tdk_sd, k.sd, k.smp, k.sma, l.smk
				    FROM
				        (SELECT i.id_prov, i.nama_prov, i.tdk_sklh, i.tdk_sd, i.sd, i.smp, j.sma
				        FROM
				            (SELECT g.id_prov, g.nama_prov, g.tdk_sklh, g.tdk_sd, g.sd, h.smp
				            FROM
				                (SELECT e.id_prov, e.nama_prov, e.tdk_sklh, e.tdk_sd, f.sd
				                FROM
				                    (SELECT c.id_prov, c.nama_prov, c.tdk_sklh, d.tdk_sd
				                    FROM
				                        (SELECT a.id_prov, a.nama_prov, b.tdk_sklh
				                        FROM (SELECT * FROM propinsi) a
				                        LEFT JOIN (
				                            SELECT kode_prov, SUM(IFNULL(b3_r1_k2,0) + IFNULL(b3_r1_k3,0) + IFNULL(b3_r1_k4,0) + IFNULL(b3_r1_k5,0)) as tdk_sklh
				                            FROM ".$ltp."
				                            WHERE tahun = '".$filter_tahun."'
				                            GROUP BY kode_prov) b
				                        ON a.id_prov = b.kode_prov) c
				                            LEFT JOIN (
				                                SELECT kode_prov, SUM(IFNULL(b3_r2_k2,0) + IFNULL(b3_r2_k3,0) + IFNULL(b3_r2_k4,0) + IFNULL(b3_r2_k5,0)) as tdk_sd
						                            FROM ".$ltp."
						                            WHERE tahun = '".$filter_tahun."'
						                            GROUP BY kode_prov) d
				                            ON c.id_prov = d.kode_prov) e
				                                LEFT JOIN (
				                                    SELECT kode_prov, SUM(IFNULL(b3_r3_k2,0) + IFNULL(b3_r3_k3,0) + IFNULL(b3_r3_k4,0) + IFNULL(b3_r3_k5,0)) as sd
								                            FROM ".$ltp."
								                            WHERE tahun = '".$filter_tahun."'
								                            GROUP BY kode_prov) f
				                                ON e.id_prov = f.kode_prov) g
				                                    LEFT JOIN (
				                                        SELECT kode_prov, SUM(IFNULL(b3_r4_k2,0) + IFNULL(b3_r4_k3,0) + IFNULL(b3_r4_k4,0) + IFNULL(b3_r4_k5,0)) as smp
										                            FROM ".$ltp."
										                            WHERE tahun = '".$filter_tahun."'
										                            GROUP BY kode_prov) h
				                                    ON g.id_prov = h.kode_prov) i
				                                        LEFT JOIN (
				                                            SELECT kode_prov, SUM(IFNULL(b3_r5_k2,0) + IFNULL(b3_r5_k3,0) + IFNULL(b3_r5_k4,0) + IFNULL(b3_r5_k5,0)) as sma
												                            FROM ".$ltp."
												                            WHERE tahun = '".$filter_tahun."'
												                            GROUP BY kode_prov) j
				                                        ON i.id_prov = j.kode_prov) k
				                                            LEFT JOIN (
				                                                SELECT kode_prov, SUM(IFNULL(b3_r6_k2,0) + IFNULL(b3_r6_k3,0) + IFNULL(b3_r6_k4,0) + IFNULL(b3_r6_k5,0)) as smk
														                            FROM ".$ltp."
														                            WHERE tahun = '".$filter_tahun."'
														                            GROUP BY kode_prov) l
				                                            ON k.id_prov = l.kode_prov) m
				                                                LEFT JOIN (
				                                                    SELECT kode_prov, SUM(IFNULL(b3_r7_k2,0) + IFNULL(b3_r7_k3,0) + IFNULL(b3_r7_k4,0) + IFNULL(b3_r7_k5,0)) as akademi
																                            FROM ".$ltp."
																                            WHERE tahun = '".$filter_tahun."'
																                            GROUP BY kode_prov) n
				                                                ON m.id_prov = n.kode_prov) o
		                                                        	LEFT JOIN (
		                                                            	SELECT kode_prov, SUM(IFNULL(b3_r8_k2,0) + IFNULL(b3_r8_k3,0) + IFNULL(b3_r8_k4,0) + IFNULL(b3_r8_k5,0)) as d4
																			                            FROM ".$ltp."
																			                            WHERE tahun = '".$filter_tahun."'
																			                            GROUP BY kode_prov) p
		                                    											ON o.id_prov = p.kode_prov) q
		                                                            	LEFT JOIN (
		                                                                	SELECT kode_prov, SUM(IFNULL(b3_jumlah_k2,0) + IFNULL(b3_jumlah_k3,0) + IFNULL(b3_jumlah_k4,0) + IFNULL(b3_jumlah_k5,0)) as jumlah
																					                            FROM ".$ltp."
																					                            WHERE tahun = '".$filter_tahun."'
																					                            GROUP BY kode_prov) r
		                                    													ON q.id_prov = r.kode_prov
		                                                                ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function daftar_tabulasi_tabel_9($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT q.nama_prov, IFNULL(q.tdk_sklh,0) as tdk_sklh, IFNULL(q.tdk_sd,0) as tdk_sd, IFNULL(q.sd,0) as sd, IFNULL(q.smp,0) as smp, IFNULL(q.sma,0) as sma, IFNULL(q.smk,0) as smk, IFNULL(q.akademi,0) as akademi, IFNULL(q.d4,0) as d4, IFNULL(r.jumlah,0) as jumlah
		FROM
		    (SELECT o.id_prov, o.nama_prov, o.tdk_sklh, o.tdk_sd, o.sd, o.smp, o.sma, o.smk, o.akademi, p.d4
		    FROM
		    	(SELECT m.id_prov, m.nama_prov, m.tdk_sklh, m.tdk_sd, m.sd, m.smp, m.sma, m.smk, n.akademi
				FROM
				    (SELECT k.id_prov, k.nama_prov, k.tdk_sklh, k.tdk_sd, k.sd, k.smp, k.sma, l.smk
				    FROM
				        (SELECT i.id_prov, i.nama_prov, i.tdk_sklh, i.tdk_sd, i.sd, i.smp, j.sma
				        FROM
				            (SELECT g.id_prov, g.nama_prov, g.tdk_sklh, g.tdk_sd, g.sd, h.smp
				            FROM
				                (SELECT e.id_prov, e.nama_prov, e.tdk_sklh, e.tdk_sd, f.sd
				                FROM
				                    (SELECT c.id_prov, c.nama_prov, c.tdk_sklh, d.tdk_sd
				                    FROM
				                        (SELECT a.id_prov, a.nama_prov, b.tdk_sklh
				                        FROM (SELECT * FROM propinsi) a
				                        LEFT JOIN (
				                            SELECT kode_prov, SUM(IFNULL(b3_r1_k6,0) + IFNULL(b3_r1_k7,0) + IFNULL(b3_r1_k8,0) + IFNULL(b3_r1_k9,0)) as tdk_sklh
				                            FROM ".$ltp."
				                            WHERE tahun = '".$filter_tahun."'
				                            GROUP BY kode_prov) b
				                        ON a.id_prov = b.kode_prov) c
				                            LEFT JOIN (
				                                SELECT kode_prov, SUM(IFNULL(b3_r2_k6,0) + IFNULL(b3_r2_k7,0) + IFNULL(b3_r2_k8,0) + IFNULL(b3_r2_k9,0)) as tdk_sd
						                            FROM ".$ltp."
						                            WHERE tahun = '".$filter_tahun."'
						                            GROUP BY kode_prov) d
				                            ON c.id_prov = d.kode_prov) e
				                                LEFT JOIN (
				                                    SELECT kode_prov, SUM(IFNULL(b3_r3_k6,0) + IFNULL(b3_r3_k7,0) + IFNULL(b3_r3_k8,0) + IFNULL(b3_r3_k9,0)) as sd
								                            FROM ".$ltp."
								                            WHERE tahun = '".$filter_tahun."'
								                            GROUP BY kode_prov) f
				                                ON e.id_prov = f.kode_prov) g
				                                    LEFT JOIN (
				                                        SELECT kode_prov, SUM(IFNULL(b3_r4_k6,0) + IFNULL(b3_r4_k7,0) + IFNULL(b3_r4_k8,0) + IFNULL(b3_r4_k9,0)) as smp
										                            FROM ".$ltp."
										                            WHERE tahun = '".$filter_tahun."'
										                            GROUP BY kode_prov) h
				                                    ON g.id_prov = h.kode_prov) i
				                                        LEFT JOIN (
				                                            SELECT kode_prov, SUM(IFNULL(b3_r5_k6,0) + IFNULL(b3_r5_k7,0) + IFNULL(b3_r5_k8,0) + IFNULL(b3_r5_k9,0)) as sma
												                            FROM ".$ltp."
												                            WHERE tahun = '".$filter_tahun."'
												                            GROUP BY kode_prov) j
				                                        ON i.id_prov = j.kode_prov) k
				                                            LEFT JOIN (
				                                                SELECT kode_prov, SUM(IFNULL(b3_r6_k6,0) + IFNULL(b3_r6_k7,0) + IFNULL(b3_r6_k8,0) + IFNULL(b3_r6_k9,0)) as smk
														                            FROM ".$ltp."
														                            WHERE tahun = '".$filter_tahun."'
														                            GROUP BY kode_prov) l
				                                            ON k.id_prov = l.kode_prov) m
				                                                LEFT JOIN (
				                                                    SELECT kode_prov, SUM(IFNULL(b3_r7_k6,0) + IFNULL(b3_r7_k7,0) + IFNULL(b3_r7_k8,0) + IFNULL(b3_r7_k9,0)) as akademi
																                            FROM ".$ltp."
																                            WHERE tahun = '".$filter_tahun."'
																                            GROUP BY kode_prov) n
				                                                ON m.id_prov = n.kode_prov) o
		                                                        	LEFT JOIN (
		                                                            	SELECT kode_prov, SUM(IFNULL(b3_r8_k6,0) + IFNULL(b3_r8_k7,0) + IFNULL(b3_r8_k8,0) + IFNULL(b3_r8_k9,0)) as d4
																			                            FROM ".$ltp."
																			                            WHERE tahun = '".$filter_tahun."'
																			                            GROUP BY kode_prov) p
		                                    											ON o.id_prov = p.kode_prov) q
		                                                            	LEFT JOIN (
		                                                                	SELECT kode_prov, SUM(IFNULL(b3_jumlah_k6,0) + IFNULL(b3_jumlah_k7,0) + IFNULL(b3_jumlah_k8,0) + IFNULL(b3_jumlah_k9,0)) as jumlah
																					                            FROM ".$ltp."
																					                            WHERE tahun = '".$filter_tahun."'
																					                            GROUP BY kode_prov) r
		                                    													ON q.id_prov = r.kode_prov
		                                                                ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function daftar_tabulasi_tabel_10($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT i.nama_prov, IFNULL(i.produksi_lk,0) as produksi_lk, IFNULL(i.produksi_pr,0) as produksi_pr, IFNULL(i.non_lk,0) as non_lk, IFNULL(i.non_pr,0) as non_pr, IFNULL(j.jumlah,0) as jumlah
		        FROM
		            (SELECT g.id_prov, g.nama_prov, g.produksi_lk, g.produksi_pr, g.non_lk, h.non_pr
		            FROM
		                (SELECT e.id_prov, e.nama_prov, e.produksi_lk, e.produksi_pr, f.non_lk
		                FROM
		                    (SELECT c.id_prov, c.nama_prov, c.produksi_lk, d.produksi_pr
		                    FROM
		                        (SELECT a.id_prov, a.nama_prov, b.produksi_lk
		                        FROM (SELECT * FROM propinsi) a
		                        LEFT JOIN (
		                            SELECT kode_prov, AVG(IFNULL(b3_jumlah_k2,0) + IFNULL(b3_jumlah_k4,0)) as produksi_lk
		                            FROM ".$ltp."
		                            WHERE tahun = '".$filter_tahun."'
		                            GROUP BY kode_prov) b
		                        ON a.id_prov = b.kode_prov) c
		                            LEFT JOIN (
		                                SELECT kode_prov, AVG(IFNULL(b3_jumlah_k3,0) + IFNULL(b3_jumlah_k5,0)) as produksi_pr
				                            FROM ".$ltp."
				                            WHERE tahun = '".$filter_tahun."'
				                            GROUP BY kode_prov) d
		                            ON c.id_prov = d.kode_prov) e
		                                LEFT JOIN (
		                                    SELECT kode_prov, AVG(IFNULL(b3_jumlah_k6,0) + IFNULL(b3_jumlah_k8,0)) as non_lk
						                            FROM ".$ltp."
						                            WHERE tahun = '".$filter_tahun."'
						                            GROUP BY kode_prov) f
		                                ON e.id_prov = f.kode_prov) g
		                                    LEFT JOIN (
		                                        SELECT kode_prov, AVG(IFNULL(b3_jumlah_k7,0) + IFNULL(b3_jumlah_k9,0)) as non_pr
								                            FROM ".$ltp."
								                            WHERE tahun = '".$filter_tahun."'
								                            GROUP BY kode_prov) h
		                                    ON g.id_prov = h.kode_prov) i
		                                        LEFT JOIN (
		                                            SELECT kode_prov, AVG(IFNULL(b3_jumlah_k2,0) + IFNULL(b3_jumlah_k3,0) + IFNULL(b3_jumlah_k4,0) + IFNULL(b3_jumlah_k5,0) + IFNULL(b3_jumlah_k6,0) + IFNULL(b3_jumlah_k7,0) + IFNULL(b3_jumlah_k8,0) + IFNULL(b3_jumlah_k9,0)) as jumlah
										                            FROM ".$ltp."
										                            WHERE tahun = '".$filter_tahun."'
										                            GROUP BY kode_prov) j
		                                        ON i.id_prov = j.kode_prov
                                    				ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function tabulasi_prolk_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_jumlah_k2,0) + IFNULL(b3_jumlah_k4,0)),0) as produksi_lk_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_propr_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_jumlah_k3,0) + IFNULL(b3_jumlah_k5,0)),0) as produksi_pr_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_nonlk_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_jumlah_k6,0) + IFNULL(b3_jumlah_k8,0)),0) as non_lk_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_nonpr_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_jumlah_k7,0) + IFNULL(b3_jumlah_k9,0)),0) as non_pr_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_jumlah_10_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_jumlah_k2,0) + IFNULL(b3_jumlah_k3,0) + IFNULL(b3_jumlah_k4,0) + IFNULL(b3_jumlah_k5,0) + IFNULL(b3_jumlah_k6,0) + IFNULL(b3_jumlah_k7,0) + IFNULL(b3_jumlah_k8,0) + IFNULL(b3_jumlah_k9,0)),0) as jumlah_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function daftar_tabulasi_tabel_11($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT i.nama_prov, IFNULL(i.produksi_ttp,0) as produksi_ttp, IFNULL(i.produksi_tdk_ttp,0) as produksi_tdk_ttp, IFNULL(i.non_ttp,0) as non_ttp, IFNULL(i.non_tdk_ttp,0) as non_tdk_ttp, IFNULL(j.jumlah,0) as jumlah
		        FROM
		            (SELECT g.id_prov, g.nama_prov, g.produksi_ttp, g.produksi_tdk_ttp, g.non_ttp, h.non_tdk_ttp
		            FROM
		                (SELECT e.id_prov, e.nama_prov, e.produksi_ttp, e.produksi_tdk_ttp, f.non_ttp
		                FROM
		                    (SELECT c.id_prov, c.nama_prov, c.produksi_ttp, d.produksi_tdk_ttp
		                    FROM
		                        (SELECT a.id_prov, a.nama_prov, b.produksi_ttp
		                        FROM (SELECT * FROM propinsi) a
		                        LEFT JOIN (
		                            SELECT kode_prov, AVG(IFNULL(b3_jumlah_k2,0) + IFNULL(b3_jumlah_k3,0)) as produksi_ttp
		                            FROM ".$ltp."
		                            WHERE tahun = '".$filter_tahun."'
		                            GROUP BY kode_prov) b
		                        ON a.id_prov = b.kode_prov) c
		                            LEFT JOIN (
		                                SELECT kode_prov, AVG(IFNULL(b3_jumlah_k4,0) + IFNULL(b3_jumlah_k5,0)) as produksi_tdk_ttp
				                            FROM ".$ltp."
				                            WHERE tahun = '".$filter_tahun."'
				                            GROUP BY kode_prov) d
		                            ON c.id_prov = d.kode_prov) e
		                                LEFT JOIN (
		                                    SELECT kode_prov, AVG(IFNULL(b3_jumlah_k6,0) + IFNULL(b3_jumlah_k7,0)) as non_ttp
						                            FROM ".$ltp."
						                            WHERE tahun = '".$filter_tahun."'
						                            GROUP BY kode_prov) f
		                                ON e.id_prov = f.kode_prov) g
		                                    LEFT JOIN (
		                                        SELECT kode_prov, AVG(IFNULL(b3_jumlah_k8,0) + IFNULL(b3_jumlah_k9,0)) as non_tdk_ttp
								                            FROM ".$ltp."
								                            WHERE tahun = '".$filter_tahun."'
								                            GROUP BY kode_prov) h
		                                    ON g.id_prov = h.kode_prov) i
		                                        LEFT JOIN (
		                                            SELECT kode_prov, AVG(IFNULL(b3_jumlah_k2,0) + IFNULL(b3_jumlah_k3,0) + IFNULL(b3_jumlah_k4,0) + IFNULL(b3_jumlah_k5,0) + IFNULL(b3_jumlah_k6,0) + IFNULL(b3_jumlah_k7,0) + IFNULL(b3_jumlah_k8,0) + IFNULL(b3_jumlah_k9,0)) as jumlah
										                            FROM ".$ltp."
										                            WHERE tahun = '".$filter_tahun."'
										                            GROUP BY kode_prov) j
		                                        ON i.id_prov = j.kode_prov
                                    				ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function tabulasi_prottp_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_jumlah_k2,0) + IFNULL(b3_jumlah_k3,0)),0) as produksi_ttp_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_protdkttp_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_jumlah_k4,0) + IFNULL(b3_jumlah_k5,0)),0) as produksi_tdk_ttp_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_nonttp_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_jumlah_k6,0) + IFNULL(b3_jumlah_k7,0)),0) as non_ttp_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_nontdkttp_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_jumlah_k8,0) + IFNULL(b3_jumlah_k9,0)),0) as non_tdk_ttp_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_jumlah_11_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_jumlah_k2,0) + IFNULL(b3_jumlah_k3,0) + IFNULL(b3_jumlah_k4,0) + IFNULL(b3_jumlah_k5,0) + IFNULL(b3_jumlah_k6,0) + IFNULL(b3_jumlah_k7,0) + IFNULL(b3_jumlah_k8,0) + IFNULL(b3_jumlah_k9,0)),0) as jumlah_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function daftar_tabulasi_tabel_12($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT q.nama_prov, IFNULL(q.tdk_sklh,0) as tdk_sklh, IFNULL(q.tdk_sd,0) as tdk_sd, IFNULL(q.sd,0) as sd, IFNULL(q.smp,0) as smp, IFNULL(q.sma,0) as sma, IFNULL(q.smk,0) as smk, IFNULL(q.akademi,0) as akademi, IFNULL(q.d4,0) as d4, IFNULL(r.jumlah,0) as jumlah
		FROM
		    (SELECT o.id_prov, o.nama_prov, o.tdk_sklh, o.tdk_sd, o.sd, o.smp, o.sma, o.smk, o.akademi, p.d4
		    FROM
		    	(SELECT m.id_prov, m.nama_prov, m.tdk_sklh, m.tdk_sd, m.sd, m.smp, m.sma, m.smk, n.akademi
				FROM
				    (SELECT k.id_prov, k.nama_prov, k.tdk_sklh, k.tdk_sd, k.sd, k.smp, k.sma, l.smk
				    FROM
				        (SELECT i.id_prov, i.nama_prov, i.tdk_sklh, i.tdk_sd, i.sd, i.smp, j.sma
				        FROM
				            (SELECT g.id_prov, g.nama_prov, g.tdk_sklh, g.tdk_sd, g.sd, h.smp
				            FROM
				                (SELECT e.id_prov, e.nama_prov, e.tdk_sklh, e.tdk_sd, f.sd
				                FROM
				                    (SELECT c.id_prov, c.nama_prov, c.tdk_sklh, d.tdk_sd
				                    FROM
				                        (SELECT a.id_prov, a.nama_prov, b.tdk_sklh
				                        FROM (SELECT * FROM propinsi) a
				                        LEFT JOIN (
				                            SELECT kode_prov, AVG(IFNULL(b3_r1_k2,0) + IFNULL(b3_r1_k3,0) + IFNULL(b3_r1_k4,0) + IFNULL(b3_r1_k5,0)) as tdk_sklh
				                            FROM ".$ltp."
				                            WHERE tahun = '".$filter_tahun."'
				                            GROUP BY kode_prov) b
				                        ON a.id_prov = b.kode_prov) c
				                            LEFT JOIN (
				                                SELECT kode_prov, AVG(IFNULL(b3_r2_k2,0) + IFNULL(b3_r2_k3,0) + IFNULL(b3_r2_k4,0) + IFNULL(b3_r2_k5,0)) as tdk_sd
						                            FROM ".$ltp."
						                            WHERE tahun = '".$filter_tahun."'
						                            GROUP BY kode_prov) d
				                            ON c.id_prov = d.kode_prov) e
				                                LEFT JOIN (
				                                    SELECT kode_prov, AVG(IFNULL(b3_r3_k2,0) + IFNULL(b3_r3_k3,0) + IFNULL(b3_r3_k4,0) + IFNULL(b3_r3_k5,0)) as sd
								                            FROM ".$ltp."
								                            WHERE tahun = '".$filter_tahun."'
								                            GROUP BY kode_prov) f
				                                ON e.id_prov = f.kode_prov) g
				                                    LEFT JOIN (
				                                        SELECT kode_prov, AVG(IFNULL(b3_r4_k2,0) + IFNULL(b3_r4_k3,0) + IFNULL(b3_r4_k4,0) + IFNULL(b3_r4_k5,0)) as smp
										                            FROM ".$ltp."
										                            WHERE tahun = '".$filter_tahun."'
										                            GROUP BY kode_prov) h
				                                    ON g.id_prov = h.kode_prov) i
				                                        LEFT JOIN (
				                                            SELECT kode_prov, AVG(IFNULL(b3_r5_k2,0) + IFNULL(b3_r5_k3,0) + IFNULL(b3_r5_k4,0) + IFNULL(b3_r5_k5,0)) as sma
												                            FROM ".$ltp."
												                            WHERE tahun = '".$filter_tahun."'
												                            GROUP BY kode_prov) j
				                                        ON i.id_prov = j.kode_prov) k
				                                            LEFT JOIN (
				                                                SELECT kode_prov, AVG(IFNULL(b3_r6_k2,0) + IFNULL(b3_r6_k3,0) + IFNULL(b3_r6_k4,0) + IFNULL(b3_r6_k5,0)) as smk
														                            FROM ".$ltp."
														                            WHERE tahun = '".$filter_tahun."'
														                            GROUP BY kode_prov) l
				                                            ON k.id_prov = l.kode_prov) m
				                                                LEFT JOIN (
				                                                    SELECT kode_prov, AVG(IFNULL(b3_r7_k2,0) + IFNULL(b3_r7_k3,0) + IFNULL(b3_r7_k4,0) + IFNULL(b3_r7_k5,0)) as akademi
																                            FROM ".$ltp."
																                            WHERE tahun = '".$filter_tahun."'
																                            GROUP BY kode_prov) n
				                                                ON m.id_prov = n.kode_prov) o
		                                                        	LEFT JOIN (
		                                                            	SELECT kode_prov, AVG(IFNULL(b3_r8_k2,0) + IFNULL(b3_r8_k3,0) + IFNULL(b3_r8_k4,0) + IFNULL(b3_r8_k5,0)) as d4
																			                            FROM ".$ltp."
																			                            WHERE tahun = '".$filter_tahun."'
																			                            GROUP BY kode_prov) p
		                                    											ON o.id_prov = p.kode_prov) q
		                                                            	LEFT JOIN (
		                                                                	SELECT kode_prov, AVG(IFNULL(b3_jumlah_k2,0) + IFNULL(b3_jumlah_k3,0) + IFNULL(b3_jumlah_k4,0) + IFNULL(b3_jumlah_k5,0)) as jumlah
																					                            FROM ".$ltp."
																					                            WHERE tahun = '".$filter_tahun."'
																					                            GROUP BY kode_prov) r
		                                    													ON q.id_prov = r.kode_prov
		                                                                ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function tabulasi_tdksklh_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_r1_k2,0) + IFNULL(b3_r1_k3,0) + IFNULL(b3_r1_k4,0) + IFNULL(b3_r1_k5,0)),0) as tdk_sklh_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_tdksd_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_r2_k2,0) + IFNULL(b3_r2_k3,0) + IFNULL(b3_r2_k4,0) + IFNULL(b3_r2_k5,0)),0) as tdk_sd_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_sd_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_r3_k2,0) + IFNULL(b3_r3_k3,0) + IFNULL(b3_r3_k4,0) + IFNULL(b3_r3_k5,0)),0) as sd_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_smp_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_r4_k2,0) + IFNULL(b3_r4_k3,0) + IFNULL(b3_r4_k4,0) + IFNULL(b3_r4_k5,0)),0) as smp_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_sma_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_r5_k2,0) + IFNULL(b3_r5_k3,0) + IFNULL(b3_r5_k4,0) + IFNULL(b3_r5_k5,0)),0) as sma_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_smk_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_r6_k2,0) + IFNULL(b3_r6_k3,0) + IFNULL(b3_r6_k4,0) + IFNULL(b3_r6_k5,0)),0) as smk_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_akademi_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_r7_k2,0) + IFNULL(b3_r7_k3,0) + IFNULL(b3_r7_k4,0) + IFNULL(b3_r7_k5,0)),0) as akademi_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_d4_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_r8_k2,0) + IFNULL(b3_r8_k3,0) + IFNULL(b3_r8_k4,0) + IFNULL(b3_r8_k5,0)),0) as d4_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_jumlah_12_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_jumlah_k2,0) + IFNULL(b3_jumlah_k3,0) + IFNULL(b3_jumlah_k4,0) + IFNULL(b3_jumlah_k5,0)),0) as jumlah_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function daftar_tabulasi_tabel_13($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT q.nama_prov, IFNULL(q.tdk_sklh,0) as tdk_sklh, IFNULL(q.tdk_sd,0) as tdk_sd, IFNULL(q.sd,0) as sd, IFNULL(q.smp,0) as smp, IFNULL(q.sma,0) as sma, IFNULL(q.smk,0) as smk, IFNULL(q.akademi,0) as akademi, IFNULL(q.d4,0) as d4, IFNULL(r.jumlah,0) as jumlah
		FROM
		    (SELECT o.id_prov, o.nama_prov, o.tdk_sklh, o.tdk_sd, o.sd, o.smp, o.sma, o.smk, o.akademi, p.d4
		    FROM
		    	(SELECT m.id_prov, m.nama_prov, m.tdk_sklh, m.tdk_sd, m.sd, m.smp, m.sma, m.smk, n.akademi
				FROM
				    (SELECT k.id_prov, k.nama_prov, k.tdk_sklh, k.tdk_sd, k.sd, k.smp, k.sma, l.smk
				    FROM
				        (SELECT i.id_prov, i.nama_prov, i.tdk_sklh, i.tdk_sd, i.sd, i.smp, j.sma
				        FROM
				            (SELECT g.id_prov, g.nama_prov, g.tdk_sklh, g.tdk_sd, g.sd, h.smp
				            FROM
				                (SELECT e.id_prov, e.nama_prov, e.tdk_sklh, e.tdk_sd, f.sd
				                FROM
				                    (SELECT c.id_prov, c.nama_prov, c.tdk_sklh, d.tdk_sd
				                    FROM
				                        (SELECT a.id_prov, a.nama_prov, b.tdk_sklh
				                        FROM (SELECT * FROM propinsi) a
				                        LEFT JOIN (
				                            SELECT kode_prov, AVG(IFNULL(b3_r1_k6,0) + IFNULL(b3_r1_k7,0) + IFNULL(b3_r1_k8,0) + IFNULL(b3_r1_k9,0)) as tdk_sklh
				                            FROM ".$ltp."
				                            WHERE tahun = '".$filter_tahun."'
				                            GROUP BY kode_prov) b
				                        ON a.id_prov = b.kode_prov) c
				                            LEFT JOIN (
				                                SELECT kode_prov, AVG(IFNULL(b3_r2_k6,0) + IFNULL(b3_r2_k7,0) + IFNULL(b3_r2_k8,0) + IFNULL(b3_r2_k9,0)) as tdk_sd
						                            FROM ".$ltp."
						                            WHERE tahun = '".$filter_tahun."'
						                            GROUP BY kode_prov) d
				                            ON c.id_prov = d.kode_prov) e
				                                LEFT JOIN (
				                                    SELECT kode_prov, AVG(IFNULL(b3_r3_k6,0) + IFNULL(b3_r3_k7,0) + IFNULL(b3_r3_k8,0) + IFNULL(b3_r3_k9,0)) as sd
								                            FROM ".$ltp."
								                            WHERE tahun = '".$filter_tahun."'
								                            GROUP BY kode_prov) f
				                                ON e.id_prov = f.kode_prov) g
				                                    LEFT JOIN (
				                                        SELECT kode_prov, AVG(IFNULL(b3_r4_k6,0) + IFNULL(b3_r4_k7,0) + IFNULL(b3_r4_k8,0) + IFNULL(b3_r4_k9,0)) as smp
										                            FROM ".$ltp."
										                            WHERE tahun = '".$filter_tahun."'
										                            GROUP BY kode_prov) h
				                                    ON g.id_prov = h.kode_prov) i
				                                        LEFT JOIN (
				                                            SELECT kode_prov, AVG(IFNULL(b3_r5_k6,0) + IFNULL(b3_r5_k7,0) + IFNULL(b3_r5_k8,0) + IFNULL(b3_r5_k9,0)) as sma
												                            FROM ".$ltp."
												                            WHERE tahun = '".$filter_tahun."'
												                            GROUP BY kode_prov) j
				                                        ON i.id_prov = j.kode_prov) k
				                                            LEFT JOIN (
				                                                SELECT kode_prov, AVG(IFNULL(b3_r6_k6,0) + IFNULL(b3_r6_k7,0) + IFNULL(b3_r6_k8,0) + IFNULL(b3_r6_k9,0)) as smk
														                            FROM ".$ltp."
														                            WHERE tahun = '".$filter_tahun."'
														                            GROUP BY kode_prov) l
				                                            ON k.id_prov = l.kode_prov) m
				                                                LEFT JOIN (
				                                                    SELECT kode_prov, AVG(IFNULL(b3_r7_k6,0) + IFNULL(b3_r7_k7,0) + IFNULL(b3_r7_k8,0) + IFNULL(b3_r7_k9,0)) as akademi
																                            FROM ".$ltp."
																                            WHERE tahun = '".$filter_tahun."'
																                            GROUP BY kode_prov) n
				                                                ON m.id_prov = n.kode_prov) o
		                                                        	LEFT JOIN (
		                                                            	SELECT kode_prov, AVG(IFNULL(b3_r8_k6,0) + IFNULL(b3_r8_k7,0) + IFNULL(b3_r8_k8,0) + IFNULL(b3_r8_k9,0)) as d4
																			                            FROM ".$ltp."
																			                            WHERE tahun = '".$filter_tahun."'
																			                            GROUP BY kode_prov) p
		                                    											ON o.id_prov = p.kode_prov) q
		                                                            	LEFT JOIN (
		                                                                	SELECT kode_prov, AVG(IFNULL(b3_jumlah_k6,0) + IFNULL(b3_jumlah_k7,0) + IFNULL(b3_jumlah_k8,0) + IFNULL(b3_jumlah_k9,0)) as jumlah
																					                            FROM ".$ltp."
																					                            WHERE tahun = '".$filter_tahun."'
																					                            GROUP BY kode_prov) r
		                                    													ON q.id_prov = r.kode_prov
		                                                                ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function tabulasi_tdksklh13_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_r1_k6,0) + IFNULL(b3_r1_k7,0) + IFNULL(b3_r1_k8,0) + IFNULL(b3_r1_k9,0)),0) as tdk_sklh_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_tdksd13_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_r2_k6,0) + IFNULL(b3_r2_k7,0) + IFNULL(b3_r2_k8,0) + IFNULL(b3_r2_k9,0)),0) as tdk_sd_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_sd13_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_r3_k6,0) + IFNULL(b3_r3_k7,0) + IFNULL(b3_r3_k8,0) + IFNULL(b3_r3_k9,0)),0) as sd_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_smp13_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_r4_k6,0) + IFNULL(b3_r4_k7,0) + IFNULL(b3_r4_k8,0) + IFNULL(b3_r4_k9,0)),0) as smp_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_sma13_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_r5_k6,0) + IFNULL(b3_r5_k7,0) + IFNULL(b3_r5_k8,0) + IFNULL(b3_r5_k9,0)),0) as sma_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_smk13_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_r6_k6,0) + IFNULL(b3_r6_k7,0) + IFNULL(b3_r6_k8,0) + IFNULL(b3_r6_k9,0)),0) as smk_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_akademi13_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_r7_k6,0) + IFNULL(b3_r7_k7,0) + IFNULL(b3_r7_k8,0) + IFNULL(b3_r7_k9,0)),0) as akademi_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_d413_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_r8_k6,0) + IFNULL(b3_r8_k7,0) + IFNULL(b3_r8_k8,0) + IFNULL(b3_r8_k9,0)),0) as d4_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function tabulasi_jumlah_13_nasional($filter_tahun, $ltp)
	{
		$this->db->select('IFNULL(AVG(IFNULL(b3_jumlah_k6,0) + IFNULL(b3_jumlah_k7,0) + IFNULL(b3_jumlah_k8,0) + IFNULL(b3_jumlah_k9,0)),0) as jumlah_nas');
		$this->db->from($ltp);
		$this->db->where('tahun',$filter_tahun);
		return $this->db->get()->result_array();
	}

	public function daftar_tabulasi_tabel_14($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT m.nama_prov as nama_prov, IFNULL(m.pengangkutan_boat,0) as pengangkutan_boat, IFNULL(m.pengangkutan_tempel,0) as pengangkutan_tempel, IFNULL(m.pengangkutan_motor,0) as pengangkutan_motor, IFNULL(m.penangkapan_boat,0) as penangkapan_boat, IFNULL(m.penangkapan_tempel,0) as penangkapan_tempel, IFNULL(m.penangkapan_motor,0) as penangkapan_motor, IFNULL(n.jumlah,0) as jumlah
		FROM
		    (SELECT k.id_prov, k.nama_prov, k.pengangkutan_boat, k.pengangkutan_tempel, k.pengangkutan_motor, k.penangkapan_boat, k.penangkapan_tempel, l.penangkapan_motor
		    FROM
		        (SELECT i.id_prov, i.nama_prov, i.pengangkutan_boat, i.pengangkutan_tempel, i.pengangkutan_motor, i.penangkapan_boat, j.penangkapan_tempel
		        FROM
		            (SELECT g.id_prov, g.nama_prov, g.pengangkutan_boat, g.pengangkutan_tempel, g.pengangkutan_motor, h.penangkapan_boat
		            FROM
		                (SELECT e.id_prov, e.nama_prov, e.pengangkutan_boat, e.pengangkutan_tempel, f.pengangkutan_motor
		                FROM
		                    (SELECT c.id_prov, c.nama_prov, c.pengangkutan_boat, d.pengangkutan_tempel
		                    FROM
		                        (SELECT a.id_prov, a.nama_prov, b.pengangkutan_boat
		                        FROM (SELECT * FROM propinsi) a
		                        LEFT JOIN (
		                            SELECT kode_prov, SUM(IFNULL(b7_r2a_k2,0) + IFNULL(b7_r2b_k2,0)) as pengangkutan_boat
		                            FROM ".$ltp."
		                            WHERE tahun = '".$filter_tahun."'
		                            GROUP BY kode_prov) b
		                        ON a.id_prov = b.kode_prov) c
		                            LEFT JOIN (
		                                SELECT kode_prov, SUM(IFNULL(b7_r2a_k3,0) + IFNULL(b7_r2b_k3,0)) as pengangkutan_tempel
		                                FROM ".$ltp."
		                                WHERE tahun = '".$filter_tahun."'
		                                GROUP BY kode_prov) d
		                            ON c.id_prov = d.kode_prov) e
		                                LEFT JOIN (
		                                    SELECT kode_prov, SUM(IFNULL(b7_r2a_k4,0) + IFNULL(b7_r2b_k4,0)) as pengangkutan_motor
		                                    FROM ".$ltp."
		                                    WHERE tahun = '".$filter_tahun."'
		                                    GROUP BY kode_prov) f
		                                ON e.id_prov = f.kode_prov) g
		                                    LEFT JOIN (
		                                        SELECT kode_prov, SUM(IFNULL(b7_r1a_k2,0) + IFNULL(b7_r1b_k2,0)) as penangkapan_boat
		                                        FROM ".$ltp."
		                                        WHERE tahun = '".$filter_tahun."'
		                                        GROUP BY kode_prov) h
		                                    ON g.id_prov = h.kode_prov) i
		                                        LEFT JOIN (
		                                            SELECT kode_prov, SUM(IFNULL(b7_r1a_k3,0) + IFNULL(b7_r1b_k3,0)) as penangkapan_tempel
		                                            FROM ".$ltp."
		                                            WHERE tahun = '".$filter_tahun."'
		                                            GROUP BY kode_prov) j
		                                        ON i.id_prov = j.kode_prov) k
		                                            LEFT JOIN (
		                                                SELECT kode_prov, SUM(IFNULL(b7_r1a_k4,0) + IFNULL(b7_r1b_k4,0)) as penangkapan_motor
		                                                FROM ".$ltp."
		                                                WHERE tahun = '".$filter_tahun."'
		                                                GROUP BY kode_prov) l
		                                            ON k.id_prov = l.kode_prov) m
		                                                LEFT JOIN (
		                                                    SELECT kode_prov, SUM(b7_jumlah_k5) as jumlah
		                                                    FROM ".$ltp."
		                                                    WHERE tahun = '".$filter_tahun."'
		                                                    GROUP BY kode_prov) n
		                                                ON m.id_prov = n.kode_prov
		                                                ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function daftar_tabulasi_tabel_15($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT k.nama_prov, IFNULL(k.volume,0) as volume, IFNULL(k.nilai,0) as nilai, IFNULL(k.negeri,0) as negeri, IFNULL(k.ekspor,0) as ekspor, IFNULL(k.baku,0) as baku, IFNULL(l.sisa,0) as sisa
		FROM
			(SELECT i.id_prov, i.nama_prov, i.volume, i.nilai, i.negeri, i.ekspor, j.baku
			FROM
					(SELECT g.id_prov, g.nama_prov, g.volume, g.nilai, g.negeri, h.ekspor
				    FROM
				    		(SELECT e.id_prov, e.nama_prov, e.volume, e.nilai, f.negeri
				            FROM
				            		(SELECT c.id_prov, c.nama_prov, c.volume, d.nilai
				                    FROM
				                        (SELECT a.id_prov, a.nama_prov, b.volume
				                        FROM (SELECT * FROM propinsi) a
				                        LEFT JOIN (
				                            SELECT kode_prov, SUM(IFNULL(b5_jumlah_k2,0)) as volume
				                            FROM ".$ltp."
				                            WHERE tahun = '".$filter_tahun."'
				                            GROUP BY kode_prov) b
				                        ON a.id_prov = b.kode_prov) c
				                            LEFT JOIN (
				                                SELECT kode_prov, SUM(IFNULL(b5_jumlah_k3,0)) as nilai
				                                FROM ".$ltp."
				                                WHERE tahun = '".$filter_tahun."'
				                                GROUP BY kode_prov) d
				                            ON c.id_prov = d.kode_prov) e
				                                LEFT JOIN (
				                                    SELECT kode_prov, SUM(IFNULL(b5_jumlah_k4,0)) as negeri
		                                        FROM ".$ltp."
		                                        WHERE tahun = '".$filter_tahun."'
				                                    GROUP BY kode_prov) f
				                                ON e.id_prov = f.kode_prov) g
				                                    LEFT JOIN (
				                                        SELECT kode_prov, SUM(IFNULL(b5_jumlah_k5,0)) as ekspor
		                                            FROM ".$ltp."
		                                            WHERE tahun = '".$filter_tahun."'
				                                        GROUP BY kode_prov) h
				                                    ON g.id_prov = h.kode_prov) i
				                                        LEFT JOIN (
				                                            SELECT kode_prov, SUM(IFNULL(b5_jumlah_k6,0)) as baku
		                                                FROM ".$ltp."
		                                                WHERE tahun = '".$filter_tahun."'
				                                            GROUP BY kode_prov) j
				                                        ON i.id_prov = j.kode_prov) k
				                                            LEFT JOIN (
				                                                SELECT kode_prov, SUM(IFNULL(b5_jumlah_k7,0)) as sisa
		                                                    FROM ".$ltp."
		                                                    WHERE tahun = '".$filter_tahun."'
				                                                GROUP BY kode_prov) l
				                                            ON k.id_prov = l.kode_prov
				                                            ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function daftar_tabulasi_tabel_16($filter_tahun, $ikan_1, $ikan_2, $row, $ltp)
	{
		$SQL1="
		SELECT g.nama_prov as nama_prov, IFNULL(g.produksi_ikan1,0) as produksi_ikan1, IFNULL(g.nilai_ikan1,0) as nilai_ikan1, IFNULL(g.produksi_ikan2,0) as produksi_ikan2, IFNULL(h.nilai_ikan2,0) as nilai_ikan2
		FROM
		    (SELECT e.id_prov, e.nama_prov, e.produksi_ikan1, e.nilai_ikan1, f.produksi_ikan2
		     FROM
		         (SELECT c.id_prov, c.nama_prov, c.produksi_ikan1, d.nilai_ikan1
		          FROM
		             	(SELECT a.id_prov, a.nama_prov, b.produksi_ikan1
		              FROM (SELECT * FROM propinsi) a
		              LEFT JOIN (
		                  SELECT kode_prov, SUM(b5_r".$row."_k2) as produksi_ikan1
		                  FROM ".$ltp."
		                  WHERE b5_r".$row."_k1 IN(".$ikan_1.") AND tahun = '".$filter_tahun."'
		                  GROUP BY kode_prov) b
		              ON a.id_prov = b.kode_prov) c
		              		LEFT JOIN (
		                  		SELECT kode_prov, SUM(b5_r".$row."_k3) as nilai_ikan1
                          FROM ".$ltp."
                          WHERE b5_r".$row."_k1 IN(".$ikan_1.") AND tahun = '".$filter_tahun."'
		                      GROUP BY kode_prov) d
		                  ON c.id_prov = d.kode_prov) e
		                  		LEFT JOIN (
		                      		SELECT kode_prov, SUM(b5_r".$row."_k2) as produksi_ikan2
                              FROM ".$ltp."
                              WHERE b5_r".$row."_k1 IN(".$ikan_2.") AND tahun = '".$filter_tahun."'
		                          GROUP BY kode_prov) f
		                      ON e.id_prov = f.kode_prov) g
		                          LEFT JOIN (
		                          		SELECT kode_prov, SUM(b5_r".$row."_k3) as nilai_ikan2
                                  FROM ".$ltp."
                                  WHERE b5_r".$row."_k1 IN(".$ikan_2.") AND tahun = '".$filter_tahun."'
		                              GROUP BY kode_prov) h
		                          ON g.id_prov = h.kode_prov
                              ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function daftar_tabulasi_tabel_19($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT i.nama_prov, IFNULL(i.ttp,0) as ttp, IFNULL(i.tdk_ttp,0) as tdk_ttp, IFNULL(i.lainnya,0) as lainnya, IFNULL(i.pekerja,0) as pekerja, IFNULL(j.jumlah,0) as jumlah
		        FROM
		            (SELECT g.id_prov, g.nama_prov, g.ttp, g.tdk_ttp, g.lainnya, h.pekerja
		            FROM
		                (SELECT e.id_prov, e.nama_prov, e.ttp, e.tdk_ttp, f.lainnya
		                FROM
		                    (SELECT c.id_prov, c.nama_prov, c.ttp, d.tdk_ttp
		                    FROM
		                        (SELECT a.id_prov, a.nama_prov, b.ttp
		                        FROM (SELECT * FROM propinsi) a
		                        LEFT JOIN (
		                            SELECT kode_prov, SUM(IFNULL(b3_jumlah_k10,0)) as ttp
		                            FROM ".$ltp."
		                            WHERE tahun = '".$filter_tahun."'
		                            GROUP BY kode_prov) b
		                        ON a.id_prov = b.kode_prov) c
		                            LEFT JOIN (
		                                SELECT kode_prov, SUM(IFNULL(b3_jumlah_k11,0)) as tdk_ttp
                                    FROM ".$ltp."
                                    WHERE tahun = '".$filter_tahun."'
				                            GROUP BY kode_prov) d
		                            ON c.id_prov = d.kode_prov) e
		                                LEFT JOIN (
		                                    SELECT kode_prov, SUM(IFNULL(b3_pengeluaran_lainnya,0)) as lainnya
                                        FROM ".$ltp."
                                        WHERE tahun = '".$filter_tahun."'
						                    				GROUP BY kode_prov) f
		                                ON e.id_prov = f.kode_prov) g
		                                    LEFT JOIN (
		                                        SELECT kode_prov, SUM(IFNULL(b3_pengeluaran_pekerja,0)) as pekerja
                                            FROM ".$ltp."
                                            WHERE tahun = '".$filter_tahun."'
								                						GROUP BY kode_prov) h
		                                    ON g.id_prov = h.kode_prov) i
		                                        LEFT JOIN (
		                                            SELECT kode_prov, SUM(IFNULL(b3_jumlah_k10,0) + IFNULL(b3_jumlah_k11,0) + IFNULL(b3_pengeluaran_lainnya,0) + IFNULL(b3_pengeluaran_pekerja,0)) as jumlah
                                                FROM ".$ltp."
                                                WHERE tahun = '".$filter_tahun."'
										            								GROUP BY kode_prov) j
		                                        ON i.id_prov = j.kode_prov
                                    				ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function daftar_tabulasi_tabel_20($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT i.nama_prov, IFNULL(i.bbm,0) as bbm, IFNULL(i.listrik,0) as listrik, IFNULL(i.air,0) as air, IFNULL(i.gas,0) as gas, IFNULL(j.jumlah,0) as jumlah
				FROM
		        (SELECT g.id_prov, g.nama_prov, g.bbm, g.listrik, g.air, h.gas
		        FROM
		            (SELECT e.id_prov, e.nama_prov, e.bbm, e.listrik, f.air
		            FROM
		                (SELECT c.id_prov, c.nama_prov, c.bbm, d.listrik
		                FROM
		                    (SELECT a.id_prov, a.nama_prov, b.bbm
		                    FROM (SELECT * FROM propinsi) a
		                    LEFT JOIN (
		                    		SELECT kode_prov, SUM(IFNULL(b6_A_r1_k2,0) + IFNULL(b6_A_r1_k3,0)) as bbm
		                        FROM ".$ltp."
		                        WHERE tahun = '".$filter_tahun."'
		                        GROUP BY kode_prov) b
		                    ON a.id_prov = b.kode_prov) c
		                        LEFT JOIN (
		                            SELECT kode_prov, SUM(IFNULL(b6_A_r2_k2,0) + IFNULL(b6_A_r2_k3,0)) as listrik
                                FROM ".$ltp."
                                WHERE tahun = '".$filter_tahun."'
				                        GROUP BY kode_prov) d
		                        ON c.id_prov = d.kode_prov) e
		                            LEFT JOIN (
		                                SELECT kode_prov, SUM(IFNULL(b6_A_r3_k2,0) + IFNULL(b6_A_r3_k3,0)) as Air
                                    FROM ".$ltp."
                                    WHERE tahun = '".$filter_tahun."'
						                    		GROUP BY kode_prov) f
		                            ON e.id_prov = f.kode_prov) g
		                                LEFT JOIN (
		                                    SELECT kode_prov, SUM(IFNULL(b6_A_r4_k2,0) + IFNULL(b6_A_r4_k3,0)) as gas
                                        FROM ".$ltp."
                                        WHERE tahun = '".$filter_tahun."'
								                				GROUP BY kode_prov) h
		                                ON g.id_prov = h.kode_prov) i
		                                    LEFT JOIN (
		                                        SELECT kode_prov, SUM(IFNULL(b6_A_jumlah_k2,0) + IFNULL(b6_A_jumlah_k3,0)) as jumlah
                                            FROM ".$ltp."
                                            WHERE tahun = '".$filter_tahun."'
										            						GROUP BY kode_prov) j
		                                    ON i.id_prov = j.kode_prov
                                    		ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function daftar_tabulasi_tabel_21($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT i.nama_prov, IFNULL(i.bbm,0) as bbm, IFNULL(i.listrik,0) as listrik, IFNULL(i.air,0) as air, IFNULL(i.gas,0) as gas, IFNULL(j.jumlah,0) as jumlah
				FROM
		        (SELECT g.id_prov, g.nama_prov, g.bbm, g.listrik, g.air, h.gas
		        FROM
		            (SELECT e.id_prov, e.nama_prov, e.bbm, e.listrik, f.air
		            FROM
		                (SELECT c.id_prov, c.nama_prov, c.bbm, d.listrik
		                FROM
		                    (SELECT a.id_prov, a.nama_prov, b.bbm
		                    FROM (SELECT * FROM propinsi) a
		                    LEFT JOIN (
		                    		SELECT kode_prov, SUM(IFNULL(b6_A_r1_k2,0)) as bbm
		                        FROM ".$ltp."
		                        WHERE tahun = '".$filter_tahun."'
		                        GROUP BY kode_prov) b
		                    ON a.id_prov = b.kode_prov) c
		                        LEFT JOIN (
		                            SELECT kode_prov, SUM(IFNULL(b6_A_r2_k2,0)) as listrik
                                FROM ".$ltp."
                                WHERE tahun = '".$filter_tahun."'
				                        GROUP BY kode_prov) d
		                        ON c.id_prov = d.kode_prov) e
		                            LEFT JOIN (
		                                SELECT kode_prov, SUM(IFNULL(b6_A_r3_k2,0)) as Air
                                    FROM ".$ltp."
                                    WHERE tahun = '".$filter_tahun."'
						                    		GROUP BY kode_prov) f
		                            ON e.id_prov = f.kode_prov) g
		                                LEFT JOIN (
		                                    SELECT kode_prov, SUM(IFNULL(b6_A_r4_k2,0)) as gas
                                        FROM ".$ltp."
                                        WHERE tahun = '".$filter_tahun."'
								                				GROUP BY kode_prov) h
		                                ON g.id_prov = h.kode_prov) i
		                                    LEFT JOIN (
		                                        SELECT kode_prov, SUM(IFNULL(b6_A_jumlah_k2,0)) as jumlah
                                            FROM ".$ltp."
                                            WHERE tahun = '".$filter_tahun."'
										            						GROUP BY kode_prov) j
		                                    ON i.id_prov = j.kode_prov
                                    		ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function daftar_tabulasi_tabel_22($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT i.nama_prov, IFNULL(i.bbm,0) as bbm, IFNULL(i.listrik,0) as listrik, IFNULL(i.air,0) as air, IFNULL(i.gas,0) as gas, IFNULL(j.jumlah,0) as jumlah
				FROM
		        (SELECT g.id_prov, g.nama_prov, g.bbm, g.listrik, g.air, h.gas
		        FROM
		            (SELECT e.id_prov, e.nama_prov, e.bbm, e.listrik, f.air
		            FROM
		                (SELECT c.id_prov, c.nama_prov, c.bbm, d.listrik
		                FROM
		                    (SELECT a.id_prov, a.nama_prov, b.bbm
		                    FROM (SELECT * FROM propinsi) a
		                    LEFT JOIN (
		                    		SELECT kode_prov, SUM(IFNULL(b6_A_r1_k3,0)) as bbm
		                        FROM ".$ltp."
		                        WHERE tahun = '".$filter_tahun."'
		                        GROUP BY kode_prov) b
		                    ON a.id_prov = b.kode_prov) c
		                        LEFT JOIN (
		                            SELECT kode_prov, SUM(IFNULL(b6_A_r2_k3,0)) as listrik
                                FROM ".$ltp."
                                WHERE tahun = '".$filter_tahun."'
				                        GROUP BY kode_prov) d
		                        ON c.id_prov = d.kode_prov) e
		                            LEFT JOIN (
		                                SELECT kode_prov, SUM(IFNULL(b6_A_r3_k3,0)) as Air
                                    FROM ".$ltp."
                                    WHERE tahun = '".$filter_tahun."'
						                    		GROUP BY kode_prov) f
		                            ON e.id_prov = f.kode_prov) g
		                                LEFT JOIN (
		                                    SELECT kode_prov, SUM(IFNULL(b6_A_r4_k3,0)) as gas
                                        FROM ".$ltp."
                                        WHERE tahun = '".$filter_tahun."'
								                				GROUP BY kode_prov) h
		                                ON g.id_prov = h.kode_prov) i
		                                    LEFT JOIN (
		                                        SELECT kode_prov, SUM(IFNULL(b6_A_jumlah_k3,0)) as jumlah
                                            FROM ".$ltp."
                                            WHERE tahun = '".$filter_tahun."'
										            						GROUP BY kode_prov) j
		                                    ON i.id_prov = j.kode_prov
                                    		ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function daftar_tabulasi_tabel_23($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT i.nama_prov, IFNULL(i.umpan,0) as umpan, IFNULL(i.garam_es,0) as garam_es, IFNULL(i.kemasan,0) as kemasan, IFNULL(i.konsumsi,0) as konsumsi, IFNULL(j.jumlah,0) as jumlah
		        FROM
		            (SELECT g.id_prov, g.nama_prov, g.umpan, g.garam_es, g.kemasan, h.konsumsi
		            FROM
		                (SELECT e.id_prov, e.nama_prov, e.umpan, e.garam_es, f.kemasan
		                FROM
		                    (SELECT c.id_prov, c.nama_prov, c.umpan, d.garam_es
		                    FROM
		                        (SELECT a.id_prov, a.nama_prov, b.umpan
		                        FROM (SELECT * FROM propinsi) a
		                        LEFT JOIN (
		                            SELECT kode_prov, SUM(IFNULL(b6_B_r1a_k3,0)) as umpan
		                            FROM ".$ltp."
		                            WHERE tahun = '".$filter_tahun."'
		                            GROUP BY kode_prov) b
		                        ON a.id_prov = b.kode_prov) c
		                            LEFT JOIN (
		                                SELECT kode_prov, SUM(IFNULL(b6_B_r1b_k3,0) + IFNULL(b6_B_r1c_k3,0)) as garam_es
                                    FROM ".$ltp."
                                    WHERE tahun = '".$filter_tahun."'
				                        		GROUP BY kode_prov) d
		                            ON c.id_prov = d.kode_prov) e
		                                LEFT JOIN (
		                                    SELECT kode_prov, SUM(IFNULL(b6_B_r1d_k3,0)) as kemasan
                                        FROM ".$ltp."
                                        WHERE tahun = '".$filter_tahun."'
						                    				GROUP BY kode_prov) f
		                                ON e.id_prov = f.kode_prov) g
		                                    LEFT JOIN (
		                                        SELECT kode_prov, SUM(IFNULL(b6_B_r1e_k3,0)) as konsumsi
                                            FROM ".$ltp."
                                            WHERE tahun = '".$filter_tahun."'
								                						GROUP BY kode_prov) h
		                                    ON g.id_prov = h.kode_prov) i
		                                        LEFT JOIN (
		                                            SELECT kode_prov, SUM(IFNULL(b6_B_r1a_k3,0) + IFNULL(b6_B_r1b_k3,0) + IFNULL(b6_B_r1c_k3,0) + IFNULL(b6_B_r1d_k3,0) + IFNULL(b6_B_r1e_k3,0)) as jumlah
                                                FROM ".$ltp."
                                                WHERE tahun = '".$filter_tahun."'
										            								GROUP BY kode_prov) j
		                                        ON i.id_prov = j.kode_prov
                                    				ORDER BY id_prov
    ";
    $hasil = $this->db->query($SQL1);
    return $hasil->result_array();
	}

	public function daftar_tabulasi_tabel_24($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT g.nama_prov as nama_prov, IFNULL(g.jasa,0) as jasa, IFNULL(g.tanah,0) as tanah, IFNULL(g.gedung,0) as gedung, IFNULL(h.jumlah,0) as jumlah
		FROM
				(SELECT e.id_prov, e.nama_prov, e.jasa, e.tanah, f.gedung
				 FROM
						 (SELECT c.id_prov, c.nama_prov, c.jasa, d.tanah
							FROM
									(SELECT a.id_prov, a.nama_prov, b.jasa
									FROM (SELECT * FROM propinsi) a
									LEFT JOIN (
											SELECT kode_prov, SUM(b6_B_r9_k3) as jasa
											FROM ".$ltp."
											WHERE tahun = '".$filter_tahun."'
											GROUP BY kode_prov) b
									ON a.id_prov = b.kode_prov) c
											LEFT JOIN (
													SELECT kode_prov, SUM(b6_B_r4a_k3) as tanah
                          FROM ".$ltp."
													WHERE tahun = '".$filter_tahun."'
													GROUP BY kode_prov) d
											ON c.id_prov = d.kode_prov) e
													LEFT JOIN (
															SELECT kode_prov, SUM(b6_B_r4b_k3) as gedung
															FROM ".$ltp."
															WHERE tahun = '".$filter_tahun."'
															GROUP BY kode_prov) f
													ON e.id_prov = f.kode_prov) g
															LEFT JOIN (
																	SELECT kode_prov, SUM(IFNULL(b6_B_r9_k3,0) + IFNULL(b6_B_r4b_k3,0) + IFNULL(b6_B_r4a_k3,0)) as jumlah
																	FROM ".$ltp."
																	WHERE tahun = '".$filter_tahun."'
																	GROUP BY kode_prov) h
															ON g.id_prov = h.kode_prov
															ORDER BY id_prov
		";
		$hasil = $this->db->query($SQL1);
		return $hasil->result_array();
	}

	public function daftar_tabulasi_tabel_25($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT o.nama_prov, IFNULL(o.suku,0) as suku, IFNULL(o.kantor,0) as kantor, IFNULL(o.pajak,0) as pajak, IFNULL(o.penyusutan,0) as penyusutan, IFNULL(o.transportasi,0) as transportasi, IFNULL(o.telekomunikasi,0) as telekomunikasi, IFNULL(o.lain,0) as lain, IFNULL(p.jumlah,0) as jumlah
		FROM
		    	(SELECT m.id_prov, m.nama_prov, m.suku, m.kantor, m.pajak, m.penyusutan, m.transportasi, m.telekomunikasi, n.lain
					FROM
				    (SELECT k.id_prov, k.nama_prov, k.suku, k.kantor, k.pajak, k.penyusutan, k.transportasi, l.telekomunikasi
				    FROM
				        (SELECT i.id_prov, i.nama_prov, i.suku, i.kantor, i.pajak, i.penyusutan, j.transportasi
				        FROM
				            (SELECT g.id_prov, g.nama_prov, g.suku, g.kantor, g.pajak, h.penyusutan
				            FROM
				                (SELECT e.id_prov, e.nama_prov, e.suku, e.kantor, f.pajak
				                FROM
				                    (SELECT c.id_prov, c.nama_prov, c.suku, d.kantor
				                    FROM
				                        (SELECT a.id_prov, a.nama_prov, b.suku
				                        FROM (SELECT * FROM propinsi) a
				                        LEFT JOIN (
				                            SELECT kode_prov, SUM(IFNULL(b6_B_r2_k3,0)) as suku
				                            FROM ".$ltp."
				                            WHERE tahun = '".$filter_tahun."'
				                            GROUP BY kode_prov) b
				                        ON a.id_prov = b.kode_prov) c
				                            LEFT JOIN (
				                                SELECT kode_prov, SUM(IFNULL(b6_B_r3_k3,0)) as kantor
																				FROM ".$ltp."
																				WHERE tahun = '".$filter_tahun."'
						                            GROUP BY kode_prov) d
				                            ON c.id_prov = d.kode_prov) e
				                                LEFT JOIN (
				                                    SELECT kode_prov, SUM(IFNULL(b6_B_r5_k3,0)) as pajak
																						FROM ".$ltp."
																						WHERE tahun = '".$filter_tahun."'
								                            GROUP BY kode_prov) f
				                                ON e.id_prov = f.kode_prov) g
				                                    LEFT JOIN (
				                                        SELECT kode_prov, SUM(IFNULL(b6_B_r6_k3,0)) as penyusutan
																								FROM ".$ltp."
																								WHERE tahun = '".$filter_tahun."'
										                            GROUP BY kode_prov) h
				                                    ON g.id_prov = h.kode_prov) i
				                                        LEFT JOIN (
				                                            SELECT kode_prov, SUM(IFNULL(b6_B_r7_k3,0)) as transportasi
																										FROM ".$ltp."
																										WHERE tahun = '".$filter_tahun."'
												                            GROUP BY kode_prov) j
				                                        ON i.id_prov = j.kode_prov) k
				                                            LEFT JOIN (
				                                                SELECT kode_prov, SUM(IFNULL(b6_B_r8_k3,0)) as telekomunikasi
																												FROM ".$ltp."
																												WHERE tahun = '".$filter_tahun."'
														                            GROUP BY kode_prov) l
				                                            ON k.id_prov = l.kode_prov) m
				                                                LEFT JOIN (
				                                                    SELECT kode_prov, SUM(IFNULL(b6_B_r10_k3,0)) as lain
																														FROM ".$ltp."
																														WHERE tahun = '".$filter_tahun."'
																                            GROUP BY kode_prov) n
				                                                ON m.id_prov = n.kode_prov) o
		                                                        	LEFT JOIN (
		                                                            	SELECT kode_prov, SUM(IFNULL(b6_B_r2_k3,0) + IFNULL(b6_B_r3_k3,0) + IFNULL(b6_B_r5_k3,0) + IFNULL(b6_B_r6_k3,0) + IFNULL(b6_B_r7_k3,0) + IFNULL(b6_B_r8_k3,0) + IFNULL(b6_B_r10_k3,0)) as jumlah
																																	FROM ".$ltp."
																																	WHERE tahun = '".$filter_tahun."'
																			                            GROUP BY kode_prov) p
		                                    											ON o.id_prov = p.kode_prov
		                                                                ORDER BY id_prov
		";
		$hasil = $this->db->query($SQL1);
		return $hasil->result_array();
	}

	public function daftar_tabulasi_tabel_26($filter_tahun, $ltp1, $ltp2)
	{
		$SQL1="
		SELECT m.nama_prov as nama_prov, IFNULL(m.pekerja,0) as pekerja, IFNULL(m.bahan,0) as bahan, IFNULL(m.jasa,0) as jasa, IFNULL(m.bbm,0) as bbm, IFNULL(m.listrik,0) as listrik, IFNULL(m.lainnya,0) as lainnya, IFNULL(n.jumlah,0) as jumlah
		FROM
		    (SELECT k.id_prov, k.nama_prov, k.pekerja, k.bahan, k.jasa, k.bbm, k.listrik, l.lainnya
		    FROM
		        (SELECT i.id_prov, i.nama_prov, i.pekerja, i.bahan, i.jasa, i.bbm, j.listrik
		        FROM
		            (SELECT g.id_prov, g.nama_prov, g.pekerja, g.bahan, g.jasa, h.bbm
		            FROM
		                (SELECT e.id_prov, e.nama_prov, e.pekerja, e.bahan, f.jasa
		                FROM
		                    (SELECT c.id_prov, c.nama_prov, c.pekerja, d.bahan
		                    FROM
		                        (SELECT a.id_prov, a.nama_prov, b.pekerja
		                        FROM (SELECT * FROM propinsi) a
		                        LEFT JOIN (
		                            SELECT kode_prov, SUM(IFNULL(b3_jumlah_k10,0) + IFNULL(b3_jumlah_k11,0)) as pekerja
																FROM ".$ltp1."
																WHERE tahun = '".$filter_tahun."'
		                            GROUP BY kode_prov) b
		                        ON a.id_prov = b.kode_prov) c
		                            LEFT JOIN (
		                                SELECT kode_prov, SUM(IFNULL(b6_B_r1a_k3,0) + IFNULL(b6_B_r1b_k3,0) + IFNULL(b6_B_r1c_k3,0) + IFNULL(b6_B_r1d_k3,0) + IFNULL(b6_B_r1e_k3,0)) as bahan
																		FROM ".$ltp2."
																		WHERE tahun = '".$filter_tahun."'
		                                GROUP BY kode_prov) d
		                            ON c.id_prov = d.kode_prov) e
		                                LEFT JOIN (
		                                   SELECT kode_prov, SUM(b6_B_r9_k3) as jasa
																			 FROM ".$ltp2."
																			 WHERE tahun = '".$filter_tahun."'
		                                    GROUP BY kode_prov) f
		                                ON e.id_prov = f.kode_prov) g
		                                    LEFT JOIN (
		                                        SELECT kode_prov, SUM(IFNULL(b6_A_r1_k2,0) + IFNULL(b6_A_r1_k3,0)) as bbm
																						FROM ".$ltp2."
																						WHERE tahun = '".$filter_tahun."'
		                                        GROUP BY kode_prov) h
		                                    ON g.id_prov = h.kode_prov) i
		                                        LEFT JOIN (
		                                            SELECT kode_prov, SUM(IFNULL(b6_A_r2_k2,0) + IFNULL(b6_A_r2_k3,0) + IFNULL(b6_A_r3_k2,0) + IFNULL(b6_A_r3_k3,0) + IFNULL(b6_A_r4_k2,0) + IFNULL(b6_A_r4_k3,0)) as listrik
																								FROM ".$ltp2."
																								WHERE tahun = '".$filter_tahun."'
		                                            GROUP BY kode_prov) j
		                                        ON i.id_prov = j.kode_prov) k
		                                            LEFT JOIN (
		                                                SELECT kode_prov, SUM(IFNULL(b6_B_r2_k3,0) + IFNULL(b6_B_r3_k3,0) + IFNULL(b6_B_r4a_k3,0) + IFNULL(b6_B_r4b_k3,0) + IFNULL(b6_B_r5_k3,0) + IFNULL(b6_B_r6_k3,0) + IFNULL(b6_B_r7_k3,0) + IFNULL(b6_B_r8_k3,0) + IFNULL(b6_B_r10_k3,0)) as lainnya
																										FROM ".$ltp2."
																										WHERE tahun = '".$filter_tahun."'
		                                                GROUP BY kode_prov) l
		                                            ON k.id_prov = l.kode_prov) m
		                                                LEFT JOIN (
		                                                    SELECT kode_prov, SUM(IFNULL(B6_A_jumlah_k2,0) + IFNULL(B6_A_jumlah_k3,0) + IFNULL(B6_B_jumlah_k3,0)) as jumlah
		                                                    FROM ".$ltp2."
		                                                    WHERE tahun = '".$filter_tahun."'
		                                                    GROUP BY kode_prov) n
		                                                ON m.id_prov = n.kode_prov
		                                                ORDER BY id_prov
		";
		$hasil = $this->db->query($SQL1);
		return $hasil->result_array();
	}

	public function daftar_tabulasi_tabel_27($filter_tahun, $ltp)
	{
		$SQL1="
		SELECT i.nama_prov, IFNULL(i.produksi,0) as produksi, IFNULL(i.jasa,0) as jasa, IFNULL(i.keuntungan,0) as keuntungan, IFNULL(i.penerimaan,0) as penerimaan, IFNULL(j.jumlah,0) as jumlah
		        FROM
		            (SELECT g.id_prov, g.nama_prov, g.produksi, g.jasa, g.keuntungan, h.penerimaan
		            FROM
		                (SELECT e.id_prov, e.nama_prov, e.produksi, e.jasa, f.keuntungan
		                FROM
		                    (SELECT c.id_prov, c.nama_prov, c.produksi, d.jasa
		                    FROM
		                        (SELECT a.id_prov, a.nama_prov, b.produksi
		                        FROM (SELECT * FROM propinsi) a
		                        LEFT JOIN (
		                            SELECT kode_prov, SUM(IFNULL(b4_A_jumlah_k3,0)) as produksi
		                            FROM ".$ltp."
		                            WHERE tahun = '".$filter_tahun."'
		                            GROUP BY kode_prov) b
		                        ON a.id_prov = b.kode_prov) c
		                            LEFT JOIN (
		                                SELECT kode_prov, SUM(IFNULL(b4_B_r1_k2,0)) as jasa
				                            FROM ".$ltp."
				                            WHERE tahun = '".$filter_tahun."'
				                        		GROUP BY kode_prov) d
		                            ON c.id_prov = d.kode_prov) e
		                                LEFT JOIN (
		                                    SELECT kode_prov, SUM(IFNULL(b4_B_r2_k2,0)) as keuntungan
						                            FROM ".$ltp."
						                            WHERE tahun = '".$filter_tahun."'
						                    				GROUP BY kode_prov) f
		                                ON e.id_prov = f.kode_prov) g
		                                    LEFT JOIN (
		                                        SELECT kode_prov, SUM(IFNULL(b4_B_r3_k2,0)) as penerimaan
								                            FROM ".$ltp."
								                            WHERE tahun = '".$filter_tahun."'
								                						GROUP BY kode_prov) h
		                                    ON g.id_prov = h.kode_prov) i
		                                        LEFT JOIN (
		                                            SELECT kode_prov, SUM(IFNULL(b4_C_r1_k2,0)) as jumlah
										                            FROM ".$ltp."
										                            WHERE tahun = '".$filter_tahun."'
										            								GROUP BY kode_prov) j
		                                        ON i.id_prov = j.kode_prov
                                    				ORDER BY id_prov
		";
		$hasil = $this->db->query($SQL1);
		return $hasil->result_array();
	}

	// public function tabel_29() {
	// 	$this->db->from('tabel_29');
	// 	return $this->db->get()->result();
	// }
	//
	// public function tabel_30() {
	// 	$this->db->from('tabel_30');
	// 	return $this->db->get()->result();
	// }
	//
	// public function tabel_31() {
	// 	$this->db->from('tabel_31');
	// 	return $this->db->get()->result();
	// }
	//
	// public function get_nama_kolom($nama_tabel) {
	// 	return $this->db->list_fields($nama_tabel);
	// }
	//
	// public function get_data ($nama_tabel, $list_kolom) {
	// 	switch ($_SESSION['tipe_pengguna']) {
	// 	  //ri
	// 	  case 1 : {
	// 	  	$list_kolom_baru = array('b1.b1_r1');
	// 	  } break;
	// 	  //provinsi
	//       case 2 : {
	//       	$this->db->where('b1.b1_r1', $_SESSION['kode_prov']);
	//         $list_kolom_baru = array('b1.b1_r2');
	//       } break;
	//       //kabupaten
	//       case 3 : {
	//       	$this->db->where('b1.b1_r2', $_SESSION['kode_kab']);
	//         $list_kolom_baru = array('b1.b1_r2');
	//       } break;
	//     }
	//     foreach ($list_kolom as $key => $value) {
	// 		array_push($list_kolom_baru, 't.'.$value);
	// 	}
  //   	$this->db->select($list_kolom_baru);
  //   	$this->db->from('blok1 b1');
  //   	$this->db->join($nama_tabel.' t', 'b1.kip=t.kip', 'left');
	// 	return $this->db->get()->result_array();
	// }
}
