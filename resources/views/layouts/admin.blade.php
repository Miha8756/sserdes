<x-app-layout>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Административная панель') }}
        </h2>
        <nav class="mt-4" aria-label="Main">
            <div class="space-x-4">
                {{-- <a href="{{ route('admin.index') }}" class="text-gray-600 hover:text-gray-900">Главная</a> --}}
                <a href="{{ route('portfolio.index') }}" class="text-gray-600 hover:text-gray-900">Новости</a>
            </div>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
