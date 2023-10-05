<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Post
        </h2>
    </x-slot>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>x1
        </div>
    @endif
    <form action="{{ @route('posts.store') }}"  method="POST" enctype="multipart/form-data">
        @csrf
        Название:<br>
        <input type="text" name="title" value="">
        <br>
        Описание:<br>
        <input type="text" name="description" value="">
        <br><br>
        <input type="submit" value="отрпавить">
    </form>
</x-app-layout>

