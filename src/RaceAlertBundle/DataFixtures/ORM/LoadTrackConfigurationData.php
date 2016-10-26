<?php

namespace RaceAlertBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Faker\Factory;
use RaceAlertBundle\Entity\TrackConfiguration;

class LoadTrackConfigurationData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
    for ($i = 100; $i > 0; $i--) {
      $trackConfiguration = new TrackConfiguration();
      $trackConfiguration->setName(implode(' ', $faker->words(3)));
      $trackConfiguration->setDescription(implode(' ', $faker->sentences(10)));

      $manager->persist($trackConfiguration);
    }
    $this->addReference('track-configuration', $trackConfiguration);
    $manager->flush();
  }

  public function getOrder()
  {
    return 1;
  }
}
