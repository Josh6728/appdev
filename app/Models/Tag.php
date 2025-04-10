<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function jobs() {
        return $this->belongsToMany(Job::class, relatedPivotKey: 'job_listing_id');


        /*
        To test this two models in tinker, we can use command 
        $job = App\Models\Job::find(10);
        $job->tags;
        

        and

        $tag = App\Models\Job::find(1); 
        
        How could attach a new records:
        $tag->jobs()->attach(App\Models\Job::find(7)); 
        
        To get brand new query:
        $tag->jobs()->get();

        and to grab title for example:
        $tag->jobs()->get()->pluck('title');
        */
    }
}
