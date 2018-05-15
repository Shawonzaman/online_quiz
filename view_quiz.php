<?php
if (isset($_GET['quiz_topic_id'])) {
    $quiz_topic_id = $_GET['quiz_topic_id'];
    $quiz_info = $quiz_obj->get_selected_quiz_info($quiz_topic_id);
}
if (isset($_POST['quizResultSubmit'])) {
    $quiz_obj->published_quiz_result_info($_POST);
}
?>
<form action="" method="post">
    <?php
    $y=0;
    $x=1;
    $total=0;
    while ($row = mysql_fetch_assoc($quiz_info)) {
$total++;
        $question_id = $row['question_id'];
        ?>
    
        <div class="col-sm-12">

            <div class="col-sm-12">
                <label> <?php echo $row['question_description'] ?></label>

            </div>

            <?php
            $quiz_question_option = $quiz_obj->get_selected_quiz_question_option($question_id);
            
            while ($row2 = mysql_fetch_assoc($quiz_question_option)) {
                ?>

                <div class="col-sm-12">
                    <input type="radio" name="question_answer_option<?php echo $x?>" value="<?php echo $row2['question_option_status'] ?>" style="margin-bottom: 5px"><?php echo $row2['question_option_description'] ?>
                    
                </div>

            <?php $y++; }  $x++; $y =0;?>

        </div>

    <?php } ?>
    <input type="hidden" name="total_question" value="<?php echo $total;?>">
<div class="col-sm-12 form-group "><br></div>
<div class="col-sm-4 form-group ">
    <input class="form-control" type="submit" value="Submit" name="quizResultSubmit">
</div>
</form>