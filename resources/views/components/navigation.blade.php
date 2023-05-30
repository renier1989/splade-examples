<x-splade-data default="{ open: false }">
    <nav class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex w-full">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('home') }}">
                            <x-application-mark class="block h-9 w-auto" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex w-full">
                        <div class="flex flex-row items-center justify-between w-full">
                            <div class="space-x-3">
                                @auth
                                <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                    {{ __('Dashboard') }}
                                </x-nav-link>
                                @endauth
                                <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                                    {{ __('Home') }}
                                </x-nav-link>
        
                                <x-nav-link href="{{ route('docs') }}" :active="request()->routeIs('docs')">
                                    {{ __('Documentation') }}
                                </x-nav-link>
                                @auth
                                <x-nav-link href="{{ route('post.index') }}" :active="request()->routeIs('post.index')">
                                    {{ __('Posts') }}
                                </x-nav-link>
                                <x-nav-link href="{{ route('trees.index') }}" :active="request()->routeIs('trees.index')">
                                    {{ __('Trees') }}
                                </x-nav-link>
                                @endauth
                                <x-nav-link href="{{ route('practicando') }}" :active="request()->routeIs('practicando')">
                                    {{ __('Practices') }}
                                </x-nav-link>
                            </div>
                            <div>
                                @if (Route::has('login'))
                                <div class="hidden px-6 py-4 sm:block">
                                    @auth
                                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                                        <x-dropdown placement="bottom-end">
                                            <x-slot name="trigger">
                                                <button class="flex items-center text-sm font-medium text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                                                    <div>{{ Auth::user()->name }}</div>
                    
                                                    <div class="ml-1">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </x-slot>
                    
                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('profile.edit')">
                                                    {{ __('Profile') }}
                                                </x-dropdown-link>
                    
                                                <!-- Authentication -->
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                    
                                                    <x-dropdown-link as="a" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                                        {{ __('Log Out') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                    </div>
                                    @else
                                    <Link href="{{ route('login') }}"
                                        class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</Link>
        
                                    @if (Route::has('register'))
                                    <Link href="{{ route('register') }}"
                                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</Link>
                                    @endif
                                    @endauth
                                </div>
                                @endif
                            </div>
                        </div>
                        
                    </div>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="data.open = ! data.open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path v-bind:class="{'hidden': data.open, 'inline-flex': ! data.open }"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path v-bind:class="{'hidden': ! data.open, 'inline-flex': data.open }"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div v-bind:class="{'block': data.open, 'hidden': ! data.open }" class="sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="{{ route('docs') }}" :active="request()->routeIs('docs')">
                    {{ __('Documentation') }}
                </x-responsive-nav-link>
                @auth
                <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
    
                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
    
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
    
                            <x-responsive-nav-link as="a" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </nav>
</x-splade-data>