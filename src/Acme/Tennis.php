<?php

namespace Acme;

class Tennis
{
    protected $player1;
    protected $player2;
    protected $lookup = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty'
    ];

    public function __construct($player1, $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;

    }

    public function score()
    {
        if($this->hasAWinner())
        {
            return 'Win for '. $this->leader()->name;
        }

        if($this->hasTheAdvantage())
        {
            return 'Advantage ' . $this->leader()->name;
        }

        if($this->inDeuce())
        {
            return 'Deuce';
        }

        $score = $this->lookup[$this->player1->points]. '-';
        return $score .= $this->tied() ? 'All' : $this->lookup[$this->player2->points];
    }

    private function hasAWinner()
    {
        return $this->hasEnoughPointsToBeWon() && $this->isLeadingByTwo();

    }

    private function hasTheAdvantage()
    {
        return $this->hasEnoughPointsToBeWon() && abs($this->player1->points - $this->player2->points) == 1;
    }

    private function inDeuce()
    {
        return $this->player1->points + $this->player2->points >= 6 && $this->tied();
    }

    private function tied()
    {
        return $this->player1->points == $this->player2->points;
    }

    private function leader()
    {
        return $this->player1->points > $this->player2->points
                ? $this->player1
                : $this->player2;
    }

    private function hasEnoughPointsToBeWon()
    {
        return max([$this->player1->points, $this->player2->points]) >= 4;
    }

    private function isLeadingByTwo()
    {
        return abs($this->player1->points - $this->player2->points) >= 2;
    }
}
