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

 $page = home;
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap" id="index">
  <?php include("header.php") ?>

  <table id="locations" class="ipf-table wp-list-table widefat fixed striped">
    <thead>
      <tr>
        <th class="col-info">Name</th>
        <th class="col-actions">Options</th>
      </tr>
    </thead>
    <tbody id="the-list">

    </tbody>
  </table>
</div>
