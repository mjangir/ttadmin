<?php
namespace Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * JackpotGame
 *
 * @ORM\Table(name="jackpot_game", indexes={@ORM\Index(name="jackpot_id", columns={"jackpot_id"}), @ORM\Index(name="longest_bid_winner_user_id", columns={"longest_bid_winner_user_id"}), @ORM\Index(name="last_bid_winner_user_id", columns={"last_bid_winner_user_id"})})
 * @ORM\Entity
 */
class JackpotGame
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
     * @var integer
     *
     * @ORM\Column(name="total_users_participated", type="integer", nullable=false)
     */
    private $totalUsersParticipated;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_number_of_bids", type="integer", nullable=false)
     */
    private $totalNumberOfBids;

    /**
     * @var integer
     *
     * @ORM\Column(name="longest_bid_duration", type="integer", nullable=false)
     */
    private $longestBidDuration;

    /**
     * @var integer
     *
     * @ORM\Column(name="last_bid_duration", type="integer", nullable=false)
     */
    private $lastBidDuration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="started_on", type="datetime", nullable=true)
     */
    private $startedOn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finished_on", type="datetime", nullable=true)
     */
    private $finishedOn;

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
     * @var Jackpot
     *
     * @ORM\ManyToOne(targetEntity="Jackpot")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="jackpot_id", referencedColumnName="id")
     * })
     */
    private $jackpot;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="longest_bid_winner_user_id", referencedColumnName="id")
     * })
     */
    private $longestBidWinnerUser;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="last_bid_winner_user_id", referencedColumnName="id")
     * })
     */
    private $lastBidWinnerUser;

    /**
     * @ORM\OneToMany(targetEntity="JackpotGameUser", mappedBy="jackpotGame")
     * @ORM\OrderBy({"id" = "DESC"})
     */
    protected $gameUsers;

    public function __construct()
    {
        $this->gameUsers = new ArrayCollection();
    }



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
     * Set totalUsersParticipated
     *
     * @param integer $totalUsersParticipated
     * @return JackpotGame
     */
    public function setTotalUsersParticipated($totalUsersParticipated)
    {
        $this->totalUsersParticipated = $totalUsersParticipated;

        return $this;
    }

    /**
     * Get totalUsersParticipated
     *
     * @return integer 
     */
    public function getTotalUsersParticipated()
    {
        return $this->totalUsersParticipated;
    }

    /**
     * Set totalNumberOfBids
     *
     * @param integer $totalNumberOfBids
     * @return JackpotGame
     */
    public function setTotalNumberOfBids($totalNumberOfBids)
    {
        $this->totalNumberOfBids = $totalNumberOfBids;

        return $this;
    }

    /**
     * Get totalNumberOfBids
     *
     * @return integer 
     */
    public function getTotalNumberOfBids()
    {
        return $this->totalNumberOfBids;
    }

    /**
     * Set longestBidDuration
     *
     * @param integer $longestBidDuration
     * @return JackpotGame
     */
    public function setLongestBidDuration($longestBidDuration)
    {
        $this->longestBidDuration = $longestBidDuration;

        return $this;
    }

    /**
     * Get longestBidDuration
     *
     * @return integer 
     */
    public function getLongestBidDuration()
    {
        return $this->longestBidDuration;
    }

    /**
     * Set lastBidDuration
     *
     * @param integer $lastBidDuration
     * @return JackpotGame
     */
    public function setLastBidDuration($lastBidDuration)
    {
        $this->lastBidDuration = $lastBidDuration;

        return $this;
    }

    /**
     * Get lastBidDuration
     *
     * @return integer 
     */
    public function getLastBidDuration()
    {
        return $this->lastBidDuration;
    }

    /**
     * Set startedOn
     *
     * @param \DateTime $startedOn
     * @return JackpotGame
     */
    public function setStartedOn($startedOn)
    {
        $this->startedOn = $startedOn;

        return $this;
    }

    /**
     * Get startedOn
     *
     * @return \DateTime 
     */
    public function getStartedOn()
    {
        return $this->startedOn;
    }

    /**
     * Set finishedOn
     *
     * @param \DateTime $finishedOn
     * @return JackpotGame
     */
    public function setFinishedOn($finishedOn)
    {
        $this->finishedOn = $finishedOn;

        return $this;
    }

    /**
     * Get finishedOn
     *
     * @return \DateTime 
     */
    public function getFinishedOn()
    {
        return $this->finishedOn;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return JackpotGame
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
     * @return JackpotGame
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
     * Set jackpot
     *
     * @param Jackpot $jackpot
     * @return JackpotGame
     */
    public function setJackpot(Jackpot $jackpot = null)
    {
        $this->jackpot = $jackpot;

        return $this;
    }

    /**
     * Get jackpot
     *
     * @return Jackpot 
     */
    public function getJackpot()
    {
        return $this->jackpot;
    }

    /**
     * Set longestBidWinnerUser
     *
     * @param User $longestBidWinnerUser
     * @return JackpotGame
     */
    public function setLongestBidWinnerUser(User $longestBidWinnerUser = null)
    {
        $this->longestBidWinnerUser = $longestBidWinnerUser;

        return $this;
    }

    /**
     * Get longestBidWinnerUser
     *
     * @return User 
     */
    public function getLongestBidWinnerUser()
    {
        return $this->longestBidWinnerUser;
    }

    /**
     * Set lastBidWinnerUser
     *
     * @param User $lastBidWinnerUser
     * @return JackpotGame
     */
    public function setLastBidWinnerUser(User $lastBidWinnerUser = null)
    {
        $this->lastBidWinnerUser = $lastBidWinnerUser;

        return $this;
    }

    /**
     * Get lastBidWinnerUser
     *
     * @return User 
     */
    public function getLastBidWinnerUser()
    {
        return $this->lastBidWinnerUser;
    }

    public function getUsers()
    {
        return $this->gameUsers;
    }
}
