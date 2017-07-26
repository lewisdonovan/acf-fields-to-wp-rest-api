<?php

//LOOP THROUGH TAXONOMIES AND ADD ACF FIELDS TO API
add_action( 'rest_api_init', 'acf2api_hook_all_terms', 99 );
function acf2api_hook_all_terms(){
  $taxonomies = array_keys( get_taxonomies() );

  foreach ($taxonomies as $taxonomy) {

    add_filter( 'rest_prepare_'.$taxonomy, function($data, $term, $request){

      //Get the response data
      $response_data = $data->get_data();

      //Bail early if there's an error
      if ( $request['context'] !== 'view' || is_wp_error( $data ) ) {
          return $data;
      }

      //Get all fields
      $fields = get_fields('term_'.$term->term_id);
      //var_dump($fields);
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
