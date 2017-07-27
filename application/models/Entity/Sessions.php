<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Sessions
 *
 * @ORM\Table(name="sessions")
 * @ORM\Entity
 */
class Sessions
{
    /**
     * @var string
     *
     * @ORM\Column(name="session_id", type="string", length=128, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sessionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="expires", type="integer", nullable=false)
     */
    private $expires;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="text", length=65535, nullable=true)
     */
    private $data;



    /**
     * Get sessionId
     *
     * @return string 
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Set expires
     *
     * @param integer $expires
     * @return Sessions
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * Get expires
     *
     * @return integer 
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Set data
     *
     * @param string $data
     * @return Sessions
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string 
     */
    public function getData()
    {
        return $this->data;
    }
}
