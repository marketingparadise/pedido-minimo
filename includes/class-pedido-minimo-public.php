<?php
/**
 * La funcionalidad de frontend del plugin.
 *
 * @package    Pedido_Minimo_Woocommerce
 * @subpackage Pedido_Minimo_Woocommerce/frontend
 * @author     Marketing Paradise <rafael@mkparadise.com>
 */

if (!defined('ABSPATH')) {
    exit; // Evitar acceso directo.
}

class Mkp_Pedido_Minimo_Public {
    public function __construct()
    {
        add_action( 'woocommerce_check_cart_items' , array($this, 'woocommerce_importe_minimo') );
    }

     /**
      * Establecer un importe minimo en la compra
      */
    public function woocommerce_importe_minimo() {
        $minimum = get_option( 'mkp_precio_minimo', 0 );  // Valor de la página de opciones
        if ($minimum <= 0 || ! WC()->cart ) {
            return;
        }
        if ( WC()->cart->subtotal < $minimum ) {
            /* translators: 1: valor del precio mínimo que debe alcanzar el subtotal del carrito, 2: el subtotal actual del carrito. */
            $mensaje = sprintf( __('Debes realizar un <strong>pedido mínimo de %1$s</strong> para finalizar su compra. Ahora mismo el total de tu carrito es %2$s.', 'pedido-minimo-for-woocommerce') ,
            wc_price( $minimum ),
            wc_price( WC()->cart->subtotal )
            );
            
            wc_add_notice( $mensaje, 'error' );
        }
    }
}