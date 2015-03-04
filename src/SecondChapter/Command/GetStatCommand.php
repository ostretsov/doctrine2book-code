<?php
/**
 * (c) Artem Ostretsov <artem@ostretsov.ru>
 */

namespace SecondChapter\Command;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GetStatCommand extends CommandWithEntityManager
{
    const URL_GITHUB_SEARCH_API = 'https://api.github.com/search/repositories?q=language:%s&sort=stars&order=desc&page=%d';

    protected function configure()
    {
        $this
            ->setName('d2b:02:get-stat')
            ->setDescription('Get stat from github.com search api and persist to DB')
            ->addArgument('language', InputArgument::REQUIRED, 'Specify programming language')
            ->addOption('page', 'p', InputOption::VALUE_OPTIONAL, 'Specify page', 1)
            ->addOption('debug', null, InputOption::VALUE_OPTIONAL, 'Debug mode', false)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = sprintf(self::URL_GITHUB_SEARCH_API, $input->getArgument('language'), $input->getOption('page'));
        $output->write(sprintf('Requesting github.com Search API with %s...', $url));

        $output->writeln('<info>Done</info>');
    }
} 