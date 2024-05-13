<?php
    

                        // var_dump($_GET);
                        
                        if (isset($_POST['termSearch']) && !empty($_POST['termSearch'])) {
                            $termSearch = $_POST['termSearch'];
                            $product = [];
                            $file = "../db/products.csv";
                            $ressource = fopen($file,'r');
                            if(!empty($ressource)){
                                while($line = fgetcsv($ressource,null,',')){
                                    var_dump($line);
                                    if (stripos($line[2], $termSearch, 1) !== false) {
                                        $product[] = $line;
                                    }
                                }
                            }
                        }
                        // var_dump($product);
                        if(!empty($product) && !empty($termSearch)){
                            foreach($product as $prod){
                               echo  '
                                <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="../'.$prod[1].'">
                                    <ul class="product__hover">
                                        <!-- <li><a href="#"><img src="../img/icon/heart.png" alt=""></a></li>
                                        <li><a href="#"><img src="../img/icon/compare.png" alt=""> <span>Compare</span></a>
                                        </li> -->
                                        <li><a href="shop-details.php?id='.$prod[0].'"><img
                                                    src="../img/icon/search.png" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>'.$prod[2].'</h6>
                                    <!-- <a href="#" class="add-cart">+ Add To Cart</a> -->
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>$'.$prod[7].'</h5>
                                    <div class="product__color__select">
                                        <label for="pc-4">
                                            <input type="radio" id="pc-4">
                                        </label>
                                        <label class="active black" for="pc-5">
                                            <input type="radio" id="pc-5">
                                        </label>
                                        <label class="grey" for="pc-6">
                                            <input type="radio" id="pc-6">
                                        </label>
                                    </div>
                                </div>
                            </div>
                                ';
                            }
                        }
                        else{
                            echo "Aucun produit n'a été trouvé";
                        }
                        ?>




<?php if(isset($products)): ?>
                        <?php fgetcsv($products, null, ','); ?>
                        <?php while($line = fgetcsv($products,null,",")): ?>       
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="../<?= $line[1] ?>">
                                    <ul class="product__hover">
                                        <!-- <li><a href="#"><img src="../img/icon/heart.png" alt=""></a></li>
                                        <li><a href="#"><img src="../img/icon/compare.png" alt=""> <span>Compare</span></a>
                                        </li> -->
                                        <li><a href="shop-details.php?id=<?= $line[0] ?>"><img
                                                    src="../img/icon/search.png" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><?= $line[2] ?></h6>
                                    <!-- <a href="#" class="add-cart">+ Add To Cart</a> -->
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>$<?= $line[7] ?></h5>
                                    <div class="product__color__select">
                                        <label for="pc-4">
                                            <input type="radio" id="pc-4">
                                        </label>
                                        <label class="active black" for="pc-5">
                                            <input type="radio" id="pc-5">
                                        </label>
                                        <label class="grey" for="pc-6">
                                            <input type="radio" id="pc-6">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        <?php fclose($products); ?>