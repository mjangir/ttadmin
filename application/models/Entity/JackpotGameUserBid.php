<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JackpotGameUserBid.
 *
 * @ORM\Table(name="jackpot_game_user_bid", indexes={@ORM\Index(name="jackpot_game_user_id", columns={"jackpot_game_user_id"})})
 * @ORM\Entity
 */
class JackpotGameUserBid
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bid_start_time", type="datetime", nullable=false)
     */
    private $bidStartTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bid_end_time", type="datetime", nullable=true)
     */
    private $bidEndTime;

    /**
     * @var int
     *
     * @ORM\Column(name="bid_duration", type="integer", nullable=true)
     */
    private $bidDuration;

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
     * @var JackpotGameUser
     *
     * @ORM\ManyToOne(targetEntity="JackpotGameUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="jackpot_game_user_id", referencedColumnName="id")
     * })
     */
    private $jackpotGameUser;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set bidStartTime.
     *
     * @param \DateTime $bidStartTime
     *
     * @return JackpotGameUserBid
     */
    public function setBidStartTime($bidStartTime)
    {
        $this->bidStartTime = $bidStartTime;

        return $this;
    }

    /**
     * Get bidStartTime.
     *
     * @return \DateTime
     */
    public function getBidStartTime()
    {
        return $this->bidStartTime;
    }

    /**
     * Set bidEndTime.
     *
     * @param \DateTime $bidEndTime
     *
     * @return JackpotGameUserBid
     */
    public function setBidEndTime($bidEndTime)
    {
        $this->bidEndTime = $bidEndTime;

        return $this;
    }

    /**
     * Get bidEndTime.
     *
     * @return \DateTime
     */
    public function getBidEndTime()
    {
        return $this->bidEndTime;
    }

    /**
     * Set bidDuration.
     *
     * @param int $bidDuration
     *
     * @return JackpotGameUserBid
     */
    public function setBidDuration($bidDuration)
    {
        $this->bidDuration = $bidDuration;

        return $this;
    }

    /**
     * Get bidDuration.
     *
     * @return int
     */
    public function getBidDuration()
    {
        return $this->bidDuration;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return JackpotGameUserBid
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime $updatedAt
     *
     * @return JackpotGameUserBid
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set jackpotGameUser.
     *
     * @param JackpotGameUser $jackpotGameUser
     *
     * @return JackpotGameUserBid
     */
    public function setJackpotGameUser(JackpotGameUser $jackpotGameUser = null)
    {
        $this->jackpotGameUser = $jackpotGameUser;

        return $this;
    }

    /**
     * Get jackpotGameUser.
     *
     * @return JackpotGameUser
     */
    public function getJackpotGameUser()
    {
        return $this->jackpotGameUser;
    }
}
