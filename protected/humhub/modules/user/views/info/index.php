<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 08.02.18
 * Time: 17:33
 */

?>

<section class="success-sec1">
	<div class="container">
		<div class="row">
			<div class="col-lg-11 col-lg-offset-1">
				<p class="kaushan success-sec1_title">Success stories</p>
			</div>
		</div>
		<div class="row">
            <?php var_dump($model); ?>
            <?php foreach($model as $item){ ?>
            <?php if(!empty($item->attributes['image'])){ ?>
			<div class="col-lg-4">
				<div class="success-sec1_wrap">
					<img class="sec4-img" src="/uploads/admin_files/<?php echo $item->attributes['image']; ?>">
					<div class="sec4-item">
						<p class="sec4-item_title"><?php echo $item->attributes['title']; ?></p>
						<p class="sec4-item_desc"><?php echo $item->attributes['description']; ?></p>
						<a class="sec4-item_link" href="singlestory.html">more</a>
					</div>
				</div>
			</div>
            <?php } ?>
            <?php } ?>

	</div>
</section>
