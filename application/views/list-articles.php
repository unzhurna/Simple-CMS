<section class="panel">
	<div class="panel-body profile-activity">
		<?php if($articles->num_rows() == 0) : ?>
			<h4>No Article yet</h4>
		<?php else : ?>
			<?php foreach($articles->result_array() as $article) : ?>
				<div class="activity terques">
					<span><i class="icon-file"></i> </span>
					<div class="activity-desk">
						<div class="panel">
							<div class="panel-body">
								<h4><a href="<?php echo site_url('welcome/detail_article/'.$article['id']); ?>"><?php echo $article['title']; ?></a></h4>
								<p>
									<?php echo $article['teaser']; ?><a href="<?php echo site_url('welcome/detail_article/'.$article['id']); ?>">more</a>
								</p>
								<div class="fb-share-button" data-href="http://fuf.me/cms" data-layout="button_count"></div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach ?>
		<?php endif ?>
	</div>
</section>