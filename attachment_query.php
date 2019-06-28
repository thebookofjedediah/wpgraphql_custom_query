add_action( 'graphql_register_types', function() {
  register_graphql_field( 'Post', 'attachment', [
     'type' => 'DataSource',
     'description' => __( 'Attachments on the post', 'wp-graphql' ),
     'resolve' => function( $post ) {
       $attachment = get_post_meta( $post->ID, 'attachment', true );
       return ! empty( $attachment ) ? $attachment : 'null';
     }
  ] );
} );
