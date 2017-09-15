
<section id="cart_items">
    <div class="container">
        <div style="display: none;" id="success"><?php echo $this->session->flashdata('success'); ?></div>
        <div style="display: none;" id="fail"><?php echo $this->session->flashdata('fail'); ?></div>
        <div class="table-responsive cart_info">
            <button style="margin-bottom: 5px" type="button" class="btn btn-default hbtn" data-toggle="modal" data-target="#addCat">Thêm Khuyến mãi</button>

            <div class="modal fade" id="addCat" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm Khuyến mãi</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" action="<?php echo $base_url; ?>admin/sale/add" method="POST">
                                    <div class="row hlineheight">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="text" name="txtName" placeholder="Tên Khuyến mãi" pattern="+[a-zA-Z0-9]" />
                                        </div>
                                    </div>
                                    <div class="row hlineheight">
                                        <div class="col-xs-2">
                                            <label style="padding-top:6px;">Từ ngày:</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="input-group date layngay" data-date-format="dd/mm/yyyy">
                                                <input class="form-control" readonly="" type="text" name="txtDatebegin"/> 
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <label style="padding-top:6px;">Đến ngày: </label>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="input-group date layngay" data-date-format="dd/mm/yyyy">
                                                <input class="form-control" readonly="" type="text" name="txtDateend"/> 
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row hlineheight">
                                    <div class="col-xs-3">
                                        <label style="padding-top:6px">Chiết khấu %:</label>
                                    </div>
                                    <div class="col-xs-3">
                                        <input class="form-control" type="text" name="txtPercent" value="0" />
                                    </div>
                                    <div class="col-xs-3">
                                        <label style="padding-top:6px">Chiết khấu tiền:</label>
                                    </div>
                                    <div class="col-xs-3">
                                        <input class="form-control" type="text" name="txtAmount" value="0" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <label style="padding-top:6px">Nhóm hàng:</label>
                                    </div>
                                    <div class="col-xs-9">
                                        <select name="txtCat[]" class="form-control selectpicker" multiple>
                                            <?php 
                                            if(isset($category)&&!empty($category)){
                                                foreach ($category as $key => $value)
                                                {
                                                    echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                                                }
                                            }
 else {
                                                echo '<option>Không có Nhóm hàng</option>';
 }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <input class="form-control hbtn" type="submit" class="btn btn-default" value="Lưu">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu"  style="text-align: center;">
                        <td class="image">Mã KM</td>
                        <td class="description">Tên Khuyến mãi</td>
                        <td class="price">Hiệu lực</td>
                        <td class="price">Nhóm hàng</td>
                        <td class="quantity">Chiết khấu %</td>
                        <td class="total">Chiết khấu tiền</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $num = 1;
                    foreach ($sale as $key => $value):
                        ?>
                        <tr>
                            <td class="cart_price" style="text-align: right; padding-right:20px;">
    <?php echo $value->id; ?>
                            </td>
                            <td class="cart_description">
    <?php echo $value->name; ?>
                            </td>
                            <td class="cart_price">
                                <?php 
                                if (($value->datebegin<=date('dd/mm/yyyy'))&&($value->dateend>=date('dd/mm/yyyy'))) {
                                    echo '<span style="color: green">'.$value->datebegin.' - '.$value->dateend.'</span>'; 
                                }
                                else
                                {
                                    echo '<span style="color: red">'.$value->datebegin.' - '.$value->dateend.'</span>';
                                }
                                 ?>
                            </td>
                            <td class="cart_quantity" style="text-align: right; padding-right:20px;">
                                <?php echo $value->cat_id; ?>
                            </td>
                            <td class="cart_quantity" style="text-align: right; padding-right:20px;">
                                <?php echo $value->percent.'%'; ?>
                            </td>
                            <td class="cart_quantity" style="text-align: right; padding-right:20px;">
                                <?php echo number_format($value->amount).' VNĐ'; ?>
                            </td>
                            <td class="cart_edit">
                                <a class="cart_quantity_delete" data-toggle="modal" data-target="#editCat<?php echo $num; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                <div class="modal fade" id="editCat<?php echo $num; ?>" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Sửa Khuyến mãi</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" action="<?php echo $base_url; ?>admin/sale/update/<?php echo $value->id; ?>" method="POST">
                                    <div class="row hlineheight">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="text" name="txtName" placeholder="Tên Khuyến mãi" pattern="+[a-zA-Z0-9]" value="<?php echo $value->name;?>"/>
                                        </div>
                                    </div>
                                    <div class="row hlineheight">
                                        <div class="col-xs-2">
                                            <label style="padding-top:6px;">Từ ngày:</label>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="input-group date layngay" data-date-format="dd/mm/yyyy">
                                                <input class="form-control" readonly="" type="text" name="txtDatebegin" value="<?php echo $value->datebegin;?>"/> 
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <label style="padding-top:6px;">Đến ngày: </label>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="input-group date layngay" data-date-format="dd/mm/yyyy">
                                                <input class="form-control" readonly="" type="text" name="txtDateend" value="<?php echo $value->dateend;?>"/> 
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row hlineheight">
                                    <div class="col-xs-3">
                                        <label style="padding-top:6px">Chiết khấu %:</label>
                                    </div>
                                    <div class="col-xs-3">
                                        <input class="form-control" type="text" name="txtPercent" value="<?php echo $value->percent;?>"/>
                                    </div>
                                    <div class="col-xs-3">
                                        <label style="padding-top:6px">Chiết khấu tiền:</label>
                                    </div>
                                    <div class="col-xs-3">
                                        <input class="form-control" type="text" name="txtAmount" value="<?php echo $value->amount;?>"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <label style="padding-top:6px">Nhóm hàng:</label>
                                    </div>
                                    <div class="col-xs-9">
                                       
                                        <select name="txtCat[]" class="form-control selectpicker"  data-actions-box="true" multiple title="Nhóm hàng chiết khấu">
                                            <?php 
                                            if(isset($category)&&!empty($category)){
                                            foreach ($category as $key => $v)
                                            {
                                            echo '<option style="background-color: #fff" value="'.$v->id.'">'.$v->name.'</option>';
                                            }
                                            }
 else {
                                                echo '<option>Không có Nhóm hàng</option>';
 }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <input class="form-control hbtn" type="submit" class="btn btn-default" value="Lưu">
                                    </div>
                                </div>
                           </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" data-toggle="modal" data-target="#delCat<?php echo $num; ?>"><i class="fa fa-times"></i></a>
                                <div class="modal fade" id="delCat<?php echo $num; ?>" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Thông báo</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" action="<?php echo $base_url; ?>admin/sale/drop/<?php echo $value->id; ?>">
                                                    <div class="row">
                                                        <h4 style="padding-left: 10px; margin-bottom: 10px;"><i>Bạn muốn xóa Khuyến mãi <?php echo $value->name; ?> ?</i></h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-3 col-xs-offset-6">
                                                            <input class="form-control hbtn" type="submit" class="btn btn-default" value="Xác nhận">
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <input class="form-control hbtn" class="btn btn-default" type="button" data-dismiss="modal" value="Hủy">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                        $num++;
                    endforeach;
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</section>
