<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2 class="mb-4">Edit Product</h2>
  <form action="{{ route('products.update',$products->id )}}" method="POST">
    @method('put')
    @csrf
    <div class="form-group">
      <label for="name">Product Name:</label>
      
      <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $products->name) }}" id="name" name="name">

    </div>
      @error('name')
        <div class="alert alert-danger mt-3">{{ $message }}</div>
      @enderror

    <div class="form-group my-3">
      <label for="description">Description:</label>
      <textarea class="@error('description') is-invalid @enderror form-control" id="description" name="description" rows="3" >{{ old('description', $products->description) }}</textarea>
    </div>
    @error('description')
      <div class="alert alert-danger mt-3">{{ $message }}</div>
    @enderror

    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" class="@error('price') is-invalid @enderror form-control" value="{{ old('price', $products->price) }}" id="price" name="price" min="1" step="0.01" >
    </div>
    @error('price')
       <div class="alert alert-danger mt-3">{{ $message }}</div>
    @enderror


    <!-- <div class="form-group">
      <label for="category">Category:</label>
      <select class="form-control" id="category" name="category" >
        <option value="">Select Category</option>
        <option value="Electronics">Electronics</option>
        <option value="Clothing">Clothing</option>
        <option value="Books">Books</option>
       
      </select>
    </div> -->
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
  </form>
</div>









<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>

</body>
</html>
