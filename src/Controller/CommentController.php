<?php namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends AbstractController
{
    const UP_VOTE = 'UP';
    const DOWN_VOTE = 'DOWN';

    /**
     * @Route("/comments/{id<\d+>}/vote/{direction<up|down>}", methods="POST")
     *
     * @param int $id
     * @param string $direction
     * @return void
     */
    public function commentVote(LoggerInterface $logger, int $id, string $direction): Response
    {
        if (strtoupper($direction) === static::UP_VOTE) {
            $logger->info('Voting up!');
            $currentVoteCount = rand(7, 100);
        } else {
            $logger->info('Voting down!');
            $currentVoteCount = rand(0, 5);
        }

        return $this->json([
            'votes' => $currentVoteCount,
        ]);
    }
}