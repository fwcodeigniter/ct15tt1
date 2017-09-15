<?php 
	if (!defined('BASEPATH')) exit('Không cho phép điều hướng này');
	/**
	* 
	*/
	class Product extends My_Controller
	{
		function __construct() 
		{
			//Gọi đến hàm khởi tạo của cha
			parent::__construct();
                        //Kiểm tra quyền admin
                        $this->checkadmin();
			//load model
			$this->load->model('product_model');
			$this->load->model('category_model');
			$this->load->model('brand_model');
			//load Database
			$this->load->database();
		}
		//Hàm load trang chủ
		public function index()
		{
			$data['brand'] = $this->brand_model->get_list();
			$data['category'] = $this->category_model->get_list();
			$data['product'] = $this->product_model->get_list();
			$data['base_url'] = base_url();
			$this->load->view('layouts/headeradmin_View',$data);
			$this->load->view('admin/product_View',$data);
			$this->load->view('layouts/footer_View',$data);
		}
		public function add()
		{
			$data['base_url'] = base_url();

			$dulieu = array('name'=>$this->input->post('txtName'),
							'price'=>$this->input->post('txtPrice'),
							'sale_price'=>$this->input->post('txtInventory'),
							'cat_id'=>$this->input->post('txtCat'),
							'brand_id'=>$this->input->post('txtBrand'),);
			//bỏ ký tự định dạng cho price và sale_price
			$dulieu['price'] = str_replace('.','',$dulieu['price']);
			$dulieu['sale_price'] = str_replace('.','',$dulieu['sale_price']);
			//upload file
			$config = array();
			$config['upload_path'] = './public/images/products'; //thu mục chứa hình
			$config['allowed_types'] = 'jpg|png|gif|jpeg'; //Loại file cho phép
			$config['file_name'] = date('ymdhis').str_replace('image/','.',$_FILES['image']['type']);
//                        var_dump($config);
				//load thư viện upload
		        $this->load->library('upload', $config);
		         //thuc hien upload
		        if($this->upload->do_upload('image'))
		        {
		             //chua mang thong tin upload thanh con
		            $file_data = $this->upload->data();
		            $dulieu['image'] = $file_data['file_name'];
                    $this->load->library("image_lib");
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './public/images/products'.$file_data['file_name'];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']     = 268;
                    $config['height']   = 249;
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
		        }
		        else
	         	{
	            //hien thi lỗi nếu có
	            $error = $this->upload->display_errors();
	            echo $error;
	         	}
			//end upload file
	         
	         $dulieu['created'] = date('Y-m-d');
			if ($this->product_model->create($dulieu)) {
				$this->session->set_flashdata('success','Thêm thành công');
			}
			else
			{
				$this->session->set_flashdata('fail','Thêm thất bại');
			}
			redirect($data['base_url'].'admin/product');
		}
                
                //Xóa hàng hóa
		public function drop($id = '')
		{
			if ($id!='') {
				if ($this->product_model->delete($id)) {
					$this->session->set_flashdata('success','Xóa thành công');
				}
				else
				{
					$this->session->set_flashdata('fail','Xóa thất bại');
				}
			}
			else
			{
				$data['result'] = -1;
			}
			
			$data['base_url'] = base_url();
			redirect($data['base_url'].'admin/product');
		}
		public function update($id = '')
		{
			$data['base_url'] = base_url();

			$dulieu = array('name'=>$this->input->post('txtName'),
							'price'=>$this->input->post('txtPrice'),
							'sale_price'=>$this->input->post('txtInventory'),
							'cat_id'=>$this->input->post('txtCat'),
							'brand_id'=>$this->input->post('txtBrand'),
							'description'=>$this->input->post('txtDesc'));
			//bỏ ký tự định dạng cho price và sale_price
			$dulieu['price'] = str_replace('.','',$dulieu['price']);
			$dulieu['sale_price'] = str_replace('.','',$dulieu['sale_price']);
			$num = $this->input->post('txtNum');
			// echo $_FILES['image'.$num]['name'];
			//upload file
			if ($_FILES['image'.$num]['name']!='')
			{
				
				$config = array();
				$config['upload_path'] = './public/images/products'; //thu mục chứa hình
				$config['allowed_types'] = 'jpg|png|gif|jpeg'; //Loại file cho phép
				$config['file_name'] = date('ymdhis').str_replace('image/','.',$_FILES['image'.$num]['type']);

				//load thư viện upload
		        $this->load->library('upload', $config);
		         //thuc hien upload
		        if($this->upload->do_upload('image'.$num))
		        {
		             //chua mang thong tin upload thanh con
		            $file_data = $this->upload->data();
		            $dulieu['image'] = $file_data['file_name'];
                            $this->load->library("image_lib");
                            $config['image_library'] = 'gd2';
                            $config['source_image'] = './public/images/products'.$file_data['file_name'];
//                            $config['create_thumb'] = TRUE;
//                            $config['maintain_ratio'] = TRUE;
                            $config['width']     = 268;
                            $config['height']   = 249;
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
		        }
		        else
	         	{
	            //hien thi lỗi nếu có
	            $error = $this->upload->display_errors();
	            echo $error;
	         	}
		    }
		    else
		    {
		    	$dulieu['image'] = $this->input->post('txtImage');
		    }
			//end upload file
			if ($this->product_model->update($id, $dulieu)) {
				$this->session->set_flashdata('success','Sửa thành công');
			}
			else
			{
				$this->session->set_flashdata('fail','Sửa thất bại');
			}
			redirect($data['base_url'].'admin/product');
		}
	}
 ?>