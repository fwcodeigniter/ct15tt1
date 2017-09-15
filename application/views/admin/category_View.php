
<section id="cart_items">
    <div class="container">
        <div style="display: none;" id="success"><?php echo $this->session->flashdata('success'); ?></div>
        <div style="display: none;" id="fail"><?php echo $this->session->flashdata('fail'); ?></div>
        <div class="table-responsive cart_info">
            <button style="margin-bottom: 5px" type="button" class="btn btn-default hbtn" data-toggle="modal" data-target="#addCat">Thêm Nhóm hàng</button>

            <div class="modal fade" id="addCat" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm Nhóm hàng</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" action="<?php echo $base_url; ?>/admin/category/add" method="POST">
                                <div class="row">
                                    <div class="col-xs-9">
                                        <input class="form-control" type="text" name="txtName" placeholder="Tên Nhóm hàng" pattern="+[a-zA-Z0-9]" />
                                    </div>
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
                    <tr class="cart_menu">
                        <td class="price">Mã Nhóm hàng</td>
                        <td class="description">Tên Nhóm hàng</td>
                        <td class="price"></td>
                        <td class="quantity"></td>
                        <td class="total"></td>
                        <td></td>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $num = 1;
                    foreach ($category as $key => $value):
                        ?>
                        <tr>
                            <td class="cart_price">
    <?php echo $value->id; ?>
                            </td>
                            <td class="cart_description">
    <?php echo $value->name; ?>
                            </td>
                            <td class="cart_price">

                            </td>
                            <td class="cart_quantity">

                            </td>
                            <td class="cart_edit">
                                <a class="cart_quantity_delete" data-toggle="modal" data-target="#editCat<?php echo $num; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                <div class="modal fade" id="editCat<?php echo $num; ?>" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Sửa Nhóm hàng</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" action="<?php echo $base_url; ?>/admin/category/update/<?php echo $value->id; ?>" method="POST">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                            <input class="form-control" type="text" name="txtName" value="<?php echo $value->name; ?>" pattern="+[a-zA-Z0-9]" />
                                                        </div>
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
                                                <form class="form-horizontal" action="<?php echo $base_url; ?>/admin/category/drop/<?php echo $value->id; ?>">
                                                    <div class="row">
                                                        <h4 style="padding-left: 10px; margin-bottom: 10px;"><i>Bạn muốn xóa Nhóm hàng <?php echo $value->name; ?> ?</i></h4>
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
