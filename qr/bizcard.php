<?php
$full_name = $_SERVER['PHP_SELF'];$name_array = explode('/',$full_name);$count = count($name_array);$page_name = $name_array[$count-1];
if($page_name=='index.php'){$namepage="Home";}
elseif ($page_name=='about.php') {$namepage="About";}
elseif ($page_name=='services.php') {$namepage="Services";}
elseif ($page_name=='testimonials.php') {$namepage="Testimonials";}
elseif ($page_name=='gallery.php') {$namepage="Gallery";}
elseif ($page_name=='thank-you.php') {$namepage="Thank You";}
elseif ($page_name=='404.php') {$namepage="Not Found";}
elseif ($page_name=='contact.php') {$namepage="Contact Us";}
//Info
	$MAVEN="http://www.gomavenhub.com/";
	$Company="Carlos Gomez Masonry";
	$Domain='www.carlosgomezmasonry.com';//No dejar pleca al final del dominio
	$Address='Amarillo, TX 79110';
	//Para SEO
		$Locality='Locality';
		$Region='Region';
		$StreetAddress='StreetAddress';

	$PhoneName="Spanish: ";
	$Phone='(806) 231-9641';
	$PhoneConvert = str_replace(str_split('(-)/:*?"<>|\t\n\r\O\f\i\c\e '), '', $Phone);
	$PhoneRef = "tel:".$PhoneConvert;

	$Phone2Name="English: ";
	$Phone2='(806) 690-0476';
	$Phone2Convert = str_replace(str_split('(-)/:*?"<>|\t\n\r\O\f\i\c\e '), '', $Phone2);
	$Phone2Ref = "tel:".$Phone2Convert;

	$Phone3Name="English & Spanish: ";
	$Phone3='(806) 336-2814';
	$Phone3Convert = str_replace(str_split('(-)/:*?"<>|\t\n\r\O\f\i\c\e '), '', $Phone3);
	$Phone3Ref = "tel:".$Phone3Convert;

	$Mail='carlos.gomez1010@icloud.com'; $MailRef="mailto:".$Mail;
	$Services="Residential & Commercial Services";
	$Experience="20 Years of Experience";
	$Schedule="Monday to Saturday from 8:00 a.m to 6:00 p.m";

	$GoogleMap='<iframe class="map-size" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62068.41642204571!2d-101.85929223829557!3d35.15489229803635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87014543460b5c1f%3A0xdc1e921a0ff9c5a3!2sAmarillo%2C%20Texas%2079110%2C%20EE.%20UU.!5e0!3m2!1ses!2sni!4v1699480000843!5m2!1ses!2sni"  width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';

	$facebook='https://facebook.com/carlosgomezmasonry';
	$google='https://maps.app.goo.gl/ueiMyxhuXHzMJcme7';
	$youtube='https://www.youtube.com/channel/UCA5uikec8Qka-ABlnzNfO3A';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Company; ?> - Tarjeta de Presentación</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for social icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Oswald:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Roboto', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }
        .business-card {
            max-width: 500px;
            width: 100%;
            border: none;
            border-radius: 15px;
            /* Enhanced Box Shadow */
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15), 0 5px 15px rgba(0,0,0,0.1);
            overflow: hidden;
            background: #ffffff;
            transition: all 0.3s ease-in-out;
        }
        .business-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2), 0 10px 20px rgba(0,0,0,0.15);
        }
        .card-header {
            background-color: #343a40;
            color: #ffffff;
            padding: 2rem;
            text-align: center;
        }
        .card-header h1 {
            font-family: 'Oswald', sans-serif;
            font-size: 2.5rem;
            margin: 0;
            letter-spacing: 1px;
        }
        .card-header p {
            font-size: 1.1rem;
            opacity: 0.8;
            margin-top: 5px;
        }
        .card-body {
            padding: 2rem;
        }
        .contact-info .list-group-item {
            border: none;
            padding: 0.75rem 0;
            display: flex;
            align-items: center;
        }
        .contact-info .list-group-item i {
            color: #343a40;
            margin-right: 15px;
            width: 20px;
            text-align: center;
        }
        .qr-section {
            text-align: center;
            margin-top: 1.5rem;
        }
        .social-icons {
            text-align: center;
            padding: 1.5rem 0;
        }
        .social-icons a {
            color: #343a40;
            margin: 0 15px;
            font-size: 1.8rem;
            /* Hover Animation */
            transition: all 0.3s ease;
        }
        .social-icons a:hover {
            color: #007bff;
            transform: scale(1.2) rotate(5deg);
        }
        .map-container {
            position: relative;
            overflow: hidden;
            padding-top: 75%; /* 4:3 Aspect Ratio */
        }
        .map-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
        .btn-whatsapp {
            background-color: #25D366;
            color: white;
            font-weight: bold;
            border-radius: 50px;
            padding: 10px 25px;
            /* Hover Animation */
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(37, 211, 102, 0.4);
        }
        .btn-whatsapp:hover {
            background-color: #1DAA53;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(29, 170, 83, 0.5);
        }
        hr {
            margin: 2rem 0;
        }
    </style>
</head>
<body>
    <div class="business-card">
        <div class="card-header">
            <h1><?php echo $Company; ?></h1>
            <p><?php echo $Services; ?></p>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <ul class="list-group list-group-flush contact-info">
                        <li class="list-group-item">
                            <i class="fas fa-phone"></i>
                            <div><strong><?php echo $PhoneName; ?></strong> <a href="<?php echo $PhoneRef; ?>"><?php echo $Phone; ?></a></div>
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-phone"></i>
                            <div><strong><?php echo $Phone2Name; ?></strong> <a href="<?php echo $Phone2Ref; ?>"><?php echo $Phone2; ?></a></div>
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-phone-volume"></i>
                            <div><strong><?php echo $Phone3Name; ?></strong> <a href="<?php echo $Phone3Ref; ?>"><?php echo $Phone3; ?></a></div>
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-envelope"></i>
                            <a href="<?php echo $MailRef; ?>"><?php echo $Mail; ?></a>
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <?php echo $Address; ?>
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-briefcase"></i>
                            <?php echo $Experience; ?>
                        </li>
                         <li class="list-group-item">
                            <i class="fas fa-clock"></i>
                            <?php echo $Schedule; ?>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 qr-section">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://<?php echo $Domain; ?>" alt="QR Code for Website" class="img-fluid">
                    <small class="d-block mt-2">Scan for Website</small>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="https://wa.me/1<?php echo $PhoneConvert; ?>" target="_blank" class="btn btn-whatsapp">
                    <i class="fab fa-whatsapp"></i> Contact on WhatsApp
                </a>
            </div>

            <hr>

            <div class="social-icons">
                <a href="<?php echo $facebook; ?>" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="<?php echo $google; ?>" target="_blank" title="Google Maps"><i class="fab fa-google"></i></a>
                <a href="<?php echo $youtube; ?>" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="map-container">
            <?php echo $GoogleMap; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
