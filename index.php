<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
        <nav>
            <ul>
              <li class="active"><a href="#">About</a></li>
              <li><a href="dashboard.php">Dashboard</a></li>
              <li><a href="login.php">Login</a></li>
              <?php if($is_logged_in){ ?>
			<li class="loggedin"><?php print "Logged in as: ".$_SESSION["user_id"] ?></li>
			<li><a href="logout.php">Log Out</a></li>
			<?php } ?>
            </ul>
        </nav>
    <div id="left">
        <div id="des">
            <h1 class="redBack">Project Description:</h1>
            <div class="musturd">
                <p>
                    The goal of the project is designing and developing a website allowing sellers to manage sales data. The website consists of three main components: a Seller Dashboard, an About Page, and a Login/Registration Page.
                </p>
                <h5 class="pad">Seller Dashboard:</h5>
                <p>
                    The Seller Dashboard is the primary interface sellers use to manage sales data. The dashboard provides access to sales data, including age, location, floor plans, and other relevant metrics.
                </p>
                <h5 class="pad">About Page:</h5>
                <p>
                    The About Page is this page! It's a simple, informative page introducing the website to potential users. The page includes details about the purpose of the site, its features, and benefits. The About Page also provides (fake) contact information for users who want to reach out for support/assistance.
                </p>
                <h5 class="pad">Login/Registration Page:</h5>
                <p>
                    The Login/Registration Page is how the users access the Seller Dashboard. New users are required to register for an account before accessing the dashboard. The registration process involves collecting basic info such as username and password. Users who have already registered are able to log in using said username and password.
                </p>
            </div>
              </div>
       
      <br>
       <div id="creators" class="musturd">
           <h2 class="pad">Team Members</h2>
           <ul>
           <li>Bee Smalley</li>
           <li>Adrian Rodriguez-Cruz</li>
           <li>Chanwoo Park</li>
           </ul>

           <h2 class="pad">Project Information</h2>
           <ul>
           <li>Leader's Name: Bee Smalley</li>
           <li>Project Name: PropertyHub</li>
           <li>Github Links: 
               <ul>
               <li><a href="https://github.com/beesmalley">Bee Smalley GitHub</a></li>
               <li><a href="https://github.com/Saydfalls">Adrian Rodriguez-Cruz GitHub</a></li>
               <li><a href="https://github.com/Chanu02">Chanwoo Park GitHub</a></li>
               </ul>
           </li>
           </ul>

           <h2 class="pad">Summary of SCRUM Methodology</h2>
           <p>SCRUM was beneficial to us in terms of solving all the obstacles that we encountered throughout our project. By using an agile approach to project management, we were able to:</p>
           <ul>
           <li>Quickly identify and address issues as they arose</li>
           <li>Collaborate effectively as a team</li>
           <li>Continuously improve our processes and workflow</li>
           <li>Deliver a high-quality product on time</li>
           </ul>
           <p>We believe that SCRUM will continue to be beneficial to us in the future, as it provides a framework for managing complex projects that allows for flexibility and adaptability to changing circumstances.</p>

       </div>
       </div>
        <br>
        <div id="faq">
            <div>
                <h2 class="redBack">FAQ's:</h2>
            </div>
            <div class="musturd">
                <h3 class="keppel">What Does Our Company Do?</h3>
                <p>
                    The company provides a web-based platform that allows sellers to list their properties and provides a dashboard that displays property details in the form of "cards." The platform is designed to make it easy for sellers to manage their property listings and for buyers to search for properties based on various criteria.
                </p>
            </div>
            <br>
            <div class="musturd">
                <h3 class="keppel">What Kind of Services Do We Provide?</h3>
                <p>
                    The company provides a range of services to both sellers and buyers. For sellers, the platform provides a simple and intuitive interface for managing property listings, including the ability to add, edit, and remove listings. The platform also provides tools for managing leads and communicating with potential buyers. For buyers, the platform provides a powerful search engine that allows them to filter properties based on various criteria, such as location, floor plan, and facilities.
                </p>
            </div>
            <br>
            <div class="musturd">
                <h3 class="keppel">Why Choose Us?</h3>
                <p>
                    There are several reasons why the company stands out from its competitors. Firstly, the platform is designed to be user-friendly, with a simple and intuitive interface that makes it easy for sellers to manage their listings and for buyers to search for properties. Secondly, the platform provides a wide range of features and tools, such as lead management and communication tools, that make it easier for sellers to manage their listings and for buyers to find their dream properties. Finally, the company is committed to providing exceptional customer service and support, ensuring that users have the help and guidance they need to use the platform effectively.
                </p>
            </div>
            <br>
            <div class="musturd">
                <h3 class="keppel">What Do We Do To Attract Customers?</h3>
                <p>
                    To attract customers, the company uses a range of marketing and advertising strategies. These include search engine optimization (SEO), social media marketing, email marketing, and targeted advertising campaigns. The company also engages in content marketing, such as publishing blog posts and articles that provide helpful tips and advice to buyers and sellers. Additionally, the company works to build partnerships with real estate agents and brokers to reach a wider audience and increase its visibility in the market.
                </p>
            </div>
        </div>
    </div>
</body>
</html>