<?php
$path = $_SESSION['actual-page'];
$page_name = basename($path, '.php');
$page_name = str_replace("-", " ", $page_name);
?>

<h1 class="page-header">Erasmus
    <small>
        <?php
        echo ucfirst($page_name);
        ?>
    </small>
</h1>
<ol class="breadcrumb">
    <li><a href="../index.html">Home</a>
    </li>
    <?php
    echo '<li';
    if (empty($path)) echo ' class=\'active\'>Erasmus</li>';
    else {
        echo '><a href=\'index.php\'>Erasmus</a></li>';

        echo '<li class=\'active\'>' . ucfirst($page_name) . '</li>';
    }
    ?>
</ol>