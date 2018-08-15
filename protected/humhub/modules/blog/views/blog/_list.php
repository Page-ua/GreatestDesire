<?php use humhub\modules\comment\widgets\Comments;
use humhub\modules\user\models\User;

foreach($articles as $article) { ?>
    <?php $user = User::findOne($article->created_by); ?>
	<div class="base-post">
		<div class="header">
			<div class="user-img"><a href="<?= $user->createUrl('/'); ?>"><img src="<?= $user->getProfileImage()->getUrl(); ?>"></a></div>
			<div class="wrap">
				<div class="name"><a href="<?= $user->createUrl('/'); ?>"><?= $user->username; ?></a></div>
				<div class="date"><?= \humhub\widgets\TimeAgo::widget(['timestamp' => $article->created_at]); ?></div>
			</div>
		</div>
		<div class="content">
			<div class="article-post">
				<div class="img-block">
					<?= \humhub\modules\file\widgets\ShowPhotoPreview::widget(['object' => $article]); ?>

				</div>
				<div class="description-block">
					<div class="title"><?= $article->title; ?></div>
					<div class="subtitle"><?= isset($category[$article->category])?$category[$article->category]:''; ?></div>
					<div class="text"><?= \humhub\widgets\RichText::widget(['text' => $article->message, 'maxLength' => 40]); ?></div>
				</div>
			</div>
		</div>
		<div class="footer">
			<?= \humhub\modules\content\widgets\BottomPanelContent::widget(['object' => $article]); ?>
		</div>

		<?= Comments::widget(['object' => $article]); ?>
		<div class="sub-context-menu">
			<div class="context-menu-btn"><span></span><span></span><span></span></div>
			<ul class="context-menu">
				<li><a href="#">Edit</a></li>
				<li><a href="#">Edit 2</a></li>
				<li><a href="#">Edit 3</a></li>
			</ul>
		</div>
	</div>
<?php } ?>