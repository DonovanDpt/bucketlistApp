<?php

namespace App\Services;

use http\Message;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;


class Alerte
{

    private $mailer;

    public function __construct(MailerInterface $mailer_interface)
    {
        $this->mailer = $mailer_interface;
    }

    public function envoiMail()
    {
        $email = (new Email())
            ->from('batman@afpa.fr')
            ->to('le_v@afpa.fr')
            ->subject('Convocation')
            ->text('Faire un cours avec CHAT GPT');
        $this->mailer->send($email);
    }
}