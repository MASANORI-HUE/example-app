<?php

namespace Tests\Unit\Services;

use App\Services\TweetService;
use Mockery;
use PHPUnit\Framework\Attr\PreserveGlobalState;
use PHPUnit\Framework\Attributes\RunInSeparateProcess;
use PHPUnit\Framework\TestCase;

class TweetServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    #[RunInSeparateProcess]
    #[PreserveGlobalState('disabled')]
    public function test_check_own_tweet(): void
    {
        $tweetService = new TweetService; // TweetServiceのインスタンスを作成

        $mock = Mockery::mock('alias:App\Models\Tweet');
        $mock->shouldReceive('query->where->first')->andReturn((object) [
            'id' => 1,
            'user_id' => 1,
        ]);

        $result = $tweetService->checkOwnTweet(1, 1);
        $this->assertTrue($result);

        $result = $tweetService->checkOwnTweet(2, 1);
        $this->assertFalse($result);
    }
}
