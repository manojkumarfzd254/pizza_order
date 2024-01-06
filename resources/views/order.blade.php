<!DOCTYPE html>
<html>
<head>
    <title>Pizza Order Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Select Your Pizza</h1>
        <form method="post" action="{{ route('place-order') }}">
            @csrf
            <div class="form-group">
                <label for="pizza_type">Select Pizza Type:</label>
                <select class="form-control" name="pizza_type">
                    @foreach($pizzas as $pizza)
                        <option value="{{ $pizza->id }}">{{ $pizza->name }} [Large: {{$pizza->price_large}}, Medium: {{$pizza->price_medium}}, Small: {{$pizza->price_small}}]</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="pizza_size">Select Pizza Size:</label>
                <select class="form-control" name="pizza_size">
                    <option value="large">Large</option>
                    <option value="medium">Medium</option>
                    <option value="small">Small</option>
                </select>
            </div>

            <div class="form-group">
                <label for="toppings">Select Toppings :</label><br>
                @foreach($toppings as $topping)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="selected_toppings[]" value="{{ $topping->id }}">
                        <label class="form-check-label">{{ $topping->name }}</label> <code>[Large: {{$topping->price_large}}, Medium: {{$topping->price_medium}}, Small: {{$topping->price_small}}]</code>
                    </div><br>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
</body>
</html>
