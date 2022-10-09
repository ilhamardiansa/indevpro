<?php 
	class Search extends CI_Model{
		public function getkeyword($keyword){ 
			$this->db->select('*');
			$this->db->from('databuku');
			$this->db->like('Title',$keyword);
			$this->db->or_like('Author',$keyword);
            $this->db->or_like('Category',$keyword);
            $this->db->or_like('Year',$keyword);
            $this->db->or_like('Publisher',$keyword);
			return $this->db->get()->result();
		 }
}