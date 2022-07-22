<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );


function databasesheets(){
	$email="";
	if (isset($_GET['email']) && !empty($_GET['email'])) {
		 $email= $_GET['email'];
		//  echo $email;

		

		 $options = array(
			'http' => array(
			  'method'  => 'GET'
			)
		  );
		  
		  $results = json_decode(
			file_get_contents("https://sheetdb.io/api/v1/408sl8wxh4h03/search_or?email=$email", false, stream_context_create($options))
		  );

		var_dump(count($results));

		// echo $results[0] -> prenom."<br>";
		// echo $results[0] -> nom."<br>";
		// echo $results[0] -> email."<br>";
		// echo $results[0] -> cours_restant."<br>";

	}else{
		echo "email invalid";
	}

    }

add_shortcode('shortcodepage', 'databasesheets');
?>