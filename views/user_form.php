<div class="form">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <div class="input-box fname">
            <label for="firstname">Firstname</label>
            <input type="text" name="user_fname" placeholder="Bello! What's Your Firstname?" autocomplete="off">
        </div>

        <div class="input-box lname">
            <label for="lastname">Lastname</label>
            <input type="text" name="user_lname" placeholder="Bello! What's Your Lastname?" autocomplete="off">
        </div>

        <div class="input-box username">
            <label for="username">Username</label>
            <input type="text" name="user_username" placeholder="Bello! What Should I Call You?" autocomplete="off">
        </div>

        <div class="input-box password">
            <label for="password">Password</label>
            <input type="password" name="user_password" placeholder="Shh! What's Your Password?" autocomplete="off">
        </div>

        <div class="input-box photo">
            <label for="photo">Photo</label>
            <input type="text" name="user_photo" placeholder="Bello! Pick Your Photo!" autocomplete="off">
            <p class="photo-option">Q. Which photo can you use?<br>You can type the profile photo name like 'profile+0+number.jpg'.<br>
            <span class="yellow-text">E.g. profile01.jpg</span></p>
        </div>

        <div class="dropdown">
            <div class="input-box role">
                <label for="user_role">Select role:</label>
                <select name="user_role" id="user_role">
                    <option value="1">Unregistered</option>
                    <option value="2">Guest</option>
                    <option value="3">Admin</option>
                </select>
            </div>
        </div>
        <button  type="submit" name="submit">Submit</button>
    </form>
</div>

<div class="setting-buttons">
    <?php
        echo '<a class="btn-delete" href="http://localhost:8888/MMED_3014_Robert/Assignments/Yeom_S_OTTMidterm/index.php">
                Poopaye!
            </a>';
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['user_username'];
            $passowrd = sha1($_POST['password']);

            $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ? LIMIT 1");
            $stmt->execute(array($username, $passowrd));
            $checkuser = $smtm->rowCount();
            $user = $stmt->fetch();

            if ($checkuser > 0) {
                $_SESSION['user'] = $user['username'];
                $_SESSION['type'] = $user['type'];
                header("location: index.php");
            }
        }
	?>
</div>
