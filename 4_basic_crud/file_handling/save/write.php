<?php
    $f=fopen('one.txt','w');
    fwrite($f,"hello\n");
    fwrite($f,"hello\n");

    
    fclose($f);
    mkdir('aa');
    touch('aa/test.txt');
?>