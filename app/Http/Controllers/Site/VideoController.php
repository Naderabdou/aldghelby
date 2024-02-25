<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\Contract\VideoRepositoryInterface;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    protected $videoRepository;

    public function __construct(VideoRepositoryInterface $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    public function index()
    {
        $videos = $this->videoRepository->getAll();

        $latestVideos = $this->videoRepository->limit(6);

        return view('site.videos.index', compact('videos', 'latestVideos'));
    }

}
