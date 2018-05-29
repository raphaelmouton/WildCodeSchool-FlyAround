<?php
namespace AppBundle\Service;

class Mailer
{
    private $mailer;
    private $templating;
    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }
    public function sendEmail($pilot, $receiver)
    {
        $body = $this->templating->render('mails/registration.html.twig', [
            'receiver' => $receiver,
            'pilot' => $pilot
        ]);
        $message = (new \Swift_Message('Reservation Flyaround'))
            ->setFrom('reservation@flyaround.com')
            ->setTo($receiver)
            ->setBody($body, 'text/html');
        $this->mailer->send($message);
    }
}