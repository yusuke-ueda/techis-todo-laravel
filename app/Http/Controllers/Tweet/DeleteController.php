<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TweetService;
use App\Models\Tweet;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweetId = $request->route('tweetId');
        if(!$tweetService->checkOwnTweet($request->user()->id, $tweetId)){
            throw new AccessDeniedHttpException();
        }
        $tweet = Tweet::where('id', $tweetId)->firstOrFail();
        $tweet->delete();
        return redirect()->route('tweet.index')->with('feedback.success',"つぶやきを削除しました");
    }
}
