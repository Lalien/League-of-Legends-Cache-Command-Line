<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use App\Service\LookupService;

class LookupCommand extends Command
{
    public function __construct(LookupService $lookup) {
        $this->lookup = $lookup;
        parent::__construct();
    }

    protected function configure()
    {
        // app:lookup-account
        $this
            ->setName("app:lookup-account")
            ->setDescription('Looks up account by ID')
            ->setHelp('This allows you to look up an account by ID')
            ->addArgument('summoner-name', InputArgument::REQUIRED, 'Summoner Name')
            ->addOption('cache', null, InputOption::VALUE_NONE, 'Loads the user information from the Redis cache.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $summoner_name = $input->getArgument('summoner-name');

        if ($input->getOption('cache')) {
            $this->lookup->setDataSource('cache');
            $output->writeln('Loading from cache...');
        } else {
            $output->writeln('Loading live stats...');
        }

        $summoner = $this->lookup->lookupByName($summoner_name);
    }
}