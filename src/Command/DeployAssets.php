<?php

namespace App\Command;

use Aws\S3\S3Client;
use Aws\S3\Transfer;
use Aws\Exception\AwsException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class DeployAssets extends Command
{
    /** @var string */
    protected static $defaultName = 'app:deploy-assets';

    /** @var ParameterBagInterface */
    private $parameterBag;

    /**
     * @param ParameterBagInterface $parameterBag
     * @param string|null $name
     */
    public function __construct(ParameterBagInterface $parameterBag, string $name = null)
    {
        $this->parameterBag = $parameterBag;

        parent::__construct($name);
    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setDescription('Deploys JS and CSS files for this application to assets.boxeratings.com');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $output->writeln('Transferring assets files to assets.boxeratings.com...');

        $client = new S3Client([
            'profile' => 'assets',
            'version' => 'latest',
            'region' => 'us-east-1'
        ]);

        $dest = 's3://assets.boxeratings.com';
        $source = $this->parameterBag->get('kernel.project_dir') . '/public/build/';

        $manager = new Transfer($client, $source, $dest, ['debug' => true]);

        try {
            $manager->transfer();
        } catch (AwsException $exception) {
            $output->writeln($exception->getMessage());
        }
    }
}