<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Jackpot.
 *
 * @ORM\Table(name="jackpot", indexes={@ORM\Index(name="created_by", columns={"created_by"}), @ORM\Index(name="updated_by", columns={"updated_by"})})
 * @ORM\Entity(repositoryClass="Repository\JackpotRepository")
 */
class Jackpot
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $amount;

    /**
     * @var int
     *
     * @ORM\Column(name="min_players_required", type="integer", nullable=false)
     */
    private $minPlayersRequired;

    /**
     * @var int
     *
     * @ORM\Column(name="duration_setting", type="text", nullable=true)
     */
    private $durationSetting;

    /**
     * @var int
     *
     * @ORM\Column(name="game_clock_time", type="integer", nullable=false)
     */
    private $gameClockTime;

    /**
     * @var int
     *
     * @ORM\Column(name="dooms_day_time", type="integer", nullable=false)
     */
    private $doomsDayTime;

    /**
     * @var int
     *
     * @ORM\Column(name="game_clock_remaining", type="integer", nullable=false)
     */
    private $gameClockRemaining;

    /**
     * @var int
     *
     * @ORM\Column(name="dooms_day_remaining", type="integer", nullable=false)
     */
    private $doomsDayRemaining;

    /**
     * @var int
     *
     * @ORM\Column(name="increase_amount_seconds", type="integer", nullable=false)
     */
    private $increaseAmountSeconds;

    /**
     * @var int
     *
     * @ORM\Column(name="increase_amount", type="integer", nullable=false)
     */
    private $increaseAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="game_status", type="string", nullable=false)
     */
    private $gameStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="unique_id", type="string", length=32, nullable=false)
     */
    private $uniqueId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="started_on", type="datetime", nullable=true)
     */
    private $startedOn;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", nullable=false)
     */
    private $status;

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
     *   @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     * })
     */
    private $createdBy;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="updated_by", referencedColumnName="id")
     * })
     */
    private $updatedBy;

    /**
     * @ORM\OneToMany(targetEntity="JackpotGame", mappedBy="jackpot")
     * @ORM\OrderBy({"id" = "DESC"})
     */
    protected $jackpotGames;

    /**
     * @ORM\OneToMany(targetEntity="JackpotBattleLevel", mappedBy="jackpot")
     * @ORM\OrderBy({"id" = "ASC"})
     */
    protected $battleLevels;

    public function __construct()
    {
        $this->jackpotGames = new ArrayCollection();
        $this->battleLevels = new ArrayCollection();
    }

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
     * Set title.
     *
     * @param string $title
     *
     * @return Jackpot
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set amount.
     *
     * @param string $amount
     *
     * @return Jackpot
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount.
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set minPlayersRequired.
     *
     * @param int $minPlayersRequired
     *
     * @return Jackpot
     */
    public function setMinPlayersRequired($minPlayersRequired)
    {
        $this->minPlayersRequired = $minPlayersRequired;

        return $this;
    }

    /**
     * Get minPlayersRequired.
     *
     * @return int
     */
    public function getMinPlayersRequired()
    {
        return $this->minPlayersRequired;
    }

    public function setDurationSetting($durationSetting)
    {
        $this->durationSetting = $durationSetting;

        return $this;
    }

    public function getDurationSetting()
    {
        return $this->durationSetting;
    }

    /**
     * Set gameClockTime.
     *
     * @param int $gameClockTime
     *
     * @return Jackpot
     */
    public function setGameClockTime($gameClockTime)
    {
        $this->gameClockTime = $gameClockTime;

        return $this;
    }

    /**
     * Get gameClockTime.
     *
     * @return int
     */
    public function getGameClockTime()
    {
        return $this->gameClockTime;
    }

    /**
     * Set doomsDayTime.
     *
     * @param int $doomsDayTime
     *
     * @return Jackpot
     */
    public function setDoomsDayTime($doomsDayTime)
    {
        $this->doomsDayTime = $doomsDayTime;

        return $this;
    }

    /**
     * Get doomsDayTime.
     *
     * @return int
     */
    public function getDoomsDayTime()
    {
        return $this->doomsDayTime;
    }

    /**
     * Set gameClockRemaining.
     *
     * @param int $gameClockRemaining
     *
     * @return Jackpot
     */
    public function setGameClockRemaining($gameClockRemaining)
    {
        $this->gameClockRemaining = $gameClockRemaining;

        return $this;
    }

    /**
     * Get gameClockRemaining.
     *
     * @return int
     */
    public function getGameClockRemaining()
    {
        return $this->gameClockRemaining;
    }

    /**
     * Set doomsDayRemaining.
     *
     * @param int $doomsDayRemaining
     *
     * @return Jackpot
     */
    public function setDoomsDayRemaining($doomsDayRemaining)
    {
        $this->doomsDayRemaining = $doomsDayRemaining;

        return $this;
    }

    /**
     * Get doomsDayRemaining.
     *
     * @return int
     */
    public function getDoomsDayRemaining()
    {
        return $this->doomsDayRemaining;
    }

    /**
     * Set increaseAmountSeconds.
     *
     * @param int $increaseAmountSeconds
     *
     * @return Jackpot
     */
    public function setIncreaseAmountSeconds($increaseAmountSeconds)
    {
        $this->increaseAmountSeconds = $increaseAmountSeconds;

        return $this;
    }

    /**
     * Get increaseAmountSeconds.
     *
     * @return int
     */
    public function getIncreaseAmountSeconds()
    {
        return $this->increaseAmountSeconds;
    }

    /**
     * Set increaseAmount.
     *
     * @param int $increaseAmount
     *
     * @return Jackpot
     */
    public function setIncreaseAmount($increaseAmount)
    {
        $this->increaseAmount = $increaseAmount;

        return $this;
    }

    /**
     * Get increaseAmount.
     *
     * @return int
     */
    public function getIncreaseAmount()
    {
        return $this->increaseAmount;
    }

    /**
     * Set gameStatus.
     *
     * @param string $gameStatus
     *
     * @return Jackpot
     */
    public function setGameStatus($gameStatus)
    {
        $this->gameStatus = $gameStatus;

        return $this;
    }

    /**
     * Get gameStatus.
     *
     * @return string
     */
    public function getGameStatus()
    {
        return $this->gameStatus;
    }

    /**
     * Set uniqueId.
     *
     * @param string $uniqueId
     *
     * @return Jackpot
     */
    public function setUniqueId($uniqueId)
    {
        $this->uniqueId = $uniqueId;

        return $this;
    }

    /**
     * Get uniqueId.
     *
     * @return string
     */
    public function getUniqueId()
    {
        return $this->uniqueId;
    }

    /**
     * Set startedOn.
     *
     * @param \DateTime $startedOn
     *
     * @return Jackpot
     */
    public function setStartedOn($startedOn)
    {
        $this->startedOn = $startedOn;

        return $this;
    }

    /**
     * Get startedOn.
     *
     * @return \DateTime
     */
    public function getStartedOn()
    {
        return $this->startedOn;
    }

    /**
     * Set status.
     *
     * @param string $status
     *
     * @return Jackpot
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return Jackpot
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
     * @return Jackpot
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
     * Set createdBy.
     *
     * @param User $createdBy
     *
     * @return Jackpot
     */
    public function setCreatedBy(User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy.
     *
     * @return User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedBy.
     *
     * @param User $updatedBy
     *
     * @return Jackpot
     */
    public function setUpdatedBy(User $updatedBy = null)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy.
     *
     * @return User
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    public function getJackpotGames()
    {
        return $this->jackpotGames;
    }

    public function getBattleLevels()
    {
        return $this->battleLevels;
    }
}
