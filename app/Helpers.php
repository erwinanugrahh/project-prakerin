<?php

if(!function_exists('teacher')){
    function teacher()
    {
        return auth()->user()->teacher;
    }
}
