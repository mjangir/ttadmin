<?php

namespace Proxies\__CG__\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR.
 */
class __CG__EntityJackpot extends \Entity\Jackpot implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *               three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *               initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var bool flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];

    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {
        $this->__initializer__ = $initializer;
        $this->__cloner__ = $cloner;
    }

    /**
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', ''."\0".'Entity\\Jackpot'."\0".'id', ''."\0".'Entity\\Jackpot'."\0".'title', ''."\0".'Entity\\Jackpot'."\0".'amount', ''."\0".'Entity\\Jackpot'."\0".'gameClockTime', ''."\0".'Entity\\Jackpot'."\0".'doomsDayTime', ''."\0".'Entity\\Jackpot'."\0".'gameClockRemaining', ''."\0".'Entity\\Jackpot'."\0".'doomsDayRemaining', ''."\0".'Entity\\Jackpot'."\0".'gameStatus', ''."\0".'Entity\\Jackpot'."\0".'uniqueId', ''."\0".'Entity\\Jackpot'."\0".'startedOn', ''."\0".'Entity\\Jackpot'."\0".'status', ''."\0".'Entity\\Jackpot'."\0".'createdAt', ''."\0".'Entity\\Jackpot'."\0".'updatedAt', ''."\0".'Entity\\Jackpot'."\0".'createdBy', ''."\0".'Entity\\Jackpot'."\0".'updatedBy', 'jackpotGames', 'battleLevels'];
        }

        return ['__isInitialized__', ''."\0".'Entity\\Jackpot'."\0".'id', ''."\0".'Entity\\Jackpot'."\0".'title', ''."\0".'Entity\\Jackpot'."\0".'amount', ''."\0".'Entity\\Jackpot'."\0".'gameClockTime', ''."\0".'Entity\\Jackpot'."\0".'doomsDayTime', ''."\0".'Entity\\Jackpot'."\0".'gameClockRemaining', ''."\0".'Entity\\Jackpot'."\0".'doomsDayRemaining', ''."\0".'Entity\\Jackpot'."\0".'gameStatus', ''."\0".'Entity\\Jackpot'."\0".'uniqueId', ''."\0".'Entity\\Jackpot'."\0".'startedOn', ''."\0".'Entity\\Jackpot'."\0".'status', ''."\0".'Entity\\Jackpot'."\0".'createdAt', ''."\0".'Entity\\Jackpot'."\0".'updatedAt', ''."\0".'Entity\\Jackpot'."\0".'createdBy', ''."\0".'Entity\\Jackpot'."\0".'updatedBy', 'jackpotGames', 'battleLevels'];
    }

    public function __wakeup()
    {
        if (!$this->__isInitialized__) {
            $this->__initializer__ = function (Jackpot $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if (!array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };
        }
    }

    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy.
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritdoc}
     *
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritdoc}
     *
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritdoc}
     *
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritdoc}
     *
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritdoc}
     *
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritdoc}
     *
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritdoc}
     *
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) parent::getId();
        }

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTitle', [$title]);

        return parent::setTitle($title);
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTitle', []);

        return parent::getTitle();
    }

    /**
     * {@inheritdoc}
     */
    public function setAmount($amount)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAmount', [$amount]);

        return parent::setAmount($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function getAmount()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAmount', []);

        return parent::getAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function setGameClockTime($gameClockTime)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGameClockTime', [$gameClockTime]);

        return parent::setGameClockTime($gameClockTime);
    }

    /**
     * {@inheritdoc}
     */
    public function getGameClockTime()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGameClockTime', []);

        return parent::getGameClockTime();
    }

    /**
     * {@inheritdoc}
     */
    public function setDoomsDayTime($doomsDayTime)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDoomsDayTime', [$doomsDayTime]);

        return parent::setDoomsDayTime($doomsDayTime);
    }

    /**
     * {@inheritdoc}
     */
    public function getDoomsDayTime()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDoomsDayTime', []);

        return parent::getDoomsDayTime();
    }

    /**
     * {@inheritdoc}
     */
    public function setGameClockRemaining($gameClockRemaining)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGameClockRemaining', [$gameClockRemaining]);

        return parent::setGameClockRemaining($gameClockRemaining);
    }

    /**
     * {@inheritdoc}
     */
    public function getGameClockRemaining()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGameClockRemaining', []);

        return parent::getGameClockRemaining();
    }

    /**
     * {@inheritdoc}
     */
    public function setDoomsDayRemaining($doomsDayRemaining)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDoomsDayRemaining', [$doomsDayRemaining]);

        return parent::setDoomsDayRemaining($doomsDayRemaining);
    }

    /**
     * {@inheritdoc}
     */
    public function getDoomsDayRemaining()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDoomsDayRemaining', []);

        return parent::getDoomsDayRemaining();
    }

    /**
     * {@inheritdoc}
     */
    public function setGameStatus($gameStatus)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGameStatus', [$gameStatus]);

        return parent::setGameStatus($gameStatus);
    }

    /**
     * {@inheritdoc}
     */
    public function getGameStatus()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGameStatus', []);

        return parent::getGameStatus();
    }

    /**
     * {@inheritdoc}
     */
    public function setUniqueId($uniqueId)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUniqueId', [$uniqueId]);

        return parent::setUniqueId($uniqueId);
    }

    /**
     * {@inheritdoc}
     */
    public function getUniqueId()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUniqueId', []);

        return parent::getUniqueId();
    }

    /**
     * {@inheritdoc}
     */
    public function setStartedOn($startedOn)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStartedOn', [$startedOn]);

        return parent::setStartedOn($startedOn);
    }

    /**
     * {@inheritdoc}
     */
    public function getStartedOn()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStartedOn', []);

        return parent::getStartedOn();
    }

    /**
     * {@inheritdoc}
     */
    public function setStatus($status)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', [$status]);

        return parent::setStatus($status);
    }

    /**
     * {@inheritdoc}
     */
    public function getStatus()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', []);

        return parent::getStatus();
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedAt($createdAt)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', [$createdAt]);

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', []);

        return parent::getCreatedAt();
    }

    /**
     * {@inheritdoc}
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', [$updatedAt]);

        return parent::setUpdatedAt($updatedAt);
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', []);

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedBy(\Entity\User $createdBy = null)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedBy', [$createdBy]);

        return parent::setCreatedBy($createdBy);
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedBy()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedBy', []);

        return parent::getCreatedBy();
    }

    /**
     * {@inheritdoc}
     */
    public function setUpdatedBy(\Entity\User $updatedBy = null)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedBy', [$updatedBy]);

        return parent::setUpdatedBy($updatedBy);
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdatedBy()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedBy', []);

        return parent::getUpdatedBy();
    }

    /**
     * {@inheritdoc}
     */
    public function getJackpotGames()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getJackpotGames', []);

        return parent::getJackpotGames();
    }

    /**
     * {@inheritdoc}
     */
    public function getBattleLevels()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBattleLevels', []);

        return parent::getBattleLevels();
    }
}
