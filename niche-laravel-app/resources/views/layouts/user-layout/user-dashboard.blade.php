@extends('layouts.template.base', ['cssClass' => 'bg-[#fffff0] text-gray-900'])
@section('title', 'Dashboard')

@section('childContent')
    <x-layout-partials.header />
    <x-popups.logout-m />
    <x-popups.confirm-delete-request-m />
    <x-popups.user-edit-acc-m />
    <x-popups.user-add-submission-m />
    <x-popups.password-change-success-m />
    <x-popups.password-change-fail-m />

    <div class="flex w-screen flex-grow justify-center">
        <div id="user-dashboard-container">
            <div id="user-dashboard" class="pb-15 flex w-full max-w-screen-xl flex-col gap-6 p-4 pt-10 md:flex-row">

                <!-- Left Side: Pending Submissions -->
                <div class="flex w-full flex-col space-y-2 md:w-1/2">
                    <div class="flex items-center justify-between">
                        <span class="text-3xl font-semibold text-[#575757]">Pending Submissions</span>
                        <div class="space-x-2">
                            <button id="user-add-submission-btn"
                                class="rounded bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] px-2 py-1 text-sm font-semibold text-[#fffff0] shadow hover:brightness-110">Add
                                submission</button>
                            <button id="user-history-btn"
                                class="rounded bg-gradient-to-r from-[#FFC360] to-[#FFA104] px-2 py-1 text-sm font-semibold text-[#fffff0] shadow hover:brightness-110">History</button>
                        </div>
                    </div>

                    <!-- Make this a vertical flex container -->
                    <div class="border-1 flex h-full min-h-[450px] flex-col rounded-lg border-[#a1a1a1] p-6">

                        <!-- Submission content can grow -->
                        <div id="submission-content" class="flex-1 space-y-5">
                            <!-- JavaScript will inject content here -->
                        </div>

                        <!-- Dot Pagination anchored to the bottom -->
                        <div id="pagination-dots" class="mt-auto flex justify-center space-x-2 pt-6">
                            <!-- Dots inserted by JS -->
                        </div>
                    </div>
                </div>

                <!-- Right Side: Personal Info + Change Password -->
                <div class="flex w-full flex-col gap-4 md:w-1/2">

                    <!-- Personal Information -->
                    <div class="flex flex-col space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-3xl font-semibold text-[#575757]">Personal information</span>
                            <div class="space-x-2">
                                <button id="edit-user-btn"
                                    class="cursor-pointer rounded bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] px-2 py-1 text-sm font-semibold text-[#fffff0] shadow hover:brightness-110">Edit</button>
                                <button id="deactivate-user-btn"
                                    class="cursor-pointer rounded bg-gradient-to-r from-[#FF5656] to-[#DF0606] px-2 py-1 text-sm font-semibold text-[#fffff0] shadow hover:brightness-110">Deactivate</button>
                            </div>
                        </div>
                        <div class="border-1 rounded-lg border-[#a1a1a1] p-6">
                            <div class="flex-col">
                                <span class="font-light text-[#8a8a8a]">Name</span><br>
                                <span class="text-2xl font-bold text-[#575757]">
                                    {{ strtoupper(auth()->user()->getAttribute('last_name')) }},
                                    {{ auth()->user()->first_name }}
                                </span>
                            </div>
                            <div class="h-3"></div>
                            <div class="flex-col">
                                <span class="font-light text-[#8a8a8a]">Email address</span><br>
                                <span class="text-2xl font-bold text-[#575757]">{{ auth()->user()->email }}</span>
                            </div>
                            <div class="h-3"></div>
                            <div class="flex-col">
                                <span class="font-light text-[#8a8a8a]">Program</span><br>
                                <span class="text-2xl font-bold text-[#575757]">
                                    @if (auth()->user()->program)
                                        {{ auth()->user()->program->name }}
                                    @else
                                        No program assigned
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Change Password -->
                    <div class="border-1 rounded-lg border-[#a1a1a1] p-6">
                        <div>
                            <span class="text-center text-2xl font-semibold text-[#575757]">Change password</span>
                        </div>
                        <div class="h-3"></div>
                        <form id="password-change-form" method="POST" action="{{ route('password.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="flex flex-col gap-6 px-6 md:flex-row">
                                <!-- Left: Inputs -->
                                <div id="input-fields" class="flex w-full flex-col space-y-4 md:w-1/2">
                                    <input id="current-password" name="current_password" type="password"
                                        placeholder="Current password" required
                                        class="h-[50px] rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />
                                    <div id="current-password-error" class="hidden text-sm text-red-500"></div>

                                    <input id="new-password" name="new_password" type="password" placeholder="New password"
                                        required
                                        class="h-[50px] rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />
                                    <div id="new-password-error" class="hidden text-sm text-red-500"></div>

                                    <input id="confirm-password" name="new_password_confirmation" type="password"
                                        placeholder="Confirm password" required
                                        class="h-[50px] rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />
                                    <div id="confirm-password-error" class="hidden text-sm text-red-500"></div>

                                    <label
                                        class="flex items-center justify-end space-x-2 text-sm font-light text-[#575757]">
                                        <input type="checkbox" id="show-password-toggle"
                                            class="h-4 w-4 accent-[#575757] hover:cursor-pointer" />
                                        <span class="hover:cursor-pointer">Show password</span>
                                    </label>
                                </div>

                                <!-- Right: Requirements -->
                                <div id="requirements" class="flex w-full flex-col space-y-4 rounded-lg pl-7 md:w-1/2">
                                    <span class="text-sm font-semibold text-[#575757]">New password must contain the
                                        following:</span>
                                    <div id="password-requirements"
                                        class="ml-4 space-y-2 text-sm font-light text-[#575757]">
                                        <div class="flex items-center space-x-2">
                                            <div id="circle-length" class="h-3 w-3 rounded-full bg-gray-300"></div>
                                            <span>Minimum of 8 characters</span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <div id="circle-uppercase" class="h-3 w-3 rounded-full bg-gray-300"></div>
                                            <span>An uppercase letter</span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <div id="circle-lowercase" class="h-3 w-3 rounded-full bg-gray-300"></div>
                                            <span>A lowercase letter</span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <div id="circle-number" class="h-3 w-3 rounded-full bg-gray-300"></div>
                                            <span>A number</span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <div id="circle-special" class="h-3 w-3 rounded-full bg-gray-300"></div>
                                            <span>A special character</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 flex justify-center">
                                <button id="user-submit-btn" type="submit"
                                    class="w-full max-w-xs rounded-full bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] px-6 py-3 font-semibold text-[#fffff0] transition duration-200 hover:cursor-pointer hover:brightness-110">
                                    Change password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="user-history-container" class="pl-15 pr-15 hidden w-screen">
                <!-- user history table -->
                <main id="user-history-table" class="flex w-full flex-col pt-10 transition-all duration-300 ease-in-out">
                    <div class="mb-4 flex items-center justify-between">
                        <h1 class="text-2xl font-bold text-[#575757]">Submission History</h1>

                        <div class="space-x-2">
                            <button id="user-back-btn"
                                class="rounded bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] px-2 py-1 text-sm font-semibold text-[#fffff0] shadow hover:brightness-110">Back</button>
                        </div>
                    </div>

                    <div class="rounded-lg bg-[#fffff0] p-4 shadow">
                        <table class="w-full divide-y divide-gray-200">
                            <thead class="bg-[#fffff0]">
                                <tr>
                                    <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                        data-column="0" data-order="asc" onclick="sortTable(this)">
                                        Title
                                    </th>
                                    <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                        data-column="0" data-order="asc" onclick="sortTable(this)">
                                        Authors/s
                                    </th>
                                    <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                        data-column="0" data-order="asc" onclick="sortTable(this)">
                                        Abstract
                                    </th>
                                    <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                        data-column="0" data-order="asc" onclick="sortTable(this)">
                                        Date Submitted
                                    </th>
                                    <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                        data-column="0" data-order="asc" onclick="sortTable(this)">
                                        Date Reviewed
                                    </th>
                                    <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                        data-column="0" data-order="asc" onclick="sortTable(this)">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="logs-table-body" class="bg-[#fffff0]] divide-y divide-gray-200 text-[#575757]">
                                <tr>
                                    <td class="whitespace-nowrap px-6 py-4">Mark Cuban</td>
                                    <td class="whitespace-nowrap px-6 py-4">Approved submission</td>
                                    <td class="whitespace-nowrap px-6 py-4">Submissions</td>
                                    <td class="whitespace-nowrap px-6 py-4">2</td>
                                    <td class="whitespace-nowrap px-6 py-4">July 04, 2025 11:31</td>
                            </tbody>
                        </table>
                    </div>

                    <div id="pagination-controls-logs" class="mt-4 flex justify-end space-x-2">
                        <button onclick="changePage('logs', -1)"
                            class="rounded bg-gray-300 px-3 py-1 hover:bg-gray-400">&lt;</button>
                        <span id="pagination-info-logs" class="px-3 py-1 text-[#575757]">Page 1</span>
                        <button onclick="changePage('logs', 1)"
                            class="rounded bg-gray-300 px-3 py-1 hover:bg-gray-400">&gt;</button>
                    </div>

                </main>
            </div>
        </div>
    </div>
    <x-layout-partials.footer />
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Dashboard/History Toggle
            const historyBtn = document.getElementById('user-history-btn');
            const backBtn = document.getElementById('user-back-btn');
            const userDashboard = document.getElementById('user-dashboard');
            const userHistory = document.getElementById('user-history-container');

            historyBtn.addEventListener('click', () => {
                userDashboard.classList.add('hidden');
                userHistory.classList.remove('hidden');
            });

            backBtn.addEventListener('click', () => {
                userHistory.classList.add('hidden');
                userDashboard.classList.remove('hidden');
            });

            // Add Submission Popup
            const addSubmissionBtn = document.getElementById('user-add-submission-btn');
            const addSubmissionPopup = document.getElementById('user-add-submission-popup');
            addSubmissionBtn.addEventListener('click', () => {
                addSubmissionPopup.style.display = 'flex';
            });

            // Edit User Popup
            const editUserBtn = document.getElementById('edit-user-btn');
            const editPopup = document.getElementById('user-edit-account-popup');
            const confirmBtn = document.getElementById('uea-confirm-btn');
            const closeButton = document.getElementById('uea-close-popup');

            editUserBtn.addEventListener('click', () => {
                editPopup.style.display = 'flex';
            });

            confirmBtn.addEventListener('click', () => {
                handleFormSubmit();
                document.getElementById('uea-first-name').value = "";
                document.getElementById('uea-last-name').value = "";
            });

            closeButton.addEventListener('click', () => {
                editPopup.style.display = 'none';
                document.getElementById('uea-first-name').value = "";
                document.getElementById('uea-last-name').value = "";
                document.getElementById('uea-usep-email').value = "";
            });

            // Sanitation Function
            function sanitizeInput(value) {
                const temp = document.createElement('div');
                temp.innerText = value;
                return temp.innerHTML.trim();
            }

            function handleFormSubmit() {
                const firstName = sanitizeInput(document.getElementById('uea-first-name').value);
                const lastName = sanitizeInput(document.getElementById('uea-last-name').value);

                console.log("Sanitized values:", {
                    firstName,
                    lastName
                });
                document.getElementById('user-edit-account-popup').style.display = 'none';
            }

            // Deactivate User
            const deactivateAcc = document.getElementById('deactivate-user-btn');
            const deactivateWarnPoup = document.getElementById('confirm-delete-request-popup');

            deactivateAcc.addEventListener('click', () => {
                const step1 = document.getElementById('cdr-step1');
                const step2 = document.getElementById('cdr-step2');

                step1.classList.remove('hidden');
                step2.classList.add('hidden');
                deactivateWarnPoup.style.display = 'flex';
            });

            // Password Change Functionality
            const passwordForm = document.getElementById('password-change-form');
            const currentPassword = document.getElementById('current-password');
            const newPassword = document.getElementById('new-password');
            const confirmPassword = document.getElementById('confirm-password');
            const showPasswordToggle = document.getElementById('show-password-toggle');
            const submitBtn = document.getElementById('user-submit-btn');

            // Password requirement circles
            const lengthCircle = document.getElementById('circle-length');
            const upperCircle = document.getElementById('circle-uppercase');
            const lowerCircle = document.getElementById('circle-lowercase');
            const numberCircle = document.getElementById('circle-number');
            const specialCircle = document.getElementById('circle-special');

            // Error divs
            const currentError = document.getElementById('current-password-error');
            const newError = document.getElementById('new-password-error');
            const confirmError = document.getElementById('confirm-password-error');

            // Toggle password visibility for all password fields
            showPasswordToggle.addEventListener('change', function() {
                const type = this.checked ? 'text' : 'password';
                currentPassword.type = type;
                newPassword.type = type;
                confirmPassword.type = type;
            });

            // Validate password in real-time
            newPassword.addEventListener('input', function() {
                const password = this.value;

                // Check requirements
                const hasLength = password.length >= 8;
                const hasUpper = /[A-Z]/.test(password);
                const hasLower = /[a-z]/.test(password);
                const hasNumber = /[0-9]/.test(password);
                const hasSpecial = /[^A-Za-z0-9]/.test(password);

                // Update circles
                updateCircle(lengthCircle, hasLength);
                updateCircle(upperCircle, hasUpper);
                updateCircle(lowerCircle, hasLower);
                updateCircle(numberCircle, hasNumber);
                updateCircle(specialCircle, hasSpecial);

                // Clear error when typing
                newError.classList.add('hidden');
            });

            // Confirm password match
            confirmPassword.addEventListener('input', function() {
                if (this.value && newPassword.value !== this.value) {
                    confirmError.textContent = 'Passwords do not match';
                    confirmError.classList.remove('hidden');
                } else {
                    confirmError.classList.add('hidden');
                }
            });

            // Form submission
            passwordForm.addEventListener('submit', async function(e) {
                e.preventDefault();

                // Reset errors
                currentError.classList.add('hidden');
                newError.classList.add('hidden');
                confirmError.classList.add('hidden');

                // Basic client-side validation
                if (!currentPassword.value) {
                    currentError.textContent = 'Current password is required';
                    currentError.classList.remove('hidden');
                    return;
                }

                if (!newPassword.value) {
                    newError.textContent = 'New password is required';
                    newError.classList.remove('hidden');
                    return;
                }

                if (newPassword.value !== confirmPassword.value) {
                    confirmError.textContent = 'Passwords do not match';
                    confirmError.classList.remove('hidden');
                    return;
                }

                // Disable button during submission
                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Changing...';

                try {
                    const response = await fetch(passwordForm.action, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .content,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            current_password: currentPassword.value,
                            new_password: newPassword.value,
                            new_password_confirmation: confirmPassword.value
                        })
                    });

                    const data = await response.json();

                    if (!response.ok) {
                        throw data;
                    }

                    // Show success modal
                    document.getElementById('password-change-success-popup').style.display = 'flex';

                    // Reset form
                    passwordForm.reset();
                    resetCircles();

                } catch (error) {
                    // Show fail modal with error message
                    const failModal = document.getElementById('password-change-fail-popup');
                    const failMessage = document.getElementById('password-fail-message');

                    if (error.errors) {
                        if (error.errors.current_password) {
                            currentError.textContent = error.errors.current_password[0];
                            currentError.classList.remove('hidden');
                        }
                        if (error.errors.new_password) {
                            newError.textContent = error.errors.new_password[0];
                            newError.classList.remove('hidden');
                        }

                        failMessage.textContent = 'Password change failed.';
                    } else {
                        failMessage.textContent = error.message ||
                            'An error occurred while changing your password';
                    }

                    failModal.style.display = 'flex';
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = 'Change password';
                }
            });

            function updateCircle(circle, isValid) {
                circle.style.backgroundColor = isValid ? '#10B981' : '#D1D5DB';
            }

            function resetCircles() {
                [lengthCircle, upperCircle, lowerCircle, numberCircle, specialCircle].forEach(circle => {
                    circle.style.backgroundColor = '#D1D5DB';
                });
            }

            // Submissions Display
            const submissions = [{
                    title: "SmartFarm: An IoT-Based Monitoring System for Sustainable Agriculture",
                    authors: ["Maria L. Santos", "John P. Dela Cruz", "Angela M. Reyes"],
                    abstract: "This study presents SmartFarm, an IoT-based solution designed to monitor soil moisture, temperature, and humidity in real time to aid small-scale Filipino farmers..."
                },
                {
                    title: "AquaGuard: AI-Based Water Quality Monitoring System",
                    authors: ["Vincent Kyle Arsenio", "Janna Esmeralda"],
                    abstract: "AquaGuard combines IoT sensors and AI to detect early signs of fish kill by monitoring water temperature, turbidity, and pH levels in aquaculture setups..."
                },
            ];

            let currentIndex = 0;

            function renderSubmission(index) {
                const data = submissions[index];
                const content = document.getElementById('submission-content');

                content.innerHTML = `
            <div>
                <span class="font-light text-[#8a8a8a]">Title</span><br>
                <span class="font-bold text-2xl text-[#575757]">${data.title}</span>
            </div>
            <div>
                <span class="font-light text-[#8a8a8a]">Author/s</span><br>
                <span class="font-bold text-lg text-[#575757]">${data.authors.join("<br>")}</span>
            </div>
            <div>
                <span class="font-light text-[#8a8a8a]">Abstract</span><br>
                <span class="font-bold text-lg text-[#575757]">${data.abstract}</span>
            </div>
        `;
            }

            function renderPagination() {
                const dotsContainer = document.getElementById('pagination-dots');
                dotsContainer.innerHTML = "";

                const total = submissions.length;

                // Previous button
                const prevButton = document.createElement("button");
                prevButton.textContent = "<";
                prevButton.className = "px-2 py-1 mx-1 border rounded disabled:opacity-50";
                prevButton.disabled = currentIndex === 0;
                prevButton.onclick = () => {
                    if (currentIndex > 0) {
                        currentIndex--;
                        renderSubmission(currentIndex);
                        renderPagination();
                    }
                };

                // Page number
                const pageDisplay = document.createElement("span");
                pageDisplay.textContent = `${currentIndex + 1}`;
                pageDisplay.className = "mx-2 mt-1";

                // Next button
                const nextButton = document.createElement("button");
                nextButton.textContent = ">";
                nextButton.className = "px-2 py-1 mx-1 border rounded disabled:opacity-50";
                nextButton.disabled = currentIndex === total - 1;
                nextButton.onclick = () => {
                    if (currentIndex < total - 1) {
                        currentIndex++;
                        renderSubmission(currentIndex);
                        renderPagination();
                    }
                };

                // Append all
                dotsContainer.appendChild(prevButton);
                dotsContainer.appendChild(pageDisplay);
                dotsContainer.appendChild(nextButton);
            }

            // Initialize
            renderSubmission(currentIndex);
            renderPagination();
        });
    </script>
@endsection
