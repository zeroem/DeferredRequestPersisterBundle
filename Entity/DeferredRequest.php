<?php

namespace Zeroem\DeferredRequestPersisterBundle\Entity;

use Zeroem\DeferredRequestBundle\DeferredRequestInterface;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Request as HttpRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

/**
 * Zeroem\DeferredRequestBundle\Entity\Request
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class DeferredRequest implements DeferredRequestInterface
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var datetimetz $createdDate
     *
     * @ORM\Column(name="created_date", type="datetimetz")
     */
    private $createdDate;

    /**
     * @var datetimetz $finishedDate
     *
     * @ORM\Column(name="finished_date", type="datetimetz", nullable=true)
     */
    private $finishedDate;

    /**
     * @var HttpRequest $request
     *
     * @ORM\Column(name="request", type="object")
     */
    private $request;

    /**
     * @var HttpResponse $request
     *
     * @ORM\Column(name="response", type="object")
     */
    private $response;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdDate
     *
     * @param datetimetz $createdDate
     * @return Request
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * Get createdDate
     *
     * @return datetimetz 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }


    /**
     * Set finishedDate
     *
     * @param datetimetz $finishedDate
     * @return Request
     */
    public function setFinishedDate($finishedDate)
    {
        $this->finishedDate = $finishedDate;
        return $this;
    }

    /**
     * Get finishedDate
     *
     * @return datetimetz 
     */
    public function getFinishedDate()
    {
        return $this->finishedDate;
    }

    /**
     * Set request
     *
     * @param HttpRequest $request
     * @return Request
     */
    public function setRequest(HttpRequest $request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * Get request
     *
     * @return HttpRequest
     */
    public function getRequest()
    {
        return $this->request;
    }


    /**
     * Set response
     *
     * @param HttpResponse $response
     * @return Response
     */
    public function setResponse(HttpResponse $response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * Get response
     *
     * @return HttpResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedValue()
    {
      if(!isset($this->createdDate)) {
	$this->createdDate = new \DateTime();
      }
    }

    /**
     * @ORM\PreUpdate
     */
    public function setFinishedValue()
    {
      $this->finishedDate = new \DateTime();
    }
}
