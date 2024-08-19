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
        padding: 20px;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        margin-bottom: 20px;
        color: #343a40;
        text-align: center;
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
    .btn-success {
        background-color: #28a745;
        border: none;
        color: #fff;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn-success:hover {
        background-color: #218838;
    }
</style>
<body>
    <div class="container">
        <h1>Edit category</h1>
        <form action="{{route('category.update',$categories->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">name</label>
                <input type="text" name="category_name" class="form-control" value="{{ $categories->category_name }}" required>
            </div>
            <div class="form-group">
                <label for="director">Description</label>
                <input type="text" name="category_description" class="form-control" value="{{ $categories->category_description }}" required>
            </div>

    
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</body>
</html>
