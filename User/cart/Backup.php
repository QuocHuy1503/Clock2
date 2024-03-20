<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../../Admins/assets/css/base.css">
    <link rel="stylesheet" href="../../Admins/assets/css/main.css">
    <link rel="stylesheet" href="../../Admins/assets/css/grid.css">
    <link rel="stylesheet" href="../../Admins/assets/css/responsive.css">
    <link rel="stylesheet" href="../../Admins/assets/css/cart.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../../Admins/assets/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <link ref="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap"  rel="stylesheet">


</head>

<body>
<div class="app__container">
    <div class="grid wide">
        <div class="row sm-gutter app__content">
            <div class="col l-12 m-12 c-12">
                <!--<div class="home-filter hide-on-mobile-tablet">
                    <span class="home-filter__label">Sắp xếp theo</span>
                    <button class="home-filter__btn btn">Phổ biến</button>
                    <button class="home-filter__btn btn btn-primary">Mới
                        nhất</button>
                    <button class="home-filter__btn btn">Bán chạy</button>

                    <div class="select-input">
                        <span class="select-input_label">Giá</span>
                        <i class="fa-solid fa-caret-down"></i>

                        <ul class="select-input__list">
                            <li class="select-input__item">
                                <a href class="select-input__link">- Giá
                                    thấp đến cao</a>

                            </li>
                            <li class="select-input__item">
                                <a href class="select-input__link">- Giá
                                    cao đến thấp</a>

                            </li>
                        </ul>
                    </div>

                    <div class="home-filter__page">
                                    <span class="home-filter__page-num">
                                        <span class="home-filter__page-current">1</span>/14
                                    </span>
                        <div class="home-filter__page-control">
                            <a href
                               class="home-filter__page-btn home-filter__page-btn-disabled">
                                <i
                                    class="home-filter__page-icon fas fa-angle-left"></i>
                            </a>
                            <a href class="home-filter__page-btn">
                                <i
                                    class="home-filter__page-icon  fas fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
-->
                <!-- GIỎ HÀNG -->
                <nav class="cart">
                    <div class="cart-heading">
                        <h1>GIỎ HÀNG</h1>
                    </div>
                    <?php
                    $account = $_GET['id'];
                    //Xem xem có thiếu session lấy không. Tiện gắn $_Session[id] vào $ account luôn ?
                    if(isset($_SESSION['id'])){
                        $account = $_SESSION['id'];
                    }
                    include_once '../../Connects/open.php';
                    include_once '../Layout/Header.php';
                    //Query
                    $sql = "SELECT order_details.book_id, order_details.order_id, order_details.price, order_details.quantity,
		        books.image AS image, books.name AS book_name, books.description,
		        orders.receiver_name, orders.receiver_phone,orders.receiver_address
                 FROM order_details
                INNER JOIN books ON books.id = order_details.book_id
                INNER JOIN orders ON orders.id = order_details.order_id
                WHERE order_details.order_id = '$account'";
                    //Chạy query cua $sql chinh
                    $order_details = mysqli_query($connect, $sql);
                    // Chay query cua $sqlOrder de tim ai order
                    $sqlOrder = "SELECT * FROM orders where id = '$account'";
                    //Query người nhận
                    $orders = mysqli_query($connect,$sqlOrder);
                    //Đóng kết nối
                    include_once '../../Connects/close.php';
                    ?>
                    ?>
                    <div class="row sm-gutter app__content">
                        <div class="col l-9">
                            <div class="cart-left">
                                <div class="header-cart-left">
                                    <div class="cart-product">
                                        <div
                                            class="fake-checkbox active"
                                            onclick id></div>
                                        <span>Tất cả (</span>
                                        <span class="cart_counter-new"
                                              style="margin-right:2px ; margin-left:2px;">
                                                        1 </span>
                                        sản phẩm )
                                    </div>
                                    <div class="cart-price">
                                        Đơn giá
                                    </div>
                                    <div class="cart-quantity">
                                        Số lượng
                                    </div>
                                    <div class="cart-total-price">
                                        Thành tiền
                                    </div>
                                    <div class="cart-delete">
                                        <a href class="icon-trash">
                                            <i
                                                class=" loading fa-solid fa-trash-can"></i>
                                            <span
                                                class="canh-bao-het-hang">Xóa
                                                            toàn bộ giỏ hàng</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="cart-list-item">
                                    <?php
                                    foreach ($order_details as $order_detail){
                                    ?>
                                    <div class="new-cart-items-row">
                                        <div class="cart-product">
                                            <div class="fake-checkbox active"></div>
                                            <a href="" class="cart-n-p-img">
                                                <img src="../../assets/img/sanpham1.png" alt width="85px" height="85px">
                                            </a>
                                            <div class="cart-n-p-info">
                                                <a href="#" class="cart-n-p-name"></a>
                                                <span class="cart-n-p-sku">Mã SP:<b>VTT3003</b></span>
                                                <a href class="cart-n-p-buy-later">
                                                    <i class="fa-solid fa-download"></i>Lưu lại mua sau
                                                </a>
                                            </div>

                                        </div>
                                        <div class="cart-price">
                                            <input type="hidden" class="bulk-price-config" value="[]">
                                            <input type="hidden" class="buy-price" value="1750000">
                                            <span class="new-cart-items">17.500.000₫</span>
                                        </div>
                                        <div class="cart-quantity">
                                                        <span class="new-cart-quantity">
                                                            <a href class="quantity-change">
                                                                <svg enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0" class="hnc-svg-icon">
                                                                    <polygon points="4.5 4.5 3.5 4.5 0 4.5 0 5.5 3.5 5.5 4.5 5.5 10 5.5 10 4.5"></polygon>
                                                                </svg>
                                                            </a>
                                                            <input class="buy-quantity quantity-change" value="1" size="5">
                                                            <a href class="add quantity-change" data-value="1" title="them">
                                                                <svg enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0" class="hnc-svg-icon">
                                                                    <polygon points="10 4.5 5.5 4.5 5.5 0 4.5 0 4.5 4.5 0 4.5 0 5.5 4.5 5.5 4.5 10 5.5 10 5.5 5.5 10 5.5">
                                                                    </polygon>
                                                                </svg>
                                                            </a>
                                                        </span>
                                        </div>
                                        <div class="cart-total-price">
                                            <b class="total-item-price">17.500.000</b>
                                            <b style="font-size:16px ; color:#ee2724;">₫</b>
                                        </div>
                                        <div class="cart-delete">
                                            <a href class="icon-trash">
                                                <i class=" loading fa-solid fa-trash-can"></i>
                                                <span
                                                    class="canh-bao-het-hang">Xóa toàn bộ giỏ hàng</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                        }
                        ?>
                        <div class="col l-3">
                            <div class="cart-right">
                                <div class="box-cart-address">
                                    <div class="voucher">
                                        <div class="voucher-ct">
                                            <input type="text"
                                                   class="txt"
                                                   id="discount-code" name
                                                   value
                                                   placeholder="Mã giảm giá/ quà tặng">
                                            <a href
                                               class="button button-check-discount js-apply-discount-code">Áp
                                                dụng</a>
                                            <span
                                                id="js-vouvher-message"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-cart-total-price">
                                    <p>
                                        <span>Tạm tính</span>
                                        <span class="total-cart-price">17.500.000₫</span>
                                    </p>
                                    <p>
                                        <span>Giảm giá</span>
                                        <span id="price-discount">0₫</span>
                                    </p>
                                    <p>
                                        <span>Thành tiền</span>
                                        <span
                                            class="reb-b total-cart-payment">17.500.000₫</span>
                                    </p>
                                    <span class="cart-vat">(Đã bao gồm
                                                    VAT nếu có)</span>
                                </div>
                                <button class="button-buy-submit-cart"
                                        onclick>Tiến hành đặt hàng </button>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

        </div>
    </div>
</div>
</body>

</html>