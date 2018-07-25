<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Beelab\TagBundle\Entity\AbstractTaggable;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product extends AbstractTaggable
{
    use TimestampableEntity, Translatable;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
     */
    private $category;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="App\Entity\Tag")
     */
    protected $tags;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="product", cascade={"persist"})
     */
    private $images;

    public function __construct()
    {
        parent::__construct();
        $this->images = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return $this
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @param Image $image
     * @return $this
     */
    public function addImage(Image $image)
    {
        $this->images[] = $image;
        $image->setProduct($this);

        return $this;
    }

    /**
     * @param Image $image
     */
    public function removeImage(Image $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * @return ArrayCollection
     */
    public function getImages()
    {
        return $this->images;
    }
}
