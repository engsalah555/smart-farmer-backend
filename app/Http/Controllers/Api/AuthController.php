<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Requests\Api\Auth\UpdateProfileRequest;
use App\Services\AuthService;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use ApiResponder;

    public function __construct(protected AuthService $authService) {}

    public function register(RegisterRequest $request)
    {
        $user = $this->authService->register($request->validated());
        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->success([
            'user' => $user,
            'token' => $token,
            'requiresVerification' => ! $user->is_verified,
        ], 'تم التسجيل بنجاح', 201);
    }

    public function login(LoginRequest $request)
    {
        try {
            $user = $this->authService->login($request->validated());
            $token = $user->createToken('auth_token')->plainTextToken;

            return $this->success([
                'user' => $user,
                'token' => $token,
            ], 'تم تسجيل الدخول بنجاح');
        } catch (ValidationException $e) {
            return $this->error($e->getMessage(), 422, $e->errors());
        } catch (\Throwable $e) {
            // Log the error for debugging
            Log::error('Login Error: '.$e->getMessage(), [
                'email' => $request->email,
                'trace' => $e->getTraceAsString(),
            ]);

            return $this->error('حدث خطأ أثناء تسجيل الدخول. يرجى المحاولة لاحقاً', 500);
        }
    }

    public function profile(Request $request)
    {
        return $this->success($request->user()->load('store'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = $this->authService->updateProfile(
            $request->user(),
            $request->validated(),
            $request->file('profile_image')
        );

        return $this->success($user, 'تم تحديث الملف الشخصي بنجاح');
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->success(null, 'تم تسجيل الخروج بنجاح');
    }

    /**
     * POST /auth/forgot-password
     * Sends a password reset link to the user's email.
     */
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return $this->success(null, 'تم إرسال رابط استعادة كلمة المرور إلى بريدك الإلكتروني');
        }

        return $this->error('البريد الإلكتروني غير مسجل في النظام', 422);
    }

    /**
     * POST /auth/reset-password
     * Resets the user's password using the token sent via email.
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();

                // Revoke all tokens to force re-login
                $user->tokens()->delete();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return $this->success(null, 'تم تغيير كلمة المرور بنجاح، يمكنك تسجيل الدخول الآن');
        }

        return $this->error('رابط استعادة كلمة المرور غير صالح أو منتهي الصلاحية', 422);
    }
}
