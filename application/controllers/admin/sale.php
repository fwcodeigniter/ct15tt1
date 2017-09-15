<?php 
	if (!defined('BASEPATH')) exit('Không cho phép điều hướng này');
	/**
	* 
	*/
	class Sale extends My_Controller
	{
		function __construct() 
		{
			//Gọi đến hàm khởi tạo của cha
			parent::__construct();
                        //Kiểm tra quyền admin
                        $this->checkadmin();
			//load model
			$this->load->model('sale_model');
			$this->load->model('category_model');
			//load Database
			$this->load->database();
		}
		//Hàm load trang chủ
		public function index()
		{
			$data['sale'] = $this->sale_model->get_list();
			$data['category'] = $this->category_model->get_list();
                    
			$data['base_url'] = base_url();
			$this->load->view('layouts/headeradmin_View',$data);
			$this->load->view('admin/sale_View',$data);
			$this->load->view('layouts/footer_View',$data);
		}
		public function add()
		{
            $dulieu = array('name'=>$this->input->post('txtName'),
                            'datebegin'=>$this->input->post('txtDatebegin'),
                            'dateend'=>$this->input->post('txtDateend'),
                            'percent'=>$this->input->post('txtPercent'),
                            'amount'=>$this->input->post('txtAmount'));
            $catId = $this->input->post('txtCat');
            $dulieu['cat_id'] = implode(', ', $catId);
            if ($dulieu['percent']!=0) {
                $dulieu['amount']='';//Nếu có phần trăm thì chỉ lấy theo phần trăm
            }
            if ($this->sale_model->create($dulieu)) {
                    $this->session->set_flashdata('success','Thêm Khuyến mãi thành công');
            }
            else
            {
                    $this->session->set_flashdata('fail','Thêm Khuyến mãi thất bại');
            }
            $data['base_url'] = base_url();
            redirect($data['base_url'].'admin/sale');
		}
		public function drop($id = '')
		{
			if ($id!='') {
				if ($this->sale_model->delete($id)) {
					$this->session->set_flashdata('success','Xóa Khuyến mãi thành công');
				}
				else
				{
					$this->session->set_flashdata('fail','Xóa Khuyến mãi thất bại');
				}
			}
			else
			{
				$data['result'] = -1;
			}
			
			$data['base_url'] = base_url();
			redirect($data['base_url'].'admin/sale');
		}
		public function update($id = '')
		{
            $dulieu = array('name'=>$this->input->post('txtName'),
                        'datebegin'=>$this->input->post('txtDatebegin'),
                        'dateend'=>$this->input->post('txtDateend'),
                        'percent'=>$this->input->post('txtPercent'),
                        'amount'=>$this->input->post('txtAmount'));
            $catId = $this->input->post('txtCat');
            if ($catId) {
                $dulieu['cat_id'] = implode(', ', $catId);
            }
            if ($dulieu['percent']!='0') {
                $dulieu['amount']='';//Nếu có phần trăm thì chỉ lấy theo phần trăm
            }
            if ($this->sale_model->update($id, $dulieu)) {
                    $this->session->set_flashdata('success','Sửa Khuyến mãi thành công');
            }
            else
            {
                    $this->session->set_flashdata('fail','Sửa Khuyến mãi thất bại');
            }
            $data['base_url'] = base_url();
            redirect($data['base_url'].'admin/sale');
		}
	}
 ?>