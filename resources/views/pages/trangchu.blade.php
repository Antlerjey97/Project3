@extends('layout.index')

@section('content')
    <!-- start productNew -->
    <div class="productNew">
        <div class="container">
            <div class="row">
                <div class="title">
                    Sản phẩm mới
                </div>
            </div>
            <div class="row">
                <div class="products">
                    <?php foreach ($new as  $val): ?>

                    <?php foreach ($val as $value):

                    $value = (array)$value;
                    ?>


                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="product">
                            <a href="pages/singleProduct/<?php echo $value['id_category'] ?>/<?php echo $value['id'] ?>"><img
                                    width="100%" src="uploads/product/<?php echo $value['image'] ?>" alt="Lỗi"></a>
                            <a href="pages/singleProduct/<?php echo $value['id_category'] ?>/<?php echo $value['id'] ?>">
                                <div class="name"><?php echo $value['name'] ?></div>
                            </a>
                            <? php if($value['price_sales']){ ?>
                            <div class="prices">
                                <div class="span-group">
                                    <span class="price"><?php echo number_format($value['price_origin'], 0, ".",
                                            "."); ?> ₫</span>
                                    <span class="priceSale"><?php  echo number_format($value['price_sales'], 0, ".",
                                            "."); ?> ₫</span>
                                </div>
                            </div>
                            <? php
                            }else{
                            ?>
                            <div class="price"><?php echo number_format($value['price_origin'], 0, ".", "."); ?> ₫</div>
                            <? php } ?>

                            <div class="note"><?php  echo $value['promotion'] ?></div>
                            <div class="addToCart">
                                <button class="btn btn-danger" value="<?php echo $value['id'] ?>">Thêm vào giỏ hàng
                                </button>
                            </div>
                            <div class="new"><img src="/uploads/ImageBanner/New.png" alt=""></div>
                        </div>
                    </div> <!-- end 1sp -->
                    <?php endforeach ?>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div> <!-- end ProductNew -->
    <!-- start phone -->
    <div class="phone">
        <div class="container">
            <div class="row">
                <div class="title">
                    <?php echo $header[0]['name'] ?>
                </div>
            </div>
            <div class="row">
                <div class="products">
                    <?php $i = 0; ?>
                    <?php foreach ($phone as  $val): ?>

                    <?php foreach ($val as $value):

                    $value = (array)$value;?>
                    <?php if ($i == 4) break; ?>


                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="product">
                            <a href="pages/singleProduct/<?php echo $value['id_category'] ?>/<?php echo $value['id'] ?>"><img
                                    width="100%"
                                    src="uploads/product/<?php echo $value['image'] ?>"
                                    alt="Lỗi"></a>
                            <a href="pages/singleProduct/<?php echo $value['id_category'] ?>/<?php echo $value['id'] ?>">
                                <div class="name"><?php echo $value['name'] ?></div>
                            </a>
                            <?php if($value['price_sales']){ ?>
                            <div class="prices">
                                <div class="span-group">
                                    <span class="price"><?php echo number_format($value['price_origin'], 0, ".",
                                            "."); ?> ₫</span>
                                    <span class="priceSale"><?php echo number_format($value['price_sales'], 0, ".",
                                            "."); ?> ₫</span>
                                </div>
                            </div>
                            <?php }else{ ?>
                            <div class="price"><?php echo number_format($value['price_origin'], 0, ".", "."); ?> ₫</div>
                            <?php  } ?>
                            <div class="note"><?php echo $value['promotion'] ?></div>
                            <div class="addToCart">
                                <button class="btn btn-danger" value="<?php echo $value['id'] ?>">Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </div> <!-- end 1sp -->
                    <?php $i++; ?>
                    <?php endforeach ?>


                    <?php endforeach ?>
                </div>
            </div>
            <div class="row">
                <div class="viewMore">
                    <a class="btn btn-danger" href="pages/showproduct/<?php echo $header[0]['id'] ?>">Xem
                        thêm <?php echo $header[0]['name'] ?></a>
                </div>
            </div>
        </div>
    </div> <!-- end phone -->
    <!-- start tablet -->
    <div class="tablet">
        <div class="container">
            <div class="row">
                <div class="title">
                    <?php echo $header[1]['name'] ?>
                </div>
            </div>
            <div class="row">
                <div class="products">
                    <?php $i = 0; ?>
                    <?php foreach ($tablet as $key => $value): ?>
                    <?php if ($i == 4) break; ?>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="product">
                            <a href="pages/singleProduct/<?php echo $value['id_category'] ?>/<?php echo $value['id'] ?>"><img
                                    width="100%" src="uploads/product/<?php echo $value['image'] ?>" alt="Lỗi"></a>
                            <a href="pages/singleProduct/<?php echo $value['id_category'] ?>/<?php echo $value['id'] ?>">
                                <div class="name"><?php echo $value['name'] ?></div>
                            </a>
                            <?php if($value['price_sales']){ ?>
                            <div class="prices">
                                <div class="span-group">
                                    <span class="price"><?php echo number_format($value['price_origin'], 0, ".",
                                            "."); ?> ₫</span>
                                    <span class="priceSale"><?php echo number_format($value['price_sales'], 0, ".",
                                            "."); ?> ₫</span>
                                </div>
                            </div>
                            <?php }else{ ?>
                            <div class="price"><?php echo number_format($value['price_origin'], 0, ".", "."); ?> ₫</div>
                            <?php } ?>
                            <div class="note"><?php  //echo $value['promotion'] ?></div>
                            <div class="addToCart">
                                <button class="btn btn-danger" value="<?php echo $value['id'] ?>">Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </div> <!-- end 1sp -->
                    <?php $i++; ?>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="row">
                <div class="viewMore">
                    <a class="btn btn-danger" href="pages/showproduct/<?php echo $header[1]['id'] ?>">Xem
                        thêm <?php echo $header[1]['name'] ?></a>
                </div>
            </div>
        </div>
    </div> <!-- end tablet -->
    <!-- start laptop -->
    <div class="laptop">
        <div class="container">
            <div class="row">
                <div class="title">
                    <?php echo $header[2]['name'] ?>
                </div>
            </div>
            <div class="row">
                <div class="products">
                    <?php $i = 0; ?>
                    <?php foreach ($laptop as $key => $value): ?>
                    <?php if ($i == 4) break; ?>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="product">
                            <a href="pages/singleProduct/<?php echo $value['id_category'] ?>/<?php echo $value['id'] ?>"><img
                                    width="100%" src="uploads/product/<?php echo $value['image'] ?>" alt="Lỗi"></a>
                            <a href="pages/singleProduct/<?php echo $value['id_category'] ?>/<?php echo $value['id'] ?>">
                                <div class="name"><?php echo $value['name'] ?></div>
                            </a>
                            <?php if($value['price_sales']){ ?>
                            <div class="prices">
                                <div class="span-group">
                                    <span class="price"><?php echo number_format($value['price_origin'], 0, ".",
                                            "."); ?> ₫</span>
                                    <span class="priceSale"><?php echo number_format($value['price_sales'], 0, ".",
                                            "."); ?> ₫</span>
                                </div>
                            </div>
                            <?php }else{ ?>
                            <div class="price"><?php echo number_format($value['price_origin'], 0, ".", "."); ?> ₫</div>
                            <?php } ?>
                            <div class="note"><?php //echo $value['promotion'] ?></div>
                            <div class="addToCart">
                                <button class="btn btn-danger" value="<?php //echo $value['id'] ?>">Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </div> <!-- end 1sp -->
                    <?php $i++; ?>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="row">
                <div class="viewMore">
                    <a class="btn btn-danger" href="pages/showproduct/<?php echo $header[2]['id'] ?>">Xem
                        thêm <?php echo $header[2]['name'] ?></a>
                </div>
            </div>
        </div>
    </div> <!-- end laptop -->
    <!-- start phụ kiện -->
    <div class="accessories">
        <div class="container">
            <div class="row">
                <div class="title">
                    <?php echo $header[3]['name'] ?>
                </div>
            </div>
            <div class="row">
                <div class="products">
                    <?php $i = 0; ?>
                    <?php foreach ($phukien as $key => $value): ?>
                    <?php if ($i == 4) break; ?>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="product">
                            <a href="pages/singleProduct/<?php echo $value['id_category'] ?>/<?php echo $value['id'] ?>"><img
                                    width="100%" src="uploads/product/<?php echo $value['image'] ?>" alt="Lỗi"></a>
                            <a href="pages/singleProduct/<?php echo $value['id_category'] ?>/<?php echo $value['id'] ?>">
                                <div class="name"><?php echo $value['name'] ?></div>
                            </a>
                            <?php if($value['price_sales']){ ?>
                            <div class="prices">
                                <div class="span-group">
                                    <span class="price"><?php echo number_format($value['price_origin'], 0, ".",
                                            "."); ?> ₫</span>
                                    <span class="priceSale"><?php echo number_format($value['price_sales'], 0, ".",
                                            "."); ?> ₫</span>
                                </div>
                            </div>
                            <?php }else{ ?>
                            <div class="price"><?php echo number_format($value['price_origin'], 0, ".", "."); ?> ₫</div>
                            <?php } ?>
                            <div class="note"><?php //echo $value['promotion'] ?></div>
                            <div class="addToCart">
                                <button class="btn btn-danger" value="<?php echo $value['id'] ?>">Thêm vào giỏ hàng
                                </button>

                            </div>
                        </div>
                    </div> <!-- end 1sp -->
                    <?php $i++; ?>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="row">
                <div class="viewMore">
                    <a class="btn btn-danger" href="pages/showproduct/<?php echo $header[3]['id'] ?>">Xem
                        thêm <?php echo $header[3]['name'] ?></a>
                </div>
            </div>
        </div>
    </div> <!-- end phone -->

@endsection
