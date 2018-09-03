# acf-fields-to-wp-rest-api
Programmatically add data from Advanced Custom Fields to the Wordpress REST API

Simply install and activate the plugin. All existing and new ACF fields will be imported into the API.

Any ACF fields added to posts, pages or categories will appear in the API at the usual endpoints (eg: /wp-json/wp/v2/posts).

If you have custom post types or taxonomies and you have exposed them to the API using `show_in_rest => true`, any ACF fields will appear at their endpoints. For more info on exposing custom post types and taxonomies to the API [read here](https://developer.wordpress.org/rest-api/extending-the-rest-api/adding-rest-api-support-for-custom-content-types/).

Compatible with ACF v5.6.0


<h2>Changelog</h2>

<p><strong>v1.0</strong> - 21.06.2017<br />
Initial commit</p>

<p><strong>v1.1</strong> - 26.07.2017<br />
Updates to namespace and function naming</p>
