<?php

include_once 'config.php';

if (isset($_GET['api'])) {
    switch (strtolower($_GET['api'])) {

        case 'info':
            include_once 'API\API_info.php';
            break;

        case 'forminput':
            include_once 'API\API_FormInput.php';
            break;

        default:
            echo 'api not found';
            break;
    }
} else if (isset($_GET['form'])) {

    include_once 'FORM_TEMPLATE\HEADER.php';

    switch (strtolower($_GET['form'])) {
        case 'info':
            include_once 'FORM\FORM_Info.php';
            break;
        case 'input':
            include_once 'FORM\FORM_FormInput.php';
            break;
        default:
            include_once 'FORM\FORM_FormInput.php';
            break;
    }
    include_once 'FORM_TEMPLATE\FOOTER.php';
}
else
{
    include_once 'FORM_TEMPLATE\HEADER.php';
    include_once 'FORM\FORM_FormInput.php';
    include_once 'FORM_TEMPLATE\FOOTER.php';
}