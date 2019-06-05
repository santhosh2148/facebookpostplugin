 <?php
 /**
 * Adds Facebook_Post widget.
 */
class Facebook_Post_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'FacebookPost_widget', // Base ID
			esc_html__( 'Facebook Post', 'FBP_domain' ), // Name
			array( 'description' => esc_html__( 'Widget to display Facebook Post', 'FBP_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];  //Whatever you want to display befor the widget(<div>, etc)

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		//widget content output

		echo '<div id="fb-root"></div>
			  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3"></script>
			  <div class="fb-page" data-href="'.$instance['url'].'" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="'.$instance['cover'].'" data-show-facepile="'.$instance['facepile'].'"><blockquote cite="'.$instance['url'].'" class="fb-xfbml-parse-ignore"><a href="'.$instance['url'].'">Marvel</a></blockquote></div>';

		echo $args['after_widget'];  //Whatever you want to display after the widget(<div>, etc) 
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Facebook Post', 'FBP_domain' );

		$url = !  empty( $instance['url'] ) ? $instance['url'] : esc_html__( 'https://www.facebook.com/MarvelAUNZ/', 'FBP_domain' );


		$cover = !  empty( $instance['cover'] ) ? $instance['cover'] : esc_html__( 'false', 'FBP_domain' );

		$facepile = !  empty( $instance['facepile'] ) ? $instance['facepile'] : esc_html__( 'true', 'FBP_domain' );

	

		?>


        <!--TITLE -->
		<p>
		  <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
		   <?php esc_attr_e( 'Title:', 'FBP_domain' ); ?>
		  </label> 
		  <input 
		   class="widefat"
		   id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
		   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
		   type="text"
		   value="<?php echo esc_attr( $title ); ?>">
		</p>

		<!--URL -->
		<p>
		  <label for="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>">
		   <?php esc_attr_e( 'url:', 'FBP_domain' ); ?>
		  </label> 
		  <input 
		   class="widefat"
		   id="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"
		   name="<?php echo esc_attr( $this->get_field_name( 'url' ) ); ?>"
		   type="text"
		   value="<?php echo esc_attr( $url ); ?>">
		</p>

		<!--Cover -->
		<p>
		  <label for="<?php echo esc_attr( $this->get_field_id( 'cover' ) ); ?>">
		   <?php esc_attr_e( 'Hide Cover:', 'FBP_domain' ); ?>
		  </label> 
		  <select id="<?php echo esc_attr( $this->get_field_id( 'cover' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cover' ) ); ?>">
		  	<option value="true" <?php echo esc_attr( $cover == 'true' ) ? 'selected' : ''; ?>>True</option>
		  	<option value="false" <?php echo esc_attr( $cover == 'false' ) ? 'selected' : ''; ?>>False</option>
		  	
		  </select>
		  
		</p>


		<!--Facepile -->
		<p>
		  <label for="<?php echo esc_attr( $this->get_field_id( 'facepile' ) ); ?>">
		   <?php esc_attr_e( 'Show Face Pile:', 'FBP_domain' ); ?>
		  </label> 
		  <select id="<?php echo esc_attr( $this->get_field_id( 'facepile' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facepile' ) ); ?>">
		  	<option value="true" <?php echo esc_attr( $facepile == 'true' ) ? 'selected' : ''; ?>>True</option>
		  	<option value="false" <?php echo esc_attr( $facepile == 'false' ) ? 'selected' : ''; ?>>False</option>
		  	
		  </select>
		  
		</p>


	

		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? sanitize_text_field( $new_instance['url'] ) : '';


		$instance['cover'] = ( ! empty( $new_instance['cover'] ) ) ? sanitize_text_field( $new_instance['cover'] ) : '';


		$instance['facepile'] = ( ! empty( $new_instance['facepile'] ) ) ? sanitize_text_field( $new_instance['facepile'] ) : '';




		return $instance;
	}

}	// class Foo_Widget
?>
