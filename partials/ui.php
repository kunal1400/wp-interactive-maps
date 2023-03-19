<div style="width:98%">	
	<?php 
	$mapDataJson = get_option('dataForMap');
	$mapData = json_decode($mapDataJson, true);
	?>
	<form method="post" action="<?php echo admin_url('/options-general.php?page=wp_interactive_map_settings') ?>" onsubmit="return formOnSubmit(this)">
		<h2>Interactive Map - Add labels 
			<button type="submit" class="button button-primary">Save</button>
			<button onclick="appendToTbody(this)" type="button" class="button button-primary">Add State</button>
		</h2>
		<table id="interactive-map-states" class="widefat fixed">
			<thead>
				<tr>
					<th class="manage-column column-columnname">State Name</th>
					<th class="manage-column column-columnname">State Description</th>
					<!-- <th class="manage-column column-columnname">State Link</th> -->
					<th class="manage-column column-columnname">Action</th>
				</tr>			
			</thead>
			<tbody id="_choosen_fields_response">				
				<?php
					if( is_array($mapData) && count($mapData) > 0 ) {
						$i = 0;
						foreach($mapData as $k => $v) {
							$className = ($i % 2 == 0 ? '' : 'alternate');
							echo '<tr class="mainrow '.$className.'">
								<td class="manage-column column-columnname">
									<input required type="text" name="state_name" placeholder="Enter State Name" class="large-text" value="'.$k.'" />
								</td>
								<td class="manage-column column-columnname">
									<textarea name="state_description" placeholder="Enter Description" class="large-text">'.$v['text'].'</textarea>
								</td>
								<td class="manage-column column-columnname">						
									<button onclick="removethisrow(this)" type="button" class="button button-danger">Remove</button>
								</td>
							</tr>';
							$i++;
						}	
					} else {
						echo '<tr class="mainrow">
							<td class="manage-column column-columnname">
								<input required type="text" name="state_name" placeholder="Enter State Name" class="large-text" />
							</td>
							<td class="manage-column column-columnname">
								<textarea name="state_description" placeholder="Enter Description" class="large-text"></textarea>
							</td>
							<td class="manage-column column-columnname">						
								<button onclick="removethisrow(this)" type="button" class="button button-danger">Remove</button>
							</td>
						</tr>';
					}	
				?>
			</tbody>
		</table>
		<input type="hidden" name="interactive_map_saved" />
		<input type="hidden" name="page" value="wp_interactive_map_settings" />
	</form>
</div>