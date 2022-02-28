<?php
require("./connexionBD.php");

/**
 * Lis les réservations
 */
function readReservation(){
    CoToBase();
    static $ps = null;
    $sql = 'SELECT * FROM reservation ;';
    if ($ps == null) {
      $ps = CoToBase()->prepare($sql);
    }
    try {
      $ps->execute();
      if($ps->rowCount() == 0){
        echo "pas de casquette";
      }else{
        $casquettes = $ps->fetchAll();
        $echo='';
        foreach ($casquettes as $casquette) {
            $var = $casquette['id_cap'];
            $echo .='<!-- product -->';
            $echo .='<div class="col-md-4 col-xs-6">';
            $echo .='<div class="product">';
            $echo .='<div class="product-img">';
            $echo .='<img src="./img/casquette.jpg" alt="">';
            $echo .='<div class="product-label">';
            $echo .='</div>';
            $echo .='</div>';
            $echo .='<div class="product-body">';
            $echo .='<p class="product-category">'.$casquette['brandName'].'</p>';
            $echo .='<h3 class="product-name"><a id="a-send" href="product.php?var='.$var.'">'.$casquette['modelName'].'</a></h3>';
            $echo .='<h4 class="product-price">'.$casquette['price'].'</h4>';
            $echo .='<div class="product-rating">';
            $echo .='<i class="fa fa-star"></i>';
            $echo .='<i class="fa fa-star"></i>';
            $echo .='<i class="fa fa-star"></i>';
            $echo .='<i class="fa fa-star"></i>';
            $echo .='<i class="fa fa-star"></i>';
            $echo .='</div>';
            $echo .='<div class="product-btns">';
            $echo .='<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>';
            $echo .='</div>';
            $echo .='</div>';
            $echo .='<div class="add-to-cart">';
            $echo .='<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>';
            $echo .='</div>';
            $echo .='</div>';
            $echo .='</div>';
            $echo .='<!-- /product -->';
        
        }
      }
      
      return $echo;
      
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  
}

?>