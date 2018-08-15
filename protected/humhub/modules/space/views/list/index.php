<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 23.06.18
 * Time: 10:53
 */
?>

<div class="page-content">
	<div class="content-wrap">
		<div class="groups-page">
			<div class="groups-page-header">
				<div class="title">Groups</div>
				<div class="stat"><?= $count; ?> Groups</div><select><option>Top</option><option>All</option><option>Top top</option></select></div>
			<ul class="groups-list" id="list-object">
                <?= $this->render('_list', [
                        'spaces' => $spaces,
                        'category' => $category,
                ]); ?>

			</ul>
		</div>
	</div>
    <?= \humhub\widgets\LoadMoreButton::widget(['object' => $spaces, 'count' => $count, 'ajaxUrl' => $ajaxUrl]); ?>

</div>
