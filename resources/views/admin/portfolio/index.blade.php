@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4">
        <div class="py-4">
            <h1 class="text-2xl font-semibold mb-4">Новости</h1>

            <a href="{{ route('portfolio.create') }}"
               class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Добавить
                новую</a>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Название
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Действия
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($portfolios as $portfolio)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $portfolio->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $portfolio->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('portfolio.edit', $portfolio->id) }}"
                                   class="text-indigo-600 hover:text-indigo-900">Редактировать</a>
                                <form action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2"
                                            onclick="return confirm('Вы уверены?')">Удалить
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
