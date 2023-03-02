<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <title>All Posts</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
                {{ __('My Post') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container mt-5 p-5">
                        <div class="text-center">
                            {{-- <form action="{{ route('Author.index') }}" method="get">
                          <button type="submit" class="btn btn-success">
                              All authors
                          </button>
                      </form> --}}
                        </div>
                        <table class="table mt-5 mb-5">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>{{ $post->id }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->description }}</td>
                                    <td>{{ $post->created_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table mt-5">
                            <thead>
                                <tr>
                                  <h2>User</h2>
                                  <th>Id</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>{{ $post->getUserName->id }}</th>
                                    <td>{{ $post->getUserName->name }}</td>
                                    <td>{{ $post->getUserName->email }}</td>
                                    <td>{{ $post->getUserName->email_verified_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
