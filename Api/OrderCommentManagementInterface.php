<?php
namespace BezigeBoefjes\OrderComment\Api;

/**
 * Interface for saving the checkout comment to the quote for orders of logged in users
 * @api
 */
interface OrderCommentManagementInterface
{
    /**
     * @param int $cartId
     * @param \BezigeBoefjes\OrderComment\Api\Data\OrderCommentInterface $orderComment
     * @return string
     */
    public function saveOrderComment(
        $cartId,
        \BezigeBoefjes\OrderComment\Api\Data\OrderCommentInterface $orderComment
    );
}
