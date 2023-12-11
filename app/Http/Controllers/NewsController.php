<?php

namespace App\Http\Controllers;

use App\Http\Requests\News\NewsRequest;
use App\Services\NewsService;
use Illuminate\Http\JsonResponse;

class NewsController extends Controller
{
    /**
     * @var NewsService
     */
    protected NewsService $newsService;

    /**
     * NewsController constructor.
     *
     * @param  NewsService  $newsService
     */
    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    /**
     * Get all news entries.
     *
     * @return JsonResponse
     */
    public function getAllNews(): JsonResponse
    {
        return response()->json($this->newsService->getAllNews());
    }

    /**
     * Get a news entry by ID.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function getNewsById(int $id): JsonResponse
    {
        return response()->json($this->newsService->getNewsById($id));
    }

    /**
     * Create a new news entry.
     *
     * @param  NewsRequest  $request
     * @return JsonResponse
     */
    public function createNews(NewsRequest $request): JsonResponse
    {
        return response()->json($this->newsService->createNews($request->all()));
    }

    /**
     * Update a news entry by ID.
     *
     * @param  NewsRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function updateNews(NewsRequest $request, int $id): JsonResponse
    {
        return response()->json($this->newsService->updateNews($request->all(), $id));
    }

    /**
     * Delete a news entry by ID.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function deleteNews(int $id): JsonResponse
    {
        return response()->json($this->newsService->deleteNews($id));
    }
}
