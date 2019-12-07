<?php

namespace App\MessageHandler\Joke;

use App\Message\Joke\JokeEmailMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use \Swift_Message;

/**
 * Class JokeEmailMessageHandler
 * Send info about joke by email.
 */
class JokeEmailMessageHandler implements MessageHandlerInterface
{
    /**
     * @var \Swift_Mailer
     */
    protected $mailer;

    /**
     * JokeEmailMessageHandler constructor.
     *
     * @param \Swift_Mailer $mailer
     */
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param JokeEmailMessage $message
     */
    public function __invoke(JokeEmailMessage $message)
    {
        $swiftMessage = (new Swift_Message('Random joke from ' . $message->getJoke()->getCategory()))
            ->setFrom('send@example.com')
            ->setTo($message->getEmail())
            ->setBody(
                $message->getJoke()->getText(),
                'text/html'
            );
        $this->mailer->send($swiftMessage);
    }
}