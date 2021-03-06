<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Magento_Sales
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Adminhtml sales order create abstract block
 *
 * @category   Magento
 * @package    Magento_Sales
 * @author      Magento Core Team <core@magentocommerce.com>
 */
namespace Magento\Sales\Block\Adminhtml\Order\Create;

abstract class AbstractCreate extends \Magento\Backend\Block\Widget
{
    /**
     * @var \Magento\Backend\Model\Session\Quote
     */
    protected $_sessionQuote;

    /**
     * @var \Magento\Sales\Model\AdminOrder\Create
     */
    protected $_orderCreate;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Model\Session\Quote $sessionQuote,
        \Magento\Sales\Model\AdminOrder\Create $orderCreate,
        array $data = array()
    ) {
        $this->_sessionQuote = $sessionQuote;
        $this->_orderCreate = $orderCreate;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve create order model object
     *
     * @return \Magento\Sales\Model\AdminOrder\Create
     */
    public function getCreateOrderModel()
    {
        return $this->_orderCreate;
    }

    /**
     * Retrieve quote session object
     *
     * @return \Magento\Backend\Model\Session\Quote
     */
    protected function _getSession()
    {
        return $this->_sessionQuote;
    }

    /**
     * Retrieve quote model object
     *
     * @return \Magento\Sales\Model\Quote
     */
    public function getQuote()
    {
        return $this->_getSession()->getQuote();
    }

    /**
     * Retrieve customer identifier
     *
     * @return int
     */
    public function getCustomerId()
    {
        return $this->_getSession()->getCustomerId();
    }

    /**
     * Retrieve store model object
     *
     * @return \Magento\Core\Model\Store
     */
    public function getStore()
    {
        return $this->_getSession()->getStore();
    }

    /**
     * Retrieve store identifier
     *
     * @return int
     */
    public function getStoreId()
    {
        return $this->_getSession()->getStoreId();
    }

    /**
     * Retrieve formated price
     *
     * @param   decimal $value
     * @return  string
     */
    public function formatPrice($value)
    {
        return $this->getStore()->formatPrice($value);
    }

    public function convertPrice($value, $format=true)
    {
        return $this->getStore()->convertPrice($value, $format);
    }
}
