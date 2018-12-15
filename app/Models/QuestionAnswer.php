<?php

namespace App\Models;

/**
 * App\Models\QuestionAnswer
 *
 * @property int $id
 * @property int $attendee_id
 * @property int $event_id
 * @property int $question_id
 * @property int $account_id
 * @property string $answer_text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Attendee $attendee
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Event[] $event
 * @property-read \App\Models\Question $question
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionAnswer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionAnswer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionAnswer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MyBaseModel scope($accountId = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionAnswer whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionAnswer whereAnswerText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionAnswer whereAttendeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionAnswer whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionAnswer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionAnswer whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionAnswer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class QuestionAnswer extends MyBaseModel
{

    protected $fillable = [
        'question_id',
        'event_id',
        'attendee_id',
        'account_id',
        'answer_text',
        'questionable_id',
        'questionable_type',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function event()
    {
        return $this->belongsToMany(\App\Models\Event::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(\App\Models\Question::class)->withTrashed();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attendee()
    {
        return $this->belongsTo(\App\Models\Attendee::class);
    }

}
