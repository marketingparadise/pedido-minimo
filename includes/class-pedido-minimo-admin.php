<?php
/**
 * La funcionalidad de administración del plugin.
 *
 * @package    Pedido_Minimo_Woocommerce
 * @subpackage Pedido_Minimo_Woocommerce/admin
 * @author     Marketing Paradise <rafael@mkparadise.com>
 */

if (!defined('ABSPATH')) {
    exit; // Evitar acceso directo.
}

class PedidoMinimo_Admin {

    public function __construct() {
        add_action('admin_menu', array($this, 'menu_pedido_minimo')); // Añadir página en submenú de woocommerce
        add_action('admin_init', array ($this, 'crear_settings')); // Creamos secciones de settings, registramos settings y creamos los campos
    }

    /**
     * Añadir página en submenú de woocommerce
     */
    public function menu_pedido_minimo() {
        add_submenu_page(
            'woocommerce',
            __( 'Pedido mínimo', 'pedido-minimo-for-woocommerce' ),
            __( 'Establecer Pedido mínimo', 'pedido-minimo-for-woocommerce' ),
            'manage_woocommerce',
            'mkp-opciones-pedidominimo',
            array ($this, 'opciones_pedidominimo_callback'),
            7
        );
    }

    public function opciones_pedidominimo_callback() {
        ?>
		    <div class="wrap">
                <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			    <form method="post" action="options.php">
				    <?php
                    settings_errors(); // Errores. No ponemos 'pedidominimo_settings_error' para que salgan todos los errores y no solo los que nosostros configuremos
					settings_fields( 'pedidominimo_pedidominimo_settings_group' ); // Nombre del grupo de settings
					do_settings_sections( 'mkp-opciones-pedidominimo' ); // page slug de la página de opciones
					submit_button(); // Botón que guarda las opciones
				    ?>
			    </form>
		    </div>
	    <?php
    }

    /**
     * Creamos secciones de settings, registramos settings y creamos los campos
     */
    public function crear_settings() {

        $page_slug = 'mkp-opciones-pedidominimo';
	    $option_group = 'pedidominimo_pedidominimo_settings_group';

        // 1 - Creamos la sección
        add_settings_section(
	        'pedidominimo_pedidominimo_seccion', // ID de la sección
	        'Opciones', // título (opcional)
	        '', // callback para pintar la sección (opcional)
	        $page_slug
	    );

        // 2 - Registramos los campos
        register_setting($option_group, 'pedidominimo_precio_minimo', array ($this, 'validar_precio'));

        // 3 - Añadimos los campos
        add_settings_field(
            'pedidominimo_precio_minimo',
            'Cantidad',
            array ($this, 'pinta_precio_minimo'), // función que pinta el campo
            $page_slug,
            'pedidominimo_pedidominimo_seccion' // ID de la sección
        );
    }

        // 4 - Pintamos los campos
        public function pinta_precio_minimo () {
            $pedidominimo = get_option('pedidominimo_precio_minimo', 0);
            echo "<input id='mkp-valor-pedidominimo' name='pedidominimo_precio_minimo' type='text' value='". esc_attr( $pedidominimo ) ."' />";
        }

        // Validación del campo
        public function validar_precio ($input) {
            if (!is_numeric($input) || $input < 0) { // El pedido mínimo tiene que ser un número mayor que cero
            add_settings_error(
			'pedidominimo_settings_error',
			'no-float', // parte del ID del mensaje de error id="setting-error-no-float"
			__('La cantidad no es válida', 'pedido-minimo-for-woocommerce'), // Mensaje de error
			'error' // tipo de error
		    );
            $input = get_option('pedidominimo_precio_minimo', 0); // Si hay error, se queda el valor anterior
        }

        $input_sanitizado = floatval($input);

        return $input_sanitizado;
    }
}