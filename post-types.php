<?php

//LOOP THROUGH POST TYPES AND ADD ACF FIELDS TO API
add_action( 'rest_api_init', 'acf2api_hook_all_post_types', 99 );
function acf2api_hook_all_post_types(){

  //Get all the post types
  global $wp_post_types;
  $post_types = array_keys( $wp_post_types );

  //Loop through each one
  foreach ($post_types as $post_type) {

    //Add a filter for this post type
    add_filter( 'rest_prepare_'.$post_type, function($data, $post, $request){

      //Get the response data
      $response_data = $data->get_data();

      //Bail early if there's an error
      if ( $request['context'] !== 'view' || is_wp_error( $data ) ) {
          return $data;
      }

      //Get all fields
      $fields = get_fields($post->ID);
      //If we have fields...
      if ($fields){
        //Loop through them...
        foreach ($fields as $field_name => $value){
          //Set the meta
          $response_data[$field_name] = $value;
        }
      }

      //Commit the API result var to the API endpoint
      $data->set_data( $response_data );
      return $data;
    }, 10, 3);
  }
}

?>
