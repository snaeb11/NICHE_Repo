<div id="admin-change-pass-reminder-popup" style="display: flex;"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4 sm:p-6 transition-opacity duration-200 ease-out"
    role="dialog" aria-modal="true" aria-labelledby="changepass-title" aria-describedby="changepass-description">

    <div
        class="relative w-full max-w-sm sm:max-w-md rounded-2xl bg-white p-6 sm:p-8 shadow-2xl transform transition-all duration-200 scale-95">
        <!-- Icon -->
        <div class="flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-16 w-16 sm:h-20 sm:w-20 text-[#575757]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
            </svg>

        </div>

        <!-- Title -->
        <h2 id="changepass-title" class="mt-6 sm:mt-8 text-center text-xl sm:text-2xl font-bold text-[#575757]">
            Change Deafult Password
        </h2>

        <!-- Description -->
        <p id="changepass-description" class="mt-2 text-center text-sm sm:text-base text-gray-600">
            For security reasons, please change your default password. If not done, this could compromise the secutiry of your account.
        </p>

        <!-- Buttons -->
        <div class="mt-8 sm:mt-10 flex flex-col-reverse sm:flex-row justify-center gap-3 sm:gap-5">
            <button type="submit" id="changepass-confirm-btn"
                    class="w-full sm:w-auto px-6 py-2 rounded-full text-white bg-gradient-to-r from-[#FF5656] to-[#DF0606] hover:brightness-110 cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-300">
                    I understand, take me to change.
            </button>
        </div>
    </div>
</div>

<!-- JavaScript to close the popup -->
<script>
    document.addEventListener("DOMContentLoaded", () => {

        document.getElementById('changepass-confirm-btn').addEventListener('click', function() {
            document.getElementById('admin-change-pass-reminder-popup').style.display = 'none';
        });
    });
</script>
