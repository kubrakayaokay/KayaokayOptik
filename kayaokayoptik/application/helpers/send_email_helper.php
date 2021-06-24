<?php

function send_mail($to = "", $subject = "", $message = ""){
    $t = &get_instance();
    $t->load->model("settings_model");
    $item = $t->settings_model->get(["id" => 1]);
    $smtpMail = json_decode($item->smtp_mail, true);
    $config = array(
        "protocol"  => "smtp",
        "smtp_host" => $smtpMail["host"],
        "smtp_port" => $smtpMail["port"],
        "smtp_user" => $smtpMail["email"],
        "smtp_pass" => $smtpMail["password"],
        "starttls"  => true,
        "charset"   => "utf-8",
        "mailtype"  => "html",
        "wordwrap"  => true,
        "newline"   => "\r\n"

    );
    $t->load->library("email", $config);
    $t->email->from($smtpMail["email"], script_settings("company_name"));
    $t->email->to($to);
    $t->email->subject($subject);
    $t->email->message($message);
    return $t->email->send();
}