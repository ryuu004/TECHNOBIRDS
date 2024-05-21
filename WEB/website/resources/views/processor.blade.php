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
    <link rel="stylesheet" href="{{url('css/processorstyle.css')}}">

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
            <img style="<?php echo $sstyle; ?> " class="cart-icon" src="Icons/Cart.png" alt="Cart Icon">
        </ul> 
    </div>
</nav>


    <div class="parent">
        <div class="left-nav">
            <div class="go-back">
                <div class="title" id="title1"><a href="shopnow.html" style="text-decoration: none; color:#333"><p>BUY NOW</p></a></div>
                <div class="title"><p>&gt</p></div>
                <div class="title" style="color: #696969;"><p>PROCESSOR</p></div>
            </div>
            <div class="checklist-container">
                <div class="brand-container">
                    <div class="brand-title">
                        Brand
                    </div>
                    <div class="brand">
                        <input type="checkbox" id="checkbox" name="checkbox">
                        <p>Intel</p>
                    </div>
                    <div class="brand">
                        <input type="checkbox" id="checkbox" name="checkbox">
                        <p>AMD</p>  
                    </div>
                </div>
                <div class="Price-container">
                    <div class="brand-title">
                        Price
                    </div>
                    <div class="input-container">                    
                        <div class="price">
                        <input type="text" id="text" name="text" placeholder="Min">
                         </div>
                        <div class="price">&ndash;</div>
                        <div class="price">
                        <input type="text" id="text" name="text" placeholder="Max">
                        </div>
                    </div>
                </div>
                <div class="rating-container">
                    <div class="brand-title">
                        Rating
                    </div>
                    <div class="star-container">
                        <div class="star">
                            <input type="checkbox" id="checkbox" name="checkbox">
                            <img src="Stars/5star.jpg" alt="fivestar">
                        </div>
                        <div class="star">
                            <input type="checkbox" id="checkbox" name="checkbox">
                            <img src="Stars/4star.jpg" alt="fourstar">
                        </div>
                        <div class="star">
                            <input type="checkbox" id="checkbox" name="checkbox">
                            <img src="Stars/3star.jpg" alt="threestar">
                        </div>
                        <div class="star">
                            <input type="checkbox" id="checkbox" name="checkbox">
                            <img src="Stars/2star.jpg" alt="twostar">
                        </div>
                        <div class="star">
                            <input type="checkbox" id="checkbox" name="checkbox">
                            <img src="Stars/1star.jpg" alt="onestar">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="product">
                <div class="img-container">
                    <img src="Foryouimage/(1) AMD Ryzen 5 5600G Cezanne 3.9GHz 6-Core AM4 Boxed Processor.jpg" alt="processor1">
                </div>
                <div class="description">
                    <h1>AMD Ryzen 5 5600G Cezanne 3.9GHz 6-Core AM4 Boxed Processor</h1>
                    <p>P1,999.00</p>
                    <button class="addtocart">Add to Cart</button>
                    <button class="buynow">Buy Now</button>
                </div>
            </div>
            <div class="product">
                <div class="img-container">
                    <img src="processors/(2) AMD Ryzen 7 5800X Socket AM4 3.8GHz Processor.jpg" alt="processor1">
                </div>
                <div class="description">
                    <h1>AMD Ryzen 7 5800G Socket AM4 3.8GHz Processor</h1>
                    <p>P1,999.00</p>
                    <button class="addtocart">Add to Cart</button>
                    <button class="buynow">Buy Now</button>
                </div>
            </div>
            <div class="product">
                <div class="img-container">
                    <img src="processors/(4) Intel Core I5-12400 Alder Lake Socket 1700 2.5GHz Processor.jpg" alt="processor1">
                </div>
                <div class="description">
                    <h1>Intel Core I5-12400 Alder Lake Socket 1700 2.5GHz Processor</h1>
                    <p>P1,999.00</p>
                    <button class="addtocart">Add to Cart</button>
                    <button class="buynow">Buy Now</button>
                </div>
            </div>
            <div class="product">
                <div class="img-container">
                    <img src="processors/(1) Intel Core i3-13100 Raptor Lake Socket LGA 1700 3.10GHz VR Ready Desktop Processor.png" alt="processor1">
                </div>
                <div class="description">
                    <h1>Intel Core i3-13100 Raptor Lake Socket LGA 1700 3.10GHz VR Ready Desktop Processor</h1>
                    <p>P1,999.00</p>
                    <button class="addtocart">Add to Cart</button>
                    <button class="buynow">Buy Now</button>
                </div>
            </div>
            <div class="product">
                <div class="img-container">
                    <img src="processors/(3) Intel Core I7-13700 Raptor Lake Socket LGA 1700 4.90GHz Processor.jpg" alt="processor1">
                </div>
                <div class="description">
                    <h1>Intel Core I7-13700 Raptor Lake Socket LGA 1700 4.90GHz Processor</h1>
                    <p>P1,999.00</p>
                    <button class="addtocart">Add to Cart</button>
                    <button class="buynow">Buy Now</button>
                </div>
            </div>
            <div class="product">
                <div class="img-container">
                    <img src="Foryouimage/(1) AMD Ryzen 5 5600G Cezanne 3.9GHz 6-Core AM4 Boxed Processor.jpg" alt="processor1">
                </div>
                <div class="description">
                    <h1>AMD Ryzen 5 5600G Cezanne 3.9GHz 6-Core AM4 Boxed Processor</h1>
                    <p>P1,999.00</p>
                    <button class="addtocart">Add to Cart</button>
                    <button class="buynow">Buy Now</button>
                </div>
            </div>
        </div>
    </div>




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

