<?php
/*
Plugin Name: Cravatar
Plugin URI: https://github.com/lzhbhlrPython/wordpress-plugin-cravatar
Description: Cravatar is a plugin that allows you to use the cravatar service to display your avatar.
Version: 1.0
Author: Gardenia(copy from offical code)
Author URI: http://www.pyliubaolin.top/
*/

if ( ! function_exists( 'get_cravatar_url' ) ) {
    function get_cravatar_url( $url ) {
        $sources = array(
            'www.gravatar.com',
            '0.gravatar.com',
            '1.gravatar.com',
            '2.gravatar.com',
            'secure.gravatar.com',
            'cn.gravatar.com',
            'gravatar.com',
        );
        return str_replace( $sources, 'cravatar.cn', $url );
    }
    add_filter( 'um_user_avatar_url_filter', 'get_cravatar_url', 1 );
    add_filter( 'bp_gravatar_url', 'get_cravatar_url', 1 );
    add_filter( 'get_avatar_url', 'get_cravatar_url', 1 );
}
if ( ! function_exists( 'set_defaults_for_cravatar' ) ) {
    /**
     * 替换 WordPress 讨论设置中的默认头像
     */
    function set_defaults_for_cravatar( $avatar_defaults ) {
        $avatar_defaults['gravatar_default'] = 'Cravatar 标志';
        return $avatar_defaults;
    }
    add_filter( 'avatar_defaults', 'set_defaults_for_cravatar', 1 );
}
if ( ! function_exists( 'set_user_profile_picture_for_cravatar' ) ) {
    /**
     * 替换个人资料卡中的头像上传地址
     */
    function set_user_profile_picture_for_cravatar() {
        return '<a href="https://cravatar.cn" target="_blank">您可以在 Cravatar 修改您的资料图片</a>';
    }
    add_filter( 'user_profile_picture_description', 'set_user_profile_picture_for_cravatar', 1 );
}