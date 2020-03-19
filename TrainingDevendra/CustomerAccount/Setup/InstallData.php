<?php


namespace TrainingDevendra\CustomerAccount\Setup;

use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Eav\Model\Entity\Attribute\Set as AttributeSet;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{

    /**
     * @var CustomerSetupFactory
     */
    protected $customerSetupFactory;

    /**
     * @var AttributeSetFactory
     */
    protected $attributeSetFactory;

    /**
     * @param CustomerSetupFactory $customerSetupFactory
     * @param AttributeSetFactory $attributeSetFactory
     */
    public function __construct(
        CustomerSetupFactory $customerSetupFactory,
        AttributeSetFactory $attributeSetFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
        $this->attributeSetFactory = $attributeSetFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {

        /** @var CustomerSetup $customerSetup */
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $customerEntity = $customerSetup->getEavConfig()->getEntityType('customer');
        $attributeSetId = $customerEntity->getDefaultAttributeSetId();

        /** @var $attributeSet AttributeSet */
        $attributeSet = $this->attributeSetFactory->create();
        $attributeGroupId = $attributeSet->getDefaultGroupId($attributeSetId);

        // The telephone is the attribute code
        // The types are supported as: datetime, decimal, int, text, varchar
        // The sort order will be position this attribute will be displayed
        // We add this attribute before the Email field so I set it to 79
        $customerSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'father_name',
            [
                'type' => 'text',
                'label' => 'Father Name',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'user_defined' => true,
                'sort_order' => 45,
                'position' => 45,
                'system' => 0,
                'is_used_in_grid' => true,
                'is_visible_in_grid' => true,
                'is_html_allowed_on_front' => false,
                'visible_on_front' => true
            ]
        );
        $Attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'father_name')
            ->addData([
                'attribute_set_id' => 1,
                'attribute_group_id' => 1,
                'used_in_forms' => ['adminhtml_customer', 'checkout_register', 'customer_account_create', 'customer_account_edit', 'adminhtml_checkout'],
            ]);

        $Attribute->save();

    }
}
