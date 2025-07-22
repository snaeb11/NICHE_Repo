<x-popups.upload-thesis-m/>

<div id="user-add-submission-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
    <div id="uea-step1" class="min-w-[30vw] max-w-[645vw] max-h-[90vh] bg-[#fffff0] rounded-2xl shadow-xl relative p-8">

        <!-- Close Button -->
        <button id="uas-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="text-center mt-5 text-3xl font-semibold">
            <span class="text-[#575757]">Add submission</span>
        </div>

        <form action="">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mt-10">
                <input id="uas-title" type="text" placeholder="First Name"
                    class="h-[65px] w-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />

                <input id="uas-author" type="text" placeholder="Last Name"
                    class="h-[65px] w-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />
                
                <textarea id="remarks" placeholder="Remarks"
                    class="max-h-[50vh] min-h-[20vh] w-full rounded-[10px] border border-[#575757] px-4 py-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none"></textarea>

                <button type="button" id="uas-upload-btn" class=" py-2 px-2 rounded-full w-25 text-[#fffff0] bg-gradient-to-r from-[#FFC260] to-[#FF9F02] shadow hover:brightness-110 cursor-pointer">
                    Upload file
                </button>

                <!-- dispay when fikle is chosen -->
                <div id="uploaded-file" class="hidden items-center space-x-2 ml-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="#575757" class="w-10 h-10">
                    <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    <span id="uas-file-name" class="text-[#575757] text-sm mt-2 font-semibold"></span>
                </div>
            </div>

            <div class="mt-10 flex justify-center">
                <button id="uas-confirm-btn" class="px-10 py-4 rounded-full text-[#fffff0] bg-gradient-to-r from-[#27C50D] to-[#1CA506] shadow hover:brightness-110 cursor-pointer">
                    Confirm
                </button>
            </div>
        </form>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const uploadBtn = document.getElementById('uas-upload-btn');
        const uploadedFile = document.getElementById('uploaded-file');
        const closeBtn = document.getElementById('uas-close-popup');

        //close
        closeBtn.addEventListener('click', () => {
            document.getElementById('user-add-submission-popup').style.display = 'none';
        })

        //upload thesis popup
        const uploadThesisPopup = document.getElementById('upload-thesis-popup'); 
        const uploadConfirm = document.getElementById('pt-confirm-btn');

        uploadBtn.addEventListener('click', () => {
            document.getElementById('user-add-submission-popup').style.display = 'none';
            uploadThesisPopup.style.display = 'flex';

            uploadConfirm.addEventListener('click', () =>{
                document.getElementById('user-add-submission-popup').style.display = 'flex';
                uploadThesisPopup.style.display = 'none';
                document.getElementById('uploaded-file').textContent = `Selected: ${file.name}`;
            })
        })


    });
</script>




