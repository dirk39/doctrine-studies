<?php

use \Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity
 * @Table(name="users")
 */
class User
{
  /**
   * @Id @Column(type="integer") @GeneratedValue
   * @var integer
   */
  private $id;

  /**
   * @var string
   * @Column(type="string")
   */
  private $name;

  /**
   * @OneToMany(targetEntity="Bug", mappedBy="reporter")
   * @var ArrayCollection
   */
  private $reportedBugs;

  /**
   * @OneToMany(targetEntity="Bug", mappedBy="engineer")
   * @var ArrayCollection
   */
  private $assignedBugs;

  public function __construct()
  {
    $this->assignedBugs = new ArrayCollection;
    $this->reportedBugs = new ArrayCollection;

  }

  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function addReportedBug(Bug $bug)
  {
    $this->reportedBugs[] = $bug;
  }

  public function assignedToBug(Bug $bug)
  {
    $this->assignedBugs[] = $bug;
  }

}