<?php if ($sf_user->isAuthenticated()): ?>
	<ul id='main-nav'>
		<li><?php echo link_to('Plugins', '@symfony_plugin') ?></li>	  
		<li><?php echo link_to('Categories', '@plugin_category') ?></li>	  
		<li><?php echo link_to('Authors', '@plugin_author') ?></li>	  
		<li><?php echo link_to('Accounts', '@plugin_author') ?></li>	  		
		<li><?php echo link_to('Approve Comments', '@comment_csCommentAdmin') ?></li>
		<li><?php echo link_to('Tags', '@tag') ?></li>
	</ul>	
<?php endif ?>
