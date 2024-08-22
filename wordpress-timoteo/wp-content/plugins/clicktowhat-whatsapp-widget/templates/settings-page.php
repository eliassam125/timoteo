<form method="post">
	<input type="hidden" name="change" value="1">
	<h1>ClickToChat Settings</h1>
	<table>
		<?php if (isset($change) && $change == true) { ?>
			<div id="message" class="notice is-dismissible notice-success alert-success"><p>Changes saved.</p><button type="button" class="notice-dismiss"></button></div>
		<?php } ?>
		<tr>
			<td colspan="2">
				<h2>Token</h2>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="text" name="token" value="<?php echo $token; ?>">
				<p>Don't have a token? Register <a href="https://www.sirena.app/landings/widget/clicktowhat" target="_blank">here</a> and get one!</p>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<h2>Inject the Widget in the following post types:</h2>
			</td>
		</tr>
		<tr>
			<td><input type="checkbox" name="post_types[]" <?php if (strpos($validposttypes, 'page') !== FALSE) echo 'checked'; ?> value="page"></td>
			<td><label>Page</label></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="post_types[]" <?php if (strpos($validposttypes, 'post') !== FALSE) echo 'checked'; ?> value="post"></td>
			<td><label>Post</label></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="post_types[]" <?php if (strpos($validposttypes, 'product') !== FALSE) echo 'checked'; ?> value="product"></td>
			<td><label>Product</label></td>
		</tr>
	</table>
	<div><input type="submit" class="button button-primary" value="Save Fields"></div>
</form>