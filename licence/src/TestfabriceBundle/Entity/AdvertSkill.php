<?php
// src/TestfabriceBundle/Entity/AdvertSkill.php

namespace TestfabriceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="TestfabriceBundle\Entity\AdvertSkillRepository")
 */
class AdvertSkill
{
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(name="level", type="string", length=255)
   */
  private $level;

  /**
   * @ORM\ManyToOne(targetEntity="TestfabriceBundle\Entity\Advert")
   * @ORM\JoinColumn(nullable=false)
   */
  private $advert;

  /**
   * @ORM\ManyToOne(targetEntity="TestfabriceBundle\Entity\Skill")
   * @ORM\JoinColumn(nullable=false)
   */
  private $skill;
  
  
 public function getId()
  {
    return $this->id;
  }

  public function setLevel($level)
  {
    $this->level = $level;

    return $this;
  }

  public function getLevel()
  {
    return $this->level;
  }

  public function setAdvert(Advert $advert)
  {
    $this->advert = $advert;

    return $this;
  }

  public function getAdvert()
  {
    return $this->advert;
  }

  public function setSkill(Skill $skill)
  {
    $this->skill = $skill;

    return $this;
  }

  public function getSkill()
  {
    return $this->skill;
  }
}
