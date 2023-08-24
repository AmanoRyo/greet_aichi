<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'category', 'author_name'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $targetLanguage;

    public function __construct()
    {
        parent::__construct();
        $this->targetLanguage = auth()->user()->language;
    }
   

    public function translateText($text, $targetLanguage)
    {
        $apiKey = config('services.google.translate.key');
        $translate = new TranslateClient(['key' => $apiKey]);
        $result = $translate->translate($text, ['target' => $targetLanguage]);
        return $result['text'];
    }

    public function getTitleAttribute($value)
    {
        $targetLanguage = auth()->user()->language;
        return $this->translateText($value, $targetLanguage);
    }

    public function getBodyAttribute($value)
    {
        $targetLanguage = auth()->user()->language;
        return $this->translateText($value, $targetLanguage);
    }
    
    public function answers()
    {
        return $this->hasMany(AnswerPost::class);
    }
}



