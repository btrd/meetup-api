<?php 

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use AppBundle\Entity\Group;
use AppBundle\Entity\User;

/**
 * A meetup event
 *
 * @ORM\Entity
 * @ApiResource
*/
class Event {
  /**
   * @var string The event id
   *
   * @ORM\Column(type="guid")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="UUID")
  */
  private $id;
  /**
   * @var string The name of the event
   *
   * @ORM\Column(type="string")
   * @Assert\NotBlank
  */
  private $name;
  /**
   * @var string The event description
   *
   * @ORM\Column(type="text")
   * Assert\NotBlank
  */
  private $description;
  /**
   * @var DateTime The start date of the event
   *
   * @ORM\Column(type="datetime")
   * @Assert\NotBlank
  */
  private $startdate;
  /**
   * @var DateTime The end start of the event
   *
   * @ORM\Column(type="datetime")
   * @Assert\NotBlank
  */
  private $enddate;
  /**
   * @var Group The event in hold in a group
   *
   * @ORM\ManyToOne(targetEntity="Group")
   * @Assert\NotBlank
  */
  private $group;
  /**
   * @var User[] The users who attend the event
   *
   * @ORM\ManyToMany(targetEntity="User", cascade={"persist"})
  */
  private $participants;
  
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
  
  public function getDescription() {
    return $this->description;
  }
  
  public function setDescription($description) {
    $this->description = $description;
    
    return $this;
  }
  
  public function getStartdate() {
    return $this->datestart;
  }
  
  public function setStartdate($datestart) {
    $this->datestart = new DateTime($datestart);
    
    return $this;
  }
  
  public function getEnddate() {
    return $this->dateend;
  }
  
  public function setEnddate($dateend) {
    $this->dateend = new DateTime($dateend);
    
    return $this;
  }
  
  public function getGroup() {
    return $this->group;
  }
  
  public function setGroup(Group $group) {
    $this->group = $group;
    
    return $this;
  }
  
  public function getParticipants() {
    return $this->participants;
  }
  
  public function setParticipants(User $participants) {
    $this->participants = $participants;
    
    return $this;
  }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->participants = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add participant
     *
     * @param \AppBundle\Entity\User $participant
     *
     * @return Event
     */
    public function addParticipant(\AppBundle\Entity\User $participant)
    {
        $this->participants[] = $participant;

        return $this;
    }

    /**
     * Remove participant
     *
     * @param \AppBundle\Entity\User $participant
     */
    public function removeParticipant(\AppBundle\Entity\User $participant)
    {
        $this->participants->removeElement($participant);
    }
}
