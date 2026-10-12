<?php

passthru(PHP_BINARY . ' -S localhost:8000 -t public public/router.php');
