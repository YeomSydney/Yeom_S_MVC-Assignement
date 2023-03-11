<div class="each-user-panel">
	<ul>
		<?php
		for($i = 0; $i < $rows; $i++) { 
			echo 
			'
				<section class="each-user-list">
					<div class="each-user-option">
						<div class="each-user-thumbnail">
							<img src="./images/'.$users[$i]->user_photo.'">
						</div>
						
						<a class="each-user-name" href="index.php?id='.$users[$i]->id.'">
							<li>'.$users[$i]->user_username.'</li>
						</a>
					</div>
				</section>
			';
			// <li>'.$users[$i]->user_fname.' '.$users[$i]->user_lname.'</li>
		}
		?>
	</ul>
</div>
