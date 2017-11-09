
/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */


/*require('./bootstrap');*/

/* Jquery */
window.$ = window.jQuery = require('jquery');

/* bootstrap */
require('bootstrap-sass');

/* devbridge-autocomplete  */
require('devbridge-autocomplete');

/* admin-lte */
require('admin-lte');

/* toastr */
window.toastr = require('toastr');
toastr.options.preventDuplicates = true;

/* pace-progress */
window.Pace = require('@dlghq/pace-progress');

/* iCheck */
require('icheck');
