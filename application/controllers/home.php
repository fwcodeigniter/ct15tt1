<?php

if (!defined('BASEPATH'))
    exit('Không cho phép điều hướng này');

/**
 * 
 */
class Home extends CI_Controller {

    function __construct() {
        //Gọi đến hàm khởi tạo của cha
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('brand_model');
        $this->load->model('product_model');
        $this->load->model('sale_model');
        $this->load->model('contact_model');
        //load Database
        $this->load->database();
    }

    //Hàm load trang chủ
    public function index() {
        $data['category'] = $this->category_model->get_list();
        $data['product'] = $this->product_model->get_list();
        $data['brand'] = $this->brand_model->get_list();
        $data['pro_count'] = $this->product_model->get_pro_count_by_brand();
        //Kiểm tra đăng nhập
       if (isset($this->session->userdata['activeuser'])) {
           $data['activeuser'] = $this->session->userdata['activeuser'];
       }
       //Danh sách sản phẩm bán chạy
       $input = array();
       $input['order'] = array('sold', 'DESC');
       $input['limit'] = array('3', 0);
       $data['pro_bestseller'] = $this->product_model->get_list($input);
       $data['pro_bestseller'] = $this->get_sale_price($data['pro_bestseller']);
       //Danh sách sản phẩm mới thêm
       $input['order'] = array('created', 'DESC');
       $data['pro_new'] = $this->product_model->get_list($input);
       $data['pro_new'] = $this->get_sale_price($data['pro_new']);
       $data['base_url'] = base_url();
       //Load view trang chủ lên
       $this->load->view('layouts/header_View', $data);
       $this->load->view('layouts/slider_View', $data);
       $this->load->view('layouts/left_siderbar_View', $data);
       $this->load->view('site/home_View', $data);
       $this->load->view('layouts/footer_View', $data);
    }

    //Action Category cho phép load sản phẩm theo category
    public function category($cat_id = 0) {
        $data['base_url'] = base_url(); //Lấy thư mục gốc
        if ($cat_id == 0) {
            redirect($data['base_url']); //Nếu không có cat_id tự động chuyển về trang chủ
        } else { //Nếu có cat_id truyền vào thì đọc trong database lấy danh sách sản phẩm theo id
            $data['category'] = $this->category_model->get_list(); //Hàm lấy danh sách category
            $data['brand'] = $this->brand_model->get_list(); //Hàm lấy danh sách Brand
            $data['pro_count'] = $this->product_model->get_pro_count_by_brand(); //Hàm đếm product theo Brand
            $data['active_cat'] = $cat_id;
            $input = array(); //tạo mảng chứa thông tin cần truy vấn
            $input['where'] = array('cat_id' => $cat_id);
//				var_dump($input['where']);
            $data['product'] = $this->product_model->get_list($input); //Hàm lấy danh sách sản phẩm theo cat_id
            $data['product'] = $this->get_sale_price($data['product']);
        }
//			Load view trang chủ lên
        $this->load->view('layouts/header_View', $data);
        $this->load->view('layouts/slider_View', $data);
        $this->load->view('layouts/left_siderbar_View', $data);
        $this->load->view('site/category_View', $data);
        $this->load->view('layouts/footer_View', $data);
    }

    //Action brand cho phép load sản phẩm theo brand
    public function brand($brand_id = 0) {
        $data['base_url'] = base_url(); //Lấy thư mục gốc
        if ($brand_id == 0) {
            redirect($data['base_url']); //Nếu không có cat_id tự động chuyển về trang chủ
        } else { //Nếu có cat_id truyền vào thì đọc trong database lấy danh sách sản phẩm theo id
            $data['category'] = $this->category_model->get_list(); //Hàm lấy danh sách category
            $data['brand'] = $this->brand_model->get_list(); //Hàm lấy danh sách Brand
            $data['pro_count'] = $this->product_model->get_pro_count_by_brand(); //Hàm đếm product theo Brand
            $data['active_brand'] = $brand_id;
            $input = array(); //tạo mảng chứa thông tin cần truy vấn
            $input['where'] = array('brand_id' => $brand_id);
//				var_dump($input['where']);
            $data['product'] = $this->product_model->get_list($input); //Hàm lấy danh sách sản phẩm theo cat_id
            $data['product'] = $this->get_sale_price($data['product']);
        }
//			Load view trang chủ lên
        $this->load->view('layouts/header_View', $data);
        $this->load->view('layouts/slider_View', $data);
        $this->load->view('layouts/left_siderbar_View', $data);
        $this->load->view('site/category_View', $data);
        $this->load->view('layouts/footer_View', $data);
    }

    //Action product cho phép load thông tin chi tiết của sản phẩm
    public function product($pro_id = 0) {
        $data['base_url'] = base_url(); //Lấy thư mục gốc
        if ($pro_id == 0) {
            redirect($data['base_url']); //Nếu không có cat_id tự động chuyển về trang chủ
        } else { //Nếu có cat_id truyền vào thì đọc trong database lấy danh sách sản phẩm theo id
            $data['category'] = $this->category_model->get_list(); //Hàm lấy danh sách category
            $data['brand'] = $this->brand_model->get_list(); //Hàm lấy danh sách Brand
            $data['pro_count'] = $this->product_model->get_pro_count_by_brand(); //Hàm đếm product theo Brand
            $data['product'] = $this->product_model->get_info($pro_id); //Hàm lấy chi tiết sản phẩm theo id
            $data['product'] = $this->get_sale_price($data['product']);
        }
			// Load view trang chi tiết hàng hóa lên
        $this->load->view('layouts/header_View', $data);
        $this->load->view('layouts/slider_View', $data);
        $this->load->view('layouts/left_siderbar_View', $data);
        $this->load->view('site/product_View', $data);
        $this->load->view('layouts/footer_View', $data);
    }

    //Action cho phép ghi dữ liệu lên cart
    public function addtocart() {
        //Mảng lưu thông tin giỏ hàng
        $cart = array(
            'id' => $this->input->post('txtId'),
            'qty' => 1,
            'price' => $this->input->post('txtPrice'),
            'name' => $this->input->post('txtName')
        );
        $cart['name'] = str_replace('(', '', $cart['name']);
        $cart['name'] = str_replace(')', '', $cart['name']);
        $cart['name'] = str_replace('/', '.', $cart['name']);
        //Ghi dữ liệu vào giỏ hàng
        $this->cart->insert($cart);
        //Lấy số lượng hàng trong giỏ hàng
        $cart_num = $this->cart->total_items();
        $this->session->set_userdata('cart_num', $cart_num);
//                        Chuyển về trang trước
        redirect($_SERVER['HTTP_REFERER']);
    }
    function contact()
    {
        $dulieu = array();
        $dulieu['name'] = $this->input->post('txtName');
        $dulieu['email'] = $this->input->post('txtEmail');
        $dulieu['subject'] = $this->input->post('txtSubject');
        $dulieu['content'] = $this->input->post('txtContent');
        if ($this->contact_model->create($dulieu)) {
            $this->session->set_flashdata('success','Cảm ơn phản hồi của bạn, chúng tôi sẽ liên hệ với bạn sớm');
        }
        else
        {
            $this->session->set_flashdata('fail','Vui lòng thử lại');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    //Hàm tính giá khuyến mãi
    function get_sale_price($product)
    {
        if ($product != '') 
        {
            $sale = $this->sale_model->get_sale_by_date();
            foreach ($sale as $value) {
                $cat_id = $value['cat_id'];
                if (strpos($cat_id, ',')) {
                    $cat_id = explode(', ', $cat_id);
                    foreach ($cat_id as $v) {
                        if (!is_array($product)) {
                            if ($product->cat_id == $v) {
                                if ($value['percent']) {
                                    $product->sale_price = (100-$value['percent']) * $product->price / 100;
                                } else {
                                    $product->sale_price = $product->price - $value['amount'];
                                }
                            }
                        }
                        else
                        {
                        foreach ($product as $v1) {
                            if ($v1->cat_id == $v) {
                                if ($value['percent']) {
                                    $v1->sale_price = (100-$value['percent']) * $v1->price / 100;
                                } else {
                                    $v1->sale_price = $v1->price - $value['amount'];
                                }
                            }
                        }
                    }
                    }
                }
                else {
                     $v = $value['cat_id'];
                    foreach ($product as $v1) {
                        if ($v1->cat_id == $v) {
                            if ($value['percent']) {
                                $v1->sale_price = (100-$value['percent']) * $v1->price / 100;
                            } else {
                                $v1->sale_price = $v1->price - $value['amount'];
                            }
                        }
                    }
                }
            }
        }
        return $product;
        // End - Tính giá khuyến mãi
    }
    public function search($cat_id = 0) {
        $data['base_url'] = base_url();
        $product = $this->product_model->get_list();
        $search = $this->input->post('search');
        $num = 0;
        $data['product']=array();
        foreach ($product as $value)
        {
            if ((strpos(strtolower($value->name),$search))||strpos($value->name,$search)) {
                $x = array();
                $x['id'] = $value->id;
                $x['name'] = $value->name;
                $x['price'] = $value->price;
                $x['sale_price'] = $value->sale_price;
                $x['description'] = $value->description;
                $x['cat_id'] = $value->cat_id;
                $x['brand_id'] = $value->brand_id;
                $x['image'] = $value->image;
                $data['product'][$num] = $x;
                $num++;
            }
        }
        $data['category'] = $this->category_model->get_list(); //Hàm lấy danh sách category
        $data['brand'] = $this->brand_model->get_list(); //Hàm lấy danh sách Brand
        $data['pro_count'] = $this->product_model->get_pro_count_by_brand(); //Hàm đếm product theo Brand
//			Load view trang chủ lên
        $this->load->view('layouts/header_View', $data);
        $this->load->view('layouts/slider_View', $data);
        $this->load->view('layouts/left_siderbar_View', $data);
        $this->load->view('site/search_View', $data);
        $this->load->view('layouts/footer_View', $data);
    }
}

?>