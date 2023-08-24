<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Httpクラスをインポート
use Google\Cloud\Translate\V2\TranslateClient; // クライアントのネームスペースを追加

class TranslationController extends Controller
{

    /**
     * index
     *
     * @param  Request  $request
     */
    public function index(Request $request)
    {
        return view('translation');
    }

    /**
     * translation
     *
     * @param  Request  $request
     */

     public function translateText($text, $targetLanguage)
     {
        $apiKey = env('GOOGLE_TRANSLATE_API_KEY');
        $translate = new TranslateClient(['key' => $apiKey]);
        $result = $translate->translate($text, ['target' => $targetLanguage]);
        return $result['text'];
     }

    public function translation(Request $request)
    {
        
        $request->validate([
            'sentence' => 'required',
        ]);

        $sentence = $request->input('sentence');

        // Google Cloud Translateのクライアントを作成
        $apiKey = env('GOOGLE_TRANSLATE_API_KEY');
        $translate = new TranslateClient([
            'key' => $apiKey,
        ]);

        $lang = "en";
        $result = $translate->translate($sentence, [
            'target' => $lang,
        ]);

        $translated_text = $result['text']; // 翻訳結果を取得

        return view('translation', compact('sentence', 'translated_text'));
    }
}
