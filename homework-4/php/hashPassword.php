<?php
function hashPassword($s)
{
    return password_hash($s, PASSWORD_BCRYPT, ['salt' => '@KF#MRO5VLfCJx?{G54#Mqk{tr9']);
}