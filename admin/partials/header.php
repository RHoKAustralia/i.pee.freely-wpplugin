<div id="ipf-header">
  <h1>i.pee.freely Locations Admin</h1>
  <ul>
    <li<?php if ($page == "home") { ?> class="selected"<?php } ?>><a href="<?php echo admin_url('admin.php?page=rhok2015-main'); ?>">Index</a></li>
    <li<?php if ($page == "add") { ?> class="selected"<?php } ?>><a href="<?php echo admin_url('admin.php?page=rhok2015-add'); ?>">Add New</a></li>
    <?php if ($page == "edit") { ?>
      <li class="selected"><a href="#">Edit Location</a></li>
    <?php }?>
    <?php if ($page == "delete") { ?>
      <li class="selected">><a href="#">Delete Location</a></li>
    <?php }?>
  </ul>
</div>

<div id="messages"></div>
