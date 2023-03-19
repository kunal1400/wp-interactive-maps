<div style="width:98%">	
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
				<tr class="mainrow">
					<td class="manage-column column-columnname">
						<input required type="text" name="state_name" placeholder="Enter State Name" class="large-text" />
					</td>
					<td class="manage-column column-columnname">
						<textarea name="state_description" placeholder="Enter Description" class="large-text"></textarea>
					</td>
					<td class="manage-column column-columnname">						
						<button onclick="removethisrow(this)" type="button" class="button button-danger">Remove</button>
					</td>
				</tr>
				<?php
					global $post;
					$createdJson = get_post_meta( $post->ID, "_wp_created_json", true);
					if ($createdJson) {
						$jsonArray = json_decode($createdJson, true);
						foreach ($jsonArray as $key => $value) {
							switch(true) {

								case ($key == 'centerMap' || $key == 'leftcontentrightmap' || $key == 'fullmap'):
									$returnHtml = '<tr class="mainrow">
										<td colspan="2">
											<table width="100%">
												<thead>
													<th width="20%">'.$key.'</th>
													<th width="80%"><span onclick="removethisrow(this)" class="dashicons dashicons-trash"></span></th>
												</thead>
												<tbody>
													<tr class="form-field">
														<td width="20%">Heading</td>
														<td width="80%">
															<input 
															value="'.$value['heading'].'" 
															name="_create_json['.$key.'][heading]"type="text" /></td>								
													</tr>
													<tr class="form-field">
														<td width="20%">Content</td>
														<td width="80%">
															<textarea 
															name="_create_json['.$key.'][content]"
															>'.$value['content'].'</textarea>
														</td>
													</tr>
													<tr class="form-field">
														<td width="20%">Map Url</td>
														<td width="70%">
															<input 
															value="'.$value['mapurl'].'" 
															name="_create_json['.$key.'][mapurl]" 
															type="text" />
														</td>								
													</tr>
												</tbody>
											</table>
										</td>
									</tr>';
								break;

								case ($key == 'fullbgimage' || $key == 'leftimagerightcontent' || $key == 'rightcontentleftimage'):
									$returnHtml = '<tr class="mainrow">
										<td colspan="2">
											<table width="100%">
												<thead>
													<th width="20%">'.$key.'</th>
													<th width="80%"><span onclick="removethisrow(this)" class="dashicons dashicons-trash"></span></th>
												</thead>
												<tbody>
													<tr class="form-field">
														<td width="20%">Heading</td>
														<td width="80%">
															<input 
															name="_create_json['.$key.'][heading]"
															value="'.$value['heading'].'" 
															type="text" 
															/></td>								
													</tr>
													<tr class="form-field">
														<td width="20%">Content</td>
														<td width="80%">
															<textarea			
															name="_create_json['.$key.'][content]">'.$value['content'].'</textarea>
															</td>
													</tr>
													<tr class="form-field">
														<td width="20%">Image Url</td>
														<td width="70%">
															<input 
															name="_create_json['.$key.'][imageurl]" 
															value="'.$value['imageurl'].'" 
															type="text" 
															/>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>';
								break;

								case $key == 'formSection':
									$returnHtml = '<tr class="mainrow">
										<td colspan="2" width="100%">
										<table width="100%">
												<thead>
													<th width="20%">'.$key.'</th>
													<th width="80%"><span onclick="removethisrow(this)" class="dashicons dashicons-trash"></span></th>
												</thead>
												<tbody>						
													<tr class="form-field">
														<tr class="form-field">
															<td width="20%">Answer</td>
															<td width="80%">
																<input 
																name="_create_json['.$key.'][answer]" 
																value="'.$value['answer'].'" 
																type="text" 
																/>
															</td>								
														</tr>
														<tr class="form-field">
															<td width="20%">Next Page ID</td>
															<td width="80%">
																<input 
																name="_create_json['.$key.'][nextpageid]" 
																type="text"
																value="'.$value['nextpageid'].'" 
																/>
															</td>		
														</tr>
													</tr>								
												</tbody>
											</table>
										</td>
									</tr>';
								break;

								default:
									$returnHtml = '<tr class="mainrow">
										<td colspan="2">
											<table width="100%">
												<thead>
													<th width="20%">'.$key.'</th>
													<th width="80%"><span onclick="removethisrow(this)" class="dashicons dashicons-trash"></span></th>
												</thead>
												<tbody>						
													<tr class="form-field">
														<td width="20%">Heading</td>
														<td width="80%">
															<input 
															name="_create_json['.$key.'][heading]"
															value="'.$value['heading'].'" 
															type="text" 
															/>
														</td>								
													</tr>
													<tr class="form-field">
														<td width="20%">Content</td>
														<td width="80%">
															<textarea 
															name="_create_json['.$key.'][content]" 
															>'.$value['content'].'</textarea>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>';
							}
							echo $returnHtml;
						}
					}
				?>
			</tbody>
		</table>
		<input type="hidden" name="interactive_map_saved" />
		<input type="hidden" name="page" value="wp_interactive_map_settings" />
	</form>
</div>