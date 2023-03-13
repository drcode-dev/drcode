<?php

		/* If there are no empty fields, i create new variables containing the input values
		just to keep our script simple, so we can understand what is going on. */
		$firstname =  $_POST['userName']; /* Remember that $data is an object now */
		$email =  $_POST['userEmail'];
		$message =$_POST['userMessage'];
		/* Now i will check if the incoming email's value is valid */

		/* Now since we are here in this line, our incoming data are correct
		and we are going to send the email. */
		
		
		/* SET THE EMAIL ADDRESS YOU WANT TO RECEIVE THE MESSAGES  */
		/* =============================================== */
		$to = "ahmmmadha@hotmail.com";
		/* =============================================== */

		
		/* Next we have to add a subject */
		$subject = $firstname . " has a question for you";
		/* Next we are setting some basic headers */
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		/* We have to add also a from header, because we want to know the email address from
		the user who is contacting us. */
		$headers .= 'From: '. $email . "\r\n";
		/* Next we are sending the email */
		$send = mail($to,$subject,$message, $headers);
		/* And last we check if the mail() function was successful*/
		if(!$send){
			echo "error";
		}else{
			echo "success";
		}
	}








