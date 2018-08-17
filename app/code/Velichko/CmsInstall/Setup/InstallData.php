<?php

namespace Velichko\CmsInstall\Setup;

use Magento\Cms\Model\BlockFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


class InstallData implements InstallDataInterface
{
    private $blockFactory;

    public function __construct(BlockFactory $blockFactory)
    {
        $this->blockFactory = $blockFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $cmsBlockData = [
            [
                'title' => 'Header Top Block',
                'identifier' => 'header_top',
                'content' => "<div class=\"header-top-msg\">
    <div class=\"header-top-msg--inner container\">
        <span class=\"delivery-msg\">Free delivery on Orders $25 and above</span>
        <span class=\"tel\">Call Us: <a href=\"tel:{{config path=\"general/store_information/phone\"}}\"  title=\"call us\"> {{config path=\"general/store_information/phone\"}}</a></span>
    </div>
</div>",
                'is_active' => 1,
                'stores' => [0],
                'sort_order' => 0
            ],

            [
            'title' => 'Payment Methods Icons',
            'identifier' => 'pay_icons',
            'content' => "<img src=\"{{media url=\"wysiwyg/paypal.png\"}}\" alt=\"PayPal\" width='50' />
<img src=\"{{media url=\"wysiwyg/mastercard.png\"}}\" alt=\"Mastercard\" width='50' />
<img src=\"{{media url=\"wysiwyg/visa.png\"}}\" alt=\"Visa\" width='50'/>",
            'is_active' => 1,
            'stores' => [0],
            'sort_order' => 0
            ]
        ];

        foreach ($cmsBlockData as $data) {
            $this->blockFactory->create()->setData($data)->save();
        }
    }
}