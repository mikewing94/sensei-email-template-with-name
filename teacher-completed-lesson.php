<?php
/**
 * Teacher completed course email
 *
 * @author WooThemes
 * @package Sensei/Templates/Emails/HTML
 * @version 1.6.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php

// Get data for email content
global $sensei_email_data;
extract( $sensei_email_data );

global $wp_user_query;
extract( $wp_user_query ); 

// For gmail compatibility, including CSS styles in head/body are stripped out therefore styles need to be inline. These variables contain rules which are added to the template inline. !important; is a gmail hack to prevent styles being stripped if it doesn't like something.
$small = "text-align: center !important;";

$large = "text-align: center !important;font-size: 350% !important;line-height: 100% !important;";

?>

<?php do_action( 'sensei_before_email_content', $template ); ?>

<p style="<?php echo esc_attr( $small ); ?>"><?php _e( 'Your student', 'woothemes-sensei' ); ?></p>

<h2 style="<?php echo esc_attr( $small ); ?>"><?php echo 'Unique ID:', $learner_id; ?></h2>

<h2 style="<?php echo esc_attr( $large ); ?>"><?php $user = get_user_by( 'id', $learner_id ); echo '' . $user->first_name . ' ' . $user->last_name; ?></h2>

<p style="<?php echo esc_attr( $small ); ?>"><?php echo( __( 'has completed the lesson', 'woothemes-sensei' ) ); ?></p>

<h2 style="<?php echo esc_attr( $large ); ?>"><?php echo get_the_title( $lesson_id ); ?></h2>

<hr/>

<?php do_action( 'sensei_after_email_content', $template ); ?>