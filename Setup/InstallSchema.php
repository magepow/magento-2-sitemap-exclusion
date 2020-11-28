<?php
namespace Magepow\Sitemapexclusion\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 * @package Magepow\Sitemapexclusion\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $setup->startSetup();

        $setup->getConnection()->addColumn($setup->getTable('cms_page'), 'sitemap_exclude', [
            'type'     => Table::TYPE_INTEGER,
            'nullable' => false,
            'comment'  => 'Exclude sitemap',
        ]);

        $setup->endSetup();
    }
}
