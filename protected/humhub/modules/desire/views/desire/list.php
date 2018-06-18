


<div class="page-content">
    <div class="content-wrap grey">
        <div class="desires-page">
            <div class="desires-page-header">
                <div class="title">Desires</div>
                <div class="stat">457 desires</div>
                <div class="map-btn"><svg class="icon icon-location"><use xlink:href="./svg/sprite/sprite.svg#location"></use></svg>view on map</div>
                <div class="map-block"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d81217.46868235002!2d30.48229395!3d50.49610355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1526995954734" width="600" height="350" frameborder="0"
                                               style="border:0" allowfullscreen></iframe></div>
            </div>
            <div class="desire-page-filter">
                <div class="filter-title">TOP reated</div><select><option>Top</option><option>All</option><option>Top top</option></select></div>
            <div class="all-desires desire-small-layout">
				<?php foreach($articles as $article) { ?>
                    <div class="desire isBigger"><a class="desire-img" href="<a href="<?= \yii\helpers\Url::toRoute(['desire/view', 'id'=>$article->id]); ?>"><?= \humhub\modules\file\widgets\ShowPhotoPreview::widget(['object' => $article, 'options' => ['width' => 240, 'height' => 240, 'index' => 0]]); ?></a>
                        <div class="info-short">
                            <div class="bottom">
                                <div class="img-block"><img src=""></div>
                                <div class="wrap">
                                    <div class="desire-top">
                                        <div class="name">Mary Lockhart</div>
                                        <div class="star-rating"><span class="starVal">3.5</span><span class="counterVal">122</span></div>
                                    </div>
                                    <div class="desire-text">
                                        <a class="text favorite" href="priv-personal-profile-desires-single.html">
                                            <!-- If disere is favorite add class favorite & add icon--><svg class="icon icon-earth_green"><use xlink:href="./svg/sprite/sprite.svg#earth_green"></use></svg><?= $article->title; ?></a>
                                        <ul
                                                class="tags">
                                            <?= \humhub\modules\tags\widgets\DisplayTags::widget(['user' => $article]); ?>

                                        </ul>
                                    </div>
                                    <div class="desire-bottom"><a class="comments" href="#"><svg class="icon icon-comment_border"><use xlink:href="./svg/sprite/sprite.svg#comment_border"></use></svg><svg class="icon icon-comments"><use xlink:href="./svg/sprite/sprite.svg#comments"></use></svg><div class="text">Comment</div><div class="tooltip-base">Leave a comment</div></a>
                                        <div
                                                class="rating">
                                            <div class="active-star-rating"></div>
                                            <div class="text">Rate</div>
                                        </div>
                                        <div class="share"><svg class="icon icon-share"><use xlink:href="./svg/sprite/sprite.svg#share"></use></svg>
                                            <div class="text">Share</div>
                                        </div>
                                        <div class="stars">
                                            <div class="follow-btn"><svg class="icon icon-star_fill"><use xlink:href="./svg/sprite/sprite.svg#star_fill"></use></svg><svg class="icon icon-star_empty"><use xlink:href="./svg/sprite/sprite.svg#star_empty"></use></svg></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

				<?php } ?>
            </div>
        </div>
    </div>
    <div class="base-btn"><a href="#">Load more</a></div>
</div>
