<?php

namespace Zeroem\DeferredRequestPersisterBundle\Tests\Persistence;

use Zeroem\DeferredRequestPersisterBundle\Persistence\OrmPersister;

use Doctrine\Common\Persistence\ObjectManager;

class OrmPersisterTest extends \PHPUnit_Framework_TestCase
{
  public function testPersist() {
    $em = $this->getMockForAbstractClass('Doctrine\Common\Persistence\ObjectManager');
    
    $em
      ->expects($this->once())
      ->method('persist');

    $em
      ->expects($this->once())
      ->method('flush');

    $request = $this->getMock('Symfony\Component\HttpFoundation\Request');

    $persister = new OrmPersister($em);
    $entity = $persister->persist($request);

    $this->assertEquals($request, $entity->getRequest());
  }
}