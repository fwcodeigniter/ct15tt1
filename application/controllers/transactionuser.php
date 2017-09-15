<?php

if (!defined('BASEPATH'))
    exit('Không cho phép điều hướng này');

/**
 * 
 */
class transactionuser extends My_Controller {

    function __construct() {
        //Gọi đến hàm khởi tạo của cha
        parent::__construct();
        //Kiểm tra quyền admin
        
        //load model
        $this->load->model('transaction_model');
        $this->load->model('order_model');
        $this->load->model('product_model');
        $this->load->model('category_model');
        $this->load->model('user_model');
        //load Database
        $this->load->database();
    }

    //Hàm load trang chủ$total_rows = $this->transaction_model->get_total();

    public function index() {
        $user = $this->user_model->get_list();
        $transaction = $this->transaction_model->get_list();
        $this->data['transaction'] = $transaction;
        $this->data['user'] = $user;
        $data['transaction'] = $this->transaction_model->get_list();
        $data['order'] = $this->order_model->get_list();
        $data['product'] = $this->product_model->get_list();
        $data['user'] = $this->user_model->get_list();
        
        $this->data['base_url'] = base_url();
        //Kiểm tra user đã đăng nhập hay chưa
        $this->data['user'] = $this->session->userdata('activeuser');
        //Nếu đã đăng nhập thì load thông tin giỏ hàng lên
        if (isset($this->data['user'])) {
            $this->load->model('product_model');
            $id = $this->uri->rsegment(3);
            $id = $this->product_model->get_info($id);
            $carts = $this->cart->contents();
            $this->data['carts'] = $carts;
            $total_items = $this->cart->total_items();
            $this->data['total_items'] = $total_items;
            // load view
            $this->data['temp'] = 'site/cart/index';
            $this->data['temp'] = 'site/order/checkout';
            $this->load->view('layouts/header_View', $this->data);
            $this->load->view('site/transactionuser_view', $this->data);
            $this->load->view('layouts/footer_View', $this->data);
        }
        //trường hợp chưa đăng nhập thì chuyển tới trang đăng nhập
        else {
            $this->session->set_userdata('cart_login','1');
            redirect($this->data['base_url'] . 'admin/login');
        }
    }

    public function add() {
        $dulieu = array('name' => $this->input->post('txtName'));
        if ($this->transaction_model->create($dulieu)) {
            $this->session->set_flashdata('success', 'Thêm thành công');
        } else {
            $this->session->set_flashdata('fail', 'Thêm thất bại');
        }
        $data['base_url'] = base_url();
        redirect($data['base_url'] . 'admin/transaction');
    }

    public function drop($id = '') {
        if ($id != '') {
            if ($this->transaction_model->delete($id)) {
                $this->session->set_flashdata('success', 'Xóa thành công');
            } else {
                $this->session->set_flashdata('fail', 'Xóa thất bại');
            }
        } else {
            $data['result'] = -1;
        }

        $data['base_url'] = base_url();
        redirect($data['base_url'] . 'admin/transaction');
    }

    public function update($id = '') {
        $dulieu = array('name' => $this->input->post('txtName'));
        if ($this->transaction_model->update($id, $dulieu)) {
            $this->session->set_flashdata('success', 'Sửa thành công');
        } else {
            $this->session->set_flashdata('fail', 'Sửa thất bại');
        }
        $data['base_url'] = base_url();
        redirect($data['base_url'] . 'admin/transaction');
    }
    public function order()
    {
        $data['order'] = $this->order_model->get_order_group_pro();
        $data['product'] = $this->product_model->get_list();
        $data['user'] = $this->user_model->get_list();
        $data['base_url'] = base_url();
        $this->load->view('layouts/headeradmin_View', $data);
        $this->load->view('admin/order_View', $data);
        $this->load->view('layouts/footer_View', $data);
    }
    public function click($id = '')
		{
			$data['base_url'] = base_url();

			$dulieu = array('name'=>$this->input->post('txtName'),
							
							'status'=>$this->input->post('txtSta'));
			$num = $this->input->post('txtNum');
			
			if ($this->transaction_model->update($id, $dulieu)) {
				$this->session->set_flashdata('success','Sửa thành công');
			}
			else
			{
				$this->session->set_flashdata('fail','Sửa thất bại');
			}
			redirect($data['base_url'].'admin/transaction');
		}
                 function checkout() {
        //Ghi thông tin lên transaction
        $transaction = array();
        $transaction['id_user'] = $this->input->post('txtId');
        $transaction['name'] = $this->input->post('txtName');
        $transaction['email'] = $this->input->post('txtEmail');
        $transaction['phone'] = $this->input->post('txtPhone');
        $transaction['address'] = $this->input->post('txtAddress');
        $transaction['amount'] = floor($this->input->post('txtTotal'));
        $transaction['payment'] = $this->input->post('txtPayment');
        $transaction['message'] = $this->input->post('txtMessage');
        $transaction['created'] = date('Y-m-d');
        $transaction['trac_id'] = date('Ymdhis');
        if ($this->transaction_model->create($transaction)) {
                $this->session->set_flashdata('success','Thêm thành công');
        }
        else
        {
                $this->session->set_flashdata('fail','Thêm thất bại');
        }
        //Ghi thông tin lên bảng order
        $cart = $this->cart->contents();
        foreach ($cart as $value)
        {
            $order = array();
            $order['id_transaction'] = $transaction['trac_id'];
            $order['id_product'] = $value['id'];
            $order['qty'] = $value['qty'];
            $order['price'] = $value['price'];
            $order['amount'] = $value['price']*$value['qty'];
            if ($this->order_model->create($order)) {
                $this->session->set_flashdata('success','Thêm thành công');
                //Hủy bỏ giỏ hàng
                $this->cart->destroy();
        }
        else
        {
                $this->session->set_flashdata('fail','Thêm thất bại');
        }
        }
        
        redirect(base_url());
    }
}

?>