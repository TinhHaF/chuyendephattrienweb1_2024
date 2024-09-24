<?php
declare(strict_types=1);
require_once 'classC.php';

class A extends C {
    public function a1(): void {
        echo "This is function a1 from class A.<br>";
    }
}

