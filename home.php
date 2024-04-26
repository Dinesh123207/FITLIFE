<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <!-- Bootstrap Links -->

   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<div class="home-bg">

<section class="home">

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         
         <div class="content">
         <div class="banner">
<div class="banner_box">
  <div class="banner_left">
    <h1>Seeking Exercise Guidance? We've Got Your Back!</h1>
    <p>The Excercise Tracking  that is designed to guide users in performing basic excercises and provide real-time feedback on their form.
       </p>
  </div>
</div>
</div>
    </div>
  </div>

      

      



</section>

</div>

<div class="back"> 
<div class="container my-3 text-center">
<h1 class='head my-2'>Let's start exercising</h1>

<div class="album py-5">
  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      

          

      <div class="col">
        <div class="card shadow-sm custom-card">
          <img src="" alt="">

          <div class="card card-body"  style="background-color: aquamarine;font-size: 40px;">
            <center style="font-weight: bolder;" >Fat Loss</center>
            <p class="card-text"style="font-size: 20px;">Effective fat loss exercises include a combination of aerobic activities like running or cycling to burn calories, and strength training exercises such as weightlifting to build lean muscle mass, boosting metabolism for sustained fat loss. Consistency and a balanced approach incorporating both cardiovascular and resistance training are key for successful and lasting fat loss.p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a class="btn btn-sm btn-outline-dark" href="loss.php">Start</a>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow-sm custom-card">
          <img src="" alt="">

          <div class="card-body" style="background-color: cornflowerblue;font-size: 40px;">
            <center style="font-weight: bolder;" >Muscle Gain</center>
            <p class="card-text"style="font-size: 20px;">For effective weight gain, focus on compound strength training exercises like squats and deadlifts to stimulate muscle growth, accompanied by a calorie surplus to support weight gain. Consistency in resistance training, combined with a nutrition plan rich in protein and carbohydrates, is essential for building muscle mass and achieving sustainable weight gain.</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a class="btn btn-sm btn-outline-dark" href="gain.php">Start</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow-sm custom-card">
          <img src="" alt="">
          <div class="card-body" style="background-color: lightsalmon;" >
            <center style="font-weight: bolder;font-size: 40px;" >Full body</center>
            <p class="card-text" style="font-size: 20px;">A comprehensive full-body workout should include compound exercises targeting major muscle groups, such as squats, deadlifts, bench presses, and overhead presses. Incorporate a variety of movements to ensure balanced development and engage both upper and lower body muscles.
            Consistency and progressive overload, gradually increasing  intensity, are key components for achieving overall strength</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a class="btn btn-sm btn-outline-dark" href="full.php">Start</a>

              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<section>
  <div class="feature_box">
    <div class="feature_content feature_content1">
      <h2>Auto record push-ups</h2>
      <p>Revolutionize your workout experience with our advanced exercise detection technology, now available on our website. Simply position your device beneath your face or chest, ensuring it's in close proximity to your front camera. Alternatively, initiate push-up recognition by clicking the designated circle icon within the web application. Our cutting-edge sensors will seamlessly identify and record each push-up, providing you with a comprehensive overview of your exercise routine.</p>
      <ul>
        <li>Enhanced User Experience</li>
        <li class="li2">Effortless Data Backup</li>
        <li class="li3">User-Friendly Web Interface</li>
      </ul>
    </div>
    <!-- <img class="feature_img" src="images/1-auto_record.svg" alt=""> -->
    <a href="#"><img class="feature_img" src="images/1-auto_record.svg" alt=""></a>
  </div>
  <div class="feature_box">
    <div class="feature_content feature_content2">
      <h2>Performance Monitoring</h2>
      <p>Keep a close eye on your progress with our comprehensive effect monitoring system. Gain insights into various statistics, such as the total number of exercises, total consecutive days, and more. Easily track your fitness journey through a timeline that displays all your historical records.</p>
      <ul>
        <li class="li4">Statistics</li>
        <li class="li5">History</li>
        <li class="li6">Interactive Timeline</li>
      </ul>
    </div>
    <img class="feature_img" src="images/2-chart.svg" alt="">
  </div>
  <div class="feature_box">
    <div class="feature_content">
      <h2>Training plan</h2>
      <p>Embark on a diverse fitness journey with our adaptable training platform, offering a range of modes to suit your preferences. Choose from repetition training, time-based workouts, calorie-focused exercises, invigorating interval training, and the flexibility of free training. Tailor your routine to match your fitness goals and enjoy a dynamic workout experience.
      </p>
      <ul>
        <li class="li7">Personalized Reminders</li>
        <li class="li8">Reminder</li>
        <li class="li9">URL Schemes, Siri Shortcuts</li>
      </ul>
    </div>
    <img class="feature_img feature_img3" src="images/3-plan.svg" alt="">
  </div>
</section>



<section class="home-products">

   <h1 class="heading">new excercise</h1>

   <div class="swiper products-slider">

   <div class="swiper-wrapper">

   <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
       
      </div>
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no excercise added yet!</p>';
   }
   ?>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>







<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

  window.embeddedChatbotConfig = {
  chatbotId: "Sxc9sCRfYmlAiV_jlRDqX",
  domain: "www.chatbase.co"
  }
  </script>
  <script
  src="https://www.chatbase.co/embed.min.js"
  chatbotId="Sxc9sCRfYmlAiV_jlRDqX"
  domain="www.chatbase.co"
  defer>

</script>




</body>
</html>