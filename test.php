<?php
function setInterval()
{
    $coin=0;
    while(true)
    {
        $coin++;
        sleep(1);
    }
    return $coin;
}

echo setInterval();



    
