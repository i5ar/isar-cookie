iSar Cookie
===========
Just a WordPress cookie plugin.

> Please note, this plugin was created in order to customize a personal website furthermore some theme features are required. It may not work properly in all themes! On the other hand you may find some useful snippets to place in your [functions.php] file.

Copy and paste the following lines in your theme [content.php] or wherever you want to display a language pop up. This will set a MODAL cookie.

    <?php // iSar Cookie plug-in
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        if( is_plugin_active( 'isar-cookie/isar-cookie.php' )) { isar_cookie_language_button(); } ?>

The POLICY cookie does't require Polylang plug-in in order to work.

### Compatibility

WordPress v4.2.2

Polylang v1.7.5

### License

[GNU General Public License]

___

*Non men che saver, dubbiar m'aggrata.*

[functions.php]:http://codex.wordpress.org/Functions_File_Explained
[GNU General Public License]:https://wordpress.org/about/license/
