<?php

//phai la chu va co the co khoang trang
const REGEX_NAME = "(([\w]+?(\s))+){1,50}";

//phai la chu hoac so co do dai tu 5-100
const REGEX_USERNAME = "([\w\d]+){5,100}";

//theo chuan cua email gom 3 phan: example@gmail.com co the dung them dau . cho ky tu
const REGEX_EMAIL = "(([\w\d.]+)@(\w+){2,5}(\.(\w+).{5,50})$)";

//phai la so, chu hoac ky tu dac biet cho phep do dai toi thieu la 6 va toi da la 60
const REGEX_PASSWORD = "([\w\d@.~!&*()^#]+){6,60}";


function valid($value, $regex): bool
{
    if (!isset($value) || strlen($value) == 0) {
        return false;
    }
    return preg_match($value, $regex);
}

?>
