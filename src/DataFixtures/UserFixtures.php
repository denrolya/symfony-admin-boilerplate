<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use App\Entity\User;

class UserFixtures extends Fixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $testPassword = 'password';

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        /** @var $user User */
        $user = $userManager->createUser();
        $user
            ->setUsername('admin')
            ->setEmail('admin@example.com')
            ->setRoles(array('ROLE_ADMIN'))
            ->setPlainPassword($this->testPassword)
            ->setEnabled(true);

        $userManager->updateUser($user);

        $this->addReference('user.admin', $user);

        unset($user);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 1;
    }
}