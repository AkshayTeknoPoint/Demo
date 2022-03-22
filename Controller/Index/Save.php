<?php

namespace PaintingTheme\EmployeeDetails\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use PaintingTheme\EmployeeDetails\Model\EmployeeFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Session\SessionManagerInterface;
use PaintingTheme\EmployeeDetails\Helper\Data; 

class Save extends Action
{

    protected $_employeeFactory;
    protected $resultPageFactory;
    protected $_sessionManager;
    protected $helper;    

    public function __construct(Data $helper,
        Context $context,
        EmployeeFactory $employeeFactory,
        PageFactory  $resultPageFactory,
        SessionManagerInterface $sessionManager
    ) {
        parent::__construct($context);
        $this->_employeeFactory = $employeeFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->_sessionManager = $sessionManager;
        $this->helper = $helper;
    }

    public function execute()
    {
        $EmployeeModel = $this->_employeeFactory->create();
        $data          = $this->getRequest()->getPost();

        $EmployeeModel->setData('first_name', $data['firstname']);
        $EmployeeModel->setData('last_name', $data['lastname']);
        $EmployeeModel->setData('mobile_no', $data['mobile']);
        $EmployeeModel->setData('address', $data['address']);

        $EmployeeModel->save();   // Save Databse 
        $this->helper->flushCache();
        $this->_redirect('*/*/show');
        $this->messageManager->addSuccess(__('Data has been saved.'));
        
        
    }
}
