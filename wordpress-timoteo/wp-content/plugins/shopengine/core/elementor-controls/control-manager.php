<?php
namespace ShopEngine\Core\Elementor_Controls;

defined( 'ABSPATH' ) || exit;

/**
 * Elementor controls manager.
 *
 * Elementor controls manager handler class is responsible for registering and
 * initializing all the supported controls, both regular controls and the group
 * controls.
 *
 * @since 1.0.0
 */
class Controls_Manager extends \Elementor\Controls_Manager {
    const IMAGECHOOSE = 'imagechoose';
    const AJAXSELECT2 = 'shopengine_ajaxselect2';
}