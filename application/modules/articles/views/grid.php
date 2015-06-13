<section class="panel">
	<header class="panel-heading">
		<i class="icon-edit"></i> Articles
	</header>
	<div class="panel-body">
		<div class="adv-table editable-table">
			<div class="clearfix">
				<div class="btn-group">
					<button class="btn dropdown-toggle" data-toggle="dropdown">Bulk Action <i class="icon-angle-down"></i></button>
					<ul class="dropdown-menu">
						<li><a href="#" id="_publish">Publish</a></li>
						<li><a href="#" id="_unpublish">Unpublish</a></li>
						<li><a href="#" id="_delete">Delete</a></li>
					</ul>
				</div>
				<div class="btn-group pull-right">
					<a class="btn btn-primary" href="<?php echo site_url('articles/submit') ?>">
						Add New <i class="icon-plus-sign"></i>
					</a>                                  
				</div>
			</div>	
			<table class="table table-striped table-hover" id="grid_data">
				<thead>
					<tr>
						<th><input type="checkbox" id="check_all"></th>
						<th>Title</th>
						<th>Category</th>
						<th>Author</th>
						<th>Date</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>
</section>