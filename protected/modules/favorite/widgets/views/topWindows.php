<?php

?>

<div class="latestList">
	<div class="list-header"><span>Latest</span></div>
	<ul>
        <?php foreach($latest as $item) { ?>
       <?= \humhub\modules\favorite\widgets\FavoriteLatest::widget(['latest' => $item]); ?>
        <?php } ?>
	</ul>
</div>
<div class="anotherFavorites">
	<ul>
		<li><a href="<?= $user->createUrl('/user/profile/favorite-photos'); ?>">Photos (<?= $counts['photo']; ?>)</a></li>
		<li><a href="<?= $user->createUrl('/user/profile/favorite-photo-albums'); ?>">Albums (<?= $counts['gallery']; ?>)</a></li>
		<li><a href="<?= $user->createUrl('/user/profile/favorite-blog'); ?>">Blog Posts (<?= $counts['blog']; ?>)</a></li>
		<li><a href="<?= $user->createUrl('/user/profile/favorite-desires'); ?>">Desires (<?= $counts['desire']; ?>)</a></li>
		<li><a href="<?= $user->createUrl('/user/profile/favorite-polls'); ?>">Polls (<?= $counts['poll']; ?>)</a></li>
	</ul>
</div>
