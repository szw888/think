<?php
/**
 * PHPMailer - PHP email creation and transport class.
 * PHP Version 5.5
 *
 * @package   PHPMailer
 * @see       https://github.com/PHPMailer/PHPMailer/ The PHPMailer GitHub project
 * @author    Marcus Bointon (Synchro/coolbru) <phpmailer@synchromedia.co.uk>
 * @author    Jim Jagielski (jimjag) <jimjag@gmail.com>
 * @author    Andy Prevost (codeworxtech) <codeworxtech@users.sourceforge.net>
 * @author    Brent R. Matzelle (original founder)
 * @copyright 2012 - 2015 Marcus Bointon
 * @copyright 2010 - 2012 Jim Jagielski
 * @copyright 2004 - 2009 Andy Prevost
 * @license   http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * @note      This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */
namespace PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    public static function sendmail($to,$title,$body){
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = false;
        $mail->CharSet = "utf-8";
        //Set the hostname of the mail server
        $mail->Host = 'smtp.163.com';
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = 25;
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication
        $mail->Username = '18039670680@163.com';
        //Password to use for SMTP authentication
        $mail->Password = 'qwe123';
        //Set who the message is to be sent from
        $mail->setFrom('18039670680@163.com', 'szw');
        //Set an alternative reply-to address
        //$mail->addReplyTo('18039670680@163.com', 'First Last');
        //Set who the message is to be sent to
        $mail->addAddress($to, 'zxc');
        //邮件标题
        $mail->Subject = $title;

        //邮件内容
        $mail->msgHTML($body, dirname(__FILE__));
        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';
        //添加附件
        //$mail->addAttachment('images/phpmailer_mini.png');
        //send the message, check for errors
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}
