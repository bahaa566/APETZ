<?php

namespace App\Http\Controllers\Api\V1\User\Auth;

use app\Helpers\ApiResponder;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\User\Auth\PetResource;
use App\Http\Requests\Api\User\Auth\{LoginRequest,
    RegisterRequest,
    SendCodeRequest,
    SendEmailCodeRequest,
    SendSmsCodeRequest,
    VerifyCodeRequest,
    ForgetPasswordRequest,
    VerifyEmailCodeRequest,
    VerifyPasswordCodeRequest,
    ResetPasswordRequest,
    VerifySmsCodeRequest
};
use App\Http\Resources\Api\User\Auth\UserResource;
use App\Models\{Pet, PhoneVerification, Type, User};
use App\Services\Sms;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse as Response;

class AuthController extends Controller
{
    /**
     * send verification code to user phone number
     *
     * @param SendCodeRequest $request
     * @return Response
     */
    public function sendSmsCode(SendSmsCodeRequest $request, Sms $sms): Response
    {
        /** rand(1111, 9999)*/
        $code = 1234;
        $message = "تطبيق شيال|\n كود التأكيد هو: $code \n برجاء التعامل معه علي انه سري";
        PhoneVerification::updateOrCreate(['phone' => $request->phone], ['code' => $code]);
        $sms->send($request->phone, $message);

        return ApiResponder::success(message: __('Code Sent successfully.'));
    }

    /**
     * send verification code to user phone number
     *
     * @param SendCodeRequest $request
     * @return Response
     */
    public function sendEmailCode(SendEmailCodeRequest $request, Sms $sms): Response
    {
        /** rand(1111, 9999)*/
        $code = 1234;
        $message = "تطبيق شيال|\n كود التأكيد هو: $code \n برجاء التعامل معه علي انه سري";
        PhoneVerification::updateOrCreate(['phone' => $request->phone], ['code' => $code]);
//        $sms->send($request->phone, $message);

        return ApiResponder::success(message: __('Code Sent successfully.'));
    }

    /**
     * send verification code to user phone number
     *
     * @param VerifyCodeRequest $request
     * @return Response
     */
    public function verifySmsCode(VerifySmsCodeRequest $request): Response
    {
        $phone = PhoneVerification::where([
            ['phone', $request->phone],
            ['code', $request->code]
        ])->first();

        if ($phone) {
            $phone->delete();
            return ApiResponder::success(message: __('Code Is Correct.'));
        }

        return ApiResponder::error(message: __('Code Is InCorrect.'));
    }

    /**
     * send verification code to user phone number
     *
     * @param VerifyCodeRequest $request
     * @return Response
     */
    public function verifyEmailCode(VerifyEmailCodeRequest $request): Response
    {
        $phone = PhoneVerification::where([
            ['email', $request->email],
            ['code', $request->code]
        ])->first();

        if ($phone) {
            $phone->delete();
            return ApiResponder::success(message: __('Code Is Correct.'));
        }

        return ApiResponder::error(message: __('Code Is InCorrect.'));
    }

    /**
     * register user data to storage
     *
     * @param RegisterRequest $request
     * @return Response
     */
    public function register(RegisterRequest $request): Response
    {
        $data = $request->validated();

        if ($request->has('type') && $data['type'] != null) {
            $type = Type::create([
                'name' => $data['type'],
                'animal_id' => $data['animal_id'],
                'active' => 1
            ]);
            $data['type_id'] = $type->id;
        }
        $user_data = ['first_name' => $data['first_name'], 'last_name' => $data['last_name'], 'phone' => $data['phone'], 'email' => $data['email'], 'password' => $data['password']];
        $user = User::create($user_data);
        $user['token'] = $user->createToken('MyApp')->plainTextToken;
        if ($request->has('nickname')) {
            $pet_data = ['nickname' => $data['nickname'],
                'date_of_birth' => $data['date_of_birth'],
                'latitude' => $data['latitude'], 'longitude' => $data['longitude'],
                'location' => $data['location'],
                'interests' => $data['interests'],
                'gender' => $data['gender'],
                'image' => $data['image'],
                'type_id' => $data['type_id'],
                'user_id' => $user->id];

            $pet = Pet::create($pet_data);
            $pet['user_token'] = $user['token'];
            return ApiResponder::success(data: new PetResource($pet), message: __('User Registered Successfully.'));
        } else
            return ApiResponder::success(data: new UserResource($user), message: __('User Registered Successfully.'));
    }


    /**
     * log users into application
     *
     * @param LoginRequest $request
     * @return Response
     */
    public
    function login(LoginRequest $request): Response
    {
        if ($request->has('phone')){
            $user = $request->phoneAuthenticate();
        } else{
            $user = $request->emailAuthenticate($request['email']);
        }
        $user->deviceTokens()->updateOrCreate($request->only('token'));

        return ApiResponder::success(data: new UserResource($user), message: __('User Logged In successfully.'));
    }

    /**
     * send verification code to user phone number
     *
     * @param ForgetPasswordRequest $request
     * @return Response
     */
    public
    function forgetPassword(ForgetPasswordRequest $request, Sms $sms): Response
    {
        $code = 1234;
        $message = "تطبيق شيال|\n كود التأكيد هو: $code \n برجاء التعامل معه علي انه سري";
        User::wherePhone($request->phone)->update(['verification_code' => $code]);
        $sms->send($request->phone, $message);

        return ApiResponder::success(message: __('Code Sent successfully.'));
    }

    /**
     * send verification code to user phone number
     *
     * @param VerifyPasswordCodeRequest $request
     * @return Response
     */
    public
    function verifyPasswordCode(VerifyPasswordCodeRequest $request): Response
    {
        $user = User::where([['phone', $request->phone], ['verification_code', $request->code]])->first();

        if ($user) {
            $user->update(['verification_code' => null]);
            return ApiResponder::success(message: __('Code Is Correct.'));
        }

        return ApiResponder::error(message: __('Code Is InCorrect.'));
    }

    /**
     * reset user password
     *
     * @param ResetPasswordRequest $request
     * @return Response
     */
    public
    function resetPassword(ResetPasswordRequest $request): Response
    {
        $user = User::wherePhone($request->phone)->first();

        $user->update($request->only('password'));

        return ApiResponder::success(message: __('Password Reset Successfully'));
    }

    /**
     * log users out of application
     *
     * @param Request $request
     * @return Response
     */
    public
    function logout(Request $request): Response
    {
        $request->user()->tokens()->delete();

        return ApiResponder::success(message: __('User Logged Out Successfully'));
    }
}
