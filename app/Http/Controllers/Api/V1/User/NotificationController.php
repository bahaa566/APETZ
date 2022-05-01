<?php

namespace App\Http\Controllers\Api\V1\User;

use app\Helpers\ApiResponder;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\User\NotificationResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * get all authinticated user notifications
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function allNotifications(Request $request): JsonResponse
    {
        return ApiResponder::handleResources($request->user()->notifications, NotificationResource::class);
    }

    /**
     * get count of unread notifications for authinticated user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function unreadNotificationsCount(Request $request): JsonResponse
    {
        return ApiResponder::success(['unread_notifications_count' => $request->user()->unreadNotifications()->count()]);
    }

    /**
     * mark all unread notifications as read
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function markAsRead(Request $request): JsonResponse
    {
        $request->user()->unreadNotifications->markAsRead();
        return ApiResponder::success(message: __('All Marked As Read'));
    }

    /**
     * delete specific norification
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(Request $request, $id): JsonResponse
    {
        $request->user()->notifications()->where('id', $id)->delete();
        return ApiResponder::success(message: __('Deleted Successfully'));
    }
}
