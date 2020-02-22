<?php

namespace App\Command;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateGoogleAuthenticatorSecret extends Command
{
    /** @var string */
    protected static $defaultName = 'app:auth-secret';

    /** @var ContainerInterface */
    private $container;

    /** @var string */
    private $serviceId = 'scheb_two_factor.security.google_authenticator';

    /**
     * @param ContainerInterface $container
     * @param string|null $name
     */
    public function __construct(ContainerInterface $container, string $name = null)
    {
        $this->container = $container;

        parent::__construct($name);
    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setDescription('Generates Google authenticator key for 2fa admin.boxeratings.com login.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $service = null;
        if ($this->container->has($this->serviceId)) {
            $service = $this->container->get('scheb_two_factor.security.google_authenticator');
        }

        if ($service) {
            $secret = $service->generateSecret();
            $output->writeln("Google authenticator key: $secret");
        } else {
            $output->writeln('Google 2fa must be enabled to generate a key.');
        }
    }
}