<!DOCTYPE html>
<html>
<head>
    <title>Admin - Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        .container {
            width: 90%;
            margin: 0 auto;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
            text-align: center;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .search-form {
            display: flex;
            align-items: center;
        }

        .search-input {
            padding: 8px;
            width: 200px;
            border: 1px solid #ddd;
            border-radius: 4px 0 0 4px;
        }

        .search-button {
            padding: 8px 12px;
            border: none;
            background-color: #007bff; /* Changed background color to blue */
            color: white;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }

        .search-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .action-button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            text-align: center;
        }

        .action-button:hover {
            background-color: #0056b3;
        }

        .delete-button {
            background-color: #dc3545;
        }

        .delete-button:hover {
            background-color: #c82333;
        }

        button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Products</h1>
        <div class="top-bar">
            <a href="{{ route('admin.products.create') }}" class="button">Add New Product</a>
            <form action="{{ route('admin.products.search') }}" method="GET" class="search-form">
                <input type="text" name="search" class="search-input" placeholder="Search..." value="{{ request('search') }}">
                <button type="submit" class="search-button">Search</button>
            </form>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="action-button">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</body>
</html>
