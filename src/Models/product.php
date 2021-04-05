<?php
require_once 'connect.php';
$conn=new ConnectDataBase('PHP_PROJECT');
    class Product {
        public $id_product;
        public $name_product;
        public $type_product;
        public $like_product;
        public $image;
        public $sale;
        public function __construct($id_product, $name_product, $type_product, $like_product, $image, $sale)	{
            $this->id_product = $id_product;
            $this->name_product = $name_product;
            $this->type_product = $type_product;
            $this->like_product = $like_product;
            $this->image = $image;
            $this->sale = $sale;
        }
    }
    class Size {
        public $id_size;
        public $name_size;
        public function __construct($name_size)	{
           
            $this->name_size = $name_size;
            
        }
    }
    class Product_Size {
        public $id_product_size;
        public $id_size;
        public $id_product;
        public $price;
        public $description;
        public $quantity;
        
    public function __construct($id_product_size, $id_size, $id_product, $price, $description, $quantity)	{
		$this->id_product = $id_product;
		$this->id_size = $id_size;
        $this->id_product = $id_product;
        $this->price = $price;
		$this->description = $description;
        $this->quantity = $quantity;
	}

    }

?>
