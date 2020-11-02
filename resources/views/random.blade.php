<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>blog</title>
  <link rel="stylesheet" href="/style.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>


  <script>
    $(document).ready(function(){
          $("body").css("display", "none");
          $("body").fadeIn(700);
          $("#hobbiesbutton").click(function(){
            $("#instruct").hide();
            $("#swap").attr("src","https://source.unsplash.com/400x300/?hobby"+new Date().getTime());
          });

          $("#likesbutton").click(function(){
            $("#instruct").hide();
            $("#swap").attr("src","https://source.unsplash.com/400x300/?pet"+new Date().getTime());
          });

          $("#foodbutton").click(function(){
            $("#instruct").hide();
            $("#swap").attr("src","https://source.unsplash.com/400x300/?yummy"+new Date().getTime());
          });

          $("#moviesbutton").click(function(){
            $("#instruct").hide();
            $("#swap").attr("src","https://source.unsplash.com/400x300/?actors"+new Date().getTime());
          });

          $.ajax({
	          url: "https://api.openweathermap.org/data/2.5/weather?q=Singapore&appid=e8c49370162a565d98a199904d86f854",
	          type: "GET",
	          success: function(result){
    
            var country = (JSON.stringify(result.name));
            var temperature = (JSON.stringify(result.main.temp));
            var humidity = (JSON.stringify(result.main.humidity));
    
            $('#weather').text(country + ' has a current temperature of ' + temperature + ' degrees KELVIN and a humidity of ' + humidity + '%.');
            }
          });
    });

  </script>
</head>

<body>
  <?php include("navbar.php"); ?>
  <div class="container extra">
    <div class="row align-items-center">
      <div class="col-1"></div>

      <div class="col-3 btns3">
        <div class="btn-group-vertical" style="width: 100%">
          <button type="button" class="btns2 btn btn-secondary" id="hobbiesbutton">Hobbies <br><i
              class="fas fa-bicycle"></i></button>
          <button type="button" class="btns2 btn btn-secondary" id="likesbutton">Likes <br> <i
              class="fas fa-heart"></i></button>
          <button type="button" class="btns2 btn btn-secondary" id="foodbutton">Food <br><i
              class="fas fa-utensils"></i></button>
          <button type="button" class="btns2 btn btn-secondary" id="moviesbutton">Movies <br><i
              class="fas fa-film"></i></button>
        </div>
      </div>
      <div class="col-7 d-flex justify-content-center ">
        <p id="instruct">Click the buttons to see random images in each category. 
          <br> Images courtesy of
          <a href="https://unsplash.com/">https://unsplash.com/</a></p>
        <img id="swap" class="img-fluid img-thumbnail" src="">
      </div>


      <div class="col-1"></div>
      
    </div>
    <p id="weather"></p>
    <p class="italick">Weather courtesy of <a href="https://openweathermap.org">https://openweathermap.org/</a></p>
  </div>
</body>

</html>