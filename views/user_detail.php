<div class="each-user-detail-box">
	<?php
		echo 
			'
			<section class="each-user-profile">
				<div class="user-profile-img">
					<img src="./images/'.$users[0]->user_photo.'">
				</div>

				<div class="user-profile-details">
					<h2 class="hidden">Each User Profile Detail</h2>
					<h3><span class="username-detail">'.$users[0]->user_username.'</span> \'s Profile</h3>

					<div class="user-detail">
						<div class="user-info-detail">
							<p class="label"><span>Username:</span></p> '.$users[0]->user_username.'<br>
							
							<div class="user-detail-info">
								<p class="label userid-detail"><span>User ID:</span></p> '.$users[0]->id.'<br><br>
								<p class="label fullname-detail"><span>Full Name:</span></p> '.$users[0]->user_fname.' '.$users[0]->user_lname.'<br>
								<p class="label fname-detail"><span>First Name:</span></p> '.$users[0]->user_fname.'<br>
								<p class="label lname-detail"><span>Last Name:</span></p> '.$users[0]->user_lname.'<br><br>
								<p class="label role-detail"><span>Role:</span></p> '.$users[0]->roles_id.' '.$users[0]->roles_name.'<br>
								<p class="label status-detail"><span>Status:</span></p> '.$users[0]->roles_id.' '.$users[0]->roles_desc.'<br>
							</div>
						</div>
					</div>
				</div>
			</section>
			';
	?>

<br><br>

<div class="setting-buttons">
	<?php	
	echo '<a class="btn-delete" href="http://localhost:8888/MMED_3014_Robert/Assignments/Yeom_S_OTTMidterm/index.php?task=delete&id='.$users[0]->id.'">
			Delete
		</a><br>';
	// echo '<a href="http://localhost:8888/MMED_3014_Robert/Assignments/Yeom_S_OTTMidterm/views/json.php">Json</a>';
	?>