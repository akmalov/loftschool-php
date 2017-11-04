<?php
function hashPassword($s)
{
    return password_hash($s, PASSWORD_DEFAULT);
}