<?php

if (is_page('home')) { ?>

    <link rel="stylesheet" href="<?php echo CSS . '/common.css'; ?>">
    <link rel="stylesheet" href="<?php echo CSS . '/home.css'; ?>">
    <link rel="stylesheet" href="<?php echo CSS . '/topbar.css'; ?>">
    <link rel="stylesheet" href="<?php echo CSS . '/animate.css'; ?>">

<?php
} elseif (is_page('employee')) { ?>

    <link rel="stylesheet" href="<?php echo CSS . '/common.css'; ?>">
    <link rel="stylesheet" href="<?php echo CSS . '/emp.css'; ?>">
    <link rel="stylesheet" href="<?php echo CSS . '/topbar.css'; ?>">
    <link rel="stylesheet" href="<?php echo CSS . '/animate.css'; ?>">

<?php
} elseif (is_page('enterprise')) { ?>

    <link rel="stylesheet" href="<?php echo CSS . '/common.css'; ?>">
    <link rel="stylesheet" href="<?php echo CSS . '/ent.css'; ?>">
    <link rel="stylesheet" href="<?php echo CSS . '/topbar.css'; ?>">
    <link rel="stylesheet" href="<?php echo CSS . '/animate.css'; ?>">

<?php
} elseif (is_page('userboard')) { ?>

    <link rel="stylesheet" href="<?php echo CSS . '/common.css'; ?>">
    <link rel="stylesheet" href="<?php echo CSS . '/emp.css'; ?>">
    <link rel="stylesheet" href="<?php echo CSS . '/topbar.css'; ?>">
    <link rel="stylesheet" href="<?php echo CSS . '/animate.css'; ?>">
    <link rel="stylesheet" href="<?php echo CSS . '/userboard.css'; ?>">

<?php
} elseif (is_page('parameters')) { ?>

    <link rel="stylesheet" href="<?php echo CSS . '/common.css'; ?>">
    <link rel="stylesheet" href="<?php echo CSS . '/emp.css'; ?>">
    <link rel="stylesheet" href="<?php echo CSS . '/topbar.css'; ?>">
    <link rel="stylesheet" href="<?php echo CSS . '/settings.css'; ?>">
    <link rel="stylesheet" href="<?php echo CSS . '/animate.css'; ?>">

<?php }

?>