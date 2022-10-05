<?php
    if($_POST) {
        $name = "";
        $email = "";
        $message = "";
        $email_body = "<div>";
          
        if(isset($_POST['name'])) {
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $email_body .= "<div>
                               <label><b>Name:</b></label>&nbsp;<span>".$_name."</span>
                            </div>";
        } 
          
        if(isset($_POST['message'])) {
            $message = htmlspecialchars($_POST['message']);
            $email_body .= "<div>
                               <label><b>Message:</b></label>
                               <div>".$message."</div>
                            </div>";
        }
          
        $email_body .= "</div>";
     
        $headers  = 'MIME-Version: 1.0' . "\r\n"
        .'Content-type: text/html; charset=utf-8' . "\r\n"
        .'From: ' . $visitor_email . "\r\n";
          
        if(mail($recipient, $email_title, $email_body, $headers)) {
            echo "<p>Thank you for contacting us, $name. You will get a reply within 24 hours.</p>";
        } else {
            echo '<p>We are sorry but the email did not go through.</p>';
        }
          
    } else {
        echo '<p>Something went wrong</p>';
    }

//$email_to = "dizonjerlin@gmail.com"; 
// $email_from = "jamescarl_93@yahoo.com"; // must be different than $email_from 
// $email_subject = "Contact Form submitted";

// if(isset($_POST['email']))
// {

//     function return_error($error)
//     {
//         echo json_encode(array('success'=>0, 'message'=>$error));
//         die();
//     }

//     // check for empty required fields
//     if (!isset($_POST['name']) ||
//         !isset($_POST['email']) ||
//         !isset($_POST['message']))
//     {
//         return_error('Please fill in all required fields.');
//     }

//     // form field values
//     $name = $_POST['name']; // required
//     $email = $_POST['email']; // required
//     $message = $_POST['message']; // required

//     // form validation
//     $error_message = "";

//     // name
//     $name_exp = "/^[a-z0-9 .\-]+$/i";
//     if (!preg_match($name_exp,$name))
//     {
//         $this_error = 'Please enter a valid name.';
//         $error_message .= ($error_message == "") ? $this_error : "<br/>".$this_error;
//     }        

//     $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
//     if (!preg_match($email_exp,$email))
//     {
//         $this_error = 'Please enter a valid email address.';
//         $error_message .= ($error_message == "") ? $this_error : "<br/>".$this_error;
//     } 

//     // if there are validation errors
//     if(strlen($error_message) > 0)
//     {
//         return_error($error_message);
//     }

//     // prepare email message
//     $email_message = "Form details below.\n\n";

//     function clean_string($string)
//     {
//         $bad = array("content-type", "bcc:", "to:", "cc:", "href");
//         return str_replace($bad, "", $string);
//     }

//     $email_message .= "Name: ".clean_string($name)."\n";
//     $email_message .= "Email: ".clean_string($email)."\n";
//     $email_message .= "Message: ".clean_string($message)."\n";

//     // create email headers
//     $headers = 'From: '.$email_from."\r\n".
//     'Reply-To: '.$email."\r\n" .
//     'X-Mailer: PHP/' . phpversion();
//     if (@mail($email_to, $email_subject, $email_message, $headers))
//     {
//         echo json_encode(array('success'=>1, 'message'=>'Form submitted successfully.')); 
//     }

//     else 
//     {
//         echo json_encode(array('success'=>0, 'message'=>'An error occured. Please try again later.')); 
//         die();        
//     }
// }
// else
// {
//     echo 'Please fill in all required fields.';
//     die();
// } 
?>