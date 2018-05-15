<?php

class Quiz {

    public function add_quiz_topic($data) {
        $quiz_topic = $data['quiz_topic'];
        $sql = "INSERT INTO tbl_quiz_topic(quiz_topic_name) VALUES ('$quiz_topic')";
        if (!$sql) {
            die("mySql Error:" . mysql_errno());
        } else {
            mysql_query($sql);
            header("Location:admin_deshbord.php");
        }
    }

    public function select_all_quiz() {
        $sql = "SELECT * FROM tbl_quiz_topic";
        $query_result = mysql_query($sql);
        if ($query_result == NULL) {
            $_SESSION['message'] = '<span style="color:red;">Quiz not Available</span>';
        } else {
            return $query_result;
        }
    }

    function add_question($data) {
//        echo '<pre>';
//        print_r($data);
//        exit();
        $query = "INSERT INTO tbl_question(quiz_topic_id, question_description)VALUES('$data[quiz_topic]', '$data[question_description]')";
        mysql_query($query);
        $question_id = mysql_insert_id();
        return $question_id;
        //save_question_option($question_id, $data);
    }

    function save_question_option($question_id, $data) {
        $question_option_description = $data[question_option_description];
           //$status = $data[status];
        for ($i = 0; $i < count($question_option_description); $i++) {
            if ($i == $data['status']) {
                $question_option_status = 1;
            } else {
                $question_option_status = 0;
            }
            $query = "INSERT INTO tbl_question_option(question_id, question_option_description, question_option_status)VALUES('$question_id','$question_option_description[$i]', '$question_option_status')";
            mysql_query($query);
        }
    }

    public function get_selected_quiz_info($quiz_topic_id) {

        $sql = "SELECT * FROM `tbl_question` WHERE `quiz_topic_id` = '$quiz_topic_id'";
        if (!mysql_query($sql)) {
            echo 'Not Available' . mysql_error();
        } else {
            $result = mysql_query($sql);
            return $result;
        }
    }

    public function get_selected_quiz_question_option($question_id) {

        $sql = "SELECT * FROM `tbl_question_option` WHERE `question_id` = '$question_id'";
        if (!mysql_query($sql)) {
            echo 'Not Available' . mysql_error();
        } else {
            $result = mysql_query($sql);
            return $result;
        }
    }

    public function published_quiz_result_info($data) {
        echo '<pre>';
        print_r($data);

        $total_question = $data['total_question'];
        $i = 1;
        $mark = 0;
        for ($i = 1; $i <= $total_question; $i++) {
            $option = 'question_answer_option' . $i;
            if ($data[$option] == 1) {
               $mark++; 
            }
        }
        $correct_answer = $mark;
        $wrong_answer = $total_question - $mark;
        $_SESSION['correct_answer'] = $correct_answer;
        $_SESSION['wrong_answer'] = $wrong_answer;
        header("Location:quiz_result.php");
        
    }

}
