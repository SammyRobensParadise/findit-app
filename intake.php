<?php

function testfun()
{
   echo "<h1>Your test function on button click is working</h1>";
}

if(array_key_exists('test',$_POST)){
   testfun();
}

?>