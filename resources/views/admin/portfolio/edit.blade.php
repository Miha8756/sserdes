@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4">
        <div class="py-4">
            <h1 class="text-2xl font-bold mb-4">Редактировать новость</h1>
            <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Название</label>
                    <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full"
                           value="{{ $portfolio->name }}" required>
                </div>

                <div id="imageInputs" class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Изображения</label>
                    @foreach(json_decode($portfolio->images, true) as $image)
                        <div class="flex items-center mb-2">
                            <img src="{{ asset('storage/'. $image) }}" class="w-24 h-24 object-cover rounded-md mr-2"
                                 alt="Изображение">
                            <input type="hidden" name="images[]" value="{{ $image }}">
                            <button type="button" class="btn-delete-image bg-red-500 text-white px-2 py-1 rounded-md">
                                Удалить
                            </button>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn-add-image bg-blue-500 text-white px-4 py-2 rounded-md">Добавить
                    изображение
                </button>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Сохранить</button>
            </form>
        </div>

    </div>

    <script>
        $(document).ready(function () {
            // Добавление нового поля для загрузки изображения
            $(".btn-add-image").click(function () {
                $("#imageInputs").append('<div class="flex items-center mb-2">' +
                    '<input type="file" name="images[]" class="p-2 border rounded-md mr-2 bg-gray-100 focus:outline-none focus:border-blue-500" accept="image/*" required>' +
                    '<button type="button" class="btn-delete-image bg-red-500 text-white px-2 py-1 rounded-md">Удалить</button>' +
                    '</div>');
            });

            // Удаление изображения
            $(document).on('click', '.btn-delete-image', function () {
                $(this).parent().remove();
            });
        });
    </script>
@endsection
