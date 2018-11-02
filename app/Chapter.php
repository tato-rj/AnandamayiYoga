<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use App\Traits\ManageContents;

class Chapter extends Anandamayi
{
    use ManageContents;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($chapter) {
            $chapter->lectures()->delete();
            $chapter->demonstrations()->delete();
            $chapter->assignments()->delete();
            $chapter->quizzes()->delete();
        });
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class)->where(['type' => 'lecture']);
    }

    public function demonstrations()
    {
        return $this->hasMany(Lecture::class)->where(['type' => 'demonstration']);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function supportingMaterials()
    {
        return $this->hasMany(SupportingMaterial::class);
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class)->where('chapter_id', $this->id)->latest();
    }

    public function duration()
    {
        return collect($this->content)->sum('duration');
    }

    public function getContentAttribute()
    {
        $content = new Collection;

        $this->lectures->each(function($lecture) use ($content) {
            $content->push($lecture);
        });

        $this->assignments->each(function($assignment) use ($content) {
            $content->push($assignment);
        });

        $this->demonstrations->each(function($demonstration) use ($content) {
            $content->push($demonstration);
        });

        $this->quizzes->each(function($quiz) use ($content) {
            $content->push($quiz);
        });

        return $content->sortBy('order');
    }

    public function getLabelAttribute()
    {
        return "Chapter ".($this->order+1);
    }

    public function saveAny($items)
    {
        foreach ($items as $item) {
            $type = $item['type'];
            $model = str_plural($type);

            if ($item['id']) {
                // If the item has an id, it already exists
                $this->$model()->find($item['id'])->update($this->removeIdFrom($item));
            } else {
                // It it doesn't, then create a new one
                $item['file_path'] = $this->generateFilePath($item, $model);

                $this->$model()->create($this->removeIdFrom($item));
            }
        }
    }

    public function removeIdFrom($array)
    {
        return array_diff_key($array, ['id' => $array['id']]);
    }

    public function generateFilePath($content, $model)
    {
        $filename = md5($content['name']);
        
        $file_path = cloudEnv()."/courses/{$this->course_id}/chapters/{$this->id}/{$model}/{$filename}";
        
        $file_path .= ($model == 'lectures' || $model == 'demonstrations') ? '.mp4' : '.pdf';

        return $file_path;  
    }
}
