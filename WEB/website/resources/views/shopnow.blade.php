

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://firebasestorage.googleapis.com/v0/b/webapps-2ffa5.appspot.com/o/Logo.jpg?alt=media&token=c057c533-05f9-46eb-805d-cc5bbbda96b3">
    <title>TECHNOBIRDS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,100..900;1,100..900&family=IBM+Plex+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9823e98254.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{url('css/styles1.css')}}">
    
</head>
<body>

<!-- PHP SESSION -->

<?php
        session_start(); 

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {

            $nameParts = explode(' ', $_SESSION['user_full_name']);
            $firstName = strtoupper($nameParts[0]); /* FIRST NAME */
            $fullName = strtoupper($_SESSION['user_full_name']); /* FULL NAME */
            $userName = strtoupper($_SESSION['user_username']); /* USERNAME */
            $email = $_SESSION['user_email']; /* EMAIL */
            $phoneNumber = $_SESSION['user_phone_number']; /* PHONE NUMBER */
            $gender = $_SESSION['user_gender']; /* GENDER */
            $profilePicture = $_SESSION['user_profile_picture'];  /* PROFILE PICTURE */    
            $Text = "";
            $sstyle = "display: block;"; 
            $address = $_SESSION['user_address'];

            

        } else {
            $Text = "Log In"; 
            $firstName = "";
            $fullName = "db_name";
            $userName = "db_username";
            $email = "db_email";
            $phoneNumber = "db_phoneNumber";
            $gender = "db_gender";
            $sstyle = "display: none;"; 
            $profilePicture = "Icons/Profile.png";
            $top = "NO ID";         
            $address = "db_getAddress";
        }
       
        ?>

<nav class="navbar">
    <div class="container">
        <div class="logo"> TECHNOBIRDS</div>
        <ul class="nav-links">
            <li onclick="redirectToHome();"><a href="#">HOME</a></li>
            <script src="{{ asset('js/script.js') }}"></script>


            <?php
            $newsNowUrl = route('newsletter'); // Generate the route URL
            echo
            '<li><a href="' . $newsNowUrl . '">NEWSLETTER</a></li>';
            ?>

            <?php
            $supportNowUrl = route('support'); // Generate the route URL

            echo
            '<li><a href="' . $supportNowUrl . '">SUPPORT</a></li>';
            ?>

            <?php
            $productsNowUrl = route('productreviews'); // Generate the route URL

            echo
            '<li><a href="' . $productsNowUrl . '">PRODUCT REVIEWS</a></li>';
            ?>


                    <?php
                    $shopNowUrl = route('shopnow'); // Generate the route URL
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        echo '<li>
                                <a href="' . $shopNowUrl . '" style="color: #fff; font-size: 1.0vw; text-decoration: none; border: 1px solid #3ec2a7; padding: 10px 14px; background-color: #3ec2a7; margin-right: 10px; transition: background-color 0.4s, color 0.4s;" 
                                onmouseover="this.style.backgroundColor=\'#333\'; this.style.borderColor=\'#3ec2a7\'; this.style.color=\'#3ec2a7\';" 
                                onmouseout="this.style.backgroundColor=\'#3ec2a7\'; this.style.borderColor=\'#3ec2a7\'; this.style.color=\'#fff\';">
                                    BUY NOW
                                </a>
                            </li>';
                    } else {
                        echo '<li>
                        <a href="#" style="color: #fff; font-size: 1.0vw; text-decoration: none; border: 1px solid #3ec2a7; padding: 10px 14px; background-color: #3ec2a7; margin-right: 10px; transition: background-color 0.4s, color 0.4s;" 
                           onmouseover="this.style.backgroundColor=\'#333\'; this.style.borderColor=\'#3ec2a7\'; this.style.color=\'#3ec2a7\';" 
                           onmouseout="this.style.backgroundColor=\'#3ec2a7\'; this.style.borderColor=\'#3ec2a7\'; this.style.color=\'#fff\';"
                           onclick="openDialog(); popExit();">
                            BUY NOW
                        </a>
                      </li>';
                    }
                    ?>


                    <?php

                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        $sstyle = "display: block;";
                    } else {
                        $sstyle = "display: none;";
                    }

                    
                    // Check if profile picture data exists
                    if (!empty($profilePicture)) {
                        // Display the image using base64 encoding
                        echo '<img style="' . $sstyle . '" class="profile-icon" src="data:image/png;base64,' . base64_encode($profilePicture) . '" onmouseover="profileMenu()"  alt="Profile Picture">';
                    } else {
                        // Display a default image if profile picture data is missing
                        echo '<img style="' . $sstyle . '" class="profile-icon" src="Icons/Profile.png" onmouseover="profileMenu()"  alt="Profile Picture">';
                    }

                    ?>


            <div class="user">  </div>
            <li>
                <a href="#" class="login" style="color: #4dceb0; margin-right: 0.6vw; transition: color 0.3s;" 
                   onmouseover="this.style.color='#36917c'" onmouseout="this.style.color='#4dceb0'" 
                   onclick="openDialog(); popExit();" > <?= $Text ?> </a>
            </li>
            <img class="cart-icon" src="Icons/Cart.png" alt="Cart Icon" onclick="toggleCartNavbar()">
        </ul> 
    </div>
</nav>


<!-- add to cart -->

<div class="cart-navbar" id="cartNavbar">
    <div class="header">
        <span onclick="toggleCartNavbar()">&gt;</span>
        <h1>Cart</h1>
    </div>
    <div class="carted"></div>
</div>
  <div class="backdrop-overlay"></div>


    <div class="header">
        <h1><span style="color: #3ec2a7;">Store.</span> The best way to buy the products you love.</h1>
        <div class="search-box"> 
            <div class="row">
                <input type="text" id="input-box" placeholder="Search anything">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="result-box">

            </div>
        </div>
    </div>
    <script src="{{ asset('js/autocomplete.js') }}"></script>




    
<div class="categories">
    <div class="slider-wrapper">
        <button id="prev-slide" class="slide-button">&#60;</button>
        <div class="image-list">

            <?php  
            $processorUrl = route('processor'); // Generate the route URL

            echo                   
            '<figure>
                <a href="' . $processorUrl . '" ><img src="Items/categories1.png" alt="cat_img-1" class="image-item"></a>
                <figcaption>PROCESSOR</figcaption>
            </figure>';
            ?>


            <figure>
                <img src="Items/categories2.png" alt="cat_img-2" class="image-item">
                <figcaption>MOTHERBOARD</figcaption>
            </figure>
            <figure>
                <img src="Items/categories3.png" alt="cat_img-3" class="image-item">
                <figcaption>GRAPHICS CARD</figcaption>
            </figure>
            <figure>
                <img src="Items/categories4.png" alt="cat_img-4" class="image-item">
                <figcaption>MEMORY</figcaption>
            </figure>
            <figure>
                <img src="Items/categories5.png" alt="cat_img-5" class="image-item">
                <figcaption>SSD</figcaption>
            </figure>
            <figure>
                <img src="Items/categories6.png" alt="cat_img-6" class="image-item">
                <figcaption>POWER SUPPLY</figcaption>
            </figure>
            <figure>
                <img src="Items/categories7.png" alt="cat_img-7" class="image-item">
                <figcaption>PC CASE</figcaption>
            </figure>
            <figure>
                <img src="Items/categories8.png" alt="cat_img-8" class="image-item">
                <figcaption>LAPTOP</figcaption>
            </figure>
            <figure>
                <img src="Items/categories9.png" alt="cat_img-9" class="image-item">
                <figcaption>MONITOR</figcaption>
            </figure>
            <figure>
                <img src="Items/categories10.png" alt="cat_img-10" class="image-item">
                <figcaption>KEYBOARD</figcaption>
            </figure>
            <figure>
                <img src="Items/categories11.png" alt="cat_img-11" class="image-item">
                <figcaption>MOUSE</figcaption>
            </figure>
            <figure>
                <img src="Items/categories13.png" alt="cat_img-13" class="image-item">
                <figcaption>HEADSET</figcaption>
            </figure>
            <figure>
                <img src="Items/categories14.png" alt="cat_img-14" class="image-item">
                <figcaption>PRINTER</figcaption>
            </figure>
            <figure>
                <img src="Items/categories15.png" alt="cat_img-15" class="image-item">
                <figcaption>NETWORK DEVICES</figcaption>
            </figure>
            <figure>
            <img src="Items/categories16.png" alt="cat_img-16" class="image-item">
                <figcaption>SPEAKER</figcaption>
            </figure>
        </div>
        <button id="next-slide" class="slide-button">&#62;</button>
    </div>
</div>
<div class="header1">
    <h1><span style="color: #3ec2a7;">The latest.</span> Take a look at what’s new, right now.</h1></div>
<section class="latest-product">
    <div class="slider-wrapper1">
        <div class="slider1">
            <img src="Items/latest1.png" alt="latest-img-1" id="slide-1" onclick="showDialog(this)"  data-name="EZTimber V5.0 Super Bass Wireless Speaker support TF Card, USB, AUX, In and FM Radio Function" data-price="₱1,850.00" data-discounted-price="₱2,499.00" data-image="Items/latest1.png">
            <img src="Items/latest2.png" alt="latest-img-2" id="slide-2" onclick="showDialog(this)" data-name="EZTimber V5.0 Super Bass Wireless Speaker support TF Card, USB, AUX, In and FM Radio Function" data-price="₱1,850.00" data-discounted-price="₱2,499.00" data-image="Items/latest1.png">>           
        </div>
        <div class="slider-nav">
            <a onclick="changeSlide(1)"></a>
            <a onclick="changeSlide(2)"></a>
        </div>
    </div>
</section>

<div id="dialog" class="dialog">
    <div class="dialog-content">
        <span class="close-btn" onclick="closeDialog()">&times;</span>
        <div class="img">
            <img id="dialog-image" src="" alt="latest">
        </div>
        
        <div class="latest-descript">
            <h1 id="dialog-name"></h1>
            <p id="dialog-price"></p>
            <del id="dialog-discounted-price"></del>
            <button class="addtocart" onclick="showAddToCartDialog()">Add to Cart</button>
            <button class="buynow">Buy Now</button>
        </div>
    </div>
</div>
<div class="backdrop-overlay" onclick="closeDialog()"></div>

<script>
    // JavaScript code for slider functionality
    let currentSlide = 1;
    let isTransitioning = false;

    function changeSlide(slideNumber) {
        if (isTransitioning || slideNumber === currentSlide) return;

        const slider = document.querySelector('.slider1');

        // Hide current slide with transition delay
        slider.children[currentSlide - 1].style.transition = 'opacity 0.3s';
        slider.children[currentSlide - 1].style.opacity = 0;
        
        isTransitioning = true;
        setTimeout(() => {
            // Show new slide after delay
            slider.children[currentSlide - 1].style.display = 'none';
            slider.children[slideNumber - 1].style.display = 'block';
            slider.children[slideNumber - 1].style.opacity = 1;
            currentSlide = slideNumber;
            isTransitioning = false;
        }, 250); // Adjust delay time (in milliseconds) as needed
    }
</script>

<div id="addToCartDialog" class="dialog">
    <div class="dialog-content1">
        <span class="close-btn" onclick="closeDialog()">&times;</span>
        <div class="dialog-text">
            <p>Done</p>
        </div>
    </div>
</div>

<div class="header2">
    <h1><span style="color: #3ec2a7;">For You.</span> Your personalized haven for must-have products.</h1></div>

    <div class="grid-container">
        <div class="grid-item" onclick="showDialog(this)"  data-name="G Skill Trident Z Neo 16gb 2x8 Memory 3200mhz Ddr4 RGB" data-price="₱3,819.00" data-discounted-price="₱5,522.00" data-image="Foryouimage/(1) G Skill Trident Z Neo 16gb 2x8 Memory 3200mhz Ddr4 RGB.png">
          <img src="Foryouimage/(1) G Skill Trident Z Neo 16gb 2x8 Memory 3200mhz Ddr4 RGB.png" alt="Image 1" class="image">
          <div class="name">G Skill Trident Z Neo 16gb 2x8 Memory 3200mhz Ddr4 RGB</div>
          <div class="price">&#8369;3,819.00</div>
          <div class="discounted-price"><del>&#8369;5,552.00</del></div>
        </div>
        <div class="grid-item" onclick="showDialog(this)" data-name="Gigabyte B550M DS3H AC Wifi Socket Am4 Ddr4 Motherboard" data-price="₱6,285.00" data-discounted-price="₱6,350.00" data-image="Foryouimage/(1) Gigabyte B550M DS3H AC Wifi Socket Am4 Ddr4 Motherboard.png">
            <img src="Foryouimage/(1) Gigabyte B550M DS3H AC Wifi Socket Am4 Ddr4 Motherboard.png" alt="Image 2" class="image">
            <div class="name">Gigabyte B550M DS3H AC Wifi Socket Am4 Ddr4 Motherboard</div>
            <div class="price">&#8369;6,285.00</div>
            <div class="discounted-price"><del>&#8369;₱6,350.00</del></div>
          </div>
        <div class="grid-item" onclick="showDialog(this)" data-name="Adata Legend 710 Solid State Drive 512GB PCIe GEN3 x4 M.2 2280" data-price="₱1,999.00" data-discounted-price="₱2,280.00" data-image="Foryouimage/(1) Adata Legend 710 Solid State Drive 512GB PCIe GEN3 x4 M.2 2280.png">
            <img src="Foryouimage/(1) Adata Legend 710 Solid State Drive 512GB PCIe GEN3 x4 M.2 2280.png" alt="Image 2" class="image">
            <div class="name">Adata Legend 710 Solid State Drive 512GB PCIe GEN3 x4 M.2 2280</div>
            <div class="price">&#8369;1,999.00</div>
            <div class="discounted-price"><del>&#8369;2,280.00</del></div>
          </div>
        <div class="grid-item" onclick="showDialog(this)" data-name="GigAMD Ryzen 5 5600G Cezanne 3.9GHz 6-Core AM4 Boxed Processor" data-price="₱6,725" data-discounted-price="₱9,800" data-image="Foryouimage/(1) AMD Ryzen 5 5600G Cezanne 3.9GHz 6-Core AM4 Boxed Processor.jpg">
            <img src="Foryouimage/(1) AMD Ryzen 5 5600G Cezanne 3.9GHz 6-Core AM4 Boxed Processor.jpg" alt="Image 2" class="image">
            <div class="name">GigAMD Ryzen 5 5600G Cezanne 3.9GHz 6-Core AM4 Boxed Processor</div>
            <div class="price">&#8369;6,725</div>
            <div class="discounted-price"><del>&#8369;9,800</del></div>
          </div>
        <div class="grid-item" onclick="showDialog(this)" data-name="Asus ROG RYUO III 240 ARGB Liquid Cooler White" data-price="₱12,499.00" data-discounted-price="₱13,850.00 " data-image="Foryouimage/(1) Asus ROG RYUO III 240 ARGB Liquid Cooler White.png">
            <img src="Foryouimage/(1) Asus ROG RYUO III 240 ARGB Liquid Cooler White.png" alt="Image 2" class="image">
            <div class="name">Asus ROG RYUO III 240 ARGB Liquid Cooler White</div>
            <div class="price">&#8369;12,499.00</div>   
            <div class="discounted-price"><del>&#8369;13,850.00 </del></div>
          </div>
        <div class="grid-item" onclick="showDialog(this)"data-name="Galax NVIDIA® GeForce GTX 1650 EX Plus 1-Click OC 4gb 128bit GDdr6 Gaming Videocard" data-price="₱6,499.00" data-discounted-price="₱8,500.00" data-image="Foryouimage/(1) Galax NVIDIA® GeForce GTX 1650 EX Plus 1-Click OC 4gb 128bit GDdr6 Gaming Videocard.png">
            <img src="Foryouimage/(1) Galax NVIDIA® GeForce GTX 1650 EX Plus 1-Click OC 4gb 128bit GDdr6 Gaming Videocard.png" alt="Image 2" class="image">
            <div class="name">Galax NVIDIA® GeForce GTX 1650 EX Plus 1-Click OC 4gb 128bit GDdr6 Gaming Videocard</div>
            <div class="price">&#8369;6,499.00</div>
            <div class="discounted-price"><del>&#8369;8,500.00</del></div>
          </div>
        <div class="grid-item" onclick="showDialog(this)"data-name="MSI MAG A550BN Gaming Power Supply - 80 Plus Bronze Certified 550W - Compact Size - ATX PSU" data-price="₱2,259.00" data-discounted-price="₱2,760.00" data-image="Foryouimage/(1) MSI MAG A550BN Gaming Power Supply - 80 Plus Bronze Certified 550W - Compact Size - ATX PSU.png">
            <img src="Foryouimage/(1) MSI MAG A550BN Gaming Power Supply - 80 Plus Bronze Certified 550W - Compact Size - ATX PSU.png" alt="Image 2" class="image">
            <div class="name">MSI MAG A550BN Gaming Power Supply - 80 Plus Bronze Certified 550W - Compact Size - ATX PSU</div>
            <div class="price">&#8369;2,259.00</div>
            <div class="discounted-price"><del>&#8369;2,760.00</del></div>
          </div>
        <div class="grid-item" onclick="showDialog(this)" data-name="MSI MAG Vampiric 100R Mid Tower Gaming PC Case Black" data-price="₱2,850.00" data-discounted-price="₱4,095.00" data-image="Foryouimage/(1) MSI MAG Vampiric 100R Mid Tower Gaming PC Case Black.png">
            <img src="Foryouimage/(1) MSI MAG Vampiric 100R Mid Tower Gaming PC Case Black.png" alt="Image 2" class="image">
            <div class="name">MSI MAG Vampiric 100R Mid Tower Gaming PC Case Black</div>
            <div class="price">&#8369;2,850.00</div>
            <div class="discounted-price"><del>&#8369;4,095.00</del></div>
          </div>
        <div class="grid-item" onclick="showDialog(this)" data-name="Seagate Barracuda ST1000DM010 1tb 7200RPM 64MB Cache Sata Hard disk Drive" data-price="₱1,225.00<" data-discounted-price="₱1,995.00" data-image="Foryouimage/(1) Seagate Barracuda ST1000DM010 1tb 7200RPM 64MB Cache Sata Hard disk Drive.png">
            <img src="Foryouimage/(1) Seagate Barracuda ST1000DM010 1tb 7200RPM 64MB Cache Sata Hard disk Drive.png" alt="Image 2" class="image">
            <div class="name">Seagate Barracuda ST1000DM010 1tb 7200RPM 64MB Cache Sata Hard disk Drive</div>
            <div class="price">&#8369;1,225.00</div>
            <div class="discounted-price"><del>&#8369;1,995.00</del></div>
          </div>
        <div class="grid-item" onclick="showDialog(this)" data-name="ASUS Prime B760M-K D5 Intel® B760 LGA 1700 mATX Motherboard" data-price="₱5,650.00" data-discounted-price="₱6,870.00" data-image="Foryouimage/(2) ASUS Prime B760M-K D5 Intel® B760 LGA 1700 mATX Motherboard.png">
            <img src="Foryouimage/(2) ASUS Prime B760M-K D5 Intel® B760 LGA 1700 mATX Motherboard.png" alt="Image 2" class="image">
            <div class="name">ASUS Prime B760M-K D5 Intel® B760 LGA 1700 mATX Motherboard</div>
            <div class="price">&#8369;5,650.00 </div>
            <div class="discounted-price"><del>&#8369;6,870.00</del></div>
          </div>
      </div>

      
        <script>
            const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
            const imageList = document.querySelector(".slider-wrapper .image-list");
            let currentPosition = 0;
            const slideWidth = 14;
            const maxPosition = 0;
            let prevButton = document.getElementById("prev-slide");

            prevButton.style.visibility = "hidden";

            function slideNext() {
                if (currentPosition > -(imageList.children.length - 10) * slideWidth) {
                    currentPosition -= slideWidth;
                    updateSliderPosition();
                }
            }

            function slidePrevious() {
                if (currentPosition < maxPosition) {
                    currentPosition += slideWidth;
                    updateSliderPosition();
                }
            }

            function updateSliderPosition() {
                imageList.style.transition = "transform 0.5s ease";
                imageList.style.transform = `translateX(${currentPosition}vw)`;
                
                prevButton.style.visibility = currentPosition === maxPosition ? "hidden" : "visible";
                
                document.getElementById("next-slide").style.visibility = currentPosition <= -(imageList.children.length - 10) * slideWidth ? "hidden" : "visible";
            }

            slideButtons.forEach(button => {
                if (button.id === "next-slide") {
                    button.addEventListener("click", () => {
                        slideNext();
                        prevButton.style.visibility = "visible";
                    });
                } else if (button.id === "prev-slide") {
                    button.addEventListener("click", slidePrevious);
                }
            });


        </script>

<div id="dropdown" class="menu" onmouseout="profileMenuOff()" >

<!-- -->
<div class="linearProfile">
    <?php
    // Check if profile picture data exists
    if (!empty($profilePicture)) {
        // Display the image using base64 encoding
        echo '<img id= "circle" src="data:image/png;base64,' . base64_encode($profilePicture) . '" alt="Profile Picture">';
    } else {
        // Display a default image if profile picture data is missing
        echo '<img id= "circle" src="Icons/Profile.png" alt="Profile Picture">';
    }
    ?>   
    <h1> <?= $firstName ?> </h1>            
</div>
<!-- -->

<!-- -->
<div class="linearProfile">
    <img src="Icons/profile1.png" alt="Menu Profile Icon">   
    <p class="editProfile" onclick="openProfile();"> Edit Profile </p>            
</div>
<!-- -->

<!-- -->
<div class="linearProfile">
<img src="Icons/logout.png" alt="Menu Profile Icon">   
<a href="/sql/logout.php" class="logout"> Logout </a>            
</div>
<!-- -->

</div>


<!-- -->

<div id="dialog02" class="viewProfileDetails">

                <!-- -->                
                <div class="linearNav">
                    <h1> My Profile </h1>
                    <p> Manage and protect your account. </p>
                </div>

                <!-- --> 

            <div class="dbDetails">
                <div>
                    <!-- --> 
                    <div class="dbUsername">
                    <p> Username </p>

                    <div class="getdbUser">
                    <p> <?= $userName ?>  </p>
                    </div>

                    </div>
                    <!-- --> 

                    <!-- --> 
                    <div class="dbName">
                    <p> Name </p>

                    <div class="getdbName">
                    <p> <?= $fullName ?> </p>
                    </div>

                    </div>
                    <!-- --> 

                    <!-- --> 
                    <div class="dbMail">
                    <p> Email </p>

                    <div class="getdbMail">
                    <p> <?= $email ?> </p>
                    </div>

                    </div>
                    <!-- --> 

                    <!-- --> 
                    <div class="dbPhone">
                    <p> Phone number </p>

                    <div class="getdbPhone">
                    <p> <?= $phoneNumber ?> </p>
                    </div>

                    </div>
                    <!-- -->

                    <!-- --> 
                    <div class="dbGender">
                    <p> Gender </p>

                    <div class="getdbGender">
                    <p> <?= $gender ?> </p>
                    </div>

                    </div>
                    <!-- -->
                </div>
                

                <!-- -->

                <div class="enterAddress">               
                    <p> Address </p>  
                    <div class="getdbAddress">
                    <p> <?= $address ?> </p>
                    </div>          
                </div>

                <div >
                
                <form id="addressForm" class="linearInputAdd" action="sql/uploadAddress.php" method="POST">  
                <input class="inputAddress" type="text" name="address">
             
                </input>       
               
                <img id="submitButton" src="Icons/check.png" alt="Submit" class="sub">  

                <script>
                simageHover();
                
                </script>



                </form>
                </div>
                
                <script>
                sendAddress();
                </script>

               </div>


               


                </div>                                              
            </div>


            <!-- -->
                <div id="dialog3" class="saveDetails">
                    <?php
                    // Check if profile picture data exists
                    if (!empty($profilePicture)) {
                        // Display the image using base64 encoding
                        echo '<img id="previewImage" src="data:image/png;base64,' . base64_encode($profilePicture) . '" alt="Profile Picture">';
                    } else {
                        // Display a default image if profile picture data is missing
                        echo '<img id="previewImage" src="Icons/Profile.png" alt="Profile Picture">';
                    }
                    ?>

                    <div class="linearCoverS">

                        <form class="linearSelect" id="imageUploadForm" action="/sql/uploadImage.php" method="post" enctype="multipart/form-data">
                            <div>
                                <label for="fileInput" id="fileLabel" style="cursor: pointer;">Select Image</label>
                                <input type="file" id="fileInput" name="image" style="display: none;" accept="image/*"> <!-- Hide the file input and accept only image files -->
                            </div>
                            <!-- Your other form fields go here -->

                        </form>

                        <div class="linearSave">
                            <p id="saveButton"> Save </p>
                        </div>
                    </div>

                </div>

                <div id="overlay05" class="overlay05"></div>

                <script>
                    // Function to handle file input change event
                    document.getElementById("fileInput").addEventListener("change", function(event) {
                        // Get the selected file
                        const file = event.target.files[0];
                        if (file) {
                            // Create a FileReader object
                            const reader = new FileReader();
                            // Set up the FileReader onload event handler
                            reader.onload = function() {
                                // Display the preview image
                                document.getElementById("previewImage").src = reader.result;
                            };
                            // Read the image file as a data URL
                            reader.readAsDataURL(file);
                        }
                    });

                    // Add an event listener to the Save button to submit the form
                    document.getElementById("saveButton").addEventListener("click", function() {
                        // Trigger form submission when Save button is clicked
                        document.getElementById("imageUploadForm").submit();
                    });
                </script>

                <div>
                <!-- -->