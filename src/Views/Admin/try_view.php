<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="css/user-product-manage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>

<body style="background-image: url('image/b-g.jpg'); background-repeat: no-repeat;">

    <div class="header">
        <h1 style="text-align: center; color: rgb(224, 73, 99); text-align: center;">Product Management </h1>
    </div>

    <div class="form-search">
        <nav class="navbar navbar-light ">
            <form class="form-inline" method="POST">
                <input class="form-control mr-sm-2" type="text" placeholder="Enter product's name..." aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btn_search">Search</button>

            </form>

        </nav>
        <p class="message" id="error_search"></p>

    </div>
    <div class="list-manage">
        <div class="form-create">

            <button class="btn-home"> <a href="admin.php"> <i class="fas fa-home"></i> Home</a></button>

            <button class="btn btn-primary" data-toggle="modal" data-target="#create-modal"> Create</button>

        </div>
    </div>
    <!-- Modal -->


    <div class="content">
        <!-- Button trigger modal -->
        <div class="table table-striped show_user">
            <!-- <thead>
                <tr>
                    <th>ID</th>
                    <th>Name's Product</th>
                    <th>Type</th>
                    <th>Image 1</th>
                    <th>Image 2</th>
                    <th>Image 3</th>
                    <th>Sale</th>
                    <th>Like</th>
                    <th>Detail</th>
                    <th>Delete <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                        </svg></th>
                    <th>Update <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                            <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                        </svg></th>
                </tr>
            </thead> -->

            <tbody>
                <?php

                require_once '../../Models/connect.php';
                require_once '../../Controller/Admin/funtions_admin.php';
                $GLOBALS['connect']  = new ConnectDataBase();
                //Lấy số lượng danh Sách 
                $query = "select count(id_product) as total from product";
                $result =  $GLOBALS['connect']->query($query);
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];


                // TÌM LIMIT VÀ CURRENT_PAGE
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 10;

                // TÍNH TOÁN TOTAL_PAGE VÀ START
                // tổng số trang
                $total_page = ceil($total_records / $limit);

                // Giới hạn current_page trong khoảng 1 đến total_page
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } else if ($current_page < 1) {
                    $current_page = 1;
                }

                // Tìm Start
                $start = ($current_page - 1) * $limit;

                // TRUY VẤN LẤY DANH SÁCH 
                // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
                $result = $GLOBALS['connect']->query("SELECT * FROM PRODUCT LIMIT $start, $limit");

                if (isset($_POST['btn_search'])) {

                    if ($_POST['search'] == '') {
                        echo "<script>document.getElementById('error_search').innerHTML='Please fill here to search!'</script>";
                    } else {
                        $key = $_POST['search'];
                        $result = SearchListProduct($key);
                        if (mysqli_num_rows($result) == 0) {
                            $total_records = mysqli_num_rows($result);
                            $total_page = ceil($total_records / $limit);
                            echo "<script>document.getElementById('error_search').innerHTML='No results found!'</script>";
                        } else {
                            $total_records = mysqli_num_rows($result);
                            $total_page = ceil($total_records / $limit);
                        }
                    }
                }
                while ($product = mysqli_fetch_array($result)) {
                ?>
                    
                        <?php 
                        $key = $_POST['search'];
                        $result = SearchListProduct($key);
                        // $id_pr = $product['id_product'];
                        $item = "<div class='container-fluid'><div id='products' class='row list-group'>";
                        foreach ($arr as $key => $row) {
                            $item = "<div class='container-fluid'><div id='products' class='row list-group'>";
                            foreach ($arr as $key => $row) {
                                $show = (string) "<div  id='item' class='item  col-xs-3 col-lg-3'>
                                        <div class='thumbnail'> <img id='img' class='group list-group-image' src='{$row['image1']}' width='300'>
                                        <div class='caption'> 
                                            <div class='row56' id='bottom1'>
                                                <h4 class='group inner list-group-item-heading' style='text-align:center'>{$row['name_product']}</h4>
                                                <p class='group inner list-group-item-text' style='color:pink; text-align:center;font-size:22px'> {$row['price']}đ</p>
                                                </div>
                                                <div class='row' id='bottom'>
                                                    <div class='col-xs-12 col-md-6'>
                                                        <p class='lead' style='text-align: center'> {$row['like_product']}<i class='fa fa-heart' style='color:pink'></i></p>
                                                    </div>                                                         
                                                    <div class='col-xs-12 col-md-6'> <a class='btn btn-success'
                                                        href='edit.php?ma_id={$row['id_product']}' style='background:pink; border: 2px solid pink'>Xem chi tiết</a>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
        
                                $item .= $show;
                            }
                            $item .= "</div></div>";
                            echo $item;
                            // echo $product['id_product'] 
                        }
                        ?>
                   
                <?php
                }

                ?>
            </tbody>

        </div>
        <!-- Phân trang -->
        <div class="pagination">
            <?php
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG

            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1) {
                echo '  <a class="click-page" href="product_manage_view.php?page=' . ($current_page - 1) . '"> < Prev </a> ';
            }

            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++) {
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page) {
                    echo '<span class="current-page" >' . $i . '</span> ';
                } else {
                    echo '<a class="click-page"  href="product_manage_view.php?page=' . $i . '">' . $i . '</a>  ';
                }
            }

            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1) {
                echo '<a class="click-page"  href="product_manage_view.php?page=' . ($current_page + 1) . '">Next ></a>  ';
            }
            ?>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- </body> -->
</body>

</html> 