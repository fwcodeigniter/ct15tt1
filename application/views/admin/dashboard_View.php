
<section id="cart_items">
    <div class="container">
        <div style="display: none;" id="success"><?php echo $this->session->flashdata('success'); ?></div>
        <div style="display: none;" id="fail"><?php echo $this->session->flashdata('fail'); ?></div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="price">Mã Góp ý</td>
                        <td class="description">Họ tên</td>
                        <td class="price">Email</td>
                        <td class="quantity">Tiêu đề</td>
                        <td class="total">Nội dung</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $num = 1;
                    foreach ($contact as $key => $value):
                        ?>
                        <tr>
                            <td class="cart_price">
    <?php echo $value->id; ?>
                            </td>
                            <td class="cart_description">
    <?php echo $value->name; ?>
                            </td>
                            <td class="cart_price">
<?php echo $value->email; ?>
                            </td>
                            <td class="cart_quantity">
<?php echo $value->subject; ?>
                            </td>
                            <td class="cart_quantity">
<?php echo $value->content; ?>
                            </td>
                            <td class="cart_edit">
                                <?php 
                                	if ($value->status == 1) {
                                		echo '<a href="'.$base_url.'admin/dashboard/update/'.$value->id.'">Đã xem</a>';
                                	}
                                	else
                                	{
                                		echo '<p style="color:gray">Đã xem</p>';
                                	}
                                 ?>
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
                                                <form class="form-horizontal" action="<?php echo $base_url; ?>admin/dashboard/drop/<?php echo $value->id; ?>">
                                                    <div class="row">
                                                        <h4 style="padding-left: 10px; margin-bottom: 10px;"><i>Bạn muốn xóa Góp ý <?php echo $value->name; ?> ?</i></h4>
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
