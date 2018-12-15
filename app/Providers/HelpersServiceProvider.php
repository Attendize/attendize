<?php

namespace App\Providers;

use App\Models\Organiser;
use Auth;
use Form;
use Html;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use JavaScript;

class HelpersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        self::blade_custom();
        self::form_macros();
        self::html_macros();
        self::javascript();
        self::view_shares();

        require_once app_path('Helpers/helpers.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }


    /**
     * Register Blade Custom functions
     *
     */
    public function blade_custom()
    {
        Blade::directive('money', function ($expression) {
            return "<?php echo number_format($expression, 2); ?>";
        });
    }

    /**
     * Form Macros
     */
    public function form_macros()
    {
        Form::macro('rawLabel', function ($name, $value = null, $options = []) {
            $label = Form::label($name, '%s', $options);

            return sprintf($label, $value);
        });

        Form::macro('labelWithHelp', function ($name, $value, $options, $help_text) {
            $label = Form::label($name, '%s', $options);

            return sprintf($label, $value)
                . '<a style="margin-left: 4px;font-size: 11px;" href="javascript:showHelp(' . "'" . $help_text . "'" . ');" >'
                . '<i class="ico ico-question "></i>'
                . '</a>';
        });

        Form::macro('customCheckbox', function ($name, $value, $checked = false, $label = false, $options = []) {
//            $checkbox = Form::checkbox($name, $value = null, $checked, $options);
//            $label = Form::rawLabel();
//
//            $out = '<div class="checkbox custom-checkbox">
//                                        <input type="checkbox" name="send_copy" id="send_copy" value="1">
//                                        <label for="send_copy">&nbsp;&nbsp;Send a copy to <b>{{$attendee->event->organiser->email}}</b></label>
//                    </div>';
//
//            return $out;
        });

        Form::macro('styledFile', function ($name, $multiple = false) {
            $out = '<div class="styledFile" id="input-' . $name . '">
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-primary btn-file ">
                            ' . trans("basic.browse") . '&hellip; <input name="' . $name . '" type="file" ' . ($multiple ? 'multiple' : '') . '>
                        </span>
                    </span>
                    <input type="text" class="form-control" readonly>
                    <span style="display: none;" class="input-group-btn btn-upload-file">
                        <span class="btn btn-success ">
                            ' . trans("basic.upload") . '
                        </span>
                    </span>
                </div>
            </div>';

            return $out;
        });
    }

    /**
     * Set up JS across all views
     */
    public function javascript()
    {
        JavaScript::put([
            'User'                => [
                'full_name'    => Auth::check() ? Auth::user()->full_name : '',
                'email'        => Auth::check() ? Auth::user()->email : '',
                'is_confirmed' => Auth::check() ? Auth::user()->is_confirmed : '',
            ],
            'DateTimeFormat'      => config('attendize.default_date_picker_format'),
            'DateSeparator'       => config('attendize.default_date_picker_seperator'),
            'GenericErrorMessage' => trans("Controllers.whoops"),
        ]);

    }


    /**
     * HTML Macros
     */
    public function html_macros()
    {
        Html::macro('sortable_link',
            function ($title, $active_sort, $sort_by, $sort_order, $url_params = [], $class = '', $extra = '') {

                $sort_order = $sort_order == 'asc' ? 'desc' : 'asc';

                $url_params = http_build_query([
                        'sort_by'    => $sort_by,
                        'sort_order' => $sort_order,
                    ] + $url_params);

                $html = "<a href='?$url_params' class='col-sort $class' $extra>";

                $html .= ($active_sort == $sort_by) ? "<b>$title</b>" : $title;

                $html .= ($sort_order == 'desc') ? '<i class="ico-arrow-down22"></i>' : '<i class="ico-arrow-up22"></i>';

                $html .= '</a>';

                return $html;
            });
    }

    /**
     * Share info for all views
     */
    public function view_shares()
    {
        View::share('organisers', Organiser::scope()->get());
    }
}
