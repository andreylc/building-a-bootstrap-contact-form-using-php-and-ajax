<?php
$errorMSG = "";
// NAME
if (empty($_POST["name"])) {
    $name = "не заполнено";
} else {
    $name = $_POST["name"];
}
// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "заполните поле";
} else {
    $email = $_POST["email"];
}
// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "заполните поле";
} else {
    $message = $_POST["message"];
}
$EmailTo = "a.tyapugin@demis.ru";
$Subject = "Новое сообщение с сайта ".$_SERVER['SERVER_NAME'];
// prepare email body text
$Body = "Клиент заполнил форму \"Обратная связь\" на странице 'Контакты' \n\r\r";
$Body .= "Имя: ";
$Body .= $name;
$Body .= "\n";
$Body .= "E-mail: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Сообщение: ";
$Body .= $message;
$Body .= "\n";
// send email
$success = mail($EmailTo, $Subject, $Body,"Content-Type: text/plain; charset='UTF-8'");
// redirect to success page
if ($success && $errorMSG == ""){
    echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
?>
