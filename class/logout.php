<?php

class Logout {

    public function user_log_out() {
        session_destroy();
        header("Location:index.php");
    }

}
