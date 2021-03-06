<?php

/*
    | -------------------------------------------------------------------------
    | URI ROUTING
    | -------------------------------------------------------------------------
    | This file lets you re-map URI requests to specific controller functions.
    |
    | Typically there is a one-to-one relationship between a URL string
    | and its corresponding controller class/method. The segments in a
    | URL normally follow this pattern:
    |
    | example.com/class/method/id/
    |
    | In some instances, however, you may want to remap this relationship
    | so that a different class/function is called than the one
    | corresponding to the URL.
    |
    | Please see the user guide for complete details:
    |
    | https://codeigniter.com/user_guide/general/routing.html
    |
    | -------------------------------------------------------------------------
    | RESERVED ROUTES
    | -------------------------------------------------------------------------
    |
    | There are three reserved routes:
    |
    | $route['default_controller'] = 'welcome';
    |
    | This route indicates which controller class should be loaded if the
    | URI contains no data. In the above example, the "welcome" class
    | would be loaded.
    |
    | $route['404_override'] = 'errors/page_missing';
    |
    | This route will tell the Router which controller/method to use if those
    | provided in the URL cannot be matched to a valid route.
    |
    | $route['translate_uri_dashes'] = FALSE;
    |
    | This is not exactly a route, but allows you to automatically route
    | controller and method names that contain dashes. '-' isn't a valid
    | class or method name character, so it requires translation.
    | When you set this option to TRUE, it will replace ALL dashes in the
    | controller and method URI segments.
    |
    | Examples: my-controller/index     -> my_controller/index
    |           my-controller/my-method -> my_controller/my_method
*/

// Don't touch
$route["default_controller"]   = "welcome";
$route["404_override"]         = "";
$route["translate_uri_dashes"] = false;

// Main pages
$route["staff"]     = "welcome/staff";
$route["info"]      = "welcome/info";
$route["home"]      = "welcome/index";
$route["dashboard"] = "welcome/dashboard";
$route["master"]    = "welcome/master";
$route["test"]      = "welcome/test";

// Character sheet
$route["charsheet/(:any)"]      = "welcome/charsheet/$1";
$route["charsheet/(:any)/mini"] = "welcome/charsheet_mini/$1";

// AJAX Controllers
$ajax_controllers = [
  "ennemy",
  "character",
  "skill",
  "inventory",
  "item",
];

foreach($ajax_controllers as $c) {
  $route[$c."/(:any)/(:any)"] = "ajax/$c/$c$1/$2";
  $route[$c."/(:any)/(:num)"] = "ajax/$c/$c$1/$2";
  $route[$c."/(:any)"]        = "ajax/$c/$c$1";
}
