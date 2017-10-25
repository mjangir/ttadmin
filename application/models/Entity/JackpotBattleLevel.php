<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JackpotBattleLevel.
 *
 * @ORM\Table(name="jackpot_battle_level", indexes={@ORM\Index(name="jackpot_id", columns={"jackpot_id"})})
 * @ORM\Entity
 */
class JackpotBattleLevel
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
     * @ORM\Column(name="battle_type", type="string", nullable=false)
     */
    private $battleType;

    /**
     * @var int
     *
     * @ORM\Column(name="`order`", type="integer", nullable=false)
     */
    private $order;

    /**
     * @var string
     *
     * @ORM\Column(name="level_name", type="string", length=255, nullable=false)
     */
    private $levelName;

    /**
     * @var int
     *
     * @ORM\Column(name="duration", type="integer", nullable=false)
     */
    private $duration;

    /**
     * @var int
     *
     * @ORM\Column(name="increment_seconds", type="integer", nullable=false)
     */
    private $incrementSeconds;

    /**
     * @var string
     *
     * @ORM\Column(name="prize_type", type="string", nullable=false)
     */
    private $prizeType;

    /**
     * @var string
     *
     * @ORM\Column(name="prize_value", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $prizeValue;

    /**
     * @var int
     *
     * @ORM\Column(name="min_bids_to_gamb", type="integer", nullable=false)
     */
    private $minBidsToGamb;

    /**
     * @var int
     *
     * @ORM\Column(name="default_available_bids", type="integer", nullable=false)
     */
    private $defaultAvailableBids;

    /**
     * @var string
     *
     * @ORM\Column(name="last_bid_winner_percent", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $lastBidWinnerPercent;

    /**
     * @var string
     *
     * @ORM\Column(name="longest_bid_winner_percent", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $longestBidWinnerPercent;

    /**
     * @var int
     *
     * @ORM\Column(name="min_players_required_to_start", type="integer", nullable=false)
     */
    private $minPlayersRequiredToStart;

    /**
     * @var int
     *
     * @ORM\Column(name="min_wins_to_unlock_next_level", type="integer", nullable=false)
     */
    private $minWinsToUnlockNextLevel;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_last_level", type="boolean", nullable=true)
     */
    private $isLastLevel;

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
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set battleType.
     *
     * @param string $battleType
     *
     * @return JackpotBattleLevel
     */
    public function setBattleType($battleType)
    {
        $this->battleType = $battleType;

        return $this;
    }

    /**
     * Get battleType.
     *
     * @return string
     */
    public function getBattleType()
    {
        return $this->battleType;
    }

    /**
     * Set order.
     *
     * @param int $order
     *
     * @return JackpotBattleLevel
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order.
     *
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set levelName.
     *
     * @param string $levelName
     *
     * @return JackpotBattleLevel
     */
    public function setLevelName($levelName)
    {
        $this->levelName = $levelName;

        return $this;
    }

    /**
     * Get levelName.
     *
     * @return string
     */
    public function getLevelName()
    {
        return $this->levelName;
    }

    /**
     * Set duration.
     *
     * @param string $duration
     *
     * @return JackpotBattleLevel
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration.
     *
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set incrementSeconds.
     *
     * @param string $incrementSeconds
     *
     * @return JackpotBattleLevel
     */
    public function setIncrementSeconds($incrementSeconds)
    {
        $this->incrementSeconds = $incrementSeconds;

        return $this;
    }

    /**
     * Get incrementSeconds.
     *
     * @return string
     */
    public function getIncrementSeconds()
    {
        return $this->incrementSeconds;
    }

    /**
     * Set prizeType.
     *
     * @param string $prizeType
     *
     * @return JackpotBattleLevel
     */
    public function setPrizeType($prizeType)
    {
        $this->prizeType = $prizeType;

        return $this;
    }

    /**
     * Get prizeType.
     *
     * @return string
     */
    public function getPrizeType()
    {
        return $this->prizeType;
    }

    /**
     * Set prizeValue.
     *
     * @param string $prizeValue
     *
     * @return JackpotBattleLevel
     */
    public function setPrizeValue($prizeValue)
    {
        $this->prizeValue = $prizeValue;

        return $this;
    }

    /**
     * Get prizeValue.
     *
     * @return string
     */
    public function getPrizeValue()
    {
        return $this->prizeValue;
    }

    /**
     * Set minBidsToGamb.
     *
     * @param int $minBidsToGamb
     *
     * @return JackpotBattleLevel
     */
    public function setMinBidsToGamb($minBidsToGamb)
    {
        $this->minBidsToGamb = $minBidsToGamb;

        return $this;
    }

    /**
     * Get minBidsToGamb.
     *
     * @return int
     */
    public function getMinBidsToGamb()
    {
        return $this->minBidsToGamb;
    }

    /**
     * Set defaultAvailableBids.
     *
     * @param int $defaultAvailableBids
     *
     * @return JackpotBattleLevel
     */
    public function setDefaultAvailableBids($defaultAvailableBids)
    {
        $this->defaultAvailableBids = $defaultAvailableBids;

        return $this;
    }

    /**
     * Get defaultAvailableBids.
     *
     * @return int
     */
    public function getDefaultAvailableBids()
    {
        return $this->defaultAvailableBids;
    }

    /**
     * Set lastBidWinnerPercent.
     *
     * @param string $lastBidWinnerPercent
     *
     * @return JackpotBattleLevel
     */
    public function setLastBidWinnerPercent($lastBidWinnerPercent)
    {
        $this->lastBidWinnerPercent = $lastBidWinnerPercent;

        return $this;
    }

    /**
     * Get lastBidWinnerPercent.
     *
     * @return string
     */
    public function getLastBidWinnerPercent()
    {
        return $this->lastBidWinnerPercent;
    }

    /**
     * Set longestBidWinnerPercent.
     *
     * @param string $longestBidWinnerPercent
     *
     * @return JackpotBattleLevel
     */
    public function setLongestBidWinnerPercent($longestBidWinnerPercent)
    {
        $this->longestBidWinnerPercent = $longestBidWinnerPercent;

        return $this;
    }

    /**
     * Get longestBidWinnerPercent.
     *
     * @return string
     */
    public function getLongestBidWinnerPercent()
    {
        return $this->longestBidWinnerPercent;
    }

    /**
     * Set minPlayersRequiredToStart.
     *
     * @param int $minPlayersRequiredToStart
     *
     * @return JackpotBattleLevel
     */
    public function setMinPlayersRequiredToStart($minPlayersRequiredToStart)
    {
        $this->minPlayersRequiredToStart = $minPlayersRequiredToStart;

        return $this;
    }

    /**
     * Get minPlayersRequiredToStart.
     *
     * @return int
     */
    public function getMinPlayersRequiredToStart()
    {
        return $this->minPlayersRequiredToStart;
    }

    /**
     * Set minWinsToUnlockNextLevel.
     *
     * @param int $minWinsToUnlockNextLevel
     *
     * @return JackpotBattleLevel
     */
    public function setMinWinsToUnlockNextLevel($minWinsToUnlockNextLevel)
    {
        $this->minWinsToUnlockNextLevel = $minWinsToUnlockNextLevel;

        return $this;
    }

    /**
     * Get minWinsToUnlockNextLevel.
     *
     * @return int
     */
    public function getMinWinsToUnlockNextLevel()
    {
        return $this->minWinsToUnlockNextLevel;
    }

    /**
     * Set isLastLevel.
     *
     * @param bool $isLastLevel
     *
     * @return JackpotBattleLevel
     */
    public function setIsLastLevel($isLastLevel)
    {
        $this->isLastLevel = $isLastLevel;

        return $this;
    }

    /**
     * Get isLastLevel.
     *
     * @return bool
     */
    public function getIsLastLevel()
    {
        return $this->isLastLevel;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return JackpotBattleLevel
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
     * @return JackpotBattleLevel
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
     * Set jackpot.
     *
     * @param Jackpot $jackpot
     *
     * @return JackpotBattleLevel
     */
    public function setJackpot(Jackpot $jackpot = null)
    {
        $this->jackpot = $jackpot;

        return $this;
    }

    /**
     * Get jackpot.
     *
     * @return Jackpot
     */
    public function getJackpot()
    {
        return $this->jackpot;
    }
}
