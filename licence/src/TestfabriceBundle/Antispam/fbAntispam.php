<?php
// src/OC/PlatformBundle/Antispam/OCAntispam.php

namespace TestfabriceBundle\Antispam;

class fbAntispam extends \Twig_Extension
{
  private $mailer;
  private $locale;
  private $minLength;

  public function __construct(\Swift_Mailer $mailer, $locale, $minLength)
  {
    $this->mailer    = $mailer;
    $this->locale    = $locale;
    $this->minLength = (int) $minLength;
  }

  /**
   * Vérifie si le texte est un spam ou non
   *
   * @param string $text
   * @return bool
   */
   public function isSpam($text)
  {
    return strlen($text) < $this->minLength;
  }

  //Twig va exécuter cette méthode pour savoir quelle fonctions ajoute notre service
  public function getFunctions()
  {
    return array('checkIfSpam' => new \Twig_FUnction_Method($this, 'isSpam'));
  }
   //la méthode getName() identifie votre extension Twig, elle est obligatoire
   public function getName()
   {
    return 'fbAntispam';
   }
}