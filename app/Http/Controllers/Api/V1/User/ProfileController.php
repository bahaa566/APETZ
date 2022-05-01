<?php

namespace App\Http\Controllers\Api\V1\User;

use app\Helpers\ApiResponder;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\Profile\{UpdateInformationRequest, UpdatePasswordRequest};
use App\Http\Resources\Api\User\Auth\UserResource;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /**
     * update user information
     *
     * @param UpdateInformationRequest $request
     * @return JsonResponse
     */
    public function updateInformation(UpdateInformationRequest $request): JsonResponse
    {
        $user = $request->user();
        $user->update($request->validated());
        $user['token'] =  $user->createToken('MyApp')->plainTextToken;

        return ApiResponder::success(new UserResource($user), message: __('Updated Successfully'));
    }

    /**
     * update user password
     *
     * @param UpdatePasswordRequest $request
     * @return JsonResponse
     */
    public function updatePassword(UpdatePasswordRequest $request): JsonResponse
    {
        $request->validateNewPassword();

        return ApiResponder::success(message: __('Updated Successfully'));
    }
}
