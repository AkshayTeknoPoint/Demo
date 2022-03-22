<?php

namespace PaintingTheme\EmployeeDetails\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Registry;
use Magento\Framework\Session\SessionManagerInterface;
use Magento\Framework\View\Result\PageFactory;
use PaintingTheme\EmployeeDetails\Model\EmployeeFactory;
use PaintingTheme\EmployeeDetails\Helper\Data;

class Update extends Action
{
    protected $_employeeFactory;
    protected $resultPageFactory;
    protected $_sessionManager;
    protected $_coreRegistry;
    protected $_request;
    protected $helper;

    public function __construct(Data $helper,
        Context $context,
        employeeFactory $employeeFactory,
        PageFactory $resultPageFactory,
        Registry $coreRegistry,
        Http $request,
        SessionManagerInterface $sessionManager
    ) {
        parent::__construct($context);
        $this->_employeeFactory = $employeeFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->_sessionManager = $sessionManager;
        $this->_coreRegistry = $coreRegistry;
        $this->_request = $request;
        $this->helper = $helper;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $EmployeeModel = $this->_employeeFactory->create()->load($id);
        //print_r($StudentModel);
        $data = $this->getRequest()->getPost();

        $EmployeeModel->setData('first_name', $data['firstname']);
        $EmployeeModel->setData('last_name', $data['lastname']);
        $EmployeeModel->setData('mobile_no', $data['mobile']);
        $EmployeeModel->setData('address', $data['address']);
        
        $EmployeeModel->save(); // Save Databse
        $this->helper->flushCache();
        $this->_redirect('*/*/show');
        $this->messageManager->addSuccess(__('Data has been updated.'));

    }
}
