<?php
/* Phần này dùng để check sự tồn tại của các biến trong trang
  Nếu biến nào không tồn tại sẽ đặt giá trị mặc định để tránh lỗi */
if (!isset($product)) {
    $product = array('fail' => 'Không có sản phẩm');
}
?>
<div class="col-sm-9 padding-right">
    <div class="row">
        <div class="col-sm-4">
            <img class="img-responsive" src="<?php echo $base_url.'public/images/products/'.$product->image; ?>"/>
        </div>
        <div class="col-sm-8">
            <p><h2><?php echo $product->name; ?></h2></p>
            <p><h2><?php 
                if ($product->sale_price == '0') {
                    echo number_format($product->price, 0, ',', '.').'đ';
                }
                else
                {
                    echo '<strike>'.number_format($product->price, 0, ',', '.').'</strike>đ';
                    echo '<br>'.number_format($product->sale_price, 0, ',', '.').'đ';
                }
                             ?></h2></p>
            <form method="post" action="<?php echo $base_url; ?>home/addtocart">
                <input type="hidden" name="txtId" value="<?php echo $product->id; ?>" />
                <input type="hidden" name="txtPrice" value="<?php echo $product->price; ?>" />
                <input type="hidden" name="txtName" value="<?php echo $product->name; ?>" />
                <button name="isOK" type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
            </form>
        </div>
    </div>
    <div class="col-sm-10"style="font-size: 18px" >
        <h1 style="text-align: center"><b>THÔNG SỐ KĨ THUẬT</b></h1>
        <?php echo $product->description; ?>
    </div>
</div>
</section>