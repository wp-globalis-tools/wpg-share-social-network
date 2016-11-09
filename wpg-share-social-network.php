<?php

namespace Globalis\ShareSocialNetwork;

function get_sharelink_facebook($link = false) {
        if(!$link) {
                $link = get_the_permalink();
        }
        $base  = 'https://www.facebook.com/sharer/sharer.php';
        $param_url = '?u='.urlencode($link);
        return $base.$param_url;
}

function get_sharelink_twitter($args = false) {
        if(!isset($args['link'])) {
                $args['link'] = get_the_permalink();
        }
        if(!isset($args['title'])) {
                $args['title'] = get_the_title();
        }
        if(!isset($args['via'])) {
                $args['via']  = 'me';
        }

        $base   = 'https://twitter.com/intent/tweet';
        $text = '?text='.urlencode($args['title']);
        $url  = '&url='.urlencode($args['link']);
        $via  = '&via='.urlencode($args['via']);
        return $base.$text.$url.$via;
}

function get_sharelink_linkedin($args = false) {
        if(!isset($args['link'])) {
                $args['link'] = get_the_permalink();
        }
        if(!isset($args['title'])) {
                $args['title'] = get_the_title();
        }

        $base  = 'https://www.linkedin.com/shareArticle?mini=true';
        $title = '&title='.urlencode($args['title']);
        $url   = '&url='.urlencode($args['link']);
        return $base.$title.$url;
}

function get_sharelink_pinterest($args = false) {
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
        $url   = '?url='.urlencode($args['link']);
        $media = '&media='.urlencode($args['media']);
        $desc  = '&description='.urlencode($args['title']);
        return $base.$url.$media.$desc;
}
