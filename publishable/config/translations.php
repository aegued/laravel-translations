<?php

return [

   /**
    * Default Locale || Root columns locale
    * We will use this locale if config('app.locale') translation not exist
    */
   'locale' => 'en',

   /**
    * Supported Locales e.g: ['en', 'es', 'fr']
    */
   'locales' => ['en', 'es', 'fr'],

    /**
     * Set the Database Connection
     * Null uses the application default connection
     */
    'db_connection' => null,

];
