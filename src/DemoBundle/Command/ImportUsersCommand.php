<?php

namespace DemoBundle\Command;

use DemoBundle\Document\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportUsersCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('import:users')
            ->setDescription('Default description')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $userResponse = file_get_contents("https://jsonplaceholder.typicode.com/users");

        $userList = json_decode($userResponse);

        foreach ($userList as $_user) {

            $user = new User();

            $user->setName($_user->name);
            $user->setEmail($_user->email);
            $user->setUsername($_user->username);

            $this->getDocumentManager()->persist($user);

        }

        $this->getDocumentManager()->flush();

    }

    protected function getDocumentManager()
    {
        return $this
            ->getContainer()
            ->get('doctrine_mongodb.odm.document_manager')
        ;
    }
}
