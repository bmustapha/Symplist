<h3>Recently Added</h1>
<ul class='plugins-list'>
<?php foreach ($plugins as $plugin): ?>
  <li>
    <?php include_partial('plugin/list_item', array('plugin' => $plugin)) ?>
  </li>
<?php endforeach ?>
</ul>