<?php
namespace BezigeBoefjes\OrderComment\Model;

use Magento\Quote\Model\QuoteIdMaskFactory;

class GuestOrderCommentManagement implements \BezigeBoefjes\OrderComment\Api\GuestOrderCommentManagementInterface
{

    /**
     * @var QuoteIdMaskFactory
     */
    protected $quoteIdMaskFactory;

    /**
     * @var \BezigeBoefjes\OrderComment\Api\OrderCommentManagementInterface
     */
    protected $orderCommentManagement;
    
    /**
     * GuestOrderCommentManagement constructor.
     * @param QuoteIdMaskFactory $quoteIdMaskFactory
     * @param \BezigeBoefjes\OrderComment\Api\OrderCommentManagementInterface $orderCommentManagement
     */
    public function __construct(
        QuoteIdMaskFactory $quoteIdMaskFactory,
        \BezigeBoefjes\OrderComment\Api\OrderCommentManagementInterface $orderCommentManagement
    ) {
        $this->quoteIdMaskFactory = $quoteIdMaskFactory;
        $this->orderCommentManagement = $orderCommentManagement;
    }

    /**
     * {@inheritDoc}
     */
    public function saveOrderComment(
        $cartId,
        \BezigeBoefjes\OrderComment\Api\Data\OrderCommentInterface $orderComment
    ) {
        $quoteIdMask = $this->quoteIdMaskFactory->create()->load($cartId, 'masked_id');
        return $this->orderCommentManagement->saveOrderComment($quoteIdMask->getQuoteId(), $orderComment);
    }
}
