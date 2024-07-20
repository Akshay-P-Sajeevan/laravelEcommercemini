<!DOCTYPE html>
<html>
<head>
    <title>Admin - Orders</title>
</head>
<body>
    <h1>Orders</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Customer Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->customer_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $orders->links() }}
</body>
</html>
