<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;

/**
 * @group Notifications
 */
class NotificationController extends ApiController
{
    /**
     * List authenticated user notifications
     * 
     * Retrieve a list of authenticated user notifications
     * 
     * @authenticated
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     */
    public function listAuthenticatedUserNotifications(Request $request)
    {
        $authenticatedUser = $request->user();

        $notifications = $authenticatedUser->notifications;

        return $this->success("", $notifications);
    }

    /**
     * Mark notification as read
     * 
     * Mark a specific notification as read
     * 
     * @authenticated
     * 
     * @urlParam notificationId required The id of the notification Example: 1
     * 
     * @response 200 scenario=Success {
     *      "message": "Notification marked as read",
     *      "data": [],
     *      "status": 200
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     * 
     * @response 404 scenario="Notification not found" {
     *     "message": "The notification you are trying to retrieve does not exist.",
     *     "status": 404
     * }
     */
    public function markNotificationAsRead(Request $request, int $notificationId)
    {
        $authenticatedUser = $request->user();

        $unreadNotification = $authenticatedUser->unreadNotifications()->where('id', $notificationId)->firstOr(function () {
            return $this->error("The notification you are trying to retrieve does not exist.", 404);
        });

        $unreadNotification->markAsRead();

        return $this->success('Notification marked as read');
    }

    /**
     * Mark all notifications as read
     * 
     * Mark all authenticated user notifications as read
     * 
     * @authenticated
     * 
     * @response 200 scenario=Success {
     *      "message": "All your notifications are marked as read.",
     *      "data": [],
     *      "status": 200
     * }
     * 
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     * 
     */
    public function markAllNotificationsAsRead(Request $request)
    {
        $authenticatedUser = $request->user();

        $authenticatedUser->unreadNotifications->markAsRead();

        return $this->success('All your notifications are marked as read.');
    }
}
