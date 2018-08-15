<div data-ui-widget="news.News" data-state="collapsed" data-ui-init id="news-content-<?= $news->id; ?>" style="overflow: hidden; margin-bottom: 5px;">
    <div data-ui-markdown data-ui-show-more style="overflow: hidden;">
        <?= humhub\widgets\RichText::widget(['text' => $news->message, 'record' => $news, 'markdown' => true]) ?>
    </div>
</div>
