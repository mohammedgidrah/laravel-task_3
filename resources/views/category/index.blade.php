<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1200px;
        margin: 30px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #343a40;
        margin-bottom: 20px;
        text-align: center;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        color: #ffffff;
        text-align: center;
        cursor: pointer;
        margin-top: 20px;
        text-decoration: none;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        position: relative;
        top: -20px;
    }


    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-warning {
        background-color: #ffc107;
        border: none;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .alert-success {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 4px;
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
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
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tbody tr:hover {
        background-color: #e9ecef;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ced4da;
        box-sizing: border-box;
    }

    .text-center {
        text-align: center;
    }
    #show{
        background-color: #343a40
    }
</style>

<body>
    @include('includes.header');
    <div class="container">
        <h1>All category</h1>
        <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Add category</a>
        <form action="{{ route('category.show', 1) }}" method="get"> 
            <button type="submit" class="btn btn-primary mb-3">View Deleted Item</button>
        </form>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->category_name }}</td>
                        <td>{{ $cat->category_description }}</td>
                        {{-- <td>{{ $categories->categories_price }}</td> --}}
                        <td>
                            <a href="{{ route('category.edit', $cat->id) }}" class="btn btn-warning">Edit</a> 
                            <form action="{{ route('category.destroy', $cat->id) }}" method="POST" 
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
