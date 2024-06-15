<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cable Car Ticketing</title>
    <style>
        .welcome {
    text-align: center;
    font-family: Arial, sans-serif; 
    margin: top 20px; 
}

.welcome-message {
    color:rgb(160, 119, 161);
    
}
</style>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Ponyo Cablecar</h1>
        <img src="logoo.png" alt="Cable Car Logo" height="50" width="140">
    </header>
    <nav>
        <a href="homepage.php">Home</a>
        <a href="ticketpage.php">Book</a>
        <a href="viewtickets.php">View Tickets</a>
        <a href="logout.php"> Log Out</a>
        
    </form>
    </nav>
    <section class="welcome">
    <?php
    session_start();
    if(isset($_SESSION['user_name'])) {
        $welcomeMessage = "Welcome " . $_SESSION['user_name'] . " to Ponyo cablecars!! Enjoy your ride!!";
    } else {
        $welcomeMessage = "Welcome to Ponyo cablecars. Enjoy your ride."; 
    }
    ?>

<marquee behavior="scroll" direction="left"><div class="welcome-message"><?php echo $welcomeMessage; ?></div></marquee>
</section>

    <section class="hero">
        <img src="back..jpg" width="1200" height="600" alt="cablecar">
        <div class="centered"><h1>Ponyo</h1>
            <P>Book your tickets for an unforgettable experience!</P></div> 
        
    </section>
    <section class="tickets">
        <h1> Tickets price </h1>
        </section>
        <div class="container">
        
            
    
            <div class="text-container">
                
                <p>The ticket price is <B>Rs.1000</B> per person. Ticket available for Ponyo is a round trip (Two-way).<br>
                    <br>
                    <br>
                &#9733; <b>Student Discount</b> &#9733;<BR>
                Available in the counter. Kindly carry your student ID along with you for the discount.</P>
            </div>
            <div class="image-container">
                <img src="logo2.png" alt="cablecar image">
            </div>

        </div>

    <section class="conditions">
        <h1>Conditions for booking tickets</h1>
        <ul>
            <li>The above rate are inclusive of all local taxes and applicable VAT.</li>
            <li>Payment should be made in the counter. No online payment acceptable.</li>
            <li>Bargaining for the ticket price is not acceptable.</li>
            <li>Student discount is not valid from Bachelor level and above.</li>
                    </ul>
    </section>

    <div class="button"><center>
        <button class="book-button" onclick="redirectToTicketPage()">Book Tickets</button></center>
    </div>
    <script>
        function redirectToTicketPage() {
            window.location.href = "ticketpage.php";
        }
    </script>
    
    <section id="section1">
        <div class="containerr">    
        <div class="boxx">
            <a href="#section1">
                <div class="logo">
                    <img src="aalogo.png" alt="About Us Logo" width="50" height="50">
                </div>
                <h2>About Us</h2>
                <p>Embark on a breathtaking journey with Ponyo Cable car, founded on 2021. Glide above majestic landscapes and create unforgettable memories suspended in the clouds.</p>
            </a>
        </div>
        
        <div class="boxx">
            <a href="#section1">
                <div class="logo">
                    <img src="cclogo.png" alt="Contact Info Logo" width="50" height="50">
                </div>
                <h2>Contact Info</h2>
                <p><b>Email:</b><br>
                    ponyo@gmail.com<br><br> <br>
                    <b>Phone:</b><br>
                     +01-12345 <br> +01-567890</p>
            </a>
        </div>
        </div>
     </section>
    </main>
     <footer>
         &copy; 2024 Ponyo Cablecar
     </footer>
 
    
  
    
</body>
</html>