<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="icon" href="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=">
		<?php echo Theme::metaTags( 'title' ); ?>
		<?php echo Theme::metaTags( 'description' ); ?>
		<?php if ( ! isset( $_GET['textonly'] ) ): ?>
		<style>
			<?php include('css/style.css'); ?>
		</style>
		<?php endif; ?>
		<?php Theme::plugins( 'siteHead' ) ?>
	</head>
	<body>
		<div class="container<?php echo ($page->template())?? ''; ?>">
			<?php
			$pages->sortByPosition(true);
			if ( $WHERE_AM_I === 'home' ) {
				$posts = array_reverse($pages->getList(1,-1,1,0));
				$page = new Page($posts[0]);
			} ?>
			<header class="mb2">
				<?php
				$next_page = new Page($page->nextKey());
				$prev_page = new Page($page->previousKey());
				if ( $prev_page->key() !== false ) {
					echo "<a rel='prev' href='{$prev_page->permalink()}'>&larr;</a>";
				} else {
					echo "&times;";
				}
				echo ' / ';
				if ( $next_page->key() !== false ) {
					echo "<a rel='next' href='{$next_page->permalink()}'>&rarr;</a>";
				} else {
					echo "&times;";
				}
				?></header>
			<div class="entry mb2"><?php echo $page->content(); ?></div>
			<div class="footer">
				<a rel="canonical" href="<?php echo $site->url(); ?>"><img src="<?php echo $site->logo(); ?>" style="max-height:3rem;width:auto;"><?php echo $site->footer(); ?></a>
			</div>
		</div>
	</body>
</html>