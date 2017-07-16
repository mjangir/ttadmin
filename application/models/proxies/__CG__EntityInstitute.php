<?php

namespace Proxies\__CG__\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR.
 */
class __CG__EntityInstitute extends \Entity\Institute implements \Doctrine\ORM\Proxy\Proxy
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
    public static $lazyPropertiesDefaults = array();

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
            return array('__isInitialized__', ''."\0".'Entity\\Institute'."\0".'id', ''."\0".'Entity\\Institute'."\0".'instituteName', ''."\0".'Entity\\Institute'."\0".'instituteCode', ''."\0".'Entity\\Institute'."\0".'logo', ''."\0".'Entity\\Institute'."\0".'pincode', ''."\0".'Entity\\Institute'."\0".'contactEmail', ''."\0".'Entity\\Institute'."\0".'contactNumber', ''."\0".'Entity\\Institute'."\0".'website', ''."\0".'Entity\\Institute'."\0".'createdOn', ''."\0".'Entity\\Institute'."\0".'updatedOn', ''."\0".'Entity\\Institute'."\0".'status', ''."\0".'Entity\\Institute'."\0".'country', ''."\0".'Entity\\Institute'."\0".'state', ''."\0".'Entity\\Institute'."\0".'city', ''."\0".'Entity\\Institute'."\0".'createdBy', ''."\0".'Entity\\Institute'."\0".'updatedBy');
        }

        return array('__isInitialized__', ''."\0".'Entity\\Institute'."\0".'id', ''."\0".'Entity\\Institute'."\0".'instituteName', ''."\0".'Entity\\Institute'."\0".'instituteCode', ''."\0".'Entity\\Institute'."\0".'logo', ''."\0".'Entity\\Institute'."\0".'pincode', ''."\0".'Entity\\Institute'."\0".'contactEmail', ''."\0".'Entity\\Institute'."\0".'contactNumber', ''."\0".'Entity\\Institute'."\0".'website', ''."\0".'Entity\\Institute'."\0".'createdOn', ''."\0".'Entity\\Institute'."\0".'updatedOn', ''."\0".'Entity\\Institute'."\0".'status', ''."\0".'Entity\\Institute'."\0".'country', ''."\0".'Entity\\Institute'."\0".'state', ''."\0".'Entity\\Institute'."\0".'city', ''."\0".'Entity\\Institute'."\0".'createdBy', ''."\0".'Entity\\Institute'."\0".'updatedBy');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if (!$this->__isInitialized__) {
            $this->__initializer__ = function (Institute $proxy) {
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

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy.
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
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

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritdoc}
     */
    public function setInstituteName($instituteName)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setInstituteName', array($instituteName));

        return parent::setInstituteName($instituteName);
    }

    /**
     * {@inheritdoc}
     */
    public function getInstituteName()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getInstituteName', array());

        return parent::getInstituteName();
    }

    /**
     * {@inheritdoc}
     */
    public function setInstituteCode($instituteCode)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setInstituteCode', array($instituteCode));

        return parent::setInstituteCode($instituteCode);
    }

    /**
     * {@inheritdoc}
     */
    public function getInstituteCode()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getInstituteCode', array());

        return parent::getInstituteCode();
    }

    /**
     * {@inheritdoc}
     */
    public function setLogo($logo)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLogo', array($logo));

        return parent::setLogo($logo);
    }

    /**
     * {@inheritdoc}
     */
    public function getLogo()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLogo', array());

        return parent::getLogo();
    }

    /**
     * {@inheritdoc}
     */
    public function setPincode($pincode)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPincode', array($pincode));

        return parent::setPincode($pincode);
    }

    /**
     * {@inheritdoc}
     */
    public function getPincode()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPincode', array());

        return parent::getPincode();
    }

    /**
     * {@inheritdoc}
     */
    public function setContactEmail($contactEmail)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContactEmail', array($contactEmail));

        return parent::setContactEmail($contactEmail);
    }

    /**
     * {@inheritdoc}
     */
    public function getContactEmail()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContactEmail', array());

        return parent::getContactEmail();
    }

    /**
     * {@inheritdoc}
     */
    public function setContactNumber($contactNumber)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContactNumber', array($contactNumber));

        return parent::setContactNumber($contactNumber);
    }

    /**
     * {@inheritdoc}
     */
    public function getContactNumber()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContactNumber', array());

        return parent::getContactNumber();
    }

    /**
     * {@inheritdoc}
     */
    public function setWebsite($website)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWebsite', array($website));

        return parent::setWebsite($website);
    }

    /**
     * {@inheritdoc}
     */
    public function getWebsite()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWebsite', array());

        return parent::getWebsite();
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedOn($createdOn)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedOn', array($createdOn));

        return parent::setCreatedOn($createdOn);
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedOn()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedOn', array());

        return parent::getCreatedOn();
    }

    /**
     * {@inheritdoc}
     */
    public function setUpdatedOn($updatedOn)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedOn', array($updatedOn));

        return parent::setUpdatedOn($updatedOn);
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdatedOn()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedOn', array());

        return parent::getUpdatedOn();
    }

    /**
     * {@inheritdoc}
     */
    public function setStatus($status)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', array($status));

        return parent::setStatus($status);
    }

    /**
     * {@inheritdoc}
     */
    public function getStatus()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', array());

        return parent::getStatus();
    }

    /**
     * {@inheritdoc}
     */
    public function setCountry(\Entity\Country $country = null)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCountry', array($country));

        return parent::setCountry($country);
    }

    /**
     * {@inheritdoc}
     */
    public function getCountry()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCountry', array());

        return parent::getCountry();
    }

    /**
     * {@inheritdoc}
     */
    public function setState(\Entity\State $state = null)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setState', array($state));

        return parent::setState($state);
    }

    /**
     * {@inheritdoc}
     */
    public function getState()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getState', array());

        return parent::getState();
    }

    /**
     * {@inheritdoc}
     */
    public function setCity(\Entity\City $city = null)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCity', array($city));

        return parent::setCity($city);
    }

    /**
     * {@inheritdoc}
     */
    public function getCity()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCity', array());

        return parent::getCity();
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedBy(\Entity\User $createdBy = null)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedBy', array($createdBy));

        return parent::setCreatedBy($createdBy);
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedBy()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedBy', array());

        return parent::getCreatedBy();
    }

    /**
     * {@inheritdoc}
     */
    public function setUpdatedBy(\Entity\User $updatedBy = null)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedBy', array($updatedBy));

        return parent::setUpdatedBy($updatedBy);
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdatedBy()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedBy', array());

        return parent::getUpdatedBy();
    }
}
