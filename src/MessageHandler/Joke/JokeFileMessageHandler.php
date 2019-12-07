<?php

namespace App\MessageHandler\Joke;

use App\Message\Joke\JokeFileMessage;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Class JokeFileMessageHandler
 * Create file jokes.txt if it is not exist and put joke to it.
 */
class JokeFileMessageHandler implements MessageHandlerInterface
{
    protected const FILENAME = 'jokes.txt';
    /**
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * JokeFileMessageHandler constructor.
     */
    public function __construct()
    {
        $this->filesystem = new Filesystem();
        if ($this->filesystem->exists(static::FILENAME)) {
            return;
        }
        try {
            $this->filesystem->dumpFile(static::FILENAME, '');
        } catch (IOExceptionInterface $exception) {
            echo 'An error occurred while creating your file at ' . $exception->getPath();
        }
    }

    /**
     * @param JokeFileMessage $message
     */
    public function __invoke(JokeFileMessage $message)
    {
        try {
        $this->filesystem->appendToFile(static::FILENAME, $message->getJoke()->getText());
        } catch (IOExceptionInterface $exception) {
            echo 'An error occurred while writing into file';
        }
    }
}
