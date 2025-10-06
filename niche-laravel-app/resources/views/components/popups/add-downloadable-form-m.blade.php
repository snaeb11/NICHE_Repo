<x-popups.universal-ok-m />
<x-popups.universal-x-m />

<div id="add-downloadable-form-popup" style="display: none;"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="relative max-h-[90vh] w-[700px] rounded-2xl bg-[#fdfdfd] p-8 shadow-xl">

        <!-- Close Button -->
        <button id="adf-close-popup" class="absolute right-4 top-4 text-[#575757] hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Header -->
        <div class="text-center">
            <h2 class="mt-3 text-2xl font-bold text-gray-900">Add New Form</h2>
            <p class="text-normal font-regular text-center">Enter form details</p>
        </div>

        <form id="add-downloadable-form-form" class="mt-6 space-y-6">
            @csrf

            <div class="space-y-4">
                <!-- Form Title -->
                <div>
                    <label for="adf-title" class="block text-sm font-medium text-gray-700">Form Type</label>
                    <input id="adf-title" name="title" type="text" placeholder="Enter form type"
                        class="mt-1 block w-full rounded-lg border border-[#575757] px-4 py-3 font-light text-[#575757] placeholder-gray-400 transition-colors duration-200 focus:outline-none"
                        required />
                </div>

                <!-- Form URL -->
                <div>
                    <label for="adf-url" class="block text-sm font-medium text-gray-700">Form URL</label>
                    <input id="adf-url" name="url" type="url" placeholder="https://example.com/form.pdf"
                        class="mt-1 block w-full rounded-lg border border-[#575757] px-4 py-3 font-light text-[#575757] placeholder-gray-400 transition-colors duration-200 focus:outline-none"
                        required />
                </div>

                <!-- Category Selection -->
                <div>
                    <label for="adf-category" class="block text-sm font-medium text-gray-700">Category</label>
                    <div class="relative">
                        <select id="adf-category" name="category"
                            class="mt-1 block w-full appearance-none rounded-lg border border-[#575757] px-4 py-3 pr-10 font-light text-[#575757] transition-colors duration-200 focus:outline-none"
                            required>
                            <option value="">Select category</option>
                            <option value="rndd_forms">R&DD Forms</option>
                            <option value="moa_forms">MOA Forms</option>
                        </select>
                        <div
                            class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 transform text-[#575757]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex justify-center space-x-6">
                <button id="adf-cancel-btn" type="button"
                    class="cursor-pointer rounded-full bg-gradient-to-r from-[#A4A2A2] to-[#575757] px-6 py-2.5 text-base text-[#fdfdfd] hover:brightness-110">
                    Cancel
                </button>

                <button id="adf-confirm-btn" type="submit"
                    class="cursor-pointer rounded-full bg-gradient-to-r from-[#27C50D] to-[#1CA506] px-6 py-2.5 text-base text-[#fdfdfd] hover:brightness-110">
                    Add Form
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const addFormPopup = document.getElementById('add-downloadable-form-popup');
        const addFormForm = document.getElementById('add-downloadable-form-form');
        const titleInput = document.getElementById('adf-title');
        const urlInput = document.getElementById('adf-url');
        const categorySelect = document.getElementById('adf-category');
        const confirmBtn = document.getElementById('adf-confirm-btn');

        // Open popup when add form button is clicked
        document.addEventListener('click', function(e) {
            if (e.target?.id === 'add-form-btn') {
                addFormPopup.style.display = 'flex';
                resetForm();
            }
        });

        // Input sanitization for form title
        titleInput?.addEventListener('input', function() {
            const original = this.value;
            let sanitized = original.replace(/[^A-Za-z0-9 \-&\/().]/g, '');
            sanitized = sanitized.replace(/\s{2,}/g, ' ');
            if (sanitized !== original) this.value = sanitized;
        });

        // Input sanitization for form URL
        urlInput?.addEventListener('input', function() {
            const original = this.value;
            let sanitized = original.replace(/[<>]/g, '');
            if (sanitized !== original) this.value = sanitized;
        });

        // Close popup handlers
        document.getElementById('adf-close-popup')?.addEventListener('click', () => {
            addFormPopup.style.display = 'none';
            resetForm();
        });

        document.getElementById('adf-cancel-btn')?.addEventListener('click', (e) => {
            e.preventDefault();
            addFormPopup.style.display = 'none';
            resetForm();
        });

        // Helper functions for universal modals
        function showSuccess(message) {
            const okTop = document.getElementById('OKtopText');
            const okSub = document.getElementById('OKsubText');
            const okPopup = document.getElementById('universal-ok-popup');
            if (okTop) okTop.textContent = "Success!";
            if (okSub) okSub.textContent = message;
            if (okPopup) okPopup.style.display = 'flex';
        }

        function showError(message) {
            const xTop = document.getElementById('x-topText');
            const xSub = document.getElementById('x-subText');
            const xPopup = document.getElementById('universal-x-popup');
            if (xTop) xTop.textContent = "Error!";
            if (xSub) xSub.textContent = message;
            if (xPopup) xPopup.style.display = 'flex';
        }

        // Function to reset form
        function resetForm() {
            addFormForm.reset();
        }

        // Form submission
        addFormForm?.addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const title = formData.get('title')?.trim();
            const url = formData.get('url')?.trim();
            const category = formData.get('category');

            if (!title || !url || !category) {
                showError('Please fill in all required fields.');
                return;
            }

            // Basic URL validation
            try {
                new URL(url);
            } catch {
                showError('Please enter a valid URL.');
                return;
            }

            // Disable submit button and show loading
            const originalText = confirmBtn.innerHTML;
            confirmBtn.disabled = true;
            confirmBtn.innerHTML = `
                <span class="inline-block h-4 w-4 animate-spin rounded-full border-2 border-solid border-white border-r-transparent"></span>
                Adding...
            `;

            try {
                const body = new URLSearchParams(formData);

                const response = await fetch('/admin/downloadable-forms', {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .content,
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body
                });

                const responseData = await response.json();

                if (response.ok) {
                    showSuccess('Form added successfully!');
                    addFormPopup.style.display = 'none';
                    resetForm();

                    // Trigger page refresh or reload forms list
                    if (typeof loadForms === 'function') {
                        loadForms();
                    } else {
                        window.location.reload();
                    }
                } else {
                    const errorMessage = responseData?.message ||
                        'Failed to add form. Please try again.';
                    showError(errorMessage);
                }
            } catch (error) {
                console.error('Error:', error);
                showError('Network error. Please check your connection and try again.');
            } finally {
                confirmBtn.disabled = false;
                confirmBtn.innerHTML = originalText;
            }
        });

        // Universal modal close handlers
        document.getElementById('uniOK-confirm-btn')?.addEventListener('click', () => {
            document.getElementById('universal-ok-popup').style.display = 'none';
        });

        document.getElementById('uniX-confirm-btn')?.addEventListener('click', () => {
            document.getElementById('universal-x-popup').style.display = 'none';
        });
    });
</script>
