<div id="account-creation-succ-popup" style="display: none;"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="relative max-h-[90vh] min-w-[20vw] max-w-[25vw] rounded-2xl bg-[#fffff0] p-8 shadow-xl">
        <div class="mt-0 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="#575757"
                class="w-30 h-30">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </div>

        <div class="mt-10 text-center text-xl font-semibold">
            <span class="text-[#575757]">Account Created Successfully!</span>
        </div>

        <div class="text-normal font-regular mt-5 text-center">
            <span class="text-[#575757]">The account <span id="account-name" class="font-semibold">--account
                    name--</span> has been
                successfully created.</span>
        </div>

        <div class="mt-13 flex justify-center">
            <button id="acs-confirm-btn"
                class="cursor-pointer rounded-full bg-gradient-to-r from-[#27C50D] to-[#1CA506] px-10 py-4 text-[#fffff0] shadow hover:brightness-110">
                Confirm
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const successPopup = document.getElementById('account-creation-succ-popup');
        const confirmBtn = document.getElementById('acs-confirm-btn');
        const firstTimeLoginPopup = document.getElementById('first-time-user-login-popup');
        const nameSpan = document.getElementById('account-name');
        const emailSpan = document.getElementById('user-email');

        // Show success popup if session exists
        @if (session('account_created'))
            if (successPopup) {
                successPopup.style.display = 'flex';
            }
            @if (session('account_name'))
                if (nameSpan) {
                    nameSpan.textContent = @json(session('account_name'));
                }
            @endif
            @if (session('account_email'))
                const rawEmail = @json(session('account_email'));
                if (emailSpan) {
                    emailSpan.textContent = maskEmail(rawEmail);
                }

                function maskEmail(email) {
                    const [name, domain] = email.split('@');
                    const visible = name.slice(0, 2);
                    const masked = '*'.repeat(Math.max(1, name.length - 2));
                    return `${visible}${masked}@${domain}`;
                }
            @endif
        @endif

        // Confirm button click: close success, open first-time login
        if (confirmBtn) {
            confirmBtn.addEventListener('click', () => {
                if (successPopup) successPopup.style.display = 'none';

                if (firstTimeLoginPopup) {
                    firstTimeLoginPopup.style.display = 'flex';
                }
            });
        }

        // Close first-time login popup
        document.getElementById('ftul-close-popup').addEventListener('click', function() {
            firstTimeLoginPopup.style.display = 'none';
        });

        // Handle confirm button click in the first-time login modal
        document.getElementById('ftul-confirm-btn').addEventListener('click', function() {
            firstTimeLoginPopup.style.display = 'none';
        });
    });
</script>
