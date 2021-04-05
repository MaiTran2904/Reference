<!DOCTYPE html>
<html lang="en">
<?php 
  require_once '../../Models/connect.php';
  require_once '../../Controller/Admin/funtions_admin.php';
  $GLOBALS['connect']  = new ConnectDataBase();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Management</title>
    <link rel="stylesheet" href="css/user-product-manage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body style="background-image: url('image/b-g.jpg'); background-repeat: no-repeat;">

    <div class="header">
        <h1 style="text-align: center; color: rgb(224, 73, 99); text-align: center;">Account Management </h1>
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
    <button class="btn btn-primary" > <a href="admin.php">Home</a></button>

    </div>
    <?php 
    // Xử Lí button list manage
        // if(isset($_POST['reload'])){

        //    header("location:http://localhost/Tuan_Branch/PHP_Project_MVC/src/Views/Admin/user_manage_view.php");
        // }
    
    ?>


    <div class="content">
        <table class="table table-striped show_user">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login Name</th>
                    <th>Full Name</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Balance</th>
                    
                    <th>Delete <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                        </svg></th>
                    <th>Update <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                            <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                        </svg></th>
                </tr>
            </thead>

            <tbody>
                <?php

               
                //Lấy số lượng danh Sách 
                $query = "select count(id_user) as total from USERS";
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
                $result = $GLOBALS['connect']->query("SELECT * FROM USERS LIMIT $start, $limit");

                if (isset($_POST['btn_search'])) {

                    if ($_POST['search'] == '') {
                        echo "<script>document.getElementById('error_search').innerHTML='Please fill here to search!'</script>";
                    } else {
                        $key = $_POST['search'];
                        $result = searchUserName($key);
                        if(mysqli_num_rows($result)==0){
                            echo "<script>document.getElementById('error_search').innerHTML='No results found!'</script>";
                            $total_records = mysqli_num_rows($result);
                            $total_page = ceil($total_records / $limit);
                        }else{
                            $total_records = mysqli_num_rows($result);
                            $total_page = ceil($total_records / $limit);
                        }
                 
                    }
                }
                while ($users = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php $id_user = $users['id_user'];
                            echo $users['id_user'] ?></td>
                        <td><strong><?php echo $users['user_name'] ?></strong></td>
                        <td><?php
                           echo $users['full_name'] 
                          ?></td>
                        <td><?php echo $users['passwords']  ?></td>
                        <td><?php echo $users['email']  ?></td>
                        <td><?php echo $users['phone']  ?></td>
                        <td><?php echo $users['address']  ?></td>
                        <td><?php echo $users['balance']  ?></td>
                       
                        

                        <td><?php 
                            if($users['id_user']==1){
                                echo "<strong style='color: #f7544a;'>Deletion is not allowed!</strong>";
                            }else{
                           ?><div class="form_group">
                                    <button name="btn_delete" class="btn_delete" id="delete_user"
                                    data-toggle="modal" data-target="#deleteUser"> 
                                    <?php
                             echo '<a  href="user_manage_view.php?id_user=' . $id_user . '">Delete</a>  ';
                                 
                                    ?>
                                </div>  
                               
                           
                          <?php  } 
                    ?></td>
                        <td>
                            <div class="form_group">
                                <button name="btn_update" class="btn_update"> Update</button>
                            </div>
                        </td>
                    </tr>
                <?php
                }

                ?>
            </tbody>

        </table>
        <?php
        // Thao Tác Với Dữ Liệu
                //delete
                if(isset($_POST['accept_delete'])){
                    deleteUser($_GET['id_user']);
                    header("Refresh: 2;"); 
                }

        ?>
        <!-- Phân trang -->
        <div class="pagination">
            <?php
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG

            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1) {
                echo '  <a class="click-page" href="user_manage_view.php?page=' . ($current_page - 1) . '"> < Prev </a> ';
            }

            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++) {
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page) {
                    echo '<span class="current-page" >' . $i . '</span> ';
                } else {
                    echo '<a class="click-page"  href="user_manage_view.php?page=' . $i . '">' . $i . '</a>  ';
                }
            }

            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1) {
                echo '<a class="click-page"  href="user_manage_view.php?page=' . ($current_page + 1) . '">Next ></a>  ';
            }
            ?>
        </div>
    </div>





<!-- Modal -->
   <!-- Modal Delete User -->
<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you really want to delete this user?
      </div>
      <div class="modal-footer" >
          <form action="" method="post">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="button" class="btn btn-primary" name="accept_delete">Yes</button>
          </form>
        
      </div>
    </div>
  </div>
</div>
    <!-- Modal Update User -->
   

 
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>