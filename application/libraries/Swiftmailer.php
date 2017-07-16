<?php

/**
 * SmartCMS.
 *
 * A full featured CMS software to quickly get started with a new PHP project.
 *
 * @author	Manish Jangir <mjangir70@gmail.com>
 * @copyright	Copyright (c) 2016, Manish Jangir (http://manishjangir.com/)
 *
 * @link	http://manishjangir.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Swiftmailer Class.
 *
 * Makes usage of Swift Mailer mailing library in codeigniter
 *
 * @category	Library
 *
 * @author	Manish Jangir <manishjangir.com>
 */
class Swiftmailer
{
    /**
     * Sends mail using the following parameters.
     * 
     * @param string $alias
     * @param string $mailTo
     * @param string $replaceArray
     * @param string $customSubject
     * @param array  $attachments
     * @param string $mailFrom
     * 
     * @return bool
     */
    public function sendmail($alias, $mailTo, $replaceArray = null, $customSubject = null, $attachments = array(), $mailFrom = null)
    {

        //Get CI instanced to access additional libraries
        $ci = &get_instance();

        //Get the email template info by alias name
        $templateInfo = $ci->doctrine->em->getRepository('Entity\EmailTemplate')->getTemplateInfoByAlias($alias);

        //Return false if template info doest exists with the provided alias name
        if (empty($templateInfo)) {
            return false;
        }

        //Prepare email data
        $subject = (!empty($customSubject)) ? $customSubject : $templateInfo->getSubject();
        $body = $templateInfo->getContent();
        $replaceTo = array_keys($replaceArray);
        $replaceWith = array_values($replaceArray);
        $html = str_replace($replaceTo, $replaceWith, $body);

        //Set default message if attachment provided
        if (!empty($attachments) && isset($attachments)) {
            $body .= '<br/><br/><b>Note: </b>Please find the attached files in the mail.';
        }

        //Set the proper transport type according to configuration
        $transportType = __MAIL_TRANSPORT_TYPE__;
        switch ($transportType) {
            case 'smtp':
                $transport = Swift_SmtpTransport::newInstance(__SMTP_SERVER__, __SMTP_PORT__, 'ssl')->setUsername(__SMTP_USERNAME__)->setPassword(__SMTP_PASSWORD__);
            break;
            case 'sendmail':
                $sendMailPath = __SENDMAIL_PATH__;
                $transport = Swift_SendmailTransport::newInstance($sendMailPath);
                break;
            default:
                $transport = null;
            break;
        }

        //Create mail message instance
        $mailFrom = (!empty($mailFrom)) ? $mailFrom : __MAIL_FROM__;
        $message = Swift_Message::newInstance();
        $message->setSubject($subject);
        $message->setFrom($mailFrom);
        $message->setTo($mailTo);
        $message->setBody($html, 'text/html');

        //Create mailer instance and send the email
        $mailer = Swift_Mailer::newInstance($transport);
        $result = $mailer->send($message);

        return ($result) ? true : false;
    }
}
