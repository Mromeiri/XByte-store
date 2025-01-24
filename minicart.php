                                <li class="minicart-wrap">
                                    <a href="#" class="minicart-btn toolbar-btn">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span class="cart-item_count"><?php echo count($_SESSION['card']); ?></span>
                                    </a> 
                                    
                                    <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
                                    <div style="width: 100%;
  max-height: 280px;
  overflow-y: auto;">

                                      <?php $total=0; $len = count($_SESSION['card']); 
                                    for ($i=0; $i <$len ; $i++) { 
                                            $sql = "select * from item where id=:id";
                                            $stmt =$pdo->prepare($sql);
                                            $stmt->execute(["id"=>$_SESSION['card'][$i]]);
                                            while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
                                         ?>
                                   

                                        
                                        <div class="single-cart-item">
                                            <div class="cart-img">
                                                <a href="cart.php"><img src="<?php echo $row['src1']; ?>" alt=""></a>
                                            </div>
                                            <div class="cart-text">
                                                <h5 class="title"><a href="cart.php"><?php echo $row['name']; ?></a></h5>
                                                <div class="cart-text-btn">
                                                    <div class="cart-qty">
                                                        <span>1×</span>
                                                        <?php
                                        $sql = "select price from price group by valid_from having valid_from IN ( select max(valid_from) from price where product_id=:id);";
                                        $st =$pdo->prepare($sql);
                                        $st->execute(["id"=>$row['id']]);
                                    
		                                while ($ro =$st->fetch(pdo::FETCH_ASSOC)) { $price = $ro['price']; ?>
                                                        <span class="regular-price "><?php echo formatNumberWithSpaces($ro['price']); }?> DA</span>
                                            
                                                    </div>
                                                    <button type="button"><i class="ion-trash-b"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                               <?php  $total +=$price;} } ?>
                                        </div>
                                        <div class="cart-price-total d-flex justify-content-between">
                                            <h5>Sub Total :</h5>
                                            <h5><?php echo formatNumberWithSpaces($total); ?> DA</h5>
                                        </div>
                                        <div class="cart-links d-flex justify-content-between">
                                            <a class="btn product-cart button-icon flosun-button dark-btn" href="cart.php">View cart</a>
                                            <a class="btn flosun-button secondary-btn rounded-0" href="cart.php#tools">Checkout</a>
                                        </div>
                                    </div>
                                </li>