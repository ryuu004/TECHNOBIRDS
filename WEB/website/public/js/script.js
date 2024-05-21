    window.onload = function() {
        var randomNumber = Math.floor(Math.random() * 9999999999);
        document.getElementById('randomNumberDisplay1').innerText = '' + randomNumber;

        var loginForm = document.querySelector('form[action="sql/submit.php"]');
        var codeInput = document.getElementById('code');

        loginForm.addEventListener('submit', function(event) {
            // Prevent form submission
            event.preventDefault();

            // Get the entered code
            var enteredCode = parseInt(codeInput.value);

            // Check if entered code matches the random number
            if (enteredCode === randomNumber) {
                // If code matches, submit the form
                loginForm.submit();
            } else {
                // If code does not match, display the custom alert box
                const alertBox = document.querySelector('.alert01');
                alertBox.classList.add('show');
                alertBox.style.display = 'flex';
            
                // Hide the alert box after 5 seconds (5000 milliseconds)
                setTimeout(() => {
                    alertBox.classList.remove('show');
                    // Allow time for fade-out effect before setting display to none
                    setTimeout(() => {
                        alertBox.style.display = 'none';
                    }, 500); // Match this timeout with the transition duration
                }, 5000);
            
                // Clear the code input field
                codeInput.value = '';
            }
            
                        
        });
    };

    function openDialog() {
    var dialog = document.getElementById('dialog');
    var overlay = document.getElementById('overlay');
    


    // Ensure the element is displayed before starting the opacity transition
    dialog.style.display = 'block';
    overlay.style.display = 'block';
   


    // Use setTimeout to ensure the display change has taken effect in the DOM
    setTimeout(function() {
        dialog.classList.add('visible');
        overlay.classList.add('visible'); // Assuming you want the overlay to fade as well
        
        
    }, 10); // Small timeout

    document.body.style.overflow = 'hidden';
    }


    /* */

    function closeDialog() {
    var dialog = document.getElementById('dialog');
    var overlay = document.getElementById('overlay');

    // First, remove the visible class to start the opacity transition
    dialog.classList.remove('visible');
    overlay.classList.remove('visible');

    // Wait for the transition to finish before hiding the elements
    setTimeout(function() {
        dialog.style.display = 'none';
        overlay.style.display = 'none';
    }, 300); // Match the duration of the CSS opacity transition

    document.body.style.overflow = 'auto';
    }


    function closepopDialog() {
    var popDia = document.getElementById('popDia');
    var overlay01 = document.getElementById('overlay01');

    // First, remove the visible class to start the opacity transition
    popDia.classList.remove('visible');
    overlay01.classList.remove('visible');

    // Wait for the transition to finish before hiding the elements
    setTimeout(function() {
        popDia.style.display = 'none';
        overlay01.style.display = 'none';
    }, 300); // Match the duration of the CSS opacity transition

    document.body.style.overflow = 'auto';
    }


    function popExit() {    
    document.getElementById('popDia').style.display = 'block';
    document.getElementById('overlay01').style.display = 'block';

    const closeButton = document.querySelector('[data-testid="xButton"]');


    closeButton.addEventListener('click', function() {
    this.style.display = 'none'; 
    /* dialog.style.display = 'none'; HIDING SYNTAX*/
    closeDialog();
    closepopDialog();

    });
    }


    function hideButton(buttonElement) {
    buttonElement.style.display = 'none';
    var container = document.getElementById('dialog');
    document.getElementById('message').style.visibility = 'visible';
    document.getElementById('message1').style.visibility = 'visible';
    document.getElementById('one').style.visibility = 'visible';
    document.getElementById('two').style.visibility = 'visible';
    document.getElementById('code').style.visibility = 'visible';
    document.getElementById('random').style.visibility = 'visible';
    document.getElementById('sign').style.visibility = 'visible';
    container.classList.add('expanded'); 
    }

    function enableScrolling() {
        document.body.style.overflow = 'auto';  // Or you can use 'scroll' depending on your needs
        document.documentElement.style.overflow = 'auto';
      }
    

    function hideContent() {
        
        document.getElementById('content').style.display = 'none';
        document.getElementById('content01').style.display = 'none';
        document.getElementById('content02').style.display = 'none';
        document.getElementById('content03').style.display = 'none';
        document.getElementById('content04').style.display = 'none';
        document.getElementById('content05').style.display = 'none';
        document.getElementById('shop').style.display = 'none';
        document.getElementById('textN').style.display = 'none';
        // Reset their internal state or content if necessary
        document.getElementById('dialog').innerHTML = '';  // Clears any content inside the dialog
        document.getElementById('dialog').style.display = 'none';       
        document.getElementById('popDia').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('overlay01').style.display = 'none';
        enableScrolling();
    }

    function toggleForms() {
        var loginView = document.getElementById('dialog');
        var registerView = document.getElementById('registerView');
    
        if (loginView.style.display === 'none') {
            loginView.style.display = 'block';
            registerView.style.display = 'none';
        } else {
            loginView.style.display = 'none';
            registerView.style.display = 'block';
        }
    }

    function profileMenu() {
        var dropdown = document.getElementById('dropdown');
        
    
    
        // Ensure the element is displayed before starting the opacity transition
        dropdown.style.display = 'block';
       
    
    
        // Use setTimeout to ensure the display change has taken effect in the DOM
        setTimeout(function() {
            dropdown.classList.add('visible');                       
        }, 10); // Small timeout    
    }   

    function profileMenuOff() {
        var dropdown = document.getElementById('dropdown');
    
        // Check if the dropdown is still hovered
        var isHovered = dropdown.matches(':hover');
    
        // Remove the visible class to start the opacity transition
        dropdown.classList.remove('visible');
    
        // Wait for the transition to finish before hiding the elements
        setTimeout(function() {
            // Check if the dropdown is still hovered after the transition
            if (!isHovered) {
                // If not hovered, hide the dropdown
                dropdown.style.display = 'none';
            }
        }, 30); // Match the duration of the CSS opacity transition
    }
    
    function sessionLogout() {
        session_start();
        header('Location: /home');
        $_SESSION['loggedin'] = false;
    }


    function openProfile() {
        var dialog02 = document.getElementById('dialog02');


        var overlay = document.getElementById('overlay');
        
        // Ensure the element is displayed before starting the opacity transition
        dialog02.style.display = 'block';
        overlay.style.display = 'block';
       
    
    
        // Use setTimeout to ensure the display change has taken effect in the DOM
        setTimeout(function() {
            dialog02.classList.add('visible');
         
            overlay.classList.add('visible'); // Assuming you want the overlay to fade as well
            
            
        }, 10); // Small timeout
    
        document.body.style.overflow = 'hidden';
        }

        
        function openProfile() {
        var dialog02 = document.getElementById('dialog02');
        var dialog3 = document.getElementById('dialog3');




        var overlay = document.getElementById('overlay');
        
    
    
        // Ensure the element is displayed before starting the opacity transition
        dialog02.style.display = 'block';
        dialog3.style.display = 'block';
        overlay.style.display = 'block';
       
    
    
        // Use setTimeout to ensure the display change has taken effect in the DOM
        setTimeout(function() {
            dialog02.classList.add('visible');
            dialog03.classList.add('visible');

         
            overlay.classList.add('visible'); // Assuming you want the overlay to fade as well
            
            
        }, 10); // Small timeout
    
        document.body.style.overflow = 'hidden';
        }


       function sendAddress() {
        // Add an event listener to the image
        document.getElementById('submitButton').addEventListener('click', function() {
            // When the image is clicked, submit the form
            document.getElementById('addressForm').submit();
        });
       }

       function simageHover() {
        document.addEventListener("DOMContentLoaded", function() {
            const img = document.getElementById('submitButton');
            const originalSrc = img.src;
            const hoverSrc = 'Icons/check (1).png';

            img.addEventListener('mouseenter', function() {
                img.src = hoverSrc;
            });

            img.addEventListener('mouseleave', function() {
                img.src = originalSrc;
            });
        });
       }

       function redirection() {
        // Redirect to /home after 5 seconds
        setTimeout(function() {
            window.location.href = '/home';
        }, 3000);
       }

       function logoutRedirection() {
        var startTime = new Date().getTime(); 
        setTimeout(function() {
            var currentTime = new Date().getTime();
            var elapsedTime = currentTime - startTime;
    
            if (elapsedTime < 3000) {
                // If less than 3 seconds elapsed, redirect to /home
                window.location.href = '/home';
            } else {
                // If 3 seconds or more elapsed, redirect to /sql/logout.php with logout_success parameter
                window.location.href = '/sql/logout_Session.php';
            }
         }, 6000);
        }

        function redirectionFromSession() {          
            setTimeout(function() {
                window.location.href = '/home';
            }, 15000);
           }
           
        function redirectToHome() {
            window.location.href = '/home';
        }


        // function on cart //

        function toggleCartNavbar() {
            var cartNavbar = document.getElementById('cartNavbar');
            var body = document.querySelector('body');
            var backdropOverlay = document.querySelector('.backdrop-overlay');  
            backdropOverlay.classList.toggle('active');
            cartNavbar.classList.toggle('active');
            body.style.overflow = cartNavbar.classList.contains('active') ? 'hidden' : 'auto';
        }

        
        //backdrop overlay //

        function showDialog(element) {
            var name = element.getAttribute("data-name");
            var price = element.getAttribute("data-price");
            var discountedPrice = element.getAttribute("data-discounted-price");
            var image = element.getAttribute("data-image");

            document.getElementById("dialog-name").innerText = name;
            document.getElementById("dialog-price").innerText = price;
            document.getElementById("dialog-discounted-price").innerText = discountedPrice;
            document.getElementById("dialog-image").src = image;

            document.getElementById("dialog").style.display = "block";
            document.querySelector('.backdrop-overlay').style.display = 'block';
        }

        function closeDialog() {
            document.getElementById("dialog").style.display = "none";
            document.getElementById("addToCartDialog").style.display = "none";
            document.querySelector('.backdrop-overlay').style.display = 'none';            
        }

        function showAddToCartDialog() {
            document.getElementById("addToCartDialog").style.display = "block";
        }