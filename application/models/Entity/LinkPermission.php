<?php
namespace Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * LinkPermission
 *
 * @ORM\Table(name="link_permission", indexes={@ORM\Index(name="link_id", columns={"link_id"}), @ORM\Index(name="group_id", columns={"group_id"})})
 * @ORM\Entity(repositoryClass="Repository\LinkPermissionRepository")
 */
class LinkPermission
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="permissions", type="text", length=65535, nullable=false)
     */
    private $permissions;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var Link
     *
     * @ORM\ManyToOne(targetEntity="Link")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="link_id", referencedColumnName="id")
     * })
     */
    private $link;

    /**
     * @var UserGroup
     *
     * @ORM\ManyToOne(targetEntity="UserGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     * })
     */
    private $group;



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
     * Set permissions
     *
     * @param string $permissions
     * @return LinkPermission
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;

        return $this;
    }

    /**
     * Get permissions
     *
     * @return string 
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return LinkPermission
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return LinkPermission
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set link
     *
     * @param Link $link
     * @return LinkPermission
     */
    public function setLink(Link $link = null)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return Link 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set group
     *
     * @param UserGroup $group
     * @return LinkPermission
     */
    public function setGroup(UserGroup $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return UserGroup 
     */
    public function getGroup()
    {
        return $this->group;
    }
}
