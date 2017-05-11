<?php
if (!empty($_SESSION["message"])) {
    echo '<div class="message">' . $_SESSION["message"] . '</div>';
    $_SESSION["message"] = "";
}
