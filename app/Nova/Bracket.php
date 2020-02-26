<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Bracket extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Bracket';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(),
            // Text::make('Name', 'title')->sortable(),
            Select::make('Division')->options([
                "5A" => ['label' => '5A', 'group' => 'Classes'],
                "4A" => ['label' => '4A', 'group' => 'Classes'],
                "3A" => ['label' => '3A', 'group' => 'Classes'],
                "2A" => ['label' => '2A', 'group' => 'Classes'],
                "1A" => ['label' => '1A', 'group' => 'Classes'],
                "I" => ['label' => 'I', 'group' => 'Divisions'],
                "II" => ['label' => 'II', 'group' => 'Divisions'],
                "III" => ['label' => 'III', 'group' => 'Divisions'],
                "IV" => ['label' => 'IV', 'group' => 'Divisions'],
                "V" => ['label' => 'V', 'group' => 'Divisions'],
            ])->displayUsingLabels(),
            Select::make('Gender')->options([
                'boys' => 'Boys',
                'girls' => 'Girls'
            ]),
            Number::make('Seats'),
            DateTime::make('Start Date/Time', 'start_date'),
            DateTime::make('End Date/Time', 'end_date'),
            
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
