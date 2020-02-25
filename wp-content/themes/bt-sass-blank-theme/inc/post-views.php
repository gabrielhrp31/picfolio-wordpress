<?php

function post_views_table_create() {

global $wpdb;
$table_name = $wpdb->prefix. "post_views_table";
global $charset_collate;
$charset_collate = $wpdb->get_charset_collate();
global $db_version;

if( $wpdb->get_var("SHOW TABLES LIKE '" . $table_name . "'") != $table_name)
{ $create_sql = "CREATE TABLE " . $table_name . " (
id INT(11) NOT NULL auto_increment,
postid INT(11) NOT NULL ,

clientip VARCHAR(40) NOT NULL ,

PRIMARY KEY (id))$charset_collate;";
    require_once(ABSPATH . "wp-admin/includes/upgrade.php");
    dbDelta( $create_sql );
}



//register the new table with the wpdb object
if (!isset($wpdb->post_views_table))
{
    $wpdb->post_views_table = $table_name;
//add the shortcut so you can use $wpdb->stats
    $wpdb->tables[] = str_replace($wpdb->prefix, '', $table_name);
}

}
add_action( 'init', 'post_views_table_create');

function get_posts_views($postid) {
    global $wpdb;
    $totalrow1 = $wpdb->get_results( "SELECT id FROM $wpdb->post_views_table WHERE postid = '$postid'");
    $total_like1 = $wpdb->num_rows;
    return $total_like1;
}

function views_callback() {
    check_ajax_referer( 'my-special-string', 'security' );
    $postid = intval( $_POST['postid'] );
    $like=0;
    $clientmac = get_client_mac();
    $dislike=0;
    $like_count=0;
//check if post id and ip present
    global $wpdb;
    $row = $wpdb->get_results( "SELECT id FROM $wpdb->post_views_table WHERE postid = '$postid' AND clientip = '$clientmac'");
    if(empty($row)){
//insert row
        $wpdb->insert( $wpdb->post_views_table, array( 'postid' => $postid, 'clientip' => $clientmac ), array( '%d', '%s' ) );
//echo $wpdb->insert_id;
        $like=1;
    }

//calculate like count from db.
    $totalrow = $wpdb->get_results( "SELECT id FROM $wpdb->post_views_table WHERE postid = '$postid'");
    $total_like=$wpdb->num_rows;
    $data=array( 'postid'=>$postid,'likecount'=>$total_like,'clientip'=>$clientmac,'like'=>$like,'dislike'=>$dislike);
    echo json_encode($data);
//echo $clientip;
    die(); // this is required to return a proper result
}
add_action( 'wp_ajax_views_count', 'views_callback' );
add_action( 'wp_ajax_nopriv_views_count', 'views_callback' );