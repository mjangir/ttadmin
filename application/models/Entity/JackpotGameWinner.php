<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JackpotGameWinner
 *
 * @ORM\Table(name="jackpot_game_winner", indexes={@ORM\Index(name="jackpot_game_id", columns={"jackpot_game_id"}), @ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class JackpotGameWinner
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
     * @ORM\Column(name="jackpot_amount", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $jackpotAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="winning_amount", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $winningAmount;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_last_bid_user", type="boolean", nullable=true)
     */
    private $isLastBidUser;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_longest_bid_user", type="boolean", nullable=true)
     */
    private $isLongestBidUser;

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
     * @var \JackpotGame
     *
     * @ORM\ManyToOne(targetEntity="JackpotGame")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="jackpot_game_id", referencedColumnName="id")
     * })
     */
    private $jackpotGame;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



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
     * Set jackpotAmount
     *
     * @param string $jackpotAmount
     * @return JackpotGameWinner
     */
    public function setJackpotAmount($jackpotAmount)
    {
        $this->jackpotAmount = $jackpotAmount;

        return $this;
    }

    /**
     * Get jackpotAmount
     *
     * @return string 
     */
    public function getJackpotAmount()
    {
        return $this->jackpotAmount;
    }

    /**
     * Set winningAmount
     *
     * @param string $winningAmount
     * @return JackpotGameWinner
     */
    public function setWinningAmount($winningAmount)
    {
        $this->winningAmount = $winningAmount;

        return $this;
    }

    /**
     * Get winningAmount
     *
     * @return string 
     */
    public function getWinningAmount()
    {
        return $this->winningAmount;
    }

    /**
     * Set isLastBidUser
     *
     * @param boolean $isLastBidUser
     * @return JackpotGameWinner
     */
    public function setIsLastBidUser($isLastBidUser)
    {
        $this->isLastBidUser = $isLastBidUser;

        return $this;
    }

    /**
     * Get isLastBidUser
     *
     * @return boolean 
     */
    public function getIsLastBidUser()
    {
        return $this->isLastBidUser;
    }

    /**
     * Set isLongestBidUser
     *
     * @param boolean $isLongestBidUser
     * @return JackpotGameWinner
     */
    public function setIsLongestBidUser($isLongestBidUser)
    {
        $this->isLongestBidUser = $isLongestBidUser;

        return $this;
    }

    /**
     * Get isLongestBidUser
     *
     * @return boolean 
     */
    public function getIsLongestBidUser()
    {
        return $this->isLongestBidUser;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return JackpotGameWinner
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
     * @return JackpotGameWinner
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
     * Set jackpotGame
     *
     * @param \JackpotGame $jackpotGame
     * @return JackpotGameWinner
     */
    public function setJackpotGame(\JackpotGame $jackpotGame = null)
    {
        $this->jackpotGame = $jackpotGame;

        return $this;
    }

    /**
     * Get jackpotGame
     *
     * @return \JackpotGame 
     */
    public function getJackpotGame()
    {
        return $this->jackpotGame;
    }

    /**
     * Set user
     *
     * @param \User $user
     * @return JackpotGameWinner
     */
    public function setUser(\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
