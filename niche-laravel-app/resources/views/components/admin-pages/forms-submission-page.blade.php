<!-- Forms Submission Table -->
<main id="forms-submission-table"
    class="ml-[4vw] hidden p-8 transition-all duration-300 ease-in-out group-hover:ml-[18vw]">
    <div class="mb-4 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        @if (auth()->user() && auth()->user()->hasPermission('view-forms-submissions'))
            <div class="w-full">
                <div class="mb-5 flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-[#575757]">Form Submissions</h1>
                    <!-- History Button -->
                    <button id="forms-history-btn"
                        class="flex w-full max-w-[150px] items-center justify-center rounded-lg bg-gradient-to-r from-[#FFC360] to-[#FFA104] px-4 py-2 text-[#fdfdfd] shadow transition-colors duration-200 hover:brightness-110 sm:w-auto">
                        History
                    </button>
                </div>

                <div class="flex flex-col gap-2 sm:flex-row sm:justify-between sm:gap-4">
                    <input type="text" id="forms-submission-search" name="forms-submission-search"
                        placeholder="Search..."
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2 text-[#575757] placeholder-gray-400 focus:outline-none focus:ring focus:ring-[#FFA104] sm:w-[300px] md:w-[400px]" />
                    <div class="flex flex-wrap justify-end gap-2 sm:gap-4">
                        <!-- Status Dropdown -->
                        <div class="relative">
                            <select name="forms-subs-dd-status"
                                class="w-full appearance-none rounded-lg border border-gray-300 bg-white px-4 py-2 pr-10 text-[#575757] hover:cursor-pointer focus:outline-none focus:ring focus:ring-[#FFA104] sm:w-auto">
                                <option value="">All Submissions</option>
                                <option value="pending">Pending</option>
                                <option value="approved">Accepted</option>
                                <option value="rejected">Rejected</option>
                                <option value="forwarded">Forwarded</option>
                            </select>
                            <div
                                class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 transform text-[#575757]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                        <!-- Form Types Dropdown -->
                        <div class="relative">
                            <select name="forms-subs-dd-type"
                                class="w-full appearance-none rounded-lg border border-gray-300 bg-white px-4 py-2 pr-10 text-[#575757] hover:cursor-pointer focus:outline-none focus:ring focus:ring-[#FFA104] sm:w-auto">
                                <option value="">All Forms</option>
                                <optgroup label="R&DD Forms, Templates, and References">
                                    <option value="Research Proposal Form">Research Proposal Form</option>
                                    <option value="Monthly Accomplishment Report">Monthly Accomplishment Report</option>
                                    <option value="Quarterly Progress Report">Quarterly Progress Report</option>
                                    <option value="Monitoting and Evaluation Form">Monitoting and Evaluation Form
                                    </option>
                                    <option value="Monitoring and Performance Evaluation Form">Monitoring and
                                        Performance Evaluation Form</option>
                                    <option value="Monitoring Minutes">Monitoring Minutes</option>
                                    <option value="Terminal Report Form">Terminal Report Form</option>
                                    <option value="SETI Scorecard">SETI Scorecard</option>
                                    <option value="SETI for SDGs Scorecard Guide">SETI for SDGs Scorecard Guide</option>
                                    <option value="GAD Assessment Checklist">GAD Assessment Checklist</option>
                                    <option value="Special Order Template">Special Order Template</option>
                                    <option value="Notice of Engagement Template">Notice of Engagement Template</option>
                                    <option value="Request Letter for Extension Template">Request Letter for Extension
                                        Template</option>
                                    <option value="Updated Workplan Template">Updated Workplan Template</option>
                                </optgroup>
                                <optgroup label="R&DD MOA Forms, Samples, and Referneces">
                                    <option value="Review Form for Agreement (RFA)">Review Form for Agreement (RFA)
                                    </option>
                                    <option value="Routing Slip for Agreements (RSA)">Routing Slip for Agreements (RSA)
                                    </option>
                                    <option value="MOA Sample">MOA Sample</option>
                                    <option value="MOU Sample">MOU Sample</option>
                                    <option value="Supplemental MOA Sample">Supplemental MOA Sample</option>
                                </optgroup>
                            </select>
                            <div
                                class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 transform text-[#575757]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="overflow-x-auto rounded-lg bg-[#fdfdfd] p-4 shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-[#fdfdfd]">
                <tr>
                    <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                        data-column="0" data-order="asc" onclick="sortTable(this)">
                        Form Type
                    </th>
                    <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                        data-column="0" data-order="asc" onclick="sortTable(this)">
                        Note
                    </th>
                    <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                        data-column="0" data-order="asc" onclick="sortTable(this)">
                        Uploaded File
                    </th>
                    <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                        data-column="0" data-order="asc" onclick="sortTable(this)">
                        Submitted by
                    </th>
                    <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                        data-column="0" data-order="asc" onclick="sortTable(this)">
                        Submitted at
                    </th>
                    <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                        data-column="0" data-order="asc" onclick="sortTable(this)">
                        Status
                    </th>
                    @if (auth()->user() &&
                            (auth()->user()->hasPermission('acc-rej-forms-submissions') ||
                                auth()->user()->hasPermission('acc-rej-submissions')))
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                            Action
                        </th>
                    @endif
                </tr>
            </thead>
            <tbody id="forms-submission-table-body" class="divide-y divide-gray-200 bg-[#fdfdfd] text-[#575757]">

            </tbody>
        </table>

        <!-- PDF Preview Modal -->
        <div id="forms-pdf-preview-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
            <div class="relative w-full max-w-7xl rounded-lg bg-white px-2 pb-2 pt-2 shadow-lg">
                <div class="flex items-center justify-between pb-1 pl-2 pr-2">
                    <p class="text-sm text-gray-500" id="forms-pdf-prev-fn">Filename</p>
                    <button id="forms-close-preview-modal"
                        class="text-2xl font-bold text-black hover:text-red-600">X</button>
                </div>
                <iframe id="forms-pdf-preview-iframe" class="h-[70vh] w-full rounded-lg border shadow"
                    src=""></iframe>
            </div>
        </div>

        <!-- Success Modal -->
        <div id="forms-success-modal" style="display: none;"
            class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black/50 p-4">
            <div
                class="relative max-h-[90vh] w-full max-w-[80vw] overflow-y-auto rounded-2xl bg-[#fdfdfd] p-6 shadow-xl sm:max-w-[70vw] md:max-w-[45vw] lg:max-w-[30vw]">
                <button id="forms-success-close" class="absolute right-4 top-4 text-[#575757] hover:text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <div class="mt-6 flex flex-col items-center text-center">
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-green-100 text-green-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="h-8 w-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-semibold text-[#575757]" id="forms-success-title">Success</h3>
                    <p class="mt-2 text-sm text-[#8B8B8B]" id="forms-success-message">Action completed successfully.
                    </p>
                    <button id="forms-success-ok"
                        class="mt-6 rounded-full bg-gradient-to-r from-[#27C50D] to-[#1CA506] px-6 py-2 text-white shadow hover:brightness-110">
                        OK
                    </button>
                </div>
            </div>
        </div>

        <!-- Error Modal -->
        <div id="forms-error-modal" style="display: none;"
            class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black/50 p-4">
            <div
                class="relative max-h-[90vh] w-full max-w-[80vw] overflow-y-auto rounded-2xl bg-[#fdfdfd] p-6 shadow-xl sm:max-w-[70vw] md:max-w-[45vw] lg:max-w-[30vw]">
                <button id="forms-error-close" class="absolute right-4 top-4 text-[#575757] hover:text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <div class="mt-6 flex flex-col items-center text-center">
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-red-100 text-red-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="h-8 w-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m-9.303 3.376a11.954 11.954 0 0020.606 0M15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-semibold text-[#575757]" id="forms-error-title">Something went wrong
                    </h3>
                    <p class="mt-2 text-sm text-[#8B8B8B]" id="forms-error-message">Please try again.</p>
                    <button id="forms-error-ok"
                        class="mt-6 rounded-full bg-gradient-to-r from-[#FE5252] to-[#E10C0C] px-6 py-2 text-white shadow hover:brightness-110">
                        OK
                    </button>
                </div>
            </div>
        </div>

        <!-- Accept Confirmation Modal -->
        <div id="forms-accept-modal" style="display: none;"
            class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black/50 p-4">
            <div
                class="relative max-h-[90vh] w-full max-w-[80vw] overflow-y-auto rounded-2xl bg-[#fdfdfd] p-4 shadow-xl sm:max-w-[70vw] sm:p-6 md:max-w-[55vw] md:p-8 lg:max-w-[35vw] xl:max-w-[25vw]">

                <!-- Close Button -->
                <button id="forms-close-accept-modal"
                    class="absolute right-4 top-4 text-[#575757] hover:text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="h-6 w-6 sm:h-7 sm:w-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Step 1 -->
                <div id="forms-ca-step1">
                    <div class="mt-2 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                            stroke="#575757" class="h-16 w-16 sm:h-20 sm:w-20 md:h-24 md:w-24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>

                    <div class="mt-6 text-center text-lg font-semibold sm:text-xl md:mt-8 md:text-2xl">
                        <span class="text-[#575757]">Confirm form submission </span>
                        <span class="text-[#28C90E]">approval<span class="text-[#575757]">?</span></span>
                    </div>

                    <input type="hidden" id="forms-submission-id-holder" />

                    <div class="mt-3 text-center text-sm text-[#575757] sm:mt-4 sm:text-base">
                        Approval will confirm this form submission for the next steps.
                    </div>

                    <div class="mt-6 flex flex-col justify-center gap-3 sm:mt-10 sm:flex-row sm:gap-5">
                        <button id="forms-cancel1-btn"
                            class="rounded-full bg-gradient-to-r from-[#A4A2A2] to-[#575757] px-6 py-2 text-white shadow hover:brightness-110 sm:px-8 sm:py-3">
                            Cancel
                        </button>
                        <button id="forms-ca-confirm1-btn"
                            class="rounded-full bg-gradient-to-r from-[#27C50D] to-[#1CA506] px-6 py-2 text-white shadow hover:brightness-110 sm:px-8 sm:py-3">
                            Confirm
                        </button>
                    </div>
                </div>

                <!-- Step 2 -->
                <div id="forms-ca-step2" class="hidden">
                    <!-- Header with icon -->
                    <div class="mt-4 flex items-center gap-3 sm:mt-6">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#27C50D] to-[#1CA506]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="white" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <h3 class="text-lg font-semibold text-[#575757] sm:text-xl md:text-2xl">Add Remarks</h3>
                            <p class="text-sm text-[#8B8B8B]">Please provide your approval remarks</p>
                        </div>
                    </div>

                    <!-- Textarea with enhanced styling -->
                    <div class="mt-6 sm:mt-8">
                        <div class="relative">
                            <textarea id="forms-accept-remarks" placeholder="Enter your approval remarks here..."
                                class="max-h-[50vh] min-h-[20vh] w-full resize-none rounded-xl border-2 border-[#E5E5E5] px-4 py-3 text-sm text-[#575757] placeholder-[#A0A0A0] transition-all duration-300 focus:border-[#27C50D] focus:outline-none focus:ring-2 focus:ring-[#27C50D]/20 sm:px-5 sm:py-4 sm:text-base"
                                rows="6"></textarea>
                            <div class="absolute bottom-3 right-3 text-xs text-[#A0A0A0]">
                                <span id="forms-accept-char-count">0</span>/1000
                            </div>
                        </div>
                    </div>

                    <!-- Action buttons with enhanced styling -->
                    <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row sm:gap-5">
                        <button id="forms-ca-back-btn"
                            class="rounded-full border-2 border-[#A4A2A2] bg-transparent px-6 py-2 text-[#575757] transition-all duration-200 hover:bg-[#A4A2A2] hover:text-white sm:px-8 sm:py-3">
                            Back
                        </button>
                        <button id="forms-ca-confirm2-btn"
                            class="cursor-pointer rounded-full bg-gradient-to-r from-[#27C50D] to-[#1CA506] px-6 py-2 text-white shadow-lg transition-all duration-200 hover:shadow-xl hover:brightness-110 sm:px-8 sm:py-3">
                            Continue
                        </button>
                    </div>
                </div>

                <!-- Step 3 - Email Forwarding -->
                <div id="forms-ca-step3" class="hidden">
                    <!-- Header with icon -->
                    <div class="mt-4 flex items-center gap-3 sm:mt-6">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#FFA104] to-[#FFC360]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="white" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <h3 class="text-lg font-semibold text-[#575757] sm:text-xl md:text-2xl">Forward File
                                (Optional)</h3>
                            <p class="text-sm text-[#8B8B8B]">Send the approved file to someone else</p>
                        </div>
                    </div>

                    <!-- Email Forwarding Section -->
                    <div class="mt-6 sm:mt-8">
                        <label class="mb-2 block text-sm font-medium text-[#575757]">
                            Email Address
                        </label>
                        <input type="email" id="forms-forward-email"
                            placeholder="Enter email address to forward the file"
                            class="w-full rounded-xl border-2 border-[#E5E5E5] px-4 py-3 text-sm text-[#575757] placeholder-[#A0A0A0] transition-all duration-300 focus:border-[#FFA104] focus:outline-none focus:ring-2 focus:ring-[#FFA104]/20 sm:px-5 sm:py-4 sm:text-base">
                    </div>

                    <!-- Message Section -->
                    <div class="mt-6 sm:mt-8">
                        <label class="mb-2 block text-sm font-medium text-[#575757]">
                            Message
                        </label>
                        <div class="relative">
                            <textarea id="forms-forward-message" placeholder="Enter your message here..."
                                class="max-h-[30vh] min-h-[15vh] w-full resize-none rounded-xl border-2 border-[#E5E5E5] px-4 py-3 text-sm text-[#575757] placeholder-[#A0A0A0] transition-all duration-300 focus:border-[#FFA104] focus:outline-none focus:ring-2 focus:ring-[#FFA104]/20 sm:px-5 sm:py-4 sm:text-base"
                                rows="4"></textarea>
                            <div class="absolute bottom-3 right-3 text-xs text-[#A0A0A0]">
                                <span id="forms-forward-char-count">0</span>/500
                            </div>
                        </div>
                    </div>

                    <!-- Action buttons with enhanced styling -->
                    <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row sm:gap-5">
                        <button id="forms-ca-skip-btn"
                            class="rounded-full border-2 border-[#A4A2A2] bg-transparent px-6 py-2 text-[#575757] transition-all duration-200 hover:bg-[#A4A2A2] hover:text-white sm:px-8 sm:py-3">
                            Skip Forwarding
                        </button>
                        <button id="forms-ca-forward-btn"
                            class="cursor-pointer rounded-full bg-gradient-to-r from-[#FFA104] to-[#FFC360] px-6 py-2 text-white shadow-lg transition-all duration-200 hover:shadow-xl hover:brightness-110 sm:px-8 sm:py-3">
                            Send & Complete
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Reject Confirmation Modal -->
        <div id="forms-reject-modal" style="display: none;"
            class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black/50 p-4">
            <div
                class="relative max-h-[90vh] w-full max-w-[80vw] overflow-y-auto rounded-2xl bg-[#fdfdfd] p-4 shadow-xl sm:max-w-[70vw] sm:p-6 md:max-w-[55vw] md:p-8 lg:max-w-[35vw] xl:max-w-[25vw]">

                <!-- Close Button -->
                <button id="forms-close-reject-modal"
                    class="absolute right-4 top-4 text-[#575757] hover:text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="h-6 w-6 sm:h-7 sm:w-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Step 1 -->
                <div id="forms-cr-step1">
                    <div class="mt-2 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                            stroke="#575757" class="h-16 w-16 sm:h-20 sm:w-20 md:h-24 md:w-24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>

                    <div class="mt-6 text-center text-lg font-semibold sm:text-xl md:mt-8 md:text-2xl">
                        <span class="text-[#575757]">Confirm form submission </span>
                        <span class="text-[#ED2828]">rejection<span class="text-[#575757]">?</span></span>
                    </div>

                    <input type="hidden" id="forms-reject-submission-id-holder" />

                    <div class="mt-3 text-center text-sm text-[#575757] sm:mt-4 sm:text-base">
                        Rejection will remove this form submission from further consideration.
                    </div>

                    <div class="mt-6 flex flex-col justify-center gap-3 sm:mt-10 sm:flex-row sm:gap-5">
                        <button id="forms-cr-cancel1-btn"
                            class="rounded-full bg-gradient-to-r from-[#A4A2A2] to-[#575757] px-6 py-2 text-white shadow hover:brightness-110 sm:px-8 sm:py-3">
                            Cancel
                        </button>
                        <button id="forms-cr-confirm1-btn"
                            class="rounded-full bg-gradient-to-r from-[#FE5252] to-[#E10C0C] px-6 py-2 text-white shadow hover:brightness-110 sm:px-8 sm:py-3">
                            Confirm
                        </button>
                    </div>
                </div>

                <!-- Step 2 -->
                <div id="forms-cr-step2" class="hidden">
                    <!-- Header with icon -->
                    <div class="mt-4 flex items-center gap-3 sm:mt-6">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#FE5252] to-[#E10C0C]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="white" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                        </div>
                        <div class="text-left">
                            <h3 class="text-lg font-semibold text-[#575757] sm:text-xl md:text-2xl">Add Remarks</h3>
                            <p class="text-sm text-[#8B8B8B]">Please provide your rejection remarks</p>
                        </div>
                    </div>

                    <!-- Textarea with enhanced styling -->
                    <div class="mt-6 sm:mt-8">
                        <div class="relative">
                            <textarea id="forms-reject-remarks" placeholder="Enter your rejection remarks here..."
                                class="max-h-[50vh] min-h-[20vh] w-full resize-none rounded-xl border-2 border-[#E5E5E5] px-4 py-3 text-sm text-[#575757] placeholder-[#A0A0A0] transition-all duration-300 focus:border-[#FE5252] focus:outline-none focus:ring-2 focus:ring-[#FE5252]/20 sm:px-5 sm:py-4 sm:text-base"
                                rows="6"></textarea>
                            <div class="absolute bottom-3 right-3 text-xs text-[#A0A0A0]">
                                <span id="forms-reject-char-count">0</span>/1000
                            </div>
                        </div>
                    </div>

                    <!-- Action buttons with enhanced styling -->
                    <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row sm:gap-5">
                        <button id="forms-cr-back-btn"
                            class="rounded-full border-2 border-[#A4A2A2] bg-transparent px-6 py-2 text-[#575757] transition-all duration-200 hover:bg-[#A4A2A2] hover:text-white sm:px-8 sm:py-3">
                            Back
                        </button>
                        <button id="forms-cr-confirm2-btn"
                            class="rounded-full bg-gradient-to-r from-[#FE5252] to-[#E10C0C] px-6 py-2 text-white shadow-lg transition-all duration-200 hover:shadow-xl hover:brightness-110 sm:px-8 sm:py-3">
                            Confirm
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="pagination-controls-forms-submission" class="mt-4 flex justify-end space-x-2">
        <button onclick="changePage('forms-submission', -1)"
            class="cursor-pointer rounded bg-gray-300 px-3 py-1 hover:bg-gray-400">&lt;</button>
        <span id="pagination-info-forms-submission" class="px-3 py-1 text-[#575757]">Page 1</span>
        <button onclick="changePage('forms-submission', 1)"
            class="cursor-pointer rounded bg-gray-300 px-3 py-1 hover:bg-gray-400">&gt;</button>
    </div>
</main>

<!-- Forms History Table -->
<main id="forms-history-table"
    class="ml-[4vw] hidden p-8 transition-all duration-300 ease-in-out group-hover:ml-[18vw]">
    <div class="mb-4 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-2xl font-bold text-[#575757]">Form Submissions History</h1>

        <div class="flex flex-wrap justify-end gap-2 sm:gap-4">
            <!-- Form Types Dropdown -->
            <div class="relative">
                <select name="forms-history-dd-type"
                    class="w-full appearance-none rounded-lg border border-gray-300 bg-white px-4 py-2 pr-10 text-[#575757] hover:cursor-pointer focus:outline-none focus:ring focus:ring-[#FFA104] sm:w-auto">
                    <option value="">All Forms</option>
                    <optgroup label="R&DD Forms, Templates, and References">
                        <option value="Research Proposal Form">Research Proposal Form</option>
                        <option value="Monthly Accomplishment Report">Monthly Accomplishment Report</option>
                        <option value="Quarterly Progress Report">Quarterly Progress Report</option>
                        <option value="Monitoting and Evaluation Form">Monitoting and Evaluation Form</option>
                        <option value="Monitoring and Performance Evaluation Form">Monitoring and Performance
                            Evaluation Form</option>
                        <option value="Monitoring Minutes">Monitoring Minutes</option>
                        <option value="Terminal Report Form">Terminal Report Form</option>
                        <option value="SETI Scorecard">SETI Scorecard</option>
                        <option value="SETI for SDGs Scorecard Guide">SETI for SDGs Scorecard Guide</option>
                        <option value="GAD Assessment Checklist">GAD Assessment Checklist</option>
                        <option value="Special Order Template">Special Order Template</option>
                        <option value="Notice of Engagement Template">Notice of Engagement Template</option>
                        <option value="Request Letter for Extension Template">Request Letter for Extension Template
                        </option>
                        <option value="Updated Workplan Template">Updated Workplan Template</option>
                    </optgroup>
                    <optgroup label="R&DD MOA Forms, Samples, and Referneces">
                        <option value="Review Form for Agreement (RFA)">Review Form for Agreement (RFA)</option>
                        <option value="Routing Slip for Agreements (RSA)">Routing Slip for Agreements (RSA)</option>
                        <option value="MOA Sample">MOA Sample</option>
                        <option value="MOU Sample">MOU Sample</option>
                        <option value="Supplemental MOA Sample">Supplemental MOA Sample</option>
                    </optgroup>
                </select>
                <div class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 transform text-[#575757]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

            <!-- Back Button -->
            <button id="forms-pending-btn"
                class="w-full cursor-pointer rounded-lg bg-gradient-to-r from-[#FFC360] to-[#FFA104] px-4 py-2 text-[#fdfdfd] shadow hover:brightness-110 sm:w-auto">
                All
            </button>
        </div>
    </div>

    @if (auth()->user() && auth()->user()->hasPermission('view-forms-submissions'))
        <div class="overflow-x-auto rounded-lg bg-[#fdfdfd] p-4 shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#fdfdfd]">
                    <tr>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Form Type
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Note
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Uploaded File
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Submitted by
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Submitted at
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Status
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Reviewed by
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Remarks
                        </th>
                        <th class="cursor-pointer px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                            data-column="0" data-order="asc" onclick="sortTable(this)">
                            Reviewed at
                        </th>
                    </tr>
                </thead>
                <tbody id="forms-history-table-body" class="divide-y divide-gray-200 bg-[#fdfdfd] text-[#575757]">
                    {{-- <tr>
                        <td class="px-6 py-4 whitespace-normal">
                            <div class="max-w-[10vw] break-words">
                                SmartFarm: An IoT-Based Monitoring System for Sustainable Agriculture
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">Maria L. Santos<br>John P. Dela Cruz<br>Angela M. Reyes</td>
                        <td class="px-6 py-4 whitespace-normal">
                            <div class="max-w-[20vw] break-words">
                                This study presents SmartFarm, an IoT-based solution designed to monitor soil moisture, temperature, and humidity in real time to aid small-scale Filipino farmers. Utilizing sensor nodes and a cloud-based dashboard, the system provides timely data for crop management. The goal is to improve yield prediction and resource efficiency through smart agriculture practices.
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">Moana L. Tefiti</td>
                        <td class="px-6 py-4 whitespace-nowrap">BSIT</td>
                        <td class="px-6 py-4 whitespace-nowrap">2021</td>
                        <td class="px-6 py-4 whitespace-nowrap">Maria L. Santos</td>
                        <td class="px-6 py-4 whitespace-nowrap">July 02, 2025 13:45</td> --}}
                    </tr>
                </tbody>
            </table>

            <div id="pagination-controls-forms-history" class="mt-4 flex justify-end space-x-2">
                <button onclick="changePage('forms-history', -1)"
                    class="cursor-pointer rounded bg-gray-300 px-3 py-1 hover:bg-gray-400">&lt;</button>
                <span id="pagination-info-forms-history" class="px-3 py-1 text-[#575757]">Page 1</span>
                <button onclick="changePage('forms-history', 1)"
                    class="cursor-pointer rounded bg-gray-300 px-3 py-1 hover:bg-gray-400">&gt;</button>
            </div>

        </div>
    @else
        <p class="text-red-600">You have no view permissions for Forms Submissions.</p>
    @endif
</main>

<!-- Missing Remarks Modal -->
<div id="forms-missing-remarks-modal" style="display: none;"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4 sm:p-6 md:p-8">
    <div
        class="relative max-h-[90vh] w-full max-w-sm overflow-y-auto rounded-2xl bg-[#fdfdfd] p-6 shadow-xl sm:max-w-md sm:p-8 md:max-w-lg lg:max-w-xl">
        <!-- Icon -->
        <div class="flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="#E53E3E" class="h-16 w-16 sm:h-20 sm:w-20 md:h-24 md:w-24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v2m0 4h.01M21 12A9 9 0 1 1 3 12a9 9 0 0 1 18 0z" />
            </svg>
        </div>
        <!-- Title -->
        <div class="mt-6 text-center text-lg font-semibold text-[#E53E3E] sm:mt-8 sm:text-xl md:text-2xl">
            Remarks Required
        </div>
        <!-- Subtitle -->
        <div class="mt-3 text-center text-sm font-normal text-[#575757] sm:mt-4 sm:text-base md:text-lg">
            Please enter remarks before proceeding.
        </div>
        <!-- Button -->
        <div class="mt-8 flex justify-center sm:mt-12">
            <button id="forms-missing-remarks-ok"
                class="cursor-pointer rounded-full bg-gradient-to-r from-[#FE5252] to-[#E10C0C] px-6 py-2 text-sm text-[#fdfdfd] shadow hover:brightness-110 sm:px-8 sm:py-3 sm:text-base md:px-10 md:py-4 md:text-lg">
                OK
            </button>
        </div>
    </div>
</div>

<script>
    // Forms Submission Accept/Reject Logic
    let currentFormsSubmissionId = null;

    // Accept Modal Functions
    function openFormsAcceptModal(submissionId) {
        currentFormsSubmissionId = submissionId;
        document.getElementById('forms-submission-id-holder').value = submissionId;
        document.getElementById('forms-accept-modal').style.display = 'flex';

        // Clear previous values
        document.getElementById('forms-forward-email').value = '';
        document.getElementById('forms-forward-message').value = '';
        document.getElementById('forms-accept-remarks').value = '';
        document.getElementById('forms-accept-char-count').textContent = '0';
        document.getElementById('forms-forward-char-count').textContent = '0';

        // Reset to step 1
        document.getElementById('forms-ca-step1').classList.remove('hidden');
        document.getElementById('forms-ca-step2').classList.add('hidden');
        document.getElementById('forms-ca-step3').classList.add('hidden');
    }

    function closeFormsAcceptModal() {
        document.getElementById('forms-accept-modal').style.display = 'none';
        document.getElementById('forms-ca-step1').classList.remove('hidden');
        document.getElementById('forms-ca-step2').classList.add('hidden');
        document.getElementById('forms-ca-step3').classList.add('hidden');
        currentFormsSubmissionId = null;
    }

    // Reject Modal Functions
    function openFormsRejectModal(submissionId) {
        currentFormsSubmissionId = submissionId;
        document.getElementById('forms-reject-submission-id-holder').value = submissionId;
        document.getElementById('forms-reject-modal').style.display = 'flex';

        // Clear previous values
        document.getElementById('forms-reject-remarks').value = '';
        document.getElementById('forms-reject-char-count').textContent = '0';

        // Reset to step 1
        document.getElementById('forms-cr-step1').classList.remove('hidden');
        document.getElementById('forms-cr-step2').classList.add('hidden');
    }

    function closeFormsRejectModal() {
        document.getElementById('forms-reject-modal').style.display = 'none';
        currentFormsSubmissionId = null;
    }

    // Show missing remarks modal
    function showMissingRemarksModal() {
        document.getElementById('forms-missing-remarks-modal').style.display = 'flex';
    }
    document.getElementById('forms-missing-remarks-ok').addEventListener('click', function() {
        document.getElementById('forms-missing-remarks-modal').style.display = 'none';
    });
    document.getElementById('forms-missing-remarks-close').addEventListener('click', function() {
        document.getElementById('forms-missing-remarks-modal').style.display = 'none';
    });

    // Event Listeners
    document.addEventListener('DOMContentLoaded', function() {
        // Success/Error modal helpers
        window.showFormsSuccess = function(title, message) {
            const modal = document.getElementById('forms-success-modal');
            document.getElementById('forms-success-title').textContent = title || 'Success';
            document.getElementById('forms-success-message').textContent = message ||
                'Action completed successfully.';
            modal.style.display = 'flex';
        }

        window.showFormsError = function(title, message) {
            const modal = document.getElementById('forms-error-modal');
            document.getElementById('forms-error-title').textContent = title || 'Something went wrong';
            document.getElementById('forms-error-message').textContent = message || 'Please try again.';
            modal.style.display = 'flex';
        }

        // Success modal events
        document.getElementById('forms-success-close').addEventListener('click', () => {
            document.getElementById('forms-success-modal').style.display = 'none';
        });
        document.getElementById('forms-success-ok').addEventListener('click', () => {
            document.getElementById('forms-success-modal').style.display = 'none';
        });

        // Error modal events
        document.getElementById('forms-error-close').addEventListener('click', () => {
            document.getElementById('forms-error-modal').style.display = 'none';
        });
        document.getElementById('forms-error-ok').addEventListener('click', () => {
            document.getElementById('forms-error-modal').style.display = 'none';
        });
        const acceptPopup = document.getElementById('forms-accept-modal');
        const acceptStep1 = document.getElementById('forms-ca-step1');
        const acceptStep2 = document.getElementById('forms-ca-step2');
        const acceptStep3 = document.getElementById('forms-ca-step3');

        const rejectPopup = document.getElementById('forms-reject-modal');
        const rejectStep1 = document.getElementById('forms-cr-step1');
        const rejectStep2 = document.getElementById('forms-cr-step2');

        // Accept Modal - Step 1 → Step 2
        document.getElementById('forms-ca-confirm1-btn').addEventListener('click', () => {
            acceptStep1.classList.add('hidden');
            acceptStep2.classList.remove('hidden');
        });

        // Accept Modal - Step 2 → Step 1 (Back button)
        document.getElementById('forms-ca-back-btn').addEventListener('click', () => {
            acceptStep2.classList.add('hidden');
            acceptStep1.classList.remove('hidden');
        });

        // Accept Modal - Step 2 → Step 3 (Approve & Continue)
        document.getElementById('forms-ca-confirm2-btn').addEventListener('click', () => {
            const remarks = document.getElementById('forms-accept-remarks').value.trim();

            if (!remarks) {
                showMissingRemarksModal();
                return;
            }

            // First approve the submission
            const currentSubmissionId = document.getElementById('forms-submission-id-holder').value;
            const confirmBtn = document.getElementById('forms-ca-confirm2-btn');

            confirmBtn.disabled = true;
            confirmBtn.classList.remove('cursor-pointer');
            confirmBtn.classList.add('opacity-50', 'cursor-not-allowed');
            confirmBtn.textContent = 'Processing...';

            fetch(`/forms/${currentSubmissionId}/approve`, {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        remarks,
                        _token: document.querySelector('meta[name="csrf-token"]').content
                    })
                })
                .then(async (res) => {
                    if (!res.ok) {
                        const text = await res.text().catch(() => '');
                        throw new Error(text || `HTTP ${res.status}`);
                    }
                    return res.text().catch(() => '');
                })
                .then(() => {
                    // Move to step 3 for email forwarding
                    acceptStep2.classList.add('hidden');
                    acceptStep3.classList.remove('hidden');
                    // Show success modal (Accepted)
                    showFormsSuccess('Accepted',
                        'Form submission has been accepted. You may optionally forward the file.'
                    );
                })
                .catch(error => {
                    console.error('Error:', error);
                    showFormsError('Failed to accept',
                        'There was a problem accepting this submission. Please try again.');
                })
                .finally(() => {
                    confirmBtn.disabled = false;
                    confirmBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    confirmBtn.classList.add('cursor-pointer');
                    confirmBtn.textContent = 'Approve & Continue';
                });
        });

        // Reject Modal - Step 1 → Step 2
        document.getElementById('forms-cr-confirm1-btn').addEventListener('click', () => {
            rejectStep1.classList.add('hidden');
            rejectStep2.classList.remove('hidden');
        });

        // Reject Modal - Step 2 → Step 1 (Back button)
        document.getElementById('forms-cr-back-btn').addEventListener('click', () => {
            rejectStep2.classList.add('hidden');
            rejectStep1.classList.remove('hidden');
        });

        // Reject Modal - Step 2 Confirm
        document.getElementById('forms-cr-confirm2-btn').addEventListener('click', () => {
            const remarks = document.getElementById('forms-reject-remarks').value.trim();

            if (!remarks) {
                showMissingRemarksModal();
                return;
            }

            const confirmBtn = document.getElementById('forms-cr-confirm2-btn');
            confirmBtn.disabled = true;
            confirmBtn.classList.remove('cursor-pointer');
            confirmBtn.classList.add('opacity-50', 'cursor-not-allowed');
            confirmBtn.textContent = 'Processing...';

            fetch(`/forms/${currentFormsSubmissionId}/reject`, {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        remarks,
                        _token: document.querySelector('meta[name="csrf-token"]').content
                    })
                })
                .then(async (res) => {
                    if (!res.ok) {
                        const text = await res.text().catch(() => '');
                        throw new Error(text || `HTTP ${res.status}`);
                    }
                    return res.text().catch(() => '');
                })
                .then(() => {
                    showFormsSuccess('Rejected', 'Form submission has been rejected.');
                    rejectPopup.style.display = 'none';
                    rejectStep1.classList.remove('hidden');
                    rejectStep2.classList.add('hidden');
                    fetchFormsSubmissionData();
                })
                .catch(error => {
                    console.error('Error:', error);
                    showFormsError('Failed to reject',
                        'There was a problem rejecting this submission. Please try again.');
                })
                .finally(() => {
                    confirmBtn.disabled = false;
                    confirmBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    confirmBtn.classList.add('cursor-pointer');
                    confirmBtn.textContent = 'Confirm Rejection';
                });
        });

        // Close modals
        document.getElementById('forms-close-accept-modal').addEventListener('click', () => {
            acceptPopup.style.display = 'none';
            acceptStep1.classList.remove('hidden');
            acceptStep2.classList.add('hidden');
            acceptStep3.classList.add('hidden');
        });

        document.getElementById('forms-cancel1-btn').addEventListener('click', () => {
            acceptPopup.style.display = 'none';
            acceptStep1.classList.remove('hidden');
            acceptStep2.classList.add('hidden');
            acceptStep3.classList.add('hidden');
        });

        document.getElementById('forms-close-reject-modal').addEventListener('click', () => {
            rejectPopup.style.display = 'none';
            rejectStep1.classList.remove('hidden');
            rejectStep2.classList.add('hidden');
        });

        document.getElementById('forms-cr-cancel1-btn').addEventListener('click', () => {
            rejectPopup.style.display = 'none';
            rejectStep1.classList.remove('hidden');
            rejectStep2.classList.add('hidden');
        });

        // Step 3 buttons - Skip Forwarding
        document.getElementById('forms-ca-skip-btn').addEventListener('click', () => {
            showFormsSuccess('Accepted', 'Form submission has been accepted.');
            acceptPopup.style.display = 'none';
            acceptStep1.classList.remove('hidden');
            acceptStep2.classList.add('hidden');
            acceptStep3.classList.add('hidden');
            fetchFormsSubmissionData();
        });

        // Step 3 buttons - Send & Complete
        document.getElementById('forms-ca-forward-btn').addEventListener('click', () => {
            const email = document.getElementById('forms-forward-email').value.trim();
            const message = document.getElementById('forms-forward-message').value.trim();

            if (!email) {
                alert('Please enter an email address to forward the file.');
                return;
            }

            if (!message) {
                alert('Please enter a message to send with the file.');
                return;
            }

            const forwardBtn = document.getElementById('forms-ca-forward-btn');
            forwardBtn.disabled = true;
            forwardBtn.classList.remove('cursor-pointer');
            forwardBtn.classList.add('opacity-50', 'cursor-not-allowed');
            forwardBtn.textContent = 'Sending...';

            // Placeholder forwarding flow
            setTimeout(() => {
                showFormsSuccess('Forwarded', 'The file was forwarded successfully.');
                acceptPopup.style.display = 'none';
                acceptStep1.classList.remove('hidden');
                acceptStep2.classList.add('hidden');
                acceptStep3.classList.add('hidden');
                fetchFormsSubmissionData();

                forwardBtn.disabled = false;
                forwardBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                forwardBtn.classList.add('cursor-pointer');
                forwardBtn.textContent = 'Send & Complete';
            }, 1000);
        });
    });
</script>
