<?php

namespace Adteam\Core\Credits\Adjustment\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreOrders
 *
 * @ORM\Table(name="core_orders", indexes={@ORM\Index(name="core_orderss_ibfk_1", columns={"user_id"}), @ORM\Index(name="core_orders_ibfk_2", columns={"created_by_id"})})
 * @ORM\Entity
 */
class CoreOrders
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
     * @var float
     *
     * @ORM\Column(name="total", type="float", precision=10, scale=0, nullable=false)
     */
    private $total;

    /**
     * @var integer
     *
     * @ORM\Column(name="revision", type="integer", nullable=false)
     */
    private $revision;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \Adteam\Core\Credits\Adjustment\Entity\OauthUsers
     *
     * @ORM\ManyToOne(targetEntity="Adteam\Core\Credits\Adjustment\Entity\OauthUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by_id", referencedColumnName="id")
     * })
     */
    private $createdBy;

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
     * Set total
     *
     * @param float $total
     *
     * @return CoreOrders
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set revision
     *
     * @param integer $revision
     *
     * @return CoreOrders
     */
    public function setRevision($revision)
    {
        $this->revision = $revision;

        return $this;
    }

    /**
     * Get revision
     *
     * @return integer
     */
    public function getRevision()
    {
        return $this->revision;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return CoreOrders
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return CoreOrders
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdBy
     *
     * @param \Adteam\Core\Credits\Adjustment\Entity\OauthUsers $createdBy
     *
     * @return CoreOrders
     */
    public function setCreatedBy(\Adteam\Core\Credits\Adjustment\Entity\OauthUsers $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \Adteam\Core\Credits\Adjustment\Entity\OauthUsers
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set user
     *
     * @param \Adteam\Core\Credits\Adjustment\Entity\OauthUsers $user
     *
     * @return CoreOrders
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