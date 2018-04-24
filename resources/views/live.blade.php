<?php
unlink(dirname(__FILE__) . "/../storage/framework/down");
header("Location: your.domain");
die;
