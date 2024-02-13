<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name = "description" content = "FAQ page"/>
    <meta name = "keywords" content = "School, Website, HAMK, HTML, CSS, FAQ, Frequently asked questions"/>
    <meta name = "author" content = "Otto Ansaharju, Aku Ihamäki, Lauri Uusimäki"/>
    <title>FAQ</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link rel="stylesheet" href="../styles/faq.css" />
  </head>
  <body>
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg">
      <a href="#" class="navbar-brand mb-0 h1">
        <span class="logo">
          <img
            class="d-inline-block align-top"
            src="./images/websitelogo.png"
            alt="Logo"
            
          />
        </span>
        <span class="title">Website</span>
      </a>

      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbarfont">Menu</span>
        <span class="navbar-toggler-icon"></span>
      </button>

      <div
        class="collapse navbar-collapse justify-content-center"
        id="navbarNav"
      >
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../#">
              <span class="navbarfont">Home</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="./about.php">
              <span class="navbarfont">About</span>
            </a>
          </li>

          <li class="nav-item dropdown">
            <a
              class="nav-link active dropdown-toggle"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <span class="navbarfont">Customer service</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="./contact.php"
                  >Contact us</a
                >
              </li>
              <li><a class="dropdown-item" href="./FAQ.php">FAQ</a></li>
            </ul>
          </li>
          
          <?php
          session_start();
          if(isset($_SESSION['admin'])){
            ?>
            <li class = "nav-item">
              <a class = "nav-link active" href = "./loginregister/adminpage.php">
                <span class = "navbarfont">Admin page</span>
              </a>
              <a class = "nav-link active" href = "./loginregister/logout.php">
                <span class = "navbarfont">Logout</span>
              </a>
            </li>
      <?php
          }
          elseif(isset($_SESSION['user'])){
            ?>
            <li class = "nav-item">
              <a class = "nav-link active" href = "./loginregister/userpage.php">
                <span class = "navbarfont">User page</span>
              </a>
              <a class = "nav-link active" href = "./loginregister/logout.php">
                <span class = "navbarfont">Logout</span>
              </a>
            </li>
              <?php
          } else {
                ?>
                <li class = "nav-item">
          <a class = "nav-link active" href = "./loginregister/login.php">
            <span class = "navbarfont">Login</span>
          </a>
        
          <a class = "nav-link active" href = "./loginregister/register.php">
            <span class = "navbarfont">Register</span>
          </a>
        </li>
              </ul>
        <?php
      }
              ?>
      </div>
    </nav>
    <!-- End of Navbar -->

    <!-- FAQ -->

    <div class="faq-content-container">
      <p class="faq-title">Frequently asked questions</p>

      <img class="faq-image" 
      src="../images/FAQ1.png" 
      alt="Questions" />
    </div>

<section class="faq-section">
  <div class="container">

    <div class="accordion" id="faqAccordion">
      <div class="accordion-item">
          <button
            class="accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#faqCollapse1"
            aria-expanded="false"
            aria-controls="faqCollapse1"
          >
          <span class="accordion-header">
            Why is my order taking so long?
          </button>
        </span>
        <div
          id="faqCollapse1"
          class="accordion-collapse collapse"
          aria-labelledby="faqHeading1"
          data-bs-parent="#faqAccordion"
        >
          <span class="accordion-body">
            Your order might be taking longer than usual due to the pandemic.
          </span>
        </div>
      </div>

      <div class="accordion-item" id="faqHeading2">
          <button
            class="accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#faqCollapse2"
            aria-expanded="false"
            aria-controls="faqCollapse2"
          >
          <Question class="accordion-header">
           How do i change my password?
          </span>
        </button>
        
        <div
          id="faqCollapse2"
          class="accordion-collapse collapse"
          aria-labelledby="faqHeading2"
          data-bs-parent="#faqAccordion"
        >
          <span class="accordion-body">
            You can change your password by going to your profile settings.
          </span>
        </div>
      </div>

      <div class="accordion-item" id="faqHeading3">
        <button
          class="accordion-button collapsed"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#faqCollapse3"
          aria-expanded="false"
          aria-controls="faqCollapse3"
        >
        <Question class="accordion-header">
          How do i get a refund?
        </span>
      </button>

      <div
      id="faqCollapse3"
      class="accordion-collapse collapse"
      aria-labelledby="faqHeading3"
      data-bs-parent="#faqAccordion"
    >
      <span class="accordion-body">
        You can get a refund by contacting our customer service.
      </span>
    </div>
  </div>

  <div class="accordion-item" id="faqHeading4">
    <button
      class="accordion-button collapsed"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#faqCollapse4"
      aria-expanded="false"
      aria-controls="faqCollapse4"
    >
    <Question class="accordion-header">
      What is the return policy?
    </span>
  </button>

  <div
  id="faqCollapse4"
  class="accordion-collapse collapse"
  aria-labelledby="faqHeading4"
  data-bs-parent="#faqAccordion"
>
  <span class="accordion-body">
    You can return your order within 14 days of receiving it.
  </span>
</div>
</div>


    </div>
  </div>
</section>
<!-- End of FAQ -->



    <footer class="footer">
      <div class="footer-container">
        <a
          href="https://www.instagram.com/"
          target="_blank"
          class="fa-brands fa-instagram"
          alt="Instagram page"
        ></a>
        <a
          href="https://www.facebook.com/"
          target="_blank"
          class="fa-brands fa-facebook-f"
          alt="Facebook page"
        ></a>
        <a
          href="https://twitter.com/"
          target="_blank"
          class="fa-brands fa-x-twitter"
          alt="Twitter page"
        ></a>
        <a
          href="https://discord.com/"
          target="_blank"
          class="fa-brands fa-discord"
          alt="Discord page"
        ></a>
      </div>
    </footer>
  </body>
</html>
