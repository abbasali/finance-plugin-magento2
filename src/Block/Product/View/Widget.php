<?php

namespace Divido\DividoFinancing\Block\Product\View;

class Widget extends \Magento\Catalog\Block\Product\AbstractProduct
{
    private $helper;

    public function __construct (
        \Divido\DividoFinancing\Helper\Data $helper,
        \Magento\Catalog\Block\Product\Context $context, 
        array $data = []
    )
    {
        $this->helper = $helper;

        parent::__construct($context, $data);
    }

    public function getProductPlans ()
    {
        $plans = $this->helper->getLocalPlans($this->getProduct()->getId());

        $plans = array_map(function ($plan) {
            return $plan->id;
        }, $plans);

        $plans = implode(',', $plans);

        return $plans;
    }

    public function getAmount ()
    {
        $price = $this->getProduct()->getFinalPrice();

        return $price;
    }
}
