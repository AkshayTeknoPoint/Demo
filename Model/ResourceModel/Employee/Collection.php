<?php
namespace PaintingTheme\EmployeeDetails\Model\ResourceModel\Employee;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('PaintingTheme\EmployeeDetails\Model\Employee','PaintingTheme\EmployeeDetails\Model\ResourceModel\Employee');
    }
    
}