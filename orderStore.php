<?php
session_start();
require_once 'connect.php';
$user_id = $_GET['id'];
?>
 <section class="main-content">
  <div class="container">
    <div class="row">
      
      <div class="col-md-3 col-6">
        <h4>Рабочее время</h4>
        <ul class="list-unstyled">
          <li>Наш магазин находится по адрессу:</li>
          <b><li>Улица Родионова 193/4</li></b>
          <br>
          <li>Вы можете забрать свой товар:</li>
          <b><li>Понедельник - Пятница: 08:00 - 17:00</li></b>
        </ul>
      </div>
      <div class="col-md-3 col-6">
        <h4>Контакты</h4>
        <ul class="list-unstyled">
           <li>Если у вас возникли какие-нибудь вопросы, вы можете позвонить нам:</li>
         <b> <li><a href="tel:89527735225">+7(999) 999-99-99</a></li><b>
        </ul>
      </div>
      
   

    <h4>Ваш заказ</h4>
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
              <td align="right" colspan="5"><b> <?php echo 'Общая сумма заказа: ' . $Sum ?></b></td>
            </tr>
          </tbody>
        </table>
         <h4>Выберите карту и введите данные для оплаты</h4>
              <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1">
          Visa
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">
          МИР
        </label>
      </div>
      </div>
  </div>
      <form action="create_order.php" class="row g-3"  method="post">
        <input type="hidden" name="id" value="<?php echo ($id) ?>">
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="name_card" class="form-control" id="name_card" pattern="[a-zA-Z]{3,}\s[a-zA-Z]{3,}" required>
                        <div id="loginHelp" class="form-text">Введите имя и фамилию используя латинские буквы.</div>
                        <label class="required" for="name_card">имя и фамилия держателя карты</label>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="number_car" class="form-control" id="number_car" pattern="[0-9]{4}\s[0-9]{4}\s[0-9]{4}\s[0-9]{4}"  required >
                        <div id="loginHelp" class="form-text">Введите номер карты в формате **** **** **** ****</div>
                        <label class="required" for="number_car">номер карты</label>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="term" class="form-control" id="term"  pattern="[0-9]{2}[/][0-9]{2}" required>
                        <div id="loginHelp" class="form-text">**/** MONTH/YEAR</div>
                        <label class="required" for="term">срок, до которого карта действительна</label>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="cvv" class="form-control" id="cvv" pattern="[0-9]{3}" required>
                        <div id="loginHelp" class="form-text">Введите CVV(3 цифры)</div>
                        <label class="required" for="cvv">CVV-код</label>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="summ" class="form-control" id="summ"  value="<?php echo $Sum ?>руб."disabled readonly>
                        <label class="required" for="summ">Сумма списания</label>
                    </div>
                </div>
                <input type="hidden" name="price_order" class="form-control" id="price_order"  value="<?php echo $Sum ?>">
               
                <div class="col-md-6 offset-md-3">
                  <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Оплатить</button>
                </div>




<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasTopLabel">Подтвердить оплату</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <button type="submit" class="btn btn-primary">Да</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Отмена</button>
        <br><br>
        <b></b>
        После оплаты заказа, получить чек, а так же следить за состоянием заказа вы сможете у себя в профиле в разделе "мои заказы"

  </div>
</div>
               
          </form>

  </section>
 