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
									<?php echo $article['content']; ?>
								</p>
								<br>
								<div class="fb-share-button" data-href="<?php echo current_url(); ?>" data-layout="button_count"></div>
								<a href="https://twitter.com/share" class="twitter-share-button" data-via="">Tweet</a>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach ?>
		<?php endif ?>
	</div>
</section>