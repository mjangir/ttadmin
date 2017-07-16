<?php

namespace Proxies\__CG__\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR.
 */
class __CG__EntityStudent extends \Entity\Student implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', ''."\0".'Entity\\Student'."\0".'id', ''."\0".'Entity\\Student'."\0".'class', ''."\0".'Entity\\Student'."\0".'section', ''."\0".'Entity\\Student'."\0".'rollNo', ''."\0".'Entity\\Student'."\0".'year', ''."\0".'Entity\\Student'."\0".'degreePursuing', ''."\0".'Entity\\Student'."\0".'studentType', ''."\0".'Entity\\Student'."\0".'registrationType', ''."\0".'Entity\\Student'."\0".'educationalQualification', ''."\0".'Entity\\Student'."\0".'fieldOfStudy', ''."\0".'Entity\\Student'."\0".'address', ''."\0".'Entity\\Student'."\0".'locality', ''."\0".'Entity\\Student'."\0".'country', ''."\0".'Entity\\Student'."\0".'state', ''."\0".'Entity\\Student'."\0".'city', ''."\0".'Entity\\Student'."\0".'pincode', ''."\0".'Entity\\Student'."\0".'createdOn', ''."\0".'Entity\\Student'."\0".'updatedOn', ''."\0".'Entity\\Student'."\0".'user');
        }

        return array('__isInitialized__', ''."\0".'Entity\\Student'."\0".'id', ''."\0".'Entity\\Student'."\0".'class', ''."\0".'Entity\\Student'."\0".'section', ''."\0".'Entity\\Student'."\0".'rollNo', ''."\0".'Entity\\Student'."\0".'year', ''."\0".'Entity\\Student'."\0".'degreePursuing', ''."\0".'Entity\\Student'."\0".'studentType', ''."\0".'Entity\\Student'."\0".'registrationType', ''."\0".'Entity\\Student'."\0".'educationalQualification', ''."\0".'Entity\\Student'."\0".'fieldOfStudy', ''."\0".'Entity\\Student'."\0".'address', ''."\0".'Entity\\Student'."\0".'locality', ''."\0".'Entity\\Student'."\0".'country', ''."\0".'Entity\\Student'."\0".'state', ''."\0".'Entity\\Student'."\0".'city', ''."\0".'Entity\\Student'."\0".'pincode', ''."\0".'Entity\\Student'."\0".'createdOn', ''."\0".'Entity\\Student'."\0".'updatedOn', ''."\0".'Entity\\Student'."\0".'user');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if (!$this->__isInitialized__) {
            $this->__initializer__ = function (Student $proxy) {
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
    public function setClass($class)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClass', array($class));

        return parent::setClass($class);
    }

    /**
     * {@inheritdoc}
     */
    public function getClass()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClass', array());

        return parent::getClass();
    }

    /**
     * {@inheritdoc}
     */
    public function setSection($section)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSection', array($section));

        return parent::setSection($section);
    }

    /**
     * {@inheritdoc}
     */
    public function getSection()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSection', array());

        return parent::getSection();
    }

    /**
     * {@inheritdoc}
     */
    public function setRollNo($rollNo)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRollNo', array($rollNo));

        return parent::setRollNo($rollNo);
    }

    /**
     * {@inheritdoc}
     */
    public function getRollNo()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRollNo', array());

        return parent::getRollNo();
    }

    /**
     * {@inheritdoc}
     */
    public function setYear($year)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setYear', array($year));

        return parent::setYear($year);
    }

    /**
     * {@inheritdoc}
     */
    public function getYear()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getYear', array());

        return parent::getYear();
    }

    /**
     * {@inheritdoc}
     */
    public function setDegreePursuing($degreePursuing)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDegreePursuing', array($degreePursuing));

        return parent::setDegreePursuing($degreePursuing);
    }

    /**
     * {@inheritdoc}
     */
    public function getDegreePursuing()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDegreePursuing', array());

        return parent::getDegreePursuing();
    }

    /**
     * {@inheritdoc}
     */
    public function setStudentType($studentType)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStudentType', array($studentType));

        return parent::setStudentType($studentType);
    }

    /**
     * {@inheritdoc}
     */
    public function getStudentType()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStudentType', array());

        return parent::getStudentType();
    }

    /**
     * {@inheritdoc}
     */
    public function setRegistrationType($registrationType)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRegistrationType', array($registrationType));

        return parent::setRegistrationType($registrationType);
    }

    /**
     * {@inheritdoc}
     */
    public function getRegistrationType()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRegistrationType', array());

        return parent::getRegistrationType();
    }

    /**
     * {@inheritdoc}
     */
    public function setEducationalQualification($educationalQualification)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEducationalQualification', array($educationalQualification));

        return parent::setEducationalQualification($educationalQualification);
    }

    /**
     * {@inheritdoc}
     */
    public function getEducationalQualification()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEducationalQualification', array());

        return parent::getEducationalQualification();
    }

    /**
     * {@inheritdoc}
     */
    public function setFieldOfStudy($fieldOfStudy)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFieldOfStudy', array($fieldOfStudy));

        return parent::setFieldOfStudy($fieldOfStudy);
    }

    /**
     * {@inheritdoc}
     */
    public function getFieldOfStudy()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFieldOfStudy', array());

        return parent::getFieldOfStudy();
    }

    /**
     * {@inheritdoc}
     */
    public function setAddress($address)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddress', array($address));

        return parent::setAddress($address);
    }

    /**
     * {@inheritdoc}
     */
    public function getAddress()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddress', array());

        return parent::getAddress();
    }

    /**
     * {@inheritdoc}
     */
    public function setLocality($locality)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLocality', array($locality));

        return parent::setLocality($locality);
    }

    /**
     * {@inheritdoc}
     */
    public function getLocality()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLocality', array());

        return parent::getLocality();
    }

    /**
     * {@inheritdoc}
     */
    public function setCountry($country)
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
    public function setState($state)
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
    public function setCity($city)
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
    public function setUser(\Entity\User $user = null)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUser', array($user));

        return parent::setUser($user);
    }

    /**
     * {@inheritdoc}
     */
    public function getUser()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUser', array());

        return parent::getUser();
    }
}
