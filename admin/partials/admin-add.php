<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       localhost
 * @since      1.0.0
 *
 * @package    Rhok2015
 * @subpackage Rhok2015/admin/partials
 */

 $page = add;
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap" id="index">

  <?php include("header.php") ?>

  <form id="add-location" class="ipf-form">
    <?php include("form.php"); ?>
    <div class="form-group submit-button">
      <button type="submit" class="button button-primary">Add Location</button>
   </div>
  </form>

</div>
