    <?php
session_start();
require_once 'connect.php';
$question_id = $_GET['id'];
$question_upd = mysqli_query($link, "SELECT * FROM `support` WHERE `id_sup` = '$question_id'");
$question_upd = mysqli_fetch_assoc($question_upd);
$topic_id = $_GET['id_top'];
$topic_upd = mysqli_query($link, "SELECT * FROM `supporttopics` WHERE `id_topic` = '$topic_id'");
$topic_upd = mysqli_fetch_assoc($topic_upd);
?>

      <section class="main-content">
      <div class="modal-body">
    
        <h3 align="center">Ответ на обращение </h3>
        <br><br>
         <form action="ans_support_user.php" class="row g-3"  method="post">
             <input type="hidden" name="id" value="<?php echo ($question_id) ?>">
             <input type="hidden" name="id" value="<?php echo ($topic_id) ?>">
                      
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="desc_topic" class="form-control" id="desc_topic" placeholder="" value="<?php echo $topic_upd['desc_topic'] ?> " disabled readonly>
                        <label class="required" for="desc_topic">Описание темы обращения</label>  
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
                  <textarea name="answer" class="form-control" id="answer" rows="3" disabled readonly><?php echo $question_upd['answer'] ?></textarea>
                   <label class="required" for="answer">Ответ</label>
                </div>
            </div>

                 <div class="col-md-6 offset-md-3">
              <a href="index.php?page=login">Назад</a>
            </a>
</div>
               
                  

                    </form>



      </div>
    </section>