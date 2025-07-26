<x-popups.upload-thesis-success-m />
<x-popups.upload-thesis-fail-m />

<div id="user-add-submission-popup" style="display: none;"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div id="uea-step1" class="relative max-h-[90vh] min-w-[30vw] max-w-[645vw] rounded-2xl bg-[#fffff0] p-8 shadow-xl">

        <!-- Close Button -->
        <button id="uas-close-popup" class="absolute right-4 top-4 text-[#575757] hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Header -->
        <div class="text-center">
            <h2 class="mt-3 text-2xl font-bold text-gray-900">Add New Submission</h2>
            <p class="text-normal font-regular text-center">Enter your thesis details</p>
        </div>

        <form id="thesis-submission-form" class="mt-2 space-y-6" method="POST" action="{{ route('thesis.submit') }}"
            enctype="multipart/form-data">
            @csrf

            <div class="space-y-1">
                <!-- Title -->
                <label for="uas-title" class="block text-sm font-medium text-gray-700">Title</label>
                <input id="uas-title" name="title" type="text" placeholder="Thesis Title"
                    class="mt-1 block w-full rounded-lg border border-[#575757] px-4 py-3 font-light text-[#575757] placeholder-gray-400 transition-colors duration-200 focus:outline-none"
                    required />

                <!-- Adviser -->
                <label for="uas-adviser" class="block text-sm font-medium text-gray-700">Adviser</label>
                <input id="uas-adviser" name="adviser" type="text" placeholder="Adviser's Name"
                    class="mt-1 block w-full rounded-lg border border-[#575757] px-4 py-3 font-light text-[#575757] placeholder-gray-400 transition-colors duration-200 focus:outline-none"
                    required />

                <!-- Authors -->
                <label for="uas-authors" class="block text-sm font-medium text-gray-700">Author/s</label>
                <input id="uas-authors" name="authors" type="text" placeholder="Author Names (comma separated)"
                    class="mt-1 block w-full rounded-lg border border-[#575757] px-4 py-3 font-light text-[#575757] placeholder-gray-400 transition-colors duration-200 focus:outline-none"
                    required />

                <!-- Abstract -->
                <label for="uas-abstract" class="block text-sm font-medium text-gray-700">Abstract</label>
                <textarea id="uas-abstract" name="abstract" placeholder="Enter abstract here"
                    class="mt-1 block max-h-[25vh] min-h-[15vh] w-full overflow-y-auto rounded-lg border border-[#575757] px-4 py-3 pr-5 font-light text-[#575757] placeholder-gray-400 transition-colors duration-200 focus:outline-none"
                    rows="5" required></textarea>

                <!-- File Upload -->
                <div class="mt-5">
                    <label class="block text-sm font-medium text-gray-700">Manuscript (PDF only)</label>
                    <p class="mb-2 text-xs italic text-gray-500">Please upload the final version of your manuscript in
                        PDF
                        format.</p>

                    <div class="flex items-center gap-3">
                        <!-- Hidden file input -->
                        <input type="file" id="uas-file-input" name="document" class="hidden" accept=".pdf"
                            required>

                        <!-- Upload button -->
                        <button type="button" id="uas-upload-btn"
                            class="w-auto cursor-pointer rounded-full bg-gradient-to-r from-[#FFC260] to-[#FF9F02] px-4 py-2 text-sm text-[#fffff0] shadow hover:brightness-110">
                            Choose File
                        </button>

                        <!-- File display area -->
                        <div id="uploaded-file" class="flex items-center space-x-2">
                            <span id="uas-file-name"
                                class="max-w-[180px] truncate text-sm font-medium text-[#575757]"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10 flex justify-center space-x-6">
                <button id="uas-cancel-btn" type="button"
                    class="min-h-[3vw] min-w-[10vw] cursor-pointer rounded-full bg-gradient-to-r from-[#A4A2A2] to-[#575757] text-[#fffff0] hover:brightness-110">
                    Cancel
                </button>
                <button id="uas-confirm-btn" type="submit"
                    class="min-h-[3vw] min-w-[10vw] cursor-pointer rounded-full bg-gradient-to-r from-[#27C50D] to-[#1CA506] text-[#fffff0] hover:brightness-110">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const submissionPopup = document.getElementById('user-add-submission-popup');
        const submissionForm = document.getElementById('thesis-submission-form');
        const successModal = document.getElementById('upload-thesis-success');
        const errorModal = document.getElementById('upload-thesis-fail');
        const errorMessage = document.getElementById('upload-thesis-fail-message');
        const fileInput = document.getElementById('uas-file-input');
        const uploadBtn = document.getElementById('uas-upload-btn');
        const uploadedFile = document.getElementById('uploaded-file');
        const fileNameDisplay = document.getElementById('uas-file-name');

        // Open popup when add submission button is clicked
        document.addEventListener('click', function(e) {
            if (e.target?.id === 'add-submission-btn') {
                submissionPopup.style.display = 'flex';
            }
        });

        // Close popup handlers
        document.getElementById('uas-close-popup')?.addEventListener('click', () => {
            submissionPopup.style.display = 'none';
        });

        document.getElementById('uas-cancel-btn')?.addEventListener('click', (e) => {
            e.preventDefault();
            submissionPopup.style.display = 'none';
        });

        // File upload handling
        uploadBtn.addEventListener('click', () => {
            fileInput.click();
        });

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                fileNameDisplay.textContent = file.name;
                uploadedFile.classList.remove('hidden');
            }
        });

        // Form submission
        submissionForm?.addEventListener('submit', async function(e) {
            e.preventDefault();
            const submitBtn = document.getElementById('uas-confirm-btn');
            const originalText = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <span class="inline-block h-4 w-4 animate-spin rounded-full border-2 border-solid border-white border-r-transparent"></span>
                Submitting...
            `;

            try {
                const formData = new FormData(this);

                const response = await fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .content,
                    },
                    body: formData,
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw errorData;
                }

                // On success
                submissionPopup.style.display = 'none';
                successModal.style.display = 'flex';

            } catch (error) {
                console.error('Error:', error);

                // Set error message
                if (error.errors) {
                    let errorText = '<ul class="text-left">';
                    for (const [field, messages] of Object.entries(error.errors)) {
                        errorText += `<li class="text-sm">• ${messages.join(', ')}</li>`;
                    }
                    errorText += '</ul>';
                    errorMessage.innerHTML = errorText;
                } else {
                    errorMessage.textContent = error.message || 'An unexpected error occurred';
                }

                // Show error modal
                submissionPopup.style.display = 'none';
                errorModal.style.display = 'flex';
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        });

        // Success modal handlers
        document.getElementById('success-modal-close')?.addEventListener('click', () => {
            document.getElementById('upload-thesis-success').style.display = 'none';
        });

        document.getElementById('success-modal-ok-btn')?.addEventListener('click', () => {
            document.getElementById('upload-thesis-success').style.display = 'none';
            window.location.reload();
        });

        // Fail modal handlers
        document.getElementById('fail-modal-close')?.addEventListener('click', () => {
            document.getElementById('upload-thesis-fail').style.display = 'none';
        });

        document.getElementById('fail-modal-ok-btn')?.addEventListener('click', () => {
            document.getElementById('upload-thesis-fail').style.display = 'none';
        });
    });
</script>
