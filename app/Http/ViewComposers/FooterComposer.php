 <?php
 namespace App\Http\ViewComposers;

 use Illuminate\View\View;

 class FooterComposer
 {
     public $themeOptions = [];
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct()
     {
         $this->themeOptions = [
             'Shawshank redemption',
             'Forrest Gump',
             'The Matrix',
             'Pirates of the Carribean',
             'Back to the future',
         ];
     }

     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {
         $view->with('themeOptions', end($this->themeOptions));
     }
 }