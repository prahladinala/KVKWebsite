<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name']; 
    $email_id = $_POST['email']; 
    $mobile_no = $_POST['mobile']; 
    $msg = $_POST['message']; 
    $to = "kvkdeveloper@gmail.com"; 
    $subject = "'$name' has been sent a mail"; 
    $message = "
        <html>
            <body>

            <img src='https://kvkdevelopers.com/imgs/mail_label.jpg'/>

                <table style='width:600px;'>
                    <tbody>
                        <tr>
                            <td style='width:150px'>Name:</td>
                            <td style='width:400px'>$name</td>
                        </tr>
                        <tr>
                            <td style='width:150px'>Email ID: </td>
                            <td style='width:400px'>$email_id</td>
                        </tr>
                        <tr>
                            <td style='width:150px'>Phone No:</td>
                            <td style='width:400px'>$mobile_no</td>
                        </tr>
                        <tr>
                            <td style='width:150px'>Message: </td>
                            <td style='width:400px'>$msg</td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </html>
        ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $headers .= "From: '$name' <$email_id>" . "\r\n";


    if (mail($to, $subject, $message, $headers)) {
        $to = "$email_id"; 
        $subject = "Thank you for filling the form at kvkdevelopers.com"; 
        $message = "
        <html>
            <body>

            <img src='https://kvkdevelopers.com/imgs/sender_mail_label.jpg'/>
            <p>Hi $name 👋,</p>
            <p>Thank you for messaging us, We will get back to you ASAP</p>
            <a href='https://kvkdevelopers.com'>kvkdevelopers.com</a>
            </body>
        </html>
        ";


        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= "From: '$name' <kvkdeveloper@gmail.com>" . "\r\n";
        if (mail($to, $subject, $message, $headers)) {
            echo "<script>
        window.location.href = './success.html';

                </script>";
        }
    } else {
        echo "<script>
        window.location.href = './failed.html';
                    
                </script>";
    }
}
