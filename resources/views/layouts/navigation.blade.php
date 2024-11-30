<style>
    #wrapper {
        overflow: hidden;
        height: 0;
        /* Initially collapsed */
        transition: height 500ms;
    }

    #toggle-icon {
        /* Hidden initially */
        cursor: pointer;
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 1000;
    }

    @media (max-width: 768px) {
        #toggle-icon {
            display: block;
            /* Show icon on smaller screens */
        }
    }
    .visible {
    overflow: visible !important;
}
</style>
<nav x-data="{ open: false }"
    class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 fixed top-0 left-0 w-full z-50">
    <div id="toggle-icon">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="24"
            height="24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </div>
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="wrapper">
        <div class="flex justify-between h-16">
            <!-- Logo Section -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('project_logo/logo1.jpeg') }}" alt="Logo" class="h-10 lg:h-12 w-auto" />
                </a>
            </div>

            <!-- Navigation Links for Larger Screens -->
            <div class="hidden sm:flex sm:items-center sm:space-x-8">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                    {{ __('User List') }}
                </x-nav-link>
                <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')">
                    {{ __('Category') }}
                </x-nav-link>
                <x-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.index')">
                    {{ __('Article') }}
                </x-nav-link>
                <x-nav-link :href="route('comments.index')" :active="request()->routeIs('comments.index')">
                    {{ __('Comment') }}
                </x-nav-link>
                <x-nav-link :href="route('memberships.index')" :active="request()->routeIs('memberships.index')">
                    {{ __('Membership') }}
                </x-nav-link>
            </div>

            <!-- User Dropdown and Hamburger Menu -->
            <div class="flex items-center">
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                                <div>{{ Auth::user()->name }} ({{ Auth::user()->role }})</div>
                                <div class="ms-1">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger Menu -->
                <div class="sm:hidden">
                    <button @click="open = !open"
                        class="p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                {{ __('User List') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')">
                {{ __('Category') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.index')">
                {{ __('Article') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('comments.index')" :active="request()->routeIs('comments.index')">
                {{ __('Comment') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('memberships.index')" :active="request()->routeIs('memberships.index')">
                {{ __('Membership') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="border-t border-gray-200 dark:border-gray-600">
            <div class="px-4 py-3">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function() {
        var icon = $("#toggle-icon");
        var wrapper = $("#wrapper");

        icon.click(function() {
            if (wrapper.hasClass('open')) {
                // Collapse the menu
                wrapper.removeClass('open');
                wrapper.removeClass('visible');
                wrapper.height(0);
            } else {
                // Expand the menu
                wrapper.addClass('open');
                wrapper.addClass('visible');
                wrapper.height(wrapper.prop('scrollHeight'));
            }
        });
    });
</script>
