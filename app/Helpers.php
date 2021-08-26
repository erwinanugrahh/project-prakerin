<?php

if(!function_exists('teacher')){
    function teacher()
    {
        return auth()->user()->teacher;
    }
}

if(!function_exists('student')){
    function student()
    {
        return auth()->user()->student;
    }
}
