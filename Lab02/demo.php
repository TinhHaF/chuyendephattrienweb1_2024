<?php
declare(strict_types=1);

require_once 'classA.php';
require_once 'classB.php';

class Demo {
    public function typeXReturnY(): C
    {
        echo __FUNCTION__ . "<br>";
        return new A();  // A is being returned, but can be any class like B, C
    }
    public function callFunction($X): void {
        if ($X instanceof C) {
            $X->f();
        }
        if ($X instanceof A) {
            $X->a1();
        }
        if ($X instanceof B) {
            $X->b1();
        }
    }
}
// Testing the typeXReturnY method
$demo = new Demo();
$object = $demo->typeXReturnY();  // Calling typeXReturnY method
$demo->callFunction($object);  // Using the returned object to call its functions

// Tạo đối tượng và gọi phương thức
$demo = new Demo();
$a = new A();
$b = new B();

echo "Calling method from class A:<br>";
$demo->callFunction($a);

echo "<br>Calling method from class B:<br>";
$demo->callFunction($b);

