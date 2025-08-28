<div id="confirm-approval-popup" style="display: none;"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4 overflow-auto">
    <div
        class="w-full max-w-[80vw] sm:max-w-[70vw] md:max-w-[55vw] lg:max-w-[35vw] xl:max-w-[25vw] max-h-[90vh] bg-[#fdfdfd] rounded-2xl shadow-xl relative p-4 sm:p-6 md:p-8 overflow-y-auto">

        <!-- Close Button -->
        <button id="ca-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-6 h-6 sm:w-7 sm:h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Step 1 -->
        <div id="ca-step1">
            <div class="flex justify-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                    stroke="#575757" class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>

            <div class="text-center text-lg sm:text-xl md:text-2xl font-semibold mt-6 md:mt-8">
                <span class="text-[#575757]">Confirm submission </span>
                <span class="text-[#28C90E]">approval<span class="text-[#575757]">?</span></span>
            </div>

            <input type="hidden" id="submission-id-holder" />

            <div class="text-center mt-3 sm:mt-4 text-sm sm:text-base text-[#575757]">
                Approval will confirm this submission for the next steps.
            </div>

            <div class="mt-6 sm:mt-10 flex flex-col sm:flex-row justify-center gap-3 sm:gap-5">
                <button id="cancel1-btn"
                    class="px-6 sm:px-8 py-2 sm:py-3 rounded-full text-white bg-gradient-to-r from-[#A4A2A2] to-[#575757] shadow hover:brightness-110">
                    Cancel
                </button>
                <button id="ca-confirm1-btn"
                    class="px-6 sm:px-8 py-2 sm:py-3 rounded-full text-white bg-gradient-to-r from-[#27C50D] to-[#1CA506] shadow hover:brightness-110">
                    Confirm
                </button>
            </div>
        </div>

        <!-- Step 2 -->
        <div id="ca-step2" class="hidden">

            <div class="text-left text-lg sm:text-xl md:text-2xl font-semibold mt-4 sm:mt-6 text-[#575757]">
                Remarks
            </div>

            <textarea id="approve-remarks" placeholder="Remarks"
                class="w-full min-h-[20vh] max-h-[50vh] mt-2 sm:mt-4 px-3 sm:px-4 py-2 sm:py-3 rounded-xl border border-[#575757] text-sm sm:text-base text-[#575757] placeholder-[#575757] focus:outline-none focus:border-[#D56C6C] transition-colors duration-200 resize-none"></textarea>

            <div class="mt-6 sm:mt-8 flex flex-col sm:flex-row justify-center gap-3 sm:gap-5">
                <button id="ca-confirm2-btn"
                    class="px-6 sm:px-8 py-2 sm:py-3 rounded-full text-white bg-gradient-to-r from-[#27C50D] to-[#1CA506] shadow hover:brightness-110 cursor-pointer">
                    Confirm
                </button>
            </div>
        </div>

    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const popup = document.getElementById('confirm-approval-popup');
        const step1 = document.getElementById('ca-step1');
        const step2 = document.getElementById('ca-step2');

        // Step 1 → Step 2
        document.getElementById('ca-confirm1-btn').addEventListener('click', () => {
            step1.classList.add('hidden');
            step2.classList.remove('hidden');
        });

        // Close on Cancel or X
        document.getElementById('ca-close-popup').addEventListener('click', () => {
            popup.style.display = 'none';
            step1.classList.remove('hidden');
            step2.classList.add('hidden');
        });

        document.getElementById('cancel1-btn').addEventListener('click', () => {
            popup.style.display = 'none';
            step1.classList.remove('hidden');
            step2.classList.add('hidden');
        });

        const finalBtn = document.getElementById('ca-confirm2-btn');
        finalBtn.addEventListener('click', () => {

            const remarks = document.getElementById('approve-remarks').value;
            const currentSubmissionId = document.getElementById('submission-id-holder').value;
            console.log('Current Submission ID:', currentSubmissionId);

            if (!remarks) {
                const popup = document.getElementById('universal-x-popup');
                const mainPopup = document.getElementById('confirm-approval-popup');
                const xTopText = document.getElementById('x-topText');
                const xSubText = document.getElementById('x-subText');
                const okBtn = document.getElementById('uniX-confirm-btn');
                xTopText.textContent = "Remarks field is empty";
                xSubText.textContent = "Please enter a remark before confirming.";
                mainPopup.style.display = 'none';
                popup.style.display = 'flex';
                if (okBtn) {
                    okBtn.addEventListener('click', () => {
                        popup.style.display = 'none';
                        mainPopup.style.display = 'flex';
                    });
                }
                return;
            } else {
                finalBtn.disabled = true;
                finalBtn.classList.remove('cursor-pointer');
                finalBtn.classList.add('opacity-50', 'cursor-not-allowed');
                finalBtn.textContent = 'Processing...';
            }

            fetch(`/submission/${currentSubmissionId}/approve`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        remarks
                    })
                })
                .then(res => res.json())
                .then(() => {
                    /* remove the row visually */
                    document.querySelector(`button[data-id="${currentSubmissionId}"]`)
                        ?.closest('tr').remove();

                    const succPopup = document.getElementById('universal-ok-popup');
                    const mainPopup = document.getElementById('confirm-approval-popup');
                    const okTopText = document.getElementById('OKtopText');
                    const okSubText = document.getElementById('OKsubText');
                    const okBtn = document.getElementById('uniOK-confirm-btn');
                    okTopText.textContent = "Successfully Approved Submission!";
                    okSubText.textContent =
                        "The submission has been approved and will proceed to the next steps.";
                    mainPopup.style.display = 'none';
                    succPopup.style.display = 'flex';
                    if (okBtn) {
                        okBtn.addEventListener('click', () => {
                            succPopup.style.display = 'none';
                            mainPopup.style.display = 'none';
                            location.reload();
                        });
                    }
                    document.getElementById('confirm-approval-popup').style.display = 'none';
                });
        });
    });
</script>
