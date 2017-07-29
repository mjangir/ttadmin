<?php

namespace Proxies\__CG__\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Jackpot extends \Entity\Jackpot implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
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
     * @var boolean flag indicating if this object was already initialized
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
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'id', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'title', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'amount', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'gameClockTime', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'doomsDayTime', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'gameClockRemaining', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'doomsDayRemaining', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'gameStatus', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'uniqueId', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'startedOn', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'status', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'createdAt', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'updatedAt', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'createdBy', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'updatedBy', 'jackpotGames', 'battleLevels');
        }

        return array('__isInitialized__', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'id', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'title', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'amount', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'gameClockTime', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'doomsDayTime', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'gameClockRemaining', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'doomsDayRemaining', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'gameStatus', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'uniqueId', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'startedOn', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'status', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'createdAt', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'updatedAt', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'createdBy', '' . "\0" . 'Entity\\Jackpot' . "\0" . 'updatedBy', 'jackpotGames', 'battleLevels');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Jackpot $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setTitle($title)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTitle', array($title));

        return parent::setTitle($title);
    }

    /**
     * {@inheritDoc}
     */
    public function getTitle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTitle', array());

        return parent::getTitle();
    }

    /**
     * {@inheritDoc}
     */
    public function setAmount($amount)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAmount', array($amount));

        return parent::setAmount($amount);
    }

    /**
     * {@inheritDoc}
     */
    public function getAmount()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAmount', array());

        return parent::getAmount();
    }

    /**
     * {@inheritDoc}
     */
    public function setGameClockTime($gameClockTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGameClockTime', array($gameClockTime));

        return parent::setGameClockTime($gameClockTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getGameClockTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGameClockTime', array());

        return parent::getGameClockTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setDoomsDayTime($doomsDayTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDoomsDayTime', array($doomsDayTime));

        return parent::setDoomsDayTime($doomsDayTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getDoomsDayTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDoomsDayTime', array());

        return parent::getDoomsDayTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setGameClockRemaining($gameClockRemaining)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGameClockRemaining', array($gameClockRemaining));

        return parent::setGameClockRemaining($gameClockRemaining);
    }

    /**
     * {@inheritDoc}
     */
    public function getGameClockRemaining()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGameClockRemaining', array());

        return parent::getGameClockRemaining();
    }

    /**
     * {@inheritDoc}
     */
    public function setDoomsDayRemaining($doomsDayRemaining)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDoomsDayRemaining', array($doomsDayRemaining));

        return parent::setDoomsDayRemaining($doomsDayRemaining);
    }

    /**
     * {@inheritDoc}
     */
    public function getDoomsDayRemaining()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDoomsDayRemaining', array());

        return parent::getDoomsDayRemaining();
    }

    /**
     * {@inheritDoc}
     */
    public function setGameStatus($gameStatus)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGameStatus', array($gameStatus));

        return parent::setGameStatus($gameStatus);
    }

    /**
     * {@inheritDoc}
     */
    public function getGameStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGameStatus', array());

        return parent::getGameStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setUniqueId($uniqueId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUniqueId', array($uniqueId));

        return parent::setUniqueId($uniqueId);
    }

    /**
     * {@inheritDoc}
     */
    public function getUniqueId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUniqueId', array());

        return parent::getUniqueId();
    }

    /**
     * {@inheritDoc}
     */
    public function setStartedOn($startedOn)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStartedOn', array($startedOn));

        return parent::setStartedOn($startedOn);
    }

    /**
     * {@inheritDoc}
     */
    public function getStartedOn()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStartedOn', array());

        return parent::getStartedOn();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus($status)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', array($status));

        return parent::setStatus($status);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', array());

        return parent::getStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt($createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', array($createdAt));

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', array());

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt($updatedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', array($updatedAt));

        return parent::setUpdatedAt($updatedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', array());

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedBy(\Entity\User $createdBy = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedBy', array($createdBy));

        return parent::setCreatedBy($createdBy);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedBy()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedBy', array());

        return parent::getCreatedBy();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedBy(\Entity\User $updatedBy = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedBy', array($updatedBy));

        return parent::setUpdatedBy($updatedBy);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedBy()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedBy', array());

        return parent::getUpdatedBy();
    }

    /**
     * {@inheritDoc}
     */
    public function getJackpotGames()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getJackpotGames', array());

        return parent::getJackpotGames();
    }

    /**
     * {@inheritDoc}
     */
    public function getBattleLevels()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBattleLevels', array());

        return parent::getBattleLevels();
    }

}