<?php
declare(strict_types=1);

interface classI {
    public function f(): void;
}

class I implements classI {
    public function f(): void { 
        echo "Implementing method f()<br>";
    }
}

