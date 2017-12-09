<?php

namespace Proxies\__CG__\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR.
 */
class __CG__EntityLink extends \Entity\Link implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', ''."\0".'Entity\\Link'."\0".'id', ''."\0".'Entity\\Link'."\0".'parentId', ''."\0".'Entity\\Link'."\0".'linkOrder', ''."\0".'Entity\\Link'."\0".'name', ''."\0".'Entity\\Link'."\0".'alias', ''."\0".'Entity\\Link'."\0".'icon', ''."\0".'Entity\\Link'."\0".'href', ''."\0".'Entity\\Link'."\0".'actions', ''."\0".'Entity\\Link'."\0".'status', ''."\0".'Entity\\Link'."\0".'createdAt', ''."\0".'Entity\\Link'."\0".'updatedAt', ''."\0".'Entity\\Link'."\0".'linkCategory'];
        }

        return ['__isInitialized__', ''."\0".'Entity\\Link'."\0".'id', ''."\0".'Entity\\Link'."\0".'parentId', ''."\0".'Entity\\Link'."\0".'linkOrder', ''."\0".'Entity\\Link'."\0".'name', ''."\0".'Entity\\Link'."\0".'alias', ''."\0".'Entity\\Link'."\0".'icon', ''."\0".'Entity\\Link'."\0".'href', ''."\0".'Entity\\Link'."\0".'actions', ''."\0".'Entity\\Link'."\0".'status', ''."\0".'Entity\\Link'."\0".'createdAt', ''."\0".'Entity\\Link'."\0".'updatedAt', ''."\0".'Entity\\Link'."\0".'linkCategory'];
    }

    public function __wakeup()
    {
        if (!$this->__isInitialized__) {
            $this->__initializer__ = function (Link $proxy) {
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
    public function setParentId($parentId)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setParentId', [$parentId]);

        return parent::setParentId($parentId);
    }

    /**
     * {@inheritdoc}
     */
    public function getParentId()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getParentId', []);

        return parent::getParentId();
    }

    /**
     * {@inheritdoc}
     */
    public function setLinkOrder($linkOrder)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLinkOrder', [$linkOrder]);

        return parent::setLinkOrder($linkOrder);
    }

    /**
     * {@inheritdoc}
     */
    public function getLinkOrder()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLinkOrder', []);

        return parent::getLinkOrder();
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', [$name]);

        return parent::setName($name);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', []);

        return parent::getName();
    }

    /**
     * {@inheritdoc}
     */
    public function setAlias($alias)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAlias', [$alias]);

        return parent::setAlias($alias);
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAlias', []);

        return parent::getAlias();
    }

    /**
     * {@inheritdoc}
     */
    public function setIcon($icon)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIcon', [$icon]);

        return parent::setIcon($icon);
    }

    /**
     * {@inheritdoc}
     */
    public function getIcon()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIcon', []);

        return parent::getIcon();
    }

    /**
     * {@inheritdoc}
     */
    public function setHref($href)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHref', [$href]);

        return parent::setHref($href);
    }

    /**
     * {@inheritdoc}
     */
    public function getHref()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHref', []);

        return parent::getHref();
    }

    /**
     * {@inheritdoc}
     */
    public function setActions($actions)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setActions', [$actions]);

        return parent::setActions($actions);
    }

    /**
     * {@inheritdoc}
     */
    public function getActions()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getActions', []);

        return parent::getActions();
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
    public function setLinkCategory(\Entity\LinkCategory $linkCategory = null)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLinkCategory', [$linkCategory]);

        return parent::setLinkCategory($linkCategory);
    }

    /**
     * {@inheritdoc}
     */
    public function getLinkCategory()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLinkCategory', []);

        return parent::getLinkCategory();
    }
}
