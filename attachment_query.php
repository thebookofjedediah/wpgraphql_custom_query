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
