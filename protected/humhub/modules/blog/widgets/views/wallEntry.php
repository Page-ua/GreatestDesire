<div data-ui-widget="blog.Blog" data-state="collapsed" data-ui-init id="blog-content-<?= $blog->id; ?>" style="overflow: hidden; margin-bottom: 5px;">
    <div data-ui-markdown data-ui-show-more style="overflow: hidden;">
        <?= humhub\widgets\RichText::widget(['text' => $blog->message, 'record' => $blog, 'markdown' => true]) ?>
    </div>
</div>
