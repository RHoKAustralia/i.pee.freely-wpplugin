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

 $page = delete;

 function isValid() {
   return is_numeric($_GET['id']) && $_GET['id'] > 0;
 }
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap" id="index">

  <?php include("header.php"); ?>

  <?php if ( isValid() ) {?>
    <form id="delete-location" class="ipf-form">
      <div class="ipf-message">
        <h2>Are you sure you want to delete <span id="locName"></span>?</h2>
        <p>Deleting this location is irreversable.</p>
        <button type="submit" class="button button-primary">Yes, delete this!</button>
        <a href="admin.php?page=rhok2015-main" class="button">No, return to home</a>
      </div>
    </form>
  <?php } else { ?>
    <div class="ipf-message red">
      <h2>Error</h2>
      <p>Please select a location from the homepage</p>
      <a href="admin.php?page=rhok2015-main" type="submit" class="button">Back to Homepage.</a>
    </div>
  <?php } ?>

</div>
