<?php
/**
 * (c) Artem Ostretsov <artem@ostretsov.ru>
 * Created at 04.03.2015 07:39
 */

namespace SecondChapter\Command;


use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Command\Command;

abstract class AbstractCommandWithEntityManager extends Command
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
} 