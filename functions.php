<?php
/**
 * IRR Theme Functions
 */

if (!defined('ABSPATH')) exit;

// Theme setup
function irr_setup() {
    add_theme_support('title-tag');
    add_theme_support('html5', ['style', 'script']);
}
add_action('after_setup_theme', 'irr_setup');

// Enqueue styles and scripts
function irr_enqueue() {
    // Google Fonts - EB Garamond for headings
    wp_enqueue_style('irr-google-fonts', 'https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap', [], null);

    // Main stylesheet
    wp_enqueue_style('irr-style', get_stylesheet_uri(), ['irr-google-fonts'], '1.0.0');

    // Main JS
    wp_enqueue_script('irr-main', get_template_directory_uri() . '/assets/js/main.js', [], '1.0.0', true);

    // Research chart scripts
    if (is_page('research') || is_page_template('page-research.php')) {
        wp_enqueue_script('irr-chartjs', 'https://cdn.jsdelivr.net/npm/chart.js@4.4.1', [], '4.4.1', true);
        wp_enqueue_script('irr-chartjs-annotation', 'https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@3.0.1', ['irr-chartjs'], '3.0.1', true);

        $chart_inline = <<<'JS'
document.addEventListener('DOMContentLoaded', function () {
  const canvas = document.getElementById('ratesChart');
  if (!canvas || typeof Chart === 'undefined') return;

  const annotationPlugin = window['chartjs-plugin-annotation'] || window.chartjsPluginAnnotation;
  if (annotationPlugin) {
    Chart.register(annotationPlugin);
  }

  const labels = ['2019', '2020', '2021', '2022', '2023', '2024'];
  const data30yr = [4.45, 3.72, 2.96, 5.34, 6.90, 6.85];
  const data15yr = [3.90, 3.15, 2.28, 4.65, 6.15, 6.20];
  const data10yr = [2.75, 1.80, 1.60, 2.95, 3.85, 4.35];

  new Chart(canvas.getContext('2d'), {
    type: 'line',
    data: {
      labels,
      datasets: [
        {
          label: '30-year Fixed Rate Mortgage, Monthly Average',
          data: data30yr,
          borderWidth: 3,
          pointRadius: 3,
          tension: 0.25
        },
        {
          label: '15-year Fixed Rate Mortgage, Monthly Average',
          data: data15yr,
          borderWidth: 3,
          pointRadius: 3,
          tension: 0.25
        },
        {
          label: 'U.S. 10-year Treasury Constant Maturity Rate, Monthly Average',
          data: data10yr,
          borderWidth: 3,
          pointRadius: 3,
          tension: 0.25
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      layout: { padding: { top: 10, right: 10, bottom: 10, left: 10 } },
      interaction: { mode: 'nearest', intersect: false },
      plugins: {
        legend: {
          position: 'bottom',
          labels: { boxWidth: 14, boxHeight: 14 }
        },
        tooltip: { enabled: true },
        annotation: {
          annotations: {
            peakLabel: {
              type: 'label',
              xValue: '2023',
              yValue: 7.62,
              backgroundColor: 'rgba(255,255,255,0.9)',
              borderColor: 'rgba(0,0,0,0.15)',
              borderWidth: 1,
              padding: 8,
              content: ['Recent peak in', 'October 2023 at 7.62%'],
              textAlign: 'center',
              font: { size: 12, weight: '600' }
            },
            troughLabel: {
              type: 'label',
              xValue: '2020',
              yValue: 2.69,
              backgroundColor: 'rgba(255,255,255,0.9)',
              borderColor: 'rgba(0,0,0,0.15)',
              borderWidth: 1,
              padding: 8,
              content: ['Recent trough in', 'December 2020 at 2.69%'],
              textAlign: 'center',
              font: { size: 12, weight: '600' }
            }
          }
        }
      },
      scales: {
        y: {
          title: { display: true, text: 'Percent' },
          beginAtZero: true,
          suggestedMax: 8,
          ticks: { stepSize: 1 },
          grid: { color: 'rgba(0,0,0,0.08)' }
        },
        x: {
          grid: { display: false }
        }
      }
    }
  });
});
JS;

        wp_add_inline_script('irr-chartjs-annotation', $chart_inline, 'after');
    }
}
add_action('wp_enqueue_scripts', 'irr_enqueue');

// Remove unnecessary WordPress stuff
function irr_cleanup() {
    // Remove block library styles
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('classic-theme-styles');

    // Remove global styles (Full Site Editing)
    wp_dequeue_style('global-styles');
    wp_dequeue_style('wp-global-styles');
    wp_dequeue_style('core-block-supports');

    // Remove emoji styles
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');

    // Remove Customizer CSS
    wp_dequeue_style('wp-custom-css');
}
add_action('wp_enqueue_scripts', 'irr_cleanup', 100);

// Remove all global styles actions
function irr_remove_all_global_styles() {
    remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
    remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
    remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
    remove_action('wp_head', 'wp_enqueue_global_styles', 1);

    // Remove classic theme styles
    remove_action('wp_enqueue_scripts', 'wp_enqueue_classic_theme_styles');
}
add_action('init', 'irr_remove_all_global_styles', 1);

// Restrict search to only blog posts (not pages)
function irr_search_filter($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_search()) {
        $query->set('post_type', 'post');
    }
}
add_action('pre_get_posts', 'irr_search_filter');

// Create required pages if they don't exist
function irr_create_pages() {
    // Get Started page
    $get_started_page = get_page_by_path('get-started');

    if (!$get_started_page) {
        wp_insert_post(array(
            'post_title'     => 'Get Started',
            'post_name'      => 'get-started',
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'page_template'  => 'page-get-started.php',
            'post_content'   => '',
        ));
    }

    // Thank You page
    $thank_you_page = get_page_by_path('thank-you');

    if (!$thank_you_page) {
        wp_insert_post(array(
            'post_title'     => 'Thank You',
            'post_name'      => 'thank-you',
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'page_template'  => 'page-thank-you.php',
            'post_content'   => '',
        ));
    }

    // About page
    $about_page = get_page_by_path('about');

    if (!$about_page) {
        wp_insert_post(array(
            'post_title'     => 'About',
            'post_name'      => 'about',
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'page_template'  => 'page-about.php',
            'post_content'   => '',
        ));
    }
}
add_action('after_switch_theme', 'irr_create_pages');

// Also run on init if page doesn't exist (one-time check)
function irr_check_pages() {
    if (get_option('irr_pages_created_v3')) {
        return;
    }

    irr_create_pages();
    update_option('irr_pages_created_v3', true);
}
add_action('init', 'irr_check_pages');

// Redirect /get-a-mortgage/ to /get-started/
function irr_redirect_get_a_mortgage() {
    if (isset($_SERVER['REQUEST_URI'])) {
        $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        if ($path === 'get-a-mortgage') {
            wp_redirect(home_url('/get-started/'), 301);
            exit;
        }
    }
}
add_action('template_redirect', 'irr_redirect_get_a_mortgage');

// Register ACF fields for About page
function irr_register_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_about_page',
        'title' => 'About Page Content',
        'fields' => array(
            // Section 1: About IRR
            array(
                'key' => 'field_about_section_1_title',
                'label' => 'Section 1 - Title',
                'name' => 'about_section_1_title',
                'type' => 'text',
                'default_value' => 'About Interest Rate Research',
            ),
            array(
                'key' => 'field_about_section_1_content',
                'label' => 'Section 1 - Content',
                'name' => 'about_section_1_content',
                'type' => 'wysiwyg',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
            ),
            // Section 2: Our Organization
            array(
                'key' => 'field_about_section_2_title',
                'label' => 'Section 2 - Title',
                'name' => 'about_section_2_title',
                'type' => 'text',
                'default_value' => 'Our Organization',
            ),
            array(
                'key' => 'field_about_section_2_content',
                'label' => 'Section 2 - Content',
                'name' => 'about_section_2_content',
                'type' => 'wysiwyg',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
            ),
            // Section 3: How It Works
            array(
                'key' => 'field_about_section_3_title',
                'label' => 'Section 3 - Title',
                'name' => 'about_section_3_title',
                'type' => 'text',
                'default_value' => 'How It Works',
            ),
            array(
                'key' => 'field_about_section_3_content',
                'label' => 'Section 3 - Content',
                'name' => 'about_section_3_content',
                'type' => 'wysiwyg',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
            ),
            // Section 4: The Guarantee
            array(
                'key' => 'field_about_section_4_title',
                'label' => 'Section 4 - Title',
                'name' => 'about_section_4_title',
                'type' => 'text',
                'default_value' => 'The Lower Rate Guarantee',
            ),
            array(
                'key' => 'field_about_section_4_content',
                'label' => 'Section 4 - Content',
                'name' => 'about_section_4_content',
                'type' => 'wysiwyg',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
            ),
            // Section 5: Who Is Eligible
            array(
                'key' => 'field_about_section_5_title',
                'label' => 'Section 5 - Title',
                'name' => 'about_section_5_title',
                'type' => 'text',
                'default_value' => 'Who Is Eligible?',
            ),
            array(
                'key' => 'field_about_section_5_content',
                'label' => 'Section 5 - Content',
                'name' => 'about_section_5_content',
                'type' => 'wysiwyg',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
            ),
            // Section 6: Research Foundation
            array(
                'key' => 'field_about_section_6_title',
                'label' => 'Section 6 - Title',
                'name' => 'about_section_6_title',
                'type' => 'text',
                'default_value' => 'Research Foundation',
            ),
            array(
                'key' => 'field_about_section_6_content',
                'label' => 'Section 6 - Content',
                'name' => 'about_section_6_content',
                'type' => 'wysiwyg',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
            ),
            // Section 7: Contact
            array(
                'key' => 'field_about_section_7_title',
                'label' => 'Section 7 - Title',
                'name' => 'about_section_7_title',
                'type' => 'text',
                'default_value' => 'Contact Us',
            ),
            array(
                'key' => 'field_about_section_7_content',
                'label' => 'Section 7 - Content',
                'name' => 'about_section_7_content',
                'type' => 'wysiwyg',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-about.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
    ));
}
add_action('init', 'irr_register_acf_fields');
