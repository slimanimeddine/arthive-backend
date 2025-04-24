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
     * @queryParam filter[notificationType] string Filter notification by notification type. Enum: artist-verification-request, artist-verification-response, artwork-comment, artwork-like, follow. Example: follow
     * @queryParam filter[readStatus] string Filter notification by read and unread. Enum: read, unread. Example: read
     * @queryParam page integer The page number to fetch. Example: 1
     * @queryParam perPage integer The number of records to fetch per page. Example: 10
     *
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     * @response 400 scenario="Invalid notificationType" {
     *      "message": "Invalid notificationType for the given userType",
     *      "status": 400
     * }
     * @response 400 scenario="Invalid readStatus" {
     *      "message": "Invalid readStatus",
     *      "status": 400
     * }
     *
     * @responseFile status=200 scenario="Authenticated as admin" storage/responses/admin_notifications.json
     * @responseFile status=200 scenario="Authenticated as artist" storage/responses/artist_notifications.json
     */
    public function listAuthenticatedUserNotifications(Request $request)
    {
        $authenticatedUser = $request->user();

        $query = $authenticatedUser->notifications();

        $userType = $authenticatedUser->role;

        $filter = $request->query('filter');

        $notificationTypes = $filter['notificationType'] ?? null;

        $readStatus = $filter['readStatus'] ?? null;

        if ($notificationTypes) {
            $notificationTypes = explode(',', $notificationTypes);

            $validTypes = [
                'artist' => ['artist-verification-response', 'artwork-comment', 'artwork-like', 'follow'],
                'admin' => ['artist-verification-request'],
            ];

            if (array_diff($notificationTypes, $validTypes[$userType])) {
                return $this->error('Invalid notificationType for the given userType', 400);
            }

            $query->whereIn('type', $notificationTypes);
        }

        $readStatus = $request->query('readStatus');
        if ($readStatus !== null) {
            if (! in_array($readStatus, ['read', 'unread'])) {
                return $this->error('Invalid readStatus', 400);
            }

            $query->where('read_at', $readStatus === 'read' ? '!=' : '=', null);
        }

        $perPage = $request->query('perPage', 10);
        $notifications = $query->paginate($perPage);

        return $this->success('', $notifications);
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
     *      "status": 204
     * }
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     * @response 404 scenario="Notification not found" {
     *     "message": "The notification you are trying to retrieve does not exist.",
     *     "status": 404
     * }
     */
    public function markNotificationAsRead(Request $request, string $notificationId)
    {
        $authenticatedUser = $request->user();

        $unreadNotification = $authenticatedUser->unreadNotifications()->where('id', $notificationId)->first();

        if (! $unreadNotification) {
            return $this->notFound('The notification you are trying to retrieve does not exist.');
        }

        $unreadNotification->markAsRead();

        return $this->noContent('Notification marked as read');
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
     *      "status": 204
     * }
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     */
    public function markAllNotificationsAsRead(Request $request)
    {
        $authenticatedUser = $request->user();

        $authenticatedUser->unreadNotifications->markAsRead();

        return $this->noContent('All your notifications are marked as read.');
    }

    /**
     * Check if unread notifications exist
     *
     * Check if the authenticated user has any unread notifications
     *
     * @authenticated
     *
     * @response 200 scenario=Success {
     *      "message": "Unread notifications exist",
     *      "data": {
     *          "exists": true
     *      },
     *      "status": 200
     * }
     * @response 401 scenario=Unauthenticated {
     *      "message": "Unauthenticated"
     * }
     */
    public function unreadNotificationsExists(Request $request)
    {
        $authenticatedUser = $request->user();

        $unreadNotifications = $authenticatedUser->unreadNotifications()->exists();

        return $this->success('Unread notifications exist', ['exists' => $unreadNotifications]);
    }
}
