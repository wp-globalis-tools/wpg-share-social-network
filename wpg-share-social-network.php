<?php

function get_clean_and_safe_text($text)
{
    return htmlspecialchars(urlencode(html_entity_decode($text, ENT_COMPAT, 'UTF-8')));
}

function get_sharelink_facebook($link = false)
{
    if(!$link) {
        $link = get_the_permalink();
    }

    $base      = 'https://www.facebook.com/sharer/sharer.php';
    $param_url = '?u='.get_clean_and_safe_text($link);

    return $base . $param_url;
}

function get_sharelink_twitter($args = false)
{
    if (!isset($args['link'])) {
        $args['link'] = get_the_permalink();
    }
    if (!isset($args['title'])) {
        $args['title'] = get_the_title();
    }
    if (!isset($args['via']) && defined('WPG_TWITTER_USERNAME')) {
        $args['via'] = WPG_TWITTER_USERNAME;
    }
    $base = 'https://twitter.com/intent/tweet';
    $text = '?text='.get_clean_and_safe_text($args['title']);
    $url  = '&url='.get_clean_and_safe_text($args['link']);
    $link = $base . $text . $url;

    if (isset($args['via'])) {
        $via = '&via='.get_clean_and_safe_text($args['via']);
        $link .= $via
    }

    return $link;
}

function get_sharelink_linkedin($args = false)
{
    if(!isset($args['link'])) {
        $args['link'] = get_the_permalink();
    }
    if(!isset($args['title'])) {
        $args['title'] = get_the_title();
    }

    $base  = 'https://www.linkedin.com/shareArticle?mini=true';
    $title = '&title='.get_clean_and_safe_text($args['title']);
    $url   = '&url='.get_clean_and_safe_text($args['link']);

    return $base . $title . $url;
}

function get_sharelink_pinterest($args = false)
{
    if(!isset($args['link'])) {
        $args['link'] = get_the_permalink();
    }
    if(!isset($args['title'])) {
        $args['title'] = get_the_title();
    }
    if(!isset($args['media'])) {
        $args['media'] = get_the_post_thumbnail_url();
    }

    $base  = 'https://pinterest.com/pin/create/button/';
    $url   = '?url='.get_clean_and_safe_text($args['link']);
    $media = '&media='.get_clean_and_safe_text($args['media']);
    $desc  = '&description='.get_clean_and_safe_text($args['title']);

    return $base . $url . $media . $desc;
}
