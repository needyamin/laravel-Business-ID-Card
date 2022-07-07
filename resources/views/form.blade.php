
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
    a:link {text-decoration: none;}
    </style>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>ID Card Generator</title>
  </head>
  <body>

<div class='container'>

<h1 style='text-align:center; padding:5px;font-family: Brush Script MT, cursive;'>Create Your ID Card</h1>

  
<form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data" class="row g-3"  style='font-family: Brush Script MT, cursive; font-size:22px;'>

@CSRF


<div class="col-md-3">
    <label for="inputEmail4" class="form-label">First Name</label>
    <input type="text" name="first_name" class="form-control" placeholder="Your First Name" minlength="3" required>
  </div>
  <div class="col-md-3">
    <label for="inputPassword4" class="form-label">Last Name</label>
    <input type="text" name="last_name" class="form-control" placeholder="Your Last Name" minlength="3" required>
  </div>
  



  <div class="col-md-3">
    <label for="inputEmail4" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" placeholder="Username" required>
  </div>
  <div class="col-md-3">
    <label for="inputPassword4" class="form-label">Phone</label>
    <input type="number" name="phone" class="form-control" placeholder="Enter Phone Number" required>
  </div>

  <div class="col-4">
    <label for="inputAddress" class="form-label">Image</label>
    <input type="file" name="image" class="form-control" required>
  </div>


  <div class="col-md-3">
  <label for="inputState" class="form-label">Country</label>
    <select id="inputState" class="form-select" name="country" required>
      <option selected>Choose...</option>
      <option>Bangladesh</option>
      <option>India</option>
      <option>USA</option>
      <option>Europe</option>
      <option>Others</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputState" class="form-label">Profession</label>
    <select id="inputState" class="form-select" name="profession" required>
      <option selected>Choose...</option>
      <option>Programmer</option>
      <option>Student</option>
      <option>Entrepreneur</option>
      <option>Developer</option>
      <option>Others</option>
    </select>
  </div>
  <div class="col-md-3">
    <label for="inputZip" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" placeholder="example@ansnew.com" required>
  </div>


  <div class="col-12">
    <input type='submit' name='submit'  class="btn btn-primary" value='Generate' style='width:100%'>
  </div>



@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
       </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
     @endif

</div></div></form>


<div class='container mt-3'>


<hr>
<h1 style='text-align:center; padding:5px;font-family: Brush Script MT, cursive;'>Last User Generate ID</h1>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
 
<div class="container">
<table id="example" class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Username</th>
                <th>Profession</th>
                <th>Country</th>
                <th>IP</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>

        @foreach($people as $print) 
            <tr>
                <td><img src="images/{{$print->image}}" class="rounded-circle" style="width: 20px;"></td>
                <td><a href='view/{{ $print->id }}'>{{$print->username}}</a></td>
                <td>{{$print->profession}}</td>
                <td>{{$print->country}}</td>
                <td>{{$print->ip}}</td>
                <td> <a href='delete/{{ $print->id }}'>del</a> </td>
            </tr>
            @endforeach

        </tbody>
       
    </table>


<script>
$(document).ready(function () {
    $('#example').DataTable();
});
</script>

</div>





</div>


</body>
</html>