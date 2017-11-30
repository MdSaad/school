<?php

	class M_admin extends CI_Model {
	
		const TABLE	= '';
	
		public function __construct()
		{
			parent::__construct();
		}
			
		public function save($data)
		{
			$this->db->insert(self::TABLE, $data);        
		}
		
		public function findByUserName($table,$userName)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where('user_name', $userName);
			$query = $this->db->get();
			return $query->row();
		}
		
			
	}
?>