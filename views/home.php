<link  href="../style.css" rel="stylesheet" type="text/css">
<h1>hello</h1>
<?php

use App\core\App;

$this->title = 'home'; ?>
<div>
    <?php include_once App::$ROOT_DIR.'/views/posts/posts.php'; ?>
</div>
