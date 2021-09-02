<?php

	require "../initialize.php";
	include BACKEND_LIB."db.php";
	$page_link = "index";
	$page_title = "Pick the right school for your child";
	$page_description = "Blue Diamond schools, among the best in Effurun, strives to make quality education affordable while committing to a high standard. Creche, nursery, primary and secondary facilities available.";
	$page_keywords = "schools in effurun, best schools in effurun, schools in pti road, schools along pti road, affordable schools in warri, creche in effurun";
	

	loadHeader('index');
	// loadUI('loader');
	loadUI('description');
	loadUI('tour');
	loadUI('gallery');
	loadUI('faq');
	loadUI('footer');
	loadFooter('index');
    