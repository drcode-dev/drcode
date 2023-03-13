<?php
  $name = htmlspecialchars($_POST['userName']);
  $email = htmlspecialchars($_POST['userEmail']);
  $Subject = htmlspecialchars($_POST['userSubject']);
  $message = htmlspecialchars($_POST['userMessage']);

  if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "ahmmmadha@hotmail.com"; //enter that email address where you want to receive all messages
      $subject = "From: $name <$email>";
      $body = "Name: $name\nEmail: $email\nSubject: $Subject\nMessage:\n$message\n\nRegards,\n$name";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $sender)){
         echo "success";
      }else{
         echo "error";
      }
?>
