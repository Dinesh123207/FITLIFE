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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>DevBlog - Julia Walker's Personal Blog</title>

  <!--
    - favicon
  -->
  <!-- <link rel="shortcut icon" href="/static/img/blog/favicon.ico" type="image/x-icon"> -->

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="css/blog.css">



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">
</head>

<body>

<?php include 'components/user_header.php'; ?>

  <main>
    <div class="hero">

      <div class="container">

        <div class="left">

          <h1 class="h1">
            Hey, <b>Fitness&nbsp;Freak</b>
            <br>Welcome to our website
          </h1>

         

          <div class="btn-group">
            <a href="#" class="btn btn-primary">Contact Me</a>
            <a href="#" class="btn btn-secondary">About Me</a>
          </div>

        </div>

        <div class="right">

          <div class="pattern-bg"></div>
          <div class="img-box">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
          </div>

        </div>

      </div>

    </div>





    <div class="main">

      <div class="container">

        <!--
          - BLOG SECTION
        -->

        <div class="blog">

          <h2 class="h2">Latest Blog Post</h2>

          <div class="blog-card-group">

            <div class="blog-card">

              <div class="blog-card-banner">
                <img src="images/blog/blog1/1.jpg" alt="Building microservices with Dropwizard, MongoDB & Docker"
                  width="250" class="blog-banner-img">
              </div>

              <div class="blog-content-wrapper">

                <button class="blog-topic text-tiny">Diet Plan</button>

                <h3>
                  <a href="/templates/blog/blog1.html" class="h3">
                    Fueling Your Fitness Journey: Nutrition Tips for Pre and Post-Workout
                  </a>
                </h3>

                <p class="blog-text">
                  This NoSQL database oriented to documents (by documents like JSON) combines some of the features from
                  relational
                  databases, easy to use and the multi-platform is the best option for scale up and have fault
                  tolerance, load balancing,
                  map reduce, etc.
                </p>

                <div class="wrapper-flex">

                  <div class="profile-wrapper">
                    <img src="images/blog/author.png" alt="Julia Walker" width="50">
                  </div>

                  <div class="wrapper">
                    <a href="#" class="h4">ADMIN</a>

                    <p class="text-sm">
                      <time datetime="2022-01-17">Jan 17, 2022</time>
                      <span class="separator"></span>
                      <ion-icon name="time-outline"></ion-icon>
                      <time datetime="PT3M">3 min</time>
                    </p>
                  </div>

                </div>

              </div>

            </div>


            <div class="blog-card">

              <div class="blog-card-banner">
                <img src="images/blog/blog2/1.jpeg" alt="Fast web page loading on a $20 feature phone" width="250"
                  class="blog-banner-img">
              </div>

              <div class="blog-content-wrapper">

                <button class="blog-topic text-tiny">Physique</button>

                <h3><a href="images/blog/blog2.html" class="h3">Fast web page loading on a $20 feature phone</a></h3>

                <p class="blog-text">
                  Feature phones are affordable (under $20-25), low-end devices enabling 100s of millions of users in
                  developing countries
                  to leverage the web. Think of them as a light version of a smart phone.
                </p>

                <div class="wrapper-flex">

                  <div class="profile-wrapper">
                    <img src="/images/blog/author.png" alt="Julia walker" width="50">
                  </div>

                  <div class="wrapper">
                    <a href="#" class="h4">ADMIN</a>

                    <p class="text-sm">
                      <time datetime="2021-12-10">Dec 10, 2021</time>
                      <span class="separator"></span>
                      <ion-icon name="time-outline"></ion-icon>
                      <time datetime="PT2M">2 min</time>
                    </p>
                  </div>

                </div>

              </div>

            </div>


            <div class="blog-card">

              <div class="blog-card-banner">
                <img src="images/blog/blog3/1.jpg" alt="Accessibility Tips for Web Developers" width="250"
                  class="blog-banner-img">
              </div>

              <div class="blog-content-wrapper">

                <button class="blog-topic text-tiny">Equipments</button>

                <h3><a href="/templates/blog/blog3.html" class="h3">The Psychology of Fitness Motivation: Unlocking  Mental Strategies for Lasting Commitment</a></h3>

                <p class="blog-text">
                  Embarking on a fitness journey is not merely a physical endeavor; it's a psychological challenge that demands commitment, resilience, and motivation. 
                </p>

                <div class="wrapper-flex">

                  <div class="profile-wrapper">
                    <img src="images/blog/author.png" alt="Julia walker" width="50">
                  </div>

                  <div class="wrapper">
                    <a href="#" class="h4">ADMIN</a>

                    <p class="text-sm">
                      <time datetime="2021-11-28">Nov 28, 2021</time>
                      <span class="separator"></span>
                      <ion-icon name="time-outline"></ion-icon>
                      <time datetime="PT4M">4 min</time>
                    </p>
                  </div>

                </div>

              </div>

            </div>


            <div class="blog-card">

              <div class="blog-card-banner">
                <img src="images/blog/blog4/1.jpg" alt="Dynamically Securing Databases using Hashicorp Vault"
                  width="250" class="blog-banner-img">
              </div>

              <div class="blog-content-wrapper">

                <button class="blog-topic text-tiny">Health</button>

                <h3><a href="/templates/blog/blog4.html" class="h3">Fitness for Different Age Groups: Tailoring Workouts to Your Life Stage</a></h3>

                <p class="blog-text">
                  Fitness is a lifelong journey, and the types of exercises that benefit your body evolve as you progress through different life stages. Understanding your body's changing needs and adjusting your workout routine accordingly can contribute to overall health, prevent injuries, and enhance your well-being. In this blog post, we'll explore fitness recommendations tailored to various age groups, empowering you to make informed choices that align with your current life stage.
                </p>

                <div class="wrapper-flex">

                  <div class="profile-wrapper">
                    <img src="images/blog/author.png" alt="Julia walker" width="50">
                  </div>

                  <div class="wrapper">
                    <a href="#" class="h4">ADMIN</a>

                    <p class="text-sm">
                      <time datetime="2021-11-20">Nov 20, 2021</time>
                      <span class="separator"></span>
                      <ion-icon name="time-outline"></ion-icon>
                      <time datetime="PT4M">4 min</time>
                    </p>
                  </div>

                </div>

              </div>

            </div>


            <div class="blog-card">

              <div class="blog-card-banner">
                <img src="images/blog/blog5/1.webp"
                  alt="Adaptive Loading - Improving Web Performance on low-end devices" width="250"
                  class="blog-banner-img">
              </div>

              <div class="blog-content-wrapper">

                <button class="blog-topic text-tiny">Positivity</button>

                <h3><a href="/templates/blog/blog5.html" class="h3">The Vital Role of Rest and Recovery in Achieving Optimal Well-being</a></h3>

                <p class="blog-text">
                  In our fast-paced world, where the emphasis is often on productivity and constant activity, the importance of rest and recovery tends to be overlooked. In the pursuit of our goals, we often neglect the fundamental need for downtime. This blog aims to shed light on the crucial role that rest and recovery play in achieving and maintaining overall well-being.
                </p>

                <div class="wrapper-flex">

                  <div class="profile-wrapper">
                    <img src="images/blog/author.png" alt="Julia walker" width="50">
                  </div>

                  <div class="wrapper">
                    <a href="#" class="h4">ADMIN</a>

                    <p class="text-sm">
                      <time datetime="2021-11-10">Nov 10, 2021</time>
                      <span class="separator"></span>
                      <ion-icon name="time-outline"></ion-icon>
                      <time datetime="PT3M">3 min</time>
                    </p>
                  </div>

                </div>

              </div>

            </div>


            <div class="blog-card">

              <div class="blog-card-banner">
                <img src="images/blog/blog-6.png"
                  alt="Don't Develop Just for Yourself - A Developer's Checklist to Accessibility" width="250"
                  class="blog-banner-img">
              </div>



          </div>

          <button class="btn load-more">Load More</button>

        </div>





        <!--
          - ASIDE
        -->

        <div class="aside">

          <div class="topics">

            <h2 class="h2">Topics</h2>

            <a href="#" class="topic-btn">
              <div class="icon-box">
                <ion-icon name="server-outline"></ion-icon>
              </div>

              <p>Diet Plan</p>
            </a>

            <a href="#" class="topic-btn">
              <div class="icon-box">
                <ion-icon name="accessibility-outline"></ion-icon>
              </div>

              <p>Equipments</p>
            </a>

            <a href="#" class="topic-btn">
              <div class="icon-box">
                <ion-icon name="rocket-outline"></ion-icon>
              </div>

              <p>Trainer</p>
            </a>

          </div>

          <div class="tags">

            <h2 class="h2">Tags</h2>

            <div class="wrapper">

              <button class="hashtag">#health</button>
              <button class="hashtag">#physique</button>
              <button class="hashtag">#diet</button>
              <button class="hashtag">#positivity</button>
              <button class="hashtag">#motivation</button>
              <button class="hashtag">#excercise</button>
              <button class="hashtag">#training</button>
              <button class="hashtag">#performance</button>

            </div>

          </div>

          <div class="contact">

            <h2 class="h2">Let's Talk</h2>

            <div class="wrapper">

              <p>
                Do you want to learn more about how I can help your company overcome problems? Let us have a
                conversation.
              </p>

              <ul class="social-link">

                <li>
                  <a href="#" class="icon-box discord">
                    <ion-icon name="logo-discord"></ion-icon>
                  </a>
                </li>

                <li>
                  <a href="#" class="icon-box twitter">
                    <ion-icon name="logo-twitter"></ion-icon>
                  </a>
                </li>

                <li>
                  <a href="#" class="icon-box facebook">
                    <ion-icon name="logo-facebook"></ion-icon>
                  </a>
                </li>

              </ul>

            </div>

          </div>

          <div class="newsletter">

            <h2 class="h2">Newsletter</h2>

            <div class="wrapper">

              <p>
                Subscribe to our newsletter to be among the first to keep up with the latest updates.
              </p>

              <form action="#">
                <input type="email" name="email" placeholder="Email Address" required>

                <button type="submit" class="btn btn-primary">Subscribe</button>
              </form>

            </div>

          </div>

        </div>

      </div>

    </div>

  </main>





  <!--
    - #FOOTER
  -->

  <footer>

    <div class="container">

      <div class="wrapper">

        <a href="#" class="footer-logo">
          <img src="/static/img/blog/logo-light.svg" alt="DevBlog's Logo" width="150" height="40" class="logo-light">
          <img src="/static/img/blog/logo-dark.svg" alt="DevBlog's Logo" width="150" height="40" class="logo-dark">
        </a>

        <p class="footer-text">
          Learn about Web accessibility, Web performance, and Database management.
        </p>

      </div>

      <div class="wrapper">

        <p class="footer-title">Quick Links</p>

        <ul>

          <li>
            <a href="#" class="footer-link">Advertise with us</a>
          </li>

          <li>
            <a href="#" class="footer-link">About Us</a>
          </li>

          <li>
            <a href="#" class="footer-link">Contact Us</a>
          </li>

        </ul>

      </div>

      <div class="wrapper">

        <p class="footer-title">Legal Stuff</p>

        <ul>

          <li>
            <a href="#" class="footer-link">Privacy Notice</a>
          </li>

          <li>
            <a href="#" class="footer-link">Cookie Policy</a>
          </li>

          <li>
            <a href="#" class="footer-link">Terms Of Use</a>
          </li>

        </ul>

      </div>

    </div>

    <p class="copyright">
      &copy; Copyright 2022 <a href="#">codewithsadee</a>
    </p>

  </footer>





<!-- <script>
    'use strict';

// navbar variables
const nav = document.querySelector('.mobile-nav');
const navMenuBtn = document.querySelector('.nav-menu-btn');
const navCloseBtn = document.querySelector('.nav-close-btn');


// navToggle function
const navToggleFunc = function () { nav.classList.toggle('active'); }

navMenuBtn.addEventListener('click', navToggleFunc);
navCloseBtn.addEventListener('click', navToggleFunc);



// theme toggle variables
const themeBtn = document.querySelectorAll('.theme-btn');


for (let i = 0; i < themeBtn.length; i++) {

  themeBtn[i].addEventListener('click', function () {

    // toggle `light-theme` & `dark-theme` class from `body`
    // when clicked `theme-btn`
    document.body.classList.toggle('light-theme');
    document.body.classList.toggle('dark-theme');

    for (let i = 0; i <s themeBtn.length; i++) {

      // When the `theme-btn` is clicked,
      // it toggles classes between `light` & `dark` for all `theme-btn`.
      themeBtn[i].classList.toggle('light');
      themeBtn[i].classList.toggle('dark');

    }

  })

}
const nav=document.querySelector(".mobile-nav"),navMenuBtn=document.querySelector(".nav-menu-btn"),navCloseBtn=document.querySelector(".nav-close-btn"),navToggleFunc=function(){nav.classList.toggle("active")};navMenuBtn.addEventListener("click",navToggleFunc),navCloseBtn.addEventListener("click",navToggleFunc);const themeBtn=document.querySelectorAll(".theme-btn");for(let i=0;i<themeBtn.length;i++)themeBtn[i].addEventListener("click",(function(){document.body.classList.toggle("light-theme"),document.body.classList.toggle("dark-theme");for(let i=0;i<themeBtn.length;i++)themeBtn[i].classList.toggle("light"),themeBtn[i].classList.toggle("dark")}));

</script> -->
</body>

</html>
