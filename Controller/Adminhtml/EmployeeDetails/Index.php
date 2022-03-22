<?php

namespace PaintingTheme\EmployeeDetails\Controller\Adminhtml\Employeedetails;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends  Action
{
	protected $PageFactory;

	public function __construct(Context $context,PageFactory $PageFactory)
	{
		$this->PageFactory = $PageFactory;
	     parent::__construct($context);
		
	}

	public function execute()
	{
		$resultPage = $this->PageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend((__('Employee Details')));

		return $resultPage;
	}


}