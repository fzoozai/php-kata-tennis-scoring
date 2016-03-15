<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Acme\Player;

class TennisSpec extends ObjectBehavior
{
    protected $John;
    protected $Tommy;

    function let()
    {
        $this->John = new Player('John Doe', 0);
        $this->Tommy = new Player('Tommy Hilfiger', 0);
        $this->beConstructedWith($this->John, $this->Tommy);
    }

    function it_scores_a_scoreless_game()
    {
        $this->score()->shouldReturn('Love-All');
    }

    function it_scores_a_1_0_game()
    {
        $this->John->earnPoints(1);
        $this->score()->shouldReturn('Fifteen-Love');
    }

    function it_scores_a_2_0_game()
    {
        $this->John->earnPoints(2);
        $this->score()->shouldReturn('Thirty-Love');
    }

    function it_scores_a_3_0_game()
    {
        $this->John->earnPoints(3);
        $this->score()->shouldReturn('Forty-Love');
    }

    function it_scores_a_4_0_game()
    {
        $this->John->earnPoints(4);
        $this->score()->shouldReturn('Win for John Doe');
    }

}
