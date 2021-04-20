<?php

//pulling from the webpage
// $name = $_REQUEST[ "name" ];
// $email = $_REQUEST[ "email" ];
// $contact = $_REQUEST[ "contact" ];
$stature = $_REQUEST[ "stature" ];
$product = $_REQUEST[ "product" ];
$decision_maker = $_REQUEST[ "decision_maker" ];
$decision_maker_num = $_REQUEST[ "decision_maker_num" ];
$revamp_marketing = $_REQUEST[ "revamp_marketing" ];
$convice_superiors = $_REQUEST[ "convice_superiors" ];
$product_age = $_REQUEST[ "product_age" ];
$annual_revenue_enterprise = $_REQUEST[ "annual_revenue_enterprise" ];
$annual_revenue_startup = $_REQUEST[ "annual_revenue_startup" ];
$funded = $_REQUEST[ "funded" ];
$biggest_problem = $_REQUEST[ "biggest_problem" ];
$biggest_problem_other = $_REQUEST[ "biggest_problem_other" ];
$other_problem_1 = $_REQUEST[ "other_problem_1" ];
$other_problem_2 = $_REQUEST[ "other_problem_2" ];
$other_problem_3 = $_REQUEST[ "other_problem_3" ];
$other_problem_4 = $_REQUEST[ "other_problem_4" ];
$other_problem_5 = $_REQUEST[ "other_problem_5" ];
$other_problem_0 = $_REQUEST[ "other_problem_0" ];
$other_problem_1_val = $_REQUEST[ "other_problem_1_val" ];
$other_problem_2_val = $_REQUEST[ "other_problem_2_val" ];
$other_problem_3_val = $_REQUEST[ "other_problem_3_val" ];
$other_problem_4_val = $_REQUEST[ "other_problem_4_val" ];
$other_problem_5_val = $_REQUEST[ "other_problem_5_val" ];
$other_problem_0_val = $_REQUEST[ "other_problem_0_val" ];
$other_problem_other = $_REQUEST[ "other_problem_other" ];
$full_name = $_REQUEST[ "full_name" ];
$phone_num = $_REQUEST[ "phone_num" ];
$email_id = $_REQUEST[ "email_id" ];
$company = $_REQUEST[ "company" ];
$find_us = $_REQUEST[ "find_us" ];

/*$message = <<<EOT
name: $name
<br>
email: $email
<br>
contact: $contact
<br>
EOT;*/

$message = <<<EOT
	<h1>$full_name,</h1>
	<h2>from $company has made an Enquiry.</h2>
EOT;

if ( $stature == "enterprise-head" ){
$message .= <<<EOT
	<h3>Product / Service</h3>
		<blockquote>
			$product
		</blockquote>
		<strong>Product Age : </strong>$product_age <br>
	<strong>Annual Revenue : </strong>$annual_revenue_enterprise <br>
	<br>
	<h4>$full_name Owns a Small or Medium Enterprise</h4>
	<strong>Is a ky decision maker : </strong>$decision_maker <br>
	<strong>Other key decision makers : </strong>$decision_maker_num <br>
EOT;
} else if ( $stature == "enterprise-manager" ){
$message .= <<<EOT
	<h3>Product / Service</h3>
		<blockquote>
			$product
		</blockquote>
		<strong>Product Age : </strong>$product_age <br>
	<strong>Annual Revenue : </strong>$annual_revenue_enterprise <br>
	<br>
	<h4>$full_name Heads brand &amp; marketing at an SME</h4>
	<strong>Revamp exisiting marketing efforts : </strong>$revamp_marketing <br>
	<strong>Need help to convince your superiors : </strong>$convice_superiors <br>
EOT;
} else if ( $stature == "startup-head" ) {
$message .= <<<EOT
	<h3>Product / Service</h3>
		<blockquote>
			$product
		</blockquote>
		<strong>Product Age : </strong>$product_age <br>
	<strong>Targetted Annual Revenue : </strong>$annual_revenue_startup <br>
	<strong>Funded : </strong>$funded <br>
	<br>
	<h4>$full_name Founder of a Startup</h4>
	<strong>Is a ky decision maker : </strong>$decision_maker <br>
	<strong>Other key decision makers : </strong>$decision_maker_num <br>
EOT;
} else if ( $stature == "startup-manager" ) {
$message .= <<<EOT
	<h3>Product / Service</h3>
		<blockquote>
			$product
		</blockquote>
		<strong>Product Age : </strong>$product_age <br>
	<strong>Targetted Annual Revenue : </strong>$annual_revenue_startup <br>
	<strong>Funded : </strong>$funded <br>
	<br>
	<h4>$full_name Works for a Startup</h4>
	<strong>Revamp exisiting marketing efforts : </strong>$revamp_marketing <br>
	<strong>Need help to convince your superiors : </strong>$convice_superiors <br>
EOT;
}

$message .= "<br><br>";

$message .= "<strong>Biggest Problem : </strong>" . $biggest_problem . ", " . $biggest_problem_other . "<br>";

$message .= "<strong>Other Problems : </strong>";


if ( $other_problem_1 == "true" ) {
	$message .= $other_problem_1_val;
}

if ( $other_problem_2 == "true" ) {
	$message .= ", " . $other_problem_2_val;
}

if ( $other_problem_3 == "true" ) {
	$message .= ", " . $other_problem_3_val;
}

if ( $other_problem_4 == "true" ) {
	$message .= ", " . $other_problem_4_val;
}

if ( $other_problem_5 == "true" ) {
	$message .= ", " . $other_problem_5_val;
}

if ( $other_problem_0 == "true" ) {
	$message .= ", " . $other_problem_other;
}

$message .= "<br><br>";

$message .= "<strong>Where did you find us : </strong>" . $find_us ;


$message .= <<<EOT
	<h3>Contact</h3>
	<blockquote>
		Email : $email_id <br>
		Phone : $phone_num
	</blockquote>
	<br>
EOT;

require "contact-form-emailer.php";

// $response[ "message" ] = $message;

