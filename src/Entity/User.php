<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use FOS\UserBundle\Model\User as BaseUser;
/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="users")
 * @UniqueEntity(fields={"email"}), "username"})
 * @UniqueEntity(fields={"username"})
 */
class User extends BaseUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var bool
     * @Assert\NotBlank(groups={"Registration"})
     */
    private $acceptRules;

    public function __construct()
    {
        parent::__construct();
        $this->username = '';
        $this->password = '';
        $this->email = '';
        $this->roles = ['ROLE_USER'];
        $this->acceptRules = false;
    }

    /**
     * @return bool
     */
    public function isAcceptRules(): bool
    {
        return $this->acceptRules;
    }

    /**
     * @param bool $acceptRules
     */
    public function setAcceptRules(bool $acceptRules): void
    {
        $this->acceptRules = $acceptRules;
    }


public function __toString()
{
    return $this->username;
}

}
