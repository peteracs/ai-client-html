<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2014
 * @copyright Aimeos (aimeos.org), 2015-2016
 */

$order = $this->extOrderItem;

/// Delivery e-mail intro with order ID (%1$s), order date (%2$s) and delivery status (%3%s)
$msg = $this->translate( 'client', 'We received the returned parcel for your order %1$s from %2$s.' );

$key = 'stat:' . $order->getDeliveryStatus();
$status = $this->translate( 'client/code', $key );
$format = $this->translate( 'client', 'Y-m-d' );

$string = sprintf( $msg, $order->getId(), date_create( $order->getTimeCreated() )->format( $format ), $status );


?>
<?php $this->block()->start( 'email/delivery/text/intro' ); ?>


<?= wordwrap( strip_tags( $string ) ); ?>
<?php $this->block()->stop(); ?>
<?= $this->block()->get( 'email/delivery/text/intro' ); ?>
