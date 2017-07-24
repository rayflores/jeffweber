<?php
/**
 * WooCommerce Print Invoices/Packing Lists
 *
 * This source file is subject to the GNU General Public License v3.0
 * that is bundled with this package in the file license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.html
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@skyverge.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade WooCommerce Print
 * Invoices/Packing Lists to newer versions in the future. If you wish to
 * customize WooCommerce Print Invoices/Packing Lists for your needs please refer
 * to http://docs.woocommerce.com/document/woocommerce-print-invoice-packing-list/
 *
 * @package   WC-Print-Invoices-Packing-Lists/Templates
 * @author    SkyVerge
 * @copyright Copyright (c) 2011-2017, SkyVerge, Inc.
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */

defined( 'ABSPATH' ) or exit;

/**
 * PIP Template Body before content
 *
 * @type \WC_Order $order Order object
 * @type int $order_id Order ID
 * @type \WC_PIP_Document Document object
 * @type string $type Document type
 * @type string $action Current document action
 *
 * @version 3.3.0
 * @since 3.0.0
 */

		?>
		<div id="order-<?php echo esc_attr( $order_id ); ?>" class="container">

			

			<main class="document-body <?php echo $type; ?>-body">
				<?php

				/**
				 * Fires before the document's body (order table).
				 *
				 * @since 3.0.0
				 * @param string $type Document type
				 * @param string $action Current action running on Document
				 * @param WC_PIP_Document $document Document object
				 * @param WC_Order $order Order object
				 */
				do_action( 'wc_pip_before_body', $type, $action, $document, $order );

				?>
				<table class="order-table <?php echo $type; ?>-order-table">
					<?php
