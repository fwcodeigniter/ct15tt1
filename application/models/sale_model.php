<?php 
	/**
	* 
	*/
	class Sale_model extends MY_Model
	{
		public $table = 'sale';
        function get_sale_by_date()
		{   
            $today = date('d/m/Y');
            $str = "SELECT * FROM sale WHERE datebegin <= '".$today."' AND dateend >= '".$today."'";
			$query = $this->db->query($str);
			return $query->result_array();
		}
	}
 ?>