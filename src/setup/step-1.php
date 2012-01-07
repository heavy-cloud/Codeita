<style>
table tbody strong { color: #aa0000; }
</style>
				<h1>Environment Check <small> Prepare your server environment for Codeita.</small></h1>
				<div class="block-message warning">
					<p>It appears Codeita has not beed setup yet. Use this page to setup and configure your Codeita environment.</p>
				</div>
				
				
				<h3>Server Requirements</h3>
				<p>Codeita needs a few helper tools to work on your server. The table below shows the libraries and tools Codeita requires.</p>
				
				<table>
					<thead>
						<tr>
							<th>Tool</th>
							<th>Required</th>
							<th>You Have</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<a href="http://php.net/" target="_blank">
								PHP
								</a>
							</td>
							<td>5.2 or newer</td>
							<td>
								<?php
									
									if(substr(phpversion(),0,1) == 5){
										if(substr(phpversion(),2,1) >= 2){
											$check['php']=true;
											echo ''.phpversion().'';
										}else{
											$check['php']=false;
											echo '<strong>'.phpversion().'</strong>';									
										}
									}else{
										$check['php']=false;
										echo '<strong>'.phpversion().'</strong>';
									}
								?>
							</td>
						</tr>
						<tr>
							<td>
								<a href="http://us2.php.net/manual/en/book.json.php" target="_blank">
								JSON
								</a>
							</td>
							<td>Enabled</td>
							<td>
								<?php
								if(function_exists('json_encode')){
									$check['json']=true;
									echo 'Enabled';
								}else{
									$check['json']=true;
									echo '<strong>Not Found</strong>';
								}
								?>
							</td>
						</tr>
						<tr>
							<td>
								<a href="http://httpd.apache.org/docs/1.3/mod/mod_access.html" target="_blank">
									.htaccess
								</a>
							</td>
							<td>Enabled</td>
							<td>
								<?php

									$context = stream_context_create(
										array( 'http' => 
											array( 'method'  => 'GET','timeout' => 3 )
										)
									);
									$path = substr($_SERVER['SCRIPT_NAME'],0,-(strlen(basename($_SERVER['SCRIPT_NAME']))));
									$url = 'http://'.$_SERVER['SERVER_NAME'].$path.'src/setup/test.inc';
									
									if(file_get_contents($url,false,$context)){										
										$check['htaccess']=false;
										echo '<strong>Not Found</strong>';
									}else{
										$check['htaccess']=true;
										echo 'Enabled';
									}
								?>
							</td>
						</tr>
						<tr>
							<td>Read/Write access to <code><?php echo DATA_PATH; ?></code></td>
							<td>Enabled</td>
							<td>
							<?php
							if(!is_dir(DATA_PATH)){
								mkdir(DATA_PATH,0777);
							}
							if(is_writable(DATA_PATH)){
								$check['config']=true;
									echo 'Enabled';
							}else{
								$check['config']=false;
								echo '<strong>No</strong>';
							}
							?>
							</td>
						</tr>
					</tbody>
				</table>
				<?php
					$checkall  = in_array(false,$check);
					if(!$checkall){
						echo '<div class="block-message success">';
						echo '<a href="setup.php?step=2" style="float:right;" class="primary btn large">Continue &raquo;</a>';
						echo '<p><strong>Looks good!</strong> You have passed the environment test, and it appears you can run Codeita on this server!</p>';
						echo '</div>';
					}else{
						echo '<div class="block-message error"><p><strong>Oh snap!</strong> You\'re missing one or more requirements.</p></div>';						
					}
				?>
