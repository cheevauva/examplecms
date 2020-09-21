<?php

return function ($metadata) {
    echo current($metadata['views'])->getContent();
};
