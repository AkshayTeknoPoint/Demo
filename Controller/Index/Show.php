<?php
namespace PaintingTheme\EmployeeDetails\Controller\Index;

class Show extends \Magento\Framework\App\Action\Action
{
	protected $resultpageFactory;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultpageFactory)
	{
		$this->resultPageFactory = $resultpageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		return $this->resultPageFactory->create();
	}
}