<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex h-16 items-center justify-between">

            <!-- Logo + Links -->
            <div class="flex items-center">

                <div class="shrink-0">
                    <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                        class="size-8" />
                </div>

                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">

                        <a href="/" class="<?= UrlIs('/') ? "bg-gray-900 text-white" : "text-gray-300" ?> rounded-md px-3 py-2 text-sm font-medium hover:bg-white/5 hover:text-white">
                            Home
                        </a>

                        <a href="/about" class="<?= UrlIs('/about') ? "bg-gray-900 text-white" : "text-gray-300" ?> rounded-md px-3 py-2 text-sm font-medium hover:bg-white/5 hover:text-white">
                            About
                        </a>

                        <a href="/contact" class="<?= UrlIs('/contact') ? "bg-gray-900 text-white" : "text-gray-300" ?> rounded-md px-3 py-2 text-sm font-medium hover:bg-white/5 hover:text-white">
                            Contact
                        </a>

                        <a href="/notes" class="<?= UrlIs('/notes') ? "bg-gray-900 text-white" : "text-gray-300" ?> rounded-md px-3 py-2 text-sm font-medium hover:bg-white/5 hover:text-white">
                            Notes
                        </a>

                    </div>
                </div>
            </div>


            <!-- Right Side -->
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">

                    <?php if ($_SESSION['name'] ?? false): ?>

                        <!-- Avatar -->
                        <div class="relative ml-3">
                            <button class="flex max-w-xs items-center rounded-full focus:outline-none">

                                <img
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />

                            </button>

                            <!-- Dropdown -->
                            <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg">

                                <div class="px-4 py-2 text-sm text-gray-700 border-b">
                                    <?= htmlspecialchars($_SESSION['name']) ?>
                                </div>

                                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Your profile
                                </a>

                                <a href="/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Settings
                                </a>

                                <form method="POST" action="/logout">
                                    <button class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Sign out
                                    </button>
                                </form>

                            </div>
                        </div>

                    <?php else: ?>

                        <div class="flex gap-4">

                            <a href="/login" class="text-gray-300 hover:text-white text-sm font-medium">
                                Login
                            </a>

                            <a href="/register" class="text-gray-300 hover:text-white text-sm font-medium">
                                Register
                            </a>

                        </div>

                    <?php endif; ?>

                </div>
            </div>


            <!-- Mobile menu button -->
            <div class="-mr-2 flex md:hidden">

                <button type="button"
                    command="--toggle"
                    commandfor="mobile-menu"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white">

                    <svg viewBox="0 0 24 24" stroke="currentColor" class="size-6">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>

                </button>

            </div>

        </div>
    </div>


    <!-- Mobile Menu -->
    <el-disclosure id="mobile-menu" hidden class="block md:hidden">

        <div class="space-y-1 px-2 pt-2 pb-3">

            <a href="/" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">
                Home
            </a>

            <a href="/about" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">
                About
            </a>

            <a href="/contact" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">
                Contact
            </a>

            <a href="/notes" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">
                Notes
            </a>

        </div>

        <div class="border-t border-white/10 pt-4 pb-3 px-5">

            <?php if ($_SESSION['name'] ?? false): ?>

                <div class="text-white font-medium mb-2">
                    <?= htmlspecialchars($_SESSION['name']) ?>
                </div>

                <form method="POST" action="/logout">
                    <button class="text-gray-400 hover:text-white">
                        Logout
                    </button>
                </form>

            <?php else: ?>

                <div class="flex gap-4">

                    <a href="/login" class="text-gray-300 hover:text-white">
                        Login
                    </a>

                    <a href="/register" class="text-gray-300 hover:text-white">
                        Register
                    </a>

                </div>

            <?php endif; ?>

        </div>

    </el-disclosure>

</nav>