<?php
session_start();
?>



<div class="modal fade" id="modal-cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header text-white" style="background-color: #282626;">
        <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="primary" class="content-area">

        <table class="table">
          <thead>
            <td></td>
            <td>Наименование</td>
            <td>Колличество</td>
            <td>Стоимость</td>
            <td>Итого</td>
          </thead>
          <tbody>
            <?php
            $sql_m = $link->query("SELECT * FROM `products`");
            $Sum = 0;
            $add_product = $_SESSION['add_product'];

            if (isset($add_product)) {
              foreach ($add_product as $key => $value) {
                $a = $key;
                $kol =  $_SESSION['add_product'][$a];
                $good_m = [];
                foreach ($sql_m as $product_m) {
                  if ($product_m['id'] == $a) {
                    $good_m = $product_m;
                    break;
                  }
                }
            ?>
                <tr>
                  <td><img width="50px" src="<?php echo $good_m['imgs']; ?>" /></td>
                  <td><?php echo $good_m['name']; ?></td>
                  <td>
                    <?php echo $kol; ?>
                    
                  </td>


                  <td><?php echo $good_m['price'] . 'р'; ?></td>
                  <td><?php echo $kol * $good_m['price'] . 'р'; ?></td>
                  <td align="right" colspan="5"><b> <a href="del_basket.php?del=<?=$good_m['id'] ?>">Удалить</a></b></td>

                </tr>
            <?php
                $Sum += $kol * $good_m['price'];
              }
            }
            ?>
            <tr>
              <td align="right" colspan="5"><b> <?php echo 'Всего: ' . $Sum ?></b></td>

            </tr>
          </tbody>
        </table>
      </div>
      </div>
      <div class="modal-footer">
        <?php if($Sum <= 0){ ?>
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Выберите товар для оформления заказа</button>
    <?php
         
        }else{?>
            <button class="btn btn-primary" data-bs-target="#choiceMethod" data-bs-toggle="modal" data-bs-dismiss="modal">
      Оформить заказ</button>
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>

       <?php }  ?>
        
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="choiceMethod" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalToggleLabel2">Оформление заказа</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>Выберите способ получения товара</h5>
        <br>
      <b> <a href="?page=orderStore&id=<?php echo $_SESSION['user']['id']; ?>">Выдача товара в магазине</a></b>
      <br><br>
      <b> <a href="?page=orderСourier&id=<?php echo $_SESSION['user']['id']; ?>">Доставка товара курьером</a></b>
      <br><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>

<footer>
  <section class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-6">
        <h4>Информация</h4>
        <ul class="list-unstyled">
          <li><a href="index.php?page=index">Главная</a></li>
          <li><a href="index.php?page=pay_deliver">Оплата и доставка</a></li>
          
        </ul>
      </div>
      <div class="col-md-3 col-6">
        <h4>Рабочее время</h4>
        <ul class="list-unstyled">
          <li>Наш адресс - Улица Родионова 193/4</li>
          <li>Время работы:</li>
          <li>Понедельник - Пятница: 08:00 - 17:00</li>
        </ul>
      </div>
      <div class="col-md-3 col-6">
        <h4>Контакты</h4>
        <ul class="list-unstyled">
            <li>+7(999) 999-99-99</li>
            <li>+7(777) 777-77-77</li>
            <li>pochta@mail.ru</li>
           
          </a>
        </ul>
      </div>
      <div class="col-md-3 col-6">
        <h4>Соцсети</h4>
        <div class="footer-icons">
          <a href="#"><i class="fab fa-vk"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
    </div>
  </div>
  </section>
</footer>

<script src="js/bootstrap.js"></script>
</body>

</html>


