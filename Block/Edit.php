<?php

namespace PaintingTheme\EmployeeDetails\Block;

use Magento\Framework\App\Request\Http;
use PaintingTheme\EmployeeDetails\Model\EmployeeFactory;

class Edit extends \Magento\Framework\View\Element\Template
{
    protected $_pageFactory;
    protected $_request;
    protected $_employeeFactory;

    public function __construct(\Magento\Framework\View\Element\Template\Context $context, Http $request,
    EmployeeFactory $employeeFactory) {
        $this->_request = $request;
        $this->_employeeFactory = $employeeFactory;
        return parent::__construct($context);
    }

    public function show()
    {
        $id = $this->_request->getParam('id');
        $datanew = $this->_employeeFactory->create()->load($id);
        return $datanew;
    }
}
