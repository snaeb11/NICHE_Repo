@extends('layouts.template.base', ['cssClass' => 'bg-[#fffff0]'])
@section('title', 'Forgot Password')

@section('childContent')
    <x-layout-partials.header />

    {{-- Modals for success/fail --}}
    @if (session('showForgotPasswordSuccessModal'))
        <x-popups.forgot-password-success :message="session('forgot_password_success_message')" />
    @endif

    @if (session('showForgotPasswordFailModal'))
        <x-popups.forgot-password-fail :message="session('forgot_password_fail_message')" />
    @endif

    <form method="POST" action="{{ route('password.email') }}"
        class="-mt-8 flex w-full flex-grow items-center justify-center">
        @csrf
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
                <span class="text-[clamp(18px,3vw,36px)] font-bold text-[#575757]">Forgot Password?</span>
                <span class="text-[clamp(14px,2vw,24px)] font-light text-[#575757]">Enter your USeP email to receive a reset
                    link.</span>
            </div>

            <!-- Email Input -->
            <div class="flex flex-col gap-4">
                <input type="email" name="email" placeholder="USeP Email" value="{{ old('email') }}"
                    class="min-h-[45px] w-full rounded-[10px] border border-[#575757] px-4 text-[clamp(14px,1.2vw,18px)] font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:outline-none md:w-[300px] lg:w-[20vw]"
                    pattern="^[a-zA-Z0-9._%+-]+@usep\.edu\.ph$" required />
            </div>

            <!-- Centered Buttons -->
            <div class="flex flex-col items-center space-y-2">
                <button
                    class="w-full max-w-xs rounded-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] px-6 py-3 font-semibold text-[#fffff0] transition duration-200 hover:cursor-pointer hover:brightness-110">
                    Send Reset Link
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
