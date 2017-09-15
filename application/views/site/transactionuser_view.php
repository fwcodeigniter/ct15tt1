
<section id="cart_items">
    <div class="container">
        <div style="display: none;" id="success"><?php echo $this->session->flashdata('success'); ?></div>
        <div style="display: none;" id="fail"><?php echo $this->session->flashdata('fail'); ?></div>
        <div class="container">
        </div>
 <?php      $activeuser = $this->session->userdata('activeuser');
      
  ?>
        <div class="table-responsive cart_info">
            <div class="modal-header">
                <h4 align="center">Lịch sử giao dịch</h4>
            </div>
     <tbody>
               <table class="table table-condensed" style="margin-left: 5px; width: 98%;">
                                                <thead>
                                                    <tr class="cart_menu">
                                                        <td align="center">STT</td>
                                                        <td align="center">Ngày tạo</td>
                                                        <td align="center">Loại giao dịch</td>
                                                        <td align="center">Nội dung</td>
                                                        <td align="center">Số tiền</td>
                                                        <td align="center">Trạng thái</td>
                                                    </tr>
                                                </thead> 
                                                <tbody> 
                                     <?php
                                     $num=1;
                                     $stt = 1;
                                     foreach ($transaction as $key => $value):
                                     ?>
                                                <?php  
                                                 
                                                  if ($activeuser['id']==$value->id_user)
                                                  {
                                                  echo'<tr>
                                                      <td align="center">'.$stt++.'</td>';
                                                  echo'<td align="center">'.$value->created.'</td>
                                                      <td align="center">'.$value->payment.'</td>
                                                      <td align="center">'.$value->message.'</td>
                                                      <td align="center">'.$value->amount.'</td>';
                                                       if ($value->status == 0) {
                                                      echo '<td align="center">'.'Chưa thanh toán'.'</td>';
                                                         } elseif ($value->status == 1) {
                                                      echo '<td align="center">'.'Đã thanh toán'.'</td>';
                                                         } else {
                                                      echo '<td align="center">'.'Thanh toán thất bại'.'</td></tr>';
                                                         }
                                                 }
                                                 ?>
                <?php
                 $num++; 
                    endforeach;
                ?>
     </tbody>
              </table>
    </tbody>                                         
        </div>
        <div class="table-responsive cart_info">
            <div class="modal-header">
                <h4 align="center">Thông tin khách hàng</h4>
            </div>
     <tbody>
               <table class="table table-condensed" style="margin-left: 5px; width: 98%;">
                                                <thead>
                                                    <tr align="center"><td><b>Mã khách hàng</b></td><td><b>Tên khách hàng</b></td></tr>
                                                    <tr align="center"><td><?php echo $activeuser['id'];?></td><td><?php echo $activeuser['dname'];?></td></tr>
                                                    
                                                    <tr align="center"><td><b>Số điện thoại</b></td><td><b>Địa chỉ email</b></td></tr>
                                                    <tr align="center"><td><?php echo $activeuser['phone'];?></td><td><?php echo $activeuser['email'];?></td></tr>
                                                    
                                                    <tr align="center"><td><b>Địa chỉ thường trú</b></td><td><b>Địa chỉ giao hàng</b></td></tr>
                                                    <tr align="center"><td><?php echo $activeuser['address'];?></td><td><?php
                                                    foreach ($transaction as $key =>$value){
                                                    if ($activeuser['id']==$value->id_user)
                                                    {
                                                        echo $value->address;
                                                    }
                                                    }
                                                    ?></td></tr> 
                                                </thead> 
                                                
              </table>
    </tbody>                                         
        </div>
    </div>  
</section>
