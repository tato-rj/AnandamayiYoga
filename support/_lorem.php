<?php

function trixLorem($length = 1)
{
	$paragraphs = ['Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et sollicitudin ac orci phasellus egestas. Tortor condimentum lacinia quis vel eros donec ac. Felis eget velit aliquet sagittis id. Leo vel orci porta non pulvinar neque. Non odio euismod lacinia at quis risus.', 'Massa massa ultricies mi quis. Suspendisse sed nisi lacus sed viverra. Et tortor at risus viverra adipiscing at in tellus integer. Integer quis auctor elit sed vulputate mi sit amet. Mi bibendum neque egestas congue quisque. Aliquam id diam maecenas ultricies mi eget mauris pharetra et.', 'Felis imperdiet proin fermentum leo vel orci porta. Lacus sed turpis tincidunt id aliquet risus feugiat in. Et ligula ullamcorper malesuada proin libero nunc consequat interdum varius.', 'Id volutpat lacus laoreet non. Ac auctor augue mauris augue neque gravida. Ornare aenean euismod elementum nisi quis eleifend quam adipiscing vitae. Neque viverra justo nec ultrices dui sapien. Lacus vestibulum sed arcu non odio euismod. Tortor at auctor urna nunc id cursus metus aliquam.', 'Enim facilisis gravida neque convallis. Ac turpis egestas maecenas pharetra convallis posuere morbi leo urna. Diam vel quam elementum pulvinar etiam non quam lacus. Sed arcu non odio euismod lacinia at quis risus sed. Eget magna fermentum iaculis eu.', 'Amet risus nullam eget felis eget. Consectetur adipiscing elit pellentesque habitant morbi tristique senectus et. Ac odio tempor orci dapibus ultrices. Quis blandit turpis cursus in hac habitasse platea. Varius quam quisque id diam vel. Enim facilisis gravida neque convallis a cras semper auctor.', 'Ornare quam viverra orci sagittis eu volutpat odio. Consequat semper viverra nam libero justo laoreet sit amet. Rutrum quisque non tellus orci. Tristique senectus et netus et malesuada fames. Gravida neque convallis a cras semper auctor neque vitae. Sit amet facilisis magna etiam tempor orci eu lobortis.', 'Sit amet consectetur adipiscing elit pellentesque habitant. Ultrices gravida dictum fusce ut placerat orci nulla. Mi sit amet mauris commodo quis imperdiet massa. Tellus pellentesque eu tincidunt tortor aliquam nulla. Enim facilisis gravida neque convallis a cras semper auctor. Amet mauris commodo quis imperdiet massa.', 'Euismod nisi porta lorem mollis aliquam ut porttitor. Sagittis orci a scelerisque purus semper eget. Felis donec et odio pellentesque diam volutpat commodo sed. Ornare massa eget egestas purus viverra. Morbi tristique senectus et netus. Urna condimentum mattis pellentesque id. In eu mi bibendum neque egestas. Ut diam quam nulla porttitor massa. In nibh mauris cursus mattis molestie a iaculis.'];

	shuffle($paragraphs);
	$text = array_slice($paragraphs, 0, $length);

	return '<div>'.implode('<br><br>', $text).'</div>';
}

function random_token($string = null)
{
	$string ?? str_random();

	return bcrypt($string);
}