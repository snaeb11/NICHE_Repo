 <style>
     #ea-step1::-webkit-scrollbar {
         display: none;
     }
 </style>
 <div id="edit-account-popup" style="display: none;"
     class="fixed inset-0 flex items-center justify-center bg-black/50 z-50 px-2 sm:px-0">
     <div id="ea-step1"
         class="w-[90vw] max-w-[90vw] sm:min-w-[25vw] sm:max-w-[30vw] max-h-[90vh] bg-[#fdfdfd] rounded-2xl shadow-xl relative p-4 sm:p-8 overflow-y-auto">


         <!-- Close Button -->
         <button id="ea-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                 stroke="currentColor" class="w-6 h-6">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
             </svg>
         </button>

         <div class="text-center">
             <h2 class="mt-0 text-2xl font-bold text-gray-900">Edit Your Account</h2>
             <p class="text-normal font-regular">Update your personal information</p>
         </div>

         <!-- Responsive single-column on mobile -->
         <div class="grid grid-cols-1 md:grid-cols-1 gap-0">

             <label for="aea-first-name" class="mdblock text-sm font-medium text-gray-700 mt-3">First Name</label>
             <input id="first-name" type="text"
                 class="mt-1 h-[50px] w-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />


             <label for="aea-last-name" class="block text-sm font-medium text-gray-700 mt-3">Last Name</label>
             <input id="last-name" type="text"
                 class="mt-1 h-[50px] w-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />

             <label for="aea-usep-email" class="block text-sm font-medium text-gray-700 mt-3">Email <Address></Address>
             </label>
             <input id="usep-email" type="email" readonly
                 class="mt-1 h-[50px] w-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#575757] focus:outline-none" />

             <label for="aea-current-password" class="block text-sm font-medium text-gray-700 mt-3">Current
                 Password</label>
             <input id="current-password" type="password"
                 class="mt-1 h-[50px] w-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />

             <label for="aea-new-password" class="block text-sm font-medium text-gray-700 mt-3">New Password</label>
             <div class="flex flex-row items-center gap-1.5">

                 <input id="new-password" type="password"
                     class="mt-1 h-[50px] w-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />


                 <div>
                     <!-- Help Icon -->
                     <div id="password-help-icon" class="group visible relative">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer text-[#575757]"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                         </svg>
                         <div
                             class="absolute bottom-full right-0 z-10 mb-2 hidden w-64 rounded-lg border border-[#575757] bg-white p-2 text-sm text-[#575757] shadow-lg group-hover:block">
                             Password must contain:
                             <ul class="mt-1 list-disc pl-5">
                                 <li id="length-req">At least 8 characters</li>
                                 <li id="upper-req">One uppercase letter</li>
                                 <li id="lower-req">One lowercase letter</li>
                                 <li id="number-req">One number</li>
                                 <li id="special-req">One special character</li>
                             </ul>
                         </div>
                     </div>
                     <!-- Validation Icon -->
                     <div id="password-validation" class="hidden">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20"
                             fill="currentColor">
                             <path fill-rule="evenodd"
                                 d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                 clip-rule="evenodd" />
                         </svg>
                     </div>
                 </div>
             </div>

             <label for="aea-confirm-password" class="block text-sm font-medium text-gray-700 mt-3">Confirm
                 Password</label>
             <div class="flex felx-col">
                 <div class="flex flex-row w-full items-center gap-1.5">
                     <input id="confirm-password" type="password"
                         class="mt-2 h-[50px] w-full rounded-[10px] border border-[#575757] px-4 font-light text-[#575757] placeholder-[#575757] transition-colors duration-200 focus:border-[#D56C6C] focus:outline-none" />
                     <div id="confirm-password-validation" class="hidden">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20"
                             fill="currentColor">
                             <path fill-rule="evenodd"
                                 d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                 clip-rule="evenodd" />
                         </svg>
                     </div>
                     <div id="dud-item" class="flex">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#fdfdfd]" viewBox="0 0 20 20"
                             fill="currentColor">
                             <path fill-rule="evenodd"
                                 d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                 clip-rule="evenodd" />
                         </svg>
                     </div>
                 </div>

             </div>


             <label class="mt-2 flex items-center justify-end space-x-2 text-sm font-light text-[#575757]">
                 <input type="checkbox" id="ea-show-password-toggle"
                     class="h-4 w-4 accent-[#575757] hover:cursor-pointer" />
                 <span class="hover:cursor-pointer">Show password</span>
             </label>

         </div>

         <div class="mt-5 flex justify-center">
             <button id="confirm1-btn"
                 class="px-10 py-4 rounded-full text-[#fdfdfd] bg-gradient-to-r from-[#27C50D] to-[#1CA506] shadow hover:brightness-110 cursor-pointer">
                 Confirm
             </button>
         </div>
     </div>
 </div>


 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const passwordInput = document.getElementById('new-password');
         const passwordLength = document.getElementById('length-req');
         const passwordUppercase = document.getElementById('upper-req');
         const passwordLowercase = document.getElementById('lower-req');
         const passwordNumber = document.getElementById('number-req');
         const passwordSpecial = document.getElementById('special-req');
         const passwordValidation = document.getElementById('password-validation');
         const passwordHelpIcon = document.getElementById('password-help-icon')?.querySelector('svg');
         const confirmPasswordInput = document.getElementById('confirm-password');
         const confirmPasswordValidation = document.getElementById('confirm-password-validation');
         const dud = document.getElementById('dud-item');
         const toggle = document.getElementById('ea-show-password-toggle');
         const passwordFields = [
             document.getElementById('current-password'),
             document.getElementById('new-password'),
             document.getElementById('confirm-password')
         ];

         // Check requirements
         function checkPasswordRequirements() {
             const password = passwordInput.value;
             return {
                 length: password.length >= 8,
                 uppercase: /[A-Z]/.test(password),
                 lowercase: /[a-z]/.test(password),
                 number: /[0-9]/.test(password),
                 special: /[^A-Za-z0-9]/.test(password)
             };
         }

         function updateRequirementColors(reqs) {
             passwordLength.style.color = reqs.length ? '#16a34a' : '#575757';
             passwordUppercase.style.color = reqs.uppercase ? '#16a34a' : '#575757';
             passwordLowercase.style.color = reqs.lowercase ? '#16a34a' : '#575757';
             passwordNumber.style.color = reqs.number ? '#16a34a' : '#575757';
             passwordSpecial.style.color = reqs.special ? '#16a34a' : '#575757';
         }

         function checkPasswordMatch() {
             if (!confirmPasswordInput.value) {
                 confirmPasswordValidation.classList.add('hidden');
                 confirmPasswordInput.setCustomValidity(confirmPasswordInput.required ?
                     'Please confirm your password' : '');
                 return false;
             }

             if (passwordInput.value === confirmPasswordInput.value) {
                 confirmPasswordValidation.classList.remove('hidden');
                 dud.classList.add('hidden');
                 confirmPasswordInput.setCustomValidity('');
                 return true;
             } else {
                 confirmPasswordValidation.classList.add('hidden');
                 confirmPasswordInput.setCustomValidity('Passwords do not match');
                 return false;
             }
         }

         passwordInput.addEventListener('input', function() {
             const reqs = checkPasswordRequirements();
             const allMet = Object.values(reqs).every(Boolean);

             updateRequirementColors(reqs);

             if (passwordInput.value && allMet) {
                 passwordValidation.classList.remove('hidden');
                 if (passwordHelpIcon) passwordHelpIcon.classList.add('hidden');
                 passwordInput.setCustomValidity('');
             } else {
                 passwordValidation.classList.add('hidden');
                 if (passwordHelpIcon) passwordHelpIcon.classList.remove('hidden');
                 passwordInput.setCustomValidity('Password does not meet requirements');
             }

             checkPasswordMatch();
         });

         confirmPasswordInput.addEventListener('input', checkPasswordMatch);

         // Show/Hide password toggle
         if (toggle) {
             toggle.addEventListener('change', function() {
                 const show = toggle.checked;
                 passwordFields.forEach(field => {
                     if (field) field.type = show ? 'text' : 'password';
                 });
             });
         }

         // Submit handler
         const errPopup = document.getElementById('universal-x-popup');
         const xTopText = document.getElementById('x-topText');
         const xSubText = document.getElementById('x-subText');
         const confirmBtn = document.getElementById('uniX-confirm-btn');

         const succPopup = document.getElementById('universal-ok-popup');
         const OKtopText = document.getElementById('OKtopText');
         const OKsubText = document.getElementById('OKsubText');
         const okConfirmBtn = document.getElementById('uniOK-confirm-btn');

         const mainPopup = document.getElementById('edit-account-popup');

         document.getElementById('confirm1-btn')?.addEventListener('click', async function() {
             const firstName = document.getElementById('first-name').value.trim();
             const lastName = document.getElementById('last-name').value.trim();
             const current = document.getElementById('current-password').value.trim();
             const newPass = passwordInput.value.trim();
             const confirm = confirmPasswordInput.value.trim();

             // Check for empty required fields
             if (!firstName || !lastName || !current || !newPass || !confirm) {

                 xTopText.textContent = "Missing Fields!";
                 xSubText.textContent = "Please ensure all fields are filled out.";
                 errPopup.style.display = 'flex';
                 mainPopup.style.display = 'none';

                 confirmBtn.addEventListener('click', () => {
                     errPopup.style.display = 'none';
                     mainPopup.style.display = 'flex';
                 });

                 // Optionally highlight the first empty field
                 if (!firstName) document.getElementById('first-name').reportValidity();
                 else if (!lastName) document.getElementById('last-name').reportValidity();
                 else if (!current) document.getElementById('current-password').reportValidity();
                 else if (!newPass) passwordInput.reportValidity();
                 else if (!confirm) confirmPasswordInput.reportValidity();
                 return;
             }

             const reqs = checkPasswordRequirements();
             const allRequirementsMet = Object.values(reqs).every(Boolean);
             const passwordsMatch = checkPasswordMatch();

             if (!allRequirementsMet) {
                 xTopText.textContent = "Password Requirements Not Met!";
                 xSubText.textContent = "Ensure your new password meets all requirements.";
                 errPopup.style.display = 'flex';
                 mainPopup.style.display = 'none';

                 confirmBtn.addEventListener('click', () => {
                     errPopup.style.display = 'none';
                     mainPopup.style.display = 'flex';
                 });
                 passwordInput.reportValidity();
                 return;
             }

             if (!passwordsMatch) {
                 xTopText.textContent = "Passwords Do Not Match!";
                 xSubText.textContent = "Please ensure your new password matches the confirmation.";
                 errPopup.style.display = 'flex';
                 mainPopup.style.display = 'none';

                 confirmBtn.addEventListener('click', () => {
                     errPopup.style.display = 'none';
                     mainPopup.style.display = 'flex';
                 });
                 confirmPasswordInput.reportValidity();
                 return;
             }

             if (current === newPass) {
                 xTopText.textContent = "Same Password Error!";
                 xSubText.textContent =
                     "Your new password must be different from your current password.";
                 errPopup.style.display = 'flex';
                 mainPopup.style.display = 'none';

                 confirmBtn.addEventListener('click', () => {
                     errPopup.style.display = 'none';
                     mainPopup.style.display = 'flex';
                 });
                 passwordInput.setCustomValidity("New password must differ from current password.");
                 passwordInput.reportValidity();
                 return;
             } else {
                 passwordInput.setCustomValidity(""); // Clear previous error
             }

             try {
                 const res = await fetch('/profile/update-password', {
                     method: 'POST',
                     headers: {
                         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                             .content,
                         'Content-Type': 'application/json',
                         'Accept': 'application/json'
                     },
                     body: JSON.stringify({
                         current_password: current,
                         new_password: newPass,
                         new_password_confirmation: confirm,
                         first_name: firstName,
                         last_name: lastName
                     })
                 });

                 const data = await res.json();

                 if (res.ok) {
                     OKtopText.textContent = "Success!";
                     OKsubText.textContent = data.message ||
                         "Your account information was updated successfully.";
                     succPopup.style.display = 'flex';
                     mainPopup.style.display = 'none';

                     okConfirmBtn.addEventListener('click', () => {
                         succPopup.style.display = 'none';
                         mainPopup.style.display = 'none';
                         location.reload();
                     });
                 } else if (res.status === 422 && data.message ===
                     "Your current password is incorrect.") {

                     xTopText.textContent = "Incorrect Password!";
                     xSubText.textContent =
                         "The current password you entered does not match our records. Please try again.";
                     errPopup.style.display = 'flex';
                     mainPopup.style.display = 'none';

                     confirmBtn.addEventListener('click', () => {
                         errPopup.style.display = 'none';
                         mainPopup.style.display = 'flex';
                     });

                     const currentField = document.getElementById('current-password');
                     currentField.setCustomValidity(data.message);
                     currentField.reportValidity();
                 } else {
                     xTopText.textContent = "Update Failed!";
                     xSubText.textContent = data.message ||
                         "Something went wrong while updating your profile.";
                     errPopup.style.display = 'flex';
                     mainPopup.style.display = 'none';

                     confirmBtn.addEventListener('click', () => {
                         errPopup.style.display = 'none';
                         mainPopup.style.display = 'flex';
                     });
                 }

             } catch (err) {
                 xTopText.textContent = "Update Failed!";
                 xSubText.textContent =
                     "There was an error updating your account. Please try again.";
                 errPopup.style.display = 'flex';
                 mainPopup.style.display = 'none';

                 confirmBtn.addEventListener('click', () => {
                     errPopup.style.display = 'none';
                     mainPopup.style.display = 'flex';
                 });
                 console.error(err);
             }
         });

         const firstNameInput = document.getElementById('first-name');
         const lastNameInput = document.getElementById('last-name');

         // Allow only letters, spaces, hyphens, and apostrophes
         function sanitizeNameInput(event) {
             const sanitized = event.target.value.replace(/[^a-zA-Z\s'-]/g, '');
             if (sanitized !== event.target.value) {
                 event.target.value = sanitized;
             }
         }

         firstNameInput.addEventListener('input', sanitizeNameInput);
         lastNameInput.addEventListener('input', sanitizeNameInput);

         function capitalizeWords(str) {
             return str.replace(/\b\w/g, char => char.toUpperCase());
         }

         firstNameInput.addEventListener('blur', () => {
             firstNameInput.value = capitalizeWords(firstNameInput.value.trim());
         });

         lastNameInput.addEventListener('blur', () => {
             lastNameInput.value = capitalizeWords(lastNameInput.value.trim());
         });

         function removeSqlInjectionChars(str) {
             return str.replace(/['";=<>()[\]{}\\]/g, '');
         }

         firstNameInput.addEventListener('blur', () => {
             let val = removeSqlInjectionChars(firstNameInput.value.trim());
             firstNameInput.value = capitalizeWords(val);
         });

         lastNameInput.addEventListener('blur', () => {
             let val = removeSqlInjectionChars(lastNameInput.value.trim());
             lastNameInput.value = capitalizeWords(val);
         });

     });
 </script>
