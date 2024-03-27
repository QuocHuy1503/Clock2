<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách nhân viên | Quản trị Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

</head>

<body onload="time()" class="app sidebar-mini rtl">
<!-- Navbar-->
<?php
include_once '../layout/header-navbar.php';
include_once '../../../connect/open.php';
$sql = "SELECT * FROM user";
$users = mysqli_query($connect,$sql);
include_once '../../../connect/close.php';
?>
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách nhân viên</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">

                    <div class="row element-button">
                        <div class="col-sm-2">

                            <a class="btn btn-add btn-sm" href="form-add-khach-hang.php" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mới khách hàng</a>
                        </div>
            
                    </div>
                    <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
                           id="sampleTable">
                        <thead>
                        <tr>
                            <th width="10"><input type="checkbox" id="all"></th>
                            <th>ID khách hàng</th>
                            <th width="150">Họ và tên</th>
                            <th width="20">Số điện thoại</th>
                            <th width="300">Địa chỉ</th>
                            <th>Mật khẩu</th>
                            <th>Email</th>
                            <th>Tình trạng tài khoản</th>
                            <th width="100">Tính năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($users as $user){
                        ?>
                        <tr>
                            <td width="10"><input type="checkbox" name="check1" value="1"></td>
                            <td><?= $user['user_id']?></td>
                            <td><?= $user['user_name']?></td>
                            <td><?= $user['phone']?></td>
                            <td><?= $user['address']?> </td>
                            <td><?= $user['password']?></td>
                            <td><?= $user['email']?>  </td>
                            <td><?php if( $user['status'] == 0){ echo 'Offline';} elseif ($user['status'] == 1){ echo 'Online';} else{ echo 'Locked';}?></td>
                            <td>Bán hàng</td>
                            <td class="table-td-center">
                                <a href="destroy.php?id=<?=$user['user_id']?>" 
                                class="btn btn-primary btn-sm trash">
                                <i class="fas fa-trash-alt"></i>
                                </a>
                                <a href="form-edit-khach-hang.php?user_id=<?=$user['user_id']?>" class="btn btn-primary btn-sm edit" title="Sửa"><i class="fas fa-edit"></i>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<!--
MODAL
-->
<div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
     data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Chỉnh sửa thông tin nhân viên cơ bản</h5>
              </span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="control-label">ID nhân viên</label>
                        <input class="form-control" type="text" required value="#CD2187" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Họ và tên</label>
                        <input class="form-control" type="text" required value="Võ Trường">
                    </div>
                    <div class="form-group  col-md-6">
                        <label class="control-label">Số điện thoại</label>
                        <input class="form-control" type="number" required value="09267312388">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Địa chỉ email</label>
                        <input class="form-control" type="text" required value="truong.vd2000@gmail.com">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Ngày sinh</label>
                        <input class="form-control" type="date" value="15/03/2000">
                    </div>
                    <div class="form-group  col-md-6">
                        <label for="exampleSelect1" class="control-label">Chức vụ</label>
                        <select class="form-control" id="exampleSelect1">
                            <option>Bán hàng</option>
                            <option>Tư vấn</option>
                            <option>Dịch vụ</option>
                            <option>Thu Ngân</option>
                            <option>Quản kho</option>
                            <option>Bảo trì</option>
                            <option>Kiểm hàng</option>
                            <option>Bảo vệ</option>
                            <option>Tạp vụ</option>
                        </select>
                    </div>
                </div>
                <BR>
                <a href="#" style="    float: right;
        font-weight: 600;
        color: #ea0000;">Chỉnh sửa nâng cao</a>
                <BR>
                <BR>
                <button class="btn btn-save" type="button">Lưu lại</button>
                <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
                <BR>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!--
MODAL
-->

<!-- Essential javascripts for application to work-->
 <script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="src/jquery.table2excel.js"></script>
<script src="../js/main.js"></script> 
<!-- The javascript plugin to display page loading on top-->
 <script src="../js/plugins/pace.min.js"></script> 
<!-- Page specific javascripts-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script> 
<!-- Data table plugin-->
 <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<script>
    function deleteRow(r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("myTable").deleteRow(i);
    }
    jQuery(function () {
        jQuery(".trash").click(function () {
            swal({
                title: "Cảnh báo",

                text: "Bạn có chắc chắn là muốn xóa nhân viên này?",
                buttons: ["Hủy bỏ", "Đồng ý"],
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Đã xóa thành công.!", {

                        });
                    }
                });
        });
    });
    oTable = $('#sampleTable').dataTable();
    $('#all').click(function (e) {
        $('#sampleTable tbody :checkbox').prop('checked', $(this).is(':checked'));
        e.stopImmediatePropagation();
    }); 
</script>
</body>

</html>