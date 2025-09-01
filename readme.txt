=== Pedido Mínimo para WooCommerce ===
Contributors: marketingparadise
Tags: woocommerce, minimum order, cart, checkout, pedido minimo, e-commerce
Requires at least: 5.8
Tested up to: 6.9
Stable tag: 1.0.0
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Establece un importe de pedido mínimo en tu tienda WooCommerce para poder finalizar la compra. Simple, ligero y eficaz.

== Description ==

¿Quieres asegurarte de que tus clientes alcanzan un importe mínimo antes de completar un pedido? **Pedido Mínimo para WooCommerce** es la herramienta ideal para ti.

Este plugin permite establecer un valor mínimo que el subtotal del carrito debe alcanzar para que el cliente pueda proceder al pago. Si no se cumple este requisito, se mostrará una notificación clara en el carrito y se impedirá completar el proceso de compra en el checkout.

**Principales características:**

* **Configuración sencilla:** Añade una única opción en las opciones de WooCommerce para definir el importe mínimo.
* **Notificaciones claras:** Mensajes en el carrito y checkout para informar al usuario cuando no alcanza el mínimo.
* **Compatibilidad total:** Integración nativa con WooCommerce y compatible con la mayoría de los temas.
* **Rendimiento óptimo:** Código limpio, ligero y alineado con las mejores prácticas de desarrollo en WordPress.

== Installation ==

**Instalación Automática (Recomendada):**

1.  Desde el panel de administración de tu WordPress, ve a `Plugins > Añadir plugin`.
2.  Busca "Pedido Mínimo para WooCommerce".
3.  Haz clic en "Instalar ahora" y luego en "Activar".
4.  Ve a `WooCommerce > Establecer Pedido mínimo` para configurar el importe mínimo en la sección correspondiente.

**Instalación Manual:**

1.  Descarga el archivo `.zip` del plugin desde el repositorio de WordPress.org.
2.  Descomprime el archivo. Subirás la carpeta `pedido-minimo` al directorio `/wp-content/plugins/` de tu instalación de WordPress.
3.  Activa el plugin desde el menú `Plugins` en tu panel de administración.
4.  Configura el importe en `WooCommerce > Establecer Pedido mínimo`.

== Frequently Asked Questions ==

= ¿El importe mínimo tiene en cuenta los gastos de envío? =

No, el plugin valida el importe contra el **subtotal del carrito**, antes de aplicar cupones de descuento o sumar los gastos de envío.

= ¿Puedo personalizar el mensaje que se muestra al usuario? =

Actualmente el plugin muestra un mensaje predeterminado en el carrito. En futuras versiones planeamos ofrecer más opciones de personalización.

= ¿Es compatible con mi tema? =

El plugin utiliza los hooks estándar de WooCommerce para mostrar las notificaciones, por lo que debería ser compatible con cualquier tema que siga los estándares de WooCommerce.

= ¿Afecta al rendimiento de mi web? =

No. El plugin es extremadamente ligero y el código solo se ejecuta en las páginas de carrito y finalización de compra, por lo que el impacto en el rendimiento es prácticamente nulo.

== Screenshots ==

1.  Página de ajustes donde se configura el importe mínimo.
2.  Notificación en la página del carrito cuando no se alcanza el mínimo.
3.  Notificación en la página de finalización de compra si no se alcanza el mínimo.

== Changelog ==

= 1.0.0 - 2025-09-01 =
* Lanzamiento inicial del plugin.
* Funcionalidad básica para establecer un importe mínimo en el carrito.
* Notificación visible en el carrito cuando no se alcanza el importe mínimo.

== Upgrade Notice ==

= 1.0.0 =
Versión inicial. ¡Gracias por instalar Pedido Mínimo para WooCommerce!