@extends('layouts.template.base', ['cssClass' => 'bg-[#fffff0]'])
@section('title', 'Reset Password')

@section('childContent')
    <x-layout-partials.header />

    {{-- Modals for success/fail --}}
    @if (session('showResetPasswordSuccessModal'))
        <x-popups.reset-password-success :message="session('reset_password_success_message')" />
    @endif

    @if (session('showResetPasswordFailModal'))
        <x-popups.reset-password-fail :message="session('reset_password_fail_message')" />
    @endif

    <form method="POST" action="{{ route('password.update') }}" class="w-full">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-50 p-4 text-red-600">
                <ul class="list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mt-10 flex flex-col items-center justify-center space-y-8 px-4 md:px-8">
            <!-- Title -->
            <div class="flex flex-col items-center">
                <span class="text-[clamp(18px,3vw,36px)] font-bold text-[#575757]">Reset Your Password</span>
                <span class="text-[clamp(14px,2vw,24px)] font-light text-[#575757]">Enter your new password below.</span>
            </div>

            <!-- Email + Password Fields -->
            <div class="flex flex-col gap-4">
                <input type="email" name="email" value="{{ $email ?? old('email') }}" readonly
                    class="min-h-[45px] w-full rounded-[10px] border border-[#575757] bg-gray-100 px-4 text-[clamp(14px,1.2vw,18px)] font-light text-[#575757] md:w-[300px] lg:w-[20vw]" />

                <input type="password" name="password" placeholder="New Password"
                    class="min-h-[45px] w-full rounded-[10px] border border-[#575757] px-4 text-[clamp(14px,1.2vw,18px)] font-light text-[#575757] md:w-[300px] lg:w-[20vw]"
                    required minlength="8" />

                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                    class="min-h-[45px] w-full rounded-[10px] border border-[#575757] px-4 text-[clamp(14px,1.2vw,18px)] font-light text-[#575757] md:w-[300px] lg:w-[20vw]"
                    required minlength="8" />
            </div>

            <!-- Centered Button -->
            <div class="flex flex-col items-center space-y-2">
                <button
                    class="w-full max-w-xs rounded-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] px-6 py-3 font-semibold text-[#fffff0] transition duration-200 hover:cursor-pointer hover:brightness-110">
                    Reset Password
                </button>
                <a href="{{ route('login') }}"
                    class="text-sm font-light text-[#575757] underline transition duration-150 hover:cursor-pointer hover:text-[#9D3E3E]">
                    Back to Login
                </a>
            </div>
        </div>
    </form>

    <div class="mt-4 h-11"></div>
    <x-layout-partials.footer />
@endsection
