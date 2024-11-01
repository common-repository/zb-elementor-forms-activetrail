<?php
namespace ElementorPro\Modules\Forms\Actions;

use Elementor\Controls_Manager;
use ElementorPro\Modules\Forms\Classes\Action_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ZB_Elementor_Forms_ActiveTrail_Action extends Action_Base {

	private $ajax_handler;

	public function get_name() {
		return 'zb-elementor-forms-activetrail';
	}

	public function get_label() {
		return __( 'ActiveTrail', 'zb-elementor-forms-activetrail' );
	}

	public function register_settings_section( $widget ) {
		$widget->start_controls_section(
			'zb_activetrail_section',
			[
				'label' => __( 'ActiveTrail', 'zb-elementor-forms-activetrail' ),
				'condition' => [
					'submit_actions' => $this->get_name(),
				],
			]
		);

		$widget->add_control(
			'zb_activetrail_api_heading',
			[
				'label' => __( 'ActiveTrail API', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$widget->add_control(
			'zb_activetrail_token',
			[
				'label' => __( 'Token', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$widget->add_control(
			'zb_activetrail_group_id',
			[
				'label' => __( 'Group ID', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$widget->add_control(
			'zb_activetrail_data_heading',
			[
				'label' => __( 'ActiveTrail Data', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$widget->add_control(
			'zb_activetrail_data_description',
			[
				'show_label' => false,
				'type' => Controls_Manager::RAW_HTML,
				'raw' => __( 'Insert field id, raw data or leave empty', 'zb-elementor-forms-activetrail' ),
				'content_classes' => 'your-class',
			]
		);

		$widget->add_control(
			'zb_activetrail_is_acceptance',
			[
				'label' => __( 'Acceptance Required?', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'zb-elementor-forms-activetrail' ),
				'label_off' => __( 'No', 'zb-elementor-forms-activetrail' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'description' => __( 'If you have a acceptance field in order to add to the ActiveTrail list', 'zb-elementor-forms-activetrail' )
			]
		);

		$widget->add_control(
			'zb_activetrail_acceptance',
			[
				'label' => __( 'Acceptance ID', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$widget->add_control(
			'zb_activetrail_email',
			[
				'label' => __( 'Email', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::TEXT,
				'description' => __( 'Email field is required!', 'zb-elementor-forms-activetrail' )
			]
		);

		$widget->add_control(
			'zb_activetrail_is_full_name',
			[
				'label' => __( 'Is Full Name?', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'zb-elementor-forms-activetrail' ),
				'label_off' => __( 'No', 'zb-elementor-forms-activetrail' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'description' => __( 'If it is a fullname it will split the full name in the space between the words for first name and last name', 'zb-elementor-forms-activetrail' )
			]
		);

		$widget->add_control(
			'zb_activetrail_first_name',
			[
				'label' => __( 'First Name', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'zb_activetrail_is_full_name!' => 'yes'
				]
			]
		);

		$widget->add_control(
			'zb_activetrail_last_name',
			[
				'label' => __( 'Last Name', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'zb_activetrail_is_full_name!' => 'yes'
				]
			]
		);

		$widget->add_control(
			'zb_activetrail_full_name',
			[
				'label' => __( 'Full Name', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'zb_activetrail_is_full_name' => 'yes'
				]
			]
		);

		$widget->add_control(
			'zb_activetrail_phone',
			[
				'label' => __( 'Phone', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$widget->add_control(
			'zb_activetrail_mobile',
			[
				'label' => __( 'Mobile', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$widget->add_control(
			'zb_activetrail_fax',
			[
				'label' => __( 'Fax', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$widget->add_control(
			'zb_activetrail_birthday',
			[
				'label' => __( 'Birthday', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$widget->add_control(
			'zb_activetrail_anniversary',
			[
				'label' => __( 'Anniversary', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$widget->add_control(
			'zb_activetrail_city',
			[
				'label' => __( 'City', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$widget->add_control(
			'zb_activetrail_street',
			[
				'label' => __( 'Street', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$widget->add_control(
			'zb_activetrail_zip_code',
			[
				'label' => __( 'ZIP code', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$widget->add_control(
			'zb_activetrail_extra_data_heading',
			[
				'label' => __( 'ActiveTrail Extra Data', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$repeater = new \Elementor\Repeater();

		$ext_field_list = [];
		for($i=1; $i<=25; $i++) {
			$ext_field_list['ext' . $i] = __( 'Extra text' ) . ' ' . $i;
		}

		for($i=1; $i<=5; $i++) {
			$ext_field_list['num' . $i] = __( 'Extra number' ) . ' ' . $i;
		}

		for($i=1; $i<=5; $i++) {
			$ext_field_list['date' . $i] = __( 'Extra date' ) . ' ' . $i;
		}

		$repeater->add_control(
			'zb_activetrail_field', [
				'label' => __( 'ActiveTrail Field', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::SELECT,
				'options' => $ext_field_list
			]
		);

		$repeater->add_control(
			'zb_elementor_form_field_id', [
				'label' => __( 'Form field ID', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::TEXT,
			]
		);


		$widget->add_control(
			'zb_activetrail_extra_fields',
			[
				'label' => __( 'Extra Fields', 'zb-elementor-forms-activetrail' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{ zb_activetrail_field }}',
				'show_label' => false
			]
		);

		$widget->end_controls_section();
	}

	public function on_export( $element ) {}

	public function run( $record, $ajax_handler ) {
		$this->ajax_handler = $ajax_handler;

		$settings = $record->get( 'form_settings' );

		if ( empty( $settings['zb_activetrail_token'] ) || empty ( $settings['zb_activetrail_group_id'] ) ) {
			$this->add_admin_error( 'ZazimBareshet - Elementor Forms ActiveTrail: Token and Group ID fields are required!' );
			return;
		}

		if( $settings['zb_activetrail_is_acceptance'] ) {
			$acceptance = $this->get_field_value( $record, $settings['zb_activetrail_acceptance'] );
			if ( !$acceptance ) {
				return;
			}
		}

		$token = $settings['zb_activetrail_token'];
		$group_id = $settings['zb_activetrail_group_id'];

		if( $settings['zb_activetrail_is_full_name'] ) {
			$full_name = $this->get_field_value( $record, $settings['zb_activetrail_full_name'] );
			$full_name_split = explode( " ", $full_name, 2 );
			$first_name = $full_name_split[0];
			$last_name = isset( $full_name_split[1] ) ? $full_name_split[1] : '';
		} else {
			$first_name = $this->get_field_value( $record, $settings['zb_activetrail_first_name'] );
			$last_name = $this->get_field_value( $record, $settings['zb_activetrail_last_name'] );
		}


		$email_field = $this->get_field_value( $record, $settings['zb_activetrail_email'] );

		if ( !is_email( $email_field ) ) {
			$this->add_admin_error( 'ZazimBareshet - Elementor Forms ActiveTrail: Email field is invalid. Email field is required!' );
			return;
		}

		$basic_fields = [
			'email' => $email_field,
			'first_name' => $first_name,
			'last_name' => $last_name,
			'phone1' => $this->get_field_value( $record, $settings['zb_activetrail_phone'] ),
			'phone2' => $this->get_field_value( $record, $settings['zb_activetrail_mobile'] ),
			'fax' => $this->get_field_value( $record, $settings['zb_activetrail_fax'] ),
			'birthday' => $this->get_field_value( $record, $settings['zb_activetrail_birthday'] ),
			'anniversary' => $this->get_field_value( $record, $settings['zb_activetrail_anniversary'] ),
			'city' => $this->get_field_value( $record, $settings['zb_activetrail_city'] ),
			'street' => $this->get_field_value( $record, $settings['zb_activetrail_street'] ),
			'zip_code' => $this->get_field_value( $record, $settings['zb_activetrail_zip_code'] ),
		];

		$basic_fields = array_filter( $basic_fields );

		$extra_fields = [];
		if( $settings['zb_activetrail_extra_fields'] ) {
			foreach( $settings['zb_activetrail_extra_fields'] as $field ) {
				$field_val = $this->get_field_value( $record, $field['zb_elementor_form_field_id'] );
				if( $field_val ) {
					$extra_fields[$field['zb_activetrail_field']] = $field_val;
				}
			}
		}

		$options_fields = [
			'is_deleted' => false
		];

		$fields = array_merge( $basic_fields, $extra_fields, $options_fields );

		$post_response = $this->post( $token, $group_id, wp_json_encode( $fields ) );
		if ( $post_response['status'] === 'error' ) {
			$this->add_admin_error( $post_response['message'] );
		}

	}

	private function get_field_value( $record, $field_id ) {
		if( empty( $field_id ) ) {
			return '';
		}

		$field = $record->get_field( [ 'id' => $field_id ] );

		if( $field ) {
			return $field[$field_id]['value'];
		}

		return $field_id;
	}

	private function post( $token, $group_id, $json_data ) {

		$url = 'http://webapi.mymarketing.co.il/api/groups/'.$group_id.'/members?campaignid=';
		$api_request_args = [
			'headers' => [
				'Authorization' => 'Basic ' . $token,
				'Content-Type' => 'application/json',
				'Content-Length' => strlen( $json_data )
			],
			'body' => $json_data
		];

		$response = wp_remote_post( $url, $api_request_args );

		if ( is_wp_error( $response ) ) {
			return [
				'status' => 'error',
				'message' => __( 'ZazimBareshet - Elementor Forms ActiveTrail: API response problem', 'zb-elementor-forms-activetrail' )
			];
		}

		$body = json_decode( wp_remote_retrieve_body( $response ), true );
		if ( isset( $body['id'] ) && isset( $body['state'] ) ) {
			return [
				'status' => 'success',
				'data' => $body
			];
		} else {
			return [
				'status' => 'error',
				'message' => __( 'ZazimBareshet - Elementor Forms ActiveTrail: Something went wrong check that the token and the group id are valid', 'zb-elementor-forms-activetrail' )
			];
		}

	}

	private function add_admin_error( $message ) {
		if ( current_user_can( 'edit_post', $_POST['post_id'] ) ) {
			$this->ajax_handler->add_admin_error_message( $message );
		}
	}
}

add_action( 'elementor_pro/init', function() {
	\ElementorPro\Modules\Forms\Module::instance()->add_form_action( 'zb-elementor-forms-activetrail', new ZB_Elementor_Forms_ActiveTrail_Action() );
});
