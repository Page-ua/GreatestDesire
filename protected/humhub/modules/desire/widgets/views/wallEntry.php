


<div class="article-post">
    <div class="img-block">
        <a href="<?= $desire->user->createUrl('/user/profile/desire-one', ['id' => $desire->id]); ?>">
			<?= \humhub\modules\file\widgets\ShowPhotoPreview::widget(['object' => $desire]); ?>
        </a>
    </div>
    <div class="description-block">
        <div class="title">
            <a href="<?= $desire->user->createUrl('/user/profile/desire-one', ['id' => $desire->id]); ?>">
				<?= $desire->title; ?>
            </a>
        </div>

        <ul
                class="tags">
		    <?= \humhub\modules\tags\widgets\DisplayTags::widget(['user' => $desire]); ?>

        </ul>
        <div class="text">
            <div data-ui-widget="blog.Blog" data-state="collapsed" data-ui-init id="blog-content-<?= $desire->id; ?>" style="overflow: hidden; margin-bottom: 5px;">
                <div data-ui-markdown data-ui-show-more style="overflow: hidden;">
					<?= humhub\widgets\RichText::widget(['text' => $desire->message, 'record' => $desire, 'markdown' => true]) ?>
                </div>
            </div>
        </div>
    </div>
</div>