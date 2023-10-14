<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $page_title . "|Admin|"; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.png" />
    <?php if ((!empty($this->session->flashdata('success'))) || !empty($this->session->flashdata('alert'))) {
        include_once("alert.php");
    } ?>

    <?php include 'header.php'; ?>
</head>

<body>

    <?php include 'side_nav.php'; ?>

    <div class="content-wrapper main">
        <?php include $page_name . ".php"; ?>
    </div>

    <?php if (!empty($this->session->flashdata('success'))) {
        $get_session = $this->session->flashdata('success');
        echo $hello = "<script>success('$get_session');</script>";
    }
    ?>

    <?php if (!empty($this->session->flashdata('alert'))) {
        $get_session_alert = $this->session->flashdata('alert');
        echo $hello = "<script>danger('$get_session_alert');</script>";
    }
    ?>


    <?php include 'footer.php'; ?>

</body>

</html>