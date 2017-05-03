<?php 

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A meetup user.
 *
 * @ORM\Entity
 * @ApiResource
*/
class User {
  /**
   * @var string The user id
   *
   * @ORM\Column(type="guid")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="UUID")
  */
  private $id;
  /**
   * @var string The email of the user
   *
   * @ORM\Column(type="string")
   * @Assert\NotBlank
  */
  private $email;
  /**
   * @var string Password of the user, encrypted
   *
   * @ORM\Column(type="string")
   * @Assert\NotBlank
  */
  private $password;
  
  public function getId() {
    return $this->id;
  }
  
  public function getEmail() {
    return $this->email;
  }
  
  public function setEmail($email) {
    $this->email = $email;
    
    return $this;
  }
  
  public function getPassword() {
    return $this->password;
  }
  
  public function setPassword($password) {
    $this->password = $password;
    
    return $this;
  }
}
