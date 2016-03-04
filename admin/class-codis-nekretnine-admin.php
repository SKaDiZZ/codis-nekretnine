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
class Codis_Nekretnine_Admin {

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

	/**
	 * Register the stylesheets for the admin area.
	 * @see https://developer.wordpress.org/reference/functions/wp_enqueue_style/
	 * @uses wp_enqueue_style( $handle, $src, $deps, $ver, $media );
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/codis-nekretnine-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 * @see https://developer.wordpress.org/reference/functions/wp_enqueue_script/
	 * @uses wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/codis-nekretnine-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register Nekretnine CUSTOM_POST_TYPE
	 *
	 * @see https://codex.wordpress.org/Function_Reference/register_post_type
	 * @uses register_post_type( $post_type, $args );
	 *
	 * @method void nekretnine_init()
	 * @access public
	 * @var $labels {{array}}
	 * @var $args {{array}}
	 */
	 public function nekretnine_init() {

	    $labels = array(
	        'name'                  => _x( 'Nekretnine', 'Post type general name', 'nekretnine-post-type' ),
	        'singular_name'         => _x( 'Nekretnina', 'Post type singular name', 'nekretnina-singular' ),
	        'menu_name'             => _x( 'Nekretnine', 'Admin Menu text', 'nekretnine-admin-menu' ),
	        'name_admin_bar'        => _x( 'Nekretnina', 'Add New on Toolbar', 'nekretnina-toolbar-add' ),
	        'add_new'               => __( 'Dodaj novu', 'dodaj-novu' ),
	        'add_new_item'          => __( 'Dodaj novu nekretninu', 'dodaj-novu-nekretninu' ),
	        'new_item'              => __( 'Nova nekretnina', 'nova-nekretnina' ),
	        'edit_item'             => __( 'Uredi nekretninu', 'uredi-nekretninu' ),
	        'view_item'             => __( 'Prikazi nekretninu', 'prikazi-nekretninu' ),
	        'all_items'             => __( 'Izlistaj nekretnine', 'izlistaj-nekretnine' ),
	        'search_items'          => __( 'Pretrazi nekretnine', 'pretrazi-nekretnine' ),
	        'parent_item_colon'     => __( 'Glavna nekretnina:', 'glavna-nekretnina' ),
	        'not_found'             => __( 'Trenutno nema nekretnina.', 'nema-nekretnina' ),
	        'not_found_in_trash'    => __( 'Nema nekretnina u kanti za smece.', 'nekretnine-kanta-prazna' ),
	        'featured_image'        => _x( 'Slika nekretnine', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'nekretnina-slika-glavna' ),
	        'set_featured_image'    => _x( 'Postavi sliku nekretnine', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'nekretnina-postavi-sliku' ),
	        'remove_featured_image' => _x( 'Ukloni sliku nekretnine', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'nekretnina-ukloni-sliku' ),
	        'use_featured_image'    => _x( 'Koristi kao sliku nekretnine', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'nekretnina-koristi-kao-sliku' ),
	        'archives'              => _x( 'Arhiva nekretnina', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'nekretnina-arhiva' ),
	        'insert_into_item'      => _x( 'Dodaj u nekretninu', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'nekretnina-dodaj-u' ),
	        'uploaded_to_this_item' => _x( 'Uploadovano u ovu nekretninu', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'nekretnina-dodano-u' ),
	        'filter_items_list'     => _x( 'Filtriraj listu nekretnina', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'nekretnina-filtriraj' ),
	        'items_list_navigation' => _x( 'Navigacija u listi nekretnina', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'nekretnina-lista-navigacija' ),
	        'items_list'            => _x( 'Lista nekretnina', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'nekretnina-lista' ),
	    );

	    $args = array(
			'labels'		=> $labels,
			'public'		=> true,
			'taxonomies'		=> array('category','post_tag'),
			'publicly_queryable' 	=> true,
			'show_ui'            	=> true,
			'show_in_menu'       	=> true,
			'menu_icon'          	=> 'dashicons-admin-home',
			'query_var'          	=> true,
			'rewrite'            	=> array( 'slug' => 'nekretnina' ),
			'capability_type'    	=> 'post',
			'has_archive'        	=> true,
			'hierarchical'       	=> false,
			'menu_position'      	=> null,
			'show_in_rest'       	=> true,
			'rest_base'          	=> 'nekretnine-api',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'supports'           	=> array( 'title', 'editor', 'thumbnail', 'custom-fields'),
	    );

    	register_post_type( 'nekretnine', $args );
	}


	/**
	 * Sakrij custom post fields u nekretninama
	 *
	 * @see https://codex.wordpress.org/Function_Reference/remove_meta_box
	 * @uses remove_meta_box( $id, $page, $context );
	 * @method void customize_meta_boxes();
	 * @access public
	 */
 	public function customize_meta_boxes() {
 	     remove_meta_box('postcustom','nekretnine','normal');
 	}

	/**
	 * Dodaj dodatne podatke o nekretnini
	 *
	 * @see https://developer.wordpress.org/reference/functions/add_meta_box/
	 * @uses add_meta_box ( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null );
	 * @method void dodaj_podatke_o_nekretnini();
	 * @access public
	 */
	public function dodaj_podatke_o_nekretnini() {

		add_meta_box(
			'podaci_o_nekretnini',
			__('Podaci o nekretnini','nekretnina-podaci-o-nekretnini-title'),
			array($this, 'podaci_o_nekretnini'),
                        'nekretnine',
                        'normal',
                        'high'
                    );

	}

	/**
	 * Dodaj dodatna polja za unos podataka o nekretnini
	 *
	 * @see https://codex.wordpress.org/Function_Reference/get_post_custom
	 * @uses get_post_custom();
	 *
	 * @method void podaci_o_nekretnini()
	 * @access public
	 * @global $post
	 * @var $tip_oglasa {{string}} [prodaja, iznajmljivanje]
	 * @var $tip {{string}} [kuca, stan, vikendica, soba, montazni_objekat, apartman, garaza, poslovni prostor, zemljiste, ostalo]
	 * @var $slajder {{boolean}} [true, false] Prikazi nekretninu u slajderu default=false
	 * @var $status {{string}} [dostupno, rezervisano, izdano, prodano]
	 * @var $cijena {{number}} Cijena nekretnine default 0.00 (ako je cijena 0.00 onda je tumaci kao po dogovoru)
	 * @var $grad {{string}} Lokacija nekretnine grad
	 * @var $adresa {{string}} Adresa nekretnine
	 * @var $spavace_sobe {{number}} Broj spavacih soba
	 * @var $kupatila {{number}} Broj kupatila
	 * @var $velicina {{number}} Velicina nekretnine u m2
	 * @var $sprat {{number}} Broj spratova ukoliko je rijec o kuci ili sprat na kojem je smjesten stan, apartman, soba isl.
	 * @var $godina_gradnje {{number}} Godina izgradnje nekretnine
	 * @var $garazna_mjesta {{number}} Broj garaznih ili parking mjesta
	 */
	public function podaci_o_nekretnini() {

		global $post;
		$custom = get_post_custom($post->ID);
		$tip_oglasa = $custom['tip_oglasa'][0];
		$tip = $custom['tip'][0];
		$slajder = $custom['slajder'][0];
		$status = $custom['status'][0];
		$cijena = $custom['cijena'][0];
		$grad = $custom['grad'][0];
		$adresa = $custom['adresa'][0];
		$spavace_sobe = $custom['spavace_sobe'][0];
		$kupatila = $custom['kupatila'][0];
		$velicina = $custom['velicina'][0];
		$sprat = $custom['sprat'][0];
		$godina_gradnje = $custom['godina_gradnje'][0];
		$garazna_mjesta = $custom['garazna_mjesta'][0];

		 // Ukoliko je vrijednost za slajder nije postavljena tretiraj kao false
		 if (!$slajder) { $slajder = 'false'; }

	     ?>
		<table class="form-table">
			<tbody>
				<colgroup>
                    <col span="1" style="width: 20%;">
                    <col span="1" style="width: 40%;">
                    <col span="1" style="width: 40%;">
                </colgroup>
				<tr>
					<th scope="row">
						<label for="tip_oglasa">
							<?php echo __('Tip oglasa: ','nekretnina-tip-oglasa'); ?>
						</label>
					</th>
					<td>
						<?php echo __('Da li prodajete ili iznajmljujete nekretninu ?', 'nekretnina-tip-oglasa-info'); ?>
					</td>
					<td>
						<select name="tip_oglasa" class="ulaz">
                                                    <option value="prodaja" <?php selected( $tip_oglasa, 'prodaja'); ?>>
                                                            <?php echo __('Prodaja','nekretnina-tip-oglasa-prodaja'); ?>
                                                    </option>
                                                    <option value="iznajmljivanje" <?php selected( $tip_oglasa, 'iznajmljivanje'); ?>>
                                                            <?php echo __('Iznajmljivanje','nekretnina-tip-oglasa-iznajmljivanje'); ?>
                                                    </option>
                                                </select>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="tip">
							<?php echo __('Tip Nekretnine: ','nekretnina-tip-nekretnine'); ?>
						</label>
					</th>
					<td>
						<?php echo __('O kojoj vrsti nekretnine je riječ ?','nekretnina-tip-nekretnine-info'); ?>
					</td>
					<td>
						<select name="tip" class="ulaz">
                                                    <option value="kuca" <?php selected( $tip, 'kuca' ); ?>>
                                                            <?php echo __('Kuca','codis-nekretnine-add-kuca'); ?>
                                                    </option>
                                                    <option value="stan" <?php selected( $tip, 'stan' ); ?>>
                                                            <?php echo __('Stan','codis-nekretnine-add-stan'); ?>
                                                    </option>
                                                    <option value="vikendica" <?php selected( $tip, 'vikendica' ); ?>>
                                                            <?php echo __('Vikendica','codis-nekretnine-add-vikendica'); ?>
                                                    </option>
                                                    <option value="soba" <?php selected( $tip, 'soba' ); ?>>
                                                            <?php echo __('Soba','codis-nekretnine-add-soba'); ?>
                                                    </option>
                                                    <option value="montazni_objekat" <?php selected( $tip, 'montazni_objekat' ); ?>>
                                                            <?php echo __('Montazni Objekat','codis-nekretnine-add-montazni'); ?>
                                                    </option>
                                                    <option value="apartman" <?php selected( $tip, 'apartman' ); ?>>
                                                            <?php echo __('Apartman','codis-nekretnine-add-apartman'); ?>
                                                    </option>
                                                    <option value="garaza" <?php selected( $tip, 'garaza' ); ?>>
                                                            <?php echo __('Garaza','codis-nekretnine-add-garaza'); ?>
                                                    </option>
                                                    <option value="poslovni prostor" <?php selected( $tip, 'poslovni prostor' ); ?>>
                                                            <?php echo __('Poslovni prostor','codis-nekretnine-add-poslovni'); ?>
                                                    </option>
                                                    <option value="zemljiste" <?php selected( $tip, 'zemljiste' ); ?>>
                                                            <?php echo __('Zemljiste','codis-nekretnine-add-zemljiste'); ?>
                                                    </option>
                                                    <option value="ostalo" <?php selected( $tip, 'ostalo' ); ?>>
                                                            <?php echo __('Ostalo','codis-nekretnine-add-ostalo'); ?>
                                                    </option>
                                                </select>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="slajder">
							<?php echo __('Slajder:','codis-nekretnine-add-slajder'); ?>
						</label>
					</th>
					<td>
						<?php echo __('Postavite nekretninu u slajder ?','codis-nekretnine-add-slajder-info'); ?>
					</td>
					<td>
						<input type="radio" name="slajder" value="true" <?php checked( $slajder, 'true' ); ?>/>
						<?php echo __('Da','codis-nekretnine-add-slajder-da'); ?>

						&nbsp;&nbsp;&nbsp;&nbsp;

  						<input type="radio" name="slajder" value="false" <?php checked( $slajder, 'false' ); ?>/>
						<?php echo __('Ne','codis-nekretnine-add-slajder-ne'); ?>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="status">
							<?php echo __('Status:','codis-nekretnine-status'); ?>
						</label>
					</th>
					<td>
						<?php echo __('Koji je trenutni status nekretnine ?','codis-nekretnine-status-info'); ?>
					</td>
					<td>
						<select name="status" class="ulaz">
                                                    <option value="dostupno" <?php selected( $status, 'dostupno' ); ?>>
                                                            <?php echo __('Dostupno','codis-nekretnine-add-status-dostupno'); ?>
                                                    </option>
                                                    <option value="rezervisano" <?php selected( $status, 'rezervisano' ); ?>>
                                                            <?php echo __('Rezervisano','codis-nekretnine-add-status-rezervisano'); ?>
                                                    </option>
                                                    <option value="izdano" <?php selected( $status, 'izdano' ); ?>>
                                                            <?php echo __('Izdano','codis-nekretnine-add-status-izdano'); ?>
                                                    </option>
                                                    <option value="prodano" <?php selected( $status, 'prodano' ); ?>>
                                                            <?php echo __('Prodano','codis-nekretnine-add-status-prodano'); ?>
                                                    </option>
                                                </select>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="cijena">
							<?php echo __('Cijena:','codis-nekretnine-cijena'); ?>
						</label>
					</th>
					<td>
						<?php echo __('Unesite cijenu nekretnine, ako ostavite prazno polje onda ce cijena biti po dogovoru.','codis-nekretnine-cijena-info'); ?>
					</td>
					<td>
						<input type="number" name="cijena" value="<?php echo $cijena; ?>" class="ulaz">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="grad">
							<?php echo __('Grad:','codis-nekretnine-grad'); ?>
						</label>
					</th>
					<td>
						<?php echo __('Grad u kojem se nalazi nekretnina.','codis-nekretnine-grad-info'); ?>
					</td>
					<td>
						<input type="text" name="grad" value="<?php echo $grad; ?>" class="ulaz">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="adresa">
							<?php echo __('Adresa:','codis-nekretnine-adresa'); ?>
						</label>
					</th>
					<td>
						<?php echo __('Tačna adresa nekretnine.','codis-nekretnine-adresa-info'); ?>
					</td>
					<td>
						<input type="text" name="adresa" value="<?php echo $adresa; ?>" class="ulaz">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="spavace_sobe">
							<?php echo __('Spavace Sobe:','codis-nekretnine-sobe'); ?>
						</label>
					</th>
					<td>
						<?php echo __('Broj spavaćih soba.','codis-nekretnine-sobe-info'); ?>
					</td>
					<td>
						<input type="number" name="spavace_sobe" value="<?php echo $spavace_sobe; ?>" class="ulaz">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="kupatila">
							<?php echo __('Kupatila:','codis-nekretnine-kupatila'); ?>
						</label>
					</th>
					<td>
						<?php echo __('Broj kupatila.','codis-nekretnine-kupatila-info'); ?>
					</td>
					<td>
						<input type="number" name="kupatila" value="<?php echo $kupatila; ?>" class="ulaz">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="velicina">
							<?php echo __('Velicina:','codis-nekretnine-velicina'); ?>
						</label>
					</th>
					<td>
						<?php echo __('Koja je tačna kvadratura vaše nekretnine ?','codis-nekretnine-velicina-info'); ?>
					</td>
					<td>
						<input type="number" name="velicina" value="<?php echo $velicina; ?>" class="ulaz">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="sprat">
							<?php echo __('Sprat:','codis-nekretnine-sprat'); ?>
						</label>
					</th>
					<td>
						<?php echo __('Sprat na kojem je smještena nekretnina, ukoliko se radi o kući onda broj spratova.','codis-nekretnine-sprat-info'); ?>
					</td>
					<td>
						<input type="number" name="sprat" value="<?php echo $sprat; ?>" class="ulaz">
					</td>
				</tr>
					<tr>
					<th scope="row">
						<label for="godina_gradnje">
							<?php echo __('Godina Gradnje:','codis-nekretnine-godina'); ?>
						</label>
					</th>
					<td>
						<?php echo __('Kada je izgrađena vaša nekretnina ?','codis-nekretnine-godina-info'); ?>
					</td>
					<td>
						<input type="number" name="godina_gradnje" value="<?php echo $godina_gradnje; ?>" class="ulaz">
					</td>
				</tr>
				</tr>
					<tr>
					<th scope="row">
						<label for="garazna_mjesta">
							<?php echo __('Garazna Mjesta:','codis-nekretnine-garazna'); ?>
						</label>
					</th>
					<td>
						<?php echo __('Broj garažnih ili parking mjesta.','codis-nekretnine-garazna-info'); ?>
					</td>
					<td>
						<input type="number" name="garazna_mjesta" value="<?php echo $garazna_mjesta; ?>" class="ulaz">
					</td>
				</tr>
				<tr>
				<th scope="row">
					<label for="slike_nekretnine">
						<?php echo __('Slike nekretnine:','codis-nekretnine-slike'); ?>
					</label>
				</th>
				<td>
					<?php echo __('Slike nekretnine.','codis-nekretnine-slike-info'); ?>
				</td>
				<td>
					<?php

						$slike = get_attached_media( 'image' , $post->ID);

						if ($slike) {
							foreach ($slike as $slika) {

								the_attachment_link( $slika->ID, false, false, false );
							}
						}
					?>

				</td>
			</tr>
			</tbody>
		</table>

	    <?php

	 }

	/**
	 * Spremi podatke o nekretnini u bazu podataka
	 *
	 * @see https://codex.wordpress.org/Function_Reference/update_post_meta
	 * @uses update_post_meta($post_id, $meta_key, $meta_value, $prev_value);
	 * @method void spremi_podatke_o_nekretnini()
	 * @access public
	 * @global $post
	 */
	 public function spremi_podatke_o_nekretnini() {

	 	global $post;
	 	update_post_meta($post->ID, 'tip_oglasa', $_POST['tip_oglasa']);
	 	update_post_meta($post->ID, 'tip', $_POST['tip']);
		update_post_meta($post->ID, 'slajder', $_POST['slajder']);
	 	update_post_meta($post->ID, 'status', $_POST['status']);
	 	update_post_meta($post->ID, 'cijena', $_POST['cijena']);
	 	update_post_meta($post->ID, 'grad', $_POST['grad']);
	 	update_post_meta($post->ID, 'adresa', $_POST['adresa']);
	 	update_post_meta($post->ID, 'spavace_sobe', $_POST['spavace_sobe']);
	 	update_post_meta($post->ID, 'kupatila', $_POST['kupatila']);
	 	update_post_meta($post->ID, 'velicina', $_POST['velicina']);
	 	update_post_meta($post->ID, 'sprat', $_POST['sprat']);
	 	update_post_meta($post->ID, 'godina_gradnje', $_POST['godina_gradnje']);
	 	update_post_meta($post->ID, 'garazna_mjesta', $_POST['garazna_mjesta']);

	 }

}
