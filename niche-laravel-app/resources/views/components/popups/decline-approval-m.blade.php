<div id="confirm-rejection-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
    
    <div class="min-w-[20svw] max-w-[25vw] max-h-[90vh] bg-[#fdfdfd] rounded-2xl shadow-xl relative p-8">
        <button id="cr-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button> 
        
        <div id="cr-step1">
            <div class="flex justify-center mt-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="#575757" class="w-30 h-30">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>

            <div class="text-center text-xl font-semibold mt-10">
                <span class="text-[#575757]">Confirm submission</span>
                <span class="text-[#ED2828]">rejection<span class="text-[#575757]">?</span></span>
                
            </div>

            
            <input type="hidden" id="submission-id-holder" />

            <div class="text-center mt-5 text-normal font-regular">
                <span class="text-[#575757]">Rejection will remove this submission from further consideration.</span>
            </div>

            <div class="mt-20 flex justify-center gap-5">
                <button id="cr-cancel1-btn" class="px-10 py-4 rounded-full text-[#fdfdfd] bg-gradient-to-r from-[#A4A2A2] to-[#575757] shadow hover:brightness-110 cursor-pointer">
                    Cancel
                </button>
                <button id="cr-confirm1-btn" class="px-10 py-4 rounded-full text-[#fdfdfd] bg-gradient-to-r from-[#FE5252] to-[#E10C0C] shadow hover:brightness-110 cursor-pointer">
                    Confirm
                </button>
            </div>
        </div>
        <div id="cr-step2" class=" hidden">
            <div class="flex justify-center mt-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="#575757" class="w-25 h-25">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>

            <div class="text-left text-xl font-semibold mt-5">
                <span class="text-[#575757]">Remarks</span>
            </div>
            <textarea id="reject-remarks" placeholder="Remarks"
                    class="max-h-[50vh] min-h-[20vh] w-full rounded-[10px] border border-[#575757] mt-5 px-4 py-2 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"></textarea>

            <div class="mt-10 flex justify-center gap-5">
                <button id="cr-confirm2-btn" class="px-10 py-4 rounded-full text-[#fdfdfd] bg-gradient-to-r from-[#FE5252] to-[#E10C0C] shadow hover:brightness-110 cursor-pointer">
                    Confirm
                </button>
            </div>
        </div>
    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const popup = document.getElementById('confirm-rejection-popup');
    const step1 = document.getElementById('cr-step1');
    const step2 = document.getElementById('cr-step2');

    // Step 1 → Step 2
    document.getElementById('cr-confirm1-btn').addEventListener('click', () => {
      step1.classList.add('hidden');
      step2.classList.remove('hidden');
    });

    // Close on Cancel or X
    document.getElementById('cr-close-popup').addEventListener('click', () => {
      popup.style.display = 'none';
      step1.classList.remove('hidden');
      step2.classList.add('hidden');
    });

    document.getElementById('cr-cancel1-btn').addEventListener('click', () => {
      popup.style.display = 'none';
      step1.classList.remove('hidden');
      step2.classList.add('hidden');
    });

    document.getElementById('cr-confirm2-btn').addEventListener('click', () => {
        const remarks = document.getElementById('reject-remarks').value;
        const currentSubmissionId = document.getElementById('submission-id-holder').value;
                                console.log('Current Submission ID:', currentSubmissionId);

        if (!remarks) {
            alert('Please enter a remark before confirming.');
            return;
        }

        fetch(`/submission/${currentSubmissionId}/reject`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ remarks })
        })
        .then(res => res.json())
        .then(() => {
            /* remove the row visually */
            document.querySelector(`button[data-id="${currentSubmissionId}"]`)
                    ?.closest('tr').remove();

            document.getElementById('confirm-rejection-popup').style.display = 'none';
        });
    });
  });
</script>

