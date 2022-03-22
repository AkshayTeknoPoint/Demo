<?php

namespace PaintingTheme\EmployeeDetails\Block;

use Magento\Framework\View\Element\Template;
use PaintingTheme\EmployeeDetails\Model\EmployeeFactory;
use PaintingTheme\EmployeeDetails\Model\ResourceModel\Employee\CollectionFactory;

class Pager extends Template
{
    protected $employeeFactory;
    protected $employeeCollection;

    public function __construct(
        Template\Context $context,EmployeeFactory $employeeFactory, // Add your custom Model
        CollectionFactory $employeeCollection, // Add your custom Model
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->employeeFactory = $employeeFactory;
        $this->employeeCollection = $employeeCollection;
    }
    protected function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Employee Details'));
        parent::_prepareLayout();
        $page_size = $this->getPagerCount();
        $page_data = $this->getCustomData();
        if ($this->getCustomData()) {
            $pager = $this->getLayout()->createBlock(
                \Magento\Theme\Block\Html\Pager::class,
                'custom.pager.name'
            )->setAvailableLimit($page_size)
                ->setShowPerPage(true)
                ->setCollection($page_data);
            $this->setChild('pager', $pager);
            $this->getCustomData()->load();
        }
        return $this;
    }
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

    public function getCustomData()
    {
        // get param values
        $page = ($this->getRequest()->getParam('p')) ? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit')) ? $this->getRequest()->getParam('limit') : 5; // set minimum records
        // get custom collection
        $customFactory = $this->employeeFactory->create();
        $collection = $customFactory->getCollection();
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);
        return $collection;
    }

    public function getPagerCount()
    {
        // get collection
        $minimum_show = 5; // set minimum records
        $page_array = [];
        $list_data = $this->employeeCollection->create();
        $list_count = ceil(count($list_data->getData()));
        $show_count = $minimum_show + 1;
        if (count($list_data->getData()) >= $show_count) {
            $list_count = $list_count / $minimum_show;
            $page_nu = $total = $minimum_show;
            $page_array[$minimum_show] = $minimum_show;
            for ($x = 0; $x <= $list_count; $x++) {
                $total = $total + $page_nu;
                $page_array[$total] = $total;
            }
        } else {
            $page_array[$minimum_show] = $minimum_show;
            $minimum_show = $minimum_show + $minimum_show;
            $page_array[$minimum_show] = $minimum_show;
        }
        return $page_array;
    }

}
