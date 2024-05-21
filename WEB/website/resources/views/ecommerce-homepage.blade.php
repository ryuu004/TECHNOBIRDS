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
    <link rel="stylesheet" href="{{url('css/styles.css')}}">
   
    
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

        <!-- END -->

       
<nav class="navbar">
    <div class="container">
        <div class="logo"> TECHNOBIRDS</div>
        <ul class="nav-links">
            <li onclick="redirectToHome();"><a href="#">HOME</a></li>

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
  </div>
  <div class="backdrop-overlay"></div>



<div class="content" id="content">
    <div class="title-container">
        <h1>TECHNOLOGY PARTS FOR EVERYONE</h1>
        <p>Welcome to TechnoBirds, your one-stop-shop for all your computer needs. We specialize in selling high-quality computer parts such as GPUs, system units, CPUs, video cards, and peripherals. Our goal is to provide you with the best possible experience in building your dream computer.</p>
        <p><u><a href="#">Build your dream computer with us!</a></u></p>
    </div>
    <img src="Icons/SideViewInvention.png" alt="Side View Invention Image">
</div>
    <?php
        $shopNowUrl = route('shopnow'); // Generate the route URL

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            echo '<a href="' . $shopNowUrl . '" button class="shop-button" id="shop">SHOP NOW</a>';
        } else {
            echo '<button class="shop-button" onclick="openDialog(); popExit();" id="shop">SHOP NOW</button>';

        }
    ?>

<div class="second-content" id="content01">
    <img id="follow-image" src="Icons/Invention.png" alt="Invention Image" class="invention-image">
    <div class="how-to-build">
        <h2>HOW TO BUILD YOUR DREAM COMPUTER</h2>
        <p>
            <span class="color" >&gt; </span>Shop for the parts you need on our website<br><br>
            <span class="color">&gt; </span>Have the parts shipped to your doorstep<br><br>
            <span class="color">&gt; </span>Build your dream computer with our easy-to-follow tutorials and guides.
        </p>
    </div>
</div>

<div class="icon-grid" id="content02">
    <div class="icon">
        <img src="Icons/WifiLogo.png" alt="Icon 1">
        <h1>WIDE SELECTION</h1>
        <p>We offer a wide selection of computer parts from the best brands in the market. Whether you're a gamer, a content creator or a professional, we have the right parts for you.</p>
    </div>
    <div class="icon">
        <img src="Icons/ElectricLogo (1).png" alt="Icon 2">
        <h1>COMPETITIVE PRICING</h1>
        <p>We offer competitive pricing on all our products, ensuring that you get the best value for your money.</p>
    </div>
    <div class="icon">
        <img src="Icons/CPLogo (1).png" alt="Icon 3">
        <h1>FAST SHIPPING</h1>
        <p>We offer fast shipping to ensure that you receive your parts in a timely manner.</p>
    </div>
    <div class="icon">
        <img src="Icons/SettingsLogo (1).png" alt="Icon 4">
        <h1>EASY TO USE WEBSITE</h1>
        <p>Our website is designed to be user-friendly and easy to navigate, making it easy for you to find the parts you need.</p>
    </div>
    <div class="icon">  
        <img src="Icons/CubeLogo (1).png" alt="Icon 5">
        <h1>EXPERT SUPPORT</h1>
        <p>Our team of experts is always ready to help you with any questions you may have. We're committed to providing you with the best customer service experience.</p>
    </div>
    <div class="icon">
        <img src="Icons/BluetoothLogo (1).png" alt="Icon 6">
        <h1>HIGH QUALITY</h1>
        <p>All our products are made of high-quality materials and are thoroughly tested to ensure that they meet our strict quality standards.</p>
    </div>

</div>

<div class="background-image" id="content03">
    <img src="Icons/Background.png" alt="Background Image">
    <div class="overlay-text">
        MODERN DESIGN
    </div>
</div>

<h1 class="wide" id="textN" >WIDE SELECTION OF PARTS</h1>

<div class="fifth-content" id="content04">

    <div class="left-column">
        <div class="text" id="text1">HIGH QUALITY <span class="long-dash" id="long-dash-left"></span></div>
        <div class="text" id="text2">INNOVATION <span class="long-dash" id="long-dash-left"></span></div>
    </div>
    <img src="Icons/Invent.png" alt="Invent">
    <div class="right-column">
        <div class="text" id="text3"><span class="long-dash" id="long-dash-right"></span> COMPETITIVE<br><span class="space">PRICING</span></div>
        <div class="text" id="text4"><span class="long-dash" id="long-dash-right"></span> FAST SHIPPING</div>
    </div>
</div>

<div class="sixth-content" id="content05">
    <img src="Icons/WomanUsingDevice.png" alt="Woman Image">   
    <div class="sixth-text">
        <h1>BUILD YOUR DREAM COMPUTER WITH TECHNOBIRDS </h1>
        <p>Building your dream computer has never been easier. Shop with us today and experience the best in quality, pricing, and support.</p>

        <?php
         $shopNowUrl = route('shopnow'); // Generate the route URL

         if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            echo '<a href="' . $shopNowUrl . '" button class="shop-button1">SHOP NOW</a>';
         }else{
            echo '<button onclick="openDialog(); popExit();" class="shop-button1">SHOP NOW</button>';
         }
        
        ?>   
    </div>      
  
</div>

<div class="last-content">
    <div class="underlined-text">
        <ul class="ultxtlinks">
            <li><a href="#">FAQ</a></li>
            <li><a href="#">CONTACT</a></li>

            <?php
            $shopNowUrl = route('shopnow'); // Generate the route URL

            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            echo '<li><a href="' . $shopNowUrl . '" >SHOP</a></li>';

            } else {
            echo '<li><a href="#" onclick="openDialog(); popExit();" >SHOP</a></li>';

            } 
            ?>

            <li><a href="#">EXPERTS REVIEWS</a></li>
        </ul>
    </div>
    <div class="about-us">
        <h1>ABOUT US</h1>
        <p>TECHNOBIRDS launched a digital marketplace in 2024, offering computer components that you need. Our mission is to provide tech enthusiasts and casual users alike with a seamless shopping experience, backed by our commitment to quality, reliability, and customer satisfaction. Join us at TECHNOBIRDS and let your tech dreams take flight.</p>
    </div> 
    <div class="new-releases">
        <h1>NEW RELEASES</h1>
        <p>TECHNOBIRDS strive to bring you the latest trends and advancements in technology, all conveniently accessible at your fingertips. Whether you're a tech enthusiast or a casual user, with TECHNOBIRDS, embrace the future of tech with confidence and style.</p>
        <div class="input-container">
        <form>
            <input type="text" id="email" name="email" placeholder="Enter your email here">
        </form>
        </div>
        <button class="Subscribe">Subscribe Now</button>
    </div> 
</div>

        <!-- Login DIV (DIALOG) -->
        <div id="dialog" class="containerr01"> 
        
                <div class="title">Login</div>
                <div class="content01">
                <form action="sql/submit.php" method="POST">

                <div class="user-details01">
                <div class="input-box01">
                    <span class="details">Phone Number</span>
                    <input type="text" style="width: 95%" name="phoneNumber" placeholder="Enter your number" required>
                </div>

                <div class="input-box01">
                    <span class="details">Password</span>
                    <input type="password" style="width: 95%" name="password" placeholder="Enter your password" required>
                </div>
                </div>

                <!-- Login Button -->

                <div class="button01">
                    <input type="submit" value="Login">
                </div>

                <!-- I'm not a robot! -->

                <div id="random" class="layoutCode" >
                <div id="codetoEnter" class="codetoEnter">
                    <p id="randomNumberDisplay1" style="font-size: 0.78125vw;"></p>
                </div>
                <input id="code" type="number" style="margin-left: 4%; width: 33%; text-align: center;" required autocomplete="code">
                </div>

                <!-- Switching "REGISTER" -->
                
                <div style="margin-top: 10%; text-align: center;" class="textl-dialogCon">          
                    <p style="font-size: 0.78125vw;">Don't have an account? <a class="login-link" onclick="toggleForms()">Register</a></p>          
                </div> 
                </form>
                </div>          
                                               
        </div> 

        <!-- Login DIV (DIALOG) OVERLAY -->
        <div id="overlay" class="overlay"></div>
        <!-- END -->

        <!-- Close Dialog -->
        <div id="popDia" class="dialogCloseContainer">

            <div>
               
            <button class="dkeRPE" data-testid="xButton" aria-label="Close" onclick="location.reload();" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><defs><filter id="close_svg__a" width="136.7%" height="135.5%" x="-18.3%" y="-17.8%" filterUnits="objectBoundingBox"><feMorphology in="SourceAlpha" operator="dilate" radius="9" result="shadowSpreadOuter1"></feMorphology><feOffset dx="2" dy="12" in="shadowSpreadOuter1" result="shadowOffsetOuter1"></feOffset><feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="14"></feGaussianBlur><feColorMatrix in="shadowBlurOuter1" result="shadowMatrixOuter1" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0"></feColorMatrix><feMerge><feMergeNode in="shadowMatrixOuter1"></feMergeNode><feMergeNode in="SourceGraphic"></feMergeNode></feMerge></filter></defs><g fill-rule="evenodd" filter="url(#close_svg__a)" transform="translate(-421 -24)"><path d="m439.77 28 1.23 1.23-6.77 6.77 6.77 6.77-1.23 1.23-6.77-6.77-6.77 6.77-1.23-1.23 6.769-6.77L425 29.23l1.23-1.23 6.77 6.769L439.77 28z"></path></g></svg></button>

            </div>

        </div>
        <!-- END -->

        <div id="overlay01" class="overlay01"></div>
        <script src="{{ asset('js/script.js') }}"></script>

        
  
                <!-- Register DIV -->      
                <div id="registerView" class="containerr">
                  

                    <div class="title">Register</div>
                    <div class="content">
                    <form action="sql/submit.php" method="POST">

                <div class="user-details">
                <div class="input-box">

                    <span class="details">Full Name</span>
                    <input type="name" name="fullName" placeholder="Enter your name" required>
                    
                </div>

                <div class="input-box">
                    <span class="details">Username</span>
                    <input style="width: 97%;" type="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="input-box">

                    <span class="details">Email</span>
                    <input type="email" name="email" placeholder="Enter your email" required>

                </div>
                <div class="input-box">

                    <span class="details">Phone Number</span>
                    <input style="width: 97%;" type="text" name="phoneNumber" placeholder="Enter your number" required>

                    </div>
                <div class="input-box">

                    <span class="details">Password</span>
                    <input type="password" name="password" placeholder="Enter your password" required>

                </div>
                <div class="input-box">

                    <span class="details">Confirm Password</span>
                    <input style="width: 97%;" type="password" name="conpassword" placeholder="Confirmed your password" required>

                </div>
                </div>


                <div class="gender-details">
                <input type="radio" name="gender" value="Male" id="dot-1">
                <input type="radio" name="gender" value="Female" id="dot-2">
                <input type="radio" name="gender" value="Prefer not to say" id="dot-3">
                    <span class="gender-title">Gender</span>
                <div class="category">
                <label for="dot-1">

                    <span class="dot one"></span>
                    <span class="gender">Male</span>

                </label>
                <label for="dot-2">

                    <span class="dot two"></span>
                    <span class="gender">Female</span>

                </label>
                <label for="dot-3">

                    <span class="dot three"></span>
                    <span class="gender">Prefer not to say</span>

                </label>
                </div>
                </div>
                <div class="button">

                    <input type="submit" value="Register">

                </div>
                </form>
                </div>

                <!-- Switching "Login" -->

                <div class="textl-dialogCon">          
                    <p style="font-size: 0.78125vw; text-align: right; margin-top: -20px;">Already have an account? <a class="login-link" onclick="toggleForms()">Login</a></p>          
                </div> 

                </div>
                <!-- END -->
                
                <div id="overlay02" class="overlay02"></div>
                
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
    

            <div class="alert01">
                <p> Incorrect code. Please try again. </p>
            </div>

            <!-- ALERT 02 (USER REGISTRATION SUCCESS) -->

            @if (request()->query('status') == 'success')
                <div class="alert02 show01">
                    <p>New record created successfully.</p>
                </div>
                <script>
                    redirection();
                </script>
            @else
            @endif

            <!-- ALERT 03 (USER ADDRESS PASSED) -->
            @if (request()->query('status_address') == 'success_1')
            <div class="alert03 show02">               
                <p> Saved successfully. </p>           
            </div>
            <script>
                logoutRedirection();
            </script>
            @endif

            <!-- ALERT 04 (USER ADDRESS PASSED) -->
            @if (request()->query('logout_success') == 'true')
            <div class="alert04">               
                <p> Apologies, the website is currently under development. Please note that real-time updates may not occur immediately upon sending events to the database. Kindly log in again.</p>           
            </div>
            <script>
                redirectionFromSession();
                </script>
            @endif
                    
            <!-- ALERT 05 (USER PASSWORD NOT MATCH) -->

            @if (request()->query('call_passN_match') == 'yes')
            <div class="alert05 show05">               
                <p>Password do not match.</p>           
            </div>
            <script>
                redirection();
            </script>
            @endif

            <!-- ALERT 06 (USER PASSWORD IS WRONG) -->

            @if (request()->query('call_wrongpass') == 'yes')
            <div class="alert06 show06">               
                <p>Wrong password.</p>           
            </div>
            <script>
                redirection();
            </script>
            @endif

            <!-- ALERT 07 (USER INVALID CREDENTIALS) -->
            @if (request()->query('call_invalid') == 'yes')

            <div class="alert07 show07">               
                <p>Invalid phone number or password. Please check your credentials.</p>           
            </div>
            <script>
                redirection();
            </script>
            @endif

   


</body>
</html>

