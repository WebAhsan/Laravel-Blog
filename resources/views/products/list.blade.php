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


<div class="container py-5">
    @if (session('success'))
<div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <h2>User Table</h2>
    </div>
    <div class="col-md-6 d-block text-end">
        <a class="btn btn-dark " href="{{route('products.create')}}">Add User</a>
    </div>
</div>

<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">price</th>
    </tr>
  </thead>
  <tbody>

    @foreach($products as $product)
    <tr>
      <th scope="row">{{ $product->id }}</th>
      <td>{{ $product->name }}</td>
      <td>{{ $product->description }}</td>
      <td>${{ $product->price }}</td>
      <td><a href="{{route('products.edit',$product->id)}}" class="btn btn-dark text-end">Edit</a></td>
      <td><a onclick="Deleteid({{$product->id}})" href="#0" class="btn btn-danger text-end">Delete

      <form id="delete-id-{{ $product->id }}" action="{{ route('products.destroy',$product->id) }}" method="POST">
      @csrf
      @method('delete')
      </form>

      </a></td>
    </tr>

    @endforeach

  </tbody>
</table>


</div>

<script>

    function Deleteid(id){
        if(confirm('Are you sure')){
            document.getElementById("delete-id-"+id).submit();
        }
    }


</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>

</body>
</html>


<!-- icon666.com - MILLIONS vector ICONS FREE --><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve"><g><g><g><path d="M505.401,135.415l-246-88.979c-2.197-0.795-4.605-0.795-6.803,0l-246,88.979C2.639,136.848,0,140.607,0,144.819 c0,4.212,2.639,7.971,6.599,9.404l101.277,36.632c-5.229,20.611-20.376,81.132-28.648,122.639 c-0.586,2.937,0.176,5.982,2.075,8.297c1.899,2.315,4.736,3.658,7.731,3.658c52.334,0,160.88,62.239,161.97,62.867 c1.546,0.892,3.271,1.337,4.996,1.337c1.725,0,3.45-0.445,4.996-1.337c0.687-0.396,44.073-25.271,89.161-43.608v28.196 c-13.066,0.468-23.553,11.236-23.553,24.415v58.84c0,5.523,4.478,10,10,10h47.106c5.522,0,10-4.477,10-10v-58.84 c0-13.179-10.487-23.948-23.554-24.415v-35.807c19.592-6.891,38.347-11.648,52.809-11.648c2.995,0,5.832-1.342,7.731-3.658 c1.899-2.315,2.661-5.36,2.075-8.297c-8.272-41.507-23.42-102.028-28.648-122.639L505.4,154.223 c3.96-1.433,6.599-5.192,6.599-9.404C511.999,140.607,509.361,136.848,505.401,135.415z M350.157,323.23 c-40.58,15.679-80.312,37.199-94.157,44.933c-21.076-11.774-102.142-55.495-154.867-61.923 c8.174-38.808,20.559-88.465,25.643-108.549l125.823,45.51c1.099,0.397,2.25,0.596,3.401,0.596s2.303-0.199,3.401-0.596 l90.756-32.827V323.23z M373.711,397.318v48.84h-27.106v-48.84c0-2.447,1.99-4.437,4.437-4.437h18.233 C371.721,392.881,373.711,394.872,373.711,397.318z M410.867,306.24c-12.387,1.51-26.339,5.08-40.71,9.809V203.141l15.067-5.45 C390.308,217.775,402.692,267.428,410.867,306.24z M359.272,185.81l-98.761-49.916c-4.926-2.489-10.944-0.515-13.436,4.414 c-2.492,4.929-0.515,10.944,4.414,13.436l81.939,41.414L256,223.164L39.4,144.819L256,66.474l216.6,78.345L359.272,185.81z" fill="#000000" style="fill: rgb(255, 255, 255);"></path><path d="M245.49,326.349c-2.581,4.883-0.715,10.933,4.168,13.514l1.649,0.873c1.495,0.794,3.101,1.171,4.683,1.171 c3.58,0,7.043-1.928,8.84-5.311c2.592-4.876,0.739-10.931-4.139-13.522l-1.687-0.893 C254.119,319.598,248.07,321.467,245.49,326.349z" fill="#000000" style="fill: rgb(255, 255, 255);"></path><path d="M215.121,300.451c-27.909-12.878-51.85-22.115-73.19-28.236c-5.307-1.521-10.846,1.545-12.369,6.855 c-1.522,5.309,1.546,10.847,6.855,12.37c20.065,5.756,43.727,14.897,70.325,27.171c1.356,0.626,2.781,0.922,4.184,0.922 c3.78,0,7.397-2.155,9.086-5.813C222.325,308.707,220.137,302.765,215.121,300.451z" fill="#000000" style="fill: rgb(255, 255, 255);"></path></g></g></g></svg>