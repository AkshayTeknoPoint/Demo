<?php

namespace PaintingTheme\EmployeeDetails\Controller\Adminhtml\EmployeeDetails;

use Magento\Backend\App\Action\Context;
use PaintingTheme\EmployeeDetails\Model\EmployeeFactory;
use Magento\Backend\App\Action;


class Delete extends Action 
{
    private $collectionFactory;
    /**
     * @param Context $context
     * @param Filter $filter
     * @param employeeFactory $studentFactory
     */
    public function __construct(Context $context,EmployeeFactory $employeeFactory) 
    {
        $this->employeeFactory = $employeeFactory;
        parent::__construct($context);
    }

    /**
     * Delete item action
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->employeeFactory->create()->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the record.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a record to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
