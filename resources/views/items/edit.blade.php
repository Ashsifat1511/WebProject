<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    
</head>
<body>
    <h1>Edit Item</h1>

    <form action="{{ route('items.update', $item->itemID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for = "itemName">Item Name:</label>
            <input type="text" id="itemName" name="itemName" value="{{ $item->itemName }}">
        </div>
        <div>
            <label for="stock">Stock:</label>
            <input type="text" id="stock" name="stock" value="{{ $item->stock }}">
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
            <input type="text" id="salePrice" name="salePrice" value="{{ $item->salePrice }}">
        </div>
        <div>
            <label for="rentRate">Rent Rate:</label>
            <input type="text" id="rentRate" name="rentRate" value="{{ $item->rentRate }}">
        </div>
        <div>
            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo">
        </div>
        <div>
            <label for="itemType">Item Type:</label>
            <select id="itemType" name="itemType">
                <option value="Electronics">Electronics</option>
                <option value="Gaming">Gaming</option>
                <option value="Furniture">Furniture</option>
                <option value="Books">Books</option>
                <option value="Others">Others</option>
            </select>
        </div>
        <button type="submit">Update Item</button>
    </form>
</body>
</html>
