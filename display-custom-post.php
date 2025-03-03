<?php
function create_case_study_post_type()
{
    $labels = array(
        'name' => 'Case Studies',
        'singular_name' => 'Case Study',
        'menu_name' => 'Case Studies',
        'name_admin_bar' => 'Case Study',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Case Study',
        'new_item' => 'New Case Study',
        'edit_item' => 'Edit Case Study',
        'view_item' => 'View Case Study',
        'all_items' => 'All Case Studies',
        'search_items' => 'Search Case Studies',
        'not_found' => 'No case studies found.',
        'not_found_in_trash' => 'No case studies found in Trash.',
    );

    $args = array(
        'label' => 'Case Study',
        'labels' => $labels,
        'public' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'cps-case-study'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'show_in_rest' => true, // Enables Gutenberg support
    );

    register_post_type('case_study', $args);
}
add_action('init', 'create_case_study_post_type');

function create_case_study_taxonomy()
{
    $labels = array(
        'name' => 'Case Study Categories',
        'singular_name' => 'Case Study Category',
        'search_items' => 'Search Categories',
        'all_items' => 'All Categories',
        'parent_item' => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item' => 'Edit Category',
        'update_item' => 'Update Category',
        'add_new_item' => 'Add New Category',
        'new_item_name' => 'New Category Name',
        'menu_name' => 'Case Study Categories',
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true, // Set to true for category-like behavior
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'case-study-category'),
        'show_in_rest' => true, // Enables Gutenberg support
    );

    register_taxonomy('case_study_category', array('case_study'), $args);
}
add_action('init', 'create_case_study_taxonomy');

// custom  meta box
function case_study_meta_box()
{
    add_meta_box(
        'case_study_meta',
        'Case Study Details',
        'case_study_meta_box_callback',
        'case_study',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'case_study_meta_box');

// Meta box callback function
function case_study_meta_box_callback($post)
{
    $brand_name = get_post_meta($post->ID, '_case_study_brand_name', true);
	$brand_profile_link = get_post_meta($post->ID, '_case_study_brand_profile_link', true);
	$tasks = get_post_meta($post->ID, '_case_study_tasks', true);
    $volume = get_post_meta($post->ID, '_case_study_volume', true);
    $industry = get_post_meta($post->ID, '_case_study_industry', true);
	$leading_text=get_post_meta($post->ID, '_case_study_leading_text', true);
	
	$professionals_text1=get_post_meta($post->ID, '_case_study_professionals_text1', true);
	$professionals_value1=get_post_meta($post->ID, '_case_study_professionals_value1', true);
	$professionals_text2=get_post_meta($post->ID, '_case_study_professionals_text2', true);
	$professionals_value2=get_post_meta($post->ID, '_case_study_professionals_value2', true);
	$professionals_text3=get_post_meta($post->ID, '_case_study_professionals_text3', true);
	$professionals_value3=get_post_meta($post->ID, '_case_study_professionals_value3', true);
	$professionals_text4=get_post_meta($post->ID, '_case_study_professionals_text4', true);
	$professionals_value4=get_post_meta($post->ID, '_case_study_professionals_value4', true);
	
	
    $proposed_solutions1 = get_post_meta($post->ID, '_case_study_solutions1', true);
    $proposed_solutions2 = get_post_meta($post->ID, '_case_study_solutions2', true);
    $proposed_solutions3 = get_post_meta($post->ID, '_case_study_solutions3', true);
    $proposed_solutions4 = get_post_meta($post->ID, '_case_study_solutions4', true);
    $proposed_solutions5 = get_post_meta($post->ID, '_case_study_solutions5', true);
    $proposed_solutions6 = get_post_meta($post->ID, '_case_study_solutions6', true);

    $client_image_url = get_post_meta($post->ID, '_case_study_client_image', true);
    $client_logo_url = get_post_meta($post->ID, '_case_study_client_logo', true);
    $client_name = get_post_meta($post->ID, '_case_study_client_name', true);
    $client_country = get_post_meta($post->ID, '_case_study_client_country', true);
    $client_reviews = get_post_meta($post->ID, '_case_study_client_reviews', true);
	$client_profile_link = get_post_meta($post->ID, '_case_study_client_profile_link', true);
	
    ?>
<p>
    <label for="case_study_brand_name">Brand Name:</label>
    <input type="text" id="case_study_brand_name" name="case_study_brand_name" value="<?php echo esc_attr($brand_name); ?>"
        class="widefat">
</p>
<p>
    <label for="case_study_brand_profile_link">Brand Profile Link:</label>
    <input type="text" id="case_study_brand_profile_link" name="case_study_brand_profile_link" value="<?php echo esc_attr($brand_profile_link); ?>"
        class="widefat">
</p>
<p>
    <label for="case_study_tasks">Tasks:</label>
    <input type="text" id="case_study_tasks" name="case_study_tasks" value="<?php echo esc_attr($tasks); ?>"
        class="widefat">
</p>
<p>
    <label for="case_study_volume">Volume:</label>
    <input type="text" id="case_study_volume" name="case_study_volume" value="<?php echo esc_attr($volume); ?>"
        class="widefat">
</p>
<p>
    <label for="case_study_industry">Industry:</label>
    <input type="text" id="case_study_industry" name="case_study_industry" value="<?php echo esc_attr($industry); ?>"
        class="widefat">
</p>
<p>
    <label for="case_study_industry">Leading Text:</label>
    <input type="text" id="case_study_leading_text" name="case_study_leading_text" value="<?php echo esc_attr($leading_text); ?>"
        class="widefat">
</p>

<p>
    <label for="case_study_professionals_text1">professionals_text1:</label>
    <input type="text" id="case_study_professionals_text1" name="case_study_professionals_text1" value="<?php echo esc_attr($professionals_text1); ?>"
        class="widefat">
</p>
<p>
    <label for="case_study_professionals_value1">professionals_value1</label>
    <input type="text" id="case_study_professionals_value1" name="case_study_professionals_value1" value="<?php echo esc_attr($professionals_value1); ?>"
        class="widefat">
</p>

<p>
    <label for="case_study_professionals_text2">professionals_text2:</label>
    <input type="text" id="case_study_professionals_text2" name="case_study_professionals_text2" value="<?php echo esc_attr($professionals_text2); ?>"
        class="widefat">
</p>
<p>
    <label for="case_study_professionals_value2">professionals_value2</label>
    <input type="text" id="case_study_professionals_value2" name="case_study_professionals_value2" value="<?php echo esc_attr($professionals_value2); ?>"
        class="widefat">
</p>

<p>
    <label for="case_study_professionals_text3">professionals_text3:</label>
    <input type="text" id="case_study_professionals_text3" name="case_study_professionals_text3" value="<?php echo esc_attr($professionals_text3); ?>"
        class="widefat">
</p>
<p>
    <label for="case_study_professionals_value3">professionals_value3</label>
    <input type="text" id="case_study_professionals_value3" name="case_study_professionals_value3" value="<?php echo esc_attr($professionals_value3); ?>"
        class="widefat">
</p>

<p>
    <label for="case_study_professionals_text4">professionals_text4:</label>
    <input type="text" id="case_study_professionals_text4" name="case_study_professionals_text4" value="<?php echo esc_attr($professionals_text4); ?>"
        class="widefat">
</p>
<p>
    <label for="case_study_professionals_value4">professionals_value4</label>
    <input type="text" id="case_study_professionals_value4" name="case_study_professionals_value4" value="<?php echo esc_attr($professionals_value4); ?>"
        class="widefat">
</p>

<p>
    <label for="case_study_solutions1">Proposed Solutions1</label>
    <input type="text" id="case_study_solutions1" name="case_study_solutions1"
        value="<?php echo esc_attr($proposed_solutions1); ?>" class="widefat">
</p>
<p>
    <label for="case_study_solutions2">Proposed Solutions2</label>
    <input type="text" id="case_study_solutions2" name="case_study_solutions2"
        value="<?php echo esc_attr($proposed_solutions2); ?>" class="widefat">
</p>
<p>
    <label for="case_study_solutions3">Proposed Solutions3</label>
    <input type="text" id="case_study_solutions3" name="case_study_solutions3"
        value="<?php echo esc_attr($proposed_solutions3); ?>" class="widefat">
</p>
<p>
    <label for="case_study_solutions4">Proposed Solutions4</label>
    <input type="text" id="case_study_solutions4" name="case_study_solutions4"
        value="<?php echo esc_attr($proposed_solutions4); ?>" class="widefat">
</p>
<p>
    <label for="case_study_solutions5">Proposed Solutions5</label>
    <input type="text" id="case_study_solutions5" name="case_study_solutions5"
        value="<?php echo esc_attr($proposed_solutions5); ?>" class="widefat">
</p>
<p>
    <label for="case_study_solutions6">Proposed Solutions6</label>
    <input type="text" id="case_study_solutions16" name="case_study_solutions6"
        value="<?php echo esc_attr($proposed_solutions6); ?>" class="widefat">
</p>



<div>
    <p>
        <label for="case_study_client_image">Client Image:</label>
        <input type="text" id="case_study_client_image" name="case_study_client_image"
            value="<?php echo esc_attr($client_image_url); ?>" class="widefat">
        <input type="button" id="upload_image_button" class="button" value="Upload Image">
    </p>
    <script>
    jQuery(document).ready(function($) {
        $('#upload_image_button').click(function() {
            var send_attachment_bkp = wp.media.editor.send.attachment;
            wp.media.editor.send.attachment = function(props, attachment) {
                $('#case_study_client_image').val(attachment.url);
                wp.media.editor.send.attachment = send_attachment_bkp;
            }
            wp.media.editor.open();
            return false;
        });
    });
    </script>
</div>

<p>
    <label for="case_study_client_name">Client Name</label>
    <input type="text" id="case_study_client_name" name="case_study_client_name"
        value="<?php echo esc_attr($client_name); ?>" class="widefat">
</p>
<p>
    <label for="case_study_client_profile_link">Profile Link</label>
    <input type="text" id="case_study_client_profile_link" name="case_study_client_profile_link"
        value="<?php echo esc_attr($client_profile_link); ?>" class="widefat">
</p>
<p>
    <label for="case_study_client_country">Client Country</label>
    <input type="text" id="case_study_client_country" name="case_study_client_country"
        value="<?php echo esc_attr($client_country); ?>" class="widefat">
</p>
<p>
    <label for="case_study_client_reviews">Client Reviews</label>
    <input type="text" id="case_study_client_reviews" name="case_study_client_reviews"
        value="<?php echo esc_attr($client_reviews); ?>" class="widefat">
</p>
<?php
}

// Save the meta box data
function save_case_study_meta($post_id)
{
    if (isset($_POST['case_study_brand_name'])) {
        update_post_meta($post_id, '_case_study_brand_name', sanitize_text_field($_POST['case_study_brand_name']));
    }
	if (isset($_POST['case_study_brand_profile_link'])) {
        update_post_meta($post_id, '_case_study_brand_profile_link', sanitize_text_field($_POST['case_study_brand_profile_link']));
    }
	if (isset($_POST['case_study_tasks'])) {
        update_post_meta($post_id, '_case_study_tasks', sanitize_text_field($_POST['case_study_tasks']));
    }
    if (isset($_POST['case_study_volume'])) {
        update_post_meta($post_id, '_case_study_volume', sanitize_text_field($_POST['case_study_volume']));
    }
    if (isset($_POST['case_study_industry'])) {
        update_post_meta($post_id, '_case_study_industry', sanitize_text_field($_POST['case_study_industry']));
    }
	if (isset($_POST['case_study_leading_text'])) {
        update_post_meta($post_id, '_case_study_leading_text', sanitize_text_field($_POST['case_study_leading_text']));
    }
	
	if (isset($_POST['case_study_professionals_text1'])) {
        update_post_meta($post_id, '_case_study_professionals_text1', sanitize_text_field($_POST['case_study_professionals_text1']));
    }
	if (isset($_POST['case_study_professionals_value1'])) {
        update_post_meta($post_id, '_case_study_professionals_value1', sanitize_text_field($_POST['case_study_professionals_value1']));
    }
	if (isset($_POST['case_study_professionals_text2'])) {
        update_post_meta($post_id, '_case_study_professionals_text2', sanitize_text_field($_POST['case_study_professionals_text2']));
    }
	if (isset($_POST['case_study_professionals_value2'])) {
        update_post_meta($post_id, '_case_study_professionals_value2', sanitize_text_field($_POST['case_study_professionals_value2']));
    }
	if (isset($_POST['case_study_professionals_text3'])) {
        update_post_meta($post_id, '_case_study_professionals_text3', sanitize_text_field($_POST['case_study_professionals_text3']));
    }
	if (isset($_POST['case_study_professionals_value3'])) {
        update_post_meta($post_id, '_case_study_professionals_value3', sanitize_text_field($_POST['case_study_professionals_value3']));
    }
	if (isset($_POST['case_study_professionals_text4'])) {
        update_post_meta($post_id, '_case_study_professionals_text4', sanitize_text_field($_POST['case_study_professionals_text4']));
    }
	if (isset($_POST['case_study_professionals_value4'])) {
        update_post_meta($post_id, '_case_study_professionals_value4', sanitize_text_field($_POST['case_study_professionals_value4']));
    }
	
	
    if (isset($_POST['case_study_solutions1'])) {
        update_post_meta($post_id, '_case_study_solutions1', sanitize_text_field($_POST['case_study_solutions1']));
    }
    if (isset($_POST['case_study_solutions2'])) {
        update_post_meta($post_id, '_case_study_solutions2', sanitize_text_field($_POST['case_study_solutions2']));
    }
    if (isset($_POST['case_study_solutions3'])) {
        update_post_meta($post_id, '_case_study_solutions3', sanitize_text_field($_POST['case_study_solutions3']));
    }
    if (isset($_POST['case_study_solutions4'])) {
        update_post_meta($post_id, '_case_study_solutions4', sanitize_text_field($_POST['case_study_solutions4']));
    }
    if (isset($_POST['case_study_solutions5'])) {
        update_post_meta($post_id, '_case_study_solutions5', sanitize_text_field($_POST['case_study_solutions5']));
    }
    if (isset($_POST['case_study_solutions6'])) {
        update_post_meta($post_id, '_case_study_solutions6', sanitize_text_field($_POST['case_study_solutions6']));
    }
	

	
    if (isset($_POST['case_study_client_image'])) {
        update_post_meta($post_id, '_case_study_client_image', esc_url_raw($_POST['case_study_client_image']));
    }
    if (isset($_POST['case_study_client_name'])) {
        update_post_meta($post_id, '_case_study_client_name', sanitize_text_field($_POST['case_study_client_name']));
    }
    if (isset($_POST['case_study_client_country'])) {
        update_post_meta($post_id, '_case_study_client_country', sanitize_text_field($_POST['case_study_client_country']));
    }
    if (isset($_POST['case_study_client_reviews'])) {
        update_post_meta($post_id, '_case_study_client_reviews', sanitize_text_field($_POST['case_study_client_reviews']));
    }
	if (isset($_POST['case_study_client_profile_link'])) {
        update_post_meta($post_id, '_case_study_client_profile_link', sanitize_text_field($_POST['case_study_client_profile_link']));
    }
}
add_action('save_post', 'save_case_study_meta');

// show data 
function cps_case_study_shortcode()
{
    ob_start();
    // Get all case study categories
    $categories = get_terms(array(
        'taxonomy' => 'case_study_category',
        'hide_empty' => false
    ));

    if (!empty($categories) && !is_wp_error($categories)) {
        ?>
<div id="case-study-container">
    <!-- Categories -->
    <div class="case-study-categories-container">
        <div id="case-study-categories">
            <ul>
                <li><a href="#" class="category-btn active" data-id="all">All</a></li>
                <?php foreach ($categories as $category): ?>
                <li><a href="#" class="category-btn" data-id="<?php echo $category->term_id; ?>">
                        <?php echo esc_html($category->name); ?>
                    </a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <!-- Case study Posts -->
    <div id="case-study-posts"></div>


</div>


<?php
    } else {
        echo '<p>No categories found.</p>';
    }

    return ob_get_clean();
}
add_shortcode('cps_case_study', 'cps_case_study_shortcode');

function load_case_study()
{
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : 'all';
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = 8;

    $args = array(
        'post_type' => 'case_study',  // Ensure this matches your registered post type
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
    );

    if ($category !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'case_study_category', // Ensure this matches your registered taxonomy
                'field' => 'term_id',
                'terms' => $category,
            )
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<div class="case-study-grid">';
        while ($query->have_posts()) {
            $query->the_post();
            ?>
<div class="case-study-item">
    <?php if (has_post_thumbnail()): ?>
    <div class="case-study-thumbnail">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('full'); ?>
        </a>
    </div>
    <?php endif; ?>
    <div class="titel-catagory-container">
        <div class="case-study-categories">
            <?php
                        $terms = get_the_terms(get_the_ID(), 'case_study_category');
                        if ($terms && !is_wp_error($terms)) {
                            $category_names = wp_list_pluck($terms, 'name');
                            echo implode(', ', $category_names);
                        }
                        ?>
        </div>
        <div class="case-study-categories-divider">-</div>
        <h3 class="case-study-post-titel"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    </div>
    <div class="case-study-excerpt">
        <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
    </div>
    <button><a href="<?php the_permalink(); ?>">Learn More</a></button>
</div>
<?php
        }
        echo '</div>';

        // Pagination
        $total_pages = $query->max_num_pages;
        if ($total_pages > 1) {
            echo '<div class="case-study-pagination">';

            // Always show the first page
            echo '<a href="#" class="case-study-pagination-link' . ($paged == 1 ? ' active' : '') . '" data-page="1">1</a> ';

            // Show the current page and the two pages around it
            if ($paged > 4) {
                echo '<span class="dots">...</span> ';
            }

            for ($i = max(2, $paged - 1); $i <= min($total_pages - 1, $paged + 1); $i++) {
                echo '<a href="#" class="case-study-pagination-link' . ($paged == $i ? ' active' : '') . '" data-page="' . $i . '">' . $i . '</a> ';
            }

            if ($paged < $total_pages - 2) {
                echo '<span class="dots">...</span> ';
            }

            // Always show the last page
            if ($total_pages > 1) {
                echo '<a href="#" class="case-study-pagination-link' . ($paged == $total_pages ? ' active' : '') . '" data-page="' . $total_pages . '">' . $total_pages . '</a> ';
            }

            echo '</div>';
        }
    } else {
        echo '<p class="no-case-study">No case studies found in this category.</p>';
    }

    wp_reset_postdata();
    die();
}
add_action('wp_ajax_load_case_study', 'load_case_study');
add_action('wp_ajax_nopriv_load_case_study', 'load_case_study');



// show meta field 
function case_study_meta_shortcode($atts)
{
    $post_id = get_the_ID();

    if (!$post_id) {
        return '';
    }
    // Get meta values
    $tasks = get_post_meta($post_id, '_case_study_tasks', true);
    $volume = get_post_meta($post_id, '_case_study_volume', true);
    $industry = get_post_meta($post_id, '_case_study_industry', true);

    // Check if any value exists
    if (!$tasks && !$volume && !$industry) {
        return '';
    }

    // Build the output
    $output = '<div class="case-study-meta">';
    if (!empty($tasks)) {
        $output .= '<p><strong>Tasks:</strong> ' . esc_html($tasks) . '</p>';
    }
    if (!empty($volume)) {
        $output .= '<p><strong>Volume:</strong> ' . esc_html($volume) . '</p>';
    }
    if (!empty($industry)) {
        $output .= '<p><strong>Industry:</strong> ' . esc_html($industry) . '</p>';
    }
    $output .= '</div>';

    return $output;
}
add_shortcode('case_study_meta', 'case_study_meta_shortcode');


function case_study_solutions_shortcode($atts)
{
    $post_id = get_the_ID();

    if (!$post_id) {
        return '';
    }

    // Get meta values
    $proposed_solutions = [
        get_post_meta($post_id, '_case_study_solutions1', true),
        get_post_meta($post_id, '_case_study_solutions2', true),
        get_post_meta($post_id, '_case_study_solutions3', true),
        get_post_meta($post_id, '_case_study_solutions4', true),
        get_post_meta($post_id, '_case_study_solutions5', true),
        get_post_meta($post_id, '_case_study_solutions6', true),
    ];

    // Check if any value exists
    if (empty(array_filter($proposed_solutions))) {
        return '';
    }

    ob_start(); // Start output buffering
    ?>
<div class="case-study-solutions-metas">
    <?php foreach ($proposed_solutions as $solution): ?>
    <?php if (!empty($solution)): ?>
    <p><?php echo esc_html($solution); ?></p>
    <?php endif; ?>
    <?php endforeach; ?>
</div>
<?php
    return ob_get_clean(); // Return buffered output
}
add_shortcode('case_study_solutions_meta', 'case_study_solutions_shortcode');


function case_study_client_reviews($atts)
{
    $post_id = get_the_ID();

    if (!$post_id) {
        return '';
    }

    // Get meta values
    $case_study_image = get_post_meta($post_id, '_case_study_client_image', true);
    $case_study_client_name = get_post_meta($post_id, '_case_study_client_name', true);
    $case_study_client_country = get_post_meta($post_id, '_case_study_client_country', true);
    $case_study_client_review = get_post_meta($post_id, '_case_study_client_reviews', true);

    // Check if any value exists
    if (!$case_study_image && !$case_study_client_name && !$case_study_client_country && !$case_study_client_review) {
        return '';
    }

    ob_start(); // Start output buffering
    ?>
<div class="case-study-client-review">
    <?php if (!empty($case_study_image)): ?>
    <div class="client-image">
        <img src="<?php echo esc_url($case_study_image); ?>" alt="Client Image" style="max-width:100%; height:auto;">
    </div>
    <?php endif; ?>


    <div class="client-details">
        <?php if (!empty($case_study_client_name)): ?>
        <p class="client-name"><?php echo esc_html($case_study_client_name); ?></p>
        <?php endif; ?>

        <?php if (!empty($case_study_client_country)): ?>
        <p class="client-country"><?php echo esc_html($case_study_client_country); ?></p>
        <?php endif; ?>

        <?php if (!empty($case_study_client_review)): ?>
        <p class="client-review"><?php echo esc_html($case_study_client_review); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php
    return ob_get_clean(); // Return buffered output
}
add_shortcode('case_study_client_reviews', 'case_study_client_reviews');