<!DOCTYPE html>
<html>
<head>
    <title>Order Summary</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Order Summary</h1>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>Pizza ID:</th> <td>#{{ $order->pizza_id }}</td>
                        </tr>
                        <tr>
                            <th>Pizza Name:</th> <td>{{ $pizza->name }}</td>
                        </tr>
                        <tr>
                            <th>Pizza Size:</th> <td>{{ ucfirst($order->pizza_size) }}</td>
                        </tr>
                        <tr>
                            <th>Sub Total:</th> <td><i class="fa fa-inr"></i> {{ $pizza['price_'.$pizzaSize] }}/-</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <tbody>
                        <tr><th colspan="2"><center>Extra Toppings</center></th></tr>
                        @foreach(explode(',', $order->toppings) as $toppingId)
                            <tr>
                            @php
                                $topping = \App\Models\Topping::find($toppingId);
                            @endphp
                            <th>{{ $topping->name }}:</th> <td><i class="fa fa-inr"></i> {{ $topping['price_' . $order->pizza_size] }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th>Grand Total:</th><td><i class="fa fa-inr"></i> {{$totalAmount}}/-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>
