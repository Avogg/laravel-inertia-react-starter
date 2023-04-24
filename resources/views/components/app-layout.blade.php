<!DOCTYPE html>
<html x-data="data" data-theme="winter" lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @viteReactRefresh
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            [x-cloak] { display: none !important; }
        </style>

        <!-- Scripts -->
        <script src="{{ asset('js/init-alpine.js') }}"></script>
        <script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        @livewireStyles

</head>
<body>
    <!-- Desktop sidebar -->
    @include('layouts.navigation')

    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <div class="drawer drawer-mobile">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
                   <div class="artboard px-6">
                        @if (isset($header))
                        <h2 class="my-6 text-2xl font-semibold">
                            {{ $header }}
                        </h2>
                        @endif

                        <div>
                            {{ $slot }}
                        </div>
                   </div>
        </div>
        <div class="drawer-side">
          <label for="my-drawer-2" class="drawer-overlay"></label>
          <ul class="menu p-4 w-80 bg-base-200 text-base-content gap-4">
            <!-- Sidebar content here -->

                <li><a href="/" class="{{request()->routeIs('welcome') ? 'active' : ''}}">Home</a></li>
                <li>Psyquence</li>
                <li><a href="{{ route('doctors.psyquence.templates') }}" class="{{request()->routeIs('doctors.psyquence.templates') ? 'active' : ''}}"><x-feathericon-archive />Psyquence Templates</a></li>
                <li><a href="{{ route('doctors.psyquence.index') }}" class="{{request()->routeIs('doctors.psyquence.*') ? 'active' : ''}}"><x-feathericon-grid />Sessões Psyquence</a></li>
                <li>Palavra Errada</li>
                <li><a href="{{ route('doctors.wrongword.show') }}" class="{{request()->routeIs('doctors.wrongword.*') ? 'active' : ''}}"><x-feathericon-x />Palavra Errada</a></li>

            </ul>

        </div>
      </div>

      @isset($modals)
        {{ $modals}}
      @endisset

    @livewireScripts
    <script src="http://SortableJS.github.io/Sortable/Sortable.js"></script>
    <script src="https://unpkg.com/@nextapps-be/livewire-sortablejs@0.2.0/dist/livewire-sortable.js"></script>

</body>
</html>
