<div data-ui-widget="desire.Desire" data-state="collapsed" data-ui-init id="desire-content-<?= $desire->id; ?>" style="overflow: hidden; margin-bottom: 5px;">
    <div data-ui-markdown data-ui-show-more style="overflow: hidden;">
        <?= humhub\widgets\RichText::widget(['text' => $desire->message, 'record' => $desire, 'markdown' => true]) ?>
    </div>
</div>
