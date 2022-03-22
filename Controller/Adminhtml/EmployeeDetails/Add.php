<?php

namespace PaintingTheme\EmployeeDetails\Controller\Adminhtml\EmployeeDetails;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\App\ResponseInterface;

/**
 * Class Add
 *
 * @package Ceat\Communication\Controller\Adminhtml\SMSTemplates
 */
class Add extends Action
{

    /**
     * @var ForwardFactory
     */
    protected $_resultForwardFactory;

    /**
     * Add constructor.
     *
     * @param Context $context
     * @param ForwardFactory $resultForwardFactory
     */
    public function __construct(Context $context,ForwardFactory $resultForwardFactory
    ) {
        parent::__construct($context);
        $this->_resultForwardFactory = $resultForwardFactory;
    }


    /**
     * Forward to edit
     *
     */
    public function execute()
    {
    
         $resultForward = $this->_resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}