<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <h1>Users</h1>
                <div class="message">
                    @if(session()->has('message'))
                        <div>
                            {{ session('message') }}
                        </div>
                    @endif
                </div>  
                <table class='table'>
                    <thead>
                        <tr>
                            <th>First Name </th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><a href="{{ route('user.edit', $user) }}" class='btn btn-primary'>Edit</a></td>
                                <td>
                                    <form method='post' action='{{ route('user.delete', $user) }}' >
                                        @csrf
                                        @method('delete')
                                        <input type='submit' value='delete'/>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('user.create') }}" class='btn btn-primary'>Add User</a>
            </div>
        </div>
    </div>
</body>
</html>
