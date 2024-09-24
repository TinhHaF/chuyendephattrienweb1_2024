<?php

include_once('classC.php');
include_once('classA.php');
include_once('classB.php');
include_once('interfaceI.php');

class Demo
{
    //type A
    public function typeAReturnA()
    {
        echo __FUNCTION__ . "<br>";
        return new A();
    }
    public function typeAReturnB()
    {
        echo __FUNCTION__ . "<br>";
        return new B();
    }
    public function typeAReturnC()
    {
        echo __FUNCTION__ . "<br>";
        return new C();
    }
    public function typeAReturnI()
    {
        echo __FUNCTION__ . "<br>";
        return new I();
    }
    public function typeAReturnNULL()
    {
        echo __FUNCTION__ . "<br>";
        return  Null;
    }
    //TYPE B
    public function typeBReturnA()
    {
        echo __FUNCTION__ . "<br>";
        return new A();
    }
    public function typeBReturnB()
    {
        echo __FUNCTION__ . "<br>";
        return new B();
    }
    public function typeBReturnI()
    {
        echo __FUNCTION__ . "<br>";
        return new I();
    }
    public function typeBReturnC()
    {
        echo __FUNCTION__ . "<br>";
        return new C();
    }
    public function typeBReturnNULL()
    {
        echo __FUNCTION__ . "<br>";
        return  Null;
    }
    //TYPE C
    public function typeCReturnA()
    {
        echo __FUNCTION__ . "<br>";
        return new A();
    }
    public function typeCReturnI()
    {
        echo __FUNCTION__ . "<br>";
        return new I();
    }
    public function typeCReturnB()
    {
        echo __FUNCTION__ . "<br>";
        return new B();
    }
    public function typeCReturnNULL()
    {
        echo __FUNCTION__ . "<br>";
        return Null;
    }
    public function typeCReturnC()
    {
        echo __FUNCTION__ . "<br>";
        return new C();
    }
    //type i
    public function typeIReturnA()
    {
        echo __FUNCTION__ . "<br>";
        return new A();
    }
    public function typeIReturnB()
    {
        echo __FUNCTION__ . "<br>";
        return new B();
    }
    public function typeIReturnC()
    {
        echo __FUNCTION__ . "<br>";
        return new C();
    }
    public function typeIReturnNULL()
    {
        echo __FUNCTION__ . "<br>";
        return  Null;
    }
    public function typeIReturnI()
    {
        echo __FUNCTION__ . "<br>";
        return  new I();
    }


    //NULL
    public function typeNullReturnNull()
    {
        echo __FUNCTION__ . "<br>";
        return  null;
    }
    public function typeNullReturnA()
    {
        echo __FUNCTION__ . "<br>";
        return new A();
    }
    public function typeNullReturnB()
    {
        echo __FUNCTION__ . "<br>";
        return new B();
    }
    public function typeNullReturnC()
    {
        echo __FUNCTION__ . "<br>";
        return new C();
    }
    public function typeNullReturnI()
    {
        echo __FUNCTION__ . "<br>";
        return new I();
    }
}


$demo = new Demo();

///returnA

$bObject = $demo->typeAReturnA();
$bObject = $demo->typeAReturnB();
$bObject = $demo->typeAReturnC();
$bObject = $demo->typeAReturnI();
$bObject = $demo->typeAReturnNull();
echo "</br>";
///returnB

$bObject = $demo->typeBReturnA();
$bObject = $demo->typeBReturnC();
$bObject = $demo->typeBReturnI();
$bObject = $demo->typeBReturnB();
$bObject = $demo->typeBReturnNull();
echo "</br>";

///returnC

$bObject = $demo->typeCReturnB();
$bObject = $demo->typeCReturnA();
$bObject = $demo->typeCReturnI();
$bObject = $demo->typeCReturnC();
$bObject = $demo->typeCReturnNull();
echo "</br>";

///returnI

$bObject = $demo->typeIReturnB();
$bObject = $demo->typeIReturnC();
$bObject = $demo->typeIReturnI();
$bObject = $demo->typeIReturnA();
$bObject = $demo->typeIReturnNull();
echo "</br>";

///returnNull

$bObject = $demo->typeNullReturnNull();
$bObject = $demo->typeNullReturnA();
$bObject = $demo->typeNullReturnB();
$bObject = $demo->typeNullReturnC();
$bObject = $demo->typeNullReturnI();

