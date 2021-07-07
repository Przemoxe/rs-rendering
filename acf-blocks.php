<?php
function register_acf_block_types()
{

    acf_register_block_type(array(
        'name' => 'section',
        'title' => __('section'),
        'description' => __('sekcja na stronie głównej'),
        'category' => 'formatting',
        'icon' => 'admin-comments',
        'keywords' => array('sekcja'),
        'mode' => 'preview',
        'supports' => array(
            'align' => true,
            'mode' => false,
            '__experimental_jsx' => true,
        ),
        'render_callback' => 'section_acf_block_render_callback',
    ));
    acf_register_block_type(array(
        'name' => 'section2',
        'title' => __('section2'),
        'description' => __('sekcja2 na stronie głównej'),
        'category' => 'formatting',
        'icon' => 'admin-comments',
        'keywords' => array('sekcja2'),
        'mode' => 'preview',
        'supports' => array(
            'align' => true,
            'mode' => true,
            '__experimental_jsx' => true,
        ),
        'render_callback' => 'section2_acf_block_render_callback',
    ));

    acf_register_block_type(array(
        'name' => 'slider',
        'title' => __('slider'),
        'description' => __('slider na stronie głównej'),
        'category' => 'formatting',
        'icon' => 'admin-comments',
        'keywords' => array('slider'),
        'mode' => 'preview',
        'supports' => array(
            'align' => true,
            'mode' => true,
            '__experimental_jsx' => true,
        ),
        'render_callback' => 'slider_acf_block_render_callback',
    ));

    acf_register_block_type(array(
        'name' => 'section3',
        'title' => __('section3'),
        'description' => __('section3 na stronie głównej'),
        'category' => 'formatting',
        'icon' => 'admin-comments',
        'keywords' => array('section3'),
        'mode' => 'preview',
        'supports' => array(
            'align' => true,
            'mode' => true,
            '__experimental_jsx' => true,
        ),
        'render_callback' => 'section3_acf_block_render_callback',
    ));
    
    acf_register_block_type(array(
        'name' => 'section4',
        'title' => __('section4'),
        'description' => __('section4 na stronie głównej'),
        'category' => 'formatting',
        'icon' => 'admin-comments',
        'keywords' => array('section4'),
        'mode' => 'preview',
        'supports' => array(
            'align' => true,
            'mode' => true,
            '__experimental_jsx' => true,
        ),
        'render_callback' => 'section4_acf_block_render_callback',
    ));
    acf_register_block_type(array(
        'name' => 'section5',
        'title' => __('section5'),
        'description' => __('section5 na stronie głównej'),
        'category' => 'formatting',
        'icon' => 'admin-comments',
        'keywords' => array('section5'),
        'mode' => 'preview',
        'supports' => array(
            'align' => true,
            'mode' => true,
            '__experimental_jsx' => true,
        ),
        'render_callback' => 'section5_acf_block_render_callback',
    ));
    acf_register_block_type(array(
        'name' => 'section6',
        'title' => __('section6'),
        'description' => __('section6 na stronie głównej'),
        'category' => 'formatting',
        'icon' => 'admin-comments',
        'keywords' => array('section6'),
        'mode' => 'preview',
        'supports' => array(
            'align' => true,
            'mode' => true,
            '__experimental_jsx' => true,
        ),
        'render_callback' => 'section6_acf_block_render_callback',
    ));
    acf_register_block_type(array(
        'name' => 'section7',
        'title' => __('section7'),
        'description' => __('section7 na stronie głównej'),
        'category' => 'formatting',
        'icon' => 'admin-comments',
        'keywords' => array('section7'),
        'mode' => 'preview',
        'supports' => array(
            'align' => true,
            'mode' => true,
            '__experimental_jsx' => true,
        ),
        'render_callback' => 'section7_acf_block_render_callback',
    ));
    acf_register_block_type(array(
        'name' => 'section8',
        'title' => __('section8'),
        'description' => __('section8 na stronie głównej'),
        'category' => 'formatting',
        'icon' => 'admin-comments',
        'keywords' => array('section8'),
        'mode' => 'preview',
        'supports' => array(
            'align' => true,
            'mode' => true,
            '__experimental_jsx' => true,
        ),
        'render_callback' => 'section8_acf_block_render_callback',
    ));







};
// Check if function exists and hook into setup.
if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
}
;

/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */

function section_acf_block_render_callback($block, $content = '', $is_preview = false)
{
    $context = Timber::context();

// Store block values.
    $context['block'] = $block;

// Store field values.
    $context['fields'] = get_fields();

// Store $is_preview value.
    $context['is_preview'] = $is_preview;

    $classes = '';
    if (!empty($block['className'])) {
        $context['classes'] .= sprintf(' %s', $block['className']);
    }
    if (!empty($block['align'])) {
        $context['classes'] .= sprintf(' align%s', $block['align']);
    }
    ;

// Render the block.
    Timber::render('templates/blocks/section.twig', $context);
};

function section2_acf_block_render_callback($block, $content = '', $is_preview = false)
{
    $context = Timber::context();

// Store block values.
    $context['block'] = $block;

// Store field values.
    $context['fields'] = get_fields();

// Store $is_preview value.
    $context['is_preview'] = $is_preview;

    $classes = '';
    if (!empty($block['className'])) {
        $context['classes'] .= sprintf(' %s', $block['className']);
    }
    if (!empty($block['align'])) {
        $context['classes'] .= sprintf(' align%s', $block['align']);
    }
    ;

// Render the block.
    Timber::render('templates/blocks/section2.twig', $context);
};

function slider_acf_block_render_callback($block, $content = '', $is_preview = false)
{
    $context = Timber::context();

// Store block values.
    $context['block'] = $block;

// Store field values.
    $context['fields'] = get_fields();

// Store $is_preview value.
    $context['is_preview'] = $is_preview;

    $classes = '';
    if (!empty($block['className'])) {
        $context['classes'] .= sprintf(' %s', $block['className']);
    }
    if (!empty($block['align'])) {
        $context['classes'] .= sprintf(' align%s', $block['align']);
    }
    ;

// Render the block.
    Timber::render('templates/blocks/slider.twig', $context);
};

function section3_acf_block_render_callback($block, $content = '', $is_preview = false)
{
    $context = Timber::context();

// Store block values.
    $context['block'] = $block;

// Store field values.
    $context['fields'] = get_fields();

// Store $is_preview value.
    $context['is_preview'] = $is_preview;

    $classes = '';
    if (!empty($block['className'])) {
        $context['classes'] .= sprintf(' %s', $block['className']);
    }
    if (!empty($block['align'])) {
        $context['classes'] .= sprintf(' align%s', $block['align']);
    }
    ;

// Render the block.
    Timber::render('templates/blocks/section3.twig', $context);
};

function section4_acf_block_render_callback($block, $content = '', $is_preview = false)
{
    $context = Timber::context();

// Store block values.
    $context['block'] = $block;

// Store field values.
    $context['fields'] = get_fields();

// Store $is_preview value.
    $context['is_preview'] = $is_preview;

    $classes = '';
    if (!empty($block['className'])) {
        $context['classes'] .= sprintf(' %s', $block['className']);
    }
    if (!empty($block['align'])) {
        $context['classes'] .= sprintf(' align%s', $block['align']);
    }
    ;

// Render the block.
    Timber::render('templates/blocks/section4.twig', $context);
};

function section5_acf_block_render_callback($block, $content = '', $is_preview = false)
{
    $context = Timber::context();

// Store block values.
    $context['block'] = $block;

// Store field values.
    $context['fields'] = get_fields();

// Store $is_preview value.
    $context['is_preview'] = $is_preview;

    $classes = '';
    if (!empty($block['className'])) {
        $context['classes'] .= sprintf(' %s', $block['className']);
    }
    if (!empty($block['align'])) {
        $context['classes'] .= sprintf(' align%s', $block['align']);
    }
    ;

// Render the block.
    Timber::render('templates/blocks/section5.twig', $context);
};

function section6_acf_block_render_callback($block, $content = '', $is_preview = false)
{
    $context = Timber::context();

// Store block values.
    $context['block'] = $block;

// Store field values.
    $context['fields'] = get_fields();

// Store $is_preview value.
    $context['is_preview'] = $is_preview;

    $classes = '';
    if (!empty($block['className'])) {
        $context['classes'] .= sprintf(' %s', $block['className']);
    }
    if (!empty($block['align'])) {
        $context['classes'] .= sprintf(' align%s', $block['align']);
    }
    ;

// Render the block.
    Timber::render('templates/blocks/section6.twig', $context);
};
function section7_acf_block_render_callback($block, $content = '', $is_preview = false)
{
    $context = Timber::context();

// Store block values.
    $context['block'] = $block;

// Store field values.
    $context['fields'] = get_fields();

// Store $is_preview value.
    $context['is_preview'] = $is_preview;

    $classes = '';
    if (!empty($block['className'])) {
        $context['classes'] .= sprintf(' %s', $block['className']);
    }
    if (!empty($block['align'])) {
        $context['classes'] .= sprintf(' align%s', $block['align']);
    }
    ;

// Render the block.
    Timber::render('templates/blocks/section8.twig', $context);
};

function section8_acf_block_render_callback($block, $content = '', $is_preview = false)
{
    $context = Timber::context();

// Store block values.
    $context['block'] = $block;

// Store field values.
    $context['fields'] = get_fields();

// Store $is_preview value.
    $context['is_preview'] = $is_preview;

    $classes = '';
    if (!empty($block['className'])) {
        $context['classes'] .= sprintf(' %s', $block['className']);
    }
    if (!empty($block['align'])) {
        $context['classes'] .= sprintf(' align%s', $block['align']);
    }
    ;

// Render the block.
    Timber::render('templates/blocks/section8.twig', $context);
};







