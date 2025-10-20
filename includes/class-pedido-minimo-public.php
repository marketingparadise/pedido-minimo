<?php
/**
 * The frontend functionality of the plugin.
 *
 * @package    Pedido_Minimo_Woocommerce
 * @subpackage Pedido_Minimo_Woocommerce/frontend
 * @author     Marketing Paradise <rafael@mkparadise.com>
 */

if (!defined('ABSPATH')) {
    exit;
}

class PedidoMinimo_Public {
    public function __construct()
    {
        add_action( 'woocommerce_check_cart_items' , array($this, 'woocommerce_importe_minimo') );
    }

     /**
      * Set a minimum purchase amount
      */
    public function woocommerce_importe_minimo() {
        $minimum = get_option( 'pedidominimo_precio_minimo', 0 );  // Value of the options page
        $incluir_descuentos = get_option( 'pedidominimo_incluir_descuentos', '0' ); // Value of the options page

        if ($minimum <= 0 || ! WC()->cart ) {
            return;
        }
        if ($incluir_descuentos) {
            $subtotal_a_validar  = WC()->cart->get_cart_contents_total();
        } else {
            $subtotal_a_validar  = WC()->cart->get_subtotal();
        }
        if ( $subtotal_a_validar < $minimum ) {
            /* translators: 1: minimum price value that the cart subtotal must reach, 2: the current cart subtotal. */
            $mensaje = sprintf( __('You must place a <strong>minimum order of %1$s</strong> to complete your purchase. Your cart total is currently %2$s.', 'pedido-minimo-for-woocommerce') ,
            wc_price( $minimum ),
            wc_price( WC()->cart->subtotal )
            );
            
            wc_add_notice( $mensaje, 'error' );
        }
    }
}