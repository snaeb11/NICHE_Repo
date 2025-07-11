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

    <div class="flex justify-center bg-[#fffff0] w-screen mt-15">
        <div class="grid grid-cols-2 grid-rows-[auto_1fr] gap-4 p-4 mr-50 ml-50">
            
            <!-- Left Side Wrapper: spans 2 rows -->
            <div class="row-span-2 flex flex-col space-y-2">
                <!-- Header above the box -->
                <div class="flex justify-between items-center">
                    <span class="text-3xl font-semibold text-[#575757]">Pending Submissions</span>
                    <div class="space-x-2">
                        <button class="text-[#fffff0] min-w-[3vw] font-semibold px-2 py-1 text-sm rounded shadow bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] hover:brightness-110">Add submission</button>
                        <button class="text-[#fffff0] min-w-[3vw] font-semibold px-2 py-1 text-sm rounded shadow bg-gradient-to-r from-[#FFC360] to-[#FFA104] hover:brightness-110">History</button>
                    </div>
                </div>
                <!-- Box content -->
                <div class="border-1 border-[#a1a1a1] p-4 rounded-lg flex-1">
                    <div class="flex-col ml-10 mr-10 mt-5 ">
                        <span class="font-light text-[#8a8a8a]">Title</span><br>
                        <span class="font-bold text-2xl text-[#575757]">SmartFarm: An IoT-Based Monitoring System for Sustainable Agriculture</span>
                    </div>

                    <div class="flex-col ml-10 mr-10 mt-5 ">
                        <span class="font-light text-[#8a8a8a]">Author/s</span><br>
                        <span class="font-bold text-lg text-[#575757]">Maria L. Santos <br>
                            John P. Dela Cruz <br>
                            Angela M. Reyes</span>
                    </div>

                    <div class="flex-col ml-10 mr-10 mt-5 ">
                        <span class="font-light text-[#8a8a8a]">Abstract</span><br>
                        <span class="font-bold text-lg text-[#575757]">This study presents SmartFarm, an IoT-based solution designed to monitor soil moisture, temperature, and humidity in real time to aid small-scale Filipino farmers. Utilizing sensor nodes and a cloud-based dashboard, the system provides timely data for crop management. The goal is to improve yield prediction and resource efficiency through smart agriculture practices.</span>
                    </div>
                </div>
            </div>

            <!-- Right Top Wrapper -->
            <div class="flex flex-col space-y-2">
            <!-- Header above the box -->
                <div class="flex justify-between items-center">
                    <span class="text-3xl font-semibold text-[#575757]">Personal information</span>
                    <div class="space-x-2">
                        <button class="text-[#fffff0] min-w-[3vw] font-semibold px-2 py-1 text-sm rounded shadow bg-gradient-to-r from-[#D56C6C] to-[#9D3E3E] hover:brightness-110">Edit</button>
                        <button class="text-[#fffff0] min-w-[3vw] font-semibold px-2 py-1 text-sm rounded shadow bg-gradient-to-r from-[#FF5656] to-[#DF0606] hover:brightness-110">Deactivate</button>
                    </div>
                </div>
                <!-- Box content -->
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

            <!-- Right Bottom -->
            <div class="border-1 border-[#a1a1a1] p-4 rounded-lg">
                <div>
                    <span class="text-2xl font-semibold ml-5 text-[#575757]">Change password</span>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div id="input-fields" class="w-[17vw] flex flex-col space-y-4 mt-5 ml-5 mr-5">
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
                        
                        <label class="flex items-center justify-start ml-1 text-sm text-[#575757] font-light space-x-2">
                            <input
                                type="checkbox"
                                id="show-password-toggle"
                                class="accent-[#575757] w-4 h-4 hover:cursor-pointer"
                                onclick="togglePasswordVisibility()"
                            />
                            <span class="hover:cursor-pointer">Show password</span>
                        </label>
                    </div>

                    <div id="requirements" class="bg-white rounded-lg p-4 flex flex-col space-y-4 mt-1">
                        <span class="text-[#575757] font-semibold text-sm">New password must contain the following:</span>
                        <div id="password-requirements" class="text-[#575757] text-sm font-light ml-10 space-y-2">
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

                        <div class="flex justify-end mt-5 mr-5">
                            <button
                                id="user-submit-btn"
                                class="min-w-[10vw] min-h-[2vw] rounded-full text-[#fffff0] bg-gradient-to-r
                                from-[#D56C6C] to-[#9D3E3E] hover:from-[#f18e8e] hover:to-[#d16868] transition duration-200">
                                Submit code
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
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
        });
    </script>

</body>
</html>