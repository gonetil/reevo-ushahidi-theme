<script type="application/javascript">
$(window).load(expandFields);
</script>


<div id="content">
	<div class="content-bg">
		<!-- start reports block -->
		<div class="big-block">
			<h1 class="heading">
				<?php echo Kohana::lang('ui_main.showing_reports_from', array(date('M d, Y', $oldest_timestamp), date('M d, Y', $latest_timestamp))); ?> 
				<a href="#" class="btn-change-time ic-time"><?php echo Kohana::lang('ui_main.change_date_range'); ?></a>
			</h1>
			
			<div id="tooltip-box">
				<div class="tt-arrow"></div>
				<ul class="inline-links">
					<li>
						<a title="<?php echo Kohana::lang('ui_main.all_time'); ?>" class="btn-date-range active" id="dateRangeAll" href="#">
							<?php echo Kohana::lang('ui_main.all_time')?>
						</a>
					</li>
					<li>
						<a title="<?php echo Kohana::lang('ui_main.today'); ?>" class="btn-date-range" id="dateRangeToday" href="#">
							<?php echo Kohana::lang('ui_main.today'); ?>
						</a>
					</li>
					<li>
						<a title="<?php echo Kohana::lang('ui_main.this_week'); ?>" class="btn-date-range" id="dateRangeWeek" href="#">
							<?php echo Kohana::lang('ui_main.this_week'); ?>
						</a>
					</li>
					<li>
						<a title="<?php echo Kohana::lang('ui_main.this_month'); ?>" class="btn-date-range" id="dateRangeMonth" href="#">
							<?php echo Kohana::lang('ui_main.this_month'); ?>
						</a>
					</li>
				</ul>
				
				<p class="labeled-divider"><span><?php echo Kohana::lang('ui_main.choose_date_range'); ?>:</span></p>
				<?php echo form::open(NULL, array('method' => 'get')); ?>
					<table class="report-date-filter">
						<tr>
							<td><strong>
								<?php echo Kohana::lang('ui_admin.from')?>:</strong><input id="report_date_from" type="text" />
							</td>
							<td>
								<strong><?php echo ucfirst(strtolower(Kohana::lang('ui_admin.to'))); ?>:</strong>
								<input id="report_date_to" type="text" />
							</td>
							<td valign="bottom">
								<a href="#" id="applyDateFilter" class="filter-button"><?php echo Kohana::lang('ui_main.go')?></a>
							</td>
						</tr>
					</table>
				<?php echo form::close(); ?>
			</div>

			<div class="reports-content">
				<!-- reports-box -->
				<div id="reports-box">
					<?php echo $report_listing_view; ?>
				</div>
				<!-- end #reports-box -->
				
				<div id="filters-box">
					<h2><?php echo Kohana::lang('ui_main.filter_reports_by'); ?></h2>
					<div id="accordion">
						
						<h3>
							<a href="#" class="small-link-button f-clear reset" onclick="removeParameterKey('c', 'fl-categories');"><?php echo Kohana::lang('ui_main.clear')?></a>
							<a class="f-title" href="#"><?php echo Kohana::lang('ui_main.category')?></a>
						</h3>
						<div class="f-category-box">
							<ul class="filter-list fl-categories" id="category-filter-list">
								<li>
									<a href="#"><?php
									$all_cat_image = '&nbsp';
									$all_cat_image = '';
									if($default_map_all_icon != NULL) {
										$all_cat_image = html::image(array('src'=>$default_map_all_icon));
									}
									?>
									<span class="item-swatch" style="background-color: #<?php echo Kohana::config('settings.default_map_all'); ?>"><?php echo $all_cat_image ?></span>
									<span class="item-title"><?php echo Kohana::lang('ui_main.all_categories'); ?></span>
									<span class="item-count" id="all_report_count"><?php echo $report_stats->total_reports; ?></span>
									</a>
								</li>
								<?php echo $category_tree_view; ?>
							</ul>
						</div>
						
						<h3>
							<a href="#" class="small-link-button f-clear reset" onclick="removeParameterKey('cff', 'fl-customFields');">
								<?php echo Kohana::lang('ui_main.clear'); ?>
							</a>
							<a class="f-title" href="#"><?php echo Kohana::lang('ui_main.custom_fields'); ?></a>
						</h3>
						<div class="f-customFields-box">
							<?php echo $custom_forms_filter; ?>
							
						</div>
						
					
						<h3>
							<a href="#" class="small-link-button f-clear reset" onclick="removeParameterKey('m', 'fl-media');"><?php echo Kohana::lang('ui_main.clear')?></a>
							<a class="f-title" href="#"><?php echo Kohana::lang('ui_main.media');?></a>
						</h3>
						<div class="f-media-box">
							<p><?php echo Kohana::lang('ui_main.filter_reports_contain'); ?>&hellip;</p>
							<ul class="filter-list fl-media">
								<li>
									<a href="#" id="filter_link_media_1">
										<span class="item-icon ic-photos">&nbsp;</span>
										<span class="item-title"><?php echo Kohana::lang('ui_main.photos'); ?></span>
									</a>
								</li>
								<li>
									<a href="#" id="filter_link_media_2">
										<span class="item-icon ic-videos">&nbsp;</span>
										<span class="item-title"><?php echo Kohana::lang('ui_main.video'); ?></span>
									</a>
								</li>
								<li>
									<a href="#" id="filter_link_media_4">
										<span class="item-icon ic-news">&nbsp;</span>
										<span class="item-title"><?php echo Kohana::lang('ui_main.reports_news')?></span>
									</a>
								</li>
							</ul>
						</div>
						
						

						<?php
							// Action, allows plugins to add custom filters
							Event::run('ushahidi_action.report_filters_ui');
						?>
					</div>
					<!-- end #accordion -->
					
					<div id="filter-controls">
						<p>
							<a href="#" class="small-link-button reset" id="reset_all_filters"><?php echo Kohana::lang('ui_main.reset_all_filters'); ?></a> 
							<a href="#" id="applyFilters" class="filter-button"><?php echo Kohana::lang('ui_main.filter_reports'); ?></a>
						</p>
						<?php
						// Action, allows plugins to add custom filter controls
						Event::run('ushahidi_action.report_filters_controls_ui');
						?>
					</div>
				</div>
				<!-- end #filters-box -->
			</div>
      
			<div class="report-stats-container">
				<?php
					// Filter::report_stats - The block that contains reports list statistics
					Event::run('ushahidi_filter.report_stats', $report_stats);
					echo $report_stats;
				?>
			</div>

		</div>
		<!-- end reports block -->
		
	</div>
	<!-- end content-bg -->
</div>
