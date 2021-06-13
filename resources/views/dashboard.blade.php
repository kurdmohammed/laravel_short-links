<x-app-layout>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            </div>
            <div class="contaner">
                <a href="/create"><button type="submit" class="btn btn-primary">Create Link</button></a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>URL</th>
                            <th>SHORT_URL</th>
                            <th>CLICKS</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shortLinks as $link)
                        @if($link->user_name == Auth::user()->name)
                        <tr>
                            <td>{{$link->id}}</td>
                            <td>{{$link->url}}</td>
                            <td><a href="{{$link->short_url}}" target="_blank">{{$link->short_url}}</a></td>
                            <td>{{$link->clicks}}</td>
                            <td>
                                <form action="{{$link->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>

                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>