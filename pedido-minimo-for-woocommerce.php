<?php
/*
 * Plugin Name: Pedido mínimo for WooCommerce
 * Description: Establece un pedido mínimo en tu tienda de woocommerce
 * Version: 1.0.3
 * Requires Plugins: woocommerce
 * Author: Marketing Paradise
 * Author URI: https://mkparadise.com/
 * License: GPLv2 or later
 * Text Domain: pedido-minimo-for-woocommerce
 * Domain Path: /languages

 * @link      https://mkparadise.com/
 * @package   Pedido_Minimo_Woocommerce
 */

if (!defined('ABSPATH')) {
    exit; // Evitar acceso directo.
}


/**
 * Al activar el plugin, comprobamos si woocommerce está activo
 */
function pedidominimo_activar_plugin_pedido_minimo() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        deactivate_plugins( plugin_basename( __FILE__ ) );
        wp_die(
            esc_html__( 'Lo sentimos, pero el plugin "Pedido Mínimo" requiere que WooCommerce esté instalado y activo. Por favor, active WooCommerce y vuelva a intentarlo.', 'pedido-minimo-for-woocommerce' ),
            esc_html__( 'Error de activación', 'pedido-minimo-for-woocommerce' ),
            array( 'back_link' => true )
        );
    }
}
register_activation_hook( __FILE__, 'pedidominimo_activar_plugin_pedido_minimo' );

final class PedidoMinimo_Principal {

    public function __construct() {
        $this->cargar_dependencias();
        new PedidoMinimo_Admin();
        new PedidoMinimo_Public();
    }

    private function cargar_dependencias() {
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-pedido-minimo-admin.php';
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-pedido-minimo-public.php';
    }
}

/**
 * Lanza mensaje si desactivamos woocommerce
 */
function pedidominimo_inicializar_plugin_pedido_minimo() {
    
    if ( ! class_exists( 'WooCommerce' ) ) {
        add_action( 'admin_notices', 'pedidominimo_aviso_falta_woocommerce' );
        return;
    }

    new PedidoMinimo_Principal();
}
add_action( 'plugins_loaded', 'pedidominimo_inicializar_plugin_pedido_minimo' );

// Si no está activo woocommerce, lanzamos un aviso
function pedidominimo_aviso_falta_woocommerce() {
    ?>
    <div class="notice notice-error is-dismissible">
        <p>
            <strong><?php esc_html_e( 'Pedido Mínimo para WooCommerce:', 'pedido-minimo-for-woocommerce' ); ?></strong>
            <?php esc_html_e( 'Este plugin requiere que WooCommerce esté instalado y activo para funcionar.', 'pedido-minimo-for-woocommerce' ); ?>
        </p>
    </div>
    <?php
}
