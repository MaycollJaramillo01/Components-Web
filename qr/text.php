<?php
$full_name = $_SERVER['PHP_SELF'];$name_array = explode('/',$full_name);$count = count($name_array);$page_name = $name_array[$count-1];
if($page_name=='index.php'){$namepage="Home";}
elseif ($page_name=='about.php') {$namepage="About";}
elseif ($page_name=='services.php') {$namepage="Services";}
elseif ($page_name=='reviews.php') {$namepage="Reviews";}
elseif ($page_name=='gallery.php') {$namepage="Gallery";}
elseif ($page_name=='404.php') {$namepage="Not Found";}
elseif ($page_name=='contact.php') {$namepage="Contact Us";}
//Info
	$MAVEN="http://www.gomavenhub.com/";
	$Company="A & S Tree Service";
	$Domain='www.treeservicesas.com';//No dejar pleca al final del dominio
	$Address='Wilmington, MA';
	$PhoneName="Main: ";
	$Phone='(978) 235-1012';
	$PhoneConvert = str_replace(str_split('(-)/:*?"<>|\t\n\r\O\f\i\c\e'), '', $Phone);
	$PhoneRef = "tel:".str_replace(str_split(' '), '', $PhoneConvert);

	$Phone2Name="Secondary: ";
	$Phone2='(978) 908-7012';
	$Phone2Convert = str_replace(str_split('(-)/:*?"<>|\t\n\r\O\f\i\c\e'), '', $Phone2);
	$Phone2Ref = "tel:".str_replace(str_split(' '), '', $Phone2Convert);

	$SEOConvert= str_replace(str_split(' '), '-', $PhoneConvert);
	$SEOPhone='+1'.$SEOConvert;

	$Mail='astreeservice2023@gmail.com'; $MailRef="mailto:".$Mail;	
	$Services="Residential and Commercial Services";
	$Estimates="Free Estimates Are Available";
	$Payment="Check,Cash, Zelle and cards";
	$Experience="8 Years of Experience";
	$Schedule="6:00: am to 8:00 pm - sab 7 am to 2 pm";
	$Emergency="Emergency Services (STORM REPONSE)";
	$Lic="FULLY INSURED & LICENSED";
	$Cover="We Cover 15 Miles";
	$Bilingual="English/Spanish";

	$GoogleMap='<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47016.339464582736!2d-71.21579738527353!3d42.56545833626824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e3744a767cc041%3A0xf9d1dd57bf2f94bf!2sWilmington%2C%20MA!5e0!3m2!1sen!2sus!4v1745359000263!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
// social media links
	$google='https://g.co/kgs/ghhFYAq';
	$thumbtack='https://www.thumbtack.com/ma/wilmington/tree-movers/s-tree-service/service/543270280520908815';
	$facebook='https://www.facebook.com/people/AS-Tree-service/61551411164107';
	$instagram='https://www.instagram.com/astreeservicellc?igsh=MTgydTJudzAwbmw1dA==&utm_source=qr';
	$nextdoor='https://nextdoor.com/pages/as-tree-service-llc-wilmington-ma';
//Phrases
	$Description="";	
 	$Phrase = array(
		"Rooted in Excellence, Growing Your Safety.",
		"Your Trees, Our Profession – A Perfect Match!",
		"Building Beauty, One Tree at a Time.",
		"Reliable Tree Care for Every Season.",
		"Branch Out with A & S Tree Service!",
	);

//Home  etc.
	$Home = array(
		"At A & S Tree Service, we take pride in providing reliable and professional tree care solutions for both residential and commercial properties. With over 8 years of experience, our team of skilled arborists is committed to maintaining the beauty and safety of your landscape. Whether it's tree removal, trimming, pruning, or stump grinding, we offer tailored services to meet the unique needs of every customer. Our fully insured team ensures that every job is completed safely and efficiently, giving you peace of mind.",
		"Our goal is to be your trusted partner in tree care, offering exceptional service backed by expertise and attention to detail. We serve the Methuen, MA area and beyond, always prioritizing customer satisfaction and the long-term health of your trees. From enhancing curb appeal to removing hazardous trees, A & S Tree Service is here to help with all your tree care needs. Contact us today for a free estimate and let us handle the hard work with care and precision.",
		);
	$About = array(
	"At A & S TREE SERVICE, we specialize in tree care, maintenance, and removal for both residential and commercial properties. With over 8 years of hands-on experience, we take pride in delivering safe, reliable, and high-quality service with a strong focus on customer satisfaction.",
	"Our company is fully committed to professionalism and safety—we are fully insured, giving you peace of mind throughout every job. Whether you need a hazardous tree removed, branches trimmed for better curb appeal, or a stump ground down, our team is ready to handle it efficiently and with expert care."
	);


	$Mission = "o provide safe, professional, and efficient tree care services for residential and commercial properties. With over 8 years of experience, we focus on delivering high-quality, tailored solutions that ensure customer satisfaction, backed by a fully insured and skilled team.";
	$Vision = "To become the leading tree care service provider, recognized for our expertise, commitment to safety, and environmental responsibility, while building long-lasting relationships with our clients based on trust and excellence.";
//Services
	$SN[1]="Tree Removal";
	$SD[1]="We safely remove trees of all sizes, especially those posing risks to buildings, people, or power lines. Every removal is carefully assessed and carried out with the proper tools and techniques to protect your property.";
	$SN[2]="Tree Trimming";
	$SD[2]="Trimming helps maintain your trees’ shape and keeps your yard looking clean and well-kept. It also prevents dead or overgrown branches from becoming safety hazards, promoting healthy growth and balance.";
	$SN[3]="Firewood";
	$SD[3]="We provide seasoned firewood ready for use in fireplaces, fire pits, or wood stoves. Count on us for high-quality, well-cut wood that’s clean, dry, and conveniently packed.";
	$SN[4]="Stump Grinding";
	$SD[4]="After a tree is removed, stumps can be unsightly and even hazardous. Our stump grinding service eliminates the entire stump below ground level, clearing the area for replanting or landscaping.";
	$SN[5]="Tree Pruning";
	$SD[5]="Proper pruning boosts tree health and longevity. Our expert team removes diseased, crossing, or excessive branches using the right techniques to support strong and healthy growth.";
	$SN[6]="Tree Cabling & Bracing";
	$SN[6]="Tree Cutting";
	$SD[6]="Whether for managing overgrowth or removing a dangerous tree, we offer precision tree cutting services. Our approach is clean, efficient, and designed to prevent property damage.";



//Excerpt
	if (strlen($Description) > 10){$ExDescription=substr($Description, 0,152).'...';};
	if (strlen($About[0]) > 10){$ExAbout=substr($About[0], 0,145).'...';};
	if (strlen($Home[0]) > 10){$ExHome=substr($Home[0], 0,87).'...';};

	if (strlen($SD[1]) > 10){$ExSD[1]=substr($SD[1], 0,146).'...';};
	if (strlen($SD[2]) > 10){$ExSD[2]=substr($SD[2], 0,146).'...';};
	if (strlen($SD[3]) > 10){$ExSD[3]=substr($SD[3], 0,148).'...';};
	if (strlen($SD[4]) > 10){$ExSD[4]=substr($SD[4], 0,120).'...';};
	if (strlen($SD[5]) > 10){$ExSD[5]=substr($SD[5], 0,153).'...';};
	if (strlen($SD[6]) > 10){$ExSD[6]=substr($SD[6], 0,153).'...';};

?>
