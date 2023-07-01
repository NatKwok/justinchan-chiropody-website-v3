<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

//EMAIL============================================================================
// $name = $_POST['name'];
// $visitor_email = $_POST['email'];
// $message = $_POST['message'];

// $to = "natkwok902@gmail.com";
// $email_subject = $_POST['email_subject'];;

// $email_body = "You have received a new message from the user $name.\n" .
//     "Here is the message:\n $message";



// $headers = "From: $visitor_email \r\n";

// $headers .= "Reply-To: $visitor_email \r\n";
// $headers = "MIME-Version: 1.0" . "\r\n";
// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


// mail($to, $email_subject, $email_body, $headers);



// if (mail($to, $email_subject, $message, $headers)) {

//     echo "<script>console.log('$name')</script>";
//     echo "<script>console.log('$visitor_email')</script>";
//     echo "<script>console.log('$email_subject')</script>";
//     echo "<script>console.log('$message')</script>";
//     echo "<script>console.log('The Email was Sent')</script>";
// } else {
//     echo "<script>console.log('The Email was not Sent')</script>";
// }

//DB============================================================================
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "JC01";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {

    echo "Connected successfully";
}

//Add To DB
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    //NAME Validation===============================================================
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = input_data($_POST["name"]);

        if (!preg_match("/^[a-zA-Z ]*$/", $nameErr)) {

            $nameErr = "Only letters with no space are allowed";
        }
    }

    //EMAIL Validation===============================================================
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = input_data($_POST["email"]);

        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
            $emailErr = "Invalid email format";
        }
    }
    //EMAIL Subject Validation===============================================================

    if (empty($_POST["email_subject"])) {
        $email_subErr = "ADMIN: Subject is missing";
        $valid = false;
    } else {
        $email_sub = input_data($_POST["email_subject"]);
    }

    //EMAIL Body Validation===============================================================

    if (empty($_POST["email_body"])) {
        $email_bodyErr = "Email Body is required";
        $valid = false;
    } else {
        $email_body = input_data($_POST["email_subject"]);
    }
}

function input_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $email_sub = $_POST['email_subject'];
    $email_body = $_POST['email_body'];

    //Add
    $sql = "INSERT INTO inquiry (name,email,email_subject,email_body)
         VALUES ('$name','$email','$email_sub','$email_body');
         ";


    if (mysqli_query($conn, $sql)) {

        echo "Success";
        header('Location: index.php');
    } else {
        echo "You have errors in your form";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Justin Chan Chiropody</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.4.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Justin Chan Chiropody</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#education">Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#projects">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#signup">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">JC Chiropody</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">
                        Chiropodist, Athlete, Fitness Enthusiast
                    </h2>
                    <a class="btn btn-primary" href="#about">Learn More About Me</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="about-section text-center" id="about">

        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="text-white mb-4">About Me</h2>
                    <p class="text-white-50">
                        I am a licensed chiropodist located in Toronto and the GTA. I am
                        passionate in the podiatric medical and rehabilitation field;
                        value treatment and prevention of diseases or disorders of the
                        foot by therapeutic, palliative, orthotic and surgical means
                    </p>
                </div>
                <div class="col">
                    <img height="400" src="assets/img/jc_heroshot.png" alt="..." />
                </div>
            </div>
        </div>

    </section>


    <!-- Education-->

    <section class="education-section text-center" id="education">

        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-12">
                    <h2 class="text-white mb-4">Education</h2>
                    <p class="text-white-50">
                        My credentials started of with my undergrad, where my focus was in Kinesiology and Human Mechanics. My interest in chiropody led me to complete my Advanced Graduate Diploma where I graduated with Distinction.
                    </p>
                    <div class="row">
                        <div class="col">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="./assets/img/education/utoronto.png" class="img-fluid rounded-start" alt="..." />
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">University of Toronto</h5>
                                            <p class="card-text">September 2013 to June 2017</p>
                                            <p class="card-text"><small class="text-muted"> Bachelor of Kinesiology and Physical Education - Graduated with High Honour</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="./assets/img/education/michnerlogo.png" class="img-fluid rounded-start" alt="..." />
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">The Michener Institute for Applied Health Sciences</h5>
                                            <p class="card-text">September 2017 to April 2020</p>
                                            <p class="card-text"><small class="text-muted"> Advanced Graduate Diploma of Health Sciences in Chiropody - Graduated with Distinction</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <img class="img-fluid" src="assets/img/feet_heroshot.png" alt="..." />
    </section>

    <!-- Projects-->
    <section class="projects-section bg-light" id="projects">
        <div class="container px-4 px-lg-5">
            <!-- Featured Project Row-->
            <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                <div class="col-xl-8 col-lg-7">
                    <img class="img-fluid mb-3 mb-lg-0" src="assets/img/bg-masthead.jpg" alt="..." />
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>Shoreline</h4>
                        <p class="text-black-50 mb-0">
                            Grayscale is open source and MIT licensed. This means you can
                            use it for any project - even commercial projects! Download it,
                            customize it, and publish your website!
                        </p>
                    </div>
                </div>
            </div>
            <!-- Project One Row-->
            <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                <div class="col-lg-4">
                    <a data-bs-toggle="modal" data-bs-target="#orthomodal" class="d-block mb-4 h-100 skillcontainer skillpic">
                        <img class="img-fluid img-thumbnail" src="./assets/img/services/custom_ortho.png" alt="">
                        <div class="skilltext">
                            <p class="text-center ">Custom Orthotics</p>
                        </div>
                    </a>
                </div>
                <div class="modal fade" id="orthomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Custom Orthotics</h5>

                            </div>
                            <div class="modal-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati dignissimos blanditiis necessitatibus est, perspiciatis eaque sit mollitia similique ullam libero ipsa odit ex consequatur debitis, illum voluptatem cum accusamus in?</div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem natus labore quod porro nam cum quasi eius iste laudantium explicabo? Laborum quas sequi eveniet quam nobis aliquid, exercitationem voluptatem. Ipsa.</div>
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <section class="contact" id="contact">
                                            <h2>Schedule An Appointment for Custom Orthotics</h2>
                                            <div class="contact-form-container">
                                                <div class="contact-form">
                                                    <form method="post" name="contactform" action="">
                                                        <div class="form-group p-2">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter Name" />
                                                            <span class="error"><?php echo $nameErr; ?></span>
                                                        </div>
                                                        <div class="form-group p-2">
                                                            <label for="exampleInputEmail1">Email address</label>
                                                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                                                            <span class="error"><?php echo $nameErr; ?></span>
                                                        </div>
                                                        <div class="form-group p-2">
                                                            <label for="email_body">Message</label>
                                                            <textarea name="email_body" class="form-control" rows="5" id="comment"></textarea>
                                                            <span class="error"><?php echo $email_bodyErr; ?></span>
                                                        </div>
                                                        <div class="form-group p-2">
                                                            <input type="hidden" name="email_subject" class="form-control" rows="5" id="email_subject" value="Custom Orthotics"></input>
                                                        </div>
                                                        <input type="submit" name="add" class="btn btn-primary"></input>
                                                    </form>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <a data-bs-toggle="modal" data-bs-target="#diabeticmodal" class="d-block mb-4 h-100 skillcontainer skillpic">
                        <img class="img-fluid img-thumbnail" src="./assets/img/services/diametic.png" alt="">
                        <div class="skilltext">
                            <p class="text-center">Diabetic Foot Care</p>
                        </div>
                    </a>
                </div>
                <div class="modal fade" id="diabeticmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Diabetic Modal</h5>

                            </div>
                            <div class="modal-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-diabetic-general" type="button" role="tab" aria-controls="pills-home" aria-selected="true">General</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-diabetic-symptoms" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Symptoms</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-diabetic-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-diabetic-general" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <p> General foot care service for diabetic patients to help with general maintenance of the foot such as toenails and hard skin build up.
                                            <br />
                                            <br />
                                            Poorly controlled diabetes can lead to increased chances of foot infections (which could lead to possible blood infection and possibly amputation),
                                            loss of sensation in your feet (which increases chance of injury and infection without the person knowing due to lack of feeling) and slower healing ability due to poorer circulation/swelling.
                                            <br />
                                            <br />
                                            Diabetic foot care is a general service to help maintain people’s toenails, hard skin build and overall foot health. It is usually performed on a routine basis depending how fast that foot
                                            issue returns. For example, most patients come back every 6-8 weeks for routine nail trimming while some patients who get hard skin build up only need to come back every 3-6 months.
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="pills-diabetic-symptoms" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <ul>
                                            <li>Type I/II diabetes</li>
                                            <li>Unable to manage self foot care</li>
                                            <li>Hard to cut toenails</li>
                                            <li>Skin Building up on heels</li>
                                            <li>Foot concerns such as slight pain and numbness</li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="pills-diabetic-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <section class="contact" id="contact">
                                            <h2>Schedule An Appointment for this Issue</h2>
                                            <div class="contact-form-container">
                                                <div class="contact-form">
                                                    <form method="post" name="contactform" action="index.php">
                                                        <div class="form-group p-2">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter Name" />
                                                            <span class="error"><?php echo $nameErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <label for="exampleInputEmail1">Email address</label>
                                                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                                                            <span class="error"><?php echo $emailErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <label for="email_body">Message</label>
                                                            <textarea name="email_body" class="form-control" rows="5" id="comment"></textarea>
                                                            <span class="error"><?php echo $email_bodyErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <input type="hidden" name="email_subject" class="form-control" rows="5" id="email_subject" value="Diabetic Patient"></input>
                                                        </div>
                                                        <input type="submit" name="add" class="btn btn-primary"></input>
                                                    </form>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <a class="d-block mb-4 h-100" data-bs-toggle="modal" data-bs-target="#nailscallusmodal">
                        <img class="img-fluid img-thumbnail skillcontainer skillpic" src="./assets/img/services/heel.png" alt="">
                        <div class="skilltext">
                            <p class="text-center">Nails/Calluses</p>
                        </div>
                    </a>
                </div>

                <div class="modal fade" id="nailscallusmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nails/Callus Issues</h5>

                            </div>
                            <div class="modal-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-nailscallus-general" type="button" role="tab" aria-controls="pills-home" aria-selected="true">General</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-nailscallus-symptoms" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Symptoms</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-nailscallus-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-nailscallus-general" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <p> Calluses are hard, thickened areas of skin. These layers of thick, dead skin can cause foot pain if they develop
                                            on weight bearing areas, such as under the ball of the foot or on the heel. Excessive callus formation can lead to
                                            the breakdown of tissue underneath the hard skin, which can lead to a serious infection.
                                            <br />
                                            <br />
                                            Callus formation can lead to the breakdown of tissue underneath the hard skin, which can lead to a serious infection.
                                            An appointment with a foot specialist is highly recommended.
                                            <br />
                                            <br />
                                            It is not recommended to cut off the hard skin yourself as you can cut yourself creating the chance of an infection. Keeping your skin moisturized can alleviate some of the discomfort caused by the callus.
                                            <p />
                                    </div>
                                    <div class="tab-pane fade" id="pills-nailscallus-symptoms" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <ul>
                                            <li>Thickening of Skin</li>
                                            <li>Ill-fitting footwear</li>
                                            <li>Excessive pressure or friction</li>
                                            <li>Hard buildup of skin</li>
                                            <li>Pain when walking</li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="pills-nailscallus-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <section class="contact" id="contact">
                                            <h2>Schedule An Appointment for this Issue</h2>
                                            <div class="contact-form-container">
                                                <div class="contact-form">
                                                    <form method="post" name="contactform" action="index.php">
                                                        <div class="form-group p-2">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter Name" />
                                                            <span class="error"><?php echo $nameErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <label for="exampleInputEmail1">Email address</label>
                                                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                                                            <span class="error"><?php echo $emailErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <label for="email_body">email_body</label>
                                                            <textarea name="email_body" class="form-control" rows="5" id="comment"></textarea>
                                                            <span class="error"><?php echo $email_bodyErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <input type="hidden" name="email_subject" class="form-control" rows="5" id="email_subject" value="Nails/Callus' Inquiries"></input>
                                                        </div>
                                                        <input type="submit" name="add" class="btn btn-primary"></input>
                                                    </form>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project Two Row-->
            <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                <div class="col-lg-4">
                    <a data-bs-toggle="modal" data-bs-target="#plantarmodal" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail skillcontainer skillpic" src="./assets/img/services/stethoscope.png" alt="">
                        <div class="skilltext">
                            <p class="text-center">Plantar Fascitis</p>
                        </div>
                    </a>
                </div>
                <div class="modal fade" id="plantarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Plantar Fascitis</h5>

                            </div>
                            <div class="modal-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-plantar-general" type="button" role="tab" aria-controls="pills-home" aria-selected="true">General</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-plantar-symptoms" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Symptoms</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-plantar-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-plantar-general" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <p>Plantar fasciitis (PLAN-tur fas-e-I-tis) is one of the most common causes of heel pain. It involves inflammation of a
                                            thick band of tissue that runs across the bottom of each foot and connects the heel bone to the toes (plantar fascia).
                                            <br />
                                            <br />
                                            Plantar fasciitis causes pain that occurs in the morning. As you get up and move, the pain normally decreases, but it might return after long periods of standing or when you stand up after sitting.
                                            <br />
                                            <br />
                                            It is more common in runners and in people who are overweight.
                                        </p>

                                    </div>
                                    <div class="tab-pane fade" id="pills-plantar-symptoms" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <ul>
                                            <li>Stabbing pain at the bottom of the heel</li>
                                            <li>Pain gets worse in the morning</li>
                                            <li>Triggered by long periods of standing</li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="pills-plantar-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <section class="contact" id="contact">
                                            <h2>Schedule An Appointment for this Issue</h2>
                                            <div class="contact-form-container">
                                                <div class="contact-form">
                                                    <form method="post" name="contactform" action="index.php">
                                                        <div class="form-group p-2">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter Name" />
                                                            <span class="error"><?php echo $nameErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <label for="exampleInputEmail1">Email address</label>
                                                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                                                            <span class="error"><?php echo $emailErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <label for="email_body">Message</label>
                                                            <textarea name="email_body" class="form-control" rows="5" id="comment"></textarea>
                                                            <span class="error"><?php echo $email_bodyErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <input type="hidden" name="email_subject" class="form-control" rows="5" id="email_subject" value="Plantar Fascitis Inquiries"></input>
                                                        </div>
                                                        <input type="submit" name="add" class="btn btn-primary"></input>
                                                    </form>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <a data-bs-toggle="modal" data-bs-target="#achillesmodal" class="d-block mb-4 h-100 skillcontainer skillpic">
                        <img class="img-fluid img-thumbnail" src="./assets/img/services/surgery.png" alt="">
                        <div class="skilltext">
                            <p class="text-center">Achilles Tendinitis</p>
                        </div>
                    </a>
                </div>
                <div class="modal fade" id="achillesmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Achilles Tendinitis</h5>

                            </div>
                            <div class="modal-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-achilles-general" type="button" role="tab" aria-controls="pills-home" aria-selected="true">General</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-achilles-symptoms" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Symptoms</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-achilles-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-achilles-general" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <p>Inflammation in the tendon of the calf muscle, where it attaches to the heel bone.
                                            <br />
                                            <br />
                                            This tendon assists to raise the heel off the ground while walking, running or jumping. It may be injured by repeated stress and use.
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="pills-achilles-symptoms" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <ul>
                                            <li>Pain in Achilles tendon</li>
                                            <li>Soreness in Achilles tendon</li>
                                            <li>Stiffness in Achilles tendon</li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="pills-achilles-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <section class="contact" id="contact">
                                            <h2>Schedule An Appointment for this Issue</h2>
                                            <div class="contact-form-container">
                                                <div class="contact-form">
                                                    <form method="post" name="contactform" action="index.php">
                                                        <div class="form-group p-2">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter Name" />
                                                            <span class="error"><?php echo $nameErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <label for="exampleInputEmail1">Email address</label>
                                                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                                                            <span class="error"><?php echo $emailErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <label for="email_body">Message</label>
                                                            <textarea name="email_body" class="form-control" rows="5" id="comment"></textarea>
                                                            <span class="error"><?php echo $email_bodyErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <input type="hidden" name="email_subject" class="form-control" rows="5" id="email_subject" value="Achilles Tendon Inquiries"></input>
                                                        </div>
                                                        <input type="submit" name="add" class="btn btn-primary"></input>
                                                    </form>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <a data-bs-toggle="modal" data-bs-target="#paediatricmodal" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail skillcontainer skillpic" src="./assets/img/services/kids.png" alt="">
                        <div class="skilltext">
                            <p class="text-center">Paediatric Foot Abnormalities</p>
                        </div>
                    </a>
                </div>
                <div class="modal fade" id="paediatricmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Paediatric Flat Feet</h5>

                            </div>
                            <div class="modal-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-paed-general" type="button" role="tab" aria-controls="pills-home" aria-selected="true">General</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-paed-symptoms" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Symptoms</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-paed-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-paed-general" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <p>Medical condition in which the arch of the foot is flat, with the sole of the foot being in complete or
                                            near-complete contact with the ground.This is quite common with children, as they may develop little to no space betwen their arch and the floor.
                                            <br />
                                            <br />
                                            For children, flat feet are normal up until the age of 2 to 3 years old. It is common for these children to have flat feet due to the developmental stage of their feet.
                                            They have extra padding of fat, and they are still developing the bones in their feet.
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="pills-paed-symptoms" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <ul>
                                            <li>Pain in the arch/heel area</li>
                                            <li>Foot/ankle rolling and collapsing to the floor</li>
                                            <li>General foot/leg pain</li>
                                            <li>Out-toed (duck pose) gait</li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="pills-paed-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <section class="contact" id="contact">
                                            <h2>Schedule An Appointment for this Issue</h2>
                                            <div class="contact-form-container">
                                                <div class="contact-form">
                                                    <form method="post" name="contactform" action="index.php">
                                                        <div class="form-group p-2">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter Name" />
                                                            <span class="error"><?php echo $nameErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <label for="exampleInputEmail1">Email address</label>
                                                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                                                            <span class="error"><?php echo $emailErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <label for="email_body">Message</label>
                                                            <textarea name="email_body" class="form-control" rows="5" id="comment"></textarea>
                                                            <span class="error"><?php echo $email_bodyErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <input type="hidden" name="email_subject" class="form-control" rows="5" id="email_subject" value="Paediatric Flat Feet Inquires"></input>
                                                        </div>
                                                        <input type="submit" name="add" class="btn btn-primary"></input>
                                                    </form>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                <div class="col-lg-4">
                    <a data-bs-toggle="modal" data-bs-target="#archmodal" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail skillcontainer skillpic" src="./assets/img/services/physio.png" alt="">
                        <div class="skilltext">
                            <p class="text-center">Flat/High Arch Feet</p>
                        </div>
                    </a>
                </div>
                <div class="modal fade" id="archmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Flat/High Arch Feet</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-arch-general" type="button" role="tab" aria-controls="pills-home" aria-selected="true">General</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-arch-symptoms" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Symptoms</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-arch-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-arch-general" role="tabpanel" aria-labelledby="pills-home-tab"> Medical condition in which the arch of the foot is flat, with the sole of the foot being in complete or near-complete contact with the ground.
                                    </div>
                                    <div class="tab-pane fade" id="pills-arch-symptoms" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <ul>
                                            <li>Pain in the arch/heel area</li>
                                            <li>Foot/ankle rolling and collapsing to the floor</li>
                                            <li>General foot/leg pain</li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="pills-arch-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <section class="contact" id="contact">
                                            <h2>Schedule An Appointment for this Issue</h2>
                                            <div class="contact-form-container">
                                                <div class="contact-form">
                                                    <form method="post" name="contactform" action="index.php">
                                                        <div class="form-group p-2">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter Name" />
                                                            <span class="error"><?php echo $nameErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <label for="exampleInputEmail1">Email address</label>
                                                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                                                            <span class="error"><?php echo $emailErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <label for="email_body">Message</label>
                                                            <textarea name="email_body" class="form-control" rows="5" id="comment"></textarea>
                                                            <span class="error"><?php echo $email_bodyErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <input type="hidden" name="email_subject" class="form-control" rows="5" id="email_subject" value="Flat Feet/ Arch Issues Inquiries"></input>
                                                        </div>
                                                        <input type="submit" name="add" class="btn btn-primary"></input>
                                                    </form>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <a data-bs-toggle="modal" data-bs-target="#fungalmodal" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail skillcontainer skillpic" src="./assets/img/services/ankle_injuries.png" alt="">
                        <div class="skilltext">
                            <p class="text-center">Fungal Toenails</p>
                        </div>
                    </a>
                </div>
                <div class="modal fade" id="fungalmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Fungal Toenails</h5>

                            </div>
                            <div class="modal-body">
                                <p class="bio-text">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-fungal-general" type="button" role="tab" aria-controls="pills-home" aria-selected="true">General</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-fungal-symptoms" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Symptoms</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-fungal-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-fungal-general" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <p>A fungal infection of the skin that causes redness, itchiness and commonly occurs on the bottom of the foot or between the toes.
                                            The scientific term for it is Onychomycosis, which is a dermatophyte infection (think of mold!) of toenails
                                            <br />
                                            <br />
                                            Fungi, live and grow on keratin which is what our hair, skin and nails are made of.
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="pills-fungal-symptoms" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <ul>
                                            <li>Yellow, white, green discolouration of the nail</li>
                                            <li>Thickening and crumbling of the toenail.</li>
                                            <li>Possible cracking/fissuring of the skin</li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="pills-fungal-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <section class="contact" id="contact">
                                            <h2>Schedule An Appointment for this Issue</h2>
                                            <div class="contact-form-container">
                                                <div class="contact-form">
                                                    <form method="post" name="contactform" action="index.php">
                                                        <div class="form-group p-2">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter Name" />
                                                            <span class="error"><?php echo $nameErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <label for="exampleInputEmail1">Email address</label>
                                                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                                                            <span class="error"> <?php echo $emailErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <label for="email_body">Message</label>
                                                            <textarea name="email_body" class="form-control" rows="5" id="comment"></textarea>
                                                            <span class="error"> <?php echo $email_bodyErr; ?></span>

                                                        </div>
                                                        <div class="form-group p-2">
                                                            <input type="hidden" name="email_subject" class="form-control" rows="5" id="email_subject" value="Fungal Toenailes/ Athletes Foot Inquires"></input>
                                                        </div>
                                                        <input type="submit" name="add" class="btn btn-primary"></input>
                                                    </form>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <a data-bs-toggle="modal" data-bs-target="#archmodal" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail skillcontainer skillpic" src="./assets/img/services/physio.png" alt="">
                        <div class="skilltext">
                            <p class="text-center">Flat/High Arch Feet</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup-->
    <section class="signup-section" id="signup">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                    <h2 class="text-white mb-5">Subscribe to receive updates!</h2>
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <!-- Email address input-->
                        <div class="row input-group-newsletter">
                            <div class="col">
                                <input class="form-control" id="emailAddress" type="email" placeholder="Enter email address..." aria-label="Enter email address..." data-sb-validations="required,email" />
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary disabled" id="submitButton" type="submit">
                                    Notify Me!
                                </button>
                            </div>
                        </div>
                        <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:required">
                            An email is required.
                        </div>
                        <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:email">
                            Email is not valid.
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3 mt-2 text-white">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3 mt-2">
                                Error sending message!
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact-->
    <section class="contact-section bg-black">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2 fa-2xl"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">
                                19101 Leslie St Unit #3, Sharon, ON L0G 1V0
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2 fa-2xl"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">
                                <a href="#!">jccychiropody@hotmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2 fa-2xl"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">+1 (647) 825-3647</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="#!"><i class="fa-brands fa-twitter fa-2xl"></i></a>
                <a class="mx-2" href="#!"><i class="fa-brands fa-facebook fa-2xl"></i></a>
                <a class="mx-2" href="#!"><i class="fa-brands fa-instagram fa-2xl"></i></i></a>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">
            Copyright &copy; Nathaniel Kwok
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>