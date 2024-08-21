<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profiles</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .table-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #007bff;
            color: #ffffff;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #dee2e6;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e9ecef;
        }
    </style>
</head>

<body>
    @include('includes.header')
    <div class="table-container">
        <a href="{{ route('Users.create') }}" class="btn btn-primary mb-3">Add users</a>
        <form action="{{ route('Users.show', 1) }}" method="get"> 
            <button type="submit" class="btn btn-primary mb-3">View Deleted Item</button>
        </form>

        <h2>User Profiles</h2>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Username</th>
                    <th>email</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->profile ? $user->profile->firstname : "not found" }}</td>
                    <td>{{ $user->profile ? $user->profile->lastname : "not found" }}</td>
                    <td>
                        <a href="{{ route('Users.edit', $user->id) }}" class="btn btn-warning">Edit</a> 
                        <form action="{{ route('Users.destroy', $user->id) }}" method="POST" 
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
