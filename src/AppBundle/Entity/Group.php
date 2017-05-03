<?php

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use AppBundle\Entity\User;

/**
 * A meetup group.
 *
 * @ORM\Entity
 * @ORM\Table(name="meetup_group")
 * @ApiResource
*/
class Group {
  /**
   * @var string The group id
   *
   * @ORM\Column(type="guid")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="UUID")
  */
  private $id;
  /**
  * @var string The group name
  *
  * @ORM\Column(type="string")
  * @Assert\NotBlank 
  */
  private $name;
  /**
  * @var string The group description
  *
   * @ORM\Column(type="string")
  */
  private $description;
  /**
  * @var string The group city
  *
   * @ORM\Column(type="text")
  */
  private $city;
  /**
   * @var User[] The users subscribe to the group
   *
   * @ORM\ManyToMany(targetEntity="User", cascade={"all"})
   * @ORM\JoinTable(name="users")
  */
  private $users;
  /**
   * @var User[] The users who administrate the group
   *
   * @ORM\ManyToMany(targetEntity="User", cascade={"all"})
  */
  private $admins;
  
  public function getId() {
    return $this->id;
  }
  
  public function getName() {
    return $this->name;
  }
  
  public function setName($name) {
    $this->name = $name;
    
    return $this;
  }
  
  public function getCity() {
    return $this->city;
  }
  
  public function setCity($city) {
    $this->city = $city;
    
    return $this;
  }
  
  public function getDescription() {
    return $this->description;
  }
  
  public function setDescription($description) {
    $this->description = $description;
    
    return $this;
  }
  
  public function getUsers() {
    return $this->users;
  }
  
  public function setUsers(User $users) {
    $this->users = $users;
    
    return $this;
  }
  
  public function getAdmins() {
    return $this->admins;
  }
  
  public function setAdmins(User $admins) {
    $this->admins = $admins;
    
    return $this;
  }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->admins = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Group
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Add admin
     *
     * @param \AppBundle\Entity\User $admin
     *
     * @return Group
     */
    public function addAdmin(\AppBundle\Entity\User $admin)
    {
        $this->admins[] = $admin;

        return $this;
    }

    /**
     * Remove admin
     *
     * @param \AppBundle\Entity\User $admin
     */
    public function removeAdmin(\AppBundle\Entity\User $admin)
    {
        $this->admins->removeElement($admin);
    }
}
