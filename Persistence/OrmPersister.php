<?php

namespace Zeroem\DeferredRequestPersisterBundle\Persistence;

use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\HttpFoundation\Request;

use Zeroem\DeferredRequestPersisterBundle\Entity\DeferredRequest;
use Zeroem\DeferredRequestBundle\Persistence\PersistenceInterface;

class OrmPersister implements PersistenceInterface
{
  private $entityManager;
  
  public function __construct(ObjectManager $entityManager) {
    $this->entityManager = $entityManager;
  }

  public function persist(Request $request) {
    $entity = new DeferredRequest();
    $entity->setRequest($request);

    $this->entityManager->persist($entity);
    $this->entityManager->flush();

    return $entity;
  }

  public function find($id) {
    return $this->entityManger->getRepository('ZeroemDeferredRequestPersisterBundle:DeferredRequest')->find($id);
  }
}
