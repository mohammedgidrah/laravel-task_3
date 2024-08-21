<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

.form-container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

#myForm {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 15px;
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 5px;
}

input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button[type="submit"] {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}
</style>
<body>
    <div class="form-container">
        <form id="myForm" action=" {{route('Users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="firstName">username</label>
                <input type="text" id="firstName" name="username" required>
            </div>
            <div class="form-group">
                <label for="lastName">email</label>
                <input type="email" id="lastName" name="email" required>
            </div>
            <div class="form-group">
                <label for="lastName">firstname</label>
                <input type="text" id="lastName" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="lastName">lastname</label>
                <input type="text" id="lastName" name="lastname" required>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>