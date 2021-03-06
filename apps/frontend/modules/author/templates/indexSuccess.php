<?php use_helper('Pager') ?>

<h2>Developers</h2>

<h3>Recently Active</h3>
<ul class='recently-active'>
<?php foreach ($pager->getResults() as $user): ?>
  <li>
    <?php echo link_to($user->getUsername(), $user->getRoute()) ?>
    (<?php echo $user['Plugins']->count().($user['Plugins']->count() == 1 ? ' plugin' : ' plugins') ?>)
  </li>
<?php endforeach ?>
  <li><em><?php echo link_to('view all', '@authors_all') ?></em></li>
</ul>
<?php echo get_pager_controls($pager) ?>