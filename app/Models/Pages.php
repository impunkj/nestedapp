<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;

    protected $parentid = 'parentid';

	public $timestamps = true;

    public $table = 'pages';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';  


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'title', 'content', 'parentid'
    ];

    /**
     *  parent get via belongsTo
     * 
     */
    public function parent()
    {
        return $this->belongsTo('App\Models\Pages', 'parentid');
    }
    

    /**
     * getparentSlug of Model
     * 
     */
    public function getParentsSlug() {
       
        if($this->parent) {
            return $this->parent->getParentsSlug(). "/" . $this->slug;
        }
         else {
            return $this->slug;
        }
    }


    

}
