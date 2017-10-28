<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JackpotGameUser.
 *
 * @ORM\Table(name="jackpot_game_user", indexes={@ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="jackpot_game_id", columns={"jackpot_game_id"})})
 * @ORM\Entity
 */
class JackpotGameUser
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
     * @var int
     *
     * @ORM\Column(name="remaining_available_bids", type="integer", nullable=true)
     */
    private $remainingAvailableBids;

    /**
     * @var int
     *
     * @ORM\Column(name="total_number_of_bids", type="integer", nullable=true)
     */
    private $totalNumberOfBids;

    /**
     * @var int
     *
     * @ORM\Column(name="longest_bid_duration", type="integer", nullable=true)
     */
    private $longestBidDuration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="joined_on", type="datetime", nullable=true)
     */
    private $joinedOn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="quitted_on", type="datetime", nullable=true)
     */
    private $quittedOn;

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
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var JackpotGame
     *
     * @ORM\ManyToOne(targetEntity="JackpotGame")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="jackpot_game_id", referencedColumnName="id")
     * })
     */
    private $jackpotGame;

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
     * Set remainingAvailableBids.
     *
     * @param int $remainingAvailableBids
     *
     * @return JackpotGameUser
     */
    public function setRemainingAvailableBids($remainingAvailableBids)
    {
        $this->remainingAvailableBids = $remainingAvailableBids;

        return $this;
    }

    /**
     * Get remainingAvailableBids.
     *
     * @return int
     */
    public function getRemainingAvailableBids()
    {
        return $this->remainingAvailableBids;
    }

    /**
     * Set totalNumberOfBids.
     *
     * @param int $totalNumberOfBids
     *
     * @return JackpotGameUser
     */
    public function setTotalNumberOfBids($totalNumberOfBids)
    {
        $this->totalNumberOfBids = $totalNumberOfBids;

        return $this;
    }

    /**
     * Get totalNumberOfBids.
     *
     * @return int
     */
    public function getTotalNumberOfBids()
    {
        return $this->totalNumberOfBids;
    }

    /**
     * Set longestBidDuration.
     *
     * @param int $longestBidDuration
     *
     * @return JackpotGameUser
     */
    public function setLongestBidDuration($longestBidDuration)
    {
        $this->longestBidDuration = $longestBidDuration;

        return $this;
    }

    /**
     * Get longestBidDuration.
     *
     * @return int
     */
    public function getLongestBidDuration()
    {
        return $this->longestBidDuration;
    }

    /**
     * Set joinedOn.
     *
     * @param \DateTime $joinedOn
     *
     * @return JackpotGameUser
     */
    public function setJoinedOn($joinedOn)
    {
        $this->joinedOn = $joinedOn;

        return $this;
    }

    /**
     * Get joinedOn.
     *
     * @return \DateTime
     */
    public function getJoinedOn()
    {
        return $this->joinedOn;
    }

    /**
     * Set quittedOn.
     *
     * @param \DateTime $quittedOn
     *
     * @return JackpotGameUser
     */
    public function setQuittedOn($quittedOn)
    {
        $this->quittedOn = $quittedOn;

        return $this;
    }

    /**
     * Get quittedOn.
     *
     * @return \DateTime
     */
    public function getQuittedOn()
    {
        return $this->quittedOn;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return JackpotGameUser
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
     * @return JackpotGameUser
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
     * Set user.
     *
     * @param User $user
     *
     * @return JackpotGameUser
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set jackpotGame.
     *
     * @param JackpotGame $jackpotGame
     *
     * @return JackpotGameUser
     */
    public function setJackpotGame(JackpotGame $jackpotGame = null)
    {
        $this->jackpotGame = $jackpotGame;

        return $this;
    }

    /**
     * Get jackpotGame.
     *
     * @return JackpotGame
     */
    public function getJackpotGame()
    {
        return $this->jackpotGame;
    }
}
