<?php


function actionButton()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // $btn_twitter = $_POST['btn_twitter'];
        // $btn_linkedin = $_POST['btn_linkedin'];
        // $btn_facebook = $_POST['btn_facebook'];
        $btn_messagenger = $_POST['btn_messagenger'];
        // $btn_instagram = $_POST['btn_instagram'];
        // $btn_telegram = $_POST['btn_telegram'];

        if (isset($btn_messagenger)) {
            header("Location: https://www.messenger.com/e2ee/t/28329299290046890");
            exit();
        }
    }
}

actionButton();

?>