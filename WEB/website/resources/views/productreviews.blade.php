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
    <link rel="stylesheet" href="{{url('css/productreviews.css')}}">
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

<div class="header-container">
    <h1>PRODUCT REVIEWS</h1>
    <p>Check out our forum and find the answers you’ve been looking for.</p>
</div>
<div class="reviews-nav">
    <p id="all-post" style="color:#3ec2a7" onclick="showReviews()">All Post</p>
    <p id="my-post" onclick="showMyPosts()">My Post</p>
    <p>Categories</p>
    <button>Create New Post</button>
</div>
<div class="reviews-container" id="reviews-container">
    <div class="review">
        <div class="pfp">        
            <img src="pfp/butterfly.png" alt="ofp">
            <span>Rhyio Tahari</span>
            <div class="elipsies">⋮</div>
        </div>
        <div class="user-post">
            <h1>Mouse RGB Blinking Issue</h1>
            <p>Imagine settling in for a gaming session, your focus sharpening as you immerse yourself in the virtual world, only to be rudely interrupted by your mouse's RGB lights blinking erratically, as if they've taken on a life of their own. It's like a disco party gone wrong right on your desk!</p>
        </div>
        <div class="react">        
            <img src="pfp/like.png" alt="ofp">
            <span>Like</span>
            <img src="pfp/comment.png" alt="ofp">
            <span>Comment</span>
        </div>
        <div class="comment">
            <span>Comments</span><span class="comment-count">(0)</span>
            <div class="comment-box">
                <input type="text" name="comment" id="comment" placeholder="Write a comment...">
                <button class="send-button">Send</button>
            </div>  
            <div class="comment-container"></div>
        </div>
    </div>
    <div class="review">
        <div class="pfp">        
            <img src="pfp/download.png" alt="ofp">
            <span>Joshua Bote</span>
            <span class="elipsies">⋮</span>
        </div>
        <div class="user-post">
            <h1>CPU Bluescreen Barricade</h1>
            <p>Ever experienced the frustration of your keyboard staging a rebellion, with keys popping out and refusing to cooperate? It's like your trusty typing companion has decided to go on strike, leaving you fumbling for words and desperately trying to restore order to your digital domain.</p>
        </div>
        <div class="react">        
            <img src="pfp/like.png" alt="ofp">
            <span>Like</span>
            <img src="pfp/comment.png" alt="ofp">
            <span>Comment</span>
        </div>
        <div class="comment">
            <span>Comments</span><span class="comment-count">(0)</span>
            <div class="comment-box">
                <input type="text" name="comment" id="comment" placeholder="Write a comment...">
                <button class="send-button">Send</button>
            </div>  
            <div class="comment-container"></div>
        </div>
    </div>
    <div class="review">
        <div class="pfp">        
            <img src="pfp/ghostpfp.png" alt="ofp">
            <span>Justine Carcueva</span>
            <span class="elipsies">⋮</span>
        </div>
        <div class="user-post">
            <h1>Speaker Static Symphony</h1>
            <p>Picture yourself immersed in your favorite playlist, only to be rudely interrupted by a cacophony of crackling static emanating from your speakers. It's like a glitchy symphony that assaults your ears, turning your musical oasis into a sonic nightmare and leaving you longing for peace and quiet.</p>
        </div>
        <div class="react">        
            <img src="pfp/like.png" alt="ofp">
            <span>Like</span>
            <img src="pfp/comment.png" alt="ofp">
            <span>Comment</span>
        </div>
        <div class="comment">
            <span>Comments</span><span class="comment-count">(0)</span>
            <div class="comment-box">
                <input type="text" name="comment" id="comment" placeholder="Write a comment...">
                <button class="send-button">Send</button>
            </div>  
            <div class="comment-container"></div>
        </div>
    </div>
</div>

<div class="reviews-container" id="my-post-container" style="display: none;">
    <!-- Content for "My Post" goes here -->
    <div class="review">
        <div class="pfp">        
            <img src="pfp/ghostpfp.png" alt="pfp">
            <span>Justine Carcueva</span>
            <div class="elipsies">⋮</div>
        </div>
        <div class="user-post">
            <h1>Speaker Static Symphony</h1>
            <p>Picture yourself immersed in your favorite playlist, only to be rudely interrupted by a cacophony of crackling static emanating from your speakers. It's like a glitchy symphony that assaults your ears, turning your musical oasis into a sonic nightmare and leaving you longing for peace and quiet.</p>
        </div>
        <div class="react">        
            <img src="pfp/like.png" alt="like">
            <span>Like</span>
            <img src="pfp/comment.png" alt="comment">
            <span>Comment</span>
        </div>
        <div class="comment">
            <span>Comments</span><span class="comment-count">(0)</span>
            <div class="comment-box">
                <input type="text" name="comment" id="comment" placeholder="Write a comment...">
            </div>  
        </div>
    </div>
</div>

<div id="new-post-dialog" class="dialog" style="display: none;">
    <div class="dialog-content">
        <h2>Create New Post</h2>
        <label for="post-title">Title</label>
        <input type="text" id="post-title" name="post-title">
        <label for="post-content">Content</label>
        <textarea id="post-content" name="post-content"></textarea>
        <div class="dialog-buttons">
            <button onclick="postNewReview()">Post</button>
            <button onclick="closeDialog()">Cancel</button>
        </div>
    </div>
</div>


<div id="categories-dialog" class="dialog" style="display: none;">
    <div class="dialog-content">
        <h2>Categories</h2>
        <div class="categories-grid">
            <span>Case</span>
            <span>CPU Cooler</span>
            <span>Graphics Card</span>
            <span>Hard Disk Drive</span>
            <span>Memory</span>
            <span>Motherboard</span>
            <span>Power Supply</span>
            <span>Processors</span>
            <span>Solid State Drive</span>
        </div>
        <div class="dialog-buttons">
            <button onclick="closeCategoriesDialog()">Close</button>
        </div>
    </div>
</div>


<div class="last-content">
    <div class="underlined-text">
        <ul class="ultxtlinks">
            <li><a href="#">FAQ</a></li>
            <li><a href="#">CONTACT</a></li>
            <li><a href="#">SHOP</a></li>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.reviews-nav p:nth-child(2)').addEventListener('click', showMyPosts);
    document.querySelector('.reviews-nav p:nth-child(1)').addEventListener('click', showReviews);
    document.querySelector('.reviews-nav button').addEventListener('click', openDialog);
    document.querySelector('.reviews-nav p:nth-child(3)').addEventListener('click', showCategories);
    
    const likeButtons = document.querySelectorAll('.react img:nth-child(1)');
    likeButtons.forEach(button => {
        button.addEventListener('click', toggleLike);
    });

    const sendButtons = document.querySelectorAll('.send-button');
    sendButtons.forEach(button => {
        button.addEventListener('click', addComment);
    });
});

function toggleLike(event) {
    const likeImage = event.target;
    if (likeImage.src.includes('like.png')) {
        likeImage.src = 'pfp/liked.png';
    } else {
        likeImage.src = 'pfp/like.png';
    }
}

// Other existing functions

function showMyPosts() {
    document.getElementById('reviews-container').style.display = 'none';
    document.getElementById('my-post-container').style.display = 'block';
    document.getElementById('all-post').style.color = '';
    document.getElementById('my-post').style.color = '#3ec2a7';
}

function showReviews() {
    document.getElementById('reviews-container').style.display = 'block';
    document.getElementById('my-post-container').style.display = 'none';
    document.getElementById('all-post').style.color = '#3ec2a7';
    document.getElementById('my-post').style.color = '';
}

function openDialog() {
    document.getElementById('new-post-dialog').style.display = 'flex';
}

function closeDialog() {
    document.getElementById('new-post-dialog').style.display = 'none';
}

function postNewReview() {
    const title = document.getElementById('post-title').value;
    const content = document.getElementById('post-content').value;

    if (title && content) {
        const newPost = document.createElement('div');
        newPost.classList.add('review');
        newPost.innerHTML = `
            <div class="pfp">
                <img src="pfp/ghostpfp.png" alt="pfp">
                <span>Justine Carcueva</span>
                <div class="elipsies">⋮</div>
            </div>
            <div class="user-post">
                <h1>${title}</h1>
                <p>${content}</p>
            </div>
            <div class="react">
                <img src="pfp/like.png" alt="like" onclick="toggleLike(event)">
                <span>Like</span>
                <img src="pfp/comment.png" alt="comment">
                <span>Comment</span>
            </div>
            <div class="comment">
                <span>Comments</span><span class="comment-count">(0)</span>
                <div class="comment-box">
                    <input type="text" name="comment" id="comment" placeholder="Write a comment...">
                    <button class="send-button">Send</button>
                </div>
                <div class="comment-container"></div>
            </div>
        `;

        document.getElementById('my-post-container').appendChild(newPost);
        closeDialog();

        // Add event listener to the new send button
        newPost.querySelector('.send-button').addEventListener('click', addComment);
    } else {
        alert('Please fill in both the title and content.');
    }
}

function showCategories() {
    document.getElementById('all-post').style.color = '';
    document.getElementById('my-post').style.color = '';
    document.getElementById('categories-dialog').style.display = 'flex';
}

function closeCategoriesDialog() {
    document.getElementById('categories-dialog').style.display = 'none';
}

function addComment(event) {
    const commentBox = event.target.previousElementSibling;
    const commentText = commentBox.value.trim();

    if (commentText) {
        const newComment = document.createElement('div');
        newComment.classList.add('comment-item');
        newComment.innerHTML = `
            <img src="pfp/ghostpfp.png" alt="Profile Icon">
            <div class="comment-content">
                <span>User Name</span>
                <p>${commentText}</p>
            </div>
        `;

        const commentContainer = event.target.closest('.comment').querySelector('.comment-container');
        commentContainer.appendChild(newComment);
        commentBox.value = '';

        // Update comment count
        const commentCountSpan = event.target.closest('.comment').querySelector('.comment-count');
        let commentCount = parseInt(commentCountSpan.textContent.slice(1, -1));
        commentCount++;
        commentCountSpan.textContent = `(${commentCount})`;
    } else {
        alert('Please write a comment.');
    }
}


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

</body>
</html>

