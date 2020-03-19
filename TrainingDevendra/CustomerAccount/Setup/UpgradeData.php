<?php

namespace TrainingDevendra\CustomerAccount\Setup;

use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected $customerSetupFactory;

    private $attributeSetFactory;

    public function __construct(
        CustomerSetupFactory $customerSetupFactory,
        AttributeSetFactory $attributeSetFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
        $this->attributeSetFactory = $attributeSetFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $customerEntity = $customerSetup->getEavConfig()->getEntityType('customer');
        $attributeSetId = $customerEntity->getDefaultAttributeSetId();

        $attributeSet = $this->attributeSetFactory->create();
        $attributeGroupId = $attributeSet->getDefaultGroupId($attributeSetId);

        if (version_compare($context->getVersion(), '1.0.1') < 0) {

            $customerSetup->addAttribute(Customer::ENTITY, 'mother_name', [
                'type' => 'varchar',
                'label' => 'Mother Name',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'user_defined' => true,
                'sort_order' => 48,
                'position' => 48,
                'system' => 0,
                'is_used_in_grid' => true,
                'is_visible_in_grid' => true,
                'is_html_allowed_on_front' => false,
                'visible_on_front' => true
            ]);

            $Attribute2 = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'mother_name')
                ->addData([
                    'attribute_set_id' => 1,
                    'attribute_group_id' => 1,
                    'used_in_forms' => ['adminhtml_customer', 'checkout_register', 'customer_account_create', 'customer_account_edit', 'adminhtml_checkout'],
                ]);

            $Attribute2->save();
        }

        $setup->endSetup();
    }
}
