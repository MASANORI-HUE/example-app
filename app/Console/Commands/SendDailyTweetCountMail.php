<?php

namespace App\Console\Commands;

use App\Mail\DailyTweetCount;
use App\Models\User;
use App\Services\TweetService;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Contracts\Mail\Mailer;

#[Signature('mail:send-daily-tweet-count-mail')]
#[Description('前日のつぶやき数を集計してつぶやきを促すメールを送ります。')]
class SendDailyTweetCountMail extends Command
{
    private TweetService $tweetService;

    private Mailer $mailer;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(TweetService $tweetService, Mailer $mailer)
    {
        parent::__construct();
        $this->tweetService = $tweetService;
        $this->mailer = $mailer;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tweetCount = $this->tweetService->countYesterdayTweets();

        $users = User::all();

        foreach ($users as $user) {
            $this->mailer->to($user->email)
                ->send(new DailyTweetCount($user, $tweetCount));
        }

        return 0;
    }
}
