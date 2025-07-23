<div id="confirm-delete-request-popup" style="display: none;"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="relative max-h-[90vh] min-w-[21vw] max-w-[25vw] rounded-2xl bg-[#fffff0] p-8 shadow-xl">

        <!-- Close Button -->
        <button id="cdr-close-popup" class="absolute right-4 top-4 text-[#575757] hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Icon -->
        <div class="mt-13 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="#575757" class="h-20 w-20 rotate-[7.5deg]">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6 10v10a2 2 0 002 2h8a2 2 0 002-2V10M9 10v8m6-8v8M4 6h16M10 6V4a1 1 0 011-1h2a1 1 0 011 1v2" />
            </svg>
        </div>

        <!-- STEP 1 -->
        <div id="cdr-step1">
            <div class="mt-8 text-center text-xl font-semibold">
                <span class="text-[#575757]">Confirm account </span>
                <span class="text-[#ED2828]">deactivation</span>
                <span class="text-[#575757]"> request?</span>
            </div>

            <div class="mt-8 text-center text-base font-light">
                <span class="text-[#575757]">This action is permanent and cannot be undone. All your data will be
                    permanently removed. Are you sure you want to proceed?</span>
            </div>

            <div class="mt-10 flex justify-center space-x-6">
                <button id="cdr-cancel-btn1"
                    class="min-h-[3vw] min-w-[10vw] rounded-full bg-gradient-to-r from-[#A4A2A2] to-[#575757] text-[#fffff0] hover:from-[#cccaca] hover:to-[#888888]">
                    Cancel
                </button>
                <button id="cdr-next-step1"
                    class="min-h-[3vw] min-w-[10vw] rounded-full bg-gradient-to-r from-[#FE5252] to-[#E10C0C] text-[#fffff0] hover:from-[#f87c7c] hover:to-[#e76969]">
                    Confirm
                </button>
            </div>
        </div>

        <!-- STEP 2 -->
        <div id="cdr-step2" class="hidden">
            <div class="mt-8 text-center text-xl font-semibold">
                <span class="text-[#575757]">Deactivation request sent</span>
            </div>

            <div class="mt-8 text-center text-base font-light">
                <span class="text-[#575757]">Sent deletion requests are final and cannot be undone. Once confirmed, all
                    data will be permanently erased.</span>
            </div>

            <div class="mt-10 flex justify-center">
                <button id="cdr-final-close1"
                    class="min-h-[3vw] min-w-[10vw] rounded-full bg-gradient-to-r from-[#A4A2A2] to-[#575757] text-[#fffff0] hover:from-[#cccaca] hover:to-[#888888]">
                    Close
                </button>
            </div>
        </div>

    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const popup = document.getElementById('confirm-delete-request-popup');
        const step1 = document.getElementById('cdr-step1');
        const step2 = document.getElementById('cdr-step2');
        const nextBtn = document.getElementById('cdr-next-step1');
        const cancelBtn = document.getElementById('cdr-cancel-btn1');
        const closeBtn = document.getElementById('cdr-close-popup');
        const finalCloseBtn = document.getElementById('cdr-final-close1');

        document.addEventListener('click', function(e) {
            if (e.target && e.target.id === 'deactivate-user-btn') {
                step1.classList.remove('hidden');
                step2.classList.add('hidden');
                popup.style.display = 'flex';
            }
        });

        // Step 1 → Step 2 (Confirm button)
        nextBtn.addEventListener('click', async function() {
            try {
                nextBtn.disabled = true;
                nextBtn.innerHTML = 'Processing...';

                // Send deactivation request
                const response = await fetch('{{ route('account.deactivate-request') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .content,
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) {
                    throw await response.json();
                }

                // Show success step
                step1.classList.add('hidden');
                step2.classList.remove('hidden');

            } catch (error) {
                console.error('Deactivation failed:', error);
                alert(error.message || 'Failed to process deactivation request');
            } finally {
                nextBtn.disabled = false;
                nextBtn.innerHTML = 'Confirm';
            }
        });

        // Close handlers
        [cancelBtn, closeBtn, finalCloseBtn].forEach(btn => {
            btn.addEventListener('click', () => {
                popup.style.display = 'none';
            });
        });
    });
</script>
