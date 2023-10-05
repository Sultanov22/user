
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update user
        </h2>
    </x-slot>
<form method="post" action="{{ route('users.update', ['id' => $user->id]) }}">
    @method('put')
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="name">Name</label>
        <input
            type="text"
            name="name"
            value="{{ $user->name }}"
            class="form-control"
        />
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input
            type="email"
            name="email"
            value="{{ $user->email }}"
            class="form-control"
        />
        <div class="form-group">
            <label for="email">phone</label>
        <input
            type="text"
            name="phone"
            value="{{ $user->phone }}"
            class="form-control"
        />
            <div class="form-group">
            <label for="email">year</label>
            <input
                type="text"
                name="year"
                value="{{ $user->year }}"
                class="form-control"
            />
    </div>
    <button type="submit" class="btn btn-primary">
        <i class="fa fa-btn fa-sign-in"></i>Обновить
    </button>
</form>
</x-app-layout>
