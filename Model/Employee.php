<?php
 
namespace PaintingTheme\EmployeeDetails\Model;

use Magento\Framework\Model\AbstractModel;
 
class Employee extends AbstractModel
{
    protected function _construct()
    {
        $this-> _init('PaintingTheme\EmployeeDetails\Model\ResourceModel\Employee');
        // Path Of the ResourceModel
    }
}