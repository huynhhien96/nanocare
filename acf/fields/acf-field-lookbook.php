<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('NAMESPACE_acf_field_FIELD_NAME') ) :


class happzoo_acf_field_lookbook extends acf_field {

	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	function __construct( $settings ) {
		
		/*
		*  name (string) Single word, no spaces. Underscores allowed
		*/
		$this->name = 'lookbook';

		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		$this->label = 'LookBook';
		
		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
		$this->category = 'basic';
		
		/*
		*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
		*/
		
		$this->defaults = array(
			'lookbook_maximum_product'	=> 2,
		);
		
		/*
		*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
		*  var message = acf._e('FIELD_NAME', 'error');
		*/
		
		$this->l10n = array(
			'error'	=> __('Error! Please enter a higher value', 'TEXTDOMAIN'),
		);
		
		/*
		*  settings (array) Store plugin settings (url, path, version) as a reference for later use with assets
		*/
		$this->settings = $settings;
		// do not delete!
    	parent::__construct();

		// extra
		add_action('wp_ajax_acf/fields/lookbook/query',			array($this, 'ajax_query'));
		add_action('wp_ajax_nopriv_acf/fields/lookbook/query',	array($this, 'ajax_query'));
	}

	function ajax_query() {
    global $wpdb;
    $query = "SELECT ID, post_title, post_name FROM {$wpdb->posts} WHERE post_type='product' and post_status = 'publish'";

    if( isset($_GET['s']) ){
      $keyword = _sanitize_text_fields($_GET['s']);
	    $query .= " and post_title like '%${keyword}%'";
    }

    $query .= ' ORDER BY post_date DESC LIMIT 20';
    $result = $wpdb->get_results($query);
		$products = [];
    if( $result ){
      foreach ($result as $product){
        $thumbnail = get_the_post_thumbnail_url($product->ID);
        $product->thumbnail_url = $thumbnail;
        $products[] = $product;
      }
    }
    echo json_encode($products);
    exit();
	}
	
	/*
	*  render_field_settings()
	*
	*  Create extra settings for your field. These are visible when editing a field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	function render_field_settings( $field ) {
		
		/*
		*  acf_render_field_setting
		*
		*  This function will create a setting for your field. Simply pass the $field parameter and an array of field settings.
		*  The array of settings does not require a `value` or `prefix`; These settings are found from the $field array.
		*
		*  More than one setting can be added by copy/paste the above code.
		*  Please note that you must also have a matching $defaults value for the field name (font_size)
		*/
		
		acf_render_field_setting( $field, array(
			'label'			=> "Maximum Products",
			'instructions'	=> '',
			'type'			=> 'number',
			'name'			=> 'lookbook_maximum_product'
		));

	}
	
	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field (array) the $field being rendered
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	function render_field( $field ) {
	  $value = $field['value'];
	  $listProducts = get_posts(array(
	    'post_type' => 'product',
      'posts_per_page' => 20,
    ));
  ?>
    <div>
      <ul class="list-lookbook">
        <?php
          if( $value ){
            foreach ($value as $photo_id => $productIds){
              $html = "<input type='hidden' name='acf[{$field['key']}][photo][]' value='{$photo_id}'/>";
              $photoUrl = wp_get_attachment_image_url($photo_id);
              $html .= "<div class='col-2 photo'><img src='{$photoUrl}' width='150'></div>";

	            $listChoice = '';
	            $listValues = '';
	            if( $listProducts ){
	              foreach ($listProducts as $product){
	                $isSelected = '';
		              $thumbnail = get_the_post_thumbnail_url($product->ID);
	                if( in_array($product->ID, $productIds) ){
		                $isSelected = 'disabled';
		                $listValues .= "<li><input type='hidden' name='acf[{$field['key']}][photo-{$photo_id}][]' value='{$product->ID}'><span data-id='{$product->ID}' class='acf-rel-item'><div class='thumbnail'><img src='{$thumbnail}' alt='{$product->post_title}'></div>{$product->post_title}<a href='#' class='acf-icon -minus small dark' data-name='remove_item'></a></span></li>";
                  }
		              $listChoice .= "<li><span class='acf-rel-item {$isSelected}' data-id='{$product->ID}'><div class='thumbnail'><img src='{$thumbnail}' alt='{$product->post_title}'></div>{$product->post_title}</span></li>";
                }
	            }

              $html .= "<div class='col-9 tag-products acf-relationship' data-photo='{$photo_id}' data-limit='{$field['lookbook_maximum_product']}'>
                    <div class='filters -f3'>
                      <div class='filter -search'>
                        <span><input placeholder='Search...' data-filter='s' type='text'></span>
                      </div>
                      <div class='filter -post_type'></div>
                    </div>
                    <div class='selection'>
                      <div class='choices'>
                        <ul class='acf-bl list choices-list'>{$listChoice}</ul>
                      </div>
                      <div class='values'>
                        <ul class='acf-bl list values-list ui-sortable'>{$listValues}</ul>
                      </div>
                    </div>
                    <button type='button' data-photo='{$photo_id}' class='acf-button button lookbook-delete'>Delete</button>
                </div>";
	            echo "<li class='row' data-photo='{$photo_id}' id='acf-photo-{$photo_id}' data-align=''>{$html}</li>";
            }
          }
        ?>
      </ul>
      <div class="lookbook-footer">
        <input type="button" class="acf-button button lookbook-add" value="Add Photo"/>
      </div>
    </div>
		<?php
	}

	/*
	*  input_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
	*  Use this action to add CSS + JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_enqueue_scripts)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/
	function input_admin_enqueue_scripts() {
		$url = $this->settings['url'];
		$version = $this->settings['version'];

		// register & include JS
		wp_register_script('happzoo', "{$url}assets/js/input.js", array('acf-input'), time());
		wp_enqueue_script('happzoo');

		// register & include CSS
		wp_register_style('happzoo', "{$url}assets/css/input.css", array('acf-input'), time());
		wp_enqueue_style('happzoo');
	}

	/*
	*  load_value()
	*
	*  This filter is applied to the $value after it is loaded from the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	function load_value( $value, $post_id, $field ) {
	  $value = json_decode($value);
	  return $value;
	}
	
	/*
	*  update_value()
	*
	*  This filter is applied to the $value before it is saved in the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	function update_value( $value, $post_id, $field ) {
		$data = array();

		if( !empty($value['photo']) ){
			$photos = $value['photo'];
			foreach ($photos as $photo_id){
			  if( !empty($value["photo-{$photo_id}"]) ){
				  $products = $value["photo-{$photo_id}"];
				  foreach ($products as $product_id){
					  $data[$photo_id][] = $product_id;
          }
        }
      }
    }
//    echo '<pre>';
//		print_r($data);
//    echo '</pre>';
//    die();
		return json_encode($data);
	}
}

// initialize
new happzoo_acf_field_lookbook( $this->settings );
// class_exists check
endif;