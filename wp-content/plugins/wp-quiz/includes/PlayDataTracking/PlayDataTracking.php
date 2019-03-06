<?php
/**
 * Play data tracking feature
 *
 * @package WPQuiz
 */

namespace WPQuiz\PlayDataTracking;

use WP_Error;
use WPQuiz\Quiz;

/**
 * Class PlayDataTracking
 */
class PlayDataTracking {

	/**
	 * Initializes.
	 */
	public function init() {
		$rest = new REST();
		$rest->init();
	}

	/**
	 * Adds play data.
	 *
	 * @param Quiz  $quiz      Quiz object.
	 * @param array $play_data Play data.
	 *
	 * @return int|WP_Error Return play_data_id on success or WP_Error on failure.
	 */
	public static function add_play_data( Quiz $quiz, array $play_data ) {
		$insert_data = $quiz->get_quiz_type()->get_inserting_play_data( $quiz, $play_data );

		/**
		 * Allows changing inserting play data of a specific quiz type.
		 *
		 * @since 2.0.0
		 *
		 * @param array $insert_data Play insert data.
		 * @param array $play_data   Unprocessed player data from REST request.
		 * @param Quiz  $quiz        Quiz object.
		 */
		$insert_data = apply_filters( "wp_quiz_{$quiz->get_quiz_type()->get_name()}_inserting_play_data", $insert_data, $play_data, $quiz );

		/**
		 * Allows changing inserting play data.
		 *
		 * @since 2.0.0
		 *
		 * @param array $insert_data Play insert data.
		 * @param array $play_data   Unprocessed player data from REST request.
		 * @param Quiz  $quiz        Quiz object.
		 */
		$insert_data = apply_filters( 'wp_quiz_inserting_play_data', $insert_data, $play_data, $quiz );

		if ( ! $insert_data ) {
			return new WP_Error( 'empty-play-data', __( 'Empty play data', 'wp-quiz-pro' ) );
		}

		$database     = new Database();
		$play_data_id = $database->add( $insert_data );

		if ( ! is_wp_error( $play_data_id ) ) {
			/**
			 * Fires after tracking play data.
			 *
			 * @since 2.0.0
			 *
			 * @param int   $play_data_id Play ID.
			 * @param array $insert_data  Player data.
			 * @param Quiz  $quiz         Quiz object.
			 */
			do_action( 'wp_quiz_after_track_player', $play_data_id, $insert_data, $quiz );
		}

		return $play_data_id;
	}
}
