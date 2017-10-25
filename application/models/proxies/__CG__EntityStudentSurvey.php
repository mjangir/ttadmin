<?php

namespace Proxies\__CG__\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR.
 */
class __CG__EntityStudentSurvey extends \Entity\StudentSurvey implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', ''."\0".'Entity\\StudentSurvey'."\0".'id', ''."\0".'Entity\\StudentSurvey'."\0".'ipAddress', ''."\0".'Entity\\StudentSurvey'."\0".'country', ''."\0".'Entity\\StudentSurvey'."\0".'city', ''."\0".'Entity\\StudentSurvey'."\0".'platform', ''."\0".'Entity\\StudentSurvey'."\0".'browser', ''."\0".'Entity\\StudentSurvey'."\0".'currentPage', ''."\0".'Entity\\StudentSurvey'."\0".'browserVersion', ''."\0".'Entity\\StudentSurvey'."\0".'resultPdf', ''."\0".'Entity\\StudentSurvey'."\0".'startedOn', ''."\0".'Entity\\StudentSurvey'."\0".'finishedOn', ''."\0".'Entity\\StudentSurvey'."\0".'currentStatus', ''."\0".'Entity\\StudentSurvey'."\0".'student', ''."\0".'Entity\\StudentSurvey'."\0".'survey'];
        }

        return ['__isInitialized__', ''."\0".'Entity\\StudentSurvey'."\0".'id', ''."\0".'Entity\\StudentSurvey'."\0".'ipAddress', ''."\0".'Entity\\StudentSurvey'."\0".'country', ''."\0".'Entity\\StudentSurvey'."\0".'city', ''."\0".'Entity\\StudentSurvey'."\0".'platform', ''."\0".'Entity\\StudentSurvey'."\0".'browser', ''."\0".'Entity\\StudentSurvey'."\0".'currentPage', ''."\0".'Entity\\StudentSurvey'."\0".'browserVersion', ''."\0".'Entity\\StudentSurvey'."\0".'resultPdf', ''."\0".'Entity\\StudentSurvey'."\0".'startedOn', ''."\0".'Entity\\StudentSurvey'."\0".'finishedOn', ''."\0".'Entity\\StudentSurvey'."\0".'currentStatus', ''."\0".'Entity\\StudentSurvey'."\0".'student', ''."\0".'Entity\\StudentSurvey'."\0".'survey'];
    }

    public function __wakeup()
    {
        if (!$this->__isInitialized__) {
            $this->__initializer__ = function (StudentSurvey $proxy) {
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
    public function setIpAddress($ipAddress)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIpAddress', [$ipAddress]);

        return parent::setIpAddress($ipAddress);
    }

    /**
     * {@inheritdoc}
     */
    public function getIpAddress()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIpAddress', []);

        return parent::getIpAddress();
    }

    /**
     * {@inheritdoc}
     */
    public function setCountry($country)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCountry', [$country]);

        return parent::setCountry($country);
    }

    /**
     * {@inheritdoc}
     */
    public function getCountry()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCountry', []);

        return parent::getCountry();
    }

    /**
     * {@inheritdoc}
     */
    public function setCity($city)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCity', [$city]);

        return parent::setCity($city);
    }

    /**
     * {@inheritdoc}
     */
    public function getCity()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCity', []);

        return parent::getCity();
    }

    /**
     * {@inheritdoc}
     */
    public function setPlatform($platform)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPlatform', [$platform]);

        return parent::setPlatform($platform);
    }

    /**
     * {@inheritdoc}
     */
    public function getPlatform()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPlatform', []);

        return parent::getPlatform();
    }

    /**
     * {@inheritdoc}
     */
    public function setBrowser($browser)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBrowser', [$browser]);

        return parent::setBrowser($browser);
    }

    /**
     * {@inheritdoc}
     */
    public function getBrowser()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBrowser', []);

        return parent::getBrowser();
    }

    /**
     * {@inheritdoc}
     */
    public function setCurrentPage($currentPage)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCurrentPage', [$currentPage]);

        return parent::setCurrentPage($currentPage);
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrentPage()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCurrentPage', []);

        return parent::getCurrentPage();
    }

    /**
     * {@inheritdoc}
     */
    public function setBrowserVersion($browserVersion)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBrowserVersion', [$browserVersion]);

        return parent::setBrowserVersion($browserVersion);
    }

    /**
     * {@inheritdoc}
     */
    public function getBrowserVersion()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBrowserVersion', []);

        return parent::getBrowserVersion();
    }

    /**
     * {@inheritdoc}
     */
    public function setResultPdf($resultPdf)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setResultPdf', [$resultPdf]);

        return parent::setResultPdf($resultPdf);
    }

    /**
     * {@inheritdoc}
     */
    public function getResultPdf()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getResultPdf', []);

        return parent::getResultPdf();
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
    public function setFinishedOn($finishedOn)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFinishedOn', [$finishedOn]);

        return parent::setFinishedOn($finishedOn);
    }

    /**
     * {@inheritdoc}
     */
    public function getFinishedOn()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFinishedOn', []);

        return parent::getFinishedOn();
    }

    /**
     * {@inheritdoc}
     */
    public function setCurrentStatus($currentStatus)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCurrentStatus', [$currentStatus]);

        return parent::setCurrentStatus($currentStatus);
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrentStatus()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCurrentStatus', []);

        return parent::getCurrentStatus();
    }

    /**
     * {@inheritdoc}
     */
    public function setStudent(\Entity\Student $student = null)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStudent', [$student]);

        return parent::setStudent($student);
    }

    /**
     * {@inheritdoc}
     */
    public function getStudent()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStudent', []);

        return parent::getStudent();
    }

    /**
     * {@inheritdoc}
     */
    public function setSurvey(\Entity\Survey $survey = null)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSurvey', [$survey]);

        return parent::setSurvey($survey);
    }

    /**
     * {@inheritdoc}
     */
    public function getSurvey()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSurvey', []);

        return parent::getSurvey();
    }
}
