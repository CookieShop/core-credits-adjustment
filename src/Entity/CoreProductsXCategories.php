<?php

namespace Adteam\Core\Credits\Adjustment\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreProductsXCategories
 *
 * @ORM\Table(name="core_products_x_categories", uniqueConstraints={@ORM\UniqueConstraint(name="product_id_2", columns={"product_id", "category_id"})}, indexes={@ORM\Index(name="product_id", columns={"product_id"}), @ORM\Index(name="category_id", columns={"category_id"})})
 * @ORM\Entity
 */
class CoreProductsXCategories
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
     * @var \Adteam\Core\Credits\Adjustment\Entity\CoreProducts
     *
     * @ORM\ManyToOne(targetEntity="Adteam\Core\Credits\Adjustment\Entity\CoreProducts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $product;

    /**
     * @var \Adteam\Core\Credits\Adjustment\Entity\CoreProductCategories
     *
     * @ORM\ManyToOne(targetEntity="Adteam\Core\Credits\Adjustment\Entity\CoreProductCategories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;



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
     * Set product
     *
     * @param \Adteam\Core\Credits\Adjustment\Entity\CoreProducts $product
     *
     * @return CoreProductsXCategories
     */
    public function setProduct(\Adteam\Core\Credits\Adjustment\Entity\CoreProducts $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Adteam\Core\Credits\Adjustment\Entity\CoreProducts
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set category
     *
     * @param \Adteam\Core\Credits\Adjustment\Entity\CoreProductCategories $category
     *
     * @return CoreProductsXCategories
     */
    public function setCategory(\Adteam\Core\Credits\Adjustment\Entity\CoreProductCategories $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Adteam\Core\Credits\Adjustment\Entity\CoreProductCategories
     */
    public function getCategory()
    {
        return $this->category;
    }
}
