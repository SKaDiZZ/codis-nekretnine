<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://codis.com
 * @since      1.0.0
 *
 * @package    Codis_Nekretnine
 * @subpackage Codis_Nekretnine/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Codis_Nekretnine
 * @subpackage Codis_Nekretnine/admin
 * @author     Samir Kahvedzic <akirapowered@gmail.com>
 */
class Codis_Nekretnine_Dashboard {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	// Dodaj widget sa upustvima za koristenje u dashboard
	public function add_statistics_dashboard_widget() {

		wp_add_dashboard_widget(
	                 'statistics_dashboard_widget',         							// Widget slug.
	                 'Nekretnine',         				 								// Title.
	                 array($this, 'statistics_widget') 	 								// Display function.
	        );
	}

	// Dodaj sadrzaj u widget sa upustvima za koristenje
	public function statistics_widget() {

			$query = new WP_Query( array( 'post_type' => 'nekretnine', 'post_status' => 'publish') );
			$query1 = new WP_Query( array( 'post_type' => 'nekretnine', 'post_status' => 'publish', 'meta_key' => 'slajder', 'meta_value' => 'true' ) );
			$query3 = new WP_Query( array( 'post_type' => 'nekretnine', 'post_status' => 'publish', 'meta_key' => 'tip_oglasa', 'meta_value' => 'prodaja' ) );
			$query4 = new WP_Query( array( 'post_type' => 'nekretnine', 'post_status' => 'publish', 'meta_key' => 'tip_oglasa', 'meta_value' => 'iznajmljivanje' ) );
			$query5 = new WP_Query( array( 'post_type' => 'nekretnine', 'post_status' => 'publish', 'meta_key' => 'status', 'meta_value' => 'dostupno' ) );
			$query6 = new WP_Query( array( 'post_type' => 'nekretnine', 'post_status' => 'publish', 'meta_key' => 'status', 'meta_value' => 'rezervisano' ) );
			$query7 = new WP_Query( array( 'post_type' => 'nekretnine', 'post_status' => 'publish', 'meta_key' => 'status', 'meta_value' => 'izdano' ) );
			$query8 = new WP_Query( array( 'post_type' => 'nekretnine', 'post_status' => 'publish', 'meta_key' => 'status', 'meta_value' => 'prodano' ) );

		?>

				<ul>

					<li class="page-count lista">
						<span class="dashicons dashicons-admin-home"></span>
						Broj Nekretnina :
						<span class="count">
							<?php echo $query->found_posts; ?>
						</span>
					</li>

					<li class="page-count lista">
						<span class="dashicons dashicons-tickets-alt"></span>
						Broj Nekretnina u Slajderu :
						<span class="count">
							<?php echo $query1->found_posts; ?>
						</span>
					</li>

					<li class="page-count lista">
						<span class="dashicons dashicons-admin-network"></span>
						Prodaje se :
						<span class="count">
							<?php echo $query3->found_posts; ?>
						</span>
					</li>

					<li class="page-count lista">
						<span class="dashicons dashicons-update"></span>
						Iznajmljuje se :
						<span class="count">
							<?php echo $query4->found_posts; ?>
						</span>
					</li>

					<li class="page-count lista">
						<span class="dashicons dashicons-admin-multisite"></span>
						Dostupno :
						<span class="count">
							<?php echo $query5->found_posts; ?>
						</span>
					</li>

					<li class="page-count lista">
						<span class="dashicons dashicons-thumbs-up"></span>
						Rezervisano :
						<span class="count">
							<?php echo $query6->found_posts; ?>
						</span>
					</li>

					<li class="page-count lista">
						<span class="dashicons dashicons-smiley"></span>
						Izdano :
						<span class="count">
							<?php echo $query7->found_posts; ?>
						</span>
					</li>

					<li class="page-count lista">
						<span class="dashicons dashicons-yes"></span>
						Prodano :
						<span class="count">
							<?php echo $query8->found_posts; ?>
						</span>
					</li>

				</ul>

			<div class="controls">
				<a class="button button-primary" href="<?php echo get_site_url(); ?>/wp-admin/edit.php?post_type=nekretnine">Prikaži Nekretnine</a>
				<a class="button button-primary" href="<?php echo get_site_url(); ?>/wp-admin/post-new.php?post_type=nekretnine">Dodaj Nekretninu</a>
			</div>

		<?php

	}

	/**
	 * Dodaj opcije za nekretnine slajder
	 */
 	public function add_slajder_dashboard_widget() {

 		wp_add_dashboard_widget(
 	                 'codis_slajder_dashboard_widget',         					// Widget slug.
 	                 'Slajder',         				 						// Title.
 	                 array($this, 'slajder_widget') 	 						// Display function.
 	        );
 	}

	public function slajder_widget() {

		$slajdovi = new WP_Query( array( 'post_type' => 'nekretnine', 'post_status' => 'publish', 'meta_key' => 'slajder', 'meta_value' => 'true' ) );

		if($slajdovi->have_posts()): ?>

			Nekretnine koje su trenutno u slajderu:

		<ul>
			<li id="update-message"></li>
                    <?php while($slajdovi->have_posts()):$slajdovi->the_post(); ?>

	                                    <li class="page-count lista"><span class="dashicons dashicons-tickets-alt"></span>
											<a href="<?php echo get_edit_post_link(); ?>"><?php echo the_title(); ?></a>
											<span class="count">
												<a href="" id="<?php the_ID(); ?>" class="removeslide">X</a>
											</span>
										</li>

                    <?php endwhile; ?>
		</ul>

		<?php endif;

	}

	public function slajder_widget_ajax() {

		global $wpdb; // this is how you get access to the database

		if ($_POST['remove_from_slider'] == 'yes'){

			update_post_meta($_POST['slide_id'], 'slajder', 'false');
			echo 'Slajd je uklonjen.';

		}

		die();

	}

}
