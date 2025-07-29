    <!-- Toggle Button (optional for mobile) -->
<button data-drawer-target="mobile-sidebar" data-drawer-toggle="mobile-sidebar" aria-controls="mobile-sidebar"
    type="button"
    class="md:hidden group inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg hover:bg-gradient-to-b from-[#D56C6C] to-[#C96262] focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Toggle sidebar</span>
    <svg class="w-6 h-6 fill-current text-gray-500 group-hover:text-[#fdfdfd]" aria-hidden="true" viewBox="0 0 20 20">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z" />
    </svg>
</button>

<!-- Sidebar -->
<div class="hidden md:block group fixed top-0 left-0 z-40 h-screen bg-gradient-to-b from-[#D56C6C] to-[#C96262] transition-all duration-300 w-16 hover:w-64 ">
    <aside class="h-full overflow-y-auto px-3 py-4 text-white">
        <div class="group fixed top-0 left-0 z-40 h-screen bg-gradient-to-b from-[#D56C6C] to-[#C96262] transition-all duration-300 w-16 hover:w-64">
            <aside id="logo-sidebar" class="h-full overflow-y-auto px-3 py-4 text-white">
                <div class="flex items-center text-[#fffff0] space-x-3">
                    <svg class="w-6 h-6 flex-shrink-0 text-[#fffff0]" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 12c-4.418 0-8 2.239-8 5v1a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-1c0-2.761-3.582-5-8-5Z" />
                    </svg>
                    <div class="invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                        <a href="#" class="font-semibold hover:underline block username-admin">User Name</a>
                        <div class="text-sm font-light">Admin Title</div>
                    </div>
                </div>

                <!-- Nav items -->
                <ul class="space-y-2 font-medium">
                    <li class="mt-10"></li>
                    @if(auth()->user()->hasPermission('view-submissions'))
                        <li>
                            <a href="#"  id="submission-tab"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#e97b7b] dark:hover:bg-[#e97b7b] group">
                                
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white shrink-0">
                                    <path fill-rule="evenodd" d="M4.125 3C3.089 3 2.25 3.84 2.25 4.875V18a3 3 0 0 0 3 3h15a3 3 0 0 1-3-3V4.875C17.25 3.839 16.41 3 15.375 3H4.125ZM12 9.75a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H12Zm-.75-2.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5H12a.75.75 0 0 1-.75-.75ZM6 12.75a.75.75 0 0 0 0 1.5h7.5a.75.75 0 0 0 0-1.5H6Zm-.75 3.75a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1-.75-.75ZM6 6.75a.75.75 0 0 0-.75.75v3c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-3A.75.75 0 0 0 9 6.75H6Z" clip-rule="evenodd" />
                                    <path d="M18.75 6.75h1.875c.621 0 1.125.504 1.125 1.125V18a1.5 1.5 0 0 1-3 0V6.75Z" />
                                </svg>

                                <span class="ms-3 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                                    Submissions
                                </span>
                            </a>
                        </li>
                    @endif

                    @if(auth()->user()->hasPermission('view-inventory'))
                        <li>
                            <a href="#"  id="inventory-tab"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#e97b7b] dark:hover:bg-[#e97b7b] group">
                                
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white shrink-0">
                                    <path d="M19.906 9c.382 0 .749.057 1.094.162V9a3 3 0 0 0-3-3h-3.879a.75.75 0 0 1-.53-.22L11.47 3.66A2.25 2.25 0 0 0 9.879 3H6a3 3 0 0 0-3 3v3.162A3.756 3.756 0 0 1 4.094 9h15.812ZM4.094 10.5a2.25 2.25 0 0 0-2.227 2.568l.857 6A2.25 2.25 0 0 0 4.951 21H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-2.227-2.568H4.094Z" />
                                </svg>

                                <span class="ms-3 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                                    Inventory
                                </span>
                            </a>
                        </li>
                    @endif

                    @if(auth()->user()->hasPermission('view-accounts'))
                        <li>
                            <a href="#"  id="users-tab"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#e97b7b] dark:hover:bg-[#e97b7b] group">
                                
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white shrink-0">
                                    <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                                </svg>

                                <span class="ms-3 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                                    Users
                                </span>
                            </a>
                        </li>
                    @endif

                    <li>
                        <a href="#"  id="logs-tab"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#e97b7b] dark:hover:bg-[#e97b7b] group">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white shrink-0">
                                <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375ZM6 12a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V12Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 15a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V15Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 18a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V18Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                            </svg>

                            <span class="ms-3 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                                Logs
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="#"  id="backup-tab"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#e97b7b] dark:hover:bg-[#e97b7b] group">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white shrink-0">
                                <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                                <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087ZM12 10.5a.75.75 0 0 1 .75.75v4.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l1.72 1.72v-4.94a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                            </svg>

                            <span class="ms-3 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                                Backup
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#e97b7b] dark:hover:bg-[#e97b7b] group logout-btn">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white shrink-0">
                                <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 0 0 6 5.25v13.5a1.5 1.5 0 0 0 1.5 1.5h6a1.5 1.5 0 0 0 1.5-1.5V15a.75.75 0 0 1 1.5 0v3.75a3 3 0 0 1-3 3h-6a3 3 0 0 1-3-3V5.25a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3V9A.75.75 0 0 1 15 9V5.25a1.5 1.5 0 0 0-1.5-1.5h-6Zm5.03 4.72a.75.75 0 0 1 0 1.06l-1.72 1.72h10.94a.75.75 0 0 1 0 1.5H10.81l1.72 1.72a.75.75 0 1 1-1.06 1.06l-3-3a.75.75 0 0 1 0-1.06l3-3a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                            </svg>

                            <span class="ms-3 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                                Logout
                            </span>
                        </a>
                    </li>
                    
                </ul>
            </aside>
        </div>
    </aside>
</div>

<div id="mobile-sidebar"
    class="fixed top-0 left-0 z-50 h-screen w-64 bg-gradient-to-b from-[#D56C6C] to-[#C96262] transform -translate-x-full transition-transform duration-300 md:hidden"
    tabindex="-1" aria-label="Sidebar">
    <aside class="h-full px-3 py-4 overflow-y-auto text-white">
        <aside id="logo-sidebar" class="h-full overflow-y-auto px-3 py-4 text-white">
                <div class="flex items-center text-[#fffff0] space-x-3">
                    <svg class="w-6 h-6 flex-shrink-0 text-[#fffff0]" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 12c-4.418 0-8 2.239-8 5v1a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-1c0-2.761-3.582-5-8-5Z" />
                    </svg>
                    <div class="ms-3 transition-opacity duration-300 whitespace-nowrap">
                        <a href="#" class="font-semibold hover:underline block username-admin">User Name</a>
                        <div class="text-sm font-light">Admin Title</div>
                    </div>
                </div>

                <!-- Nav items -->
                <ul class="space-y-2 font-medium">
                    <li class="mt-10"></li>
                    <li>
                        <a href="#"  id="submission-tab-mobile"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#e97b7b] dark:hover:bg-[#e97b7b] group">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white shrink-0">
                                <path fill-rule="evenodd" d="M4.125 3C3.089 3 2.25 3.84 2.25 4.875V18a3 3 0 0 0 3 3h15a3 3 0 0 1-3-3V4.875C17.25 3.839 16.41 3 15.375 3H4.125ZM12 9.75a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H12Zm-.75-2.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5H12a.75.75 0 0 1-.75-.75ZM6 12.75a.75.75 0 0 0 0 1.5h7.5a.75.75 0 0 0 0-1.5H6Zm-.75 3.75a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1-.75-.75ZM6 6.75a.75.75 0 0 0-.75.75v3c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-3A.75.75 0 0 0 9 6.75H6Z" clip-rule="evenodd" />
                                <path d="M18.75 6.75h1.875c.621 0 1.125.504 1.125 1.125V18a1.5 1.5 0 0 1-3 0V6.75Z" />
                            </svg>
                            <span class="ms-3 transition-opacity duration-300 whitespace-nowrap">
                                Submissions
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="#"  id="inventory-tab-mobile"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#e97b7b] dark:hover:bg-[#e97b7b] group">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white shrink-0">
                                <path d="M19.906 9c.382 0 .749.057 1.094.162V9a3 3 0 0 0-3-3h-3.879a.75.75 0 0 1-.53-.22L11.47 3.66A2.25 2.25 0 0 0 9.879 3H6a3 3 0 0 0-3 3v3.162A3.756 3.756 0 0 1 4.094 9h15.812ZM4.094 10.5a2.25 2.25 0 0 0-2.227 2.568l.857 6A2.25 2.25 0 0 0 4.951 21H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-2.227-2.568H4.094Z" />
                            </svg>
                            <span class="ms-3 transition-opacity duration-300 whitespace-nowrap">
                                Inventory
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="#"  id="users-tab-mobile"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#e97b7b] dark:hover:bg-[#e97b7b] group">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white shrink-0">
                                <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                            </svg>
                            <span class="ms-3 transition-opacity duration-300 whitespace-nowrap">
                                Users
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="#"  id="logs-tab-mobile"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#e97b7b] dark:hover:bg-[#e97b7b] group">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white shrink-0">
                                <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375ZM6 12a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V12Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 15a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V15Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 18a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V18Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                            </svg>
                            <span class="ms-3 transition-opacity duration-300 whitespace-nowrap">
                                Logs
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="#"  id="backup-tab-mobile"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#e97b7b] dark:hover:bg-[#e97b7b] group">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white shrink-0">
                                <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                                <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087ZM12 10.5a.75.75 0 0 1 .75.75v4.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l1.72 1.72v-4.94a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                            </svg>
                            <span class="ms-3 transition-opacity duration-300 whitespace-nowrap">
                                Backup
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#e97b7b] dark:hover:bg-[#e97b7b] group logout-btn">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white shrink-0">
                                <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 0 0 6 5.25v13.5a1.5 1.5 0 0 0 1.5 1.5h6a1.5 1.5 0 0 0 1.5-1.5V15a.75.75 0 0 1 1.5 0v3.75a3 3 0 0 1-3 3h-6a3 3 0 0 1-3-3V5.25a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3V9A.75.75 0 0 1 15 9V5.25a1.5 1.5 0 0 0-1.5-1.5h-6Zm5.03 4.72a.75.75 0 0 1 0 1.06l-1.72 1.72h10.94a.75.75 0 0 1 0 1.5H10.81l1.72 1.72a.75.75 0 1 1-1.06 1.06l-3-3a.75.75 0 0 1 0-1.06l3-3a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                            </svg>
                            <span class="ms-3 transition-opacity duration-300 whitespace-nowrap">
                                Logout
                            </span>
                        </a>
                    </li>
                    
                </ul>
            </aside>
    </aside>
</div>

<script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
