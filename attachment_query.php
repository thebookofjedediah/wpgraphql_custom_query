add_action( 'graphql_register_types', function() {
  register_graphql_field( 'Post', 'color', [
     'type' => 'String',
     'description' => __( 'The color of the post', 'wp-graphql' ),
     'resolve' => function( $post ) {
       $color = get_post_meta( $post->ID, 'color', true );
       return ! empty( $color ) ? $color : 'blue';
     }
  ] );
} );
