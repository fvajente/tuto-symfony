<?php
// src/TestfabriceBundle/Entity/Image

namespace TestfabriceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * @ORM\Entity
 */
class Image
{
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(name="url", type="string", length=255)
   */
  private $url;

  /**
   * @ORM\Column(name="alt", type="string", length=255)
   */
  private $alt;

  private $file;
  // On ajoute cet attribut pour y stocker temporairement le nom du fichier
  private $tempFilename;

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
   * Set url
   *
   * @param string $url
   *
   * @return Image
   */
  public function setUrl($url)
  {
    $this->url = $url;
    return $this;
  }
  /**
   * Get url
   *
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * Set alt
   *
   * @param string $alt
   *
   * @return Image
   */
  public function setAlt($alt)
  {
    $this->alt = $alt;
    return $this;
  }
  /**
   * Get alt
   *
   * @return string
   */
  public function getAlt()
  {
    return $this->alt;
  }
  
}