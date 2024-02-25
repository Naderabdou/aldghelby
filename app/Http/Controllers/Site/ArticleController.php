<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\Contract\ArticleRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    protected $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index()
    {
        $articles = $this->articleRepository->paginateGetWhere(['type' => 'article'], 6, ['column' => 'publish_date', 'dir' => 'DESC']);

        $researches = $this->articleRepository->limitGetWhere(['type' => 'research'], 6, ['column' => 'publish_date', 'dir' => 'DESC'])->get();

        return view('site.articles.index', compact('articles', 'researches'));
    }

    public function showArticle($id)
    {
        $article = $this->articleRepository->findOne($id);

        $view_key = 'article_' . $article->id;
        // Check if blog session key exists
        // If not, update view_count and create session key
        if (!Session::has($view_key)) {
            $article->views += 1;
            $article->save();
            Session::put($view_key, 1);
        }

        return view('site.articles.article', compact('article'));
    }

    public function showResearch($id)
    {
        $research = $this->articleRepository->findOne($id);

        $researches = $this->articleRepository->limitGetWhere(['type' => 'research'], 6, ['column' => 'publish_date', 'dir' => 'DESC'])->get();

        $view_key = 'research_' . $research->id;
        // Check if blog session key exists
        // If not, update view_count and create session key
        if (!Session::has($view_key)) {
            $research->views += 1;
            $research->save();
            Session::put($view_key, 1);
        }

        return view('site.articles.research', compact('research', 'researches'));
    }

    public function downloadResearch($id)
    {
        $research = $this->articleRepository->findOne($id);

        $download = $research->downloads + 1;

        $research->update(['downloads' => $download]);

        return Storage::download($research->file, $research->title . '.pdf');
    }
}
