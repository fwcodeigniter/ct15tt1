<?php 
	if (!defined('BASEPATH')) exit('Không cho phép điều hướng này');
	/**
	* 
	*/
	class Dashboard extends My_Controller
	{
		function __construct() 
		{
			//Gọi đến hàm khởi tạo của cha
			parent::__construct();
            //Kiểm tra quyền admin
            $this->checkadmin();
            //Load góp ý
            $this->load->model('contact_model');
            //Load database
            $this->load->database();
		}
		//Hàm load trang chủ
		public function index()
		{
			$input = array();
			$input['order'] = array('status','DESC');
			$data['contact'] = $this->contact_model->get_list($input);
			$data['base_url'] = base_url();
			$this->load->view('layouts/headeradmin_View',$data);
			$this->load->view('admin/dashboard_View',$data);
			$this->load->view('layouts/footer_View',$data);
		}
		public function update($id = '')
		{
			$dulieu = array('status' => '0');
			if($this->contact_model->update($id,$dulieu))
			{
				$this->session->set_flashdata('success','Bạn đã xem góp ý này');
			}
			else
			{
				$this->session->set_flashdata('fail','Bạn chưa xem được góp ý này');
			}
			$data['base_url'] = base_url();
			redirect($data['base_url'].'admin/dashboard');
		}
		public function drop($id = '')
		{
			if ($id!='') {
				if ($this->contact_model->delete($id)) {
					$this->session->set_flashdata('success','Xóa Góp ý thành công');
				}
				else
				{
					$this->session->set_flashdata('fail','Xóa Góp ý thất bại');
				}
			}
			else
			{
				$data['result'] = -1;
			}
			
			$data['base_url'] = base_url();
			redirect($data['base_url'].'admin/dashboard');
		}
	}
 ?>