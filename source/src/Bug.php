<?php

use \Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity(repositoryClass="BugRepository")
 * @Table(name="bugs")
 */
class Bug
{
  /**
   * @Id @Column(type="integer") @GeneratedValue
   */
  private $id;

  /**
   * @Column(type="string")
   * @var string
   */
  private $description;

  /**
   * @Column(type="datetime")
   * @var DateTime
   */
  private $created;

  /**
   * @Column(type="string")
   * @var string
   */
  private $status;

  /**
   * @var ArrayCollection
   * @ManyToMany(targetEntity="Product")
   */
  private $products;

  /**
   * @ManyToOne(targetEntity="User", inversedBy="assignedBugs")
   */
  private $engineer;

  /**
   * @ManyToOne(targetEntity="User", inversedBy="reportedBugs")
   */
  private $reporter;

  public function __construct()
  {
    $this->products = new ArrayCollection;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function setCreated(DateTime $created)
  {
    $this->created = $created;
  }

  public function getCreated()
  {
    return $this->created;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setEngineer(User $engineer)
  {
    $engineer->assignedToBug($this);
    $this->engineer = $engineer;
  }

  public function setReporter(User $reporter)
  {
    $reporter->addReportedBug($this);
    $this->reporter = $reporter;
  }

  public function assignToProduct(Product $product)
  {
    $this->products[] = $product;
  }

  public function getProducts()
  {
    return $this->products;
  }

  public function getReporter()
  {
    return $this->reporter;
  }

  public function getEngineer()
  {
    return $this->engineer;
  }

  public function close()
  {
    $this->status = 'CLOSE';
  }

}