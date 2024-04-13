<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Item</title>
    <link rel="stylesheet" type="text/css" href="/css/item/itemtable.css">
</head>

<body>
    <div class="content">
        <div class="success">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
            @endif
        </div>
        <div class="item">
            <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="itemName">Item Name:</label>
                    <input type="text" id="itemName" name="itemName">
                </div>
                <div>
                    <label for="stock">Stock:</label>
                    <input type="text" id="stock" name="stock">
                </div>
                <div>
                    <label for="rentalOrSale">Rental/Sale:</label>
                    <select id="rentalOrSale" name="rentalOrSale">
                        <option value="Rental">Rental</option>
                        <option value="Sale">Sale</option>
                    </select>
                </div>
                <div>
                    <label for="salePrice">Sale Price:</label>
                    <input type="text" id="salePrice" name="salePrice">
                </div>
                <div>
                    <label for="rentRate">Rent Rate:</label>
                    <input type="text" id="rentRate" name="rentRate">
                </div>
                <div>
                    <label for="photo">Photo:</label>
                    <input type="file" id="photo" name="photo">
                </div>
                <div>
                    <label for="itemType">Item Type:</label>
                    <select id="itemType" name="itemType">
                        <option value="1">Electronics</option>
                        <option value="2">Gaming</option>
                        <option value="3">Furniture</option>
                        <option value="4">Books</option>
                        <option value="5">Others</option>
                    </select>
                </div>
                <button type="submit">Add Customer</button>
            </form>
        </div>
    </div>
</body>

</html>