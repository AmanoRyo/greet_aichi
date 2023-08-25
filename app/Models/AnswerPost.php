<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Facades\Admin;
use Google\Cloud\Translate\V2\TranslateClient;

class AnswerPost extends Model
{
    protected $fillable = ['body', 'author_name'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

		public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
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
}



