<?php
require_once 'connect.php';
$conn=new ConnectDataBase('PHP_PROJECT');

class Cart {
   
  //không cần id cart vì trên database tự tăng
    protected $id_user;
    protected $id_product;
    protected  $quantity;
    protected  $oldTotal;
    protected  $transFee;
    protected  $total;
      
  //  public $time;
    public function __construct($id_user, $id_product, $quantity){
        $this->id_user = $id_user;
        $this->id_product = $id_product;
        $this->quantity = $quantity;
        $getPrice="select price from PRODUCT_SIZE where $id_product=id_product_size";
        $price=$GLOBALS['conn']->PerformQuery($getPrice);
        $getSale="select sale from PRODUCT where $id_product=id_product";
        $sale=$GLOBALS['conn']->PerformQuery($getSale);
        
        $this->OldTotal=$price*$this->quantity;//Giá cũ chưa áp dụng giảm giá;
        $this->transFee= $this->OldTotal*0.05;//Phí vận chuyển = 5% đơn hàng
        $this->total=($price*$sale)/100*$this->quantity+$this->transFee;//Tổng tiền sau khuyễn mãi và phí vận chuyển
        
        //Đẩy giữ liệu đơn hàng lên database
        $query="INSERT into CARTS(id_user, id_product_size, quantity, total,time_deal)
         values ($id_user, $id_product,$quantity,$this->total)";
    }
 
}

?>