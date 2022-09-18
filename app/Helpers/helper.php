<?php
    function cartArray(){
        $cartCollection = \Cart::getContent();
        return $cartCollection->toArray();
    }

?>