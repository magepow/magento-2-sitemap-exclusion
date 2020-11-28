<?php
namespace Magepow\Sitemapexclusion\Model\ItemProvider;

use Magento\Sitemap\Model\ResourceModel\Catalog\CategoryFactory;
use Magento\Sitemap\Model\SitemapItemInterfaceFactory;

class Category extends \Magento\Sitemap\Model\ItemProvider\Category
{
    /**
     * {@inheritdoc}
     */
	public function getItems($storeId)
    {   
    	$items = parent::getItems($storeId);
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $CategoryFactory = $objectManager->create('Magento\Catalog\Model\ResourceModel\Category\CollectionFactory');
        $categories = $CategoryFactory->create()->addAttributeToSelect('sitemap_exclude')
                                                ->addAttributeToFilter('sitemap_exclude', '1');
  
        foreach ($categories as $category){
            var_dump($category->getId());
            unset($items[$category->getId()]);
        }
        return $items;
    }
}