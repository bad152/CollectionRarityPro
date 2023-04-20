
<?php
session_start();
require_once 'connect.php';
$order_id = $_GET['id'];
$order_upd = mysqli_query($link, "SELECT * FROM `order_data` WHERE `id_order` = '$order_id'");
$order_upd = mysqli_fetch_assoc($order_upd);
?>


<section class="main-content">
    <h3 align="center">Спасибо за покупку!</h3>
    <h4 align="center">Ваш чек:</h4>
      <div class="modal-body">
         <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="id_order" class="form-control" id="id_order"  value="<?php echo $order_upd['id_order'] ?> "disabled readonly>
                        <label class="required" for="id_order">Уникальный номер заказа</label>
                    </div>
                </div>
        <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="date_order" class="form-control" id="date_order"  value="<?php echo $order_upd['date_order'] ?> "disabled readonly>
                        <label class="required" for="date_order">Дата совершения оплаты</label>
                    </div>
                </div>
        <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="name_us" class="form-control" id="name_us"  value="<?php echo $order_upd['name_card'] ?> "disabled readonly>
                        <label class="required" for="name_us">имя и фамилия держателя карты</label>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="number_car" class="form-control" id="number_car"  value="**** **** ****<?php echo $order_upd['number_card'] = mb_substr($order_upd['number_card'], 14, 80, 'UTF-8');?> "disabled readonly>
                        <label class="required" for="number_car">номер карты</label>
                    </div>
                </div>


                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="term" class="form-control" id="term"  value="<?php echo $order_upd['term_card'] ?> "disabled readonly>
                        <label class="required" for="term">срок, до которого карта действительна</label>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="summ" class="form-control" id="summ"  value="<?php echo $order_upd['price_order'].'руб.' ?> "disabled readonly>
                        <label class="required" for="summ">Сумма списания</label>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3">
              <a href="index.php?page=login">Назад</a>
            </a>
</div>
      </div>
    </section>