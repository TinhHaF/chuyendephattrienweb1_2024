<?php
declare(strict_types=1);
require_once 'interfaceI.php';

class C implements I {
    public function f(): void {
        echo "This is function f from class C.<br>";
    }
}

