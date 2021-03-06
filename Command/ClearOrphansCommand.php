<?php

namespace Oneup\UploaderBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClearOrphansCommand extends ContainerAwareCommand
{
    protected static $defaultName = 'oneup:uploader:clear-orphans'; // Make command lazy load

    protected function configure()
    {
        $this
            ->setName(self::$defaultName) // BC with 2.7
            ->setDescription('Clear orphaned uploads according to the max-age you defined in your configuration.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = $this->getContainer()->get('oneup_uploader.orphanage_manager');
        $manager->clear();
    }
}
