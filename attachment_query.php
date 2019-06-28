<?php
    /**
     * Plugin Name:     WPGraphql Attachment Query
     * Plugin URI:      http://github.com/thebookofjedediah/wpgraphql_custom_query
     * Description:     A WPGraphQL Extension that adds a root query to the GraphQL schema that returns attachments from posts
     * Author:          Jedediah Arnold, Jason Bahl
     * Text Domain:     wp-graphql-attachment-query
     * Domain Path:     /languages
     * Version:         1.0.0
     *
     * @package         wp_graphql_attachment_query
     */

    add_action( 'graphql_register_types', 'register_my_custom_graphql_connection', 99 );
    
    function register_my_custom_graphql_connection() {
        $config = [
        'fromType' => 'RootQuery',
        'toType' => 'Post',
        'fromFieldName' => 'postsAttachments',
        'connectionTypeName' => 'PostsAttachments',
        'resolve' => function( $id, $args, $context, $info ) {
            return \WPGraphQL\Data\DataSource::resolve_post_objects_connection( $id, $args, $context, $info, 'post' );
        },
        'resolveNode' => function( $id, $args, $context, $info ) {
            return \WPGraphQL\Data\DataSource::resolve_post_object( $id, $context );
        }
        ];
        register_graphql_connection( $config );
    };





