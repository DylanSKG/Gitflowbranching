<?php

namespace Blocksy;

class CaptchaToolsIntegration {
	public function __construct() {
		add_action('wp', function() {
			ob_start();
			do_action( 'anr_captcha_form_field' );
			ob_get_clean();
		});

		add_action('plugins_loaded', function () {
			if (! class_exists('NextendSocialLogin')) {
				return;
			}

			remove_action('wp_print_scripts', 'NextendSocialLogin::nslDOMReady');

			add_action('wp_print_scripts', function () {
				echo '<script type="text/javascript">
					window._nslDOMReady = function (callback) {
						window.nslReinit = callback

						if ( document.readyState === "complete" || document.readyState === "interactive" ) {
							callback();
						} else {
							document.addEventListener( "DOMContentLoaded", callback );
						}
					};
				</script>';
			});
		}, 100);

		add_action('wp_enqueue_scripts', function () {
			if (! function_exists('get_plugin_data')){
				require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			}

			if (is_admin()) return;

			if (! function_exists('blocksy_image')) {
				return;
			}

			$render = new \Blocksy_Header_Builder_Render();

			if (! $render->contains_item('account')) {
				if (! is_customize_preview()) {
					return '';
				}
			}

			if (class_exists('WordfenceLS\Controller_WordfenceLS')) {
				$ctl = \WordfenceLS\Controller_WordfenceLS::shared();
				$ctl->_login_enqueue_scripts();
			}

			if (class_exists('LoginNocaptcha') && ! get_current_user_id()) {
				add_action(
					'lostpassword_errors',
					['LoginNocaptcha', 'authenticate'],
					10, 1
				);

				\LoginNocaptcha::enqueue_scripts_css();

				wp_enqueue_script('login_nocaptcha_google_api');
				wp_enqueue_style('login_nocaptcha_css');
			}

			if (function_exists('anr_login_enqueue_scripts')) {
				anr_login_enqueue_scripts();
			}
		}, 50);
	}
}
