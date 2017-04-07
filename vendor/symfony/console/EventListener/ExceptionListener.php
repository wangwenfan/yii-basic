<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\EventListener;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Event\ConsoleEvent;
use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\Console\Event\ConsoleErrorEvent;
use Symfony\Component\Console\Event\ConsoleTerminateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * @author James Halsall <james.t.halsall@googlemail.com>
 * @author Robin Chalas <robin.chalas@gmail.com>
 */
class ExceptionListener implements EventSubscriberInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger;
    }

    public function onConsoleError(ConsoleErrorEvent $event)
    {
        if (null === $this->logger) {
            return;
        }

        $error = $event->getError();

        $this->logger->error('Error thrown while running command "{command}". Message: "{message}"', array('error' => $error, 'command' => $this->getInputString($event), 'message' => $error->getMessage()));
    }

    public function onConsoleTerminate(ConsoleTerminateEvent $event)
    {
        if (null === $this->logger) {
            return;
        }

        $exitCode = $event->getExitCode();

        if (0 === $exitCode) {
            return;
        }

        $this->logger->error('Command "{command}" exited with code "{code}"', array('command' => $this->getInputString($event), 'code' => $exitCode));
    }

    public static function getSubscribedEvents()
    {
        return array(
            ConsoleEvents::ERROR => array('onConsoleError', -128),
            ConsoleEvents::TERMINATE => array('onConsoleTerminate', -128),
        );
    }

    private static function getInputString(ConsoleEvent $event)
    {
        $commandName = $event->getCommand()->getName();
        $input = $event->getInput();

        if (method_exists($input, '__toString')) {
            return str_replace(array("'$commandName'", "\"$commandName\""), $commandName, (string) $input);
        }

        return $commandName;
    }
}
