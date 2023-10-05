<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users
        </h2>
        <br>
        <br>
        <form method="get" action="{{ route('users.search') }}">
            <input type="text" class="form-control" id="search" name="search" placeholder="Искать по имени...">
            <select  id="searchYear" name="searchYear">
            @foreach($users as $user)
                    <option hidden value="">Выберите год</option>
                <option value="{{ $user['year'] }}">{{ $user['year'] }}</option>
                @endforeach
            </select>
            <button type="submit">OK</button>
        </form>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul class="list-disc">
                        <table>
                            <tr>
                                <th style="width:80%">Имя</th>
                                <th style="width:80%"> Год</th>
                            </tr>
                        @foreach ($users as $user)
                                <tr>
                                    <td><a href="/users/{{$user['id']}}/edit">{{ $user['name']}}</a></td>
                                    <td><a href="/users/{{$user['id']}}/edit">{{ $user['year']}}</a></td>
                                </tr>
                        @endforeach
                        </table>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
