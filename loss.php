<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  
   <link rel="stylesheet" href="loss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="css/loss.css">

    <title>Weight Loss</title>
</head>
<body>
    
    <div class="back"> 
        <div class="container my-3 text-center">
        <h1 class='my-2'>Let's Burn some FATTT!  </h1>

        <div class="about">

            <a class="btn btn-outline-light" style="min-width:5rem; border-radius:100px;padding: 10px;" href="#">More About</a>
        </div>
        
        <div class="album py-5">
          <div class="container">
        
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
              <div class="col">
                <div class="card shadow-sm custom-card">
        
                  <img src="images/FLutter_kick.gif" class="image1">
        
                  <div class="card-body">
                    <h2>Flutter Kicks</h2>
                    <p class="card-text">This exercise involves lifting weights overhead, targeting the shoulder muscles.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a class="btn btn-sm btn-outline-secondary" href="/templates/excercises/shoulder.html">Start</a>
        
                      </div>
                      <small class="text-body-secondary">9 mins</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card shadow-sm custom-card">
                  
                  <img src="images/leg_raise.gif" class="image2">
                  
                  <div class="card-body">
                    <h2>Leg Raises</h2>
                    <p class="card-text">Sit-ups are abdominal exercises that involve lying on your back, lifting your upper body towards your knees.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a class="btn btn-sm btn-outline-secondary" href="/templates/excercises/situp.html">Start</a>
                        
                      </div>
                      <small class="text-body-secondary">9 mins</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card shadow-sm custom-card">
                  
                  <img src="images/advance_leg_raise.gif" style="height: 211px;" class="image3" >
                  
                  <div class="card-body">
                    <h2>Advance Leg Raises</h2>
                    <p class="card-text">Squats are a lower body exercise where you bend your knees and hips, lowering your body and then returning to a standing position.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a class="btn btn-sm btn-outline-secondary" href="/templates/excercises/squats.html">Start</a>
        
                      </div>
                      <small class="text-body-secondary">9 mins</small>
                    </div>
                  </div>
                </div>
              </div>
        
              <div class="col">
                <div class="card shadow-sm custom-card">
                  
                  <img src="images/pushup.gif" class="image4">
                  
                  <div class="card-body">
                    <h2>Push Ups</h2>
                    <p class="card-text">Push-ups are a classic upper body exercise where you lift and lower your body using your arms.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a class="btn btn-sm btn-outline-secondary" href="/templates/excercises/pushup.html">Start</a>
        
                      </div>
                      <small class="text-body-secondary">9 mins</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card shadow-sm custom-card" class="image5">
                  
                  <img src="images/99-Mountain-climbers.gif" style="height: 235px;">
                  
                  <div class="card-body">
                    <h2>Mountain Climber</h2>
                    <p class="card-text">Bicep curls target the bicep muscles by flexing and extending the arms, typically done with weights</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a class="btn btn-sm btn-outline-secondary" href="/templates/excercises/bicep.html">Start</a>
        
                      </div>
                      <small class="text-body-secondary">9 mins</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card shadow-sm custom-card">
                  
                  <img src="images/butt_kick.gif" style="height: 235px;" class="image6">
                  
                  <div class="card-body">
                    <h2>Butt Kick</h2>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a class="btn btn-sm btn-outline-secondary" href="/templates/excercises/jump.html">Start</a>
                        
                      </div>
                      <small class="text-body-secondary">9 mins</small>
                    </div>
                  </div>
                </div>
              </div>
        
              <div class="col">
                <div class="card shadow-sm custom-card">

                        <img src="images/side_curls.gif" alt="">                  
                    
                        <div class="card-body">
                    <h2>Side Curls</h2>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Start</button>
        
                      </div>
                      <small class="text-body-secondary">9 mins</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card shadow-sm custom-card">
                  <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                  <div class="card-body">
                    <h2></h2>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Start</button>
        
                      </div>
                      <small class="text-body-secondary">9 mins</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card shadow-sm custom-card">
                  <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"><center>COMING SOON</center></text></svg>
                  <div class="card-body">
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Start</button>
        
                      </div>
                      <small class="text-body-secondary">9 mins</small>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        </div>
</body>
</html>
