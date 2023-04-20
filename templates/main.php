

    <div id="mainTextWrap">
        <div id="mainText">

            <div class="container-fluid my-carousel">
  <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/mark_fon.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/monet_fon.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/akses_fon.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

        </div>
    </div>

<section class="main-content">
      <div class="container">
        <div class="row">
           <?php
        $sql_cat = $link->query("select * from `category`");
        foreach ($sql_cat as $cat) :
        ?>
         
          <div class="col-lg-4 col-sm-6 mb-3"> 
            <div class="product-card">
              <div class="product-thumb">
                <a href="index.php?page=product_cat&id_cat=<?php echo $cat['id_category']; ?>"><img src="<?php echo $cat['img']; ?>" alt=""></a>
              </div>
              <div class="product-details">
                  <h4><a href="index.php?page=product_cat&id_cat=<?php echo $cat['id_category']; ?>"><?php echo $cat['name']; ?></a></h4>
                <div class="product-bottom-details d-flex justify-content-between">
                </div>
              </div>
            </div>
          </div>       
          <?php endforeach;?>
        </div>


 <br>
<h2>Товары со скидкой:</h2>
<br>
        <div class="row">
            <?php
             $sql_pr = $link->query("select * from `products`  WHERE `discount` <> '';");
            foreach ($sql_pr as $pr):

            ?>
            <div class="col-lg-4 col-sm-4 mb-4 mt-4">
              <div class="product-card">
                <div class="product-thumb"><a href="index.php?page=tovarCart&id=<?php echo $pr['id']?>"><img src="<?php echo $pr['imgs']; ?>" alt=""></a>
                </div>
                <div class="product-details">
                  <h4><a href="index.php?page=tovarCart&id=<?php echo $pr['id']?>"><?php echo $pr['name']; ?></a></h4>
                  <p><?php echo $pr['desc']; ?></p>
                  <div class="product-bottom-details d-flex justify-content-between">
                    <div class="product-price">
                      <small><?php echo $pr['discount']; ?> </small> <?php echo $pr['price']." руб."; ?>
                    </div>
                    <div class="product-links">

        <form id="form1" name="form1" action="add_cart.php" method="post">
          <div class="input-group quantity_goods">
          
            <input  type="hidden" step="1" min="1" max="10" id="num_count" name="quantity" value="1" title="Qty">
           
          </div>
          <input type="hidden" name="product_id" value="<?php echo $pr['id'] ?>" />
          
          <button class='add_to_cart' type="submit"  name="submit"><i class="fas fa-shopping-basket"></i></button>
        </form>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach;?>


        
          
        </div>

      </div>
    </section>