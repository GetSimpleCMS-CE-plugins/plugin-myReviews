<?php

# get correct id for plugin
$thisfile = basename(__FILE__, ".php");

# register plugin
register_plugin(
	$thisfile, //Plugin id
	'myReviews', 	//Plugin name
	'1.0', 		//Plugin version
	'GetSimple CE',  //Plugin author
	'https://www.getsimple-ce.ovh/', //author website
	'Display reviews from different platforms, no API is needed. (based on sqlite3)', //Plugin description
	'reviews', //page type - on which admin tab to display
	'myreviewsAdmin'  //main function (administration)
);

# activate filter 

# add a link in the admin tab 'theme'
add_action('pages-sidebar', 'createSideMenu', array($thisfile, 'My Reviews <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle" width="1.2em" height="1.2em" viewBox="0 0 16 16"><rect width="16" height="16" fill="none"/><path fill="#CF3805" d="M10 2.75A1.75 1.75 0 0 0 9.832 2a1.75 1.75 0 0 0-3.315.995V3a1.75 1.75 0 0 0 2.405 1.366a7.2 7.2 0 0 1-.332 1.565c-.284.822-.737 1.509-1.444 2.215a.5.5 0 1 0 .708.708c.793-.794 1.34-1.607 1.681-2.597c.318-.922.449-1.971.464-3.257v-.166zm4.535 3.507a8 8 0 0 0 .383-1.798q.022-.208.039-.424Q15 3.433 15 2.75a1.75 1.75 0 1 0-1.078 1.616a7.2 7.2 0 0 1-.332 1.565c-.284.822-.737 1.509-1.444 2.215a.5.5 0 0 0 .708.708A7.4 7.4 0 0 0 14 7.41a6 6 0 0 0 .535-1.154M15 7.676V9.5a2.5 2.5 0 0 1-2.5 2.5H8.688l-3.063 2.68A.98.98 0 0 1 4 13.942V12h-.5A2.5 2.5 0 0 1 1 9.5v-5A2.5 2.5 0 0 1 3.5 2h2.104a2.8 2.8 0 0 0-.093 1H3.5A1.5 1.5 0 0 0 2 4.5v5A1.5 1.5 0 0 0 3.5 11H5v2.898L8.312 11H12.5A1.5 1.5 0 0 0 14 9.5v-.407a7.7 7.7 0 0 0 1-1.417" stroke-width="0.5" stroke="#CF3805"/></svg>', 'list'));
add_action('reviews-sidebar', 'createSideMenu', array($thisfile, 'Add New Review', 'addnewreview'));
add_action('reviews-sidebar', 'createSideMenu', array($thisfile, 'How To Use?', 'howuse'));
# functions

function myreviewsAdmin()
{
	global $SITEURL;
	echo '<link rel="stylesheet" href="' . $SITEURL . 'plugins/myReviews/css/w3.css">
	<link rel="stylesheet" href="' . $SITEURL . 'plugins/myReviews/css/w3-custom.css">';
	include(GSPLUGINPATH . 'myReviews/class.myReviews.php');

	$reviewOP = new ReviewsOperation();
	$reviewOP->makeDb();

	if (isset($_GET['list'])) {

		include(GSPLUGINPATH . 'myReviews/list.php');

		if (isset($_GET['delete'])) {
			$reviewOP->delete();
		}

	}

	if (isset($_GET['howuse'])) {

		include(GSPLUGINPATH . 'myReviews/howuse.php');
	}

	if (isset($_GET['addnewreview']) || isset($_GET['edit'])) {

		include(GSPLUGINPATH . 'myReviews/edit.php');
		if (isset($_POST['create'])) {
			if (!isset($_GET['edit'])) {
				$reviewOP->createNew();
			} else {
				$reviewOP->edit($_GET['edit']);
			}
		}

	}
	

	echo '<p class="paypal" style="background:#fafafa;border:solid 1px #ddd;padding:10px;margin-top:50px;display:block;"><a href="https://getsimple-ce.ovh/donate" target="_blank" class="donateButton">Buy Us A Coffee <svg xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-opacity="0" d="M17 14v4c0 1.66 -1.34 3 -3 3h-6c-1.66 0 -3 -1.34 -3 -3v-4Z"><animate fill="freeze" attributeName="fill-opacity" begin="0.8s" dur="0.5s" values="0;1"></animate></path><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="48" stroke-dashoffset="48" d="M17 9v9c0 1.66 -1.34 3 -3 3h-6c-1.66 0 -3 -1.34 -3 -3v-9Z"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="48;0"></animate></path><path stroke-dasharray="14" stroke-dashoffset="14" d="M17 9h3c0.55 0 1 0.45 1 1v3c0 0.55 -0.45 1 -1 1h-3"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.2s" values="14;0"></animate></path><mask id="lineMdCoffeeHalfEmptyFilledLoop0"><path stroke="#fff" d="M8 0c0 2-2 2-2 4s2 2 2 4-2 2-2 4 2 2 2 4M12 0c0 2-2 2-2 4s2 2 2 4-2 2-2 4 2 2 2 4M16 0c0 2-2 2-2 4s2 2 2 4-2 2-2 4 2 2 2 4"><animateMotion calcMode="linear" dur="3s" path="M0 0v-8" repeatCount="indefinite"></animateMotion></path></mask><rect width="24" height="0" y="7" fill="currentColor" mask="url(#lineMdCoffeeHalfEmptyFilledLoop0)"><animate fill="freeze" attributeName="y" begin="0.8s" dur="0.6s" values="7;2"></animate><animate fill="freeze" attributeName="height" begin="0.8s" dur="0.6s" values="0;5"></animate></rect></g></svg></a></p>
';
}


function myreviews($platform = '', $count = 0)
{

	global $SITEURL;

	echo '<link href="' . $SITEURL . 'plugins/myReviews/css/style.css" rel="stylesheet">';

	$db = new SQLite3(filename: GSDATAOTHERPATH . 'reviews.db');

	$query = "SELECT * FROM reviews ORDER BY RANDOM()";


	if ($count !== 0) {
		$query = "SELECT * FROM reviews ORDER BY RANDOM() LIMIT " . $count . "";
	}

	if ($platform !== '') {
		$query = "SELECT * FROM reviews WHERE platform = '" . $platform . "' ORDER BY RANDOM() ";
	}

	if ($platform !== '' && $count !== 0) {
		$query = "SELECT * FROM reviews WHERE platform = '" . $platform . "' ORDER BY RANDOM() LIMIT " . $count . "";
	}

	if ($platform == 'mixed' && $count !== 0) {
		$query = "SELECT * FROM reviews WHERE platform = '" . $platform . "' ORDER BY RANDOM() LIMIT " . $count . "";
	}



	$result = $db->query($query);


	echo '<div class="opinion-grid">';

	while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
		if (!empty($row['image']) && $row['image'] !== '') {
			$imageurl = $row['image'];
		} else {
			$imageurl = $SITEURL . 'plugins/myReviews/images/placeholder.png';
		}

		echo '
    <div class="opinion ' . $row['platform'] . '-opinion">
        <div class="opinion-data">
            <img src="' . $imageurl . '" class="opinion-photo" alt="User">
            <div>
                <b class="opinion-name">' . $row['name'] . '</b> <br>
                <small class="opinion-date">' . str_replace('-', '.', $row['date_added']) . '</small>
            </div>
        </div>
        <img src="' . $SITEURL . 'plugins/myReviews/images/' . $row['platform'] . '-logo.png" class="opinion-platform" alt="Logo">
        <img src="' . $SITEURL . 'plugins/myReviews/images/' . $row['platform'] . '-star-' . $row['rating'] . '.png" class="opinion-rating" alt="Stars">
        <p class="opinion-comments">' . $row['comments'] . '</p>
    </div>';
	}

	echo '</div>';

}

?>