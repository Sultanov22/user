<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create User
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
    <form action="{{ @route('users.store') }}"  method="POST" enctype="multipart/form-data">
        @csrf
        Имя:<br>
        <input type="text" name="name" value="">
        <br>
        Телефон:<br>
        <input type="text" name="phone" value="">
        <br>
        Email:<br>
        <input type="text" name="email" value="">
        <br>
        Пароль:<br>
        <input type="text" name="password" value="">
        <br>
        год рождения:<br>
        <input type="text" name="year" value="">
        <br>
        <br>
        <input type="submit" value="отрпавить">
    </form>
</x-app-layout>

