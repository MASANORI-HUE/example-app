<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService;
// use App\Models\Tweet;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweetId = (int) $request->route('tweetId');
        // $tweet = Tweet::query()->where('id', $tweetId)->firstOrFail();
        // $tweet->delete();
        if (! $tweetService->checkOwnTweet($request->user()->id, $tweetId)) {
            throw new AccessDeniedHttpException;
        }
        $tweetService->deleteTweet($tweetId);

        return redirect()
            ->route('tweet.index')
            ->with('feedback.success', 'つぶやきを削除しました');
    }
}
