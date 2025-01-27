<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group Notifications
 */
class NotificationController extends Controller
{
    /**
     * List authenticated user notifications
     * 
     * Retrieve a list of authenticated user notifications
     * 
     * @authenticated
     * 
     */
    public function listAuthenticatedUserNotifications(Request $request)
    {
        $authenticatedUser = $request->user();
        $notifications = $authenticatedUser->notifications;
        return response()->json([
            'data' => $notifications
        ]);
    }

    /**
     * Mark notification as read
     * 
     * Mark a specific notification as read
     * 
     * @authenticated
     * 
     * @urlParam id required The id of the notification Example: 1
     * 
     * @response 200 {
     *      "message": "Notification marked as read"
     * }
     */
    public function markNotificationAsRead(Request $request, int $id)
    {
        $authenticatedUser = $request->user();

        $unreadNotification = $authenticatedUser->unreadNotifications()->where('id', $id)->firstOrFail();

        $unreadNotification->markAsRead();

        return response()->json([
            'message' => 'Notification marked as read'
        ]);
    }

    /**
     * Mark all notifications as read
     * 
     * Mark all authenticated user notifications as read
     * 
     * @authenticated
     * 
     * @response 200 {
     *     "message": "All notifications marked as read"
     * }
     */
    public function markAllNotificationsAsRead(Request $request)
    {
        $authenticatedUser = $request->user();

        $authenticatedUser->unreadNotifications->markAsRead();

        return response()->json([
            'message' => 'All notifications marked as read'
        ]);
    }
}
