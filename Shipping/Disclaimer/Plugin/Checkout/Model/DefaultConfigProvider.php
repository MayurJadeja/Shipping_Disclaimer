<?php
namespace Shipping\Disclaimer\Plugin\Checkout\Model;

use Magento\Store\Model\ScopeInterface;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Framework\App\Config\ScopeConfigInterface;

class DefaultConfigProvider
{
	
	/**
    *@var checkoutSession
    */
    protected $checkoutSession;
	
	/**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;
 
    /**
    *Constructor
    * @param CheckoutSession $checkoutSession
    */
    public function __construct(CheckoutSession $checkoutSession, ScopeConfigInterface $scopeConfig)
    {
        $this->checkoutSession = $checkoutSession;
		$this->scopeConfig = $scopeConfig;
    }

    public function afterGetConfig(\Magento\Checkout\Model\DefaultConfigProvider $subject, $output)
    {
        $output['shippingDisclaimer'] = [
            'isEnabled' => $this->scopeConfig->isSetFlag(
				'disclaimer/options/enabled',
                ScopeInterface::SCOPE_STORE
			),
            'shippingDisclaimerContent' => nl2br(
                $this->scopeConfig->getValue(
                    'disclaimer/options/disclaimer',
                    ScopeInterface::SCOPE_STORE
                )
            )
        ];
        return $output;
    }
}