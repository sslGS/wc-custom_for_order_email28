<?php

if(!defined('ABSPATH')) exit;

/**
 * @since 0.6.2.0
 * @extends \WC_Email
*/
class WC_Custom_Pickup_Delivery extends WC_Email {

    public function __construct() {
        
        $this->id = 'wc_custom_email_pickup';
        $this->customer_email = true;
        $this->title = 'Курьер ожидает встречи';
        $this->description = 'Кастомный класс email';

        $this->heading = 'Custom Email';
        $this->subject = 'Custom for status order email';

		$this->template_plain = 'emails/plain/customer-completed-order.php';

        $this->placeholders   = array(
				'{order_date}'   => '',
				'{order_number}' => '',
		);

        parent::__construct();
    }

    public function get_default_subject() {
			return __( 'Your {site_title} order is now complete', 'woocommerce' );
	}
    public function get_default_heading() {
			return __( 'Thanks for shopping with us', 'woocommerce' );
	}

    public function trigger($order_id) {
        $this->setup_locale();

        if ($order_id && ! is_a($order, 'WC_Order')) {
            $order = wc_get_order($order_id);
        }

        if (is_a($order, 'WC_Order')) {
            $this->object                         = $order;
            $this->recipient                      = $this->object->get_billing_email();
            $this->placeholders['{order_date}']   = wc_format_datetime( $this->object->get_date_created() );
            $this->placeholders['{order_number}'] = $this->object->get_order_number();
        }

        if ( $this->is_enabled() && $this->get_recipient() ) {
            $this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
        }

        $this->restore_locale();
    }

    public function get_content_html() {
	    return wc_get_template_html(
			$this->template_html,
            array(
					'order'              => $this->object,
					'email_heading'      => $this->get_heading(),
					'additional_content' => $this->get_additional_content(),
					'sent_to_admin'      => false,
					'plain_text'         => false,
					'email'              => $this,
				)
		);
    }

    public function get_content_plain() {
        return wc_get_template_html(
			$this->template_plain,
				array(
					'order'              => $this->object,
					'email_heading'      => $this->get_heading(),
					'additional_content' => $this->get_additional_content(),
					'sent_to_admin'      => false,
					'plain_text'         => true,
					'email'              => $this,
				)
		);
    }

    public function get_default_additional_content() {
			return __( 'Thanks for shopping with us.', 'woocommerce' );
	}
}

class WC_Custom_Cancelled extends WC_Email {

    public function __construct() {
        
        $this->id = 'wc_custom_email_cancelled';
        $this->customer_email = true;
        $this->title = 'Отмененный заказ';
        $this->description = 'Кастомный класс email';

        $this->heading = 'Custom Email';
        $this->subject = 'Custom for status order email';

		$this->template_plain = 'emails/plain/customer-completed-order.php';

        $this->placeholders   = array(
				'{order_date}'   => '',
				'{order_number}' => '',
		);

        parent::__construct();
    }

    public function get_default_subject() {
			return __( 'Your {site_title} order is cancelled', 'woocommerce' );
	}
    public function get_default_heading() {
			return __( 'Thanks for shopping with us', 'woocommerce' );
	}

    public function trigger($order_id) {
        $this->setup_locale();

        if ($order_id && ! is_a($order, 'WC_Order')) {
            $order = wc_get_order($order_id);
        }

        if (is_a($order, 'WC_Order')) {
            $this->object                         = $order;
            $this->recipient                      = $this->object->get_billing_email();
            $this->placeholders['{order_date}']   = wc_format_datetime( $this->object->get_date_created() );
            $this->placeholders['{order_number}'] = $this->object->get_order_number();
        }

        if ( $this->is_enabled() && $this->get_recipient() ) {
            $this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
        }

        $this->restore_locale();
    }

    public function get_content_html() {
	    return wc_get_template_html(
			$this->template_html,
            array(
					'order'              => $this->object,
					'email_heading'      => $this->get_heading(),
					'additional_content' => $this->get_additional_content(),
					'sent_to_admin'      => false,
					'plain_text'         => false,
					'email'              => $this,
				)
		);
    }

    public function get_content_plain() {
        return wc_get_template_html(
			$this->template_plain,
				array(
					'order'              => $this->object,
					'email_heading'      => $this->get_heading(),
					'additional_content' => $this->get_additional_content(),
					'sent_to_admin'      => false,
					'plain_text'         => true,
					'email'              => $this,
				)
		);
    }

    public function get_default_additional_content() {
			return __( 'Thanks for shopping with us.', 'woocommerce' );
	}
}

class WC_Custom_SDEK extends WC_Email {

    public function __construct() {
        
        $this->id = 'wc_custom_email_sdek';
        $this->customer_email = true;
        $this->title = 'отправлен СДЭК';
        $this->description = 'Кастомный класс email';

        $this->heading = 'Custom Email';
        $this->subject = 'Custom for status order email';

		$this->template_plain = 'emails/plain/customer-completed-order.php';

        $this->placeholders   = array(
				'{order_date}'   => '',
				'{order_number}' => '',
		);

        parent::__construct();
    }

    public function get_default_subject() {
			return __( 'Your {site_title} order is complete', 'woocommerce' );
	}
    public function get_default_heading() {
			return __( 'Thanks for shopping with us', 'woocommerce' );
	}

    public function trigger($order_id) {
        $this->setup_locale();

        if ($order_id && ! is_a($order, 'WC_Order')) {
            $order = wc_get_order($order_id);
        }

        if (is_a($order, 'WC_Order')) {
            $this->object                         = $order;
            $this->recipient                      = $this->object->get_billing_email();
            $this->placeholders['{order_date}']   = wc_format_datetime( $this->object->get_date_created() );
            $this->placeholders['{order_number}'] = $this->object->get_order_number();
        }

        if ( $this->is_enabled() && $this->get_recipient() ) {
            $this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
        }

        $this->restore_locale();
    }

    public function get_content_html() {
	    return wc_get_template_html(
			$this->template_html,
            array(
					'order'              => $this->object,
					'email_heading'      => $this->get_heading(),
					'additional_content' => $this->get_additional_content(),
					'sent_to_admin'      => false,
					'plain_text'         => false,
					'email'              => $this,
				)
		);
    }

    public function get_content_plain() {
        return wc_get_template_html(
			$this->template_plain,
				array(
					'order'              => $this->object,
					'email_heading'      => $this->get_heading(),
					'additional_content' => $this->get_additional_content(),
					'sent_to_admin'      => false,
					'plain_text'         => true,
					'email'              => $this,
				)
		);
    }

    public function get_default_additional_content() {
			return __( 'Thanks for shopping with us.', 'woocommerce' );
	}
}