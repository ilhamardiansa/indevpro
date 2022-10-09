<?php 
	class Kode_m extends CI_Model{
		public function kode(){ 
			$this->db->select('RIGHT(datauser.
            UserID,2) as UserID', FALSE);
		  $this->db->order_by('UserID','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('datauser');  //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
			   //cek kode jika telah tersedia    
			   $data = $query->row();      
			   $kode = intval($data->UserID) + 1; 
		  }
		  else{      
			   $kode = 1;  //cek jika kode belum terdapat pada table
		  }
			  $tgl=date('dmY'); 
			  $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
			  $kodetampil = "PERPUS".$batas;  //format kode
			  return $kodetampil;  
		 }

		 public function kode2(){ 
			$this->db->select('RIGHT(databuku.
            ID,2) as ID', FALSE);
		  $this->db->order_by('ID','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('databuku');  //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
			   //cek kode jika telah tersedia    
			   $data = $query->row();      
			   $kode = intval($data->ID) + 1; 
		  }
		  else{      
			   $kode = 1;  //cek jika kode belum terdapat pada table
		  }
			  $tgl=date('dmY'); 
			  $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
			  $kodetampil = "bk".$batas;  //format kode
			  return $kodetampil;  
		 }
}