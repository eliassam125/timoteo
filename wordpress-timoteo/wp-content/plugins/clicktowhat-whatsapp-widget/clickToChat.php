<?php 
/*
 * Plugin Name: ClickToChat Widget
 * Author: ClickToChat
 * Version: 1.1.1
 * Description: This plugin injects the ClickToChat Widget code in posts pages
*/

class ClickToChatWidget{

	private $post_types;

	/**
	 * This function adds the ClickToChat Widget if the following conditions apply:
	 * - The current post type is included in the ClickToChat Widget post types in settings
	 * - The current post has not checked the option for not embedding ClickToChat Widget.
	 * 
	 * If no token is set, notifies the error in console
	 *
	 * @since 1.0
	 *  
	 * @global WPDB $wpdb WordPress database handler. 
	 * 
	 */

    public function attach_assets () {
			global $wpdb;
			// if (!is_single()) {
			// 	return;
			// }
			$setting = get_option('validposttypes');
			$t = get_post_type();
			$exception = get_post_meta(get_the_ID(), 'disable_widget', true) == 'yes';
			$token = get_option("token", "");
			// If there's no token, then return an error in console
			if (empty($token)) {
				echo '<script type="text/javascript">console.log("[ClickToChat] ERROR: No token set for the widget.");</script>';
				return;
			}
			// If it's not between the options in settings or this page has an exception to show the widget, don't do it
			if (strpos($setting, $t) !== FALSE && !$exception) {
				echo '<script type="text/javascript" src="https://widget.sirena.app/get?token='.$token.'" async="true"></script>';
			}
    }

  /**
	 * This function renders the HTML for ClickToChat Token metabox.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Post $post The current post being edited. 
	 */

  public function tm_meta_box($post){
 		$disabled = get_post_meta($post->ID, 'disable_widget', true);
	?>
		<div class="inside half"> 
			<label>Disable ClickToChat here? <input type="checkbox" name="disable_widget" <?php if ($disabled=='yes') echo 'checked'; ?> value="yes"></label>
		</div>
	<?php
	
	}

	/**
	 * This function renders the widget settings page,
	 * and it updates its parameters when they are changed.
	 *
	 * @since 1.0.0
	 *
	 */

	public function settings () {
		$change = false;
		if (isset($_POST['change'])) {
			update_option("token", sanitize_text_field($_POST['token']));
			update_option("validposttypes", implode(',', $_POST['post_types']));
			$change = true;
		}
		$token = get_option("token", "");
		$post_types = $this->post_types;
		$validposttypes = get_option("validposttypes", "");
		
		include("templates/settings-page.php");
	}

	/**
	 * This function hooks the options page for the widget settings
	 * to Wordpress dashboard.
	 *
	 * @since 1.0.0
	 *
	 * @see settings 
	 *
	 */

	public function add_page () {
		add_options_page('Settings', 'ClickToChat Widget', 'manage_options', 'widget_settings', [$this, 'settings']);
	}

    /**
	 * This function saves a post meta for disabling the widget script embedding, 
	 * if the corresponding checkbox in post edit area was checked.
	 *
	 * @since 1.0.0 
	 *
	 * @param int $id The ID of post being saved. 
	 */

	public function save_widgetMetabox ($id) {
		$p = get_post($id);
		if (array_key_exists('disable_widget', $_POST) && $_POST['disable_widget'] == 'yes') {
	        update_post_meta($id, 'disable_widget', 'yes');
	    } else {
			update_post_meta($id, 'disable_widget', 'no');
	    }
	}

    /**
	 * This function adds the widget metabox if type of current post
	 * being edited is between the widget post types.
	 *
	 * @since 1.0.0 
	 *
	 * @param string $posttype The type of the current post being edited. 
	 */

    public function widget_meta ($posttype) {
		$setting = get_option('validposttypes');
		if (strpos($setting, $posttype) !== FALSE) {
			add_meta_box('tm_meta', __('ClickToChat Widget', 'tm'), [$this, 'tm_meta_box'], 'post', 'normal', 'high');
		}
    }

    /**
	 * This function shows an alert in admin pages if no token is set.
	 *
	 * @since 1.0.0 
	 * 
	 */

    public function alertifnotset () {
		if (empty(get_option('token', ''))) {
	?>
		<div class="notice notice-error is-dismissible">
			<p>ERROR: The ClickToChat Token is missing. <a href="<?php echo admin_url('options-general.php?page=widget_settings'); ?>">Go to ClickToChat Widget Settings</a> to add it</p>
		</div>
    <?php
		}
    }

    /**
	 * This function is the entry point for our plugin.
	 * Here all the functionality is added to Wordpress hooks.
	 *
	 * @since 1.0.0 
	 * 
	 */

    function __construct () {
      add_action('wp_head', [$this, 'attach_assets']);
			add_action('admin_menu', [$this, 'add_page']);
			add_action('add_meta_boxes', [$this, 'widget_meta']);
			add_action('save_post', [$this, 'save_widgetMetabox']);
			add_action('admin_notices', [$this, 'alertifnotset']);

			$this->post_types = get_post_types();
    }
}

$tb = new ClickToChatWidget();
