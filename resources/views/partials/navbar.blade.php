<nav class="bg-white border border-b-2 border-t-0 border-x-0">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-3">
        <a href="{{ route('mentor.search') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('MentoraClean.png') }}" class="h-16" alt="Logo" />
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col items-center p-4 md:p-0 mt-4 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 pb-0">
                @if (Session::has('mentor_id'))
                    {{-- navbar guru --}}
                    <li>
                        <a href="{{ route('schedule.') }}" class="block py-4 px-3 rounded md:p-0"
                            aria-current="page">Set
                            Schedule</a>
                    </li>
                    <li>
                        <a href="{{ route('review.booking') }}" class="block py-4 px-3 rounded md:p-0"
                            aria-current="page">Booking List</a>
                    </li>
                    <li>
                        <a href="{{ route('review.session') }}" class="block py-4 px-3 rounded md:p-0"
                            aria-current="page">Performance</a>
                    </li>
                @elseif(Session::has('student_id'))
                    {{-- navbar murid --}}
                    <li>
                        <a href="{{ route('register.mentor') }}" class="block py-4 px-3 rounded md:p-0"
                            aria-current="page">Become a Tutor</a>
                    </li>
                @endif

                {{-- Both mentor & student --}}
                @if (Session::has('student_id'))
                    <li>
                        <a href="{{ route('review.history') }}" class="block py-4 px-3 rounded md:p-0"
                            aria-current="page">Learning History</a>
                    </li>
                @endif

                <li>
                    <a class="rounded-full w-40 text-white p-3 px-5 text-center mb-3 md:mb-0"
                        style="background-color: #DA9318" href="{{ route('mentor.search') }}">
                        <i class="fa-solid fa-magnifying-glass mr-2"></i> Find a Tutor
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset(session('profile_picture') ? session('profile_picture') : 'profile.png') }}"
                            alt="profile" class="h-12 w-12 rounded-full">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
