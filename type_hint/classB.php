<?php
declare(strict_types=1);
require_once 'classC.php';

class B extends C {
    public function b1(): void {
        echo "This is function b1 from class B.<br>";
    }
}

