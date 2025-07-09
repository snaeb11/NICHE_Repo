<!-- Collapsible Sidebar Component -->
<div class="group fixed top-0 left-0 h-screen bg-gradient-to-b from-[#D56C6C] to-[#C96262] min-w-[4vw] max-w-[20vw] hover:min-w-[18vw] hover:max-w-[18vw] transition-all duration-300 ease-in-out overflow-hidden">

  <!-- User Info -->
  <div class="flex items-center space-x-2 px-4 py-6">
    <!-- Username & Title -->
    <div class="text-[#fffff0]">
      <a id="username" href="#" class="font-semibold hidden group-hover:block hover:underline">User Name</a>
      <div class="text-sm font-light hidden group-hover:block">Admin Title</div>
    </div>

    <!-- Logout Icon -->
    <div id="logout-btn" class="ml-auto text-[#fffff0] hover:text-[#575757] cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5" />
      </svg>
    </div>
  </div>

  <!-- Spacer -->
  <div class="my-10"></div>

  <!-- Menu Items -->
  <nav class="flex flex-col space-y-2 text-[#fffff0]">
    <a id="submission-tab" href="#" class="group/item flex items-center px-4 py-3 text-[#fffff0] font-semibold transition-all duration-200 hover:bg-[#fffff0]">
        <span class="hidden group-hover:block group-hover/item:text-[#575757] transition duration-200">Submissions</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-auto text-[#fffff0] group-hover/item:text-[#575757] transition duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </a>

    <a id="inventory-tab" href="#" class="group/item flex items-center px-4 py-3 text-[#fffff0] font-semibold transition-all duration-200 hover:bg-[#fffff0]">
        <span class="hidden group-hover:block group-hover/item:text-[#575757] transition duration-200">Inventory</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-auto text-[#fffff0] group-hover/item:text-[#575757] transition duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </a>

    <a id="users-tab" href="#" class="group/item flex items-center px-4 py-3 text-[#fffff0] font-semibold transition-all duration-200 hover:bg-[#fffff0]">
        <span class="hidden group-hover:block group-hover/item:text-[#575757] transition duration-200">Users</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-auto text-[#fffff0] group-hover/item:text-[#575757] transition duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </a>

    <a id="logs-tab" href="#" class="group/item flex items-center px-4 py-3 text-[#fffff0] font-semibold transition-all duration-200 hover:bg-[#fffff0]">
        <span class="hidden group-hover:block group-hover/item:text-[#575757] transition duration-200">Logs</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-auto text-[#fffff0] group-hover/item:text-[#575757] transition duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </a>

    <a id="backup-tab" href="#" class="group/item flex items-center px-4 py-3 text-[#fffff0] font-semibold transition-all duration-200 hover:bg-[#fffff0]">
        <span class="hidden group-hover:block group-hover/item:text-[#575757] transition duration-200">Backup</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-auto text-[#fffff0] group-hover/item:text-[#575757] transition duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </a>
  </nav>
</div>
