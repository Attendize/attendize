<?php

namespace App\Models;

/**
 * App\Models\QuestionOption
 *
 * @property int $id
 * @property string $name
 * @property int $question_id
 * @property-read \App\Models\Question $question
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MyBaseModel scope($accountId = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionOption whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionOption whereQuestionId($value)
 * @mixin \Eloquent
 */
class QuestionOption extends MyBaseModel
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @access public
     * @var bool
     */
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The question associated with the question option.
     *
     * @access public
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(\App\Models\Question::class);
    }
}
