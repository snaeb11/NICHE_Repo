<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body class="bg-[#fffff0] text-gray-900">
    <x-layout-partials.header />
    <x-popups.confirm-delete-request-m/>
    <x-popups.user-edit-acc-m/>
    <x-popups.user-add-submission-m/>
    <div class="flex justify-center bg-[#fffff0] w-screen">
        <div class="flex flex-col md:flex-row gap-6 p-4 w-full max-w-screen-xl mt-17">

            <!-- Left Side: Pending Submissions (spans 2 rows) -->
            <div class="w-full md:w-1/2 flex flex-col space-y-2">
                <div class="flex justify-between items-center">
                    <span class="text-3xl font-semibold text-[#575757]">Pending Submissions</span>
                    <div class="space-x-2">
                        <button id="user-add-submission-btn" class="text-[#fffff0] font-semibold px-2 py-1 text-sm rounded shadow bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] hover:brightness-110">Add submission</button>
                        <button class="text-[#fffff0] font-semibold px-2 py-1 text-sm rounded shadow bg-gradient-to-r from-[#FFC360] to-[#FFA104] hover:brightness-110">History</button>
                    </div>
                </div>

                <!-- Make this a vertical flex container -->
                <div class="border-1 border-[#a1a1a1] p-4 rounded-lg flex flex-col h-full min-h-[450px]">

                    <!-- Submission content can grow -->
                    <div id="submission-content" class="space-y-5 px-5 mt-5 flex-1">
                        <!-- JavaScript will inject content here -->
                    </div>

                    <!-- Dot Pagination anchored to the bottom -->
                    <div id="pagination-dots" class="flex justify-center mt-auto pt-6 space-x-2">
                        <!-- Dots inserted by JS -->
                    </div>
                </div>
            </div>


            <!-- Right Side: Personal Info + Change Password stacked -->
            <div class="w-full md:w-1/2 flex flex-col gap-6">
                
                <!-- Personal Information -->
                <div class="flex flex-col space-y-2">
                    <div class="flex justify-between items-center">
                        <span class="text-3xl font-semibold text-[#575757]">Personal information</span>
                            <div class="space-x-2">
                                <button id="edit-user-btn" class="text-[#fffff0] font-semibold px-2 py-1 text-sm rounded shadow bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] hover:brightness-110 cursor-pointer">Edit</button>
                                <button id="deactivate-user-btn" class="text-[#fffff0] font-semibold px-2 py-1 text-sm rounded shadow bg-gradient-to-r from-[#FF5656] to-[#DF0606] hover:brightness-110 cursor-pointer">Deactivate</button>
                            </div>
                    </div>
                    <div class="border-1 border-[#a1a1a1] p-4 rounded-lg">
                        <div class="flex-col ml-10 mr-10 mt-5 ">
                            <span class="font-light text-[#8a8a8a]">Name</span><br>
                            <span class="font-bold text-2xl text-[#575757]">OBRIAN, William Defoe A.</span>
                        </div>

                        <div class="flex-col ml-10 mr-10 mt-5 ">
                            <span class="font-light text-[#8a8a8a]">Email address</span><br>
                            <span class="font-bold text-2xl text-[#575757]">wdobrian2312@usep.edu.ph</span>
                        </div>

                        <div class="flex-col ml-10 mr-10 mt-5 ">
                            <span class="font-light text-[#8a8a8a]">Program</span><br>
                            <span class="font-bold text-2xl text-[#575757]">Bachelor of Science in Information Technology</span>
                        </div>
                    </div>
                </div>

                <!-- Change Password -->
                <div class="border-1 border-[#a1a1a1] p-4 rounded-lg">
                <div>
                    <span class="text-2xl font-semibold ml-5 text-[#575757]">Change password</span>
                </div>
                    <div class="flex flex-col md:flex-row gap-6">
                        <!-- Left: Inputs -->
                        <div id="input-fields" class="w-full md:w-1/2 flex flex-col space-y-4 p-5">
                            <input
                            id="current-password"
                            type="password"
                            placeholder="Current password"
                            class="h-[65px] rounded-[10px] border border-[#575757]
                                placeholder-[#575757] text-[#575757] font-light px-4
                                focus:outline-none focus:border-[#D56C6C] transition-colors duration-200"
                            />
                            <input
                            id="new-password"
                            type="password"
                            placeholder="New password"
                            class="h-[65px] rounded-[10px] border border-[#575757]
                                placeholder-[#575757] text-[#575757] font-light px-4
                                focus:outline-none focus:border-[#D56C6C] transition-colors duration-200"
                            />
                            <input
                            id="confirm-password"
                            type="password"
                            placeholder="Confirm password"
                            class="h-[65px] rounded-[10px] border border-[#575757]
                                placeholder-[#575757] text-[#575757] font-light px-4
                                focus:outline-none focus:border-[#D56C6C] transition-colors duration-200"
                            />
                            
                            <label class="flex items-center justify-start text-sm text-[#575757] font-light space-x-2">
                            <input
                                type="checkbox"
                                id="show-password-toggle"
                                class="accent-[#575757] w-4 h-4 hover:cursor-pointer"
                                onclick="togglePasswordVisibility()"
                            />
                            <span class="hover:cursor-pointer">Show password</span>
                            </label>
                        </div>

                        <!-- Right: Requirements -->
                        <div id="requirements" class="w-full md:w-1/2 bg-white rounded-lg p-5 flex flex-col space-y-4">
                            <span class="text-[#575757] font-semibold text-sm">New password must contain the following:</span>
                            <div id="password-requirements" class="text-[#575757] text-sm font-light ml-4 space-y-2">
                            <div class="flex items-center space-x-2">
                                <div id="circle-length" class="w-3 h-3 rounded-full bg-gray-300"></div>
                                <span>Minimum of 8 characters</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div id="circle-uppercase" class="w-3 h-3 rounded-full bg-gray-300"></div>
                                <span>An uppercase letter</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div id="circle-lowercase" class="w-3 h-3 rounded-full bg-gray-300"></div>
                                <span>A lowercase letter</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div id="circle-number" class="w-3 h-3 rounded-full bg-gray-300"></div>
                                <span>A number</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div id="circle-special" class="w-3 h-3 rounded-full bg-gray-300"></div>
                                <span>A special character</span>
                            </div>
                            </div>

                            <div class="flex justify-end mt-5">
                            <button
                                id="user-submit-btn"
                                class="min-w-[10vw] min-h-[2vw] rounded-full text-[#fffff0] bg-gradient-to-r
                                from-[#D56C6C] to-[#9D3E3E] hover:from-[#f18e8e] hover:to-[#d16868] transition duration-200">
                                Change password
                            </button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            //add submission
            const addSubmissionBtn = document.getElementById('user-add-submission-btn');
            const addSubmissionPopup = document.getElementById('user-add-submission-popup');

            addSubmissionBtn.addEventListener('click', () =>{
                addSubmissionPopup.style.display = 'flex';
            })

            //edit user
            const editUserBtn = document.getElementById('edit-user-btn');
            const editPopup = document.getElementById('user-edit-account-popup');
            const confirmBtn = document.getElementById('uea-confirm-btn');
            const closeButton = document.getElementById('uea-close-popup');

            editUserBtn.addEventListener('click', () => {
                editPopup.style.display = 'flex';
            });

            confirmBtn.addEventListener('click', () => {
                //logic amoghusb alls
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

            //sanitation test
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

            //deactivate user
            const deactivateAcc = document.getElementById('deactivate-user-btn');
            const deactivateWarnPoup = document.getElementById('confirm-delete-request-popup');

            deactivateAcc.addEventListener('click', () => {
                const step1 = document.getElementById('cdr-step1');
                const step2 = document.getElementById('cdr-step2');

                step1.classList.remove('hidden');
                step2.classList.add('hidden');
                deactivateWarnPoup.style.display = 'flex';
            });

            // Show Password Toggle Logic
            const checkbox = document.getElementById('show-password-toggle');

            const passwordFields = [
                document.getElementById('current-password'),
                document.getElementById('new-password'),
                document.getElementById('confirm-password')
            ];

            checkbox.addEventListener('change', function () {
                passwordFields.forEach(input => {
                    if (input) {
                        input.type = checkbox.checked ? 'text' : 'password';
                    }
                });
            });

            // Password Requirements Validation Logic
            const newPasswordInput = document.getElementById('new-password');

            newPasswordInput.addEventListener('input', function () {
                const value = newPasswordInput.value;

                const toggleCircle = (id, condition) => {
                    const el = document.getElementById(id);
                    if (el) {
                        el.className = condition
                            ? 'w-3 h-3 rounded-full bg-green-500'
                            : 'w-3 h-3 rounded-full bg-gray-300';
                    }
                };

                toggleCircle('circle-length', value.length >= 8);
                toggleCircle('circle-uppercase', /[A-Z]/.test(value));
                toggleCircle('circle-lowercase', /[a-z]/.test(value));
                toggleCircle('circle-number', /\d/.test(value));
                toggleCircle('circle-special', /[!@#$%^&*(),.?":{}|<>]/.test(value));
            });

                    const submissions = [
                {
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

            function renderDots() {
                const dotsContainer = document.getElementById('pagination-dots');
                dotsContainer.innerHTML = "";

                submissions.forEach((_, i) => {
                    const dot = document.createElement("button");
                    dot.className = `w-3 h-3 rounded-full transition-all duration-200 ${i === currentIndex ? 'bg-[#575757]' : 'bg-[#d1d1d1]'} hover:scale-110`;
                    dot.onclick = () => {
                        currentIndex = i;
                        renderSubmission(i);
                        renderDots();
                    };
                    dotsContainer.appendChild(dot);
                });
            }

            renderSubmission(currentIndex);
            renderDots();
        });
    </script>

</body>
</html>