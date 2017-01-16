<?php

namespace Adteam\Core\Credits\Adjustment\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreAdcinema
 *
 * @ORM\Table(name="core_adcinema", indexes={@ORM\Index(name="core_adcinema_ibfk_1", columns={"user_id"})})
 * @ORM\Entity
 */
class CoreAdcinema
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var integer
     *
     * @ORM\Column(name="ticket_type", type="integer", nullable=false)
     */
    private $ticketType;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=125, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="body_request", type="text", length=65535, nullable=false)
     */
    private $bodyRequest;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_at", type="datetime", nullable=true)
     */
    private $createAt = 'CURRENT_TIMESTAMP';

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_purchased", type="boolean", nullable=false)
     */
    private $isPurchased;

    /**
     * @var \Adteam\Core\Credits\Adjustment\Entity\OauthUsers
     *
     * @ORM\ManyToOne(targetEntity="Adteam\Core\Credits\Adjustment\Entity\OauthUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



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
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return CoreAdcinema
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set ticketType
     *
     * @param integer $ticketType
     *
     * @return CoreAdcinema
     */
    public function setTicketType($ticketType)
    {
        $this->ticketType = $ticketType;

        return $this;
    }

    /**
     * Get ticketType
     *
     * @return integer
     */
    public function getTicketType()
    {
        return $this->ticketType;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return CoreAdcinema
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return CoreAdcinema
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set bodyRequest
     *
     * @param string $bodyRequest
     *
     * @return CoreAdcinema
     */
    public function setBodyRequest($bodyRequest)
    {
        $this->bodyRequest = $bodyRequest;

        return $this;
    }

    /**
     * Get bodyRequest
     *
     * @return string
     */
    public function getBodyRequest()
    {
        return $this->bodyRequest;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     *
     * @return CoreAdcinema
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set isPurchased
     *
     * @param boolean $isPurchased
     *
     * @return CoreAdcinema
     */
    public function setIsPurchased($isPurchased)
    {
        $this->isPurchased = $isPurchased;

        return $this;
    }

    /**
     * Get isPurchased
     *
     * @return boolean
     */
    public function getIsPurchased()
    {
        return $this->isPurchased;
    }

    /**
     * Set user
     *
     * @param \Adteam\Core\Credits\Adjustment\Entity\OauthUsers $user
     *
     * @return CoreAdcinema
     */
    public function setUser(\Adteam\Core\Credits\Adjustment\Entity\OauthUsers $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Adteam\Core\Credits\Adjustment\Entity\OauthUsers
     */
    public function getUser()
    {
        return $this->user;
    }
}
