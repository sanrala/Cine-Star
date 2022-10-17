<?php
$imgAvatar = $_GET['name'] ?? null;


header('Location: profile.php?img=' . $imgAvatar);
