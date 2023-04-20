    <?php
session_start();
require_once 'connect.php';
$question_id = $_GET['id'];
$question_upd = mysqli_query($link, "SELECT * FROM `support` WHERE `id_sup` = '$question_id'");
$question_upd = mysqli_fetch_assoc($question_upd);
$topic_id = $_GET['id_top'];
$topic_upd = mysqli_query($link, "SELECT * FROM `supporttopics` WHERE `id_topic` = '$topic_id'");
$topic_upd = mysqli_fetch_assoc($topic_upd);
$stat_id = $_GET['id_sta'];
$stat_upd = mysqli_query($link, "SELECT * FROM `status_support` WHERE `id_stat` = '$stat_id'");
$stat_upd = mysqli_fetch_assoc($stat_upd);
?>

      <section class="main-content">
      <div class="modal-body">
    
        <h3 align="center">Ответ для пользователя <?php echo $question_upd['full_name'] ?></h3>
        <br><br>
         <form action="ans_support.php" class="row g-3"  method="post">
             <input type="hidden" name="id" value="<?php echo ($question_id) ?>">
             <input type="hidden" name="id_user" value="<?php echo ($question_upd['id']) ?>">
            <!--   <input type="hidden" name="id" value="<?php echo ($topic_id) ?>"> -->
                      
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="desc_topic" class="form-control" id="desc_topic" placeholder="" value="<?php echo $topic_upd['desc_topic'] ?> " disabled readonly>
                        <label class="required" for="desc_topic">Описание темы обращения</label>  
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                         <select class="form-select" aria-label="Default select example" name="id_stat">
                            
                            <?php
        $sql_sup = $link->query("select * from `status_support`");
        foreach ($sql_sup as $sup) :
        ?>
                <option value="<?php echo $sup['id_stat']; ?>"><?php echo $sup['desc_stat']; ?></option>
          <?php endforeach;?>
           <option selected value="<?php echo $question_upd['id_stat'] ?>">Текущий статус - <?php echo $stat_upd['desc_stat'] ?></option>
 
                            </select>
                    </div>
                </div>


                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="id" class="form-control" id="id" placeholder="csa" value="<?php echo $question_upd['id'] ?>" disabled readonly>
                        <label class="required" for="id">id_Пользователя</label>
                    </div>
                </div>

                
            
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                  <textarea name="descrip" class="form-control" id="descrip" rows="3"  disabled readonly><?php echo $question_upd['descrip'] ?></textarea>
                   <label class="required" for="descrip">Описание проблемы</label>
                </div>
            </div>



                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                  <textarea name="answer" class="form-control" id="answer" rows="3" ><?php echo $question_upd['answer'] ?></textarea>
                   <label class="required" for="answer">Ответ</label>
                </div>
            </div>

                 

                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-success">Ответить</button>
                </div>
                <div class="col-md-6 offset-md-3">
              <a href="index.php?page=admin">Назад</a>
            </a>
                  

                    </form>



      </div>
    </section>