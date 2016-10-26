<?php

namespace RaceAlertBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Faker\Factory;
use RaceAlertBundle\Entity\Track;

class LoadTrackData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
  /**
   * @var ContainerInterface
   */

  function setContainer(ContainerInterface $container = NULL) {
    $this->container = $container;
  }

  public function load(ObjectManager $manager)
  {
    $faker = Factory::create();
    for ($i = 10; $i > 0; $i--) {
      $track = new Track();
      $track->setName(implode(' ', $faker->words(3)));
      $track->setConfiguration($this->getReference('track'));

      $manager->persist($track);
    }
    $manager->flush();
  }

  public function getOrder()
  {
    return 1;
  }
}
