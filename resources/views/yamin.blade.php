<!-- W3hubs.com - Download Free Responsive Website Layout Templates designed on HTML5 CSS3,Bootstrap which are 100% Mobile friendly. w3Hubs all Layouts are responsive cross browser supported, best quality world class designs. -->
<!DOCTYPE html>
<html lang="en">
  <head>
  @foreach($people as $print) <title>{{$print->last_name}} Business Card</title> @endforeach
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
 <!-- Include from the CDN -->
 <script src=
"https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js">
  </script>
  

  </head>
  <body>

 
  <div id="photo">
<br>
  @foreach($people as $print)

    <div class="container mt-5">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-8">
            <div class="bg-effects">
              <h2 class="card-title">{{$print->last_name}}</h2>
              <p class="card-text">{{$print->profession }}</p>
            </div>
            <ul>
              <li>Full Name :-<span>{{$print->first_name }} {{$print->last_name }}</span></li>
              <li>Professional :-<span>{{$print->profession }}</span></li>
              <li>Country :-<span>{{$print->country }}</span></li>
              <li>Phone :-<span>{{$print->phone }}</span></li>
              <li>Emails :-<span>{{$print->email }}</span></li>
            </ul>
          </div>
          <div class="col-4 pl-0">
            <img src="../images/{{$print->image }}" class="img-responsive">
          </div>
        </div>
      </div>
      <div class="bg-custom">
        <p>Visit Now :-<span> ansnew.com</span></p>
      </div>
    </div>
  </body>
</html>

 @endforeach
</div>

<br>
  <center><button onclick="takeshot()"> Take Screenshot </button></center>
  
  
   <a href="" id="output"></a>

    <script type="text/javascript">
  
  // Define the function 
  // to screenshot the div
  function takeshot() {
      let div =
          document.getElementById('photo');

      // Use the html2canvas
      // function to take a screenshot
      // and append it
      // to the output div
      html2canvas(div).then(
          function (canvas) {
              document
              .getElementById('output')
              .appendChild(canvas);
          })
  }
</script>